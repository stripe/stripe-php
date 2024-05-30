<?php

// File generated from our OpenAPI spec

namespace Stripe\Climate;

/**
 * A supplier of carbon removal.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object’s type. Objects of the same type share the same value.
 * @property string $info_url Link to a webpage to learn more about the supplier.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject[] $locations The locations in which this supplier operates.
 * @property string $name Name of this carbon removal supplier.
 * @property string $removal_pathway The scientific pathway used for carbon removal.
 */
class Supplier extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'climate.supplier';

    const REMOVAL_PATHWAY_BIOMASS_CARBON_REMOVAL_AND_STORAGE = 'biomass_carbon_removal_and_storage';
    const REMOVAL_PATHWAY_DIRECT_AIR_CAPTURE = 'direct_air_capture';
    const REMOVAL_PATHWAY_ENHANCED_WEATHERING = 'enhanced_weathering';

    /**
     * Lists all available Climate supplier objects.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Climate\Supplier> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a Climate supplier object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Climate\Supplier
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
