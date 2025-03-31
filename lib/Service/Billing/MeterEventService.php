<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class MeterEventService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a billing meter event.
     *
     * @param null|array{event_name: string, expand?: string[], identifier?: string, payload: \Stripe\StripeObject, timestamp?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\MeterEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/billing/meter_events', $params, $opts);
    }
}
