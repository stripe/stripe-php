<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\Intents;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ActionService extends \Stripe\Service\AbstractService
{
    /**
     * List Billing Intent Actions.
     *
     * @param string $id
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\IntentAction>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/intents/%s/actions', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'apply' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'invoice_discount_rule' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'percent_off' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'percent_off' => [
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
     * Retrieve a Billing Intent Action.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\IntentAction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/intents/%s/actions/%s', $parentId, $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'apply' => [
                        'kind' => 'object',
                        'fields' => [
                            'invoice_discount_rule' => [
                                'kind' => 'object',
                                'fields' => [
                                    'percent_off' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percent_off' => [
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
