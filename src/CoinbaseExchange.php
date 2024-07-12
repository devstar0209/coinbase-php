<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinbase;


use Lin\Coinbase\Api\CoinbaseExchange\Account;
use Lin\Coinbase\Api\CoinbaseExchange\Assets;
use Lin\Coinbase\Api\CoinbaseExchange\Order;
use Lin\Coinbase\Api\CoinbaseExchange\Coinbase as CoinbaseAccounts;
use Lin\Coinbase\Api\CoinbaseExchange\Conversion;
use Lin\Coinbase\Api\CoinbaseExchange\Deposit;
use Lin\Coinbase\Api\CoinbaseExchange\Fees;
use Lin\Coinbase\Api\CoinbaseExchange\Oracle;
use Lin\Coinbase\Api\CoinbaseExchange\Payment;
use Lin\Coinbase\Api\CoinbaseExchange\Product;
use Lin\Coinbase\Api\CoinbaseExchange\Profiles;
use Lin\Coinbase\Api\CoinbaseExchange\Reports;
use Lin\Coinbase\Api\CoinbaseExchange\System;
use Lin\Coinbase\Api\CoinbaseExchange\User;
use Lin\Coinbase\Api\CoinbaseExchange\Withdrawals;

class CoinbaseExchange
{
    protected $key;
    protected $secret;
    protected $passphrase;
    protected $host;
    protected $version;

    protected $options=[];

    function __construct(string $key='',string $secret='',string $passphrase='',string $host='https://api.exchange.coinbase.com', $version=""){
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
            'platform'=>'coinbaseexchange',
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
    function coinbase(){
        return new CoinbaseAccounts($this->init());
    }

    /**
     *
     * */
    function conversion(){
        return new Conversion($this->init());
    }

    /**
     *
     * */
    function deposit(){
        return new Deposit($this->init());
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
    function assets(){
        return new Assets($this->init());
    }

    /**
     *
     * */
    function oracle(){
        return new Oracle($this->init());
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

    /**
     *
     * */
    function reports(){
        return new Reports($this->init());
    }

    /**
     *
     * */
    function system(){
        return new System($this->init());
    }

    /**
     *
     * */
    function user(){
        return new User($this->init());
    }

    /**
     *
     * */
    function withdrawals(){
        return new Withdrawals($this->init());
    }
}
