<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Provisioning;

/**
 * The result of an in-progress request for a customer to authorize a new payment method.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $checkout_session_url URL for the customer to complete payment method authorization.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status Status of the payment method request.
 */
class PaymentMethodRequest extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.provisioning.payment_method_request';

    const STATUS_CHECKOUT_INITIATED = 'checkout_initiated';
    const STATUS_COMPLETE = 'complete';
}
