<?php

// File generated from our OpenAPI spec

namespace Stripe\ProductCatalog;

/**
 * Trial offers let you define free or paid introductory pricing for a subscription item.
 * A TrialOffer specifies the price to charge during the trial, how many billing intervals
 * the trial lasts, and what price the subscription item transitions to when the trial ends.
 * You attach a TrialOffer to a subscription item
 * using <code>items[current_trial][trial_offer]</code> when creating or updating a subscription.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the trial offer is active. Set to false to archive the trial offer.
 * @property (object{relative?: (object{iterations: int}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $duration
 * @property (object{transition?: (object{price: string|\Stripe\Price}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $end_behavior
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|string $nickname A brief description of the trial offer, hidden from customers.
 * @property string|\Stripe\Price $price The price during the trial offer.
 */
class TrialOffer extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'product_catalog.trial_offer';

    use \Stripe\ApiOperations\Update;

    /**
     * Creates a trial offer.
     *
     * @param null|array{active?: bool, duration: array{relative?: array{iterations: int}, type: string}, end_behavior: array{transition: array{price: string}}, expand?: string[], nickname?: string, price: string} $params
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

    /**
     * Returns a list of trial offers.
     *
     * @param null|array{active?: bool, created?: array|int, ending_before?: string, expand?: string[], limit?: int, prices?: string[], starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<TrialOffer> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the trial offer with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return TrialOffer
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
     * Updates the specified trial offer by setting the values of the parameters
     * passed. Any parameters not provided are left unchanged.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{active?: bool, expand?: string[]} $params
     * @param null|array|string $opts
     *
     * @return TrialOffer the updated resource
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
