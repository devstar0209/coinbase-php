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
        $key="organizations/88078726-7dd9-404f-af97-c6c5e70df06f/apiKeys/16b4aa3a-5cc6-4a47-8bde-34b9dd8dcd7a";
        $secret="-----BEGIN EC PRIVATE KEY-----\nMHcCAQEEIG3DhOEPWiyb0gZ1KRokz9OFl//6TOkFZan0iYwaIq82oAoGCCqGSM49\nAwEHoUQDQgAEBVPIR1k9Agzmc0sbN1XOrjJ56SgYu3SlTs3RXQzCIAabmYbt3ccJ\n+tK8y9VxSa3YVrH1/3vYPxyJmrlYXG0SAw==\n-----END EC PRIVATE KEY-----\n";
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