<?php

class Stripe_AccountTest extends StripeTestCase
{
  public function testRetrieve()
  {
    authorizeFromEnv();
    $d = Stripe_Account::retrieve();
    $this->assertEqual($d->email, "test+bindings@stripe.com");
    $this->assertEqual($d->charge_enabled, false);
    $this->assertEqual($d->details_submitted, false);
  }
}
