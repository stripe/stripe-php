<?php

class Stripe_ApplicationFeeTest extends StripeTestCase
{
  public function testUrls()
  {
    $applicationFee = new Stripe_ApplicationFee('abcd/efgh');
    $this->assertEqual(
        $applicationFee->instanceUrl(), '/v1/application_fees/abcd%2Fefgh'
    );
  }

  public function testList()
  {
    self::authorizeFromEnv();
    $d = Stripe_ApplicationFee::all();
    $this->assertEqual($d->url, '/v1/application_fees');
  }
}
