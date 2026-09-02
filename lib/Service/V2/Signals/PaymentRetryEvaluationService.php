<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Signals;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentRetryEvaluationService extends \Stripe\Service\AbstractService
{
    /**
     * Cancels an active payment retry evaluation.
     *
     * @param string $id
     * @param null|array{cancellation_reason?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Signals\PaymentRetryEvaluation
     *
     * @throws \Stripe\Exception\CannotProceedException
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/signals/payment_retry_evaluations/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates a new payment retry evaluation for a failed payment.
     *
     * @param null|array{payment_intent?: string, payment_record?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Signals\PaymentRetryEvaluation
     *
     * @throws \Stripe\Exception\AlreadyExistsException
     * @throws \Stripe\Exception\CannotProceedException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/signals/payment_retry_evaluations', $params, $opts);
    }

    /**
     * Retrieves a payment retry evaluation by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Signals\PaymentRetryEvaluation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/signals/payment_retry_evaluations/%s', $id), $params, $opts);
    }

    /**
     * Updates an active payment retry evaluation with a replacement payment
     * identifier.
     *
     * @param string $id
     * @param null|array{payment_intent?: string, payment_record?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Signals\PaymentRetryEvaluation
     *
     * @throws \Stripe\Exception\AlreadyExistsException
     * @throws \Stripe\Exception\CannotProceedException
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/signals/payment_retry_evaluations/%s', $id), $params, $opts);
    }
}
