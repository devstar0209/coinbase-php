<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinbase\Api\CoinbaseExchange;

use Lin\Coinbase\Request;

class Conversion extends Request
{
    /**
     * POST /conversions
     * */
    public function post(array $data=[]){
        $this->type='POST';
        $this->path='/conversions';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * GET /conversions/{conversion_id}
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/conversions/'.$data['conversion_id'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     * GET /conversions/fees
     * */
    public function getFee(array $data=[]){
        $this->type='GET';
        $this->path='/conversions/fees';
        $this->data=$data;
        return $this->exec();
    }
}
