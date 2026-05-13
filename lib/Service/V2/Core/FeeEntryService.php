<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FeeEntryService extends \Stripe\Service\AbstractService
{
    /**
     * List FeeEntries optionally filtered by incurred_by, fee_batch, or
     * collection_record (at most one filter at a time).
     *
     * @param null|array{collection_record?: string, created?: string, created_gt?: string, created_gte?: string, created_lt?: string, created_lte?: string, fee_batch?: string, incurred_by?: string, limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Core\FeeEntry>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/core/fee_entries', $params, $opts);
    }

    /**
     * Retrieve a FeeEntry by id.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\FeeEntry
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/fee_entries/%s', $id), $params, $opts);
    }
}
