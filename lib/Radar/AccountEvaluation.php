<?php

// File generated from our OpenAPI spec

namespace Stripe\Radar;

/**
 * Account Evaluation resource returned by the Radar Account Evaluations API.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created_at Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $customer The ID of the Stripe customer the account evaluation is associated with.
 * @property null|(object{occurred_at: int, type: string}&\Stripe\StripeObject)[] $events The list of events that were reported for this Account Evaluation object via the report API.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{account_sharing?: (object{score: float}&\Stripe\StripeObject), multi_accounting?: (object{score: float}&\Stripe\StripeObject)}&\Stripe\StripeObject) $signals A hash of signal objects providing Radar's evaluation for the lifecycle event.
 * @property string $type The type of evaluation returned, based on the user's request.
 */
class AccountEvaluation extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.account_evaluation';

    use \Stripe\ApiOperations\Update;

    /**
     * Creates a new <code>AccountEvaluation</code> object.
     *
     * @param null|array{expand?: string[], login_initiated?: array{client_device_metadata_details: array{radar_session: string}, customer: string}, registration_initiated?: array{client_device_metadata_details: array{radar_session: string}, customer?: string, customer_data?: array{email?: string, name?: string, phone?: string}}, type: string} $params
     * @param null|array|string $options
     *
     * @return AccountEvaluation the created resource
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

    /**
     * Retrieves an <code>AccountEvaluation</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return AccountEvaluation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Reports an event on an <code>AccountEvaluation</code> object.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], type: string} $params
     * @param null|array|string $opts
     *
     * @return AccountEvaluation the updated resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
