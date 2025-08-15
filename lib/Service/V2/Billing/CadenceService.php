<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CadenceService extends \Stripe\Service\AbstractService
{
    /**
     * List all the billing Cadences.
     *
     * @param null|array{include?: string[], limit?: int, payer?: array{customer?: string, type: string}, test_clock?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\Cadence>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/cadences', $params, $opts);
    }

    /**
     * Cancel the billing cadence.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Cadence
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/cadences/%s/cancel', $id), $params, $opts);
    }

    /**
     * Create a billing Cadence object.
     *
     * @param null|array{billing_cycle: array{interval_count?: int, type: string, day?: array{time?: array{hour: int, minute?: int}}, month?: array{day_of_month: int, time?: array{hour: int, minute?: int}}, week?: array{day_of_week: int, time?: array{hour: int, minute?: int}}, year?: array{day_of_month?: int, month_of_year?: int, time?: array{hour: int, minute?: int}}}, include?: string[], metadata?: array<string, string>, payer: array{billing_profile?: string, customer?: string, type?: string}, settings?: array{bill?: array{id: string, version?: string}, collection?: array{id: string, version?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Cadence
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/cadences', $params, $opts);
    }

    /**
     * Retrieve a billing Cadence object.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Cadence
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/cadences/%s', $id), $params, $opts);
    }

    /**
     * Update a billing Cadence object.
     *
     * @param string $id
     * @param null|array{include?: string[], metadata?: array<string, null|string>, payer?: array{billing_profile?: string}, settings?: array{bill?: null|array{id: string, version?: null|string}, collection?: null|array{id: string, version?: null|string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Cadence
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/cadences/%s', $id), $params, $opts);
    }
}
