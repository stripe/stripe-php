<?php

namespace Stripe;

/**
 * Class Mandate
 *
 * @property string $id
 * @property string $object
 * @property \Stripe\StripeObject $customer_acceptance
 * @property bool $livemode
 * @property \Stripe\StripeObject $multi_use
 * @property string|\Stripe\PaymentMethod $payment_method
 * @property \Stripe\StripeObject $payment_method_details
 * @property \Stripe\StripeObject $single_use
 * @property string $status
 * @property string $type
 *
 * @package Stripe
 */
class Mandate extends ApiResource
{
    const OBJECT_NAME = 'mandate';

    use ApiOperations\Retrieve;
}
