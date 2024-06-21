<?php

/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinbase\Coinbase;
use PHPUnit\Framework\TestCase;

require __DIR__ .'../../../vendor/autoload.php';

class PublicsTest extends TestCase {

    /**
     *@var \Lin\Coinbase\Coinbase
     */
    protected $coinbase;
    protected function setUp(): void {
        
        $this->coinbase=new Coinbase();
        // $this->coinbase->setOptions([
        //     //Set the request timeout to 60 seconds by default
        //     'timeout'=>10,
        
        //     //If you are developing locally and need an agent, you can set this
        //     //'proxy'=>true,
        //     //More flexible Settings
        //     /* 'proxy'=>[
        //     'http'  => 'http://127.0.0.1:12333',
        //     'https' => 'http://127.0.0.1:12333',
        //     'no'    =>  ['.cn']
        //     ], */
        //     //Close the certificate
        //     //'verify'=>false,
        // ]);
    }

    //You can set special needs
    public function testPublics()
    {

        // try {
        //     $result=$this->coinbase->publics()->getTime();
        //     print_r($result);
        // }catch (\Exception $e){
        //     print_r(json_decode($e->getMessage(),true));
        // }
        
        // try {
        //     $result=$this->coinbase->publics()->getCurrencies();
        //     print_r($result);
        // }catch (\Exception $e){
        //     print_r(json_decode($e->getMessage(),true));
        // }
        
        // try {
        //     $result=$this->coinbase->publics()->getExchangeRates();
        //     print_r($result);
        // }catch (\Exception $e){
        //     print_r(json_decode($e->getMessage(),true));
        // }
        
        try {
            $result=$this->coinbase->publics()->getPricesBuy([
                'currency_pair'=>'BTC-USD'
            ]);
            print_r($result);
        }catch (\Exception $e){
            print_r(json_decode($e->getMessage(),true));
        }
        
        // try {
        //     $result=$this->coinbase->publics()->getPricesSell([
        //         'currency_pair'=>'BTC-USD'
        //     ]);
        //     print_r($result);
        // }catch (\Exception $e){
        //     print_r(json_decode($e->getMessage(),true));
        // }
        
        // try {
        //     $result=$this->coinbase->publics()->getPricesSpot([
        //         'currency_pair'=>'BTC-USD'
        //     ]);
        //     print_r($result);
        // }catch (\Exception $e){
        //     print_r(json_decode($e->getMessage(),true));
        // }
    }
}