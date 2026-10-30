<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement\RewardPrograms;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class RuleService extends \Stripe\Service\AbstractService
{
    /**
     * Activates a RewardProgramRule. At most one RewardProgramRule may be active per
     * RewardProgram at a time. Idempotent: calling this on a RewardProgramRule that is
     * already active returns 200 with the current object unchanged.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgramRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function activate($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/reward_programs/%s/rules/%s/activate', $parentId, $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'reward' => [
                        'kind' => 'object',
                        'fields' => [
                            'cashback' => [
                                'kind' => 'object',
                                'fields' => [
                                    'rate' => ['kind' => 'decimal_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Returns a list of RewardProgramRules for a RewardProgram.
     *
     * @param string $id
     * @param null|array{limit?: int, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\RewardProgramRule>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/money_management/reward_programs/%s/rules', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'reward' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'cashback' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'rate' => [
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
        ]);
    }

    /**
     * Creates a new RewardProgramRule under the given RewardProgram.
     * RewardProgramRules are inactive by default on creation; use
     * ActivateRewardProgramRule to make them eligible for reward evaluation.
     *
     * @param string $id
     * @param null|array{condition?: array{card_spend?: array{merchant_category_codes?: array{excluded: string[], included: string[]}}}, name: string, reward: array{cashback: array{rate: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgramRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/reward_programs/%s/rules', $id), $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'reward' => [
                        'kind' => 'object',
                        'fields' => [
                            'cashback' => [
                                'kind' => 'object',
                                'fields' => [
                                    'rate' => ['kind' => 'decimal_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'reward' => [
                        'kind' => 'object',
                        'fields' => [
                            'cashback' => [
                                'kind' => 'object',
                                'fields' => [
                                    'rate' => ['kind' => 'decimal_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Deactivates a RewardProgramRule. Idempotent: calling this on a RewardProgramRule
     * that is already inactive returns 200 with the current object unchanged.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgramRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deactivate($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/reward_programs/%s/rules/%s/deactivate', $parentId, $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'reward' => [
                        'kind' => 'object',
                        'fields' => [
                            'cashback' => [
                                'kind' => 'object',
                                'fields' => [
                                    'rate' => ['kind' => 'decimal_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Retrieves the details of an existing RewardProgramRule.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgramRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/reward_programs/%s/rules/%s', $parentId, $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'reward' => [
                        'kind' => 'object',
                        'fields' => [
                            'cashback' => [
                                'kind' => 'object',
                                'fields' => [
                                    'rate' => ['kind' => 'decimal_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Updates the mutable fields of an existing RewardProgramRule. Use
     * ActivateRewardProgramRule / DeactivateRewardProgramRule to change the
     * RewardProgramRule's status.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{condition?: array{card_spend?: array{merchant_category_codes?: array{excluded: string[], included: string[]}}}, name?: string, reward?: array{cashback: array{rate: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\RewardProgramRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/reward_programs/%s/rules/%s', $parentId, $id), $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'reward' => [
                        'kind' => 'object',
                        'fields' => [
                            'cashback' => [
                                'kind' => 'object',
                                'fields' => [
                                    'rate' => ['kind' => 'decimal_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'reward' => [
                        'kind' => 'object',
                        'fields' => [
                            'cashback' => [
                                'kind' => 'object',
                                'fields' => [
                                    'rate' => ['kind' => 'decimal_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
