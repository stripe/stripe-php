<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @property LicenseFees\VersionService $versions
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class LicenseFeeService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = ['versions' => LicenseFees\VersionService::class];

    /**
     * List all License Fee objects.
     *
     * @param null|array{licensed_item?: string, limit?: int, lookup_keys: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\LicenseFee>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/license_fees', $params, $opts);
    }

    /**
     * Create a License Fee object.
     *
     * @param null|array{currency: string, display_name: string, licensed_item: string, lookup_key?: string, metadata?: array<string, string>, service_interval: string, service_interval_count: int, tax_behavior: string, tiering_mode?: string, tiers?: array{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}[], transform_quantity?: array{divide_by: int, round: string}, unit_amount?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\LicenseFee
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/license_fees', $params, $opts);
    }

    /**
     * Retrieve a License Fee object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\LicenseFee
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/license_fees/%s', $id), $params, $opts);
    }

    /**
     * Update a License Fee object.
     *
     * @param string $id
     * @param null|array{display_name?: string, live_version?: string, lookup_key?: string, metadata?: array<string, null|string>, tiering_mode?: string, tiers?: array{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}[], transform_quantity?: array{divide_by: int, round: string}, unit_amount?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\LicenseFee
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/license_fees/%s', $id), $params, $opts);
    }

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
