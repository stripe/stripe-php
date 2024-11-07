<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentRecordService extends \Stripe\Service\AbstractService
{
    /**
     * Report a new Payment Record. You may report a Payment Record as it is
     * initialized and later report updates through the other report_* methods, or
     * report Payment  Records in a terminal state directly, through this method.
     *
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord
     */
    public function reportPayment($params = null, $opts = null)
    {
        return $this->request('post', '/v1/payment_records/report_payment', $params, $opts);
    }

    /**
     * Report a new payment attempt on the specified Payment Record. A new payment
     * attempt can only be specified if all other payment attempts are canceled or
     * failed.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord
     */
    public function reportPaymentAttempt($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_records/%s/report_payment_attempt', $id), $params, $opts);
    }

    /**
     * Report that the most recent payment attempt on the specified Payment Record  was
     * canceled.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord
     */
    public function reportPaymentAttemptCanceled($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_records/%s/report_payment_attempt_canceled', $id), $params, $opts);
    }

    /**
     * Report that the most recent payment attempt on the specified Payment Record
     * failed or errored.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord
     */
    public function reportPaymentAttemptFailed($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_records/%s/report_payment_attempt_failed', $id), $params, $opts);
    }

    /**
     * Report that the most recent payment attempt on the specified Payment Record  was
     * guaranteed.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord
     */
    public function reportPaymentAttemptGuaranteed($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_records/%s/report_payment_attempt_guaranteed', $id), $params, $opts);
    }

    /**
     * Retrieves a Payment Record with the given ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentRecord
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_records/%s', $id), $params, $opts);
    }
}
