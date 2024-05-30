<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * This is an object representing your Stripe balance. You can retrieve it to see
 * the balance currently on your Stripe account.
 *
 * You can also retrieve the balance history, which contains a list of
 * <a href="https://stripe.com/docs/reporting/balance-transaction-types">transactions</a> that contributed to the balance
 * (charges, payouts, and so forth).
 *
 * The available and pending amounts for each currency are broken down further by
 * payment source types.
 *
 * Related guide: <a href="https://stripe.com/docs/connect/account-balances">Understanding Connect account balances</a>
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject[] $available Available funds that you can transfer or pay out automatically by Stripe or explicitly through the <a href="https://stripe.com/docs/api#transfers">Transfers API</a> or <a href="https://stripe.com/docs/api#payouts">Payouts API</a>. You can find the available balance for each currency and payment type in the <code>source_types</code> property.
 * @property null|\Stripe\StripeObject[] $connect_reserved Funds held due to negative balances on connected accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">account.controller.requirement_collection</a> is <code>application</code>, which includes Custom accounts. You can find the connect reserve balance for each currency and payment type in the <code>source_types</code> property.
 * @property null|\Stripe\StripeObject[] $instant_available Funds that you can pay out using Instant Payouts.
 * @property null|\Stripe\StripeObject $issuing
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject[] $pending Funds that aren't available in the balance yet. You can find the pending balance for each currency and each payment type in the <code>source_types</code> property.
 */
class Balance extends SingletonApiResource
{
    const OBJECT_NAME = 'balance';

    /**
     * Retrieves the current account balance, based on the authentication that was used
     * to make the request.  For a sample request, see <a
     * href="/docs/connect/account-balances#accounting-for-negative-balances">Accounting
     * for negative balances</a>.
     *
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Balance
     */
    public static function retrieve($opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static(null, $opts);
        $instance->refresh();

        return $instance;
    }
}
