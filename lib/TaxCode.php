<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * <a href="https://stripe.com/docs/tax/tax-categories">Tax codes</a> classify goods and services for tax purposes.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $description A detailed description of which types of products the tax code represents.
 * @property string $name A short name for the tax code.
 */
class TaxCode extends ApiResource
{
    const OBJECT_NAME = 'tax_code';

    /**
     * A list of <a href="https://stripe.com/docs/tax/tax-categories">all tax codes
     * available</a> to add to Products in order to allow specific tax calculations.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<TaxCode> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of an existing tax code. Supply the unique tax code ID and
     * Stripe will return the corresponding tax code information.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return TaxCode
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
}
