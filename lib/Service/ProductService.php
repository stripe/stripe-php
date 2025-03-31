<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ProductService extends AbstractService
{
    /**
     * Returns a list of your products. The products are returned sorted by creation
     * date, with the most recently created products appearing first.
     *
     * @param null|array{active?: bool, created?: array|int, ending_before?: string, expand?: string[], ids?: string[], limit?: int, shippable?: bool, starting_after?: string, type?: string, url?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Product>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/products', $params, $opts);
    }

    /**
     * Retrieve a list of features for a product.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\ProductFeature>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allFeatures($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/products/%s/features', $parentId), $params, $opts);
    }

    /**
     * Creates a new product object.
     *
     * @param null|array{active?: bool, default_price_data?: array{currency: string, currency_options?: \Stripe\StripeObject, custom_unit_amount?: array{enabled: bool, maximum?: int, minimum?: int, preset?: int}, metadata?: \Stripe\StripeObject, recurring?: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, description?: string, expand?: string[], id?: string, images?: string[], marketing_features?: array{name: string}[], metadata?: \Stripe\StripeObject, name: string, package_dimensions?: array{height: float, length: float, weight: float, width: float}, shippable?: bool, statement_descriptor?: string, tax_code?: string, type?: string, unit_label?: string, url?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Product
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/products', $params, $opts);
    }

    /**
     * Creates a product_feature, which represents a feature attachment to a product.
     *
     * @param string $parentId
     * @param null|array{entitlement_feature: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\ProductFeature
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\Product
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\ProductFeature
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Product
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\ProductFeature
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{expand?: string[], limit?: int, page?: string, query: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SearchResult<\Stripe\Product>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{active?: bool, default_price?: string, description?: null|string, expand?: string[], images?: null|string[], marketing_features?: null|array{name: string}[], metadata?: null|\Stripe\StripeObject, name?: string, package_dimensions?: null|array{height: float, length: float, weight: float, width: float}, shippable?: bool, statement_descriptor?: string, tax_code?: null|string, unit_label?: null|string, url?: null|string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Product
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/products/%s', $id), $params, $opts);
    }
}
