<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\CollectionSettings;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class VersionService extends \Stripe\Service\AbstractService
{
    /**
     * List all CollectionSettingVersions by CollectionSetting ID.
     *
     * @param string $id
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\CollectionSettingVersion>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/collection_settings/%s/versions', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'payment_method_options' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'card' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'mandate_options' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'amount' => [
                                                            'kind' => 'int64_string',
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
     * Retrieve a CollectionSetting Version by ID.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\CollectionSettingVersion
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/collection_settings/%s/versions/%s', $parentId, $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'payment_method_options' => [
                        'kind' => 'object',
                        'fields' => [
                            'card' => [
                                'kind' => 'object',
                                'fields' => [
                                    'mandate_options' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'amount' => [
                                                'kind' => 'int64_string',
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
