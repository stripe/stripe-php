<?php

class Stripe_BalanceTest extends StripeTestCase
{
  public function testRetrieve()
  {
    self::authorizeFromEnv();
    $d = Stripe_Balance::retrieve();
    $this->assertEqual($d->object, "balance");
    $this->assertTrue(Stripe_Util::isList($d->available));
    $this->assertTrue(Stripe_Util::isList($d->pending));
  }
}
