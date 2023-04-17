<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

class EventService extends \Stripe\Service\AbstractService
{
    /**
     * List events, going back up to 30 days. Each event data is rendered according to
     * Stripe API version at its creation time, specified in [event object](/docs/api/events/object) `api_version`
     * attribute (not according to your current Stripe API version or
     * `Stripe-Version` header).
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Event>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/events', $params, $opts);
    }

    /**
     * Retrieves the details of an event. Supply the unique identifier of the event,
     * which you might have received in a webhook.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Event
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/events/%s', $id), $params, $opts);
    }
}
