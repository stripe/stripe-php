<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class EventDestinationService extends \Stripe\Service\AbstractService
{
    /**
     * Lists all event destinations.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\EventDestination>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/core/event_destinations', $params, $opts);
    }

    /**
     * Create a new event destination.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\V2\EventDestination
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/event_destinations', $params, $opts);
    }

    /**
     * Delete an event destination.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\V2\EventDestination
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v2/core/event_destinations/%s', $id), $params, $opts);
    }

    /**
     * Disable an event destination.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\V2\EventDestination
     */
    public function disable($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/event_destinations/%s/disable', $id), $params, $opts);
    }

    /**
     * Enable an event destination.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\V2\EventDestination
     */
    public function enable($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/event_destinations/%s/enable', $id), $params, $opts);
    }

    /**
     * Send a `ping` event to an event destination.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\V2\Event
     */
    public function ping($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/event_destinations/%s/ping', $id), $params, $opts);
    }

    /**
     * Retrieves the details of an event destination.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\V2\EventDestination
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/event_destinations/%s', $id), $params, $opts);
    }

    /**
     * Update the details of an event destination.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\V2\EventDestination
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/event_destinations/%s', $id), $params, $opts);
    }
}
