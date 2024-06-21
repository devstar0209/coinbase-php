<?php
// tests/ProductTest.php

use Lin\Coinbase\CoinbasePro;
use PHPUnit\Framework\TestCase;

require __DIR__ .'../../../vendor/autoload.php';

class ProductTest extends TestCase {
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
            $result=$this->coinbase->product()->getList([
                // 'limit' => 10,
                // 'offset' => 30,
                'get_tradability_status' => true,
                'product_type' => 'SPOT'
            ]);
            // print_r($result);
            $products = [];
            foreach($result['products'] as $item) {
                $products[] = $item['product_id'];
            }
            error_log(json_encode($products), 3, __DIR__ . "/logs.log");
        } catch (\Throwable $th) {
            print_r("Error :: ".$th->getMessage());
        }
    }
}

?>