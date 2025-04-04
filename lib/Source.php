<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * <code>Source</code> objects allow you to accept a variety of payment methods. They
 * represent a customer's payment instrument, and can be used with the Stripe API
 * just like a <code>Card</code> object: once chargeable, they can be charged, or can be
 * attached to customers.
 *
 * Stripe doesn't recommend using the deprecated <a href="https://stripe.com/docs/api/sources">Sources API</a>.
 * We recommend that you adopt the <a href="https://stripe.com/docs/api/payment_methods">PaymentMethods API</a>.
 * This newer API provides access to our latest features and payment method types.
 *
 * Related guides: <a href="https://stripe.com/docs/sources">Sources API</a> and <a href="https://stripe.com/docs/sources/customers">Sources &amp; Customers</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{account_number?: null|string, bank_name?: null|string, fingerprint?: null|string, refund_account_holder_name?: null|string, refund_account_holder_type?: null|string, refund_routing_number?: null|string, routing_number?: null|string, swift_code?: null|string}&StripeObject) $ach_credit_transfer
 * @property null|(object{bank_name?: null|string, country?: null|string, fingerprint?: null|string, last4?: null|string, routing_number?: null|string, type?: null|string}&StripeObject) $ach_debit
 * @property null|(object{bank_address_city?: null|string, bank_address_line_1?: null|string, bank_address_line_2?: null|string, bank_address_postal_code?: null|string, bank_name?: null|string, category?: null|string, country?: null|string, fingerprint?: null|string, last4?: null|string, routing_number?: null|string}&StripeObject) $acss_debit
 * @property null|(object{data_string?: null|string, native_url?: null|string, statement_descriptor?: null|string}&StripeObject) $alipay
 * @property null|string $allow_redisplay This field indicates whether this payment method can be shown again to its customer in a checkout flow. Stripe products such as Checkout and Elements use this field to determine whether a payment method can be shown as a saved payment method in a checkout flow. The field defaults to “unspecified”.
 * @property null|int $amount A positive integer in the smallest currency unit (that is, 100 cents for $1.00, or 1 for ¥1, Japanese Yen being a zero-decimal currency) representing the total amount associated with the source. This is the amount for which the source will be chargeable once ready. Required for <code>single_use</code> sources.
 * @property null|(object{bsb_number?: null|string, fingerprint?: null|string, last4?: null|string}&StripeObject) $au_becs_debit
 * @property null|(object{bank_code?: null|string, bank_name?: null|string, bic?: null|string, iban_last4?: null|string, preferred_language?: null|string, statement_descriptor?: null|string}&StripeObject) $bancontact
 * @property null|(object{address_line1_check?: null|string, address_zip_check?: null|string, brand?: null|string, country?: null|string, cvc_check?: null|string, description?: string, dynamic_last4?: null|string, exp_month?: null|int, exp_year?: null|int, fingerprint?: string, funding?: null|string, iin?: string, issuer?: string, last4?: null|string, name?: null|string, three_d_secure?: string, tokenization_method?: null|string}&StripeObject) $card
 * @property null|(object{application_cryptogram?: string, application_preferred_name?: string, authorization_code?: null|string, authorization_response_code?: string, brand?: null|string, country?: null|string, cvm_type?: string, data_type?: null|string, dedicated_file_name?: string, description?: string, emv_auth_data?: string, evidence_customer_signature?: null|string, evidence_transaction_certificate?: null|string, exp_month?: null|int, exp_year?: null|int, fingerprint?: string, funding?: null|string, iin?: string, issuer?: string, last4?: null|string, pos_device_id?: null|string, pos_entry_mode?: string, read_method?: null|string, reader?: null|string, terminal_verification_results?: string, transaction_status_information?: string}&StripeObject) $card_present
 * @property string $client_secret The client secret of the source. Used for client-side retrieval using a publishable key.
 * @property null|(object{attempts_remaining: int, status: string}&StripeObject) $code_verification
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $currency Three-letter <a href="https://stripe.com/docs/currencies">ISO code for the currency</a> associated with the source. This is the currency for which the source will be chargeable once ready. Required for <code>single_use</code> sources.
 * @property null|string $customer The ID of the customer to which this source is attached. This will not be present when the source has not been attached to a customer.
 * @property null|(object{reference?: null|string, statement_descriptor?: null|string}&StripeObject) $eps
 * @property string $flow The authentication <code>flow</code> of the source. <code>flow</code> is one of <code>redirect</code>, <code>receiver</code>, <code>code_verification</code>, <code>none</code>.
 * @property null|(object{bank_code?: null|string, bank_name?: null|string, bic?: null|string, statement_descriptor?: null|string}&StripeObject) $giropay
 * @property null|(object{bank?: null|string, bic?: null|string, iban_last4?: null|string, statement_descriptor?: null|string}&StripeObject) $ideal
 * @property null|(object{background_image_url?: string, client_token?: null|string, first_name?: string, last_name?: string, locale?: string, logo_url?: string, page_title?: string, pay_later_asset_urls_descriptive?: string, pay_later_asset_urls_standard?: string, pay_later_name?: string, pay_later_redirect_url?: string, pay_now_asset_urls_descriptive?: string, pay_now_asset_urls_standard?: string, pay_now_name?: string, pay_now_redirect_url?: string, pay_over_time_asset_urls_descriptive?: string, pay_over_time_asset_urls_standard?: string, pay_over_time_name?: string, pay_over_time_redirect_url?: string, payment_method_categories?: string, purchase_country?: string, purchase_type?: string, redirect_url?: string, shipping_delay?: int, shipping_first_name?: string, shipping_last_name?: string}&StripeObject) $klarna
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{entity?: null|string, reference?: null|string, refund_account_holder_address_city?: null|string, refund_account_holder_address_country?: null|string, refund_account_holder_address_line1?: null|string, refund_account_holder_address_line2?: null|string, refund_account_holder_address_postal_code?: null|string, refund_account_holder_address_state?: null|string, refund_account_holder_name?: null|string, refund_iban?: null|string}&StripeObject) $multibanco
 * @property null|(object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject), email: null|string, name: null|string, phone: null|string, verified_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject), verified_email: null|string, verified_name: null|string, verified_phone: null|string}&StripeObject) $owner Information about the owner of the payment instrument that may be used or required by particular source types.
 * @property null|(object{reference?: null|string}&StripeObject) $p24
 * @property null|(object{address: null|string, amount_charged: int, amount_received: int, amount_returned: int, refund_attributes_method: string, refund_attributes_status: string}&StripeObject) $receiver
 * @property null|(object{failure_reason: null|string, return_url: string, status: string, url: string}&StripeObject) $redirect
 * @property null|(object{bank_name?: null|string, bic?: null|string, iban?: null|string, refund_account_holder_address_city?: null|string, refund_account_holder_address_country?: null|string, refund_account_holder_address_line1?: null|string, refund_account_holder_address_line2?: null|string, refund_account_holder_address_postal_code?: null|string, refund_account_holder_address_state?: null|string, refund_account_holder_name?: null|string, refund_iban?: null|string}&StripeObject) $sepa_credit_transfer
 * @property null|(object{bank_code?: null|string, branch_code?: null|string, country?: null|string, fingerprint?: null|string, last4?: null|string, mandate_reference?: null|string, mandate_url?: null|string}&StripeObject) $sepa_debit
 * @property null|(object{bank_code?: null|string, bank_name?: null|string, bic?: null|string, country?: null|string, iban_last4?: null|string, preferred_language?: null|string, statement_descriptor?: null|string}&StripeObject) $sofort
 * @property null|(object{amount: int, currency: string, email?: string, items: null|((object{amount: null|int, currency: null|string, description: null|string, parent: null|string, quantity?: int, type: null|string}&StripeObject))[], shipping?: (object{address?: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject), carrier?: null|string, name?: string, phone?: null|string, tracking_number?: null|string}&StripeObject)}&StripeObject) $source_order
 * @property null|string $statement_descriptor Extra information about a source. This will appear on your customer's statement every time you charge the source.
 * @property string $status The status of the source, one of <code>canceled</code>, <code>chargeable</code>, <code>consumed</code>, <code>failed</code>, or <code>pending</code>. Only <code>chargeable</code> sources can be used to create a charge.
 * @property null|(object{address_line1_check?: null|string, address_zip_check?: null|string, authenticated?: null|bool, brand?: null|string, card?: null|string, country?: null|string, customer?: null|string, cvc_check?: null|string, description?: string, dynamic_last4?: null|string, exp_month?: null|int, exp_year?: null|int, fingerprint?: string, funding?: null|string, iin?: string, issuer?: string, last4?: null|string, name?: null|string, three_d_secure?: string, tokenization_method?: null|string}&StripeObject) $three_d_secure
 * @property string $type The <code>type</code> of the source. The <code>type</code> is a payment method, one of <code>ach_credit_transfer</code>, <code>ach_debit</code>, <code>alipay</code>, <code>bancontact</code>, <code>card</code>, <code>card_present</code>, <code>eps</code>, <code>giropay</code>, <code>ideal</code>, <code>multibanco</code>, <code>klarna</code>, <code>p24</code>, <code>sepa_debit</code>, <code>sofort</code>, <code>three_d_secure</code>, or <code>wechat</code>. An additional hash is included on the source with a name matching this value. It contains additional information specific to the <a href="https://stripe.com/docs/sources">payment method</a> used.
 * @property null|string $usage Either <code>reusable</code> or <code>single_use</code>. Whether this source should be reusable or not. Some source types may or may not be reusable by construction, while others may leave the option at creation. If an incompatible value is passed, an error will be returned.
 * @property null|(object{prepay_id?: string, qr_code_url?: null|string, statement_descriptor?: string}&StripeObject) $wechat
 */
