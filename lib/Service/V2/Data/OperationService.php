<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Data;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OperationService extends \Stripe\Service\AbstractService
{
    /**
     * Resolve a natural-language query into ranked public analytical resources
     * (schemas, reports, and metrics) with execution context.
     *
     * @param null|array{catalogs?: string[], limit?: int, page?: string, query: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Data\SearchResultList
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function search($params = null, $opts = null)
    {
        return $this->request('post', '/v2/data/operations/search', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'relevance_score' => [
                                    'kind' => 'decimal_string',
                                ],
                                'catalog' => [
                                    'kind' => 'discriminatedUnion',
                                    'discriminator' => 'catalog',
                                    'variants' => [
                                        'metrics' => [
                                            'kind' => 'object',
                                            'fields' => [],
                                        ],
                                        'reports' => [
                                            'kind' => 'object',
                                            'fields' => [],
                                        ],
                                        'schemas' => [
                                            'kind' => 'object',
                                            'fields' => [],
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
