<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * The <code>French Meal Vouchers Onboarding</code> resource encapsulates the onboarding status and other related information
 * for a single restaurant (SIRET number) in the context of the French Meal Vouchers program.
 *
 * To onboard a restaurant for the French Meal Vouchers program, you create a <code>French Meal Vouchers Onboarding</code> object.
 * You can retrieve individual objects, list all such objects, or update objects to correct the postal code of the restaurant.
 * We identify <code>French Meal Vouchers Onboarding</code> objects with a unique, random ID.
 *
 * Related guide: <a href="https://docs.stripe.com/payments/meal-vouchers/fr-meal-vouchers/set-up-restaurant">Set up a restaurant for titres-restaurant payments</a>
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
     * Creates a <code>French Meal Vouchers Onboarding</code> object that represents a
     * restaurant’s onboarding status and starts the onboarding process.
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
     * Lists <code>French Meal Vouchers Onboarding</code> objects. The objects are
     * returned in sorted order, with the most recently created objects appearing
     * first.
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
     * Retrieves the details of a previously created <code>French Meal Vouchers
     * Onboarding</code> object.
     *
     * Supply the unique <code>French Meal Vouchers Onboarding</code> ID that was
     * returned from your previous request, and Stripe returns the corresponding
     * onboarding information.
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
     * Updates the details of a restaurant’s <code>French Meal Vouchers
     * Onboarding</code> object by setting the values of the parameters passed. Any
     * parameters not provided are left unchanged. After you update the object, the
     * onboarding process automatically restarts.
     *
     * You can only update <code>French Meal Vouchers Onboarding</code> objects with
     * the <code>postal_code</code> field requirement in <code>past_due</code>.
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
