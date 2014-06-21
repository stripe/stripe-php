<?php

class Stripe_AccountTest extends StripeTestCase
{
  public function testRetrieve()
  {
    self::authorizeFromEnv();
    $d = Stripe_Account::retrieve();
    $this->assertEqual($d->id, "cuD9Rwx8pgmRZRpVe02lsuR9cwp2Bzf7");
    $this->assertEqual($d->email, "test+bindings@stripe.com");
    // @codingStandardsIgnoreStart
    $this->assertEqual($d->charge_enabled, false);
    $this->assertEqual($d->details_submitted, false);
    // @codingStandardsIgnoreEnd
  }
}
