<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A payment link is a shareable URL that will take your customers to a hosted payment page. A payment link can be shared and used multiple times.
 *
 * When a customer opens a payment link it will open a new <a href="https://docs.stripe.com/api/checkout/sessions">checkout session</a> to render the payment page. You can use <a href="https://docs.stripe.com/api/events/types#event_types-checkout.session.completed">checkout session events</a> to track payments through payment links.
 *
 * Related guide: <a href="https://docs.stripe.com/payment-links">Payment Links API</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the payment link's <code>url</code> is active. If <code>false</code>, customers visiting the URL will be shown a page saying that the link has been deactivated.
 * @property (object{hosted_confirmation?: (object{custom_message: null|string}&StripeObject), redirect?: (object{url: string}&StripeObject), type: string}&StripeObject) $after_completion
 * @property bool $allow_promotion_codes Whether user redeemable promotion codes are enabled.
 * @property null|Application|string $application The ID of the Connect application that created the Payment Link.
 * @property null|int $application_fee_amount The amount of the application fee (if any) that will be requested to be applied to the payment and transferred to the application owner's Stripe account.
 * @property null|float $application_fee_percent This represents the percentage of the subscription invoice total that will be transferred to the application owner's Stripe account.
 * @property (object{enabled: bool, liability: null|(object{account?: Account|string, type: string}&StripeObject)}&StripeObject) $automatic_tax
 * @property string $billing_address_collection Configuration for collecting the customer's billing address. Defaults to <code>auto</code>.
 * @property null|(object{payment_method_reuse_agreement: null|(object{position: string}&StripeObject), promotions: null|string, terms_of_service: null|string}&StripeObject) $consent_collection When set, provides configuration to gather active consent from customers.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property ((object{dropdown?: (object{default_value: null|string, options: (object{label: string, value: string}&StripeObject)[]}&StripeObject), key: string, label: (object{custom: null|string, type: string}&StripeObject), numeric?: (object{default_value: null|string, maximum_length: null|int, minimum_length: null|int}&StripeObject), optional: bool, text?: (object{default_value: null|string, maximum_length: null|int, minimum_length: null|int}&StripeObject), type: string}&StripeObject))[] $custom_fields Collect additional information from your customer using custom fields. Up to 3 fields are supported. You can't set this parameter if <code>ui_mode</code> is <code>custom</code>.
 * @property (object{after_submit: null|(object{message: string}&StripeObject), shipping_address: null|(object{message: string}&StripeObject), submit: null|(object{message: string}&StripeObject), terms_of_service_acceptance: null|(object{message: string}&StripeObject)}&StripeObject) $custom_text
 * @property string $customer_creation Configuration for Customer creation during checkout.
 * @property null|string $inactive_message The custom message to be displayed to a customer when a payment link is no longer active.
 * @property null|(object{enabled: bool, invoice_data: null|(object{account_tax_ids: null|(string|TaxId)[], custom_fields: null|(object{name: string, value: string}&StripeObject)[], description: null|string, footer: null|string, issuer: null|(object{account?: Account|string, type: string}&StripeObject), metadata: null|StripeObject, rendering_options: null|(object{amount_tax_display: null|string, template: null|string}&StripeObject)}&StripeObject)}&StripeObject) $invoice_creation Configuration for creating invoice for payment mode payment links.
 * @property null|Collection<LineItem> $line_items The line items representing what is being sold.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{business?: (object{enabled: bool, optional: bool}&StripeObject), individual?: (object{enabled: bool, optional: bool}&StripeObject)}&StripeObject) $name_collection
 * @property null|Account|string $on_behalf_of The account on behalf of which to charge. See the <a href="https://support.stripe.com/questions/sending-invoices-on-behalf-of-connected-accounts">Connect documentation</a> for details.
 * @property null|((object{adjustable_quantity: null|(object{enabled: bool, maximum: null|int, minimum: null|int}&StripeObject), price: string, quantity: int}&StripeObject))[] $optional_items The optional items presented to the customer at checkout.
 * @property null|(object{capture_method: null|string, description: null|string, metadata: StripeObject, setup_future_usage: null|string, statement_descriptor: null|string, statement_descriptor_suffix: null|string, transfer_group: null|string}&StripeObject) $payment_intent_data Indicates the parameters to be passed to PaymentIntent creation during checkout.
 * @property string $payment_method_collection Configuration for collecting a payment method during checkout. Defaults to <code>always</code>.
 * @property null|string[] $payment_method_types The list of payment method types that customers can use. When <code>null</code>, Stripe will dynamically show relevant payment methods you've enabled in your <a href="https://dashboard.stripe.com/settings/payment_methods">payment method settings</a>.
 * @property (object{enabled: bool}&StripeObject) $phone_number_collection
 * @property null|(object{completed_sessions: (object{count: int, limit: int}&StripeObject)}&StripeObject) $restrictions Settings that restrict the usage of a payment link.
 * @property null|(object{allowed_countries: string[]}&StripeObject) $shipping_address_collection Configuration for collecting the customer's shipping address.
 * @property ((object{shipping_amount: int, shipping_rate: ShippingRate|string}&StripeObject))[] $shipping_options The shipping rate options applied to the session.
 * @property string $submit_type Indicates the type of transaction being performed which customizes relevant text on the page, such as the submit button.
 * @property null|(object{description: null|string, invoice_settings: (object{issuer: (object{account?: Account|string, type: string}&StripeObject)}&StripeObject), metadata: StripeObject, trial_period_days: null|int, trial_settings: null|(object{end_behavior: (object{missing_payment_method: string}&StripeObject)}&StripeObject)}&StripeObject) $subscription_data When creating a subscription, the specified configuration data will be used. There must be at least one line item with a recurring price to use <code>subscription_data</code>.
 * @property (object{enabled: bool, required: string}&StripeObject) $tax_id_collection
 * @property null|(object{amount: null|int, destination: Account|string}&StripeObject) $transfer_data The account (if any) the payments will be attributed to for tax reporting, and where funds from each payment will be transferred to.
 * @property string $url The public URL that can be shared with customers.
 */
