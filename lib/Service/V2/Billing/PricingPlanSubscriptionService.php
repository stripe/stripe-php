<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PricingPlanSubscriptionService extends \Stripe\Service\AbstractService
{
    /**
     * List all Pricing Plan Subscription objects.
     *
     * @param null|array{billing_cadence?: string, limit?: int, payer?: array{customer?: string, type: string}, pricing_plan?: string, pricing_plan_version?: string, servicing_status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\PricingPlanSubscription>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/pricing_plan_subscriptions', $params, $opts);
    }

    /**
     * Retrieve a Pricing Plan Subscription object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\PricingPlanSubscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/pricing_plan_subscriptions/%s', $id), $params, $opts);
    }
}
