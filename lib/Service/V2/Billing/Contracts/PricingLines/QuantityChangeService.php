<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\Contracts\PricingLines;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class QuantityChangeService extends \Stripe\Service\AbstractService
{
    /**
     * List quantity changes for a pricing line on a contract.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\ContractPricingLineQuantityChange>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allContractPricingLineQuantityChanges($parentId, $id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/contracts/%s/pricing_lines/%s/quantity_changes', $parentId, $id), $params, $opts, [
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
