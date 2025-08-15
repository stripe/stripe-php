<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class IntentService extends \Stripe\Service\AbstractService
{
    /**
     * List BillingIntents.
     *
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\Intent>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/intents', $params, $opts);
    }

    /**
     * Cancel a BillingIntent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/intents/%s/cancel', $id), $params, $opts);
    }

    /**
     * Commit a BillingIntent.
     *
     * @param string $id
     * @param null|array{payment_intent?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function commit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/intents/%s/commit', $id), $params, $opts);
    }

    /**
     * Create a BillingIntent.
     *
     * @param null|array{actions: array{type: string, apply?: array{type: string, invoice_discount_rule?: array{applies_to: string, type: string, percent_off?: array{maximum_applications: array{type: string}, percent_off: string}}}, deactivate?: array{pricing_plan_subscription_details: array{pricing_plan_subscription: string}, proration_behavior: string, type: string}, modify?: array{pricing_plan_subscription_details: array{component_configurations?: array{quantity?: int, lookup_key?: string, pricing_plan_component?: string}[], new_pricing_plan?: string, new_pricing_plan_version?: string, pricing_plan_subscription: string}, proration_behavior: string, type: string}, remove?: array{type: string, invoice_discount_rule?: string}, subscribe?: array{proration_behavior: string, type: string, pricing_plan_subscription_details?: array{component_configurations?: array{quantity?: int, lookup_key?: string, pricing_plan_component?: string}[], metadata?: array<string, string>, pricing_plan: string, pricing_plan_version: string}}}[], currency: string, effective_at: string, cadence?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/intents', $params, $opts);
    }

    /**
     * Release a BillingIntent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function releaseReservation($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/intents/%s/release_reservation', $id), $params, $opts);
    }

    /**
     * Reserve a BillingIntent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reserve($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/intents/%s/reserve', $id), $params, $opts);
    }

    /**
     * Retrieve a BillingIntent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/intents/%s', $id), $params, $opts);
    }
}
