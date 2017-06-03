<?php

namespace Stripe;

class CardErrorTest extends TestCase
{
    public function testDecline()
    {
        self::authorizeFromEnv();

        $charge = array(
            'amount' => 100,
            'currency' => 'usd',
            'source' => 'tok_chargeDeclined'
        );

        try {
            Charge::create($charge);
        } catch (Error\Card $e) {
            $this->assertSame(402, $e->getHttpStatus());
            $this->assertTrue(strpos($e->getRequestId(), "req_") === 0, $e->getRequestId());
            $actual = $e->getJsonBody();
            $this->assertSame(
                array('error' => array(
                    'message' => 'Your card was declined.',
                    'type' => 'card_error',
                    'code' => 'card_declined',
                    'decline_code' => 'generic_decline',
                    'charge' => $actual['error']['charge'],
                )),
                $actual
            );
        }
    }
}
