<?php

namespace Stripe\Tests;

class StripeTestCase extends \PHPUnit_Framework_TestCase
{
	protected function setUp()
	{
		\Stripe\Stripe::setApiKey('tGN0bIwXnHdwOa85VABjPdSn8nWY7G7I');
	}
	
	protected function generateRandomString()
	{
		$chars = 'abcdefghijklmnopqrstuvwxyz';
		$str = '';
		for ($i = 0; $i < 10; $i++) {
			$str .= $chars[rand(0, strlen($chars)-1)];
		}
	
		return $str;
	}
	
	protected function getTestCustomer(array $attributes = array())
	{
		return \Stripe\Customer::create($attributes + array(
				'card' => array(
						'number'    => '4242424242424242',
						'exp_month' => 5,
						'exp_year'  => date('Y') + 3
				)));
	}
	
}