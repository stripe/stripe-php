<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class MeterEventStreamService extends \Stripe\Service\AbstractService
{
    /**
     * Sends a meter event for asynchronous processing. Supports higher rate limits.
     * Requires a meter event session for authentication.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\TemporarySessionExpiredException
     *
     * @return void
     */
    public function create($params = null, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        if (!isset($opts->apiBase)) {
            $opts->apiBase = $this->getClient()->getMeterEventsBase();
        }
        $this->request('post', '/v2/billing/meter_event_stream', $params, $opts);
    }
}
