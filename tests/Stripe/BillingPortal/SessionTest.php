<?php

namespace Stripe\BillingPortal;

/**
 * @internal
 * @covers \Stripe\BillingPortal\Session
 */
final class SessionTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'pts_123';

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/billing_portal/sessions'
        );
        $resource = Session::create([
            'customer' => 'cus_123',
            'return_url' => 'https://stripe.com/return',
        ]);
        static::assertInstanceOf(\Stripe\BillingPortal\Session::class, $resource);
    }
}
