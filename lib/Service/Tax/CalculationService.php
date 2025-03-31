<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Tax;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CalculationService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves the line items of a tax calculation as a collection, if the
     * calculation hasn’t expired.
     *
     * @param string $id
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Tax\CalculationLineItem>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allLineItems($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/tax/calculations/%s/line_items', $id), $params, $opts);
    }

    /**
     * Calculates tax based on the input and returns a Tax <code>Calculation</code>
     * object.
     *
     * @param null|array{currency: string, customer?: string, customer_details?: array{address?: array{city?: null|string, country: string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string}, address_source?: string, ip_address?: string, tax_ids?: array{type: string, value: string}[], taxability_override?: string}, expand?: string[], line_items: array{amount: int, product?: string, quantity?: int, reference?: string, tax_behavior?: string, tax_code?: string}[], ship_from_details?: array{address: array{city?: null|string, country: string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string}}, shipping_cost?: array{amount?: int, shipping_rate?: string, tax_behavior?: string, tax_code?: string}, tax_date?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Calculation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/tax/calculations', $params, $opts);
    }

    /**
     * Retrieves a Tax <code>Calculation</code> object, if the calculation hasn’t
     * expired.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Tax\Calculation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/tax/calculations/%s', $id), $params, $opts);
    }
}
