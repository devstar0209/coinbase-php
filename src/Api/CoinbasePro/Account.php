<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinbase\Api\CoinbasePro;

use Lin\Coinbase\Request;

class Account extends Request
{
    /**
     * GET /accounts
     * */
    public function getList(array $data=[]){
        $this->type='GET';
        $this->path='/accounts';
        $this->data=$data;
        return $this->exec();
    }

    /**
     *GET /accounts/<account-id>
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/accounts/'.$data['account_id'];
        $this->data=$data;
        return $this->exec();
    }

}
