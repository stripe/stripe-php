<?php

class Stripe_InvalidRequestErrorTest extends Stripe_TestCase
{
  public function testInvalidObject()
  {
    self::authorizeFromEnv();
    try {
      Stripe_Customer::retrieve('invalid');
    } catch (Stripe_InvalidRequestError $e) {
      $this->assertSame(404, $e->getHttpStatus());
    }
  }

  public function testBadData()
  {
    self::authorizeFromEnv();
    try {
      Stripe_Charge::create();
    } catch (Stripe_InvalidRequestError $e) {
      $this->assertSame(400, $e->getHttpStatus());
    }
  }
}
