<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Sigma;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SchemaService extends \Stripe\Service\AbstractService
{
    /**
     * Lists the schemas available to the authorized merchant in Stripe’s data products.
     *
     * @param null|array{expand?: string[], product?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Sigma\Schema>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/sigma/schemas', $params, $opts);
    }
}
