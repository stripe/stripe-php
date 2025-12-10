<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * This is an object representing your Stripe balance. You can retrieve it to see
 * the balance currently on your Stripe account.
 *
 * The top-level <code>available</code> and <code>pending</code> comprise your &quot;payments balance.&quot;
 *
 * Related guide: <a href="https://docs.stripe.com/payments/balances">Balances and settlement time</a>, <a href="https://docs.stripe.com/connect/account-balances">Understanding Connect account balances</a>
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{amount: int, currency: string, source_types?: (object{bank_account?: int, card?: int, fpx?: int}&StripeObject)}&StripeObject)[] $available Available funds that you can transfer or pay out automatically by Stripe or explicitly through the <a href="https://api.stripe.com#transfers">Transfers API</a> or <a href="https://api.stripe.com#payouts">Payouts API</a>. You can find the available balance for each currency and payment type in the <code>source_types</code> property.
 * @property null|(object{amount: int, currency: string, source_types?: (object{bank_account?: int, card?: int, fpx?: int}&StripeObject)}&StripeObject)[] $connect_reserved Funds held due to negative balances on connected accounts where <a href="/api/accounts/object#account_object-controller-requirement_collection">account.controller.requirement_collection</a> is <code>application</code>, which includes Custom accounts. You can find the connect reserve balance for each currency and payment type in the <code>source_types</code> property.
 * @property null|(object{amount: int, currency: string, net_available?: (object{amount: int, destination: string, source_types?: (object{bank_account?: int, card?: int, fpx?: int}&StripeObject)}&StripeObject)[], source_types?: (object{bank_account?: int, card?: int, fpx?: int}&StripeObject)}&StripeObject)[] $instant_available Funds that you can pay out using Instant Payouts.
 * @property null|(object{available: (object{amount: int, currency: string, source_types?: (object{bank_account?: int, card?: int, fpx?: int}&StripeObject)}&StripeObject)[]}&StripeObject) $issuing
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{amount: int, currency: string, source_types?: (object{bank_account?: int, card?: int, fpx?: int}&StripeObject)}&StripeObject)[] $pending Funds that aren't available in the balance yet. You can find the pending balance for each currency and each payment type in the <code>source_types</code> property.
 * @property null|(object{available: (object{amount: int, currency: string, source_types?: (object{bank_account?: int, card?: int, fpx?: int}&StripeObject)}&StripeObject)[], pending: (object{amount: int, currency: string, source_types?: (object{bank_account?: int, card?: int, fpx?: int}&StripeObject)}&StripeObject)[]}&StripeObject) $refund_and_dispute_prefunding
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
     * @return Balance
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static(null, $opts);
        $instance->refresh();

        return $instance;
    }
}
