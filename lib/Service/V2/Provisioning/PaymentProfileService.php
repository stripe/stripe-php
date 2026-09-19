<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Provisioning;

/**
 * @property PaymentProfile\UpdateLimitService $updateLimit
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentProfileService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'updateLimit' => PaymentProfile\UpdateLimitService::class,
    ];

    /**
     * Retrieves the payment profile for the current project.
     *
     * @param null|array{livemode?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\PaymentProfile
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->request('get', '/v2/provisioning/payment_profile', $params, $opts, [
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

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
