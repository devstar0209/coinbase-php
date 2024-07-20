<?php

/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinbase\Coinbase;
use PHPUnit\Framework\TestCase;

require __DIR__ .'../../../vendor/autoload.php';

class TransactionTest extends TestCase {

    /**
     *@var \Lin\Coinbase\Coinbase
     */
    protected $coinbase;
    protected function setUp(): void {
        $key="";
        $secretkey="";
        $this->coinbase=new Coinbase($key, $secretkey);
    }

    //You can set special needs
    public function testSendMoney()
    {        
        try {
            $data = [
                'type' => 'send',
                'account_id' => '9b0c8ca8-95cb-53e5-9c02-7c3c6de70dee',
                'amount' => '1',
                'currency' => 'USDC',
                'to' => '0x9587358D0618e521e912dCE5d0aB126AfE5199fB'
            ];
            $result=$this->coinbase->privates()->postAccountTransaction($data);
            print_r($result);
        }catch (\Exception $e){
            print_r(json_decode($e->getMessage(),true));
        }
    }
}