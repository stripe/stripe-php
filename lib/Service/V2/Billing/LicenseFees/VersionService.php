<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\LicenseFees;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class VersionService extends \Stripe\Service\AbstractService
{
    /**
     * List all versions of a License Fee object.
     *
     * @param string $id
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\LicenseFeeVersion>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/license_fees/%s/versions', $id), $params, $opts);
    }

    /**
     * Retrieve a License Fee Version object.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\LicenseFeeVersion
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/license_fees/%s/versions/%s', $parentId, $id), $params, $opts);
    }
}
