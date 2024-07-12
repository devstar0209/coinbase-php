<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinbase\Api\CoinbasePro;

use Lin\Coinbase\Request;

class Order extends Request
{
    /**
     * POST /orders
     * */
    public function post(array $data=[]){
        $this->type='POST';
        $this->path='/orders';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * GET /orders/historical/<id>
     * GET /orders/client:<client_oid>
     * */
    public function get(array $data=[]){
        $this->type='GET';

        if(isset($data['client_oid'])) {
            $this->path='/orders/client:'.$data['client_oid'];
        }

        if(isset($data['id'])) {
            $this->path='/orders/historical/'.$data['id'];
        }

        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /orders/historical/batch
     * */
    public function getList(array $data=[]){
        $this->type='GET';
        $this->path='/orders/historical/batch';
        $this->data=$data;
        return $this->exec();
    }
}
