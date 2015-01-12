<?php

class Stripe_InvoiceTest extends Stripe_TestCase
{
  public function testUpcoming()
  {
    self::authorizeFromEnv();
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
    $this->assertSame($invoice->customer, $customer->id);
    $this->assertSame($invoice->attempted, false);
  }

  public function testItemsAccessWithParameter()
  {
    self::authorizeFromEnv();
    $customer = self::createTestCustomer();

    Stripe_InvoiceItem::create(
        array(
            'customer'  => $customer->id,
            'amount'    => 100,
            'currency'  => 'usd',
        )
    );

    $invoice = Stripe_Invoice::upcoming(
        array(
            'customer' => $customer->id,
        )
    );

    $lines = $invoice->lines->all(
        array(
          'limit' => 10,
        )
    );

    $this->assertSame(count($lines->data), 1);
    $this->assertSame($lines->data[0]->amount, 100);
  }

  // This is really just making sure that this operation does not trigger any
  // warnings, as it's highly nested.
  public function testAll()
  {
    self::authorizeFromEnv();
    $invoices = Stripe_Invoice::all();
    $this->assertTrue(count($invoices) > 0);
  }

}
