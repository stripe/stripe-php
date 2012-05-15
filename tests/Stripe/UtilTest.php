<?php

namespace Stripe\Tests;

class UtilTest extends StripeTestCase
{
	public function testIsList()
	{
		$list = array(5, 'nstaoush', array());
		$this->assertTrue(\Stripe\Util::isList($list));

		$notlist = array(5, 'nstaoush', array(), 'bar' => 'baz');
		$this->assertFalse(\Stripe\Util::isList($notlist));
	}
}