<?php

class Stripe_InvalidRequestErrorTest extends UnitTestCase
{
  public function testInvalidObject()
  {
    authorizeFromEnv();
    try {
      Stripe_Customer::retrieve('invalid');
    } catch (Stripe_InvalidRequestError $e) {
      $this->assertEqual(404, $e->getHttpStatus());
    }
  }

  public function testBadData()
  {
    authorizeFromEnv();
    try {
      Stripe_Charge::create();
    } catch (Stripe_InvalidRequestError $e) {
      $this->assertEqual(400, $e->getHttpStatus());
    }
  }
}
