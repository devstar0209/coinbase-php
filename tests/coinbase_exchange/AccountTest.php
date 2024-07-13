<?php
// tests/AccountTest.php

use Lin\Coinbase\CoinbaseExchange;
use PHPUnit\Framework\TestCase;

require __DIR__ .'../../../vendor/autoload.php';

class AccountTest extends TestCase {
    /**
     *@var \Lin\Coinbase\CoinbaseExchange
     */
    protected $coinbase;

    protected function setUp(): void {
        $key="";
        $secret="";
        $this->coinbase=new CoinbaseExchange($key,$secret);
    }

    public function testList() {
        try {
            $result=$this->coinbase->account()->getList();
            print_r($result);
        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }
}

?>