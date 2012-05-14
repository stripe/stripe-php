<?php

namespace Stripe\Tests;

class CardErrorTest extends \PHPUnit_Framework_TestCase
{
	public function testDecline()
	{
		\Stripe\Stripe::setApiKey('tGN0bIwXnHdwOa85VABjPdSn8nWY7G7I');
		
		try {
		\Stripe\Charge::create(array(
				'amount' => 100,
				'currency' => 'usd',
				'card' => array(
						'number' => '4000000000000002', 
						'exp_month' => '3', 
						'exp_year' => '2020')));
		}
		catch(\Stripe\CardError $e) {
			$body = $e->getJsonBody();
			
			$this->assertSame(402, $e->getHttpStatus());
			$this->assertSame('card_error', $body['error']['type']);
			$this->assertSame('card_declined', $body['error']['code']);
			$this->assertSame('Your card was declined.', $body['error']['message']);
		}
	}
}