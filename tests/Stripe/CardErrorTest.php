<?php

class Stripe_CardErrorTest extends Stripe_TestCase
{
  public function testDecline()
  {
    self::authorizeFromEnv();

    $card = array(
      'number' => '4000000000000002',
      'exp_month' => '3',
      'exp_year' => '2020'
    );

    $charge = array(
      'amount' => 100,
      'currency' => 'usd',
      'card' => $card
    );

    try {
      Stripe_Charge::create($charge);
    } catch (Stripe_CardError $e) {
      $this->assertSame(402, $e->getHttpStatus());
      $actual = $e->getJsonBody();
      $this->assertSame(
          array(
                'error' => array(
                    'message' => 'Your card was declined.',
                    'type' => 'card_error',
                    'code' => 'card_declined',
                    'charge' => $actual['error']['charge'],
                ),
            ),
          $actual
      );
    }
  }
}
