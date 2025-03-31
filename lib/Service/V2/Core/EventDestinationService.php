<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class EventDestinationService extends \Stripe\Service\AbstractService
{
    /**
     * Lists all event destinations.
     *
     * @param null|array{include?: string[], limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\EventDestination>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/core/event_destinations', $params, $opts);
    }

    /**
     * Create a new event destination.
     *
     * @param null|array{description?: string, enabled_events: string[], event_payload: string, events_from?: string[], include?: string[], metadata?: \Stripe\StripeObject, name: string, snapshot_api_version?: string, type: string, amazon_eventbridge?: array{aws_account_id: string, aws_region: string}, webhook_endpoint?: array{url: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\EventDestination
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\V2\EventDestination
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\V2\EventDestination
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\V2\EventDestination
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\V2\Event
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function ping($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/event_destinations/%s/ping', $id), $params, $opts);
    }

    /**
     * Retrieves the details of an event destination.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\EventDestination
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/event_destinations/%s', $id), $params, $opts);
    }

    /**
     * Update the details of an event destination.
     *
     * @param string $id
     * @param null|array{description?: string, enabled_events?: string[], include?: string[], metadata?: \Stripe\StripeObject, name?: string, webhook_endpoint?: array{url: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\EventDestination
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/event_destinations/%s', $id), $params, $opts);
    }
}
