<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OrderService extends AbstractService
{
    /**
     * Returns a list of your orders. The orders are returned sorted by creation date,
     * with the most recently created orders appearing first.
     *
     * @param null|array{customer?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Order>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\Collection<\Stripe\LineItem>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\Order
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/orders/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates a new <code>open</code> order object.
     *
     * @param null|array{automatic_tax?: array{enabled: bool}, billing_details?: null|array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, currency: string, customer?: string, description?: string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], ip_address?: string, line_items: (array{description?: string, discounts?: null|array{coupon?: string, discount?: string}[], price?: string, price_data?: array{currency?: string, product?: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, product?: string, product_data?: array{description?: null|string, id: string, images?: null|string[], metadata?: null|array<string, string>, name: string, package_dimensions?: null|array{height: float, length: float, weight: float, width: float}, shippable?: bool, tax_code?: null|string, url?: null|string}, quantity?: int, tax_rates?: null|string[]})[], metadata?: array<string, string>, payment?: array{settings: array{application_fee_amount?: int, payment_method_options?: array{acss_debit?: array{mandate_options?: array{custom_mandate_url?: null|string, interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: null|string, target_date?: string, verification_method?: string}, afterpay_clearpay?: array{capture_method?: string, reference?: string, setup_future_usage?: string}, alipay?: array{setup_future_usage?: null|string}, bancontact?: array{preferred_language?: string, setup_future_usage?: null|string}, card?: array{capture_method?: string, setup_future_usage?: string}, customer_balance?: array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, ideal?: array{setup_future_usage?: null|string}, klarna?: array{capture_method?: null|string, on_demand?: array{average_amount?: int, maximum_amount?: int, minimum_amount?: int, purchase_interval?: string, purchase_interval_count?: int}, preferred_locale?: string, setup_future_usage?: string, subscriptions?: null|array{interval: string, interval_count?: int, name?: string, next_billing?: array{amount: int, date: string}, reference: string}[], supplementary_purchase_data?: null|array{bus_reservation_details?: null|array{affiliate_name?: string, arrival?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, arrival_location?: string}, carrier_name?: string, currency?: string, departure?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, departs_at?: int, departure_location?: string}, insurances?: array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], passengers?: array{family_name?: string, given_name?: string}[], price?: int, ticket_class?: string}[], event_reservation_details?: null|array{access_controlled_venue?: bool, address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, affiliate_name?: string, ends_at?: int, event_company_name?: string, event_name?: string, event_type?: string, insurances?: array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], starts_at?: int, venue_name?: string}[], ferry_reservation_details?: null|array{affiliate_name?: string, arrival?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, arrival_location?: string}, carrier_name?: string, currency?: string, departure?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, departs_at?: int, departure_location?: string}, insurances?: array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], passengers?: array{family_name?: string, given_name?: string}[], price?: int, ticket_class?: string}[], insurances?: null|array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], marketplace_sellers?: null|array{line_item_references?: string[], marketplace_seller_address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, marketplace_seller_name?: string, marketplace_seller_reference?: string, number_of_transactions?: int, product_category?: string, seller_last_login_at?: int, seller_rating?: string, seller_registered_at?: int, seller_updated_at?: int, shipping_references?: string[], volume_of_transactions?: int}[], round_trip_reservation_details?: null|array{affiliate_name?: string, arrival?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, arrival_location?: string}, carrier_name?: string, currency?: string, departure?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, departs_at?: int, departure_location?: string}, insurances?: array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], passengers?: array{family_name?: string, given_name?: string}[], price?: int, ticket_class?: string}[], train_reservation_details?: null|array{affiliate_name?: string, arrival?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, arrival_location?: string}, carrier_name?: string, currency?: string, departure?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, departs_at?: int, departure_location?: string}, insurances?: array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], passengers?: array{family_name?: string, given_name?: string}[], price?: int, ticket_class?: string}[], vouchers?: null|array{affiliate_name?: string, ends_at?: int, starts_at?: int, voucher_company?: string, voucher_name?: string, voucher_type?: string}[]}}, link?: array{capture_method?: null|string, persistent_token?: string, setup_future_usage?: null|string}, oxxo?: array{expires_after_days?: int, setup_future_usage?: string}, p24?: array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, paypal?: array{capture_method?: null|string, line_items?: array{category?: string, description?: string, name: string, quantity: int, sku?: string, sold_by?: string, tax?: array{amount: int, behavior: string}, unit_amount: int}[], preferred_locale?: string, reference?: string, reference_id?: string, risk_correlation_id?: string, setup_future_usage?: null|string, subsellers?: string[]}, sepa_debit?: array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string, target_date?: string}, sofort?: array{preferred_language?: null|string, setup_future_usage?: null|string}, wechat_pay?: array{app_id?: string, client?: string, setup_future_usage?: string}}, payment_method_types?: string[], return_url?: string, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int, destination: string}}}, shipping_cost?: null|array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: array<string, array{amount: int, tax_behavior?: string}>}, metadata?: array<string, string>, tax_behavior?: string, tax_code?: string, type?: string}}, shipping_details?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: null|string}, tax_details?: array{tax_exempt?: null|string, tax_ids?: array{type: string, value: string}[]}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Order
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\Order
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\Order
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\Order
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{automatic_tax?: array{enabled: bool}, billing_details?: null|array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, currency?: string, customer?: string, description?: null|string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], ip_address?: string, line_items?: (array{description?: string, discounts?: null|array{coupon?: string, discount?: string}[], id?: string, price?: string, price_data?: array{currency?: string, product?: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, product?: string, product_data?: array{description?: null|string, id: string, images?: null|string[], metadata?: null|array<string, string>, name: string, package_dimensions?: null|array{height: float, length: float, weight: float, width: float}, shippable?: bool, tax_code?: null|string, url?: null|string}, quantity?: int, tax_rates?: null|string[]})[], metadata?: null|array<string, string>, payment?: array{settings: array{application_fee_amount?: null|int, payment_method_options?: array{acss_debit?: null|array{mandate_options?: array{custom_mandate_url?: null|string, interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: null|string, target_date?: string, verification_method?: string}, afterpay_clearpay?: null|array{capture_method?: string, reference?: string, setup_future_usage?: string}, alipay?: null|array{setup_future_usage?: null|string}, bancontact?: null|array{preferred_language?: string, setup_future_usage?: null|string}, card?: null|array{capture_method?: string, setup_future_usage?: string}, customer_balance?: null|array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, ideal?: null|array{setup_future_usage?: null|string}, klarna?: null|array{capture_method?: null|string, on_demand?: array{average_amount?: int, maximum_amount?: int, minimum_amount?: int, purchase_interval?: string, purchase_interval_count?: int}, preferred_locale?: string, setup_future_usage?: string, subscriptions?: null|array{interval: string, interval_count?: int, name?: string, next_billing?: array{amount: int, date: string}, reference: string}[], supplementary_purchase_data?: null|array{bus_reservation_details?: null|array{affiliate_name?: string, arrival?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, arrival_location?: string}, carrier_name?: string, currency?: string, departure?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, departs_at?: int, departure_location?: string}, insurances?: array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], passengers?: array{family_name?: string, given_name?: string}[], price?: int, ticket_class?: string}[], event_reservation_details?: null|array{access_controlled_venue?: bool, address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, affiliate_name?: string, ends_at?: int, event_company_name?: string, event_name?: string, event_type?: string, insurances?: array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], starts_at?: int, venue_name?: string}[], ferry_reservation_details?: null|array{affiliate_name?: string, arrival?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, arrival_location?: string}, carrier_name?: string, currency?: string, departure?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, departs_at?: int, departure_location?: string}, insurances?: array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], passengers?: array{family_name?: string, given_name?: string}[], price?: int, ticket_class?: string}[], insurances?: null|array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], marketplace_sellers?: null|array{line_item_references?: string[], marketplace_seller_address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, marketplace_seller_name?: string, marketplace_seller_reference?: string, number_of_transactions?: int, product_category?: string, seller_last_login_at?: int, seller_rating?: string, seller_registered_at?: int, seller_updated_at?: int, shipping_references?: string[], volume_of_transactions?: int}[], round_trip_reservation_details?: null|array{affiliate_name?: string, arrival?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, arrival_location?: string}, carrier_name?: string, currency?: string, departure?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, departs_at?: int, departure_location?: string}, insurances?: array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], passengers?: array{family_name?: string, given_name?: string}[], price?: int, ticket_class?: string}[], train_reservation_details?: null|array{affiliate_name?: string, arrival?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, arrival_location?: string}, carrier_name?: string, currency?: string, departure?: array{address?: array{city?: string, country?: string, postal_code?: string, region?: string, street_address?: string, street_address2?: string}, departs_at?: int, departure_location?: string}, insurances?: array{currency?: string, insurance_company_name?: string, insurance_type?: string, price?: int}[], passengers?: array{family_name?: string, given_name?: string}[], price?: int, ticket_class?: string}[], vouchers?: null|array{affiliate_name?: string, ends_at?: int, starts_at?: int, voucher_company?: string, voucher_name?: string, voucher_type?: string}[]}}, link?: null|array{capture_method?: null|string, persistent_token?: string, setup_future_usage?: null|string}, oxxo?: null|array{expires_after_days?: int, setup_future_usage?: string}, p24?: null|array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, paypal?: null|array{capture_method?: null|string, line_items?: array{category?: string, description?: string, name: string, quantity: int, sku?: string, sold_by?: string, tax?: array{amount: int, behavior: string}, unit_amount: int}[], preferred_locale?: string, reference?: string, reference_id?: string, risk_correlation_id?: string, setup_future_usage?: null|string, subsellers?: string[]}, sepa_debit?: null|array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string, target_date?: string}, sofort?: null|array{preferred_language?: null|string, setup_future_usage?: null|string}, wechat_pay?: null|array{app_id?: string, client?: string, setup_future_usage?: string}}, payment_method_types?: string[], return_url?: null|string, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: null|array{amount?: int, destination: string}}}, shipping_cost?: null|array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: array<string, array{amount: int, tax_behavior?: string}>}, metadata?: array<string, string>, tax_behavior?: string, tax_code?: string, type?: string}}, shipping_details?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name: string, phone?: null|string}, tax_details?: array{tax_exempt?: null|string, tax_ids?: array{type: string, value: string}[]}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Order
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/orders/%s', $id), $params, $opts);
    }
}
