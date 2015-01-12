<?php

class Stripe_BalanceTest extends Stripe_TestCase
{
  public function testRetrieve()
  {
    self::authorizeFromEnv();
    $d = Stripe_Balance::retrieve();
    $this->assertSame($d->object, "balance");
    $this->assertTrue(Stripe_Util::isList($d->available));
    $this->assertTrue(Stripe_Util::isList($d->pending));
  }
}
