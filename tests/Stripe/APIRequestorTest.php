<?php

namespace Stripe\Tests;

class APIRequestorTest extends \PHPUnit_Framework_TestCase
{
	public function testEncode()
	{
		$encode1 = \Stripe\ApiRequestor::encode(array(
				'my' => 'value', 
				'that' => array('your' => 'example'), 
				'bar' => 1, 
				'baz' => null));
		
		$encode2 = \Stripe\ApiRequestor::encode(array(
				'that' => array(
						'your' => 'example',
						'foo' => null)));
		
		$this->assertSame('my=value&that%5Byour%5D=example&bar=1', $encode1);
		$this->assertSame('that%5Byour%5D=example', $encode2);
	}
}