<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Provisioning;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentMethodRequestService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a request for a customer to authorize a new payment method.
     *
     * @param null|array{livemode?: bool, payment_method_owner?: string, source_account?: string, source_customer?: string, source_payment_method?: string, usage_limits?: array{currency: string, max_amount: int, recurring_interval: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Provisioning\PaymentMethodRequest
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/provisioning/payment_method_requests', $params, $opts, [
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
        ]);
    }
}
