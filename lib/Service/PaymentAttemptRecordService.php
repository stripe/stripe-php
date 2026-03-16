<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentAttemptRecordService extends AbstractService
{
    /**
     * List all the Payment Attempt Records attached to the specified Payment Record.
     *
     * @param null|array{expand?: string[], limit?: int, payment_record: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\PaymentAttemptRecord>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/payment_attempt_records', $params, $opts);
    }

    /**
     * Report that the specified Payment Attempt Record was authenticated.
     *
     * @param string $id
     * @param null|array{authenticated_at?: int, expand?: string[], metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentAttemptRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reportAuthenticated($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_attempt_records/%s/report_authenticated', $id), $params, $opts);
    }

    /**
     * Report that the specified Payment Attempt Record was canceled.
     *
     * @param string $id
     * @param null|array{canceled_at?: int, expand?: string[], metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentAttemptRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reportCanceled($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_attempt_records/%s/report_canceled', $id), $params, $opts);
    }

    /**
     * Report that the specified Payment Attempt Record failed.
     *
     * @param string $id
     * @param null|array{expand?: string[], failed_at?: int, failure_code?: string, metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentAttemptRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reportFailed($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_attempt_records/%s/report_failed', $id), $params, $opts);
    }

    /**
     * Report that the specified Payment Attempt Record was guaranteed.
     *
     * @param string $id
     * @param null|array{expand?: string[], guaranteed_at?: int, metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentAttemptRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reportGuaranteed($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_attempt_records/%s/report_guaranteed', $id), $params, $opts);
    }

    /**
     * Report informational updates on the specified Payment Attempt Record.
     *
     * @param string $id
     * @param null|array{customer_details?: array{customer?: string, email?: string, name?: string, phone?: string}, description?: null|string, expand?: string[], metadata?: null|array<string, string>, shipping_details?: null|array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name?: string, phone?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentAttemptRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reportInformational($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_attempt_records/%s/report_informational', $id), $params, $opts);
    }

    /**
     * Report that the specified Payment Attempt Record was refunded.
     *
     * @param string $id
     * @param null|array{amount?: array{currency: string, value: int}, expand?: string[], initiated_at?: int, metadata?: null|array<string, string>, outcome: string, processor_details: array{custom?: array{refund_reference: string}, type: string}, refunded?: array{refunded_at: int}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentAttemptRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reportRefund($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_attempt_records/%s/report_refund', $id), $params, $opts);
    }

    /**
     * Retrieves a Payment Attempt Record with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentAttemptRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_attempt_records/%s', $id), $params, $opts);
    }
}
