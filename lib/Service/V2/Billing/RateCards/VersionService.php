<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\RateCards;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class VersionService extends \Stripe\Service\AbstractService
{
    /**
     * List the versions of a Rate Card object. Results are sorted in reverse
     * chronological order (most recent first).
     *
     * @param string $id
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\RateCardVersion>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/rate_cards/%s/versions', $id), $params, $opts);
    }

    /**
     * Retrieve a specific version of a Rate Card object.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCardVersion
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/rate_cards/%s/versions/%s', $parentId, $id), $params, $opts);
    }
}
