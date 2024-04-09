<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
/**
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ProductService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of your products. The products are returned sorted by creation
     * date, with the most recently created products appearing first.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Product>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/products', $params, $opts);
    }

    /**
     * Retrieve a list of features for a product.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\ProductFeature>
     */
    public function allFeatures($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/products/%s/features', $parentId), $params, $opts);
    }

    /**
     * Creates a new product object.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Product
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/products', $params, $opts);
    }

    /**
     * Creates a product_feature, which represents a feature attachment to a product.
     *
     * @param string $parentId
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\ProductFeature
     */
    public function createFeature($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/products/%s/features', $parentId), $params, $opts);
    }

    /**
     * Delete a product. Deleting a product is only possible if it has no prices
     * associated with it. Additionally, deleting a product with <code>type=good</code>
     * is only possible if it has no SKUs associated with it.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Product
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/products/%s', $id), $params, $opts);
    }

    /**
     * Deletes the feature attachment to a product.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\ProductFeature
     */
    public function deleteFeature($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/products/%s/features/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieves the details of an existing product. Supply the unique product ID from
     * either a product creation request or the product list, and Stripe will return
     * the corresponding product information.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Product
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/products/%s', $id), $params, $opts);
    }

    /**
     * Retrieves a product_feature, which represents a feature attachment to a product.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\ProductFeature
     */
    public function retrieveFeature($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/products/%s/features/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Search for products you’ve previously created using Stripe’s <a
     * href="/docs/search#search-query-language">Search Query Language</a>. Don’t use
     * search in read-after-write flows where strict consistency is necessary. Under
     * normal operating conditions, data is searchable in less than a minute.
     * Occasionally, propagation of new or updated data can be up to an hour behind
     * during outages. Search functionality is not available to merchants in India.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SearchResult<\Stripe\Product>
     */
    public function search($params = null, $opts = null)
    {
        return $this->requestSearchResult('get', '/v1/products/search', $params, $opts);
    }

    /**
     * Updates the specific product by setting the values of the parameters passed. Any
     * parameters not provided will be left unchanged.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Product
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/products/%s', $id), $params, $opts);
    }
}
