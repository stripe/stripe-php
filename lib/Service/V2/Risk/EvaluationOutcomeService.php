<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Risk;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class EvaluationOutcomeService extends \Stripe\Service\AbstractService
{
    /**
     * Lists all matching historical evaluation outcomes, newest first.
     *
     * @param null|array{account_details: array{account?: string}, limit?: int, origin?: string, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Risk\EvaluationOutcome>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/risk/evaluation_outcomes', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'delinquency' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'supporting_signals' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'merchant_delinquency' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'probability' => [
                                                            'kind' => 'decimal_string',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Retrieves an evaluation outcome by its ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Risk\EvaluationOutcome
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/risk/evaluation_outcomes/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'delinquency' => [
                        'kind' => 'object',
                        'fields' => [
                            'supporting_signals' => [
                                'kind' => 'object',
                                'fields' => [
                                    'merchant_delinquency' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'probability' => [
                                                'kind' => 'decimal_string',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
