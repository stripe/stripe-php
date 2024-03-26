<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * ConfirmationTokens help transport client side data collected by Stripe JS over
 * to your server for confirming a PaymentIntent or SetupIntent. If the confirmation
 * is successful, values present on the ConfirmationToken are written onto the Intent.
 *
 * To learn more about how to use ConfirmationToken, visit the related guides:
 * - <a href="https://stripe.com/docs/payments/finalize-payments-on-the-server">Finalize payments on the server</a>
 * - <a href="https://stripe.com/docs/payments/build-a-two-step-confirmation">Build two-step confirmation</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|int $expires_at Time at which this ConfirmationToken expires and can no longer be used to confirm a PaymentIntent or SetupIntent. This is set to null once this ConfirmationToken has been used.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $mandate_data Data used for generating a Mandate.
 * @property null|string $payment_intent ID of the PaymentIntent that this ConfirmationToken was used to confirm, or null if this ConfirmationToken has not yet been used.
 * @property null|\Stripe\StripeObject $payment_method_preview Payment details collected by the Payment Element, used to create a PaymentMethod when a PaymentIntent or SetupIntent is confirmed with this ConfirmationToken.
 * @property null|string $return_url Return URL used to confirm the Intent.
 * @property null|string $setup_future_usage <p>Indicates that you intend to make future payments with this ConfirmationToken's payment method.</p><p>The presence of this property will <a href="https://stripe.com/docs/payments/save-during-payment">attach the payment method</a> to the PaymentIntent's Customer, if present, after the PaymentIntent is confirmed and any required actions from the user are complete.</p>
 * @property null|string $setup_intent ID of the SetupIntent that this ConfirmationToken was used to confirm, or null if this ConfirmationToken has not yet been used.
 * @property null|\Stripe\StripeObject $shipping Shipping information collected on this ConfirmationToken.
 * @property bool $use_stripe_sdk Indicates whether the Stripe SDK is used to handle confirmation flow. Defaults to <code>true</code> on ConfirmationToken.
 */
class ConfirmationToken extends ApiResource
{
    const OBJECT_NAME = 'confirmation_token';

    use ApiOperations\Retrieve;

    const SETUP_FUTURE_USAGE_OFF_SESSION = 'off_session';
    const SETUP_FUTURE_USAGE_ON_SESSION = 'on_session';
}
