<?php

// File generated from our OpenAPI spec

namespace Stripe\Radar;

/**
 * Billing Evaluations represent Stripe Radar's assessment of the non-payment abuse risk of an upcoming charge. Unlike a <a href="/api/radar/payment-evaluation">Payment Evaluation</a>, a billing evaluation is created before the payment is attempted and returns the <code>non_payment_abuse</code> signal only.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{radar_session: null|string}&\Stripe\StripeObject) $client_device_metadata_details Client device metadata attached to this billing evaluation.
 * @property int $created_at Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{customer: null|string, customer_account: null|string, data: null|(object{email: null|string, name: null|string, phone: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $customer_details Details of the customer this billing evaluation assesses.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{amount: int, currency: string, description: null|string, money_movement_details: null|(object{card: null|(object{customer_presence: null|string, payment_type: null|string}&\Stripe\StripeObject), money_movement_type: string}&\Stripe\StripeObject), payment_method_details: null|(object{billing_details: null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), email: null|string, name: null|string, phone: null|string}&\Stripe\StripeObject), payment_method: null|string}&\Stripe\StripeObject), shipping_details: null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), name: null|string, phone: null|string}&\Stripe\StripeObject), statement_descriptor: null|string}&\Stripe\StripeObject) $payment_details Payment details for the upcoming charge this billing evaluation assesses.
 * @property (object{non_payment_abuse: null|(object{evaluated_at: int, risk_level: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $signals Stripe Radar's signals for the upcoming charge this billing evaluation assesses.
 */
class BillingEvaluation extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.billing_evaluation';

    /**
     * Request Stripe Radar’s assessment of the non-payment abuse risk of an upcoming
     * charge, before the payment is attempted.
     *
     * @param null|array{client_device_metadata_details?: array{radar_session: string}, customer_details: array{customer?: string, customer_account?: string, data?: array{email?: string, name?: string, phone?: string}}, expand?: string[], metadata?: array<string, string>, payment_details: array{amount: int, currency: string, description?: string, money_movement_details?: array{card?: array{customer_presence?: string, payment_type?: string}, money_movement_type: string}, payment_method_details: array{billing_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, payment_method: string}, shipping_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name?: string, phone?: string}, statement_descriptor?: string}} $params
     * @param null|array|string $options
     *
     * @return BillingEvaluation the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
