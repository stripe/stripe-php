<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Radar;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountEvaluationService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a new <code>AccountEvaluation</code> object.
     *
     * @param null|array{expand?: string[], login_initiated?: array{client_device_metadata_details: array{radar_session: string}, customer: string}, registration_initiated?: array{client_device_metadata_details: array{radar_session: string}, customer?: string, customer_data?: array{email?: string, name?: string, phone?: string}}, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Radar\AccountEvaluation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/radar/account_evaluations', $params, $opts);
    }

    /**
     * Retrieves an <code>AccountEvaluation</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Radar\AccountEvaluation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/radar/account_evaluations/%s', $id), $params, $opts);
    }

    /**
     * Reports an event on an <code>AccountEvaluation</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[], type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Radar\AccountEvaluation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/radar/account_evaluations/%s/report_event', $id), $params, $opts);
    }
}
