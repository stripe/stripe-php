<?php

namespace Stripe;

/**
 * A Mandate is a record of the permission a customer has given you to debit their
 * payment method.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $customer_acceptance
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $multi_use
 * @property string|\Stripe\PaymentMethod $payment_method ID of the payment method associated with this mandate.
 * @property \Stripe\StripeObject $payment_method_details
 * @property \Stripe\StripeObject $single_use
 * @property string $status The status of the Mandate, one of <code>pending</code>, <code>inactive</code>, or <code>active</code>. The Mandate can be used to initiate a payment only if status=active.
 * @property string $type The type of the mandate, one of <code>single_use</code> or <code>multi_use</code>
 */
class Mandate extends ApiResource
{
    const OBJECT_NAME = 'mandate';

    use ApiOperations\Retrieve;
}
