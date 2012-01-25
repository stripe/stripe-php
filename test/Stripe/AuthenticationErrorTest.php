<?php

class Stripe_AuthenticationErrorTest extends UnitTestCase
{
  public function testInvalidCredentials()
  {
    Stripe::setApiKey('invalid');
    try {
      Stripe_Customer::create();
    } catch (Stripe_AuthenticationError $e) {
      $this->assertEqual(401, $e->getHttpStatus());
    }
  }
}
