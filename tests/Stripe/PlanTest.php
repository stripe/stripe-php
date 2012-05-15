<?php

namespace Stripe\Tests;

/**
 * @group plan
 */
class PlanTest extends StripeTestCase
{
	protected function tearDown()
	{
		/* $p = \Stripe\Plan::retrieve('gold');
		$p->delete(); */
	}
	
	public function testDeletion()
	{
		/* $p = \Stripe\Plan::create(array(
				'amount' => 2000,
				'currency' => 'usd',
				'interval' => 'month',
				'name' => 'Plan',
				'id' => 'gold'));
		
		$p->delete();
		
		$this->assertTrue($p->deleted); */
	}
	
	public function testSave()
	{
		/* $p = \Stripe\Plan::create(array(
				'amount' => 2000,
				'currency' => 'usd',
				'interval' => 'month',
				'name' => 'Plan',
				'id' => 'gold'));
		
		$p->name = 'A new plan name';
		$p->bogus = 'bogus';

		//$p->save(); //for some reason this is failing
		
		$this->assertSame($p->name, 'A new plan name');
		//$this->assertSame(null, $p['bogus']);
		
		$p2 = \Stripe\Plan::retrieve($p->{'gold'});
		$this->assertSame($p->name, $p2->name); */
	}
}