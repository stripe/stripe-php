<?php

// File generated from our OpenAPI spec

namespace Stripe\DelegatedCheckout;

/**
 * A requested session is a session that has been requested by a customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|int $amount_subtotal The subtotal amount of the requested session.
 * @property null|int $amount_total The total amount of the requested session.
 * @property int $created_at Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $customer The customer for this requested session.
 * @property int $expires_at Time at which the requested session expires. Measured in seconds since the Unix epoch.
 * @property null|(object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), email: null|string, fulfillment_options: null|((object{shipping: null|(object{shipping_options: null|((object{description: null|string, display_name: string, earliest_delivery_time: null|int, key: string, latest_delivery_time: null|int, shipping_amount: int}&\Stripe\StripeObject))[]}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject))[], name: null|string, phone: null|string, selected_fulfillment_option: null|(object{shipping: null|(object{shipping_option: null|string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $fulfillment_details The details of the fulfillment.
 * @property ((object{amount_discount: int, amount_subtotal: int, description: null|string, images: null|string[], key: string, name: string, product_details?: (object{custom_attributes: null|(object{display_name: string, value: string}&\Stripe\StripeObject)[], description: null|string, disclosures: null|(object{content: string, content_type: string, type: string}&\Stripe\StripeObject)[], images: null|string[], title: string}&\Stripe\StripeObject), quantity: int, sku_id: string, unit_amount: int}&\Stripe\StripeObject))[] $line_item_details The line items to be purchased.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{order_id: null|string, order_status_url: null|string}&\Stripe\StripeObject) $order_details The details of the order.
 * @property null|string $payment_method The payment method used for the requested session.
 * @property null|(object{billing_details: null|(object{address: null|(object{city: string, country: string, line1: string, line2: null|string, postal_code: string, state: string}&\Stripe\StripeObject), email: null|string, name: null|string, phone: null|string}&\Stripe\StripeObject), card: null|(object{exp_month: int, exp_year: int, last4: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $payment_method_preview The preview of the payment method to be created when the requested session is confirmed.
 * @property (object{}&\Stripe\StripeObject) $seller_details
 * @property null|string $setup_future_usage Whether or not the payment method should be saved for future use.
 * @property null|\Stripe\StripeObject $shared_metadata The metadata shared with the seller.
 * @property null|string $shared_payment_issued_token The SPT used for payment.
 * @property string $status The status of the requested session.
 * @property (object{amount_cart_discount: null|int, amount_fulfillment: null|int, amount_items_discount: null|int, amount_tax: null|int, applicable_fees: null|((object{amount: int, description: null|string, display_name: string}&\Stripe\StripeObject))[]}&\Stripe\StripeObject) $total_details
 * @property int $updated_at Time at which the object was last updated. Measured in seconds since the Unix epoch.
 */
class RequestedSession extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'delegated_checkout.requested_session';

    use \Stripe\ApiOperations\Update;

    const STATUS_COMPLETED = 'completed';
    const STATUS_EXPIRED = 'expired';
    const STATUS_OPEN = 'open';

    /**
     * Creates a requested session.
     *
     * @param null|array{currency: string, customer?: string, expand?: string[], fulfillment_details?: array{address?: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state: string}, email?: string, name?: string, phone?: string}, line_item_details: array{quantity: int, sku_id: string}[], metadata?: array<string, string>, payment_method?: string, payment_method_data?: array{billing_details?: array{address?: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state: string}, email?: string, name?: string, phone?: string}, card?: array{cvc?: string, exp_month: int, exp_year: int, number: string}, type?: string}, seller_details: array{network_profile: string}, setup_future_usage?: string, shared_metadata?: array<string, string>} $params
     * @param null|array|string $options
     *
     * @return RequestedSession the created resource
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
     * Retrieves a requested session.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return RequestedSession
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
     * Updates a requested session.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], fulfillment_details?: array{address?: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state: string}, email?: string, name?: string, phone?: string, selected_fulfillment_option?: array{shipping: array{shipping_option: string}, type: string}}, line_item_details?: array{key: string, quantity: int}[], metadata?: null|array<string, string>, payment_method?: string, payment_method_data?: null|array{billing_details?: array{address?: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state: string}, email?: string, name?: string, phone?: string}, card?: array{cvc?: string, exp_month: int, exp_year: int, number: string}, type?: string}, shared_metadata?: null|array<string, string>} $params
     * @param null|array|string $opts
     *
     * @return RequestedSession the updated resource
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
     * @return RequestedSession the confirmed requested session
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function confirm($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/confirm';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return RequestedSession the expired requested session
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function expire($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/expire';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
