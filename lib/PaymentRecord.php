<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Payment Record is a resource that allows you to represent payments that occur on- or off-Stripe.
 * For example, you can create a Payment Record to model a payment made on a different payment processor,
 * in order to mark an Invoice as paid and a Subscription as active. Payment Records consist of one or
 * more Payment Attempt Records, which represent individual attempts made on a payment network.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $amount_canceled A representation of an amount of money, consisting of an amount and a currency.
 * @property \Stripe\StripeObject $amount_failed A representation of an amount of money, consisting of an amount and a currency.
 * @property \Stripe\StripeObject $amount_guaranteed A representation of an amount of money, consisting of an amount and a currency.
 * @property \Stripe\StripeObject $amount_refunded A representation of an amount of money, consisting of an amount and a currency.
 * @property \Stripe\StripeObject $amount_requested A representation of an amount of money, consisting of an amount and a currency.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|\Stripe\StripeObject $customer_details Customer information for this payment.
 * @property null|string $customer_presence Indicates whether the customer was present in your checkout flow during this payment.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property string $latest_payment_attempt_record ID of the latest Payment Attempt Record attached to this Payment Record.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|\Stripe\StripeObject $payment_method_details Information about the Payment Method debited for this payment.
 * @property null|string $payment_reference An opaque string for manual reconciliation of this payment, for example a check number or a payment processor ID.
 * @property null|\Stripe\StripeObject $shipping_details Shipping information for this payment.
 */
class PaymentRecord extends ApiResource
{
    const OBJECT_NAME = 'payment_record';

    const CUSTOMER_PRESENCE_OFF_SESSION = 'off_session';
    const CUSTOMER_PRESENCE_ON_SESSION = 'on_session';
}
