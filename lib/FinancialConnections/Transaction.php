<?php

// File generated from our OpenAPI spec

namespace Stripe\FinancialConnections;

/**
 * A Transaction represents a real transaction that affects a Financial Connections Account balance.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $account The ID of the Financial Connections Account this transaction belongs to.
 * @property int $amount The amount of this transaction, in cents (or local equivalent).
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $description The description of this transaction.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The status of the transaction.
 * @property (object{posted_at: null|int, void_at: null|int}&\Stripe\StripeObject) $status_transitions
 * @property int $transacted_at Time at which the transaction was transacted. Measured in seconds since the Unix epoch.
 * @property string $transaction_refresh The token of the transaction refresh that last updated or created this transaction.
 * @property int $updated Time at which the object was last updated. Measured in seconds since the Unix epoch.
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'financial_connections.transaction';

    const STATUS_PENDING = 'pending';
    const STATUS_POSTED = 'posted';
    const STATUS_VOID = 'void';

    /**
     * Returns a list of Financial Connections <code>Transaction</code> objects.
     *
     * @param null|array{account: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, transacted_at?: array|int, transaction_refresh?: array{after: string}} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Transaction> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a Financial Connections <code>Transaction</code>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Transaction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
