<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @property BillSettings\VersionService $versions
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class BillSettingService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = ['versions' => BillSettings\VersionService::class];

    /**
     * List all BillSetting objects.
     *
     * @param null|array{limit?: int, lookup_keys?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\BillSetting>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/bill_settings', $params, $opts);
    }

    /**
     * Create a BillSetting object.
     *
     * @param null|array{calculation?: array{tax?: array{type: string}}, display_name?: string, invoice?: array{time_until_due?: array{interval: string, interval_count: int}}, invoice_rendering_template?: string, lookup_key?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\BillSetting
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/bill_settings', $params, $opts);
    }

    /**
     * Retrieve a BillSetting object by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\BillSetting
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/bill_settings/%s', $id), $params, $opts);
    }

    /**
     * Update fields on an existing BillSetting object.
     *
     * @param string $id
     * @param null|array{calculation?: array{tax?: array{type: string}}, display_name?: string, invoice?: array{time_until_due?: array{interval: string, interval_count: int}}, invoice_rendering_template?: string, live_version?: string, lookup_key?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\BillSetting
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/bill_settings/%s', $id), $params, $opts);
    }

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
