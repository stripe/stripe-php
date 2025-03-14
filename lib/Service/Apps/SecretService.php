<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Apps;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SecretService extends \Stripe\Service\AbstractService
{
    /**
     * List all secrets stored on the given scope.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, scope: array{type: string, user?: string}, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Apps\Secret>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/apps/secrets', $params, $opts);
    }

    /**
     * Create or replace a secret in the secret store.
     *
     * @param null|array{expand?: string[], expires_at?: int, name: string, payload: string, scope: array{type: string, user?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Apps\Secret
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/apps/secrets', $params, $opts);
    }

    /**
     * Deletes a secret from the secret store by name and scope.
     *
     * @param null|array{expand?: string[], name: string, scope: array{type: string, user?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Apps\Secret
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deleteWhere($params = null, $opts = null)
    {
        return $this->request('post', '/v1/apps/secrets/delete', $params, $opts);
    }

    /**
     * Finds a secret in the secret store by name and scope.
     *
     * @param null|array{expand?: string[], name: string, scope: array{type: string, user?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Apps\Secret
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function find($params = null, $opts = null)
    {
        return $this->request('get', '/v1/apps/secrets/find', $params, $opts);
    }
}
