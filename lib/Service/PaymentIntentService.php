<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentIntentService extends AbstractService
{
    /**
     * Returns a list of PaymentIntents.
     *
     * @param null|array{created?: array|int, customer?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\PaymentIntent>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/payment_intents', $params, $opts);
    }

    /**
     * Manually reconcile the remaining amount for a <code>customer_balance</code>
     * PaymentIntent.
     *
     * @param string $id
     * @param null|array{amount?: int, currency?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function applyCustomerBalance($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/apply_customer_balance', $id), $params, $opts);
    }

    /**
     * You can cancel a PaymentIntent object when it’s in one of these statuses:
     * <code>requires_payment_method</code>, <code>requires_capture</code>,
     * <code>requires_confirmation</code>, <code>requires_action</code> or, <a
     * href="/docs/payments/intents">in rare cases</a>, <code>processing</code>.
     *
     * After it’s canceled, no additional charges are made by the PaymentIntent and any
     * operations on the PaymentIntent fail with an error. For PaymentIntents with a
     * <code>status</code> of <code>requires_capture</code>, the remaining
     * <code>amount_capturable</code> is automatically refunded.
     *
     * You can’t cancel the PaymentIntent for a Checkout Session. <a
     * href="/docs/api/checkout/sessions/expire">Expire the Checkout Session</a>
     * instead.
     *
     * @param string $id
     * @param null|array{cancellation_reason?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/cancel', $id), $params, $opts);
    }

    /**
     * Capture the funds of an existing uncaptured PaymentIntent when its status is
     * <code>requires_capture</code>.
     *
     * Uncaptured PaymentIntents are cancelled a set number of days (7 by default)
     * after their creation.
     *
     * Learn more about <a href="/docs/payments/capture-later">separate authorization
     * and capture</a>.
     *
     * @param string $id
     * @param null|array{amount_to_capture?: int, application_fee_amount?: int, expand?: string[], final_capture?: bool, metadata?: null|\Stripe\StripeObject, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function capture($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/capture', $id), $params, $opts);
    }

    /**
     * Confirm that your customer intends to pay with current or provided payment
     * method. Upon confirmation, the PaymentIntent will attempt to initiate a payment.
     * If the selected payment method requires additional authentication steps, the
     * PaymentIntent will transition to the <code>requires_action</code> status and
     * suggest additional actions via <code>next_action</code>. If payment fails, the
     * PaymentIntent transitions to the <code>requires_payment_method</code> status or
     * the <code>canceled</code> status if the confirmation limit is reached. If
     * payment succeeds, the PaymentIntent will transition to the
     * <code>succeeded</code> status (or <code>requires_capture</code>, if
     * <code>capture_method</code> is set to <code>manual</code>). If the
     * <code>confirmation_method</code> is <code>automatic</code>, payment may be
     * attempted using our <a
     * href="/docs/stripe-js/reference#stripe-handle-card-payment">client SDKs</a> and
     * the PaymentIntent’s <a
     * href="#payment_intent_object-client_secret">client_secret</a>. After
     * <code>next_action</code>s are handled by the client, no additional confirmation
     * is required to complete the payment. If the <code>confirmation_method</code> is
     * <code>manual</code>, all payment attempts must be initiated using a secret key.
     * If any actions are required for the payment, the PaymentIntent will return to
     * the <code>requires_confirmation</code> state after those actions are completed.
     * Your server needs to then explicitly re-confirm the PaymentIntent to initiate
     * the next payment attempt. There is a variable upper limit on how many times a
     * PaymentIntent can be confirmed. After this limit is reached, any further calls
     * to this endpoint will transition the PaymentIntent to the <code>canceled</code>
     * state.
     *
     * @param string $id
     * @param null|array{capture_method?: string, confirmation_token?: string, error_on_requires_action?: bool, expand?: string[], mandate?: string, mandate_data?: null|array{customer_acceptance?: array{accepted_at?: int, offline?: array{}, online?: array{ip_address?: string, user_agent?: string}, type: string}}, off_session?: array|bool|string, payment_method?: string, payment_method_data?: array{acss_debit?: array{account_number: string, institution_number: string, transit_number: string}, affirm?: array{}, afterpay_clearpay?: array{}, alipay?: array{}, allow_redisplay?: string, alma?: array{}, amazon_pay?: array{}, au_becs_debit?: array{account_number: string, bsb_number: string}, bacs_debit?: array{account_number?: string, sort_code?: string}, bancontact?: array{}, billie?: array{}, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, blik?: array{}, boleto?: array{tax_id: string}, cashapp?: array{}, customer_balance?: array{}, eps?: array{bank?: string}, fpx?: array{account_holder_type?: string, bank: string}, giropay?: array{}, grabpay?: array{}, ideal?: array{bank?: string}, interac_present?: array{}, kakao_pay?: array{}, klarna?: array{dob?: array{day: int, month: int, year: int}}, konbini?: array{}, kr_card?: array{}, link?: array{}, metadata?: \Stripe\StripeObject, mobilepay?: array{}, multibanco?: array{}, naver_pay?: array{funding?: string}, nz_bank_account?: array{account_holder_name?: string, account_number: string, bank_code: string, branch_code: string, reference?: string, suffix: string}, oxxo?: array{}, p24?: array{bank?: string}, pay_by_bank?: array{}, payco?: array{}, paynow?: array{}, paypal?: array{}, pix?: array{}, promptpay?: array{}, radar_options?: array{session?: string}, revolut_pay?: array{}, samsung_pay?: array{}, satispay?: array{}, sepa_debit?: array{iban: string}, sofort?: array{country: string}, swish?: array{}, twint?: array{}, type: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}, wechat_pay?: array{}, zip?: array{}}, payment_method_options?: array{acss_debit?: null|array{mandate_options?: array{custom_mandate_url?: null|string, interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: null|string, target_date?: string, verification_method?: string}, affirm?: null|array{capture_method?: null|string, preferred_locale?: string, setup_future_usage?: string}, afterpay_clearpay?: null|array{capture_method?: null|string, reference?: string, setup_future_usage?: string}, alipay?: null|array{setup_future_usage?: null|string}, alma?: null|array{capture_method?: null|string}, amazon_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, au_becs_debit?: null|array{setup_future_usage?: null|string, target_date?: string}, bacs_debit?: null|array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string, target_date?: string}, bancontact?: null|array{preferred_language?: string, setup_future_usage?: null|string}, blik?: null|array{code?: string, setup_future_usage?: null|string}, boleto?: null|array{expires_after_days?: int, setup_future_usage?: null|string}, card?: null|array{capture_method?: null|string, cvc_token?: string, installments?: array{enabled?: bool, plan?: null|array{count?: int, interval?: string, type: string}}, mandate_options?: array{amount: int, amount_type: string, description?: string, end_date?: int, interval: string, interval_count?: int, reference: string, start_date: int, supported_types?: string[]}, moto?: bool, network?: string, request_extended_authorization?: string, request_incremental_authorization?: string, request_multicapture?: string, request_overcapture?: string, request_three_d_secure?: string, require_cvc_recollection?: bool, setup_future_usage?: null|string, statement_descriptor_suffix_kana?: null|string, statement_descriptor_suffix_kanji?: null|string, three_d_secure?: array{ares_trans_status?: string, cryptogram: string, electronic_commerce_indicator?: string, exemption_indicator?: string, network_options?: array{cartes_bancaires?: array{cb_avalgo: string, cb_exemption?: string, cb_score?: int}}, requestor_challenge_indicator?: string, transaction_id: string, version: string}}, card_present?: null|array{request_extended_authorization?: bool, request_incremental_authorization_support?: bool, routing?: array{requested_priority?: string}}, cashapp?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, customer_balance?: null|array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, eps?: null|array{setup_future_usage?: string}, fpx?: null|array{setup_future_usage?: string}, giropay?: null|array{setup_future_usage?: string}, grabpay?: null|array{setup_future_usage?: string}, ideal?: null|array{setup_future_usage?: null|string}, interac_present?: null|array{}, kakao_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, klarna?: null|array{capture_method?: null|string, preferred_locale?: string, setup_future_usage?: string}, konbini?: null|array{confirmation_number?: null|string, expires_after_days?: null|int, expires_at?: null|int, product_description?: null|string, setup_future_usage?: string}, kr_card?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, link?: null|array{capture_method?: null|string, persistent_token?: string, setup_future_usage?: null|string}, mobilepay?: null|array{capture_method?: null|string, setup_future_usage?: string}, multibanco?: null|array{setup_future_usage?: string}, naver_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, nz_bank_account?: null|array{setup_future_usage?: null|string, target_date?: string}, oxxo?: null|array{expires_after_days?: int, setup_future_usage?: string}, p24?: null|array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, pay_by_bank?: null|array{}, payco?: null|array{capture_method?: null|string}, paynow?: null|array{setup_future_usage?: string}, paypal?: null|array{capture_method?: null|string, preferred_locale?: string, reference?: string, risk_correlation_id?: string, setup_future_usage?: null|string}, pix?: null|array{expires_after_seconds?: int, expires_at?: int, setup_future_usage?: string}, promptpay?: null|array{setup_future_usage?: string}, revolut_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, samsung_pay?: null|array{capture_method?: null|string}, sepa_debit?: null|array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string, target_date?: string}, sofort?: null|array{preferred_language?: null|string, setup_future_usage?: null|string}, swish?: null|array{reference?: null|string, setup_future_usage?: string}, twint?: null|array{setup_future_usage?: string}, us_bank_account?: null|array{financial_connections?: array{filters?: array{account_subcategories?: string[]}, permissions?: string[], prefetch?: string[], return_url?: string}, mandate_options?: array{collection_method?: null|string}, networks?: array{requested?: string[]}, preferred_settlement_speed?: null|string, setup_future_usage?: null|string, target_date?: string, verification_method?: string}, wechat_pay?: null|array{app_id?: string, client?: string, setup_future_usage?: string}, zip?: null|array{setup_future_usage?: string}}, payment_method_types?: string[], radar_options?: array{session?: string}, receipt_email?: null|string, return_url?: string, setup_future_usage?: null|string, shipping?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name: string, phone?: string, tracking_number?: string}, use_stripe_sdk?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function confirm($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/confirm', $id), $params, $opts);
    }

    /**
     * Creates a PaymentIntent object.
     *
     * After the PaymentIntent is created, attach a payment method and <a
     * href="/docs/api/payment_intents/confirm">confirm</a> to continue the payment.
     * Learn more about <a href="/docs/payments/payment-intents">the available payment
     * flows with the Payment Intents API</a>.
     *
     * When you use <code>confirm=true</code> during creation, it’s equivalent to
     * creating and confirming the PaymentIntent in the same call. You can use any
     * parameters available in the <a href="/docs/api/payment_intents/confirm">confirm
     * API</a> when you supply <code>confirm=true</code>.
     *
     * @param null|array{amount: int, application_fee_amount?: int, automatic_payment_methods?: array{allow_redirects?: string, enabled: bool}, capture_method?: string, confirm?: bool, confirmation_method?: string, confirmation_token?: string, currency: string, customer?: string, description?: string, error_on_requires_action?: bool, expand?: string[], mandate?: string, mandate_data?: null|array{customer_acceptance: array{accepted_at?: int, offline?: array{}, online?: array{ip_address: string, user_agent: string}, type: string}}, metadata?: \Stripe\StripeObject, off_session?: array|bool|string, on_behalf_of?: string, payment_method?: string, payment_method_configuration?: string, payment_method_data?: array{acss_debit?: array{account_number: string, institution_number: string, transit_number: string}, affirm?: array{}, afterpay_clearpay?: array{}, alipay?: array{}, allow_redisplay?: string, alma?: array{}, amazon_pay?: array{}, au_becs_debit?: array{account_number: string, bsb_number: string}, bacs_debit?: array{account_number?: string, sort_code?: string}, bancontact?: array{}, billie?: array{}, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, blik?: array{}, boleto?: array{tax_id: string}, cashapp?: array{}, customer_balance?: array{}, eps?: array{bank?: string}, fpx?: array{account_holder_type?: string, bank: string}, giropay?: array{}, grabpay?: array{}, ideal?: array{bank?: string}, interac_present?: array{}, kakao_pay?: array{}, klarna?: array{dob?: array{day: int, month: int, year: int}}, konbini?: array{}, kr_card?: array{}, link?: array{}, metadata?: \Stripe\StripeObject, mobilepay?: array{}, multibanco?: array{}, naver_pay?: array{funding?: string}, nz_bank_account?: array{account_holder_name?: string, account_number: string, bank_code: string, branch_code: string, reference?: string, suffix: string}, oxxo?: array{}, p24?: array{bank?: string}, pay_by_bank?: array{}, payco?: array{}, paynow?: array{}, paypal?: array{}, pix?: array{}, promptpay?: array{}, radar_options?: array{session?: string}, revolut_pay?: array{}, samsung_pay?: array{}, satispay?: array{}, sepa_debit?: array{iban: string}, sofort?: array{country: string}, swish?: array{}, twint?: array{}, type: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}, wechat_pay?: array{}, zip?: array{}}, payment_method_options?: array{acss_debit?: null|array{mandate_options?: array{custom_mandate_url?: null|string, interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: null|string, target_date?: string, verification_method?: string}, affirm?: null|array{capture_method?: null|string, preferred_locale?: string, setup_future_usage?: string}, afterpay_clearpay?: null|array{capture_method?: null|string, reference?: string, setup_future_usage?: string}, alipay?: null|array{setup_future_usage?: null|string}, alma?: null|array{capture_method?: null|string}, amazon_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, au_becs_debit?: null|array{setup_future_usage?: null|string, target_date?: string}, bacs_debit?: null|array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string, target_date?: string}, bancontact?: null|array{preferred_language?: string, setup_future_usage?: null|string}, blik?: null|array{code?: string, setup_future_usage?: null|string}, boleto?: null|array{expires_after_days?: int, setup_future_usage?: null|string}, card?: null|array{capture_method?: null|string, cvc_token?: string, installments?: array{enabled?: bool, plan?: null|array{count?: int, interval?: string, type: string}}, mandate_options?: array{amount: int, amount_type: string, description?: string, end_date?: int, interval: string, interval_count?: int, reference: string, start_date: int, supported_types?: string[]}, moto?: bool, network?: string, request_extended_authorization?: string, request_incremental_authorization?: string, request_multicapture?: string, request_overcapture?: string, request_three_d_secure?: string, require_cvc_recollection?: bool, setup_future_usage?: null|string, statement_descriptor_suffix_kana?: null|string, statement_descriptor_suffix_kanji?: null|string, three_d_secure?: array{ares_trans_status?: string, cryptogram: string, electronic_commerce_indicator?: string, exemption_indicator?: string, network_options?: array{cartes_bancaires?: array{cb_avalgo: string, cb_exemption?: string, cb_score?: int}}, requestor_challenge_indicator?: string, transaction_id: string, version: string}}, card_present?: null|array{request_extended_authorization?: bool, request_incremental_authorization_support?: bool, routing?: array{requested_priority?: string}}, cashapp?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, customer_balance?: null|array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, eps?: null|array{setup_future_usage?: string}, fpx?: null|array{setup_future_usage?: string}, giropay?: null|array{setup_future_usage?: string}, grabpay?: null|array{setup_future_usage?: string}, ideal?: null|array{setup_future_usage?: null|string}, interac_present?: null|array{}, kakao_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, klarna?: null|array{capture_method?: null|string, preferred_locale?: string, setup_future_usage?: string}, konbini?: null|array{confirmation_number?: null|string, expires_after_days?: null|int, expires_at?: null|int, product_description?: null|string, setup_future_usage?: string}, kr_card?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, link?: null|array{capture_method?: null|string, persistent_token?: string, setup_future_usage?: null|string}, mobilepay?: null|array{capture_method?: null|string, setup_future_usage?: string}, multibanco?: null|array{setup_future_usage?: string}, naver_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, nz_bank_account?: null|array{setup_future_usage?: null|string, target_date?: string}, oxxo?: null|array{expires_after_days?: int, setup_future_usage?: string}, p24?: null|array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, pay_by_bank?: null|array{}, payco?: null|array{capture_method?: null|string}, paynow?: null|array{setup_future_usage?: string}, paypal?: null|array{capture_method?: null|string, preferred_locale?: string, reference?: string, risk_correlation_id?: string, setup_future_usage?: null|string}, pix?: null|array{expires_after_seconds?: int, expires_at?: int, setup_future_usage?: string}, promptpay?: null|array{setup_future_usage?: string}, revolut_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, samsung_pay?: null|array{capture_method?: null|string}, sepa_debit?: null|array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string, target_date?: string}, sofort?: null|array{preferred_language?: null|string, setup_future_usage?: null|string}, swish?: null|array{reference?: null|string, setup_future_usage?: string}, twint?: null|array{setup_future_usage?: string}, us_bank_account?: null|array{financial_connections?: array{filters?: array{account_subcategories?: string[]}, permissions?: string[], prefetch?: string[], return_url?: string}, mandate_options?: array{collection_method?: null|string}, networks?: array{requested?: string[]}, preferred_settlement_speed?: null|string, setup_future_usage?: null|string, target_date?: string, verification_method?: string}, wechat_pay?: null|array{app_id?: string, client?: string, setup_future_usage?: string}, zip?: null|array{setup_future_usage?: string}}, payment_method_types?: string[], radar_options?: array{session?: string}, receipt_email?: string, return_url?: string, setup_future_usage?: string, shipping?: array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name: string, phone?: string, tracking_number?: string}, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int, destination: string}, transfer_group?: string, use_stripe_sdk?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/payment_intents', $params, $opts);
    }

    /**
     * Perform an incremental authorization on an eligible <a
     * href="/docs/api/payment_intents/object">PaymentIntent</a>. To be eligible, the
     * PaymentIntent’s status must be <code>requires_capture</code> and <a
     * href="/docs/api/charges/object#charge_object-payment_method_details-card_present-incremental_authorization_supported">incremental_authorization_supported</a>
     * must be <code>true</code>.
     *
     * Incremental authorizations attempt to increase the authorized amount on your
     * customer’s card to the new, higher <code>amount</code> provided. Similar to the
     * initial authorization, incremental authorizations can be declined. A single
     * PaymentIntent can call this endpoint multiple times to further increase the
     * authorized amount.
     *
     * If the incremental authorization succeeds, the PaymentIntent object returns with
     * the updated <a
     * href="/docs/api/payment_intents/object#payment_intent_object-amount">amount</a>.
     * If the incremental authorization fails, a <a
     * href="/docs/error-codes#card-declined">card_declined</a> error returns, and no
     * other fields on the PaymentIntent or Charge update. The PaymentIntent object
     * remains capturable for the previously authorized amount.
     *
     * Each PaymentIntent can have a maximum of 10 incremental authorization attempts,
     * including declines. After it’s captured, a PaymentIntent can no longer be
     * incremented.
     *
     * Learn more about <a
     * href="/docs/terminal/features/incremental-authorizations">incremental
     * authorizations</a>.
     *
     * @param string $id
     * @param null|array{amount: int, application_fee_amount?: int, description?: string, expand?: string[], metadata?: \Stripe\StripeObject, statement_descriptor?: string, transfer_data?: array{amount?: int}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function incrementAuthorization($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/increment_authorization', $id), $params, $opts);
    }

    /**
     * Retrieves the details of a PaymentIntent that has previously been created.
     *
     * You can retrieve a PaymentIntent client-side using a publishable key when the
     * <code>client_secret</code> is in the query string.
     *
     * If you retrieve a PaymentIntent with a publishable key, it only returns a subset
     * of properties. Refer to the <a href="#payment_intent_object">payment intent</a>
     * object reference for more details.
     *
     * @param string $id
     * @param null|array{client_secret?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_intents/%s', $id), $params, $opts);
    }

    /**
     * Search for PaymentIntents you’ve previously created using Stripe’s <a
     * href="/docs/search#search-query-language">Search Query Language</a>. Don’t use
     * search in read-after-write flows where strict consistency is necessary. Under
     * normal operating conditions, data is searchable in less than a minute.
     * Occasionally, propagation of new or updated data can be up to an hour behind
     * during outages. Search functionality is not available to merchants in India.
     *
     * @param null|array{expand?: string[], limit?: int, page?: string, query: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SearchResult<\Stripe\PaymentIntent>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function search($params = null, $opts = null)
    {
        return $this->requestSearchResult('get', '/v1/payment_intents/search', $params, $opts);
    }

    /**
     * Updates properties on a PaymentIntent object without confirming.
     *
     * Depending on which properties you update, you might need to confirm the
     * PaymentIntent again. For example, updating the <code>payment_method</code>
     * always requires you to confirm the PaymentIntent again. If you prefer to update
     * and confirm at the same time, we recommend updating properties through the <a
     * href="/docs/api/payment_intents/confirm">confirm API</a> instead.
     *
     * @param string $id
     * @param null|array{amount?: int, application_fee_amount?: null|int, capture_method?: string, currency?: string, customer?: string, description?: string, expand?: string[], metadata?: null|\Stripe\StripeObject, payment_method?: string, payment_method_configuration?: string, payment_method_data?: array{acss_debit?: array{account_number: string, institution_number: string, transit_number: string}, affirm?: array{}, afterpay_clearpay?: array{}, alipay?: array{}, allow_redisplay?: string, alma?: array{}, amazon_pay?: array{}, au_becs_debit?: array{account_number: string, bsb_number: string}, bacs_debit?: array{account_number?: string, sort_code?: string}, bancontact?: array{}, billie?: array{}, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, blik?: array{}, boleto?: array{tax_id: string}, cashapp?: array{}, customer_balance?: array{}, eps?: array{bank?: string}, fpx?: array{account_holder_type?: string, bank: string}, giropay?: array{}, grabpay?: array{}, ideal?: array{bank?: string}, interac_present?: array{}, kakao_pay?: array{}, klarna?: array{dob?: array{day: int, month: int, year: int}}, konbini?: array{}, kr_card?: array{}, link?: array{}, metadata?: \Stripe\StripeObject, mobilepay?: array{}, multibanco?: array{}, naver_pay?: array{funding?: string}, nz_bank_account?: array{account_holder_name?: string, account_number: string, bank_code: string, branch_code: string, reference?: string, suffix: string}, oxxo?: array{}, p24?: array{bank?: string}, pay_by_bank?: array{}, payco?: array{}, paynow?: array{}, paypal?: array{}, pix?: array{}, promptpay?: array{}, radar_options?: array{session?: string}, revolut_pay?: array{}, samsung_pay?: array{}, satispay?: array{}, sepa_debit?: array{iban: string}, sofort?: array{country: string}, swish?: array{}, twint?: array{}, type: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}, wechat_pay?: array{}, zip?: array{}}, payment_method_options?: array{acss_debit?: null|array{mandate_options?: array{custom_mandate_url?: null|string, interval_description?: string, payment_schedule?: string, transaction_type?: string}, setup_future_usage?: null|string, target_date?: string, verification_method?: string}, affirm?: null|array{capture_method?: null|string, preferred_locale?: string, setup_future_usage?: string}, afterpay_clearpay?: null|array{capture_method?: null|string, reference?: string, setup_future_usage?: string}, alipay?: null|array{setup_future_usage?: null|string}, alma?: null|array{capture_method?: null|string}, amazon_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, au_becs_debit?: null|array{setup_future_usage?: null|string, target_date?: string}, bacs_debit?: null|array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string, target_date?: string}, bancontact?: null|array{preferred_language?: string, setup_future_usage?: null|string}, blik?: null|array{code?: string, setup_future_usage?: null|string}, boleto?: null|array{expires_after_days?: int, setup_future_usage?: null|string}, card?: null|array{capture_method?: null|string, cvc_token?: string, installments?: array{enabled?: bool, plan?: null|array{count?: int, interval?: string, type: string}}, mandate_options?: array{amount: int, amount_type: string, description?: string, end_date?: int, interval: string, interval_count?: int, reference: string, start_date: int, supported_types?: string[]}, moto?: bool, network?: string, request_extended_authorization?: string, request_incremental_authorization?: string, request_multicapture?: string, request_overcapture?: string, request_three_d_secure?: string, require_cvc_recollection?: bool, setup_future_usage?: null|string, statement_descriptor_suffix_kana?: null|string, statement_descriptor_suffix_kanji?: null|string, three_d_secure?: array{ares_trans_status?: string, cryptogram: string, electronic_commerce_indicator?: string, exemption_indicator?: string, network_options?: array{cartes_bancaires?: array{cb_avalgo: string, cb_exemption?: string, cb_score?: int}}, requestor_challenge_indicator?: string, transaction_id: string, version: string}}, card_present?: null|array{request_extended_authorization?: bool, request_incremental_authorization_support?: bool, routing?: array{requested_priority?: string}}, cashapp?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, customer_balance?: null|array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, requested_address_types?: string[], type: string}, funding_type?: string, setup_future_usage?: string}, eps?: null|array{setup_future_usage?: string}, fpx?: null|array{setup_future_usage?: string}, giropay?: null|array{setup_future_usage?: string}, grabpay?: null|array{setup_future_usage?: string}, ideal?: null|array{setup_future_usage?: null|string}, interac_present?: null|array{}, kakao_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, klarna?: null|array{capture_method?: null|string, preferred_locale?: string, setup_future_usage?: string}, konbini?: null|array{confirmation_number?: null|string, expires_after_days?: null|int, expires_at?: null|int, product_description?: null|string, setup_future_usage?: string}, kr_card?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, link?: null|array{capture_method?: null|string, persistent_token?: string, setup_future_usage?: null|string}, mobilepay?: null|array{capture_method?: null|string, setup_future_usage?: string}, multibanco?: null|array{setup_future_usage?: string}, naver_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, nz_bank_account?: null|array{setup_future_usage?: null|string, target_date?: string}, oxxo?: null|array{expires_after_days?: int, setup_future_usage?: string}, p24?: null|array{setup_future_usage?: string, tos_shown_and_accepted?: bool}, pay_by_bank?: null|array{}, payco?: null|array{capture_method?: null|string}, paynow?: null|array{setup_future_usage?: string}, paypal?: null|array{capture_method?: null|string, preferred_locale?: string, reference?: string, risk_correlation_id?: string, setup_future_usage?: null|string}, pix?: null|array{expires_after_seconds?: int, expires_at?: int, setup_future_usage?: string}, promptpay?: null|array{setup_future_usage?: string}, revolut_pay?: null|array{capture_method?: null|string, setup_future_usage?: null|string}, samsung_pay?: null|array{capture_method?: null|string}, sepa_debit?: null|array{mandate_options?: array{reference_prefix?: null|string}, setup_future_usage?: null|string, target_date?: string}, sofort?: null|array{preferred_language?: null|string, setup_future_usage?: null|string}, swish?: null|array{reference?: null|string, setup_future_usage?: string}, twint?: null|array{setup_future_usage?: string}, us_bank_account?: null|array{financial_connections?: array{filters?: array{account_subcategories?: string[]}, permissions?: string[], prefetch?: string[], return_url?: string}, mandate_options?: array{collection_method?: null|string}, networks?: array{requested?: string[]}, preferred_settlement_speed?: null|string, setup_future_usage?: null|string, target_date?: string, verification_method?: string}, wechat_pay?: null|array{app_id?: string, client?: string, setup_future_usage?: string}, zip?: null|array{setup_future_usage?: string}}, payment_method_types?: string[], receipt_email?: null|string, setup_future_usage?: null|string, shipping?: null|array{address: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name: string, phone?: string, tracking_number?: string}, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_data?: array{amount?: int}, transfer_group?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s', $id), $params, $opts);
    }

    /**
     * Verifies microdeposits on a PaymentIntent object.
     *
     * @param string $id
     * @param null|array{amounts?: int[], descriptor_code?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function verifyMicrodeposits($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_intents/%s/verify_microdeposits', $id), $params, $opts);
    }
}
