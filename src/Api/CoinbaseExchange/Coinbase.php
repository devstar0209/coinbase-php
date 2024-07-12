<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinbase\Api\CoinbaseExchange;

use Lin\Coinbase\Request;

class Coinbase extends Request
{
    /**
     * GET /coinbase-accounts
     * */
    public function getWallets(array $data=[]){
        $this->type='GET';
        $this->path='/coinbase-accounts';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * POST /coinbase-accounts/[account_id]/addresses
     * */
    public function postAddress(array $data=[]){
        $this->type='POST';
        $this->path='/coinbase-accounts/'.$data['account_id'].'/addresses';
        $this->data=$data;
        return $this->exec();
    }
}
