<?php

// File generated from our OpenAPI spec

namespace Stripe\Climate;

/**
 * Orders represent your intent to purchase a particular Climate product. When you create an order, the
 * payment is deducted from your merchant balance.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount_fees Total amount of <a href="https://frontierclimate.com/">Frontier</a>'s service fees in the currency's smallest unit.
 * @property int $amount_subtotal Total amount of the carbon removal in the currency's smallest unit.
 * @property int $amount_total Total amount of the order including fees in the currency's smallest unit.
 * @property null|\Stripe\StripeObject $beneficiary
 * @property null|int $canceled_at Time at which the order was canceled. Measured in seconds since the Unix epoch.
 * @property null|string $cancellation_reason Reason for the cancellation of this order.
 * @property null|string $certificate For delivered orders, a URL to a delivery certificate for the order.
 * @property null|int $confirmed_at Time at which the order was confirmed. Measured in seconds since the Unix epoch.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase, representing the currency for this order.
 * @property null|int $delayed_at Time at which the order's expected_delivery_year was delayed. Measured in seconds since the Unix epoch.
 * @property null|int $delivered_at Time at which the order was delivered. Measured in seconds since the Unix epoch.
 * @property \Stripe\StripeObject[] $delivery_details Details about the delivery of carbon removal for this order.
 * @property int $expected_delivery_year The year this order is expected to be delivered.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $metric_tons Quantity of carbon removal that is included in this order.
 * @property string|\Stripe\Climate\Product $product Unique ID for the Climate <code>Product</code> this order is purchasing.
 * @property null|int $product_substituted_at Time at which the order's product was substituted for a different product. Measured in seconds since the Unix epoch.
 * @property string $status The current status of this order.
 */
class Order extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'climate.order';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;

    const CANCELLATION_REASON_EXPIRED = 'expired';
    const CANCELLATION_REASON_PRODUCT_UNAVAILABLE = 'product_unavailable';
    const CANCELLATION_REASON_REQUESTED = 'requested';

    const STATUS_AWAITING_FUNDS = 'awaiting_funds';
    const STATUS_CANCELED = 'canceled';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_OPEN = 'open';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Climate\Order the canceled order
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
