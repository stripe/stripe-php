<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\OrchestratedCommerce;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AgreementService extends \Stripe\Service\AbstractService
{
    /**
     * List Agreements for the profile associated with the authenticated merchant.
     *
     * @param null|array{limit?: int, network_business_profile?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\OrchestratedCommerce\Agreement>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/orchestrated_commerce/agreements', $params, $opts);
    }

    /**
     * Confirm an Agreement.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\OrchestratedCommerce\Agreement
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function confirm($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/orchestrated_commerce/agreements/%s/confirm', $id), $params, $opts);
    }

    /**
     * Create a new Agreement.
     *
     * @param null|array{orchestrator: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\OrchestratedCommerce\Agreement
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/orchestrated_commerce/agreements', $params, $opts);
    }

    /**
     * Retrieve an Agreement by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\OrchestratedCommerce\Agreement
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/orchestrated_commerce/agreements/%s', $id), $params, $opts);
    }

    /**
     * Terminate an Agreement.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\OrchestratedCommerce\Agreement
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function terminate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/orchestrated_commerce/agreements/%s/terminate', $id), $params, $opts);
    }
}
