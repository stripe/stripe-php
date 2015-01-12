<?php

class Stripe_AuthenticationErrorTest extends Stripe_TestCase
{
  public function testInvalidCredentials()
  {
    Stripe::setApiKey('invalid');
    try {
      Stripe_Customer::create();
    } catch (Stripe_AuthenticationError $e) {
      $this->assertSame(401, $e->getHttpStatus());
    }
  }
}
