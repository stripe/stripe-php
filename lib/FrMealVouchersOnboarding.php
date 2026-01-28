<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * The French Meal Vouchers Onboarding resource encapsulates the onboarding status and other related information
 * for a single restaurant (SIRET number) in the context of the French Meal Vouchers program.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $name Name of the restaurant.
 * @property string $postal_code Postal code of the restaurant.
 * @property (object{conecs: (object{issuers: (object{available: string[]}&StripeObject), requirements: (object{errors: ((object{code: string, message: string, requirement: null|string}&StripeObject))[], past_due: string[]}&StripeObject), status: string}&StripeObject)}&StripeObject) $providers This represents the onboarding state of the restaurant on different providers.
 * @property string $siret SIRET number associated with the restaurant.
 */
class FrMealVouchersOnboarding extends ApiResource
{
    const OBJECT_NAME = 'fr_meal_vouchers_onboarding';

    use ApiOperations\Update;

    /**
     * Creates a French Meal Vouchers Onboarding object that represents a restaurant’s
     * onboarding status and starts the onboarding process.
     *
     * @param null|array{expand?: string[], metadata?: array<string, string>, name: string, postal_code: string, siret: string} $params
     * @param null|array|string $options
     *
     * @return FrMealVouchersOnboarding the created resource
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
     * Lists French Meal Vouchers Onboarding objects.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<FrMealVouchersOnboarding> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a French Meal Vouchers Onboarding object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return FrMealVouchersOnboarding
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
     * Updates the details of a restaurant’s French Meal Vouchers Onboarding object.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], postal_code: string} $params
     * @param null|array|string $opts
     *
     * @return FrMealVouchersOnboarding the updated resource
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
}
