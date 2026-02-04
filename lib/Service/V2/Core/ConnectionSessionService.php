<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ConnectionSessionService extends \Stripe\Service\AbstractService
{
    /**
     * Create a new ConnectionSession.
     *
     * @param null|array{account: string, allowed_connection_types?: string[], requested_access?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\ConnectionSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/connection_sessions', $params, $opts);
    }

    /**
     * Retrieve a ConnectionSession.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\ConnectionSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/connection_sessions/%s', $id), $params, $opts);
    }
}
