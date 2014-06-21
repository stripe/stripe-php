<?php

class Stripe_InvalidRequestErrorTest extends StripeTestCase
{
  public function testInvalidObject()
  {
    self::authorizeFromEnv();
    try {
      Stripe_Customer::retrieve('invalid');
    } catch (Stripe_InvalidRequestError $e) {
      $this->assertEqual(404, $e->getHttpStatus());
    }
  }

  public function testBadData()
  {
    self::authorizeFromEnv();
    try {
      Stripe_Charge::create();
    } catch (Stripe_InvalidRequestError $e) {
      $this->assertEqual(400, $e->getHttpStatus());
    }
  }
}
