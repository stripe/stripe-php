<?php

namespace Stripe;

class BankAccountTest extends TestCase
{
    const TEST_RESOURCE_ID = 'ba_123';

    public function testIsVerifiable()
    {
        $resource = BankAccount::constructFrom([
            'id' => self::TEST_RESOURCE_ID,
            'object' => 'bank_account',
            'customer' => 'cus_123',
        ]);
        $this->expectsRequest(
            'post',
            '/v1/customers/cus_123/sources/' . self::TEST_RESOURCE_ID . "/verify",
            [
                "amounts" => [1, 2]
            ]
        );
        $resource->verify(["amounts" => [1, 2]]);
        $this->assertInstanceOf("Stripe\\BankAccount", $resource);
    }
}
