<?php

namespace Stripe\Checkout;

/**
 * A Checkout Session represents your customer's session as they pay for one-time
 * purchases or subscriptions through <a
 * href="https://stripe.com/docs/payments/checkout">Checkout</a>. We recommend
 * creating a new Session each time your customer attempts to pay.
 *
 * Once payment is successful, the Checkout Session will contain a reference to the
 * <a href="https://stripe.com/docs/api/customers">Customer</a>, and either the
 * successful <a
 * href="https://stripe.com/docs/api/payment_intents">PaymentIntent</a> or an
 * active <a href="https://stripe.com/docs/api/subscriptions">Subscription</a>.
 *
 * You can create a Checkout Session on your server and pass its ID to the client
 * to begin Checkout.
 *
 * Related guide: <a href="https://stripe.com/docs/payments/checkout/api">Checkout
 * Server Quickstart</a>.
 *
 * @property string $id Unique identifier for the object. Used to pass to <code>redirectToCheckout</code> in Stripe.js.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $billing_address_collection The value (<code>auto</code> or <code>required</code>) for whether Checkout collected the customer's billing address.
 * @property string $cancel_url The URL the customer will be directed to if they decide to cancel payment and return to your website.
 * @property null|string $client_reference_id A unique string to reference the Checkout Session. This can be a customer ID, a cart ID, or similar, and can be used to reconcile the session with your internal systems.
 * @property null|string|\Stripe\Customer $customer The ID of the customer for this session. For Checkout Sessions in <code>payment</code> or <code>subscription</code> mode, Checkout will create a new customer object based on information provided during the session unless an existing customer was provided when the session was created.
 * @property null|string $customer_email If provided, this value will be used when the Customer object is created. If not provided, customers will be asked to enter their email address. Use this parameter to prefill customer data if you already have an email on file. To access information about the customer once a session is complete, use the <code>customer</code> attribute.
 * @property \Stripe\StripeObject[] $display_items The line items, plans, or SKUs purchased by the customer. Prefer using <code>line_items</code>.
 * @property \Stripe\Collection $line_items The line items purchased by the customer.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $locale The IETF language tag of the locale Checkout is displayed in. If blank or <code>auto</code>, the browser's locale is used.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $mode The mode of the Checkout Session, one of <code>payment</code>, <code>setup</code>, or <code>subscription</code>.
 * @property null|string|\Stripe\PaymentIntent $payment_intent The ID of the PaymentIntent for Checkout Sessions in <code>payment</code> mode.
 * @property string[] $payment_method_types A list of the types of payment methods (e.g. card) this Checkout Session is allowed to accept.
 * @property null|string|\Stripe\SetupIntent $setup_intent The ID of the SetupIntent for Checkout Sessions in <code>setup</code> mode.
 * @property null|\Stripe\StripeObject $shipping Shipping information for this Checkout Session.
 * @property null|\Stripe\StripeObject $shipping_address_collection When set, provides configuration for Checkout to collect a shipping address from a customer.
 * @property null|string $submit_type Describes the type of transaction being performed by Checkout in order to customize relevant text on the page, such as the submit button. <code>submit_type</code> can only be specified on Checkout Sessions in <code>payment</code> mode, but not Checkout Sessions in <code>subscription</code> or <code>setup</code> mode.
 * @property null|string|\Stripe\Subscription $subscription The ID of the subscription for Checkout Sessions in <code>subscription</code> mode.
 * @property string $success_url The URL the customer will be directed to after the payment or subscription creation is successful.
 */
class Session extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'checkout.session';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\NestedResource;
    use \Stripe\ApiOperations\Retrieve;

    const BILLING_ADDRESS_COLLECTION_AUTO = 'auto';
    const BILLING_ADDRESS_COLLECTION_REQUIRED = 'required';

    const CAPTURE_METHOD_AUTOMATIC = 'automatic';
    const CAPTURE_METHOD_MANUAL = 'manual';

    const INTERVAL_DAY = 'day';
    const INTERVAL_MONTH = 'month';
    const INTERVAL_WEEK = 'week';
    const INTERVAL_YEAR = 'year';

    const LOCALE_AUTO = 'auto';
    const LOCALE_BG = 'bg';
    const LOCALE_CS = 'cs';
    const LOCALE_DA = 'da';
    const LOCALE_DE = 'de';
    const LOCALE_EL = 'el';
    const LOCALE_EN = 'en';
    const LOCALE_ES = 'es';
    const LOCALE_ET = 'et';
    const LOCALE_FI = 'fi';
    const LOCALE_FR = 'fr';
    const LOCALE_HU = 'hu';
    const LOCALE_IT = 'it';
    const LOCALE_JA = 'ja';
    const LOCALE_LT = 'lt';
    const LOCALE_LV = 'lv';
    const LOCALE_MS = 'ms';
    const LOCALE_MT = 'mt';
    const LOCALE_NB = 'nb';
    const LOCALE_NL = 'nl';
    const LOCALE_PL = 'pl';
    const LOCALE_PT = 'pt';
    const LOCALE_PT_BR = 'pt-BR';
    const LOCALE_RO = 'ro';
    const LOCALE_RU = 'ru';
    const LOCALE_SK = 'sk';
    const LOCALE_SL = 'sl';
    const LOCALE_SV = 'sv';
    const LOCALE_TR = 'tr';
    const LOCALE_ZH = 'zh';

    const MODE_PAYMENT = 'payment';
    const MODE_SETUP = 'setup';
    const MODE_SUBSCRIPTION = 'subscription';

    const SETUP_FUTURE_USAGE_OFF_SESSION = 'off_session';
    const SETUP_FUTURE_USAGE_ON_SESSION = 'on_session';

    const SUBMIT_TYPE_AUTO = 'auto';
    const SUBMIT_TYPE_BOOK = 'book';
    const SUBMIT_TYPE_DONATE = 'donate';
    const SUBMIT_TYPE_PAY = 'pay';

    const PATH_LINE_ITEMS = '/line_items';

    /**
     * @param string $id the ID of the session on which to retrieve the items
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection the list of items
     */
    public static function allLineItems($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_LINE_ITEMS, $params, $opts);
    }
}
