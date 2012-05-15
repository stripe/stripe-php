<?php

namespace Stripe\Tests;

class InvoiceTest extends StripeTestCase
{
	public function testUpcoming()
	{
		$customer = $this->getTestCustomer();
		
		\Stripe\InvoiceItem::create(array(
				'customer' => $customer->id,
				'amount' => 0,
				'currency' => 'usd'));
		
		$invoice = \Stripe\Invoice::upcoming(array(
				'customer' => $customer->id));
		
		$this->assertSame($invoice->customer, $customer->id);
		$this->assertSame(false, $invoice->attempted);
	}
}