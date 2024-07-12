<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinbase\Api\CoinbaseExchange;

use Lin\Coinbase\Request;

class Withdrawals extends Request
{
    /**
     * POST /withdrawals/payment-method
     * */
    public function postPaymentMethod(array $data=[]){
        $this->type='POST';
        $this->path='/withdrawals/payment-method';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST /withdrawals/coinbase-account
     * */
    public function postCoinbaseAccount(array $data=[]){
        $this->type='POST';
        $this->path='/withdrawals/coinbase-account';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *POST /withdrawals/crypto
     * */
    public function postCrypto(array $data=[]){
        $this->type='POST';
        $this->path='/withdrawals/crypto';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /withdrawals/fee-estimate
     * */
    public function getCryptoFeeEstiamte(array $data=[]){
        $this->type='GET';
        $this->path='/withdrawals/fee-estimate';
        $this->data=$data;
        return $this->exec();
    }
}
