<?php

/**
 * Base class for Stripe test cases, provides some utility methods for creating
 * objects.
 */
abstract class StripeTestCase extends UnitTestCase
{

  /**
   * Create a valid test customer.
   */
  protected static function createTestCustomer(array $attributes = array())
  {
    authorizeFromEnv();

    return Stripe_Customer::create(
      $attributes + array(
        'card' => array(
          'number'    => '4242424242424242',
          'exp_month' => 5,
          'exp_year'  => date('Y') + 3,
        ),
      ));
  }

  /**
   * Verify that a plan with a given ID exists, or create a new one if it does
   * not.
   */
  protected static function retrieveOrCreatePlan($id)
  {
    authorizeFromEnv();

    try {
      $plan = Stripe_Plan::retrieve($id);
    } catch (Stripe_InvalidRequestError $exception) {
      $plan = Stripe_Plan::create(
        array(
          'id'        => $id,
          'amount'    => 0,
          'currency'  => 'usd',
          'interval'  => 'month',
          'name'      => 'Gold Test Plan',
        ));
    }
  }

}
