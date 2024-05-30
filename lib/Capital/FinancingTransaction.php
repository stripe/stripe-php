<?php

// File generated from our OpenAPI spec

namespace Stripe\Capital;

/**
 * This is an object representing the details of a transaction on a Capital financing object.
 *
 * @property string $id A unique identifier for the financing transaction object.
 * @property string $object The object type: financing_transaction
 * @property string $account The ID of the merchant associated with this financing transaction.
 * @property int $created_at Time at which the financing transaction was created. Given in seconds since unix epoch.
 * @property \Stripe\StripeObject $details This is an object representing a transaction on a Capital financing offer.
 * @property null|string $financing_offer The Capital financing offer for this financing transaction.
 * @property null|string $legacy_balance_transaction_source The Capital transaction object that predates the Financing Transactions API and corresponds with the balance transaction that was created as a result of this financing transaction.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $type The type of the financing transaction.
 * @property null|string $user_facing_description A human-friendly description of the financing transaction.
 */
class FinancingTransaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'capital.financing_transaction';

    const TYPE_PAYMENT = 'payment';
    const TYPE_PAYOUT = 'payout';
    const TYPE_REVERSAL = 'reversal';

    /**
     * Returns a list of financing transactions. The transactions are returned in
     * sorted order, with the most recent transactions appearing first.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Capital\FinancingTransaction> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a financing transaction for a financing offer.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capital\FinancingTransaction
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
