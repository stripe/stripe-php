<?php

namespace Stripe;

class AccountLinkTest extends TestCase
{
    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/account_links'
        );
        $resource = AccountLink::create([
            "account" => "acct_123",
            "failure_url" => "https://stripe.com/failure",
            "success_url" => "https://stripe.com/success",
            "type" => "custom_account_verification",
        ]);
        static::assertInstanceOf(\Stripe\AccountLink::class, $resource);
    }
}
