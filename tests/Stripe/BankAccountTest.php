<?php

namespace Stripe;

class BankAccountTest extends TestCase
{
    const TEST_RESOURCE_ID = 'ba_123';

    public function testIsVerifiable()
    {
        $resource = BankAccount::constructFrom(
            array(
                'id' => self::TEST_RESOURCE_ID,
                'object' => 'bank_account',
                'customer' => 'cus_123',
            ),
            new Util\RequestOptions()
        );
        $this->expectsRequest(
            'post',
            '/v1/customers/cus_123/sources/' . self::TEST_RESOURCE_ID . "/verify",
            array(
                "amounts" => array(1, 2)
            )
        );
        $resource->verify(array("amounts" => array(1, 2)));
        $this->assertSame("Stripe\\BankAccount", get_class($resource));
    }
}