class Source extends ApiResource
{
    const OBJECT_NAME = 'source';

    use ApiOperations\Update;

    const ALLOW_REDISPLAY_ALWAYS = 'always';
    const ALLOW_REDISPLAY_LIMITED = 'limited';
    const ALLOW_REDISPLAY_UNSPECIFIED = 'unspecified';

    const FLOW_CODE_VERIFICATION = 'code_verification';
    const FLOW_NONE = 'none';
    const FLOW_RECEIVER = 'receiver';
    const FLOW_REDIRECT = 'redirect';

    const STATUS_CANCELED = 'canceled';
    const STATUS_CHARGEABLE = 'chargeable';
    const STATUS_CONSUMED = 'consumed';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';

    const TYPE_ACH_CREDIT_TRANSFER = 'ach_credit_transfer';
    const TYPE_ACH_DEBIT = 'ach_debit';
    const TYPE_ACSS_DEBIT = 'acss_debit';
    const TYPE_ALIPAY = 'alipay';
    const TYPE_AU_BECS_DEBIT = 'au_becs_debit';
    const TYPE_BANCONTACT = 'bancontact';
    const TYPE_CARD = 'card';
    const TYPE_CARD_PRESENT = 'card_present';
    const TYPE_EPS = 'eps';
    const TYPE_GIROPAY = 'giropay';
    const TYPE_IDEAL = 'ideal';
    const TYPE_KLARNA = 'klarna';
    const TYPE_MULTIBANCO = 'multibanco';
    const TYPE_P24 = 'p24';
    const TYPE_SEPA_CREDIT_TRANSFER = 'sepa_credit_transfer';
    const TYPE_SEPA_DEBIT = 'sepa_debit';
    const TYPE_SOFORT = 'sofort';
    const TYPE_THREE_D_SECURE = 'three_d_secure';
    const TYPE_WECHAT = 'wechat';

