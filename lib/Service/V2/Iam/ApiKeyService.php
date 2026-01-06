<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Iam;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ApiKeyService extends \Stripe\Service\AbstractService
{
    /**
     * List all API keys of an account.
     *
     * @param null|array{include_expired?: bool, limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Iam\ApiKey>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/iam/api_keys', $params, $opts);
    }

    /**
     * Create an API key. To create a secret key in livemode, a public key for
     * encryption must be provided.
     *
     * @param null|array{name?: string, note?: string, public_key?: array{id?: string, pem_key?: array{algorithm: string, data: string}}, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Iam\ApiKey
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/iam/api_keys', $params, $opts);
    }

    /**
     * Expire an API key. The specified key becomes invalid immediately.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Iam\ApiKey
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function expire($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/iam/api_keys/%s/expire', $id), $params, $opts);
    }

    /**
     * Retrieve an API key. For livemode secret keys, secret tokens are only returned
     * on creation, and never returned here.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Iam\ApiKey
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/iam/api_keys/%s', $id), $params, $opts);
    }

    /**
     * Rotate an API key. A new key with the same properties is created and returned.
     * The existing key is expired immediately, unless an expiry time is specified.
     *
     * @param string $id
     * @param null|array{expire_current_key_in_minutes?: int, public_key?: array{id?: string, pem_key?: array{algorithm: string, data: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Iam\ApiKey
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function rotate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/iam/api_keys/%s/rotate', $id), $params, $opts);
    }

    /**
     * Update an API key. Only parameters that are specified in the request will be
     * updated.
     *
     * @param string $id
     * @param null|array{name?: string, note?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Iam\ApiKey
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/iam/api_keys/%s', $id), $params, $opts);
    }
}
