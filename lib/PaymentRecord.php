<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A PaymentRecord represents a payment that happened on or off Stripe.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $amount_canceled Amount object
 * @property \Stripe\StripeObject $amount_failed Amount object
 * @property \Stripe\StripeObject $amount_guaranteed Amount object
 * @property \Stripe\StripeObject $amount_refunded Amount object
 * @property \Stripe\StripeObject $amount_requested Amount object
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|\Stripe\StripeObject $customer_details Customer information for this payment.
 * @property null|string $customer_presence Whether the customer was present during the transaction.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property string $latest_payment_attempt_record ID of the latest PaymentAttemptRecord attached to this PaymentRecord.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|\Stripe\StripeObject $payment_method_details Information about the method used to make this payment.
 * @property null|string $payment_reference An opaque string for manual reconciliation of this payment, for example a check number.
 * @property null|\Stripe\StripeObject $shipping_details Shipping information for this payment.
 */
class PaymentRecord extends ApiResource
{
    const OBJECT_NAME = 'payment_record';

    const CUSTOMER_PRESENCE_OFF_SESSION = 'off_session';
    const CUSTOMER_PRESENCE_ON_SESSION = 'on_session';
}
