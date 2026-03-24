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
 * @property null|(object{public_name: string}&\Stripe\StripeObject) $beneficiary
 * @property null|int $canceled_at Time at which the order was canceled. Measured in seconds since the Unix epoch.
 * @property null|string $cancellation_reason Reason for the cancellation of this order.
 * @property null|string $certificate For delivered orders, a URL to a delivery certificate for the order.
 * @property null|int $confirmed_at Time at which the order was confirmed. Measured in seconds since the Unix epoch.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase, representing the currency for this order.
 * @property null|int $delayed_at Time at which the order's expected_delivery_year was delayed. Measured in seconds since the Unix epoch.
 * @property null|int $delivered_at Time at which the order was delivered. Measured in seconds since the Unix epoch.
 * @property ((object{delivered_at: int, location: null|(object{city: null|string, country: string, latitude: null|float, longitude: null|float, region: null|string}&\Stripe\StripeObject), metric_tons: string, registry_url: null|string, supplier: Supplier}&\Stripe\StripeObject))[] $delivery_details Details about the delivery of carbon removal for this order.
 * @property int $expected_delivery_year The year this order is expected to be delivered.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $metric_tons Quantity of carbon removal that is included in this order.
 * @property Product|string $product Unique ID for the Climate <code>Product</code> this order is purchasing.
 * @property null|int $product_substituted_at Time at which the order's product was substituted for a different product. Measured in seconds since the Unix epoch.
 * @property string $status The current status of this order.
 */
class Order extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'climate.order';

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
     * Creates a Climate order object for a given Climate product. The order will be
     * processed immediately after creation and payment will be deducted your Stripe
     * balance.
     *
     * @param null|array{amount?: int, beneficiary?: array{public_name: string}, currency?: string, expand?: string[], metadata?: array<string, string>, metric_tons?: string, product: string} $params
     * @param null|array|string $options
     *
     * @return Order the created resource
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
     * Lists all Climate order objects. The orders are returned sorted by creation
     * date, with the most recently created orders appearing first.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Order> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a Climate order object with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Order
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

    /**
     * Updates the specified order by setting the values of the parameters passed.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{beneficiary?: null|array{public_name: null|string}, expand?: string[], metadata?: array<string, string>} $params
     * @param null|array|string $opts
     *
     * @return Order the updated resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Order the canceled order
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
