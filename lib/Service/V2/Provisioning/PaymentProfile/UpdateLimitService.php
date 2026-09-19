<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Provisioning\PaymentProfile;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class UpdateLimitService extends \Stripe\Service\AbstractService
{
    /**
     * Updates the usage limit on the payment profile for a provider.
     *
     * @param null|array{livemode?: bool, provider?: string, usage_limits: array{currency: string, max_amount: int, recurring_interval: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\PaymentProfile
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($params = null, $opts = null)
    {
        return $this->request('post', '/v2/provisioning/payment_profile/update_limit', $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'usage_limits' => [
                        'kind' => 'object',
                        'fields' => [
                            'max_amount' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'providers' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'usage_limits' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'max_amount' => [
                                            'kind' => 'int64_string',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'usage_limits' => [
                        'kind' => 'object',
                        'fields' => [
                            'max_amount' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
