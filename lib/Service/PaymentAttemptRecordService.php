<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentAttemptRecordService extends \Stripe\Service\AbstractService
{
    /**
     * List all the Payment Attempt Records attached to the specified Payment Record.
     *
     * @param null|array{expand?: string[], payment_record: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\PaymentAttemptRecord>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/payment_attempt_records', $params, $opts);
    }

    /**
     * Retrieves a Payment Attempt Record with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentAttemptRecord
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_attempt_records/%s', $id), $params, $opts);
    }
}
