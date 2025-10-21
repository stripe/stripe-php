<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * PaymentMethod objects represent your customer's payment instruments.
 * You can use them with <a href="https://stripe.com/docs/payments/payment-intents">PaymentIntents</a> to collect payments or save them to
 * Customer objects to store instrument details for future payments.
 *
 * Related guides: <a href="https://stripe.com/docs/payments/payment-methods">Payment Methods</a> and <a href="https://stripe.com/docs/payments/more-payment-scenarios">More Payment Scenarios</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{bank_name: null|string, fingerprint: null|string, institution_number: null|string, last4: null|string, transit_number: null|string}&StripeObject) $acss_debit
 * @property null|(object{}&StripeObject) $affirm
 * @property null|(object{}&StripeObject) $afterpay_clearpay
 * @property null|(object{}&StripeObject) $alipay
 * @property null|string $allow_redisplay This field indicates whether this payment method can be shown again to its customer in a checkout flow. Stripe products such as Checkout and Elements use this field to determine whether a payment method can be shown as a saved payment method in a checkout flow. The field defaults to “unspecified”.
 * @property null|(object{}&StripeObject) $alma
 * @property null|(object{}&StripeObject) $amazon_pay
 * @property null|(object{bsb_number: null|string, fingerprint: null|string, last4: null|string}&StripeObject) $au_becs_debit
 * @property null|(object{fingerprint: null|string, last4: null|string, sort_code: null|string}&StripeObject) $bacs_debit
 * @property null|(object{}&StripeObject) $bancontact
 * @property null|(object{}&StripeObject) $billie
 * @property (object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject), email: null|string, name: null|string, phone: null|string, tax_id: null|string}&StripeObject) $billing_details
 * @property null|(object{}&StripeObject) $blik
 * @property null|(object{tax_id: string}&StripeObject) $boleto
 * @property null|(object{brand: string, checks: null|(object{address_line1_check: null|string, address_postal_code_check: null|string, cvc_check: null|string}&StripeObject), country: null|string, description?: null|string, display_brand: null|string, exp_month: int, exp_year: int, fingerprint?: null|string, funding: string, generated_from: null|(object{charge: null|string, payment_method_details: null|(object{card_present?: (object{amount_authorized: null|int, brand: null|string, brand_product: null|string, capture_before?: int, cardholder_name: null|string, country: null|string, description?: null|string, emv_auth_data: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, generated_card: null|string, iin?: null|string, incremental_authorization_supported: bool, issuer?: null|string, last4: null|string, network: null|string, network_transaction_id: null|string, offline: null|(object{stored_at: null|int, type: null|string}&StripeObject), overcapture_supported: bool, preferred_locales: null|string[], read_method: null|string, receipt: null|(object{account_type?: string, application_cryptogram: null|string, application_preferred_name: null|string, authorization_code: null|string, authorization_response_code: null|string, cardholder_verification_method: null|string, dedicated_file_name: null|string, terminal_verification_results: null|string, transaction_status_information: null|string}&StripeObject), wallet?: (object{type: string}&StripeObject)}&StripeObject), type: string}&StripeObject), setup_attempt: null|SetupAttempt|string}&StripeObject), iin?: null|string, issuer?: null|string, last4: string, networks: null|(object{available: string[], preferred: null|string}&StripeObject), regulated_status: null|string, three_d_secure_usage: null|(object{supported: bool}&StripeObject), wallet: null|(object{amex_express_checkout?: (object{}&StripeObject), apple_pay?: (object{}&StripeObject), dynamic_last4: null|string, google_pay?: (object{}&StripeObject), link?: (object{}&StripeObject), masterpass?: (object{billing_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject), email: null|string, name: null|string, shipping_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject)}&StripeObject), samsung_pay?: (object{}&StripeObject), type: string, visa_checkout?: (object{billing_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject), email: null|string, name: null|string, shipping_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject)}&StripeObject)}&StripeObject)}&StripeObject) $card
 * @property null|(object{brand: null|string, brand_product: null|string, cardholder_name: null|string, country: null|string, description?: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, iin?: null|string, issuer?: null|string, last4: null|string, networks: null|(object{available: string[], preferred: null|string}&StripeObject), offline: null|(object{stored_at: null|int, type: null|string}&StripeObject), preferred_locales: null|string[], read_method: null|string, wallet?: (object{type: string}&StripeObject)}&StripeObject) $card_present
 * @property null|(object{buyer_id: null|string, cashtag: null|string}&StripeObject) $cashapp
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{}&StripeObject) $crypto
 * @property null|(object{display_name: null|string, logo: null|(object{content_type: null|string, url: string}&StripeObject), type: string}&StripeObject) $custom
 * @property null|Customer|string $customer The ID of the Customer to which this PaymentMethod is saved. This will not be set when the PaymentMethod has not been saved to a Customer.
 * @property null|(object{}&StripeObject) $customer_balance
 * @property null|(object{bank: null|string}&StripeObject) $eps
 * @property null|(object{account_holder_type: null|string, bank: string}&StripeObject) $fpx
 * @property null|(object{}&StripeObject) $giropay
 * @property null|(object{}&StripeObject) $grabpay
 * @property null|(object{bank: null|string, bic: null|string}&StripeObject) $ideal
 * @property null|(object{brand: null|string, cardholder_name: null|string, country: null|string, description?: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, iin?: null|string, issuer?: null|string, last4: null|string, networks: null|(object{available: string[], preferred: null|string}&StripeObject), preferred_locales: null|string[], read_method: null|string}&StripeObject) $interac_present
 * @property null|(object{}&StripeObject) $kakao_pay
 * @property null|(object{dob?: null|(object{day: null|int, month: null|int, year: null|int}&StripeObject)}&StripeObject) $klarna
 * @property null|(object{}&StripeObject) $konbini
 * @property null|(object{brand: null|string, last4: null|string}&StripeObject) $kr_card
 * @property null|(object{email: null|string, persistent_token?: string}&StripeObject) $link
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{}&StripeObject) $mb_way
 * @property null|StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{}&StripeObject) $mobilepay
 * @property null|(object{}&StripeObject) $multibanco
 * @property null|(object{buyer_id: null|string, funding: string}&StripeObject) $naver_pay
 * @property null|(object{account_holder_name: null|string, bank_code: string, bank_name: string, branch_code: string, last4: string, suffix: null|string}&StripeObject) $nz_bank_account
 * @property null|(object{}&StripeObject) $oxxo
 * @property null|(object{bank: null|string}&StripeObject) $p24
 * @property null|(object{}&StripeObject) $pay_by_bank
 * @property null|(object{}&StripeObject) $payco
 * @property null|(object{}&StripeObject) $paynow
 * @property null|(object{country: null|string, payer_email: null|string, payer_id: null|string}&StripeObject) $paypal
 * @property null|(object{}&StripeObject) $pix
 * @property null|(object{}&StripeObject) $promptpay
 * @property null|(object{session?: string}&StripeObject) $radar_options Options to configure Radar. See <a href="https://stripe.com/docs/radar/radar-session">Radar Session</a> for more information.
 * @property null|(object{}&StripeObject) $revolut_pay
 * @property null|(object{}&StripeObject) $samsung_pay
 * @property null|(object{}&StripeObject) $satispay
 * @property null|(object{bank_code: null|string, branch_code: null|string, country: null|string, fingerprint: null|string, generated_from: null|(object{charge: null|Charge|string, setup_attempt: null|SetupAttempt|string}&StripeObject), last4: null|string}&StripeObject) $sepa_debit
 * @property null|(object{country: null|string}&StripeObject) $sofort
 * @property null|(object{}&StripeObject) $swish
 * @property null|(object{}&StripeObject) $twint
 * @property string $type The type of the PaymentMethod. An additional hash is included on the PaymentMethod with a name matching this value. It contains additional information specific to the PaymentMethod type.
 * @property null|(object{account_holder_type: null|string, account_type: null|string, bank_name: null|string, financial_connections_account: null|string, fingerprint: null|string, last4: null|string, networks: null|(object{preferred: null|string, supported: string[]}&StripeObject), routing_number: null|string, status_details: null|(object{blocked?: (object{network_code: null|string, reason: null|string}&StripeObject)}&StripeObject)}&StripeObject) $us_bank_account
 * @property null|(object{}&StripeObject) $wechat_pay
 * @property null|(object{}&StripeObject) $zip
 */
