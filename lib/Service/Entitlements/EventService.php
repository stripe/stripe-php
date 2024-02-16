<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Entitlements;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
/**
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class EventService extends \Stripe\Service\AbstractService
{
    /**
     * Create an entitlement event manually, outside of the entitlement events
     * automatically created by Stripe lifecycle events.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Entitlements\Event
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/entitlements/events', $params, $opts);
    }
}
