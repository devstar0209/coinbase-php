<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinbase\Api\CoinbasePro;

use Lin\Coinbase\Request;

class Fees extends Request
{
    /**
     * GET /transaction_summary
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/transaction_summary';
        $this->data=$data;
        return $this->exec();
    }
}
