<?php

// File generated from our OpenAPI spec

namespace Stripe\ProductCatalog;

/**
 * Trial offers let you define free or paid introductory pricing for a subscription item.
 * A TrialOffer specifies the price to charge during the trial, how long the trial lasts
 * (a fixed end timestamp or a number of billing intervals), and what price the subscription
 * item transitions to when the trial ends. You attach a TrialOffer to a subscription item
 * using <code>items[current_trial][trial_offer]</code> when creating or updating a subscription.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{relative?: (object{iterations: int}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $duration
 * @property (object{transition: (object{price: string|\Stripe\Price}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $end_behavior
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|string $name A brief, user-friendly name for the trial offer-for identification purposes.
 * @property string|\Stripe\Price $price The price during the trial offer.
 */
class TrialOffer extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'product_catalog.trial_offer';

    /**
     * Creates a trial offer.
     *
     * @param null|array{duration: array{relative?: array{iterations: int}, type: string}, end_behavior: array{transition: array{price: string}}, expand?: string[], name?: string, price: string} $params
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
