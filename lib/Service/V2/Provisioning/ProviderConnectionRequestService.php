<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Provisioning;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ProviderConnectionRequestService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a new provider connection.
     *
     * @param null|array{code_challenge?: string, code_challenge_method?: string, configuration: array, project?: string, provider?: string, provider_name?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\ProviderConnectionRequest
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/provisioning/provider_connection_requests', $params, $opts);
    }

    /**
     * Retrieves a provider connection.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\ProviderConnectionRequest
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/provisioning/provider_connection_requests/%s', $id), $params, $opts);
    }

    /**
     * Submits additional information requested by the provider for a provider
     * connection.
     *
     * @param string $id
     * @param null|array{confirmation_secret?: string, information: array} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\ProviderConnectionRequest
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function submitInformation($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/provisioning/provider_connection_requests/%s/submit_information', $id), $params, $opts);
    }
}
