<?php

// File generated from our OpenAPI spec

namespace Stripe\Capital;

/**
 * This is an object representing an offer of financing from
 * Stripe Capital to a Connect subaccount.
 *
 * @property string $id A unique identifier for the financing object.
 * @property string $object The object type: financing_offer.
 * @property null|\Stripe\StripeObject $accepted_terms This is an object representing the terms of an offer of financing from Stripe Capital to a Connected account. This resource represents the terms accepted by the Connected account, which may differ from those offered.
 * @property string $account The ID of the merchant associated with this financing object.
 * @property null|int $charged_off_at The time at which this financing offer was charged off, if applicable. Given in seconds since unix epoch.
 * @property int $created Time at which the offer was created. Given in seconds since unix epoch.
 * @property float $expires_after Time at which the offer expires. Given in seconds since unix epoch.
 * @property null|string $financing_type The type of financing being offered.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|\Stripe\StripeObject $offered_terms This is an object representing the terms of an offer of financing from Stripe Capital to a Connected account. This resource represents both the terms offered to the Connected account.
 * @property null|string $product_type Financing product identifier.
 * @property null|string $replacement The ID of the financing offer that replaced this offer.
 * @property null|string $replacement_for The ID of the financing offer that this offer is a replacement for.
 * @property string $status The current status of the offer.
 * @property null|string $type See <a href="https://stripe.com/docs/api/capital/connect_financing_object#financing_offer_object-financing_type">financing_type</a>.
 */
class FinancingOffer extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'capital.financing_offer';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;

    const FINANCING_TYPE_CASH_ADVANCE = 'cash_advance';
    const FINANCING_TYPE_FLEX_LOAN = 'flex_loan';

    const PRODUCT_TYPE_REFILL = 'refill';
    const PRODUCT_TYPE_STANDARD = 'standard';

    const STATUS_ACCEPTED = 'accepted';
    const STATUS_CANCELED = 'canceled';
    const STATUS_COMPLETED = 'completed';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_EXPIRED = 'expired';
    const STATUS_FULLY_REPAID = 'fully_repaid';
    const STATUS_PAID_OUT = 'paid_out';
    const STATUS_REJECTED = 'rejected';
    const STATUS_REPLACED = 'replaced';
    const STATUS_UNDELIVERED = 'undelivered';

    const TYPE_CASH_ADVANCE = 'cash_advance';
    const TYPE_FLEX_LOAN = 'flex_loan';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capital\FinancingOffer the marked financing offer
     */
    public function markDelivered($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/mark_delivered';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
