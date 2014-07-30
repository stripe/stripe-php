<?php

class Stripe_ApplicationFeeRefundTest extends StripeTestCase
{
  public function testUrls()
  {
    $refund = new Stripe_ApplicationFeeRefund();
    $refund->id = 'refund_id';
    $refund->fee = 'fee_id';

    $this->assertEqual(
        $refund->instanceUrl(),
        '/v1/application_fees/fee_id/refunds/refund_id'
    );
  }
}
