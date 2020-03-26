<?php

//.\vendor\bin\phpunit .\tests\LaravelTest.php

use Orchestra\Testbench\TestCase;
use TooPago\OpenPay\Customers;


class LaravelTest extends TestCase
{

    /** @test */
    public function createCustomer()
    {
        $sendData = [
            'name' => 'Alta cliente SPEI',
            'last_name' => 'Integracion',
            'email' => 'juan@gmail.com',
            'phone_number' => '8110124578',
            'requires_account' => false,
            'address' => array(
                'line1' => 'Calle 10',
                'line2' => 'col. san pablo',
                'line3' => 'entre la calle 1 y la 2',
                'state' => 'Queretaro',
                'city' => 'Queretaro',
                'postal_code' => '76000',
                'country_code' => 'MX'
             )
        ];
        $OpenPay = new Customers();
        $OpenPay->newCustomer($sendData , function($response) {
            $this->assertTrue(true);
        }, function($e) {
            $this->assertFalse(true);
        });
    }


}
