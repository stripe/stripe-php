<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Orchestration;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentAttemptService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves orchestration information for the given payment attempt record (e.g.
     * return url).
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Orchestration\PaymentAttempt
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/orchestration/payment_attempts/%s', $id), $params, $opts);
    }
}
