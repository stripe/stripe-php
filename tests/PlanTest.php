<?php

namespace Stripe;

class PlanTest extends TestCase
{
    /**
     * @before
     */
    public function setUpStripeStub()
    {
        $this->enableStripeStub();
    }

    /**
     * @after
     */
    public function tearDownStripeStub()
    {
        $this->disableStripeStub();
    }

    public function testRetrieve()
    {
        $plan = Plan::retrieve('gold');
        $this->assertTrue(is_a($plan, 'Stripe\\Plan'));
    }

    public function testUpdate()
    {
        $plan = Plan::update('gold', array('name' => 'New name'));
        $this->assertTrue(is_a($plan, 'Stripe\\Plan'));
    }

    public function testDelete()
    {
        $plan = Plan::retrieve('gold');
        $plan = $plan->delete();
        $this->assertTrue(is_a($plan, 'Stripe\\Plan'));
    }

    public function testSave()
    {
        $plan = Plan::retrieve('gold');
        $plan->name = 'A new plan name';
        $plan = $plan->save();
        $this->assertTrue(is_a($plan, 'Stripe\\Plan'));
    }

    public function testAll()
    {
        $plans = Plan::all();
        $this->assertTrue(is_a($plans, 'Stripe\\Collection'));
        $this->assertTrue(is_a($plans->data[0], 'Stripe\\Plan'));
    }
}
