<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Customer Session allows you to grant Stripe's frontend SDKs (like Stripe.js) client-side access
 * control over a Customer.
 *
 * Related guides: <a href="/payments/accept-a-payment-deferred?platform=web&amp;type=payment#save-payment-methods">Customer Session with the Payment Element</a>,
 * <a href="/payments/checkout/pricing-table#customer-session">Customer Session with the Pricing Table</a>,
 * <a href="/payment-links/buy-button#pass-an-existing-customer">Customer Session with the Buy Button</a>.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $client_secret <p>The client secret of this Customer Session. Used on the client to set up secure access to the given <code>customer</code>.</p><p>The client secret can be used to provide access to <code>customer</code> from your frontend. It should not be stored, logged, or exposed to anyone other than the relevant customer. Make sure that you have TLS enabled on any page that includes the client secret.</p>
 * @property null|(object{buy_button: (object{enabled: bool}&StripeObject), customer_sheet: (object{enabled: bool, features: null|(object{payment_method_allow_redisplay_filters: null|string[], payment_method_remove: null|string}&StripeObject)}&StripeObject), mobile_payment_element: (object{enabled: bool, features: null|(object{payment_method_allow_redisplay_filters: null|string[], payment_method_redisplay: null|string, payment_method_remove: null|string, payment_method_save: null|string, payment_method_save_allow_redisplay_override: null|string}&StripeObject)}&StripeObject), payment_element: (object{enabled: bool, features: null|(object{payment_method_allow_redisplay_filters: string[], payment_method_redisplay: string, payment_method_redisplay_limit: null|int, payment_method_remove: string, payment_method_save: string, payment_method_save_usage: null|string}&StripeObject)}&StripeObject), pricing_table: (object{enabled: bool}&StripeObject)}&StripeObject) $components Configuration for the components supported by this Customer Session.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property Customer|string $customer The Customer the Customer Session was created for.
 * @property int $expires_at The timestamp at which this Customer Session will expire.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class CustomerSession extends ApiResource
{
    const OBJECT_NAME = 'customer_session';

    /**
     * Creates a Customer Session object that includes a single-use client secret that
     * you can use on your front-end to grant client-side API access for certain
     * customer resources.
     *
     * @param null|array{components: array{buy_button?: array{enabled: bool}, customer_sheet?: array{enabled: bool, features?: array{payment_method_allow_redisplay_filters?: string[], payment_method_remove?: string}}, mobile_payment_element?: array{enabled: bool, features?: array{payment_method_allow_redisplay_filters?: string[], payment_method_redisplay?: string, payment_method_remove?: string, payment_method_save?: string, payment_method_save_allow_redisplay_override?: string}}, payment_element?: array{enabled: bool, features?: array{payment_method_allow_redisplay_filters?: string[], payment_method_redisplay?: string, payment_method_redisplay_limit?: int, payment_method_remove?: string, payment_method_save?: string, payment_method_save_usage?: string}}, pricing_table?: array{enabled: bool}}, customer: string, expand?: string[]} $params
     * @param null|array|string $options
     *
     * @return CustomerSession the created resource
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
}
