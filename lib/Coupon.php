<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A coupon contains information about a percent-off or amount-off discount you
 * might want to apply to a customer. Coupons may be applied to <a href="https://stripe.com/docs/api#subscriptions">subscriptions</a>, <a href="https://stripe.com/docs/api#invoices">invoices</a>,
 * <a href="https://stripe.com/docs/api/checkout/sessions">checkout sessions</a>, <a href="https://stripe.com/docs/api#quotes">quotes</a>, and more. Coupons do not work with conventional one-off <a href="https://stripe.com/docs/api#create_charge">charges</a> or <a href="https://stripe.com/docs/api/payment_intents">payment intents</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|int $amount_off Amount (in the <code>currency</code> specified) that will be taken off the subtotal of any invoices for this customer.
 * @property null|(object{products: string[]}&StripeObject) $applies_to
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $currency If <code>amount_off</code> has been set, the three-letter <a href="https://stripe.com/docs/currencies">ISO code for the currency</a> of the amount to take off.
 * @property null|StripeObject $currency_options Coupons defined in each available currency option. Each key must be a three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a> and a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $duration One of <code>forever</code>, <code>once</code>, or <code>repeating</code>. Describes how long a customer who applies this coupon will get the discount.
 * @property null|int $duration_in_months If <code>duration</code> is <code>repeating</code>, the number of months the coupon applies. Null if coupon <code>duration</code> is <code>forever</code> or <code>once</code>.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|int $max_redemptions Maximum number of times this coupon can be redeemed, in total, across all customers, before it is no longer valid.
 * @property null|StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $name Name of the coupon displayed to customers on for instance invoices or receipts.
 * @property null|float $percent_off Percent that will be taken off the subtotal of any invoices for this customer for the duration of the coupon. For example, a coupon with percent_off of 50 will make a $ (or local equivalent)100 invoice $ (or local equivalent)50 instead.
 * @property null|int $redeem_by Date after which the coupon can no longer be redeemed.
 * @property int $times_redeemed Number of times this coupon has been applied to a customer.
 * @property bool $valid Taking account of the above properties, whether this coupon can still be applied to a customer.
 */
class Coupon extends ApiResource
{
    const OBJECT_NAME = 'coupon';

    use ApiOperations\Update;

    const DURATION_FOREVER = 'forever';
    const DURATION_ONCE = 'once';
    const DURATION_REPEATING = 'repeating';

    /**
     * You can create coupons easily via the <a
     * href="https://dashboard.stripe.com/coupons">coupon management</a> page of the
     * Stripe dashboard. Coupon creation is also accessible via the API if you need to
     * create coupons on the fly.
     *
     * A coupon has either a <code>percent_off</code> or an <code>amount_off</code> and
     * <code>currency</code>. If you set an <code>amount_off</code>, that amount will
     * be subtracted from any invoice’s subtotal. For example, an invoice with a
     * subtotal of <currency>100</currency> will have a final total of
     * <currency>0</currency> if a coupon with an <code>amount_off</code> of
     * <amount>200</amount> is applied to it and an invoice with a subtotal of
     * <currency>300</currency> will have a final total of <currency>100</currency> if
     * a coupon with an <code>amount_off</code> of <amount>200</amount> is applied to
     * it.
     *
     * @param null|array{amount_off?: int, applies_to?: array{products?: string[]}, currency?: string, currency_options?: StripeObject, duration?: string, duration_in_months?: int, expand?: string[], id?: string, max_redemptions?: int, metadata?: null|StripeObject, name?: string, percent_off?: float, redeem_by?: int} $params
     * @param null|array|string $options
     *
     * @return Coupon the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * You can delete coupons via the <a
     * href="https://dashboard.stripe.com/coupons">coupon management</a> page of the
     * Stripe dashboard. However, deleting a coupon does not affect any customers who
     * have already applied the coupon; it means that new customers can’t redeem the
     * coupon. You can also delete coupons via the API.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Coupon the deleted resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function delete($params = null, $opts = null)
    {
        self::_validateParams($params);

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * Returns a list of your coupons.
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<Coupon> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the coupon with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Coupon
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

    /**
     * Updates the metadata of a coupon. Other coupon details (currency, duration,
     * amount_off) are, by design, not editable.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{currency_options?: StripeObject, expand?: string[], metadata?: null|StripeObject, name?: string} $params
     * @param null|array|string $opts
     *
     * @return Coupon the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
