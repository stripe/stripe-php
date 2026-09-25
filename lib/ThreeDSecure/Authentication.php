<?php

// File generated from our OpenAPI spec

namespace Stripe\ThreeDSecure;

/**
 * The Standalone 3DS API allows you to run EMV 3D Secure (3DS) authentication using Stripe while authorizing the payment with any PSP.
 *
 * Related guide: <a href="/payments/3d-secure/standalone-3d-secure">Standalone 3DS</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{acquirer_bin?: string, acquirer_country?: string, acquirer_merchant_id?: string, mcc?: string, merchant_name?: string, requestor_id?: string}&\Stripe\StripeObject) $acquirer_details Contains additional details about the acquirer for a 3DS Authentication.
 * @property null|int $amount The amount for this 3DS Authentication.
 * @property null|string $challenge_url The URL for presenting a challenge to your cardholder, present if status is requires_challenge.
 * @property (object{browser?: (object{accept_header: string, color_depth?: int, ip_address: string, java_enabled?: bool, javascript_enabled: bool, language: string, screen_height?: int, screen_width?: int, timezone_offset?: int, user_agent: string}&\Stripe\StripeObject), three_r_i?: (object{previous_authentication: string, type: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $channel Contains details on the channel used (browser, 3RI) for a standalone 3DS Authentication.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $directory_server The 3DS directory server with which this 3DS Authentication was processed.
 * @property null|string $fingerprinting_url The URL for performing issuer fingerprinting, present if fingerprinting is supported for the given payment method.
 * @property null|(object{challenge?: (object{type: string}&\Stripe\StripeObject), data_share?: (object{type: string}&\Stripe\StripeObject), frictionless?: (object{type: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $flow_preference Contains details of the flow preference used for a standalone 3DS Authentication.
 * @property null|(object{installment?: (object{amount?: int, expiry: (object{date?: string, type: string}&\Stripe\StripeObject), interval: string, interval_count: int, number: int}&\Stripe\StripeObject), recurring?: (object{amount?: int, expiry: (object{date?: string, type: string}&\Stripe\StripeObject), interval: string, interval_count: int}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $future_usage Contains information about the future authorisations related to this authentication
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property string $message_category Indicates whether this 3DS Authentication is being performed for a payment or non-payment use case.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $outcome The outcome of this 3DS Authentication.
 * @property null|(object{acs_transaction_id?: string, ares?: string, ares_trans_status?: string, cryptogram?: string, ds_transaction_id?: string, eci?: string, network_details?: (object{cartes_bancaires?: (object{avalgo: string, cb_exemption: null|string, cb_score: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject), protocol_version: string, requestor_challenge_indicator?: string, rreq?: string, rreq_trans_status?: string, three_ds_server_transaction_id: string}&\Stripe\StripeObject) $outcome_details Contains details on the result for a standalone 3DS Authentication.
 * @property string|\Stripe\PaymentMethod $payment_method ID of the payment method (a PaymentMethod object) to attach to this 3DS Authentication.
 * @property null|string $reason The reason for invoking this 3DS Authentication.
 * @property null|(object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}&\Stripe\StripeObject) $shipping_address Contains details about the shipping address for a 3DS Authentication.
 * @property string $status Status of this Authentication.
 */
class Authentication extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'three_d_secure.authentication';

    const DIRECTORY_SERVER_AMERICAN_EXPRESS = 'american_express';
    const DIRECTORY_SERVER_CARTES_BANCAIRES = 'cartes_bancaires';
    const DIRECTORY_SERVER_DISCOVER = 'discover';
    const DIRECTORY_SERVER_MASTERCARD = 'mastercard';
    const DIRECTORY_SERVER_VISA = 'visa';

    const MESSAGE_CATEGORY_NON_PAYMENT_AUTHENTICATION = 'non_payment_authentication';
    const MESSAGE_CATEGORY_PAYMENT_AUTHENTICATION = 'payment_authentication';

    const OUTCOME_ABANDONED = 'abandoned';
    const OUTCOME_ATTEMPT_ACKNOWLEDGED = 'attempt_acknowledged';
    const OUTCOME_AUTHENTICATED = 'authenticated';
    const OUTCOME_CANCELED = 'canceled';
    const OUTCOME_DENIED = 'denied';
    const OUTCOME_INFORMATIONAL = 'informational';
    const OUTCOME_INTERNAL_ERROR = 'internal_error';
    const OUTCOME_NOT_SUPPORTED = 'not_supported';
    const OUTCOME_NOT_TRIGGERED = 'not_triggered';
    const OUTCOME_PROCESSING_ERROR = 'processing_error';
    const OUTCOME_REJECTED = 'rejected';

    const REASON_CARDHOLDER_AUTHENTICATION = 'cardholder_authentication';
    const REASON_ISSUER_REQUESTED = 'issuer_requested';
    const REASON_LIABILITY_SHIFT = 'liability_shift';
    const REASON_PROCESSING_COSTS = 'processing_costs';
    const REASON_REGULATORY_COMPLIANCE = 'regulatory_compliance';

    const STATUS_CANCELED = 'canceled';
    const STATUS_ERROR = 'error';
    const STATUS_FAILED = 'failed';
    const STATUS_REQUIRES_CHALLENGE = 'requires_challenge';
    const STATUS_REQUIRES_SUBMISSION = 'requires_submission';
    const STATUS_SUCCEEDED = 'succeeded';

    /**
     * This endpoint creates a 3DS Authentication. Refer to the <a
     * href="/payments/3d-secure/standalone-3d-secure#create-a-3ds-authentication-object">Create
     * a 3DS Authentication object section of the Standalone 3DS guide</a> for more
     * information.
     *
     * You can pass the submit parameter to automatically submit the 3DS Authentication
     * object when you create it. Refer to the <a
     * href="/payments/3d-secure/standalone-3d-secure#submit-at-creation">Submit at
     * creation section of the Standalone 3DS guide</a> for more information.
     *
     * @param null|array{acquirer_details?: array{acquirer_bin: string, acquirer_country: string, acquirer_merchant_id: string, mcc?: string, merchant_name?: string, requestor_id?: string}, amount?: int, channel: array{browser?: array{accept_header: string, color_depth?: int, device_id?: string, ip_address: string, java_enabled?: bool, javascript_enabled: bool, language: string, screen_height?: int, screen_width?: int, timezone_offset?: int, user_agent: string}, three_r_i?: array{previous_authentication: string, type: string}, type: string}, currency?: string, directory_server?: string, expand?: string[], flow_preference?: array{challenge?: array{type: string}, data_share?: array{type: string}, frictionless?: array{type: string}, type: string}, future_usage?: array{installment?: array{amount: int, expiry: array{date?: string, type: string}, interval?: string, interval_count?: int, number: int}, recurring?: array{amount: int, expiry: array{date?: string, type: string}, interval?: string, interval_count?: int}, type: string}, message_category: string, metadata?: null|array<string, string>, payment_method?: string, payment_method_data?: array{billing_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, card: array{cvc?: string, exp_month?: int, exp_year?: int, number?: string, token?: string}, type: string}, reason?: string, shipping_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, submit?: string} $params
     * @param null|array|string $options
     *
     * @return Authentication the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * Returns a list of 3D Secure Authentications.
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Authentication> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * This endpoint retrieves a 3DS Authentication.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Authentication
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Authentication the canceled authentication
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return Authentication the submited authentication
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function submit($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/submit';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
