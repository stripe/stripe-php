<?php

namespace Stripe;

class ThreeDSecureTest extends TestCase
{
    public function testCreate()
    {
        $this->mockRequest(
            'POST',
            '/v1/3d_secure',
            array(
                'card' => 'tok_test',
                'amount' => 1500,
                'currency' => 'usd',
                'return_url' => 'https://example.org/3d-secure-result'
            ),
            array(
                'id' => 'tdsrc_test',
                'object' => 'three_d_secure'
            )
        );
        $three_d_secure = ThreeDSecure::create(array(
                'card' => 'tok_test',
                'amount' => 1500,
                'currency' => 'usd',
                'return_url' => 'https://example.org/3d-secure-result'
        ));
        $this->assertSame($three_d_secure->id, 'tdsrc_test');
    }
}
