<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\Contracts\LicensePricing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class QuantityChangeService extends \Stripe\Service\AbstractService
{
    /**
     * List license quantity changes for a contract given a license pricing ID.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\ContractLicensePricingQuantityChange>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allQuantityChanges($parentId, $id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/contracts/%s/license_pricing/%s/quantity_changes', $parentId, $id), $params, $opts);
    }
}
