<?php
namespace Stripe\Test;

use Stripe\InvoiceItem;
use Stripe\Invoice;

class InvoiceTest extends TestCase
{
  public function testUpcoming()
  {
    authorizeFromEnv();
    $customer = self::createTestCustomer();

    InvoiceItem::create(
      array(
        'customer'  => $customer->id,
        'amount'    => 0,
        'currency'  => 'usd',
      ));

    $invoice = Invoice::upcoming(
      array(
        'customer' => $customer->id,
      ));
    $this->assertEqual($invoice->customer, $customer->id);
    $this->assertEqual($invoice->attempted, false);
  }

}
