<?php

// File generated from our OpenAPI spec

namespace Stripe\Treasury;

/**
 * You can reverse some <a href="https://stripe.com/docs/api#received_credits">ReceivedCredits</a> depending on their network and source flow. Reversing a ReceivedCredit leads to the creation of a new object known as a CreditReversal.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount (in cents) transferred.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $financial_account The FinancialAccount to reverse funds from.
 * @property null|string $hosted_regulatory_receipt_url A <a href="https://stripe.com/docs/treasury/moving-money/regulatory-receipts">hosted transaction receipt</a> URL that is provided when money movement is considered regulated under Stripe's money transmission licenses.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $network The rails used to reverse the funds.
 * @property string $received_credit The ReceivedCredit being reversed.
 * @property string $status Status of the CreditReversal
 * @property (object{posted_at: null|int}&\Stripe\StripeObject) $status_transitions
 * @property null|string|Transaction $transaction The Transaction associated with this object.
 */
class CreditReversal extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'treasury.credit_reversal';

    const NETWORK_ACH = 'ach';
    const NETWORK_STRIPE = 'stripe';

    const STATUS_CANCELED = 'canceled';
    const STATUS_POSTED = 'posted';
    const STATUS_PROCESSING = 'processing';

    /**
     * Reverses a ReceivedCredit and creates a CreditReversal object.
     *
     * @param null|array{expand?: string[], metadata?: array<string, string>, received_credit: string} $params
     * @param null|array|string $options
     *
     * @return CreditReversal the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of CreditReversals.
     *
     * @param null|array{ending_before?: string, expand?: string[], financial_account: string, limit?: int, received_credit?: string, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<CreditReversal> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing CreditReversal by passing the unique
     * CreditReversal ID from either the CreditReversal creation request or
     * CreditReversal list.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return CreditReversal
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
