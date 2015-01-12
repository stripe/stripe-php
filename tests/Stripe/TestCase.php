<?php

/**
 * Base class for Stripe test cases, provides some utility methods for creating
 * objects.
 */
class Stripe_TestCase extends \PHPUnit_Framework_TestCase
{
    const API_KEY = 'tGN0bIwXnHdwOa85VABjPdSn8nWY7G7I';

    protected static function authorizeFromEnv()
    {
        $apiKey = getenv('STRIPE_API_KEY');
        if (!$apiKey) {
            $apiKey = self::API_KEY;
        }

        Stripe::setApiKey($apiKey);
    }

    /**
     * Create a valid test charge.
     */
    protected static function createTestCharge(array $attributes = array())
    {
        self::authorizeFromEnv();

        return Stripe_Charge::create(
            $attributes + array(
                'amount' => 2000,
                'currency' => 'usd',
                'description' => 'Charge for test@example.com',
                'card' => array(
                    'number' => '4242424242424242',
                    'exp_month' => 5,
                    'exp_year' => date('Y') + 3,
                ),
            )
        );
    }

    /**
     * Create a valid test customer.
     */
    protected static function createTestCustomer(array $attributes = array())
    {
        self::authorizeFromEnv();

        return Stripe_Customer::create(
            $attributes + array(
                'card' => array(
                    'number' => '4242424242424242',
                    'exp_month' => 5,
                    'exp_year' => date('Y') + 3,
                ),
            )
        );
    }

    /**
     * Create a valid test recipient
     */
    protected static function createTestRecipient(array $attributes = array())
    {
        self::authorizeFromEnv();

        return Stripe_Recipient::create(
            $attributes + array(
                'name' => 'PHP Test',
                'type' => 'individual',
                'tax_id' => '000000000',
                'bank_account' => array(
                    'country'    => 'US',
                    'routing_number' => '110000000',
                    'account_number'  => '000123456789'
                ),
            )
        );
    }

    /**
     * Generate a random 8-character string. Useful for ensuring
     * multiple test suite runs don't conflict
     */
    protected static function randomString()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyz';
        $str = '';
        for ($i = 0; $i < 10; $i++) {
            $str .= $chars[rand(0, strlen($chars)-1)];
        }

        return $str;
    }

    /**
     * Verify that a plan with a given ID exists, or create a new one if it does
     * not.
     */
    protected static function retrieveOrCreatePlan($id)
    {
        self::authorizeFromEnv();

        try {
            $plan = Stripe_Plan::retrieve($id);
        } catch (Stripe_InvalidRequestError $exception) {
            $plan = Stripe_Plan::create(
                array(
                    'id' => $id,
                    'amount' => 0,
                    'currency' => 'usd',
                    'interval' => 'month',
                    'name' => 'Gold Test Plan',
                )
            );
        }
    }

    /**
     * Verify that a coupon with a given ID exists, or create a new one if it
     * does not.
     */
    protected static function retrieveOrCreateCoupon($id)
    {
        self::authorizeFromEnv();

        try {
            $coupon = Stripe_Coupon::retrieve($id);
        } catch (Stripe_InvalidRequestError $exception) {
            $coupon = Stripe_Coupon::create(
                array(
                    'id' => $id,
                    'duration' => 'forever',
                    'percent_off' => 25,
                )
            );
        }
    }
}