class PaymentLink extends ApiResource
{
    const OBJECT_NAME = 'payment_link';

    use ApiOperations\Update;

    const BILLING_ADDRESS_COLLECTION_AUTO = 'auto';
    const BILLING_ADDRESS_COLLECTION_REQUIRED = 'required';

    const CUSTOMER_CREATION_ALWAYS = 'always';
    const CUSTOMER_CREATION_IF_REQUIRED = 'if_required';

    const PAYMENT_METHOD_COLLECTION_ALWAYS = 'always';
    const PAYMENT_METHOD_COLLECTION_IF_REQUIRED = 'if_required';

    const SUBMIT_TYPE_AUTO = 'auto';
    const SUBMIT_TYPE_BOOK = 'book';
    const SUBMIT_TYPE_DONATE = 'donate';
    const SUBMIT_TYPE_PAY = 'pay';
    const SUBMIT_TYPE_SUBSCRIBE = 'subscribe';

    /**
     * Creates a payment link.
     *
     * @param null|array{after_completion?: array{hosted_confirmation?: array{custom_message?: string}, redirect?: array{url: string}, type: string}, allow_promotion_codes?: bool, application_fee_amount?: int, application_fee_percent?: float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_address_collection?: string, consent_collection?: array{payment_method_reuse_agreement?: array{position: string}, promotions?: string, terms_of_service?: string}, currency?: string, custom_fields?: array{dropdown?: array{default_value?: string, options: array{label: string, value: string}[]}, key: string, label: array{custom: string, type: string}, numeric?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, optional?: bool, text?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, type: string}[], custom_text?: array{after_submit?: null|array{message: string}, shipping_address?: null|array{message: string}, submit?: null|array{message: string}, terms_of_service_acceptance?: null|array{message: string}}, customer_creation?: string, expand?: string[], inactive_message?: string, invoice_creation?: array{enabled: bool, invoice_data?: array{account_tax_ids?: null|string[], custom_fields?: null|array{name: string, value: string}[], description?: string, footer?: string, issuer?: array{account?: string, type: string}, metadata?: null|array<string, string>, rendering_options?: null|array{amount_tax_display?: null|string, template?: string}}}, line_items: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, price?: string, price_data?: array{currency: string, product?: string, product_data?: array{description?: string, images?: string[], metadata?: array<string, string>, name: string, tax_code?: string, unit_label?: string}, recurring?: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity: int}[], metadata?: array<string, string>, name_collection?: array{business?: array{enabled: bool, optional?: bool}, individual?: array{enabled: bool, optional?: bool}}, on_behalf_of?: string, optional_items?: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, price: string, quantity: int}[], payment_intent_data?: array{capture_method?: string, description?: string, metadata?: array<string, string>, setup_future_usage?: string, statement_descriptor?: string, statement_descriptor_suffix?: string, transfer_group?: string}, payment_method_collection?: string, payment_method_types?: string[], phone_number_collection?: array{enabled: bool}, restrictions?: array{completed_sessions: array{limit: int}}, shipping_address_collection?: array{allowed_countries: string[]}, shipping_options?: array{shipping_rate?: string}[], submit_type?: string, subscription_data?: array{description?: string, invoice_settings?: array{issuer?: array{account?: string, type: string}}, metadata?: array<string, string>, trial_period_days?: int, trial_settings?: array{end_behavior: array{missing_payment_method: string}}}, tax_id_collection?: array{enabled: bool, required?: string}, transfer_data?: array{amount?: int, destination: string}} $params
     * @param null|array|string $options
     *
     * @return PaymentLink the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of your payment links.
     *
     * @param null|array{active?: bool, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<PaymentLink> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieve a payment link.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return PaymentLink
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates a payment link.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{active?: bool, after_completion?: array{hosted_confirmation?: array{custom_message?: string}, redirect?: array{url: string}, type: string}, allow_promotion_codes?: bool, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, billing_address_collection?: string, custom_fields?: null|array{dropdown?: array{default_value?: string, options: array{label: string, value: string}[]}, key: string, label: array{custom: string, type: string}, numeric?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, optional?: bool, text?: array{default_value?: string, maximum_length?: int, minimum_length?: int}, type: string}[], custom_text?: array{after_submit?: null|array{message: string}, shipping_address?: null|array{message: string}, submit?: null|array{message: string}, terms_of_service_acceptance?: null|array{message: string}}, customer_creation?: string, expand?: string[], inactive_message?: null|string, invoice_creation?: array{enabled: bool, invoice_data?: array{account_tax_ids?: null|string[], custom_fields?: null|array{name: string, value: string}[], description?: string, footer?: string, issuer?: array{account?: string, type: string}, metadata?: null|array<string, string>, rendering_options?: null|array{amount_tax_display?: null|string, template?: string}}}, line_items?: array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, id: string, quantity?: int}[], metadata?: array<string, string>, name_collection?: null|array{business?: array{enabled: bool, optional?: bool}, individual?: array{enabled: bool, optional?: bool}}, payment_intent_data?: array{description?: null|string, metadata?: null|array<string, string>, statement_descriptor?: null|string, statement_descriptor_suffix?: null|string, transfer_group?: null|string}, payment_method_collection?: string, payment_method_types?: null|string[], phone_number_collection?: array{enabled: bool}, restrictions?: null|array{completed_sessions: array{limit: int}}, shipping_address_collection?: null|array{allowed_countries: string[]}, submit_type?: string, subscription_data?: array{invoice_settings?: array{issuer?: array{account?: string, type: string}}, metadata?: null|array<string, string>, trial_period_days?: null|int, trial_settings?: null|array{end_behavior: array{missing_payment_method: string}}}, tax_id_collection?: array{enabled: bool, required?: string}} $params
     * @param null|array|string $opts
     *
     * @return PaymentLink the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param string $id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection<LineItem> list of line items
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function allLineItems($id, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/line_items';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
