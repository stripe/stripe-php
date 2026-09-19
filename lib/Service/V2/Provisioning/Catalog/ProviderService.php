<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Provisioning\Catalog;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ProviderService extends \Stripe\Service\AbstractService
{
    /**
     * Lists providers available in the catalog.
     *
     * @param null|array{catalog?: string, development?: bool, limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Provisioning\Provider>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/provisioning/catalog/providers', $params, $opts);
    }
}
