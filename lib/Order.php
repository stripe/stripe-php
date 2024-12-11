<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * An Order describes a purchase being made by a customer, including the
 * products &amp; quantities being purchased, the order status, the payment information,
 * and the billing/shipping details.
 *
 * Related guide: <a href="https://stripe.com/docs/orders">Orders overview</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|int $amount_remaining
 * @property int $amount_subtotal Order cost before any discounts or taxes are applied. A positive integer representing the subtotal of the order in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a> (e.g., 100 cents to charge $1.00 or 100 to charge ¥100, a zero-decimal currency).
 * @property int $amount_total Total order cost after discounts and taxes are applied. A positive integer representing the cost of the order in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a> (e.g., 100 cents to charge $1.00 or 100 to charge ¥100, a zero-decimal currency). To submit an order, the total must be either 0 or at least $0.50 USD or <a href="https://stripe.com/docs/currencies#minimum-and-maximum-charge-amounts">equivalent in charge currency</a>.
 * @property null|string|\Stripe\Application $application ID of the Connect application that created the Order, if any.
 * @property (object{enabled: bool, status: null|string}&\Stripe\StripeObject&\stdClass) $automatic_tax
 * @property null|(object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), email: null|string, name: null|string, phone: null|string}&\Stripe\StripeObject&\stdClass) $billing_details Customer billing details associated with the order.
 * @property null|string $client_secret <p>The client secret of this Order. Used for client-side retrieval using a publishable key.</p><p>The client secret can be used to complete a payment for an Order from your frontend. It should not be stored, logged, embedded in URLs, or exposed to anyone other than the customer. Make sure that you have TLS enabled on any page that includes the client secret.</p><p>Refer to our docs for <a href="https://stripe.com/docs/orders-beta/create-and-process">creating and processing an order</a> to learn about how client_secret should be handled.</p>
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property ((object{amount: int, gift_card: null|(object{card: string}&\Stripe\StripeObject&\stdClass), ineligible_line_items: null|string[], type: string}&\Stripe\StripeObject&\stdClass))[] $credits The credits applied to the Order. At most 10 credits can be applied to an Order.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string|\Stripe\Customer $customer The customer which this orders belongs to.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|(string|\Stripe\Discount)[] $discounts The discounts applied to the order. Use <code>expand[]=discounts</code> to expand each discount.
 * @property null|string $ip_address A recent IP address of the purchaser used for tax reporting and tax location inference.
 * @property null|\Stripe\Collection<\Stripe\LineItem> $line_items A list of line items the customer is ordering. Each line item includes information about the product, the quantity, and the resulting cost. There is a maximum of 100 line items.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property (object{payment_intent: null|string|\Stripe\PaymentIntent, settings: null|(object{application_fee_amount: null|int, automatic_payment_methods: null|(object{enabled: bool}&\Stripe\StripeObject&\stdClass), payment_method_options: null|(object{acss_debit?: (object{mandate_options?: (object{custom_mandate_url?: string, interval_description: null|string, payment_schedule: null|string, transaction_type: null|string}&\Stripe\StripeObject&\stdClass), setup_future_usage?: string, verification_method?: string}&\Stripe\StripeObject&\stdClass), afterpay_clearpay?: (object{capture_method?: string, reference: null|string, setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), alipay?: (object{setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), bancontact?: (object{preferred_language: string, setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), card?: (object{capture_method: string, setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), customer_balance?: (object{bank_transfer?: (object{eu_bank_transfer?: (object{country: string}&\Stripe\StripeObject&\stdClass), requested_address_types?: string[], type: null|string}&\Stripe\StripeObject&\stdClass), funding_type: null|string, setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), ideal?: (object{setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), klarna?: (object{capture_method?: string, preferred_locale: null|string, setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), link?: (object{capture_method?: string, persistent_token: null|string, setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), oxxo?: (object{expires_after_days: int, setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), p24?: (object{setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), paypal?: (object{capture_method?: string, line_items?: (object{category?: string, description?: string, name: string, quantity: int, sku?: string, sold_by?: string, tax?: (object{amount: int, behavior: string}&\Stripe\StripeObject&\stdClass), unit_amount: int}&\Stripe\StripeObject&\stdClass)[], preferred_locale: null|string, reference: null|string, reference_id?: null|string, setup_future_usage?: string, subsellers?: string[]}&\Stripe\StripeObject&\stdClass), sepa_debit?: (object{mandate_options?: (object{reference_prefix?: string}&\Stripe\StripeObject&\stdClass), setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), sofort?: (object{preferred_language: null|string, setup_future_usage?: string}&\Stripe\StripeObject&\stdClass), wechat_pay?: (object{app_id: null|string, client: null|string, setup_future_usage?: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), payment_method_types: null|string[], return_url: null|string, statement_descriptor: null|string, statement_descriptor_suffix: null|string, transfer_data: null|(object{amount: null|int, destination: string|\Stripe\Account}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), status: null|string}&\Stripe\StripeObject&\stdClass) $payment
 * @property null|(object{amount_subtotal: int, amount_tax: int, amount_total: int, shipping_rate: null|string|\Stripe\ShippingRate, taxes?: ((object{amount: int, rate: \Stripe\TaxRate, taxability_reason: null|string, taxable_amount: null|int}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass) $shipping_cost The details of the customer cost of shipping, including the customer chosen ShippingRate.
 * @property null|(object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), name: null|string, phone: null|string}&\Stripe\StripeObject&\stdClass) $shipping_details Customer shipping information associated with the order.
 * @property string $status The overall status of the order.
 * @property (object{tax_exempt: string, tax_ids: ((object{type: string, value: null|string}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass) $tax_details
 * @property (object{amount_credit?: int, amount_discount: int, amount_shipping: null|int, amount_tax: int, breakdown?: (object{discounts: (object{amount: int, discount: \Stripe\Discount}&\Stripe\StripeObject&\stdClass)[], taxes: ((object{amount: int, rate: \Stripe\TaxRate, taxability_reason: null|string, taxable_amount: null|int}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $total_details
 */
class Order extends ApiResource
{
    const OBJECT_NAME = 'order';

    use ApiOperations\Update;

    const STATUS_CANCELED = 'canceled';
    const STATUS_COMPLETE = 'complete';
    const STATUS_OPEN = 'open';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SUBMITTED = 'submitted';

    /**
     * Creates a new <code>open</code> order object.
     *
     * @param null|array{automatic_tax?: array{enabled: bool}, billing_details?: null|array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, credits?: null|array{gift_card?: string, type: string}[], currency: string, customer?: string, description?: string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], ip_address?: string, line_items: (array{description?: string, discounts?: null|array{coupon?: string, discount?: string}[], price?: string, price_data?: array{currency?: string, product?: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, product?: string, product_data?: array{description?: null|string, id: string, images?: null|string[], metadata?: null|\Stripe\StripeObject, name: string, package_dimensions?: null|array{height: float, length: float, weight: float, width: float}, shippable?: bool, tax_code?: null|string, url?: null|string}, quantity?: int, tax_rates?: null|string[]})[], metadata?: \Stripe\StripeObject, payment?: array{settings: array{application_fee_amount?: int, payment_method_options?: array{acss_debit?: array{mandate_options?: array{custom_mandate_url?: null|string, interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: null|string, verification_method?: string}, afterpay_clearpay?: array{capture_method?: string, reference?: string, setup_future_usage?: string}, alipay?: array{setup_future_usage?: null|string}, bancontact?: array{preferred_language?: string, setup_future_usage?: null|string}, card?: array{capture_method?: string, setup_future_usage?: string}, customer_balance?: array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, ideal?: array{setup_future_usage?: null|string}, klarna?: array{capture_method?: null|string, preferred_locale?: string, setup_future_usage?: string}, link?: array{capture_method?: null|string, persistent_token?: string, setup_future_usage?: null|string}, oxxo?: array{expires_after_days?: int, setup_future_usage?: string}, p24?: array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, paypal?: array{capture_method?: null|string, line_items?: array{category?: string, description?: string, name: string, quantity: int, sku?: string, sold_by?: string, tax?: array{amount: int, behavior: string}, unit_amount: int}[], preferred_locale?: string, reference?: string, reference_id?: string, risk_correlation_id?: string, setup_future_usage?: null|string, subsellers?: string[]}, sepa_debit?: array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string}, sofort?: array{preferred_language?: null|string, setup_future_usage?: null|string}, wechat_pay?: array{app_id?: string, client: string, setup_future_usage?: string}}, payment_method_types?: string[], return_url?: string, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int, destination: string}}}, shipping_cost?: null|array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: \Stripe\StripeObject}, metadata?: \Stripe\StripeObject, tax_behavior?: string, tax_code?: string, type?: string}}, shipping_details?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: null|string}, tax_details?: array{tax_exempt?: null|string, tax_ids?: array{type: string, value: string}[]}} $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order the created resource
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
     * Returns a list of your orders. The orders are returned sorted by creation date,
     * with the most recently created orders appearing first.
     *
     * @param null|array{customer?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Order> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing order. Supply the unique order ID from
     * either an order creation request or the order list, and Stripe will return the
     * corresponding order information.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates the specific order by setting the values of the parameters passed. Any
     * parameters not provided will be left unchanged.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{automatic_tax?: array{enabled: bool}, billing_details?: null|array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, credits?: null|array{gift_card?: string, type: string}[], currency?: string, customer?: string, description?: null|string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], ip_address?: string, line_items?: (array{description?: string, discounts?: null|array{coupon?: string, discount?: string}[], id?: string, price?: string, price_data?: array{currency?: string, product?: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, product?: string, product_data?: array{description?: null|string, id: string, images?: null|string[], metadata?: null|\Stripe\StripeObject, name: string, package_dimensions?: null|array{height: float, length: float, weight: float, width: float}, shippable?: bool, tax_code?: null|string, url?: null|string}, quantity?: int, tax_rates?: null|string[]})[], metadata?: null|\Stripe\StripeObject, payment?: array{settings: array{application_fee_amount?: null|int, payment_method_options?: array{acss_debit?: null|array{mandate_options?: array{custom_mandate_url?: null|string, interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: null|string, verification_method?: string}, afterpay_clearpay?: null|array{capture_method?: string, reference?: string, setup_future_usage?: string}, alipay?: null|array{setup_future_usage?: null|string}, bancontact?: null|array{preferred_language?: string, setup_future_usage?: null|string}, card?: null|array{capture_method?: string, setup_future_usage?: string}, customer_balance?: null|array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, ideal?: null|array{setup_future_usage?: null|string}, klarna?: null|array{capture_method?: null|string, preferred_locale?: string, setup_future_usage?: string}, link?: null|array{capture_method?: null|string, persistent_token?: string, setup_future_usage?: null|string}, oxxo?: null|array{expires_after_days?: int, setup_future_usage?: string}, p24?: null|array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, paypal?: null|array{capture_method?: null|string, line_items?: array{category?: string, description?: string, name: string, quantity: int, sku?: string, sold_by?: string, tax?: array{amount: int, behavior: string}, unit_amount: int}[], preferred_locale?: string, reference?: string, reference_id?: string, risk_correlation_id?: string, setup_future_usage?: null|string, subsellers?: string[]}, sepa_debit?: null|array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string}, sofort?: null|array{preferred_language?: null|string, setup_future_usage?: null|string}, wechat_pay?: null|array{app_id?: string, client: string, setup_future_usage?: string}}, payment_method_types?: string[], return_url?: null|string, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: null|array{amount?: int, destination: string}}}, shipping_cost?: null|array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: \Stripe\StripeObject}, metadata?: \Stripe\StripeObject, tax_behavior?: string, tax_code?: string, type?: string}}, shipping_details?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: null|string}, tax_details?: array{tax_exempt?: null|string, tax_ids?: array{type: string, value: string}[]}} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order the updated resource
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
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order the canceled order
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param string $id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\LineItem> list of line items
     */
    public static function allLineItems($id, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/line_items';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order the reopened order
     */
    public function reopen($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/reopen';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order the submited order
     */
    public function submit($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/submit';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
