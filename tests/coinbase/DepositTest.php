<?php

/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinbase\Coinbase;
use PHPUnit\Framework\TestCase;

require __DIR__ .'../../../vendor/autoload.php';

class DepositTest extends TestCase {

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
    public function testDeposit()
    {        
        try {
            $data['account_id'] = '4672cd83-d10b-5855-8c44-d9a36897abc5';
            $result=$this->coinbase->privates()->postAccountAddresses($data);
            print_r($result);
        }catch (\Exception $e){
            print_r(json_decode($e->getMessage(),true));
        }
    }
}