<?php

class Stripe_BalanceTransactionTest extends Stripe_TestCase
{
  public function testList()
  {
    self::authorizeFromEnv();
    $d = Stripe_BalanceTransaction::all();
    $this->assertSame($d->url, '/v1/balance/history');
  }
}
