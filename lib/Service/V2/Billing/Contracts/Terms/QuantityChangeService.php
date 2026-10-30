<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\Contracts\Terms;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class QuantityChangeService extends \Stripe\Service\AbstractService
{
    /**
     * List quantity changes for a licensed recurring-price term.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\ContractTermQuantityChange>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allContractTermQuantityChanges($parentId, $id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/contracts/%s/terms/%s/quantity_changes', $parentId, $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'quantity' => ['kind' => 'decimal_string'],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
