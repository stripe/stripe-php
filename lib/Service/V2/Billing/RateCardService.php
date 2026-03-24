<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @property RateCards\CustomPricingUnitOverageRateService $customPricingUnitOverageRates
 * @property RateCards\RateService $rates
 * @property RateCards\VersionService $versions
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class RateCardService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'customPricingUnitOverageRates' => RateCards\CustomPricingUnitOverageRateService::class,
        'rates' => RateCards\RateService::class,
        'versions' => RateCards\VersionService::class,
    ];

    /**
     * List all Rate Card objects.
     *
     * @param null|array{active?: bool, limit?: int, lookup_keys?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\RateCard>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/rate_cards', $params, $opts);
    }

    /**
     * Create a Rate Card object.
     *
     * @param null|array{currency: string, display_name: string, lookup_key?: string, metadata?: array<string, string>, service_interval: string, service_interval_count: int, tax_behavior: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCard
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/rate_cards', $params, $opts);
    }

    /**
     * Creates, updates, and/or deletes multiple Rates on a Rate Card atomically.
     *
     * @param string $id
     * @param null|array{rates_to_create: array{metadata?: array<string, string>, metered_item?: string, metered_item_data?: array{display_name: string, lookup_key?: string, meter: string, meter_segment_conditions: array{dimension: string, value: string}[], unit_label?: string}, tiering_mode?: string, tiers?: array{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}[], transform_quantity?: array{divide_by: int, round: string}, unit_amount?: string}[], rates_to_delete: array{id: string}[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCardVersion
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function modifyRates($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/rate_cards/%s/modify_rates', $id), $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'rates_to_create' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'tiers' => [
                                    'kind' => 'array',
                                    'element' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'up_to_decimal' => [
                                                'kind' => 'decimal_string',
                                            ],
                                        ],
                                    ],
                                ],
                                'transform_quantity' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'divide_by' => [
                                            'kind' => 'int64_string',
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
     * Retrieve the latest version of a Rate Card object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCard
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/rate_cards/%s', $id), $params, $opts);
    }

    /**
     * Update a Rate Card object.
     *
     * @param string $id
     * @param null|array{active?: bool, display_name?: string, live_version?: string, lookup_key?: string, metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCard
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/rate_cards/%s', $id), $params, $opts);
    }

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
