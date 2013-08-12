<?php

class Stripe_BalanceTransactionTest extends StripeTestCase
{
  public function testList()
  {
    authorizeFromEnv();
    $d = Stripe_BalanceTransaction::all();
    $this->assertEqual($d->url, '/v1/balance/history');
  }
}
