<?php

// File generated from our OpenAPI spec

namespace Stripe\SharedPayment;

/**
 * SharedPaymentGrantedToken is the view-only resource of a SharedPaymentIssuedToken, which is a limited-use reference to a PaymentMethod.
 * When another Stripe merchant shares a SharedPaymentIssuedToken with you, you can view attributes of the shared token using the SharedPaymentGrantedToken API, and use it with a PaymentIntent.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|int $deactivated_at Time at which this SharedPaymentGrantedToken expires and can no longer be used to confirm a PaymentIntent.
 * @property null|string $deactivated_reason The reason why the SharedPaymentGrantedToken has been deactivated.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $shared_metadata Metadata about the SharedPaymentGrantedToken.
 * @property null|(object{amount_captured: null|(object{currency: string, value: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $usage_details Some details about how the SharedPaymentGrantedToken has been used already.
 * @property null|(object{currency: string, expires_at: int, max_amount: int}&\Stripe\StripeObject) $usage_limits Limits on how this SharedPaymentGrantedToken can be used.
 */
class GrantedToken extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'shared_payment.granted_token';

    const DEACTIVATED_REASON_CONSUMED = 'consumed';
    const DEACTIVATED_REASON_EXPIRED = 'expired';
    const DEACTIVATED_REASON_REVOKED = 'revoked';

    /**
     * Retrieves an existing SharedPaymentGrantedToken object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return GrantedToken
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
}
