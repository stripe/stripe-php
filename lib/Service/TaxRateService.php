<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TaxRateService extends AbstractService
{
    /**
     * Returns a list of your tax rates. Tax rates are returned sorted by creation
     * date, with the most recently created tax rates appearing first.
     *
     * @param null|array{active?: bool, created?: array|int, ending_before?: string, expand?: string[], inclusive?: bool, limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\TaxRate>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/tax_rates', $params, $opts);
    }

    /**
     * Creates a new tax rate.
     *
     * @param null|array{active?: bool, country?: string, description?: string, display_name: string, expand?: string[], inclusive: bool, jurisdiction?: string, metadata?: \Stripe\StripeObject, percentage: float, state?: string, tax_type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxRate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tax_rates', $params, $opts);
    }

    /**
     * Retrieves a tax rate with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxRate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/tax_rates/%s', $id), $params, $opts);
    }

    /**
     * Updates an existing tax rate.
     *
     * @param string $id
     * @param null|array{active?: bool, country?: string, description?: string, display_name?: string, expand?: string[], jurisdiction?: string, metadata?: null|\Stripe\StripeObject, state?: string, tax_type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\TaxRate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/tax_rates/%s', $id), $params, $opts);
    }
}
