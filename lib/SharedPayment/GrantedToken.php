<?php

// File generated from our OpenAPI spec

namespace Stripe\SharedPayment;

/**
 * SharedPaymentGrantedToken is the view-only resource of a SharedPaymentIssuedToken, which is a limited-use reference to a PaymentMethod.
 * When another Stripe merchant shares a SharedPaymentIssuedToken with you, you can view attributes of the shared token using the SharedPaymentGrantedToken API, and use it with a PaymentIntent.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{network_business_profile: null|string}&\Stripe\StripeObject) $agent_details Details about the agent that issued this SharedPaymentGrantedToken.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|int $deactivated_at Time at which this SharedPaymentGrantedToken expires and can no longer be used to confirm a PaymentIntent.
 * @property null|string $deactivated_reason The reason why the SharedPaymentGrantedToken has been deactivated.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|(object{affirm?: (object{}&\Stripe\StripeObject), billing_details: null|(object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), email: null|string, name: null|string, phone: null|string, tax_id: null|string}&\Stripe\StripeObject), card?: (object{brand: string, checks?: null|(object{address_line1_check: null|string, address_postal_code_check: null|string, cvc_check: null|string}&\Stripe\StripeObject), country: null|string, description?: null|string, display_brand: null|string, exp_month: int, exp_year: int, fingerprint?: null|string, funding: string, iin?: null|string, issuer?: null|string, last4: string, networks: null|(object{available: string[], preferred: null|string}&\Stripe\StripeObject), wallet: null|(object{amex_express_checkout?: (object{}&\Stripe\StripeObject), apple_pay?: (object{}&\Stripe\StripeObject), dynamic_last4: null|string, google_pay?: (object{}&\Stripe\StripeObject), link?: (object{}&\Stripe\StripeObject), masterpass?: (object{billing_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), email: null|string, name: null|string, shipping_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject), samsung_pay?: (object{}&\Stripe\StripeObject), type: string, visa_checkout?: (object{billing_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), email: null|string, name: null|string, shipping_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), klarna?: (object{dob?: null|(object{day: null|int, month: null|int, year: null|int}&\Stripe\StripeObject)}&\Stripe\StripeObject), link?: (object{email: null|string, persistent_token?: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $payment_method_details Details of the PaymentMethod that was shared via this token.
 * @property null|(object{insights: (object{bot?: null|(object{recommended_action: string, score: float}&\Stripe\StripeObject), card_issuer_decline?: null|(object{recommended_action: string, score: float}&\Stripe\StripeObject), card_testing?: null|(object{recommended_action: string, score: float}&\Stripe\StripeObject), fraudulent_dispute: null|(object{recommended_action: string, score: int}&\Stripe\StripeObject), stolen_card?: null|(object{recommended_action: string, score: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $risk_details Risk details of the SharedPaymentGrantedToken.
 * @property null|\Stripe\StripeObject $shared_metadata Metadata about the SharedPaymentGrantedToken.
 * @property null|(object{amount_captured: null|(object{currency: string, value: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $usage_details Some details about how the SharedPaymentGrantedToken has been used already.
 * @property null|(object{currency: string, expires_at: null|int, max_amount: int, recurring_interval?: null|string}&\Stripe\StripeObject) $usage_limits Limits on how this SharedPaymentGrantedToken can be used.
 */
class GrantedToken extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'shared_payment.granted_token';

    const DEACTIVATED_REASON_CONSUMED = 'consumed';
    const DEACTIVATED_REASON_EXPIRED = 'expired';
    const DEACTIVATED_REASON_RESOLVED = 'resolved';
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
