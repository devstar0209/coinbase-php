<?php
// tests/AccountTest.php

use Lin\Coinbase\CoinbasePro;
use PHPUnit\Framework\TestCase;

require __DIR__ .'../../../vendor/autoload.php';

class AccountTest extends TestCase {
    /**
     *@var \Lin\Coinbase\CoinbasePro
     */
    protected $coinbase;

    protected function setUp(): void {
        $key="KEY NAME";
        $secret="SECRET KEY";
        $this->coinbase=new CoinbasePro($key,$secret);
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