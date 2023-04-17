<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A SetupAttempt describes one attempted confirmation of a SetupIntent, whether
 * that confirmation was successful or unsuccessful. You can use SetupAttempts to
 * inspect details of a specific attempt at setting up a payment method using a
 * SetupIntent.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string|\Stripe\StripeObject $application The value of <a href="https://stripe.com/docs/api/setup_intents/object#setup_intent_object-application">application</a> on the SetupIntent at the time of this confirmation.
 * @property null|bool $attach_to_self <p>If present, the SetupIntent's payment method will be attached to the in-context Stripe Account.</p><p>It can only be used for this Stripe Account’s own money movement flows like InboundTransfer and OutboundTransfers. It cannot be set to true when setting up a PaymentMethod for a Customer, and defaults to false when attaching a PaymentMethod to a Customer.</p>
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string|\Stripe\Customer $customer The value of <a href="https://stripe.com/docs/api/setup_intents/object#setup_intent_object-customer">customer</a> on the SetupIntent at the time of this confirmation.
 * @property null|string[] $flow_directions <p>Indicates the directions of money movement for which this payment method is intended to be used.</p><p>Include `inbound` if you intend to use the payment method as the origin to pull funds from. Include `outbound` if you intend to use the payment method as the destination to send funds to. You can include both if you intend to use the payment method for both purposes.</p>
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property null|string|\Stripe\Account $on_behalf_of The value of <a href="https://stripe.com/docs/api/setup_intents/object#setup_intent_object-on_behalf_of">on_behalf_of</a> on the SetupIntent at the time of this confirmation.
 * @property string|\Stripe\PaymentMethod $payment_method ID of the payment method used with this SetupAttempt.
 * @property \Stripe\StripeObject $payment_method_details
 * @property null|\Stripe\StripeObject $setup_error The error encountered during this attempt to confirm the SetupIntent, if any.
 * @property string|\Stripe\SetupIntent $setup_intent ID of the SetupIntent that this attempt belongs to.
 * @property string $status Status of this SetupAttempt, one of `requires_confirmation`, `requires_action`, `processing`, `succeeded`, `failed`, or `abandoned`.
 * @property string $usage The value of <a href="https://stripe.com/docs/api/setup_intents/object#setup_intent_object-usage">usage</a> on the SetupIntent at the time of this confirmation, one of `off_session` or `on_session`.
 */
class SetupAttempt extends ApiResource
{
    const OBJECT_NAME = 'setup_attempt';

    use ApiOperations\All;
}
