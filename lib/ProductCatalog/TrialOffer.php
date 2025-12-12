<?php

// File generated from our OpenAPI spec

namespace Stripe\ProductCatalog;

/**
 * Resource for the TrialOffer API, used to describe a subscription item's trial period settings.
 * Renders a TrialOffer object that describes the price, duration, end_behavior of a trial offer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{relative?: (object{iterations: int}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $duration
 * @property (object{transition: (object{price: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $end_behavior
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string|\Stripe\Price $price The price during the trial offer.
 */
class TrialOffer extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'product_catalog.trial_offer';

    /**
     * Creates a trial offer.
     *
     * @param null|array{duration: array{relative?: array{iterations: int}, type: string}, end_behavior: array{transition: array{price: string}}, expand?: string[], price: string} $params
     * @param null|array|string $options
     *
     * @return TrialOffer the created resource
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
