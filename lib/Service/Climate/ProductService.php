<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Climate;

class ProductService extends \Stripe\Service\AbstractService
{
    /**
     * Lists all available Climate product objects.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Climate\Product>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/climate/products', $params, $opts);
    }

    /**
     * Retrieves the details of a Climate product with the given ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Climate\Product
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/climate/products/%s', $id), $params, $opts);
    }
}