    const USAGE_REUSABLE = 'reusable';
    const USAGE_SINGLE_USE = 'single_use';

    /**
     * Creates a new source object.
     *
     * @param null|array{amount?: int, currency?: string, customer?: string, expand?: string[], flow?: string, mandate?: array{acceptance?: array{date?: int, ip?: string, offline?: array{contact_email: string}, online?: array{date?: int, ip?: string, user_agent?: string}, status: string, type?: string, user_agent?: string}, amount?: null|int, currency?: string, interval?: string, notification_method?: string}, metadata?: StripeObject, original_source?: string, owner?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, receiver?: array{refund_attributes_method?: string}, redirect?: array{return_url: string}, source_order?: array{items?: array{amount?: int, currency?: string, description?: string, parent?: string, quantity?: int, type?: string}[], shipping?: array{address: array{city?: string, country?: string, line1: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name?: string, phone?: string, tracking_number?: string}}, statement_descriptor?: string, token?: string, type?: string, usage?: string} $params
     * @param null|array|string $options
     *
     * @return Source the created resource
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
     * Retrieves an existing source object. Supply the unique source ID from a source
     * creation request and Stripe will return the corresponding up-to-date source
     * object information.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Source
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
     * Updates the specified source by setting the values of the parameters passed. Any
     * parameters not provided will be left unchanged.
     *
     * This request accepts the <code>metadata</code> and <code>owner</code> as
     * arguments. It is also possible to update type specific information for selected
     * payment methods. Please refer to our <a href="/docs/sources">payment method
     * guides</a> for more detail.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{amount?: int, expand?: string[], mandate?: array{acceptance?: array{date?: int, ip?: string, offline?: array{contact_email: string}, online?: array{date?: int, ip?: string, user_agent?: string}, status: string, type?: string, user_agent?: string}, amount?: null|int, currency?: string, interval?: string, notification_method?: string}, metadata?: null|StripeObject, owner?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, source_order?: array{items?: array{amount?: int, currency?: string, description?: string, parent?: string, quantity?: int, type?: string}[], shipping?: array{address: array{city?: string, country?: string, line1: string, line2?: string, postal_code?: string, state?: string}, carrier?: string, name?: string, phone?: string, tracking_number?: string}}} $params
     * @param null|array|string $opts
     *
     * @return Source the updated resource
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

    use ApiOperations\NestedResource;

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Source the detached source
     *
     * @throws Exception\UnexpectedValueException if the source is not attached to a customer
     * @throws Exception\ApiErrorException if the request fails
     */
    public function detach($params = null, $opts = null)
    {
        self::_validateParams($params);

        $id = $this['id'];
        if (!$id) {
            $class = static::class;
            $msg = "Could not determine which URL to request: {$class} instance "
             . "has invalid ID: {$id}";

            throw new Exception\UnexpectedValueException($msg, null);
        }

        if ($this['customer']) {
            $base = Customer::classUrl();
            $parentExtn = \urlencode(Util\Util::utf8($this['customer']));
            $extn = \urlencode(Util\Util::utf8($id));
            $url = "{$base}/{$parentExtn}/sources/{$extn}";

            list($response, $opts) = $this->_request('delete', $url, $params, $opts);
            $this->refreshFrom($response, $opts);

            return $this;
        }
        $message = 'This source object does not appear to be currently attached '
               . 'to a customer object.';

        throw new Exception\UnexpectedValueException($message);
    }

    /**
     * @param string $id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection<SourceTransaction> list of source transactions
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function allSourceTransactions($id, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/source_transactions';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Source the verified source
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function verify($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/verify';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