class PaymentMethod extends ApiResource
{
    const OBJECT_NAME = 'payment_method';

    use ApiOperations\Update;

    const ALLOW_REDISPLAY_ALWAYS = 'always';
    const ALLOW_REDISPLAY_LIMITED = 'limited';
    const ALLOW_REDISPLAY_UNSPECIFIED = 'unspecified';

    const TYPE_ACSS_DEBIT = 'acss_debit';
    const TYPE_AFFIRM = 'affirm';
    const TYPE_AFTERPAY_CLEARPAY = 'afterpay_clearpay';
    const TYPE_ALIPAY = 'alipay';
    const TYPE_ALMA = 'alma';
    const TYPE_AMAZON_PAY = 'amazon_pay';
    const TYPE_AU_BECS_DEBIT = 'au_becs_debit';
    const TYPE_BACS_DEBIT = 'bacs_debit';
    const TYPE_BANCONTACT = 'bancontact';
    const TYPE_BILLIE = 'billie';
    const TYPE_BLIK = 'blik';
    const TYPE_BOLETO = 'boleto';
    const TYPE_CARD = 'card';
    const TYPE_CARD_PRESENT = 'card_present';
    const TYPE_CASHAPP = 'cashapp';
    const TYPE_CRYPTO = 'crypto';
    const TYPE_CUSTOM = 'custom';
    const TYPE_CUSTOMER_BALANCE = 'customer_balance';
    const TYPE_EPS = 'eps';
    const TYPE_FPX = 'fpx';
    const TYPE_GIROPAY = 'giropay';
    const TYPE_GRABPAY = 'grabpay';
    const TYPE_IDEAL = 'ideal';
    const TYPE_INTERAC_PRESENT = 'interac_present';
    const TYPE_KAKAO_PAY = 'kakao_pay';
    const TYPE_KLARNA = 'klarna';
    const TYPE_KONBINI = 'konbini';
    const TYPE_KR_CARD = 'kr_card';
    const TYPE_LINK = 'link';
    const TYPE_MB_WAY = 'mb_way';
    const TYPE_MOBILEPAY = 'mobilepay';
    const TYPE_MULTIBANCO = 'multibanco';
    const TYPE_NAVER_PAY = 'naver_pay';
    const TYPE_NZ_BANK_ACCOUNT = 'nz_bank_account';
    const TYPE_OXXO = 'oxxo';
    const TYPE_P24 = 'p24';
    const TYPE_PAYCO = 'payco';
    const TYPE_PAYNOW = 'paynow';
    const TYPE_PAYPAL = 'paypal';
    const TYPE_PAY_BY_BANK = 'pay_by_bank';
    const TYPE_PIX = 'pix';
    const TYPE_PROMPTPAY = 'promptpay';
    const TYPE_REVOLUT_PAY = 'revolut_pay';
    const TYPE_SAMSUNG_PAY = 'samsung_pay';
    const TYPE_SATISPAY = 'satispay';
    const TYPE_SEPA_DEBIT = 'sepa_debit';
    const TYPE_SOFORT = 'sofort';
    const TYPE_SWISH = 'swish';
    const TYPE_TWINT = 'twint';
    const TYPE_US_BANK_ACCOUNT = 'us_bank_account';
    const TYPE_WECHAT_PAY = 'wechat_pay';
    const TYPE_ZIP = 'zip';

