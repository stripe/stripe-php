<?php

// File generated from our OpenAPI spec

namespace Stripe\Radar;

/**
 * Payment Evaluations represent the risk lifecycle of an externally processed payment. It includes the Radar risk score from Stripe, payment outcome taken by the merchant or processor, and any post transaction events, such as refunds or disputes. See the <a href="/radar/multiprocessor">Radar API guide</a> for integration steps.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{radar_session: string}&\Stripe\StripeObject) $client_device_metadata_details Client device metadata attached to this payment evaluation.
 * @property int $created_at Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{customer: null|string, customer_account: null|string, email: null|string, name: null|string, phone: null|string}&\Stripe\StripeObject) $customer_details Customer details attached to this payment evaluation.
 * @property null|((object{dispute_opened?: (object{amount: int, currency: string, reason: string}&\Stripe\StripeObject), early_fraud_warning_received?: (object{fraud_type: string}&\Stripe\StripeObject), occurred_at: int, refunded?: (object{amount: int, currency: string, reason: string}&\Stripe\StripeObject), type: string, user_intervention_raised?: (object{custom?: (object{type: string}&\Stripe\StripeObject), key: string, type: string}&\Stripe\StripeObject), user_intervention_resolved?: (object{key: string, outcome: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject))[] $events Event information associated with the payment evaluation, such as refunds, dispute, early fraud warnings, or user interventions.
 * @property (object{card_issuer_decline: null|(object{model_score: float, recommended_action: string}&\Stripe\StripeObject), evaluated_at: int, fraudulent_dispute: (object{recommended_action: string, risk_score: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $insights Collection of scores and insights for this payment evaluation.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{merchant_blocked?: (object{reason: string}&\Stripe\StripeObject), payment_intent_id?: string, rejected?: (object{card?: (object{address_line1_check: string, address_postal_code_check: string, cvc_check: string, reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), succeeded?: (object{card?: (object{address_line1_check: string, address_postal_code_check: string, cvc_check: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $outcome Indicates the final outcome for the payment evaluation.
 * @property null|(object{amount: int, currency: string, description: null|string, money_movement_details: null|(object{card: null|(object{customer_presence: null|string, payment_type: null|string}&\Stripe\StripeObject), money_movement_type: string}&\Stripe\StripeObject), payment_method_details: null|(object{billing_details: null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), email: null|string, name: null|string, phone: null|string}&\Stripe\StripeObject), payment_method: string|\Stripe\PaymentMethod}&\Stripe\StripeObject), shipping_details: null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), name: null|string, phone: null|string}&\Stripe\StripeObject), statement_descriptor: null|string}&\Stripe\StripeObject) $payment_details Payment details attached to this payment evaluation.
 */
class PaymentEvaluation extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.payment_evaluation';

    /**
     * Request a Radar API fraud risk score from Stripe for a payment before sending it
     * for external processor authorization.
     *
     * @param null|array{client_device_metadata_details?: array{radar_session: string}, customer_details: array{customer?: string, customer_account?: string, email?: string, name?: string, phone?: string}, expand?: string[], metadata?: array<string, string>, payment_details: array{amount: int, currency: string, description?: string, money_movement_details?: array{card?: array{customer_presence?: string, payment_type?: string}, money_movement_type: string}, payment_method_details: array{billing_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, payment_method: string}, shipping_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name?: string, phone?: string}, statement_descriptor?: string}} $params
     * @param null|array|string $options
     *
     * @return PaymentEvaluation the created resource
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
