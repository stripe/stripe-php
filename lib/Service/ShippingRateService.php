<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ShippingRateService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of your shipping rates.
     *
     * @param null|array{active?: bool, created?: int|array, currency?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\ShippingRate>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/shipping_rates', $params, $opts);
    }

    /**
     * Creates a new shipping rate object.
     *
     * @param null|array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, expand?: string[], fixed_amount?: array{amount: int, currency: string, currency_options?: \Stripe\StripeObject}, metadata?: \Stripe\StripeObject, tax_behavior?: string, tax_code?: string, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\ShippingRate
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/shipping_rates', $params, $opts);
    }

    /**
     * Returns the shipping rate object with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\ShippingRate
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/shipping_rates/%s', $id), $params, $opts);
    }

    /**
     * Updates an existing shipping rate object.
     *
     * @param string $id
     * @param null|array{active?: bool, expand?: string[], fixed_amount?: array{currency_options?: \Stripe\StripeObject}, metadata?: null|\Stripe\StripeObject, tax_behavior?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\ShippingRate
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/shipping_rates/%s', $id), $params, $opts);
    }
}
