<?php

namespace Stripe\Checkout;

/**
 * Class Session
 *
 * @property string $id <p>Unique identifier for the object. Used to pass to <code>redirectToCheckout</code></p><p>in Stripe.js.</p>
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string|null $billing_address_collection <p>The value (<code>auto</code> or <code>required</code>) for whether Checkout collected the</p><p>customer's billing address.</p>
 * @property string $cancel_url The URL the customer will be directed to if they decide to cancel payment and return to your website.
 * @property string|null $client_reference_id <p>A unique string to reference the Checkout Session. This can be a</p><p>customer ID, a cart ID, or similar, and can be used to reconcile the</p><p>session with your internal systems.</p>
 * @property string|\Stripe\Customer|null $customer <p>The ID of the customer for this session.</p><p>For Checkout Sessions in <code>payment</code> or <code>subscription</code> mode, Checkout</p><p>will create a new customer object based on information provided</p><p>during the session unless an existing customer was provided when</p><p>the session was created.</p>
 * @property string|null $customer_email <p>If provided, this value will be used when the Customer object is created.</p><p>If not provided, customers will be asked to enter their email address.</p><p>Use this parameter to prefill customer data if you already have an email</p><p>on file. To access information about the customer once a session is</p><p>complete, use the <code>customer</code> field.</p>
 * @property \Stripe\StripeObject[]|null $display_items The line items, plans, or SKUs purchased by the customer.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string|null $locale The IETF language tag of the locale Checkout is displayed in. If blank or <code>auto</code>, the browser's locale is used.
 * @property \Stripe\StripeObject|null $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string|null $mode The mode of the Checkout Session, one of <code>payment</code>, <code>setup</code>, or <code>subscription</code>.
 * @property string|\Stripe\PaymentIntent|null $payment_intent The ID of the PaymentIntent for Checkout Sessions in <code>payment</code> mode.
 * @property string[] $payment_method_types <p>A list of the types of payment methods (e.g. card) this Checkout</p><p>Session is allowed to accept.</p>
 * @property string|\Stripe\SetupIntent|null $setup_intent The ID of the SetupIntent for Checkout Sessions in <code>setup</code> mode.
 * @property string|null $submit_type <p>Describes the type of transaction being performed by Checkout in order to customize</p><p>relevant text on the page, such as the submit button. <code>submit_type</code> can only be</p><p>specified on Checkout Sessions in <code>payment</code> mode, but not Checkout Sessions</p><p>in <code>subscription</code> or <code>setup</code> mode.</p>
 * @property string|\Stripe\Subscription|null $subscription The ID of the subscription for Checkout Sessions in <code>subscription</code> mode.
 * @property string $success_url <p>The URL the customer will be directed to after the payment or</p><p>subscription creation is successful.</p>
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
     *
     * @see https://stripe.com/docs/api/checkout/sessions/create#create_checkout_session-submit_type
     */
    const SUBMIT_TYPE_AUTO    = 'auto';
    const SUBMIT_TYPE_BOOK    = 'book';
    const SUBMIT_TYPE_DONATE  = 'donate';
    const SUBMIT_TYPE_PAY     = 'pay';
}
