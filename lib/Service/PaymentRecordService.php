<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentRecordService extends AbstractService
{
    /**
     * Report a new Payment Record. You may report a Payment Record as it is
     * initialized and later report updates through the other report_* methods, or
     * report Payment  Records in a terminal state directly, through this method.
     *
     * @param null|array{amount_requested: array{currency: string, value: int}, customer_details?: array{customer?: string, email?: string, name?: string, phone?: string}, customer_presence?: string, description?: string, expand?: string[], failed?: array{failed_at: int}, guaranteed?: array{guaranteed_at: int}, initiated_at: int, metadata?: null|array<string, string>, outcome?: string, payment_method_details: array{billing_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, custom?: array{display_name?: string, type?: string}, payment_method?: string, type?: string}, processor_details?: array{custom?: array{payment_reference: string}, type: string}, shipping_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name?: string, phone?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{description?: string, expand?: string[], failed?: array{failed_at: int}, guaranteed?: array{guaranteed_at: int}, initiated_at: int, metadata?: null|array<string, string>, outcome?: string, payment_method_details?: array{billing_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, custom?: array{display_name?: string, type?: string}, payment_method?: string, type?: string}, shipping_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name?: string, phone?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{canceled_at: int, expand?: string[], metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{expand?: string[], failed_at: int, metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{expand?: string[], guaranteed_at: int, metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reportPaymentAttemptGuaranteed($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_records/%s/report_payment_attempt_guaranteed', $id), $params, $opts);
    }

    /**
     * Report informational updates on the specified Payment Record.
     *
     * @param string $id
     * @param null|array{customer_details?: array{customer?: string, email?: string, name?: string, phone?: string}, description?: null|string, expand?: string[], metadata?: null|array<string, string>, shipping_details?: null|array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name?: string, phone?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reportPaymentAttemptInformational($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_records/%s/report_payment_attempt_informational', $id), $params, $opts);
    }

    /**
     * Report that the most recent payment attempt on the specified Payment Record  was
     * refunded.
     *
     * @param string $id
     * @param null|array{amount?: array{currency: string, value: int}, expand?: string[], initiated_at?: int, metadata?: null|array<string, string>, outcome: string, processor_details: array{custom?: array{refund_reference: string}, type: string}, refunded: array{refunded_at: int}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reportRefund($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_records/%s/report_refund', $id), $params, $opts);
    }

    /**
     * Retrieves a Payment Record with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentRecord
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_records/%s', $id), $params, $opts);
    }
}
