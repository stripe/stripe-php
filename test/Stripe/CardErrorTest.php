<?php

class Stripe_CardErrorTest extends StripeTestCase
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
      $this->assertEqual(402, $e->getHttpStatus());
      $body = $e->getJsonBody();
      $this->assertTrue($body['error']);
    }
  }
}
