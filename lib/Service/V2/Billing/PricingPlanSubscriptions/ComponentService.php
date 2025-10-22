<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\PricingPlanSubscriptions;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ComponentService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieve a Pricing Plan Subscription's components.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\PricingPlanSubscriptionComponents
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/pricing_plan_subscriptions/%s/components', $id), $params, $opts);
    }
}
