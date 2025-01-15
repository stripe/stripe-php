<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SetupIntentService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of SetupIntents.
     *
     * @param null|array{attach_to_self?: bool, created?: int|array, customer?: string, ending_before?: string, expand?: string[], limit?: int, payment_method?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\SetupIntent>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/setup_intents', $params, $opts);
    }

    /**
     * You can cancel a SetupIntent object when it’s in one of these statuses:
     * <code>requires_payment_method</code>, <code>requires_confirmation</code>, or
     * <code>requires_action</code>.
     *
     * After you cancel it, setup is abandoned and any operations on the SetupIntent
     * fail with an error. You can’t cancel the SetupIntent for a Checkout Session. <a
     * href="/docs/api/checkout/sessions/expire">Expire the Checkout Session</a>
     * instead.
     *
     * @param string $id
     * @param null|array{cancellation_reason?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/setup_intents/%s/cancel', $id), $params, $opts);
    }

    /**
     * Confirm that your customer intends to set up the current or provided payment
     * method. For example, you would confirm a SetupIntent when a customer hits the
     * “Save” button on a payment method management page on your website.
     *
     * If the selected payment method does not require any additional steps from the
     * customer, the SetupIntent will transition to the <code>succeeded</code> status.
     *
     * Otherwise, it will transition to the <code>requires_action</code> status and
     * suggest additional actions via <code>next_action</code>. If setup fails, the
     * SetupIntent will transition to the <code>requires_payment_method</code> status
     * or the <code>canceled</code> status if the confirmation limit is reached.
     *
     * @param string $id
     * @param null|array{confirmation_token?: string, expand?: string[], mandate_data?: null|array{customer_acceptance?: array{accepted_at?: int, offline?: array{}, online?: array{ip_address?: string, user_agent?: string}, type: string}}, payment_method?: string, payment_method_data?: array{acss_debit?: array{account_number: string, institution_number: string, transit_number: string}, affirm?: array{}, afterpay_clearpay?: array{}, alipay?: array{}, allow_redisplay?: string, alma?: array{}, amazon_pay?: array{}, au_becs_debit?: array{account_number: string, bsb_number: string}, bacs_debit?: array{account_number?: string, sort_code?: string}, bancontact?: array{}, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, blik?: array{}, boleto?: array{tax_id: string}, cashapp?: array{}, customer_balance?: array{}, eps?: array{bank?: string}, fpx?: array{account_holder_type?: string, bank: string}, giropay?: array{}, gopay?: array{}, grabpay?: array{}, id_bank_transfer?: array{bank?: string}, ideal?: array{bank?: string}, interac_present?: array{}, kakao_pay?: array{}, klarna?: array{dob?: array{day: int, month: int, year: int}}, konbini?: array{}, kr_card?: array{}, link?: array{}, mb_way?: array{}, metadata?: \Stripe\StripeObject, mobilepay?: array{}, multibanco?: array{}, naver_pay?: array{funding?: string}, oxxo?: array{}, p24?: array{bank?: string}, pay_by_bank?: array{}, payco?: array{}, paynow?: array{}, paypal?: array{}, payto?: array{account_number?: string, bsb_number?: string, pay_id?: string}, pix?: array{}, promptpay?: array{}, qris?: array{}, radar_options?: array{session?: string}, rechnung?: array{dob: array{day: int, month: int, year: int}}, revolut_pay?: array{}, samsung_pay?: array{}, sepa_debit?: array{iban: string}, shopeepay?: array{}, sofort?: array{country: string}, swish?: array{}, twint?: array{}, type: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}, wechat_pay?: array{}, zip?: array{}}, payment_method_options?: array{acss_debit?: array{currency?: string, mandate_options?: array{custom_mandate_url?: null|string, default_for?: string[], interval_description?: string, payment_schedule?: string, transaction_type?: string}, verification_method?: string}, amazon_pay?: array{}, bacs_debit?: array{mandate_options?: array{reference_prefix?: null|string}}, card?: array{mandate_options?: array{amount: int, amount_type: string, currency: string, description?: string, end_date?: int, interval: string, interval_count?: int, reference: string, start_date: int, supported_types?: string[]}, moto?: bool, network?: string, request_three_d_secure?: string, three_d_secure?: array{ares_trans_status?: string, cryptogram?: string, electronic_commerce_indicator?: string, network_options?: array{cartes_bancaires?: array{cb_avalgo: string, cb_exemption?: string, cb_score?: int}}, requestor_challenge_indicator?: string, transaction_id?: string, version?: string}}, card_present?: array{}, link?: array{persistent_token?: string}, paypal?: array{billing_agreement_id?: string, currency?: string, subsellers?: string[]}, payto?: array{mandate_options?: array{amount?: int, amount_type?: string, end_date?: string, payment_schedule?: string, payments_per_period?: int, purpose?: string, start_date?: string}}, sepa_debit?: array{mandate_options?: array{reference_prefix?: null|string}}, us_bank_account?: array{financial_connections?: array{filters?: array{account_subcategories?: string[], institution?: string}, manual_entry?: array{mode: string}, permissions?: string[], prefetch?: string[], return_url?: string}, mandate_options?: array{collection_method?: null|string}, networks?: array{requested?: string[]}, verification_method?: string}}, return_url?: string, use_stripe_sdk?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function confirm($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/setup_intents/%s/confirm', $id), $params, $opts);
    }

    /**
     * Creates a SetupIntent object.
     *
     * After you create the SetupIntent, attach a payment method and <a
     * href="/docs/api/setup_intents/confirm">confirm</a> it to collect any required
     * permissions to charge the payment method later.
     *
     * @param null|array{attach_to_self?: bool, automatic_payment_methods?: array{allow_redirects?: string, enabled: bool}, confirm?: bool, confirmation_token?: string, customer?: string, description?: string, expand?: string[], flow_directions?: string[], mandate_data?: null|array{customer_acceptance: array{accepted_at?: int, offline?: array{}, online?: array{ip_address: string, user_agent: string}, type: string}}, metadata?: \Stripe\StripeObject, on_behalf_of?: string, payment_method?: string, payment_method_configuration?: string, payment_method_data?: array{acss_debit?: array{account_number: string, institution_number: string, transit_number: string}, affirm?: array{}, afterpay_clearpay?: array{}, alipay?: array{}, allow_redisplay?: string, alma?: array{}, amazon_pay?: array{}, au_becs_debit?: array{account_number: string, bsb_number: string}, bacs_debit?: array{account_number?: string, sort_code?: string}, bancontact?: array{}, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, blik?: array{}, boleto?: array{tax_id: string}, cashapp?: array{}, customer_balance?: array{}, eps?: array{bank?: string}, fpx?: array{account_holder_type?: string, bank: string}, giropay?: array{}, gopay?: array{}, grabpay?: array{}, id_bank_transfer?: array{bank?: string}, ideal?: array{bank?: string}, interac_present?: array{}, kakao_pay?: array{}, klarna?: array{dob?: array{day: int, month: int, year: int}}, konbini?: array{}, kr_card?: array{}, link?: array{}, mb_way?: array{}, metadata?: \Stripe\StripeObject, mobilepay?: array{}, multibanco?: array{}, naver_pay?: array{funding?: string}, oxxo?: array{}, p24?: array{bank?: string}, pay_by_bank?: array{}, payco?: array{}, paynow?: array{}, paypal?: array{}, payto?: array{account_number?: string, bsb_number?: string, pay_id?: string}, pix?: array{}, promptpay?: array{}, qris?: array{}, radar_options?: array{session?: string}, rechnung?: array{dob: array{day: int, month: int, year: int}}, revolut_pay?: array{}, samsung_pay?: array{}, sepa_debit?: array{iban: string}, shopeepay?: array{}, sofort?: array{country: string}, swish?: array{}, twint?: array{}, type: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}, wechat_pay?: array{}, zip?: array{}}, payment_method_options?: array{acss_debit?: array{currency?: string, mandate_options?: array{custom_mandate_url?: null|string, default_for?: string[], interval_description?: string, payment_schedule?: string, transaction_type?: string}, verification_method?: string}, amazon_pay?: array{}, bacs_debit?: array{mandate_options?: array{reference_prefix?: null|string}}, card?: array{mandate_options?: array{amount: int, amount_type: string, currency: string, description?: string, end_date?: int, interval: string, interval_count?: int, reference: string, start_date: int, supported_types?: string[]}, moto?: bool, network?: string, request_three_d_secure?: string, three_d_secure?: array{ares_trans_status?: string, cryptogram?: string, electronic_commerce_indicator?: string, network_options?: array{cartes_bancaires?: array{cb_avalgo: string, cb_exemption?: string, cb_score?: int}}, requestor_challenge_indicator?: string, transaction_id?: string, version?: string}}, card_present?: array{}, link?: array{persistent_token?: string}, paypal?: array{billing_agreement_id?: string, currency?: string, subsellers?: string[]}, payto?: array{mandate_options?: array{amount?: int, amount_type?: string, end_date?: string, payment_schedule?: string, payments_per_period?: int, purpose?: string, start_date?: string}}, sepa_debit?: array{mandate_options?: array{reference_prefix?: null|string}}, us_bank_account?: array{financial_connections?: array{filters?: array{account_subcategories?: string[], institution?: string}, manual_entry?: array{mode: string}, permissions?: string[], prefetch?: string[], return_url?: string}, mandate_options?: array{collection_method?: null|string}, networks?: array{requested?: string[]}, verification_method?: string}}, payment_method_types?: string[], return_url?: string, single_use?: array{amount: int, currency: string}, usage?: string, use_stripe_sdk?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/setup_intents', $params, $opts);
    }

    /**
     * Retrieves the details of a SetupIntent that has previously been created.
     *
     * Client-side retrieval using a publishable key is allowed when the
     * <code>client_secret</code> is provided in the query string.
     *
     * When retrieved with a publishable key, only a subset of properties will be
     * returned. Please refer to the <a href="#setup_intent_object">SetupIntent</a>
     * object reference for more details.
     *
     * @param string $id
     * @param null|array{client_secret?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/setup_intents/%s', $id), $params, $opts);
    }

    /**
     * Updates a SetupIntent object.
     *
     * @param string $id
     * @param null|array{attach_to_self?: bool, customer?: string, description?: string, expand?: string[], flow_directions?: string[], metadata?: null|\Stripe\StripeObject, payment_method?: string, payment_method_configuration?: string, payment_method_data?: array{acss_debit?: array{account_number: string, institution_number: string, transit_number: string}, affirm?: array{}, afterpay_clearpay?: array{}, alipay?: array{}, allow_redisplay?: string, alma?: array{}, amazon_pay?: array{}, au_becs_debit?: array{account_number: string, bsb_number: string}, bacs_debit?: array{account_number?: string, sort_code?: string}, bancontact?: array{}, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, blik?: array{}, boleto?: array{tax_id: string}, cashapp?: array{}, customer_balance?: array{}, eps?: array{bank?: string}, fpx?: array{account_holder_type?: string, bank: string}, giropay?: array{}, gopay?: array{}, grabpay?: array{}, id_bank_transfer?: array{bank?: string}, ideal?: array{bank?: string}, interac_present?: array{}, kakao_pay?: array{}, klarna?: array{dob?: array{day: int, month: int, year: int}}, konbini?: array{}, kr_card?: array{}, link?: array{}, mb_way?: array{}, metadata?: \Stripe\StripeObject, mobilepay?: array{}, multibanco?: array{}, naver_pay?: array{funding?: string}, oxxo?: array{}, p24?: array{bank?: string}, pay_by_bank?: array{}, payco?: array{}, paynow?: array{}, paypal?: array{}, payto?: array{account_number?: string, bsb_number?: string, pay_id?: string}, pix?: array{}, promptpay?: array{}, qris?: array{}, radar_options?: array{session?: string}, rechnung?: array{dob: array{day: int, month: int, year: int}}, revolut_pay?: array{}, samsung_pay?: array{}, sepa_debit?: array{iban: string}, shopeepay?: array{}, sofort?: array{country: string}, swish?: array{}, twint?: array{}, type: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}, wechat_pay?: array{}, zip?: array{}}, payment_method_options?: array{acss_debit?: array{currency?: string, mandate_options?: array{custom_mandate_url?: null|string, default_for?: string[], interval_description?: string, payment_schedule?: string, transaction_type?: string}, verification_method?: string}, amazon_pay?: array{}, bacs_debit?: array{mandate_options?: array{reference_prefix?: null|string}}, card?: array{mandate_options?: array{amount: int, amount_type: string, currency: string, description?: string, end_date?: int, interval: string, interval_count?: int, reference: string, start_date: int, supported_types?: string[]}, moto?: bool, network?: string, request_three_d_secure?: string, three_d_secure?: array{ares_trans_status?: string, cryptogram?: string, electronic_commerce_indicator?: string, network_options?: array{cartes_bancaires?: array{cb_avalgo: string, cb_exemption?: string, cb_score?: int}}, requestor_challenge_indicator?: string, transaction_id?: string, version?: string}}, card_present?: array{}, link?: array{persistent_token?: string}, paypal?: array{billing_agreement_id?: string, currency?: string, subsellers?: string[]}, payto?: array{mandate_options?: array{amount?: int, amount_type?: string, end_date?: string, payment_schedule?: string, payments_per_period?: int, purpose?: string, start_date?: string}}, sepa_debit?: array{mandate_options?: array{reference_prefix?: null|string}}, us_bank_account?: array{financial_connections?: array{filters?: array{account_subcategories?: string[], institution?: string}, manual_entry?: array{mode: string}, permissions?: string[], prefetch?: string[], return_url?: string}, mandate_options?: array{collection_method?: null|string}, networks?: array{requested?: string[]}, verification_method?: string}}, payment_method_types?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/setup_intents/%s', $id), $params, $opts);
    }

    /**
     * Verifies microdeposits on a SetupIntent object.
     *
     * @param string $id
     * @param null|array{amounts?: int[], descriptor_code?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public function verifyMicrodeposits($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/setup_intents/%s/verify_microdeposits', $id), $params, $opts);
    }
}
