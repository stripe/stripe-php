<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class MeterEventSessionService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a meter event session to send usage on the high-throughput meter event
     * stream. Authentication tokens are only valid for 15 minutes, so you will need to
     * create a new meter event session when your token expires.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\V2\Billing\MeterEventSession
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/meter_event_session', $params, $opts);
    }
}
