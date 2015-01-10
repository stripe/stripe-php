<?php

class Stripe_ApplicationFeeTest extends Stripe_TestCase
{
  public function testUrls()
  {
    $applicationFee = new Stripe_ApplicationFee('abcd/efgh');
    $this->assertSame(
        $applicationFee->instanceUrl(), '/v1/application_fees/abcd%2Fefgh'
    );
  }

  public function testList()
  {
    self::authorizeFromEnv();
    $d = Stripe_ApplicationFee::all();
    $this->assertSame($d->url, '/v1/application_fees');
  }
}
