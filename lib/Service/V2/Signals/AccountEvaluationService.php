<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Signals;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountEvaluationService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a new account evaluation to request signal evaluations on an account,
     * customer, or inline account data.
     *
     * @param null|array{account_activity_details?: array{account_activity?: string, data?: array{login_attempt?: array{client_details: array{data?: array{ip: string, referrer?: string, user_agent?: string}, radar_session?: string}}, occurred_at?: string, registration_attempt?: array{client_details: array{data?: array{ip: string, referrer?: string, user_agent?: string}, radar_session?: string}}, type: string}}, account_details: array{account?: string, customer?: string, data?: array{defaults?: array{profile: array{business_url: string, doing_business_as?: string, product_description?: string}}}}, requested_signals: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Signals\AccountEvaluation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/signals/account_evaluations', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'evaluated_signals' => [
                        'kind' => 'object',
                        'fields' => [
                            'user_account_sharing' => [
                                'kind' => 'object',
                                'fields' => [
                                    'score' => ['kind' => 'decimal_string'],
                                ],
                            ],
                            'user_multi_accounting' => [
                                'kind' => 'object',
                                'fields' => [
                                    'score' => ['kind' => 'decimal_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Retrieves an AccountEvaluation by its ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Signals\AccountEvaluation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/signals/account_evaluations/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'evaluated_signals' => [
                        'kind' => 'object',
                        'fields' => [
                            'user_account_sharing' => [
                                'kind' => 'object',
                                'fields' => [
                                    'score' => ['kind' => 'decimal_string'],
                                ],
                            ],
                            'user_multi_accounting' => [
                                'kind' => 'object',
                                'fields' => [
                                    'score' => ['kind' => 'decimal_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
