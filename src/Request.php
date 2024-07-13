<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinbase;

use GuzzleHttp\Exception\RequestException;
use Lin\Coinbase\Exceptions\Exception;
use Firebase\JWT\JWT;

class Request
{
    protected $key='';

    protected $secret='';

    protected $passphrase='';

    protected $host='';

    protected $nonce='';

    protected $signature='';

    protected $headers=[];

    protected $type='';

    protected $path='';

    protected $data=[];

    protected $options=[];

    protected $platform='';

    protected $version='';

    public function __construct(array $data)
    {
        $this->key=$data['key'] ?? '';
        $this->secret=$data['secret'] ?? '';
        $this->passphrase = $data['passphrase'] ?? '';
        $this->host=$data['host'] ?? '';

        $this->options=$data['options'] ?? [];

        $this->platform=$data['platform'] ?? [];
        $this->version=$data['version'] ?? [];
    }

    /**
     *
     * */
    protected function auth(){

        $this->headers();

        $this->options();
    }

    /**
     *
     * */
    protected function nonce(){
        $this->nonce=time();
    }

    /**
     *
     * */
    protected function signature(){
        $body='';
        $path=$this->version.$this->path;

        if (!empty($this->data)) {
            if($this->type=='GET') {
                $path.='?'.http_build_query($this->data);
            }else{
                $body=json_encode($this->data);
            }
        }

        $plain = $this->nonce . $this->type . $path . $body;

        switch ($this->platform) {
            case 'coinbase':
                $this->signature = hash_hmac('sha256', $plain, $this->secret);
                break;
            case 'coinbasepro':
                $plain = $this->nonce . $path . $body;
                $this->signature = base64_encode(hash_hmac('sha256', $plain, base64_decode($this->secret), true));
                break;
            
            case 'coinbaseexchange':
                $this->signature = hash_hmac('sha256', $plain, $this->secret);
                break;
            
        }
    }

    function buildJwt() {
        $keyName = $this->key;
        $keySecret = str_replace('\\n', "\n", $this->secret);

        $url=$this->host.$this->version.$this->path;
        $uri = $this->type . ' ' . str_replace('https://', '', $url);

        $privateKeyResource = openssl_pkey_get_private($keySecret);
        if (!$privateKeyResource) {
            throw new Exception('Private key is not valid');
        }
        $time = time();
        $nonce = bin2hex(random_bytes(16));  // Generate a 32-character hexadecimal nonce
        $jwtPayload = [
            'sub' => $keyName,
            'iss' => 'cdp',
            'nbf' => $time,
            'exp' => $time + 120,  // Token valid for 120 seconds from now
            'uri' => $uri,
        ];
        $headers = [
            'typ' => 'JWT',
            'alg' => 'ES256',
            'kid' => $keyName,  // Key ID header for JWT
            'nonce' => $nonce  // Nonce included in headers for added security
        ];
        $jwtToken = JWT::encode($jwtPayload, $privateKeyResource, 'ES256', $keyName, $headers);
        return $jwtToken;
    }

    /**
     *
     * */
    protected function headers(){
        $isCloudAPiKey = (mb_strpos($this->key, 'organizations/') !== false) || (str_starts_with($this->secret, '-----BEGIN'));
        if ($isCloudAPiKey) {
            $token = $this->buildJwt();
            $this->headers= [
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $token"
            ];
        } else {
            $this->nonce();
            $this->signature();

            $this->headers= [
                'Content-Type' => 'application/json',
                'CB-ACCESS-KEY'        => $this->key,
                'CB-ACCESS-SIGN'       => $this->signature,
                'CB-ACCESS-TIMESTAMP'  => $this->nonce,
            ];
            switch ($this->platform) {
                case 'coinbase':
                    $this->headers['CB-VERSION']='2017-05-26';
                    break;
                
                case 'coinbasepro':
                case 'coinbaseexchange':
                    $this->headers['CB-ACCESS-PASSPHRASE']=$this->passphrase;
                    break;
                
            }
        }
    }

    /**
     *
     * */
    protected function options(){
        if(isset($this->options['headers'])) $this->headers=array_merge($this->headers,$this->options['headers']);

        $this->options['headers']=$this->headers;
        $this->options['timeout'] = $this->options['timeout'] ?? 60;

        if(isset($this->options['proxy']) && $this->options['proxy']===true) {
            $this->options['proxy']=[
                'http'  => 'http://127.0.0.1:12333',
                'https' => 'http://127.0.0.1:12333',
                'no'    =>  ['.cn']
            ];
        }
    }

    /**
     *
     * */
    protected function send(){
        $client = new \GuzzleHttp\Client();

        $url=$this->host.$this->version.$this->path;
        print_r($url);

        if(!empty($this->data)) {
            if($this->type=='GET') {
                $url.='?'.http_build_query($this->data);
            }else{
                $this->options['body']=json_encode($this->data);
            }
        }

        $response = $client->request($this->type, $url, $this->options);

        return $response->getBody()->getContents();
    }

    /*
     *
     * */
    protected function exec(){
        $this->auth();

        try {
            return json_decode($this->send(),true);
        }catch (RequestException $e){
            if(method_exists($e->getResponse(),'getBody')){
                $contents=$e->getResponse()->getBody()->getContents();

                $temp=json_decode($contents,true);
                if(!empty($temp)) {
                    $temp['_method']=$this->type;
                    $temp['_url']=$this->host.$this->version.$this->path;
                }else{
                    $temp['_message']=$e->getMessage();
                }
            }else{
                $temp['_message']=$e->getMessage();
            }

            $temp['_httpcode']=$e->getCode();

            throw new Exception(json_encode($temp));
        }
    }
}
