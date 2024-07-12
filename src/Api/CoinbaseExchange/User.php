<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinbase\Api\CoinbaseExchange;

use Lin\Coinbase\Request;

class User extends Request
{
    /**
     * GET /users/self/trailing-volume
     * */
    public function getTrailingVolume(array $data=[]){
        $this->type='GET';
        $this->path='/users/self/trailing-volume';
        $this->data=$data;
        return $this->exec();
    }
}
