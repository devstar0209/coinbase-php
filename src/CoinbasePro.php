<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinbase;


use Lin\Coinbase\Api\CoinbasePro\Account;
use Lin\Coinbase\Api\CoinbasePro\Order;
use Lin\Coinbase\Api\CoinbasePro\Fees;
use Lin\Coinbase\Api\CoinbasePro\Fills;
use Lin\Coinbase\Api\CoinbasePro\Payment;
use Lin\Coinbase\Api\CoinbasePro\Product;
use Lin\Coinbase\Api\CoinbasePro\Profiles;

class CoinbasePro
{
    protected $key;
    protected $secret;
    protected $passphrase;
    protected $host;
    protected $version;

    protected $options=[];

    function __construct(string $key='',string $secret='',string $passphrase='',string $host='https://api.coinbase.com', $version="/api/v3/brokerage"){
        $this->key=$key;
        $this->secret=$secret;
        $this->host=$host;
        $this->passphrase=$passphrase;
        $this->version=$version;
    }

    /**
     *
     * */
    private function init(){
        return [
            'key'=>$this->key,
            'secret'=>$this->secret,
            'passphrase'=>$this->passphrase,
            'host'=>$this->host,
            'options'=>$this->options,
            'version'=>$this->version,

            'platform'=>'coinbasepro',
        ];
    }

    /**
     *
     * */
    function setOptions(array $options=[]){
        $this->options=$options;
    }

    /**
     *
     * */
    function account(){
        return new Account($this->init());
    }

    /**
     *
     * */
    function fees(){
        return new Fees($this->init());
    }

    /**
     *
     * */
    function fills(){
        return new Fills($this->init());
    }

    /**
     *
     * */
    function order(){
        return new Order($this->init());
    }

    /**
     *
     * */
    function payment(){
        return new Payment($this->init());
    }

    /**
     *
     * */
    function product(){
        return new Product($this->init());
    }

    /**
     *
     * */
    function profiles(){
        return new Profiles($this->init());
    }
}
