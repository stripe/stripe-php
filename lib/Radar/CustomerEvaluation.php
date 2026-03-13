<?php

// File generated from our OpenAPI spec

namespace Stripe\Radar;

/**
 * Customer Evaluation resource returned by the Radar Customer Evaluations API.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created_at Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $customer The ID of the Stripe customer the customer evaluation is associated with.
 * @property string $event_type The type of evaluation event.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|(object{account_sharing?: (object{evaluated_at: int, risk_level?: string, score: float}&\Stripe\StripeObject), multi_accounting?: (object{evaluated_at: int, risk_level?: string, score: float}&\Stripe\StripeObject)}&\Stripe\StripeObject) $signals A hash of signal objects providing Radar's evaluation for the lifecycle event.
 */
class CustomerEvaluation extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.customer_evaluation';

    /**
     * Creates a new <code>CustomerEvaluation</code> object.
     *
     * @param null|array{evaluation_context: array{client_details?: array{radar_session: string}, customer_details?: array{customer?: string, customer_data?: array{email?: string, name?: string, phone?: string}}, type: string}[], event_type: string, expand?: string[]} $params
     * @param null|array|string $options
     *
     * @return CustomerEvaluation the created resource
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
