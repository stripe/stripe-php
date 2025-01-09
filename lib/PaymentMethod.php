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
 * @property (object{bank_name: null|string, fingerprint: null|string, institution_number: null|string, last4: null|string, transit_number: null|string}&\Stripe\StripeObject&\stdClass) $acss_debit
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $affirm
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $afterpay_clearpay
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $alipay
 * @property null|string $allow_redisplay This field indicates whether this payment method can be shown again to its customer in a checkout flow. Stripe products such as Checkout and Elements use this field to determine whether a payment method can be shown as a saved payment method in a checkout flow. The field defaults to “unspecified”.
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $alma
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $amazon_pay
 * @property (object{bsb_number: null|string, fingerprint: null|string, last4: null|string}&\Stripe\StripeObject&\stdClass) $au_becs_debit
 * @property (object{fingerprint: null|string, last4: null|string, sort_code: null|string}&\Stripe\StripeObject&\stdClass) $bacs_debit
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $bancontact
 * @property (object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), email: null|string, name: null|string, phone: null|string}&\Stripe\StripeObject&\stdClass) $billing_details
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $blik
 * @property null|(object{tax_id: string}&\Stripe\StripeObject&\stdClass) $boleto
 * @property (object{brand: string, checks: null|(object{address_line1_check: null|string, address_postal_code_check: null|string, cvc_check: null|string}&\Stripe\StripeObject&\stdClass), country: null|string, description?: null|string, display_brand: null|string, exp_month: int, exp_year: int, fingerprint?: null|string, funding: string, generated_from: null|(object{charge: null|string, payment_method_details: null|(object{card_present?: (object{amount_authorized: null|int, brand: null|string, brand_product: null|string, capture_before?: int, cardholder_name: null|string, country: null|string, description?: null|string, emv_auth_data: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, generated_card: null|string, iin?: null|string, incremental_authorization_supported: bool, issuer?: null|string, last4: null|string, network: null|string, network_transaction_id: null|string, offline: null|(object{stored_at: null|int, type: null|string}&\Stripe\StripeObject&\stdClass), overcapture_supported: bool, preferred_locales: null|string[], read_method: null|string, receipt: null|(object{account_type?: string, application_cryptogram: null|string, application_preferred_name: null|string, authorization_code: null|string, authorization_response_code: null|string, cardholder_verification_method: null|string, dedicated_file_name: null|string, terminal_verification_results: null|string, transaction_status_information: null|string}&\Stripe\StripeObject&\stdClass), wallet?: (object{type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), type: string}&\Stripe\StripeObject&\stdClass), setup_attempt: null|string|\Stripe\SetupAttempt}&\Stripe\StripeObject&\stdClass), iin?: null|string, issuer?: null|string, last4: string, networks: null|(object{available: string[], preferred: null|string}&\Stripe\StripeObject&\stdClass), regulated_status: null|string, three_d_secure_usage: null|(object{supported: bool}&\Stripe\StripeObject&\stdClass), wallet: null|(object{amex_express_checkout?: (object{}&\Stripe\StripeObject&\stdClass), apple_pay?: (object{}&\Stripe\StripeObject&\stdClass), dynamic_last4: null|string, google_pay?: (object{}&\Stripe\StripeObject&\stdClass), link?: (object{}&\Stripe\StripeObject&\stdClass), masterpass?: (object{billing_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), email: null|string, name: null|string, shipping_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), samsung_pay?: (object{}&\Stripe\StripeObject&\stdClass), type: string, visa_checkout?: (object{billing_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), email: null|string, name: null|string, shipping_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $card
 * @property (object{brand: null|string, brand_product: null|string, cardholder_name: null|string, country: null|string, description?: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, iin?: null|string, issuer?: null|string, last4: null|string, networks: null|(object{available: string[], preferred: null|string}&\Stripe\StripeObject&\stdClass), offline: null|(object{stored_at: null|int, type: null|string}&\Stripe\StripeObject&\stdClass), preferred_locales: null|string[], read_method: null|string, wallet?: (object{type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $card_present
 * @property (object{buyer_id: null|string, cashtag: null|string}&\Stripe\StripeObject&\stdClass) $cashapp
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string|\Stripe\Customer $customer The ID of the Customer to which this PaymentMethod is saved. This will not be set when the PaymentMethod has not been saved to a Customer.
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $customer_balance
 * @property (object{bank: null|string}&\Stripe\StripeObject&\stdClass) $eps
 * @property (object{account_holder_type: null|string, bank: string}&\Stripe\StripeObject&\stdClass) $fpx
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $giropay
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $gopay
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $grabpay
 * @property (object{bank: null|string, bank_code: null|string, bank_name: null|string, display_name: null|string}&\Stripe\StripeObject&\stdClass) $id_bank_transfer
 * @property (object{bank: null|string, bic: null|string}&\Stripe\StripeObject&\stdClass) $ideal
 * @property (object{brand: null|string, cardholder_name: null|string, country: null|string, description?: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, iin?: null|string, issuer?: null|string, last4: null|string, networks: null|(object{available: string[], preferred: null|string}&\Stripe\StripeObject&\stdClass), preferred_locales: null|string[], read_method: null|string}&\Stripe\StripeObject&\stdClass) $interac_present
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $kakao_pay
 * @property (object{dob?: null|(object{day: null|int, month: null|int, year: null|int}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $klarna
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $konbini
 * @property (object{brand: null|string, last4: null|string}&\Stripe\StripeObject&\stdClass) $kr_card
 * @property (object{email: null|string, persistent_token?: string}&\Stripe\StripeObject&\stdClass) $link
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $mb_way
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $mobilepay
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $multibanco
 * @property null|(object{funding: string}&\Stripe\StripeObject&\stdClass) $naver_pay
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $oxxo
 * @property (object{bank: null|string}&\Stripe\StripeObject&\stdClass) $p24
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $payco
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $paynow
 * @property (object{country: null|string, fingerprint?: null|string, payer_email: null|string, payer_id: null|string, verified_email?: null|string}&\Stripe\StripeObject&\stdClass) $paypal
 * @property (object{bsb_number: null|string, last4: null|string, pay_id: null|string}&\Stripe\StripeObject&\stdClass) $payto
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $pix
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $promptpay
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $qris
 * @property null|(object{session?: string}&\Stripe\StripeObject&\stdClass) $radar_options Options to configure Radar. See <a href="https://stripe.com/docs/radar/radar-session">Radar Session</a> for more information.
 * @property null|(object{dob?: (object{day: int, month: int, year: int}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $rechnung
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $revolut_pay
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $samsung_pay
 * @property (object{bank_code: null|string, branch_code: null|string, country: null|string, fingerprint: null|string, generated_from: null|(object{charge: null|string|\Stripe\Charge, setup_attempt: null|string|\Stripe\SetupAttempt}&\Stripe\StripeObject&\stdClass), last4: null|string}&\Stripe\StripeObject&\stdClass) $sepa_debit
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $shopeepay
 * @property (object{country: null|string}&\Stripe\StripeObject&\stdClass) $sofort
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $swish
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $twint
 * @property string $type The type of the PaymentMethod. An additional hash is included on the PaymentMethod with a name matching this value. It contains additional information specific to the PaymentMethod type.
 * @property (object{account_holder_type: null|string, account_number?: null|string, account_type: null|string, bank_name: null|string, financial_connections_account: null|string, fingerprint: null|string, last4: null|string, networks: null|(object{preferred: null|string, supported: string[]}&\Stripe\StripeObject&\stdClass), routing_number: null|string, status_details: null|(object{blocked?: (object{network_code: null|string, reason: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $us_bank_account
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $wechat_pay
 * @property null|(object{}&\Stripe\StripeObject&\stdClass) $zip
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
    const TYPE_BLIK = 'blik';
    const TYPE_BOLETO = 'boleto';
    const TYPE_CARD = 'card';
    const TYPE_CARD_PRESENT = 'card_present';
    const TYPE_CASHAPP = 'cashapp';
    const TYPE_CUSTOMER_BALANCE = 'customer_balance';
    const TYPE_EPS = 'eps';
    const TYPE_FPX = 'fpx';
    const TYPE_GIROPAY = 'giropay';
    const TYPE_GOPAY = 'gopay';
    const TYPE_GRABPAY = 'grabpay';
    const TYPE_IDEAL = 'ideal';
    const TYPE_ID_BANK_TRANSFER = 'id_bank_transfer';
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
    const TYPE_OXXO = 'oxxo';
    const TYPE_P24 = 'p24';
    const TYPE_PAYCO = 'payco';
    const TYPE_PAYNOW = 'paynow';
    const TYPE_PAYPAL = 'paypal';
    const TYPE_PAYTO = 'payto';
    const TYPE_PIX = 'pix';
    const TYPE_PROMPTPAY = 'promptpay';
    const TYPE_QRIS = 'qris';
    const TYPE_RECHNUNG = 'rechnung';
    const TYPE_REVOLUT_PAY = 'revolut_pay';
    const TYPE_SAMSUNG_PAY = 'samsung_pay';
    const TYPE_SEPA_DEBIT = 'sepa_debit';
    const TYPE_SHOPEEPAY = 'shopeepay';
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
     * @param null|array{acss_debit?: array{account_number: string, institution_number: string, transit_number: string}, affirm?: array{}, afterpay_clearpay?: array{}, alipay?: array{}, allow_redisplay?: string, alma?: array{}, amazon_pay?: array{}, au_becs_debit?: array{account_number: string, bsb_number: string}, bacs_debit?: array{account_number?: string, sort_code?: string}, bancontact?: array{}, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, blik?: array{}, boleto?: array{tax_id: string}, card?: array{cvc?: string, exp_month?: int, exp_year?: int, networks?: array{preferred?: string}, number?: string, token?: string}, cashapp?: array{}, customer?: string, customer_balance?: array{}, eps?: array{bank?: string}, expand?: string[], fpx?: array{account_holder_type?: string, bank: string}, giropay?: array{}, gopay?: array{}, grabpay?: array{}, id_bank_transfer?: array{bank?: string}, ideal?: array{bank?: string}, interac_present?: array{}, kakao_pay?: array{}, klarna?: array{dob?: array{day: int, month: int, year: int}}, konbini?: array{}, kr_card?: array{}, link?: array{}, mb_way?: array{}, metadata?: \Stripe\StripeObject, mobilepay?: array{}, multibanco?: array{}, naver_pay?: array{funding?: string}, oxxo?: array{}, p24?: array{bank?: string}, payco?: array{}, payment_method?: string, paynow?: array{}, paypal?: array{}, payto?: array{account_number?: string, bsb_number?: string, pay_id?: string}, pix?: array{}, promptpay?: array{}, qris?: array{}, radar_options?: array{session?: string}, rechnung?: array{dob: array{day: int, month: int, year: int}}, revolut_pay?: array{}, samsung_pay?: array{}, sepa_debit?: array{iban: string}, shopeepay?: array{}, sofort?: array{country: string}, swish?: array{}, twint?: array{}, type?: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}, wechat_pay?: array{}, zip?: array{}} $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod the created resource
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
     * Returns a list of PaymentMethods for Treasury flows. If you want to list the
     * PaymentMethods attached to a Customer for payments, you should use the <a
     * href="/docs/api/payment_methods/customer_list">List a Customer’s
     * PaymentMethods</a> API instead.
     *
     * @param null|array{customer?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, type?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\PaymentMethod> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
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
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates a PaymentMethod object. A PaymentMethod must be attached a customer to
     * be updated.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{allow_redisplay?: string, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, card?: array{exp_month?: int, exp_year?: int, networks?: array{preferred?: null|string}}, expand?: string[], link?: array{}, metadata?: null|\Stripe\StripeObject, naver_pay?: array{funding?: string}, payto?: array{account_number?: string, bsb_number?: string, pay_id?: string}, us_bank_account?: array{account_holder_type?: string, account_type?: string}} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod the updated resource
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
     * @return \Stripe\PaymentMethod the attached payment method
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
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod the detached payment method
     */
    public function detach($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/detach';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
