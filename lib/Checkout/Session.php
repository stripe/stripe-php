<?php

namespace Stripe\Checkout;

/**
 * Class Session
 *
 * @property string $id Unique identifier for the object. Used to pass to <code>redirectToCheckout</code> in Stripe.js.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string|null $billing_address_collection The value (<code>auto</code> or <code>required</code>) for whether Checkout collected the customer's billing address.
 * @property string $cancel_url The URL the customer will be directed to if they decide to cancel payment and return to your website.
 * @property string|null $client_reference_id A unique string to reference the Checkout Session. This can be a customer ID, a cart ID, or similar, and can be used to reconcile the session with your internal systems.
 * @property string|\Stripe\Customer|null $customer The ID of the customer for this session. For Checkout Sessions in <code>payment</code> or <code>subscription</code> mode, Checkout will create a new customer object based on information provided during the session unless an existing customer was provided when the session was created.
 * @property string|null $customer_email If provided, this value will be used when the Customer object is created. If not provided, customers will be asked to enter their email address. Use this parameter to prefill customer data if you already have an email on file. To access information about the customer once a session is complete, use the <code>customer</code> field.
 * @property \Stripe\StripeObject[]|null $display_items The line items, plans, or SKUs purchased by the customer.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string|null $locale The IETF language tag of the locale Checkout is displayed in. If blank or <code>auto</code>, the browser's locale is used.
 * @property \Stripe\StripeObject|null $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string|null $mode The mode of the Checkout Session, one of <code>payment</code>, <code>setup</code>, or <code>subscription</code>.
 * @property string|\Stripe\PaymentIntent|null $payment_intent The ID of the PaymentIntent for Checkout Sessions in <code>payment</code> mode.
 * @property string[] $payment_method_types A list of the types of payment methods (e.g. card) this Checkout Session is allowed to accept.
 * @property string|\Stripe\SetupIntent|null $setup_intent The ID of the SetupIntent for Checkout Sessions in <code>setup</code> mode.
 * @property string|null $submit_type Describes the type of transaction being performed by Checkout in order to customize relevant text on the page, such as the submit button. <code>submit_type</code> can only be specified on Checkout Sessions in <code>payment</code> mode, but not Checkout Sessions in <code>subscription</code> or <code>setup</code> mode.
 * @property string|\Stripe\Subscription|null $subscription The ID of the subscription for Checkout Sessions in <code>subscription</code> mode.
 * @property string $success_url The URL the customer will be directed to after the payment or subscription creation is successful.
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
    const SUBMIT_TYPE_AUTO = 'auto';
    const SUBMIT_TYPE_BOOK = 'book';
    const SUBMIT_TYPE_DONATE = 'donate';
    const SUBMIT_TYPE_PAY = 'pay';
}
