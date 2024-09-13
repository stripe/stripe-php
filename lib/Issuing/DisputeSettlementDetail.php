<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * Represents a record from the card network of a money movement or change in state for an Issuing dispute. These records are included in the settlement reports that we receive from networks and expose to users as Settlement objects.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Disputed amount in the card’s currency and in the smallest currency unit. Usually the amount of the transaction, but can differ (usually because of currency fluctuation).
 * @property string $card The card used to make the original transaction.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency The currency the original transaction was made in. Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $dispute The ID of the linked dispute.
 * @property string $event_type The type of event corresponding to this dispute settlement detail, representing the stage in the dispute network lifecycle.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $network The card network for this dispute settlement detail. One of [&quot;visa&quot;, &quot;mastercard&quot;, &quot;maestro&quot;]
 * @property null|string $settlement The ID of the linked card network settlement.
 */
class DisputeSettlementDetail extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.dispute_settlement_detail';

    const EVENT_TYPE_FILING = 'filing';
    const EVENT_TYPE_LOSS = 'loss';
    const EVENT_TYPE_REPRESENTMENT = 'representment';
    const EVENT_TYPE_WIN = 'win';

    const NETWORK_MAESTRO = 'maestro';
    const NETWORK_MASTERCARD = 'mastercard';
    const NETWORK_VISA = 'visa';

    /**
     * Returns a list of Issuing <code>DisputeSettlementDetail</code> objects. The
     * objects are sorted in descending order by creation date, with the most recently
     * created object appearing first.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Issuing\DisputeSettlementDetail> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>DisputeSettlementDetail</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\DisputeSettlementDetail
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
