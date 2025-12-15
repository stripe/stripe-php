<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Checkout;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SessionService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Checkout Sessions.
     *
     * @param null|array{created?: array|int, customer?: string, customer_account?: string, customer_details?: array{email: string}, ending_before?: string, expand?: string[], limit?: int, payment_intent?: string, payment_link?: string, starting_after?: string, status?: string, subscription?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Checkout\Session>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/checkout/sessions', $params, $opts);
    }

    /**
     * When retrieving a Checkout Session, there is an includable
     * <strong>line_items</strong> property containing the first handful of those
     * items. There is also a URL where you can retrieve the full (paginated) list of
     * line items.
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
        return $this->requestCollection('get', $this->buildPath('/v1/checkout/sessions/%s/line_items', $id), $params, $opts);
    }

    /**
     * Creates a Checkout Session object.
     *
     * @param null|array{adaptive_pricing?: array{enabled?: bool}, after_expiration?: array{recovery?: array{allow_promotion_codes?: bool, enabled: bool}}, allow_promotion_codes?: bool, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_address_collection?: string, branding_settings?: array{background_color?: null|string, border_style?: null|string, button_color?: null|string, display_name?: string, font_family?: null|string, icon?: array{file?: string, type: string, url?: string}, logo?: array{file?: string, type: string, url?: string}}, cancel_url?: string, client_reference_id?: string, consent_collection?: array{payment_method_reuse_agreement?: array{position: string}, promotions?: string, terms_of_service?: string}, currency?: string, custom_fields?: array{dropdown?: array{default_value?: string, options: array{label: string, value: string}[]}, key: string, label: array{custom: string, type: string}, numeric?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, optional?: bool, text?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, type: string}[], custom_text?: array{after_submit?: null|array{message: string}, shipping_address?: null|array{message: string}, submit?: null|array{message: string}, terms_of_service_acceptance?: null|array{message: string}}, customer?: string, customer_account?: string, customer_creation?: string, customer_email?: string, customer_update?: array{address?: string, name?: string, shipping?: string}, discounts?: array{coupon?: string, promotion_code?: string}[], excluded_payment_method_types?: string[], expand?: string[], expires_at?: int, invoice_creation?: array{enabled: bool, invoice_data?: array{account_tax_ids?: null|string[], custom_fields?: null|array{name: string, value: string}[], description?: string, footer?: string, issuer?: array{account?: string, type: string}, metadata?: array<string, string>, rendering_options?: null|array{amount_tax_display?: null|string, template?: string}}}, line_items?: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, dynamic_tax_rates?: string[], metadata?: array<string, string>, price?: string, price_data?: array{currency: string, product?: string, product_data?: array{description?: string, images?: string[], metadata?: array<string, string>, name: string, tax_code?: string, unit_label?: string}, recurring?: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: string[]}[], locale?: string, metadata?: array<string, string>, mode?: string, name_collection?: array{business?: array{enabled: bool, optional?: bool}, individual?: array{enabled: bool, optional?: bool}}, optional_items?: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, price: string, quantity: int}[], origin_context?: string, payment_intent_data?: array{application_fee_amount?: int, capture_method?: string, description?: string, metadata?: array<string, string>, on_behalf_of?: string, receipt_email?: string, setup_future_usage?: string, shipping?: array{address: array{city?: string, country?: string, line1: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name: string, phone?: string, tracking_number?: string}, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int, destination: string}, transfer_group?: string}, payment_method_collection?: string, payment_method_configuration?: string, payment_method_data?: array{allow_redisplay?: string}, payment_method_options?: array{acss_debit?: array{currency?: string, mandate_options?: array{custom_mandate_url?: null|string, default_for?: string[], interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: string, target_date?: string, verification_method?: string}, affirm?: array{capture_method?: string, setup_future_usage?: string}, afterpay_clearpay?: array{capture_method?: string, setup_future_usage?: string}, alipay?: array{setup_future_usage?: string}, alma?: array{capture_method?: string}, amazon_pay?: array{capture_method?: string, setup_future_usage?: string}, au_becs_debit?: array{setup_future_usage?: string, target_date?: string}, bacs_debit?: array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: string, target_date?: string}, bancontact?: array{setup_future_usage?: string}, billie?: array{capture_method?: string}, boleto?: array{expires_after_days?: int, setup_future_usage?: string}, card?: array{capture_method?: string, installments?: array{enabled?: bool}, request_extended_authorization?: string, request_incremental_authorization?: string, request_multicapture?: string, request_overcapture?: string, request_three_d_secure?: string, restrictions?: array{brands_blocked?: string[]}, setup_future_usage?: string, statement_descriptor_suffix_kana?: string, statement_descriptor_suffix_kanji?: string}, cashapp?: array{capture_method?: string, setup_future_usage?: string}, customer_balance?: array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, demo_pay?: array{setup_future_usage?: string}, eps?: array{setup_future_usage?: string}, fpx?: array{setup_future_usage?: string}, giropay?: array{setup_future_usage?: string}, grabpay?: array{setup_future_usage?: string}, ideal?: array{setup_future_usage?: string}, kakao_pay?: array{capture_method?: string, setup_future_usage?: string}, klarna?: array{capture_method?: string, setup_future_usage?: string, subscriptions?: null|array{interval: string, interval_count?: int, name?: string, next_billing: array{amount: int, date: string}, reference: string}[]}, konbini?: array{expires_after_days?: int, setup_future_usage?: string}, kr_card?: array{capture_method?: string, setup_future_usage?: string}, link?: array{capture_method?: string, setup_future_usage?: string}, mobilepay?: array{capture_method?: string, setup_future_usage?: string}, multibanco?: array{setup_future_usage?: string}, naver_pay?: array{capture_method?: string, setup_future_usage?: string}, oxxo?: array{expires_after_days?: int, setup_future_usage?: string}, p24?: array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, pay_by_bank?: array{}, payco?: array{capture_method?: string}, paynow?: array{setup_future_usage?: string}, paypal?: array{capture_method?: null|string, preferred_locale?: string, reference?: string, risk_correlation_id?: string, setup_future_usage?: null|string}, payto?: array{mandate_options?: array{amount?: null|int, amount_type?: null|string, end_date?: null|string, payment_schedule?: null|string, payments_per_period?: null|int, purpose?: null|string, start_date?: null|string}, setup_future_usage?: string}, pix?: array{amount_includes_iof?: string, expires_after_seconds?: int, setup_future_usage?: string}, revolut_pay?: array{capture_method?: string, setup_future_usage?: string}, samsung_pay?: array{capture_method?: string}, satispay?: array{capture_method?: string}, sepa_debit?: array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: string, target_date?: string}, sofort?: array{setup_future_usage?: string}, swish?: array{reference?: string}, twint?: array{setup_future_usage?: string}, us_bank_account?: array{financial_connections?: array{permissions?: string[], prefetch?: string[]}, setup_future_usage?: string, target_date?: string, verification_method?: string}, wechat_pay?: array{app_id?: string, client: string, setup_future_usage?: string}}, payment_method_types?: string[], permissions?: array{update_shipping_details?: string}, phone_number_collection?: array{enabled: bool}, redirect_on_completion?: string, return_url?: string, saved_payment_method_options?: array{allow_redisplay_filters?: string[], payment_method_remove?: string, payment_method_save?: string}, setup_intent_data?: array{description?: string, metadata?: array<string, string>, on_behalf_of?: string}, shipping_address_collection?: array{allowed_countries: string[]}, shipping_options?: array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: array<string, array{amount: int, tax_behavior?: string}>}, metadata?: array<string, string>, tax_behavior?: string, tax_code?: string, type?: string}}[], submit_type?: string, subscription_data?: array{application_fee_percent?: float, billing_cycle_anchor?: int, billing_mode?: array{flexible?: array{proration_discounts?: string}, type: string}, default_tax_rates?: string[], description?: string, invoice_settings?: array{issuer?: array{account?: string, type: string}}, metadata?: array<string, string>, on_behalf_of?: string, proration_behavior?: string, transfer_data?: array{amount_percent?: float, destination: string}, trial_end?: int, trial_period_days?: int, trial_settings?: array{end_behavior: array{missing_payment_method: string}}}, success_url?: string, tax_id_collection?: array{enabled: bool, required?: string}, ui_mode?: string, wallet_options?: array{link?: array{display?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Checkout\Session
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/checkout/sessions', $params, $opts);
    }

    /**
     * A Checkout Session can be expired when it is in one of these statuses:
     * <code>open</code>
     *
     * After it expires, a customer can’t complete a Checkout Session and customers
     * loading the Checkout Session see a message saying the Checkout Session is
     * expired.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Checkout\Session
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function expire($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/checkout/sessions/%s/expire', $id), $params, $opts);
    }

    /**
     * Retrieves a Checkout Session object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Checkout\Session
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/checkout/sessions/%s', $id), $params, $opts);
    }

    /**
     * Updates a Checkout Session object.
     *
     * Related guide: <a href="/payments/checkout/dynamic-updates">Dynamically update
     * Checkout</a>
     *
     * @param string $id
     * @param null|array{collected_information?: array{shipping_details?: array{address: array{city?: string, country: string, line1: string, line2?: string, postal_code?: string, state?: string}, name: string}}, expand?: string[], line_items?: (array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, id?: string, metadata?: null|array<string, string>, price?: string, price_data?: array{currency: string, product?: string, product_data?: array{description?: string, images?: string[], metadata?: array<string, string>, name: string, tax_code?: string, unit_label?: string}, recurring?: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], metadata?: null|array<string, string>, shipping_options?: null|array{shipping_rate?: string, shipping_rate_data?: array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, fixed_amount?: array{amount: int, currency: string, currency_options?: array<string, array{amount: int, tax_behavior?: string}>}, metadata?: array<string, string>, tax_behavior?: string, tax_code?: string, type?: string}}[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Checkout\Session
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/checkout/sessions/%s', $id), $params, $opts);
    }
}
