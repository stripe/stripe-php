<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * Indicates the credit balance for credits granted to a customer.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject[] $balances The credit balances. One entry per credit grant currency. If a customer only has credit grants in a single currency, then this will have a single balance entry.
 * @property string|\Stripe\Customer $customer The customer the balance is for.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class CreditBalanceSummary extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'billing.credit_balance_summary';

    /**
     * Retrieves the credit balance summary for a customer.
     *
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\CreditBalanceSummary
     */
    public static function retrieve($opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static(null, $opts);
        $instance->refresh();

        return $instance;
    }
}
