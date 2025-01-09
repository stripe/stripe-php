<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A SetupIntent guides you through the process of setting up and saving a customer's payment credentials for future payments.
 * For example, you can use a SetupIntent to set up and save your customer's card without immediately collecting a payment.
 * Later, you can use <a href="https://stripe.com/docs/api#payment_intents">PaymentIntents</a> to drive the payment flow.
 *
 * Create a SetupIntent when you're ready to collect your customer's payment credentials.
 * Don't maintain long-lived, unconfirmed SetupIntents because they might not be valid.
 * The SetupIntent transitions through multiple <a href="https://docs.stripe.com/payments/intents#intent-statuses">statuses</a> as it guides
 * you through the setup process.
 *
 * Successful SetupIntents result in payment credentials that are optimized for future payments.
 * For example, cardholders in <a href="https://stripe.com/guides/strong-customer-authentication">certain regions</a> might need to be run through
 * <a href="https://docs.stripe.com/strong-customer-authentication">Strong Customer Authentication</a> during payment method collection
 * to streamline later <a href="https://docs.stripe.com/payments/setup-intents">off-session payments</a>.
 * If you use the SetupIntent with a <a href="https://stripe.com/docs/api#setup_intent_object-customer">Customer</a>,
 * it automatically attaches the resulting payment method to that Customer after successful setup.
 * We recommend using SetupIntents or <a href="https://stripe.com/docs/api#payment_intent_object-setup_future_usage">setup_future_usage</a> on
 * PaymentIntents to save payment methods to prevent saving invalid or unoptimized payment methods.
 *
 * By using SetupIntents, you can reduce friction for your customers, even as regulations change over time.
 *
 * Related guide: <a href="https://docs.stripe.com/payments/setup-intents">Setup Intents API</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string|\Stripe\Application $application ID of the Connect application that created the SetupIntent.
 * @property null|bool $attach_to_self <p>If present, the SetupIntent's payment method will be attached to the in-context Stripe Account.</p><p>It can only be used for this Stripe Account’s own money movement flows like InboundTransfer and OutboundTransfers. It cannot be set to true when setting up a PaymentMethod for a Customer, and defaults to false when attaching a PaymentMethod to a Customer.</p>
 * @property null|(object{allow_redirects?: string, enabled: null|bool}&\Stripe\StripeObject&\stdClass) $automatic_payment_methods Settings for dynamic payment methods compatible with this Setup Intent
 * @property null|string $cancellation_reason Reason for cancellation of this SetupIntent, one of <code>abandoned</code>, <code>requested_by_customer</code>, or <code>duplicate</code>.
 * @property null|string $client_secret <p>The client secret of this SetupIntent. Used for client-side retrieval using a publishable key.</p><p>The client secret can be used to complete payment setup from your frontend. It should not be stored, logged, or exposed to anyone other than the customer. Make sure that you have TLS enabled on any page that includes the client secret.</p>
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string|\Stripe\Customer $customer <p>ID of the Customer this SetupIntent belongs to, if one exists.</p><p>If present, the SetupIntent's payment method will be attached to the Customer on successful setup. Payment methods attached to other Customers cannot be used with this SetupIntent.</p>
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|string[] $flow_directions <p>Indicates the directions of money movement for which this payment method is intended to be used.</p><p>Include <code>inbound</code> if you intend to use the payment method as the origin to pull funds from. Include <code>outbound</code> if you intend to use the payment method as the destination to send funds to. You can include both if you intend to use the payment method for both purposes.</p>
 * @property null|(object{advice_code?: string, charge?: string, code?: string, decline_code?: string, doc_url?: string, message?: string, network_advice_code?: string, network_decline_code?: string, param?: string, payment_intent?: \Stripe\PaymentIntent, payment_method?: \Stripe\PaymentMethod, payment_method_type?: string, request_log_url?: string, setup_intent?: \Stripe\SetupIntent, source?: \Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source, type: string}&\Stripe\StripeObject&\stdClass) $last_setup_error The error encountered in the previous SetupIntent confirmation.
 * @property null|string|\Stripe\SetupAttempt $latest_attempt The most recent SetupAttempt for this SetupIntent.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string|\Stripe\Mandate $mandate ID of the multi use Mandate generated by the SetupIntent.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{cashapp_handle_redirect_or_display_qr_code?: (object{hosted_instructions_url: string, mobile_auth_url: string, qr_code: (object{expires_at: int, image_url_png: string, image_url_svg: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), redirect_to_url?: (object{return_url: null|string, url: null|string}&\Stripe\StripeObject&\stdClass), type: string, use_stripe_sdk?: \Stripe\StripeObject, verify_with_microdeposits?: (object{arrival_date: int, hosted_verification_url: string, microdeposit_type: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $next_action If present, this property tells you what actions you need to take in order for your customer to continue payment setup.
 * @property null|string|\Stripe\Account $on_behalf_of The account (if any) for which the setup is intended.
 * @property null|string|\Stripe\PaymentMethod $payment_method ID of the payment method used with this SetupIntent. If the payment method is <code>card_present</code> and isn't a digital wallet, then the <a href="https://docs.stripe.com/api/setup_attempts/object#setup_attempt_object-payment_method_details-card_present-generated_card">generated_card</a> associated with the <code>latest_attempt</code> is attached to the Customer instead.
 * @property null|(object{id: string, parent: null|string}&\Stripe\StripeObject&\stdClass) $payment_method_configuration_details Information about the <a href="https://stripe.com/docs/api/payment_method_configurations">payment method configuration</a> used for this Setup Intent.
 * @property null|(object{acss_debit?: (object{currency: null|string, mandate_options?: (object{custom_mandate_url?: string, default_for?: string[], interval_description: null|string, payment_schedule: null|string, transaction_type: null|string}&\Stripe\StripeObject&\stdClass), verification_method?: string}&\Stripe\StripeObject&\stdClass), amazon_pay?: (object{}&\Stripe\StripeObject&\stdClass), bacs_debit?: (object{mandate_options?: (object{reference_prefix?: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), card?: (object{mandate_options: null|(object{amount: int, amount_type: string, currency: string, description: null|string, end_date: null|int, interval: string, interval_count: null|int, reference: string, start_date: int, supported_types: null|string[]}&\Stripe\StripeObject&\stdClass), network: null|string, request_three_d_secure: null|string}&\Stripe\StripeObject&\stdClass), card_present?: (object{}&\Stripe\StripeObject&\stdClass), link?: (object{persistent_token: null|string}&\Stripe\StripeObject&\stdClass), paypal?: (object{billing_agreement_id: null|string, currency?: null|string, subsellers?: string[]}&\Stripe\StripeObject&\stdClass), payto?: (object{mandate_options?: (object{amount: null|int, amount_type: null|string, end_date: null|string, payment_schedule: null|string, payments_per_period: null|int, purpose: null|string, start_date: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), sepa_debit?: (object{mandate_options?: (object{reference_prefix?: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), us_bank_account?: (object{financial_connections?: (object{filters?: (object{account_subcategories?: string[], institution?: string}&\Stripe\StripeObject&\stdClass), manual_entry?: (object{mode?: string}&\Stripe\StripeObject&\stdClass), permissions?: string[], prefetch: null|string[], return_url?: string}&\Stripe\StripeObject&\stdClass), mandate_options?: (object{collection_method?: string}&\Stripe\StripeObject&\stdClass), verification_method?: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $payment_method_options Payment method-specific configuration for this SetupIntent.
 * @property string[] $payment_method_types The list of payment method types (e.g. card) that this SetupIntent is allowed to set up.
 * @property null|string|\Stripe\Mandate $single_use_mandate ID of the single_use Mandate generated by the SetupIntent.
 * @property string $status <a href="https://stripe.com/docs/payments/intents#intent-statuses">Status</a> of this SetupIntent, one of <code>requires_payment_method</code>, <code>requires_confirmation</code>, <code>requires_action</code>, <code>processing</code>, <code>canceled</code>, or <code>succeeded</code>.
 * @property string $usage <p>Indicates how the payment method is intended to be used in the future.</p><p>Use <code>on_session</code> if you intend to only reuse the payment method when the customer is in your checkout flow. Use <code>off_session</code> if your customer may or may not be in your checkout flow. If not provided, this value defaults to <code>off_session</code>.</p>
 */
class SetupIntent extends ApiResource
{
    const OBJECT_NAME = 'setup_intent';

    use ApiOperations\Update;

    const CANCELLATION_REASON_ABANDONED = 'abandoned';
    const CANCELLATION_REASON_DUPLICATE = 'duplicate';
    const CANCELLATION_REASON_REQUESTED_BY_CUSTOMER = 'requested_by_customer';

    const STATUS_CANCELED = 'canceled';
    const STATUS_PROCESSING = 'processing';
    const STATUS_REQUIRES_ACTION = 'requires_action';
    const STATUS_REQUIRES_CONFIRMATION = 'requires_confirmation';
    const STATUS_REQUIRES_PAYMENT_METHOD = 'requires_payment_method';
    const STATUS_SUCCEEDED = 'succeeded';

    /**
     * Creates a SetupIntent object.
     *
     * After you create the SetupIntent, attach a payment method and <a
     * href="/docs/api/setup_intents/confirm">confirm</a> it to collect any required
     * permissions to charge the payment method later.
     *
     * @param null|array{attach_to_self?: bool, automatic_payment_methods?: array{allow_redirects?: string, enabled: bool}, confirm?: bool, confirmation_token?: string, customer?: string, description?: string, expand?: string[], flow_directions?: string[], mandate_data?: null|array{customer_acceptance: array{accepted_at?: int, offline?: array{}, online?: array{ip_address: string, user_agent: string}, type: string}}, metadata?: \Stripe\StripeObject, on_behalf_of?: string, payment_method?: string, payment_method_configuration?: string, payment_method_data?: array{acss_debit?: array{account_number: string, institution_number: string, transit_number: string}, affirm?: array{}, afterpay_clearpay?: array{}, alipay?: array{}, allow_redisplay?: string, alma?: array{}, amazon_pay?: array{}, au_becs_debit?: array{account_number: string, bsb_number: string}, bacs_debit?: array{account_number?: string, sort_code?: string}, bancontact?: array{}, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, blik?: array{}, boleto?: array{tax_id: string}, cashapp?: array{}, customer_balance?: array{}, eps?: array{bank?: string}, fpx?: array{account_holder_type?: string, bank: string}, giropay?: array{}, gopay?: array{}, grabpay?: array{}, id_bank_transfer?: array{bank?: string}, ideal?: array{bank?: string}, interac_present?: array{}, kakao_pay?: array{}, klarna?: array{dob?: array{day: int, month: int, year: int}}, konbini?: array{}, kr_card?: array{}, link?: array{}, mb_way?: array{}, metadata?: \Stripe\StripeObject, mobilepay?: array{}, multibanco?: array{}, naver_pay?: array{funding?: string}, oxxo?: array{}, p24?: array{bank?: string}, payco?: array{}, paynow?: array{}, paypal?: array{}, payto?: array{account_number?: string, bsb_number?: string, pay_id?: string}, pix?: array{}, promptpay?: array{}, qris?: array{}, radar_options?: array{session?: string}, rechnung?: array{dob: array{day: int, month: int, year: int}}, revolut_pay?: array{}, samsung_pay?: array{}, sepa_debit?: array{iban: string}, shopeepay?: array{}, sofort?: array{country: string}, swish?: array{}, twint?: array{}, type: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}, wechat_pay?: array{}, zip?: array{}}, payment_method_options?: array{acss_debit?: array{currency?: string, mandate_options?: array{custom_mandate_url?: null|string, default_for?: string[], interval_description?: string, payment_schedule?: string, transaction_type?: string}, verification_method?: string}, amazon_pay?: array{}, bacs_debit?: array{mandate_options?: array{reference_prefix?: null|string}}, card?: array{mandate_options?: array{amount: int, amount_type: string, currency: string, description?: string, end_date?: int, interval: string, interval_count?: int, reference: string, start_date: int, supported_types?: string[]}, moto?: bool, network?: string, request_three_d_secure?: string, three_d_secure?: array{ares_trans_status?: string, cryptogram?: string, electronic_commerce_indicator?: string, network_options?: array{cartes_bancaires?: array{cb_avalgo: string, cb_exemption?: string, cb_score?: int}}, requestor_challenge_indicator?: string, transaction_id?: string, version?: string}}, card_present?: array{}, link?: array{persistent_token?: string}, paypal?: array{billing_agreement_id?: string, currency?: string, subsellers?: string[]}, payto?: array{mandate_options?: array{amount?: int, amount_type?: string, end_date?: string, payment_schedule?: string, payments_per_period?: int, purpose?: string, start_date?: string}}, sepa_debit?: array{mandate_options?: array{reference_prefix?: null|string}}, us_bank_account?: array{financial_connections?: array{filters?: array{account_subcategories?: string[], institution?: string}, manual_entry?: array{mode: string}, permissions?: string[], prefetch?: string[], return_url?: string}, mandate_options?: array{collection_method?: null|string}, networks?: array{requested?: string[]}, verification_method?: string}}, payment_method_types?: string[], return_url?: string, single_use?: array{amount: int, currency: string}, usage?: string, use_stripe_sdk?: bool} $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent the created resource
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
     * Returns a list of SetupIntents.
     *
     * @param null|array{attach_to_self?: bool, created?: int|array, customer?: string, ending_before?: string, expand?: string[], limit?: int, payment_method?: string, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\SetupIntent> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
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
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates a SetupIntent object.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{attach_to_self?: bool, customer?: string, description?: string, expand?: string[], flow_directions?: string[], metadata?: null|\Stripe\StripeObject, payment_method?: string, payment_method_configuration?: string, payment_method_data?: array{acss_debit?: array{account_number: string, institution_number: string, transit_number: string}, affirm?: array{}, afterpay_clearpay?: array{}, alipay?: array{}, allow_redisplay?: string, alma?: array{}, amazon_pay?: array{}, au_becs_debit?: array{account_number: string, bsb_number: string}, bacs_debit?: array{account_number?: string, sort_code?: string}, bancontact?: array{}, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, blik?: array{}, boleto?: array{tax_id: string}, cashapp?: array{}, customer_balance?: array{}, eps?: array{bank?: string}, fpx?: array{account_holder_type?: string, bank: string}, giropay?: array{}, gopay?: array{}, grabpay?: array{}, id_bank_transfer?: array{bank?: string}, ideal?: array{bank?: string}, interac_present?: array{}, kakao_pay?: array{}, klarna?: array{dob?: array{day: int, month: int, year: int}}, konbini?: array{}, kr_card?: array{}, link?: array{}, mb_way?: array{}, metadata?: \Stripe\StripeObject, mobilepay?: array{}, multibanco?: array{}, naver_pay?: array{funding?: string}, oxxo?: array{}, p24?: array{bank?: string}, payco?: array{}, paynow?: array{}, paypal?: array{}, payto?: array{account_number?: string, bsb_number?: string, pay_id?: string}, pix?: array{}, promptpay?: array{}, qris?: array{}, radar_options?: array{session?: string}, rechnung?: array{dob: array{day: int, month: int, year: int}}, revolut_pay?: array{}, samsung_pay?: array{}, sepa_debit?: array{iban: string}, shopeepay?: array{}, sofort?: array{country: string}, swish?: array{}, twint?: array{}, type: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}, wechat_pay?: array{}, zip?: array{}}, payment_method_options?: array{acss_debit?: array{currency?: string, mandate_options?: array{custom_mandate_url?: null|string, default_for?: string[], interval_description?: string, payment_schedule?: string, transaction_type?: string}, verification_method?: string}, amazon_pay?: array{}, bacs_debit?: array{mandate_options?: array{reference_prefix?: null|string}}, card?: array{mandate_options?: array{amount: int, amount_type: string, currency: string, description?: string, end_date?: int, interval: string, interval_count?: int, reference: string, start_date: int, supported_types?: string[]}, moto?: bool, network?: string, request_three_d_secure?: string, three_d_secure?: array{ares_trans_status?: string, cryptogram?: string, electronic_commerce_indicator?: string, network_options?: array{cartes_bancaires?: array{cb_avalgo: string, cb_exemption?: string, cb_score?: int}}, requestor_challenge_indicator?: string, transaction_id?: string, version?: string}}, card_present?: array{}, link?: array{persistent_token?: string}, paypal?: array{billing_agreement_id?: string, currency?: string, subsellers?: string[]}, payto?: array{mandate_options?: array{amount?: int, amount_type?: string, end_date?: string, payment_schedule?: string, payments_per_period?: int, purpose?: string, start_date?: string}}, sepa_debit?: array{mandate_options?: array{reference_prefix?: null|string}}, us_bank_account?: array{financial_connections?: array{filters?: array{account_subcategories?: string[], institution?: string}, manual_entry?: array{mode: string}, permissions?: string[], prefetch?: string[], return_url?: string}, mandate_options?: array{collection_method?: null|string}, networks?: array{requested?: string[]}, verification_method?: string}}, payment_method_types?: string[]} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent the updated resource
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
     * @return \Stripe\SetupIntent the canceled setup intent
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
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
     * @return \Stripe\SetupIntent the confirmed setup intent
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
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SetupIntent the verified setup intent
     */
    public function verifyMicrodeposits($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/verify_microdeposits';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
