<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\RateCards;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CustomPricingUnitOverageRateService extends \Stripe\Service\AbstractService
{
    /**
     * List all Rate Card Custom Pricing Unit Overage Rates on a Rate Card.
     *
     * @param string $id
     * @param null|array{limit?: int, rate_card_version?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\RateCardCustomPricingUnitOverageRate>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/rate_cards/%s/custom_pricing_unit_overage_rates', $id), $params, $opts);
    }

    /**
     * Create a Rate Card Custom Pricing Unit Overage Rate on a Rate Card.
     *
     * @param string $id
     * @param null|array{custom_pricing_unit: string, metadata?: array<string, string>, one_time_item: string, unit_amount: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCardCustomPricingUnitOverageRate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/rate_cards/%s/custom_pricing_unit_overage_rates', $id), $params, $opts);
    }

    /**
     * Delete a Rate Card Custom Pricing Unit Overage Rate from a Rate Card.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\DeletedObject
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v2/billing/rate_cards/%s/custom_pricing_unit_overage_rates/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieve a Rate Card Custom Pricing Unit Overage Rate from a Rate Card.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCardCustomPricingUnitOverageRate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/rate_cards/%s/custom_pricing_unit_overage_rates/%s', $parentId, $id), $params, $opts);
    }
}
