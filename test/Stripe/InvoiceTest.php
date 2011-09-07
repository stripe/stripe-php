<?php

class Stripe_InvoiceTest extends UnitTestCase
{
  public function testUpcoming()
  {
    authorizeFromEnv();
    $c = Stripe_Customer::create(array('card' => array('number' => '4242424242424242', 'exp_month' => 5, 'exp_year' => 2015)));

    $invoice = Stripe_Invoice::upcoming(array('customer' => $c->id));
    $this->assertEqual($invoice->customer, $c->id);
    $this->assertEqual($invoice->attempted, false);
  }
}