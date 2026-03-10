<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Radar;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class IssuingAuthorizationEvaluationService extends \Stripe\Service\AbstractService
{
    /**
     * Request a fraud risk assessment from Stripe for an Issuing card authorization.
     *
     * @param null|array{authorization_details: array{amount: int, authorization_method?: string, currency: string, entry_mode?: string, entry_mode_raw_code?: string, initiated_at: int, point_of_sale_condition?: string, point_of_sale_condition_raw_code?: string, reference: string}, card_details: array{bin: string, bin_country?: string, card_type: string, created_at: int, last4?: string, reference: string}, cardholder_details?: array{created_at?: int, reference?: string}, expand?: string[], merchant_details: array{category_code: string, country?: string, name: string, network_id: string, terminal_id?: string}, metadata?: array<string, string>, network_details?: array{acquiring_institution_id?: string, routed_network?: string}, token_details?: array{created_at?: int, reference?: string, wallet?: string}, verification_details?: array{three_d_secure_result?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Radar\IssuingAuthorizationEvaluation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/radar/issuing_authorization_evaluations', $params, $opts);
    }
}
