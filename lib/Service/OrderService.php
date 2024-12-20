<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OrderService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of your orders. The orders are returned sorted by creation date,
     * with the most recently created orders appearing first.
     *
     * @param null|array{customer?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Order>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/orders', $params, $opts);
    }

    /**
     * When retrieving an order, there is an includable <strong>line_items</strong>
     * property containing the first handful of those items. There is also a URL where
     * you can retrieve the full (paginated) list of line items.
     *
     * @param string $id
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\LineItem>
     */
    public function allLineItems($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/orders/%s/line_items', $id), $params, $opts);
    }

    /**
     * Cancels the order as well as the payment intent if one is attached.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/orders/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates a new <code>open</code> order object.
     *
     * @param null|array{automatic_tax?: array{enabled: bool}, billing_details?: null|array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, credits?: null|array{gift_card?: string, type: string}[], currency: string, customer?: string, description?: string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], ip_address?: string, line_items: (array{description?: string, discounts?: null|array{coupon?: string, discount?: string}[], price?: string, price_data?: array{currency?: string, product?: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, product?: string, product_data?: array{description?: null|string, id: string, images?: null|string[], metadata?: null|\Stripe\StripeObject, name: string, package_dimensions?: null|array{height: float, length: float, weight: float, width: float}, shippable?: bool, tax_code?: null|string, url?: null|string}, quantity?: int, tax_rates?: null|string[]})[], metadata?: \Stripe\StripeObject, payment?: array{settings: array{application_fee_amount?: int, payment_method_options?: array{acss_debit?: array{mandate_options?: array{custom_mandate_url?: null|string, interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: null|string, verification_method?: string}, afterpay_clearpay?: array{capture_method?: string, reference?: string, setup_future_usage?: string}, alipay?: array{setup_future_usage?: null|string}, bancontact?: array{preferred_language?: string, setup_future_usage?: null|string}, card?: array{capture_method?: string, setup_future_usage?: string}, customer_balance?: array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, ideal?: array{setup_future_usage?: null|string}, klarna?: array{capture_method?: null|string, preferred_locale?: string, setup_future_usage?: string}, link?: array{capture_method?: null|string, persistent_token?: string, setup_future_usage?: null|string}, oxxo?: array{expires_after_days?: int, setup_future_usage?: string}, p24?: array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, paypal?: array{capture_method?: null|string, line_items?: array{category?: string, description?: string, name: string, quantity: int, sku?: string, sold_by?: string, tax?: array{amount: int, behavior: string}, unit_amount: int}[], preferred_locale?: string, reference?: string, reference_id?: string, risk_correlation_id?: string, setup_future_usage?: null|string, subsellers?: string[]}, sepa_debit?: array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string}, sofort?: array{preferred_language?: null|string, setup_future_usage?: null|string}, wechat_pay?: array{app_id?: string, client: string, setup_future_usage?: string}}, payment_method_types?: string[], return_url?: string, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int, destination: string}}}, shipping_cost?: null|array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: \Stripe\StripeObject}, metadata?: \Stripe\StripeObject, tax_behavior?: string, tax_code?: string, type?: string}}, shipping_details?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: null|string}, tax_details?: array{tax_exempt?: null|string, tax_ids?: array{type: string, value: string}[]}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/orders', $params, $opts);
    }

    /**
     * Reopens a <code>submitted</code> order.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order
     */
    public function reopen($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/orders/%s/reopen', $id), $params, $opts);
    }

    /**
     * Retrieves the details of an existing order. Supply the unique order ID from
     * either an order creation request or the order list, and Stripe will return the
     * corresponding order information.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/orders/%s', $id), $params, $opts);
    }

    /**
     * Submitting an Order transitions the status to <code>processing</code> and
     * creates a PaymentIntent object so the order can be paid. If the Order has an
     * <code>amount_total</code> of 0, no PaymentIntent object will be created. Once
     * the order is submitted, its contents cannot be changed, unless the <a
     * href="#reopen_order">reopen</a> method is called.
     *
     * @param string $id
     * @param null|array{expand?: string[], expected_total: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order
     */
    public function submit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/orders/%s/submit', $id), $params, $opts);
    }

    /**
     * Updates the specific order by setting the values of the parameters passed. Any
     * parameters not provided will be left unchanged.
     *
     * @param string $id
     * @param null|array{automatic_tax?: array{enabled: bool}, billing_details?: null|array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, credits?: null|array{gift_card?: string, type: string}[], currency?: string, customer?: string, description?: null|string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], ip_address?: string, line_items?: (array{description?: string, discounts?: null|array{coupon?: string, discount?: string}[], id?: string, price?: string, price_data?: array{currency?: string, product?: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, product?: string, product_data?: array{description?: null|string, id: string, images?: null|string[], metadata?: null|\Stripe\StripeObject, name: string, package_dimensions?: null|array{height: float, length: float, weight: float, width: float}, shippable?: bool, tax_code?: null|string, url?: null|string}, quantity?: int, tax_rates?: null|string[]})[], metadata?: null|\Stripe\StripeObject, payment?: array{settings: array{application_fee_amount?: null|int, payment_method_options?: array{acss_debit?: null|array{mandate_options?: array{custom_mandate_url?: null|string, interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: null|string, verification_method?: string}, afterpay_clearpay?: null|array{capture_method?: string, reference?: string, setup_future_usage?: string}, alipay?: null|array{setup_future_usage?: null|string}, bancontact?: null|array{preferred_language?: string, setup_future_usage?: null|string}, card?: null|array{capture_method?: string, setup_future_usage?: string}, customer_balance?: null|array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, ideal?: null|array{setup_future_usage?: null|string}, klarna?: null|array{capture_method?: null|string, preferred_locale?: string, setup_future_usage?: string}, link?: null|array{capture_method?: null|string, persistent_token?: string, setup_future_usage?: null|string}, oxxo?: null|array{expires_after_days?: int, setup_future_usage?: string}, p24?: null|array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, paypal?: null|array{capture_method?: null|string, line_items?: array{category?: string, description?: string, name: string, quantity: int, sku?: string, sold_by?: string, tax?: array{amount: int, behavior: string}, unit_amount: int}[], preferred_locale?: string, reference?: string, reference_id?: string, risk_correlation_id?: string, setup_future_usage?: null|string, subsellers?: string[]}, sepa_debit?: null|array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string}, sofort?: null|array{preferred_language?: null|string, setup_future_usage?: null|string}, wechat_pay?: null|array{app_id?: string, client: string, setup_future_usage?: string}}, payment_method_types?: string[], return_url?: null|string, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: null|array{amount?: int, destination: string}}}, shipping_cost?: null|array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: \Stripe\StripeObject}, metadata?: \Stripe\StripeObject, tax_behavior?: string, tax_code?: string, type?: string}}, shipping_details?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: null|string}, tax_details?: array{tax_exempt?: null|string, tax_ids?: array{type: string, value: string}[]}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Order
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/orders/%s', $id), $params, $opts);
    }
}
