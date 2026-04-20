<?php

// File generated from our OpenAPI spec

namespace Stripe\SharedPayment;

/**
 * A SharedPaymentIssuedToken is a limited-use reference to a PaymentMethod that can be created with a secret key. When shared with another Stripe account (Seller), it enables that account to either process a payment on Stripe against a PaymentMethod that your Stripe account owns, or to forward a usable credential created against the originalPaymentMethod to then process the payment off-Stripe.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|int $deactivated_at Time at which this SharedPaymentIssuedToken was deactivated.
 * @property null|string $deactivated_reason The reason why the SharedPaymentIssuedToken has been deactivated.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|(object{type: string, use_stripe_sdk: null|(object{value: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $next_action If present, describes the action required to make this <code>SharedPaymentIssuedToken</code> usable for payments. Present when the token is in <code>requires_action</code> state.
 * @property string $payment_method ID of an existing PaymentMethod.
 * @property null|string $return_url If the customer does not exit their browser while authenticating, they will be redirected to this specified URL after completion.
 * @property null|(object{insights: (object{bot?: null|(object{recommended_action: string, score: float}&\Stripe\StripeObject), card_issuer_decline?: null|(object{recommended_action: string, score: float}&\Stripe\StripeObject), card_testing?: null|(object{recommended_action: string, score: float}&\Stripe\StripeObject), fraudulent_dispute: null|(object{recommended_action: string, score: int}&\Stripe\StripeObject), stolen_card?: null|(object{recommended_action: string, score: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $risk_details Risk details of the SharedPaymentIssuedToken.
 * @property null|(object{external_id: string, network_business_profile: string}&\Stripe\StripeObject) $seller_details Seller details of the SharedPaymentIssuedToken, including network_id and external_id.
 * @property null|string $setup_future_usage Indicates that you intend to save the PaymentMethod of this SharedPaymentToken to a customer later.
 * @property null|\Stripe\StripeObject $shared_metadata Metadata about the SharedPaymentIssuedToken.
 * @property null|string $status Status of this SharedPaymentIssuedToken, one of <code>active</code>, <code>requires_action</code>, or <code>deactivated</code>.
 * @property null|(object{amount_captured: null|(object{currency: string, value: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $usage_details Usage details of the SharedPaymentIssuedToken
 * @property null|(object{currency: string, expires_at: null|int, max_amount: int}&\Stripe\StripeObject) $usage_limits Usage limits of the SharedPaymentIssuedToken.
 */
class IssuedToken extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'shared_payment.issued_token';

    const DEACTIVATED_REASON_CONSUMED = 'consumed';
    const DEACTIVATED_REASON_EXPIRED = 'expired';
    const DEACTIVATED_REASON_RESOLVED = 'resolved';
    const DEACTIVATED_REASON_REVOKED = 'revoked';

    const STATUS_ACTIVE = 'active';
    const STATUS_DEACTIVATED = 'deactivated';
    const STATUS_REQUIRES_ACTION = 'requires_action';

    /**
     * Creates a new SharedPaymentIssuedToken object.
     *
     * @param null|array{expand?: string[], payment_method: string, return_url?: string, seller_details: array{external_id?: string, network_business_profile?: string}, setup_future_usage?: string, shared_metadata?: array<string, string>, usage_limits: array{currency: string, expires_at?: int, max_amount: int}} $params
     * @param null|array|string $options
     *
     * @return IssuedToken the created resource
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
     * Retrieves an existing SharedPaymentIssuedToken object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return IssuedToken
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
     * @return IssuedToken the revoked issued token
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function revoke($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/revoke';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
