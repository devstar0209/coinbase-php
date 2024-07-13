<?php

/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Coinbase\Coinbase;
use PHPUnit\Framework\TestCase;

require __DIR__ .'../../../vendor/autoload.php';

class AccountTest extends TestCase {

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
    public function testAccounts()
    {        
        try {
            $result=$this->coinbase->privates()->getAccounts();
            print_r($result);
        }catch (\Exception $e){
            print_r(json_decode($e->getMessage(),true));
        }
    }
}