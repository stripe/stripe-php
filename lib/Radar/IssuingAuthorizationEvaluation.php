<?php

// File generated from our OpenAPI spec

namespace Stripe\Radar;

/**
 * Authorization Evaluations represent fraud risk assessments for Issuing card authorizations. They include fraud risk signals and contextual details about the authorization.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{amount: int, authorization_method: null|string, currency: string, entry_mode: null|string, entry_mode_raw_code: null|string, initiated_at: int, point_of_sale_condition: null|string, point_of_sale_condition_raw_code: null|string, reference: string}&\Stripe\StripeObject) $authorization_details Details about the authorization.
 * @property null|(object{bin: string, bin_country: string, card_type: string, created_at: int, last4: string, reference: string}&\Stripe\StripeObject) $card_details Details about the card used in the authorization.
 * @property null|(object{created_at: null|int, reference: null|string}&\Stripe\StripeObject) $cardholder_details Details about the cardholder.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|(object{category_code: string, country: null|string, name: string, network_id: string, terminal_id: null|string}&\Stripe\StripeObject) $merchant_details Details about the seller (grocery store, e-commerce website, etc.) where the card authorization happened.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{acquiring_institution_id: null|string, routed_network: null|string}&\Stripe\StripeObject) $network_details Details about the authorization, such as identifiers, set by the card network.
 * @property (object{fraud_risk: (object{data: null|(object{evaluated_at: int, level: string, score: float}&\Stripe\StripeObject), error: null|\Stripe\StripeObject, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $signals Collection of fraud risk signals for this authorization evaluation.
 * @property null|(object{created_at: null|int, reference: null|string, wallet: null|string}&\Stripe\StripeObject) $token_details Details about the token, if a tokenized payment method was used for the authorization.
 * @property null|(object{three_d_secure_result: null|string}&\Stripe\StripeObject) $verification_details Details about verification data for the authorization.
 */
class IssuingAuthorizationEvaluation extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.issuing_authorization_evaluation';

    /**
     * Request a fraud risk assessment from Stripe for an Issuing card authorization.
     *
     * @param null|array{authorization_details: array{amount: int, authorization_method?: string, currency: string, entry_mode?: string, entry_mode_raw_code?: string, initiated_at: int, point_of_sale_condition?: string, point_of_sale_condition_raw_code?: string, reference: string}, card_details: array{bin: string, bin_country: string, card_type: string, created_at: int, last4?: string, reference: string}, cardholder_details?: array{created_at?: int, reference?: string}, expand?: string[], merchant_details: array{category_code: string, country?: string, name: string, network_id: string, terminal_id?: string}, metadata?: array<string, string>, network_details?: array{acquiring_institution_id?: string, routed_network?: string}, token_details?: array{created_at?: int, reference?: string, wallet?: string}, verification_details?: array{three_d_secure_result?: string}} $params
     * @param null|array|string $options
     *
     * @return IssuingAuthorizationEvaluation the created resource
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
