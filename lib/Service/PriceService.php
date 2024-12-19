<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PriceService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of your active prices, excluding <a
     * href="/docs/products-prices/pricing-models#inline-pricing">inline prices</a>.
     * For the list of inactive prices, set <code>active</code> to false.
     *
     * @param null|array{active?: bool, created?: int|array, currency?: string, ending_before?: string, expand?: string[], limit?: int, lookup_keys?: string[], product?: string, recurring?: array{interval?: string, meter?: string, usage_type?: string}, starting_after?: string, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Price>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/prices', $params, $opts);
    }

    /**
     * Creates a new price for an existing product. The price can be recurring or
     * one-time.
     *
     * @param null|array{active?: bool, billing_scheme?: string, currency: string, currency_options?: \Stripe\StripeObject, custom_unit_amount?: array{enabled: bool, maximum?: int, minimum?: int, preset?: int}, expand?: string[], lookup_key?: string, metadata?: \Stripe\StripeObject, nickname?: string, product?: string, product_data?: array{active?: bool, id?: string, metadata?: \Stripe\StripeObject, name: string, statement_descriptor?: string, tax_code?: string, unit_label?: string}, recurring?: array{aggregate_usage?: string, interval: string, interval_count?: int, meter?: string, trial_period_days?: int, usage_type?: string}, tax_behavior?: string, tiers?: (array{flat_amount?: int, flat_amount_decimal?: string, unit_amount?: int, unit_amount_decimal?: string, up_to: string|int|array})[], tiers_mode?: string, transfer_lookup_key?: bool, transform_quantity?: array{divide_by: int, round: string}, unit_amount?: int, unit_amount_decimal?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Price
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/prices', $params, $opts);
    }

    /**
     * Retrieves the price with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Price
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/prices/%s', $id), $params, $opts);
    }

    /**
     * Search for prices you’ve previously created using Stripe’s <a
     * href="/docs/search#search-query-language">Search Query Language</a>. Don’t use
     * search in read-after-write flows where strict consistency is necessary. Under
     * normal operating conditions, data is searchable in less than a minute.
     * Occasionally, propagation of new or updated data can be up to an hour behind
     * during outages. Search functionality is not available to merchants in India.
     *
     * @param null|array{expand?: string[], limit?: int, page?: string, query: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SearchResult<\Stripe\Price>
     */
    public function search($params = null, $opts = null)
    {
        return $this->requestSearchResult('get', '/v1/prices/search', $params, $opts);
    }

    /**
     * Updates the specified price by setting the values of the parameters passed. Any
     * parameters not provided are left unchanged.
     *
     * @param string $id
     * @param null|array{active?: bool, currency_options?: null|\Stripe\StripeObject, expand?: string[], lookup_key?: string, metadata?: null|\Stripe\StripeObject, migrate_to?: null|array{behavior: string, effective_after?: int, price: string}, nickname?: string, tax_behavior?: string, transfer_lookup_key?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Price
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/prices/%s', $id), $params, $opts);
    }
}
