<?php

class Stripe_ApplicationFeeRefundTest extends Stripe_TestCase
{
  public function testUrls()
  {
    $refund = new Stripe_ApplicationFeeRefund();
    $refund->id = 'refund_id';
    $refund->fee = 'fee_id';

    $this->assertSame(
        $refund->instanceUrl(),
        '/v1/application_fees/fee_id/refunds/refund_id'
    );
  }
}
