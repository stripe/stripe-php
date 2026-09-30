<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Data;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SchemaService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of schemas describing the tables available to query.
     *
     * @param null|array{dataset?: string, include?: string[], limit?: int, name?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Data\Schema>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/data/schemas', $params, $opts);
    }

    /**
     * Retrieves the schema for a particular table.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Data\Schema
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/data/schemas/%s', $id), $params, $opts);
    }
}
