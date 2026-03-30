<?php

// File generated from our OpenAPI spec

namespace Stripe\SharedPayment;

/**
 * A SharedPaymentIssuedToken is a limited-use reference to a PaymentMethod that can be created with a secret key. When shared with another Stripe account (Seller), it enables that account to either process a payment on Stripe against a PaymentMethod that your Stripe account owns, or to forward a usable credential created against the originalPaymentMethod to then process the payment off-Stripe.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $customer ID of an existing Customer.
 * @property null|int $deactivated_at Time at which this SharedPaymentIssuedToken was deactivated.
 * @property null|string $deactivated_reason The reason why the SharedPaymentIssuedToken has been deactivated.
 * @property null|string[] $enabled_uses Which requested uses have been enabled for this SharedPaymentIssuedToken.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|string $payment_method ID of an existing PaymentMethod.
 * @property null|string[] $requested_uses Requested uses for this SharedPaymentIssuedToken, which controls which Stripe APIs it can be used with.
 * @property null|string $return_url If the customer does not exit their browser while authenticating, they will be redirected to this specified URL after completion.
 * @property null|(object{insights: (object{bot?: null|(object{recommended_action: string, score: float}&\Stripe\StripeObject), card_issuer_decline?: null|(object{recommended_action: string, score: float}&\Stripe\StripeObject), card_testing?: null|(object{recommended_action: string, score: float}&\Stripe\StripeObject), fraudulent_dispute: null|(object{recommended_action: string, score: int}&\Stripe\StripeObject), stolen_card?: null|(object{recommended_action: string, score: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $risk_details Risk details of the SharedPaymentIssuedToken.
 * @property null|(object{external_id: string, network_business_profile: string, network_id?: string}&\Stripe\StripeObject) $seller_details Seller details of the SharedPaymentIssuedToken, including network_id and external_id.
 * @property null|string $setup_future_usage Indicates that you intend to save the PaymentMethod of this SharedPaymentToken to a customer later.
 * @property null|\Stripe\StripeObject $shared_metadata Metadata about the SharedPaymentIssuedToken.
 * @property null|(object{amount_captured: null|(object{currency: string, value: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $usage_details Usage details of the SharedPaymentIssuedToken
 * @property null|(object{currency: string, expires_at: null|int, max_amount: int, recurring_interval?: null|string}&\Stripe\StripeObject) $usage_limits Usage limits of the SharedPaymentIssuedToken.
 */
class IssuedToken extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'shared_payment.issued_token';

    const DEACTIVATED_REASON_CONSUMED = 'consumed';
    const DEACTIVATED_REASON_EXPIRED = 'expired';
    const DEACTIVATED_REASON_RESOLVED = 'resolved';
    const DEACTIVATED_REASON_REVOKED = 'revoked';
}
