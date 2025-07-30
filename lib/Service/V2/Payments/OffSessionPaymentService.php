<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Payments;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OffSessionPaymentService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of OffSessionPayments matching a filter.
     *
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Payments\OffSessionPayment>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/payments/off_session_payments', $params, $opts);
    }

    /**
     * Cancel an OffSessionPayment that has previously been created.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\OffSessionPayment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/payments/off_session_payments/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates an OffSessionPayment object.
     *
     * @param null|array{amount: \Stripe\StripeObject, cadence: string, customer: string, metadata: array<string, string>, on_behalf_of?: string, payment_method: string, retry_details?: array{retry_strategy: string}, statement_descriptor?: string, statement_descriptor_suffix?: string, test_clock?: string, transfer_data?: array{amount?: int, destination: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\OffSessionPayment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/payments/off_session_payments', $params, $opts);
    }

    /**
     * Retrieves the details of an OffSessionPayment that has previously been created.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Payments\OffSessionPayment
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/payments/off_session_payments/%s', $id), $params, $opts);
    }
}
