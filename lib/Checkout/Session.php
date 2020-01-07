<?php

namespace Stripe\Checkout;

/**
 * Class Session
 *
 * @property string $id
 * @property string $object
 * @property string|null $billing_address_collection
 * @property string $cancel_url
 * @property string|null $client_reference_id
 * @property string|null $customer
 * @property string|null $customer_email
 * @property mixed|null $display_items
 * @property bool $livemode
 * @property string|null $locale
 * @property string|null $mode
 * @property string|null $payment_intent
 * @property string[] $payment_method_types
 * @property string|null $setup_intent
 * @property string|null $submit_type
 * @property string|null $subscription
 * @property string $success_url
 *
 * @package Stripe\Checkout
 */
class Session extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'checkout.session';

    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;

    /**
     * Possible string representations of submit type.
     * @link https://stripe.com/docs/api/checkout/sessions/create#create_checkout_session-submit_type
     */
    const SUBMIT_TYPE_AUTO    = 'auto';
    const SUBMIT_TYPE_BOOK    = 'book';
    const SUBMIT_TYPE_DONATE  = 'donate';
    const SUBMIT_TYPE_PAY     = 'pay';
}
