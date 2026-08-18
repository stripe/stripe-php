<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentPlanService extends AbstractService
{
    /**
     * Returns a list of payment plans.
     *
     * @param null|array{ending_before?: string, expand?: string[], invoice?: string, limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\PaymentPlan>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/payment_plans', $params, $opts);
    }

    /**
     * Creates a payment plan that splits a single invoice obligation into installments
     * with their own due dates and amounts.
     *
     * @param null|array{collects_on: array{invoice_details: array{invoice: string}, type: string}[], expand?: string[], metadata?: array<string, string>, schedule: array{amounts_due: array{amounts: array{description?: string, due_date?: array{absolute?: int, relative?: array{count: int, interval: string}, type: string}, fixed_amount?: array{amount: int, currency: string}, id?: string, percentage?: float, type: string}[]}, type: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentPlan
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/payment_plans', $params, $opts);
    }

    /**
     * Retrieves the payment plan with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentPlan
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_plans/%s', $id), $params, $opts);
    }

    /**
     * Updates the schedule or metadata of an existing payment plan. Only unpaid
     * installments can be updated.
     *
     * @param string $id
     * @param null|array{expand?: string[], metadata?: array<string, string>, schedule?: array{amounts_due: array{amounts: array{description?: string, due_date?: array{absolute?: int, relative?: array{count: int, interval: string}, type: string}, fixed_amount?: array{amount: int, currency: string}, id?: string, percentage?: float, type: string}[]}, type: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PaymentPlan
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_plans/%s', $id), $params, $opts);
    }
}
