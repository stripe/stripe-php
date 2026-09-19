<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Provisioning;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ResourceService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a new provider resource.
     *
     * @param null|array{catalog?: string, configuration: array, environment?: string, livemode?: bool, name?: string, project?: string, provider: string, service_ref: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\Resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/provisioning/resources', $params, $opts);
    }

    /**
     * Links an existing provider resource to a project or account.
     *
     * @param null|array{catalog?: string, environment?: string, livemode?: bool, project?: string, provider: string, service_ref: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\Resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function link($params = null, $opts = null)
    {
        return $this->request('post', '/v2/provisioning/resources/link', $params, $opts);
    }

    /**
     * Removes a resource.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\Resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function remove($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/provisioning/resources/%s/remove', $id), $params, $opts);
    }

    /**
     * Retrieves a provider resource.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\Resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/provisioning/resources/%s', $id), $params, $opts);
    }

    /**
     * Rotates a resource's credentials.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\Resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function rotateCredentials($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/provisioning/resources/%s/rotate_credentials', $id), $params, $opts);
    }

    /**
     * Submits additional information requested by the provider for a resource.
     *
     * @param string $id
     * @param null|array{submitted_information: array} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\Resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function submitInformation($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/provisioning/resources/%s/submit_information', $id), $params, $opts);
    }

    /**
     * Unlinks a resource without removing it from the provider.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\Resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function unlink($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/provisioning/resources/%s/unlink', $id), $params, $opts);
    }

    /**
     * Updates a resource's configuration or service.
     *
     * @param string $id
     * @param null|array{catalog?: string, configuration?: array, service_ref?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\Resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/provisioning/resources/%s', $id), $params, $opts);
    }
}
