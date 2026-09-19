<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Provisioning;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ProviderConnectionService extends \Stripe\Service\AbstractService
{
    /**
     * Lists the provider connections for the account.
     *
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Provisioning\ProviderConnection>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/provisioning/provider_connections', $params, $opts);
    }

    /**
     * Unlinks a provider connection so it can no longer be used to create resources.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\ProviderConnection
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function unlink($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/provisioning/provider_connections/%s/unlink', $id), $params, $opts);
    }
}
