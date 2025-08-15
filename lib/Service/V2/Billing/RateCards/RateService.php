<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\RateCards;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class RateService extends \Stripe\Service\AbstractService
{
    /**
     * List all Rates associated with a RateCard for a specific version (defaults to
     * latest). Rates remain active for all subsequent versions until a new Rate is
     * created for the same MeteredItem.
     *
     * @param string $id
     * @param null|array{limit?: int, metered_item?: string, rate_card_version?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\RateCardRate>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/rate_cards/%s/rates', $id), $params, $opts);
    }

    /**
     * Set the rate for a MeteredItem on the latest version of a RateCard object. This
     * will create a new RateCard version if the MeteredItem already has a rate on the
     * RateCard.
     *
     * @param string $id
     * @param null|array{custom_pricing_unit_amount?: array{id: string, value: string}, metadata?: array<string, string>, metered_item?: string, price?: string, tiering_mode?: string, tiers?: array{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}[], transform_quantity?: array{divide_by: int, round: string}, unit_amount?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCardRate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/rate_cards/%s/rates', $id), $params, $opts);
    }

    /**
     * Remove an existing Rate from a RateCard. This will create a new RateCard version
     * without that rate.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCardRate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v2/billing/rate_cards/%s/rates/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieve a Rate object.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCardRate
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/rate_cards/%s/rates/%s', $parentId, $id), $params, $opts);
    }
}
