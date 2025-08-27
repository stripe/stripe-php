<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class MeteredItemService extends \Stripe\Service\AbstractService
{
    /**
     * List all Metered Item objects in reverse chronological order of creation.
     *
     * @param null|array{limit?: int, lookup_keys?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\MeteredItem>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/metered_items', $params, $opts);
    }

    /**
     * Create a Metered Item object.
     *
     * @param null|array{display_name: string, invoice_presentation_dimensions?: string[], lookup_key?: string, metadata?: array<string, string>, meter: string, meter_segment_conditions?: array{dimension: string, value: string}[], tax_details?: array{tax_code: string}, unit_label?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\MeteredItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/metered_items', $params, $opts);
    }

    /**
     * Retrieve a Metered Item object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\MeteredItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/metered_items/%s', $id), $params, $opts);
    }

    /**
     * Update a Metered Item object. At least one of the fields is required.
     *
     * @param string $id
     * @param null|array{display_name?: string, lookup_key?: null|string, metadata?: array<string, null|string>, tax_details?: array{tax_code: string}, unit_label?: null|string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\MeteredItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/metered_items/%s', $id), $params, $opts);
    }
}