    /**
     * Creates a PaymentMethod object. Read the <a
     * href="/docs/stripe-js/reference#stripe-create-payment-method">Stripe.js
     * reference</a> to learn how to create PaymentMethods via Stripe.js.
     *
     * Instead of creating a PaymentMethod directly, we recommend using the <a
     * href="/docs/payments/accept-a-payment">PaymentIntents</a> API to accept a
     * payment immediately or the <a
     * href="/docs/payments/save-and-reuse">SetupIntent</a> API to collect payment
     * method details ahead of a future payment.
     *
     * @param null|array{acss_debit?: array{account_number: string, institution_number: string, transit_number: string}, affirm?: array{}, afterpay_clearpay?: array{}, alipay?: array{}, allow_redisplay?: string, alma?: array{}, amazon_pay?: array{}, au_becs_debit?: array{account_number: string, bsb_number: string}, bacs_debit?: array{account_number?: string, sort_code?: string}, bancontact?: array{}, billie?: array{}, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string, tax_id?: string}, blik?: array{}, boleto?: array{tax_id: string}, card?: array{cvc?: string, exp_month?: int, exp_year?: int, networks?: array{preferred?: string}, number?: string, token?: string}, cashapp?: array{}, crypto?: array{}, custom?: array{type: string}, customer?: string, customer_balance?: array{}, eps?: array{bank?: string}, expand?: string[], fpx?: array{account_holder_type?: string, bank: string}, giropay?: array{}, grabpay?: array{}, ideal?: array{bank?: string}, interac_present?: array{}, kakao_pay?: array{}, klarna?: array{dob?: array{day: int, month: int, year: int}}, konbini?: array{}, kr_card?: array{}, link?: array{}, mb_way?: array{}, metadata?: array<string, string>, mobilepay?: array{}, multibanco?: array{}, naver_pay?: array{funding?: string}, nz_bank_account?: array{account_holder_name?: string, account_number: string, bank_code: string, branch_code: string, reference?: string, suffix: string}, oxxo?: array{}, p24?: array{bank?: string}, pay_by_bank?: array{}, payco?: array{}, payment_method?: string, paynow?: array{}, paypal?: array{}, pix?: array{}, promptpay?: array{}, radar_options?: array{session?: string}, revolut_pay?: array{}, samsung_pay?: array{}, satispay?: array{}, sepa_debit?: array{iban: string}, sofort?: array{country: string}, swish?: array{}, twint?: array{}, type?: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}, wechat_pay?: array{}, zip?: array{}} $params
     * @param null|array|string $options
     *
     * @return PaymentMethod the created resource
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
     * Returns a list of PaymentMethods for Treasury flows. If you want to list the
     * PaymentMethods attached to a Customer for payments, you should use the <a
     * href="/docs/api/payment_methods/customer_list">List a Customer’s
     * PaymentMethods</a> API instead.
     *
     * @param null|array{customer?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, type?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<PaymentMethod> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves a PaymentMethod object attached to the StripeAccount. To retrieve a
     * payment method attached to a Customer, you should use <a
     * href="/docs/api/payment_methods/customer">Retrieve a Customer’s
     * PaymentMethods</a>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return PaymentMethod
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
     * Updates a PaymentMethod object. A PaymentMethod must be attached to a customer
     * to be updated.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{allow_redisplay?: string, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string, tax_id?: string}, card?: array{exp_month?: int, exp_year?: int, networks?: array{preferred?: null|string}}, expand?: string[], metadata?: null|array<string, string>, us_bank_account?: array{account_holder_type?: string, account_type?: string}} $params
     * @param null|array|string $opts
     *
     * @return PaymentMethod the updated resource
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

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return PaymentMethod the attached payment method
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function attach($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/attach';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return PaymentMethod the detached payment method
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function detach($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/detach';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
