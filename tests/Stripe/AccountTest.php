<?php

class Stripe_AccountTest extends Stripe_TestCase
{
  public function testRetrieve()
  {
    self::authorizeFromEnv();
    $d = Stripe_Account::retrieve();
    $this->assertSame($d->id, "cuD9Rwx8pgmRZRpVe02lsuR9cwp2Bzf7");
    $this->assertSame($d->email, "test+bindings@stripe.com");
    // @codingStandardsIgnoreStart
    $this->assertSame($d->charges_enabled, false);
    $this->assertSame($d->details_submitted, false);
    // @codingStandardsIgnoreEnd
  }
}
