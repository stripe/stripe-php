<?php

// File generated from our OpenAPI spec

namespace Stripe\Tax;

/**
 * A Tax Association exposes the Tax Transactions that Stripe attempted to create on your behalf based on the PaymentIntent input.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $calculation The <a href="https://stripe.com/docs/api/tax/calculations/object">Tax Calculation</a> that was included in PaymentIntent.
 * @property string $payment_intent The <a href="https://stripe.com/docs/api/payment_intents/object">PaymentIntent</a> that this Tax Association is tracking.
 * @property string $status Status of the Tax Association.
 * @property (object{committed?: (object{reversals: (object{status: string, status_details: (object{committed?: (object{transaction: string}&\Stripe\StripeObject&\stdClass), errored?: (object{reason: string, refund_id: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)[], transaction: string}&\Stripe\StripeObject&\stdClass), errored?: (object{reason: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $status_details
 */
class Association extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'tax.association';

    const STATUS_COMMITTED = 'committed';
    const STATUS_ERRORED = 'errored';
}
