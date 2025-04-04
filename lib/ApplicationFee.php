<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property Account|string $account ID of the Stripe account this fee was taken from.
 * @property int $amount Amount earned, in cents (or local equivalent).
 * @property int $amount_refunded Amount in cents (or local equivalent) refunded (can be less than the amount attribute on the fee if a partial refund was issued)
 * @property Application|string $application ID of the Connect application that earned the fee.
 * @property null|BalanceTransaction|string $balance_transaction Balance transaction that describes the impact of this collected application fee on your account balance (not including refunds).
 * @property Charge|string $charge ID of the charge that the application fee was taken from.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|(object{charge?: string, payout?: string, type: string}&StripeObject) $fee_source Polymorphic source of the application fee. Includes the ID of the object the application fee was created from.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|Charge|string $originating_transaction ID of the corresponding charge on the platform account, if this fee was the result of a charge using the <code>destination</code> parameter.
 * @property bool $refunded Whether the fee has been fully refunded. If the fee is only partially refunded, this attribute will still be false.
 * @property Collection<ApplicationFeeRefund> $refunds A list of refunds that have been applied to the fee.
 */
class ApplicationFee extends ApiResource
{
    const OBJECT_NAME = 'application_fee';

    use ApiOperations\NestedResource;

    /**
     * Returns a list of application fees you’ve previously collected. The application
     * fees are returned in sorted order, with the most recent fees appearing first.
     *
     * @param null|array{charge?: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<ApplicationFee> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an application fee that your account has collected. The
     * same information is returned when refunding the application fee.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return ApplicationFee
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    const PATH_REFUNDS = '/refunds';

    /**
     * @param string $id the ID of the application fee on which to retrieve the application fee refunds
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection<ApplicationFeeRefund> the list of application fee refunds
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function allRefunds($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_REFUNDS, $params, $opts);
    }

    /**
     * @param string $id the ID of the application fee on which to create the application fee refund
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return ApplicationFeeRefund
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function createRefund($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_REFUNDS, $params, $opts);
    }

    /**
     * @param string $id the ID of the application fee to which the application fee refund belongs
     * @param string $refundId the ID of the application fee refund to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return ApplicationFeeRefund
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieveRefund($id, $refundId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_REFUNDS, $refundId, $params, $opts);
    }

    /**
     * @param string $id the ID of the application fee to which the application fee refund belongs
     * @param string $refundId the ID of the application fee refund to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return ApplicationFeeRefund
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function updateRefund($id, $refundId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_REFUNDS, $refundId, $params, $opts);
    }
}
