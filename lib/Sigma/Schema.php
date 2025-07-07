<?php

// File generated from our OpenAPI spec

namespace Stripe\Sigma;

/**
 * Contains information about the tables in a reporting Schema.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $name
 * @property ((object{columns: ((object{comment: string, foreign_key: null|string, name: string, primary_key: bool, type: string}&\Stripe\StripeObject))[], comment: string, name: string, section: string}&\Stripe\StripeObject))[] $tables
 */
class Schema extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'sigma.schema';

    /**
     * Lists the schemas available to the authorized merchant in Stripe’s data products.
     *
     * @param null|array{expand?: string[], product?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Schema> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }
}
