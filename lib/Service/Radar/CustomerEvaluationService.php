<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Radar;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CustomerEvaluationService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a new <code>CustomerEvaluation</code> object.
     *
     * @param null|array{evaluation_context: array{client_details?: array{radar_session: string}, customer_details?: array{customer?: string, customer_data?: array{email?: string, name?: string, phone?: string}}, type: string}[], event_type: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Radar\CustomerEvaluation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/radar/customer_evaluations', $params, $opts);
    }
}
