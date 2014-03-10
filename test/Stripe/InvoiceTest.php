<?php

class Stripe_InvoiceTest extends StripeTestCase
{
  public function testUpcoming()
  {
    authorizeFromEnv();
    $customer = self::createTestCustomer();

    Stripe_InvoiceItem::create(
        array(
            'customer'  => $customer->id,
            'amount'    => 0,
            'currency'  => 'usd',
        )
    );

    $invoice = Stripe_Invoice::upcoming(
        array(
            'customer' => $customer->id,
        )
    );
    $this->assertEqual($invoice->customer, $customer->id);
    $this->assertEqual($invoice->attempted, false);
  }

  // This is really just making sure that this operation does not trigger any
  // warnings, as it's highly nested.
  public function testAll()
  {
    authorizeFromEnv();
    $invoices = Stripe_Invoice::all();
    $this->assertTrue(count($invoices) > 0);
  }

}
