<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class LicensedItemService extends \Stripe\Service\AbstractService
{
    /**
     * List all Licensed Item objects in reverse chronological order of creation.
     *
     * @param null|array{limit?: int, lookup_keys?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\LicensedItem>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/licensed_items', $params, $opts);
    }

    /**
     * Create a Licensed Item object.
     *
     * @param null|array{display_name: string, lookup_key?: string, metadata?: array<string, string>, tax_details?: array{tax_code: string}, unit_label?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\LicensedItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/licensed_items', $params, $opts);
    }

    /**
     * Retrieve a Licensed Item object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\LicensedItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/licensed_items/%s', $id), $params, $opts);
    }

    /**
     * Update a Licensed Item object. At least one of the fields is required.
     *
     * @param string $id
     * @param null|array{display_name?: string, lookup_key?: string, metadata?: array<string, null|string>, tax_details?: array{tax_code: string}, unit_label?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\LicensedItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/licensed_items/%s', $id), $params, $opts);
    }
}
