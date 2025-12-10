<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @property Intents\ActionService $actions
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class IntentService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = ['actions' => Intents\ActionService::class];

    /**
     * List Billing Intents.
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
     * Cancel a Billing Intent.
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
     * Commit a Billing Intent.
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
     * Create a Billing Intent.
     *
     * @param null|array{actions: array{type: string, apply?: array{type: string, invoice_discount_rule?: array{applies_to: string, type: string, percent_off?: array{maximum_applications: array{type: string}, percent_off: string}}}, deactivate?: array{collect_at?: string, effective_at?: array{timestamp?: string, type: string}, pricing_plan_subscription_details: array{overrides?: array{partial_period_behaviors: array{type: string, license_fee?: array{credit_proration_behavior: string}}[]}, pricing_plan_subscription: string}, type: string}, modify?: array{collect_at?: string, effective_at?: array{timestamp?: string, type: string}, pricing_plan_subscription_details: array{component_configurations?: array{quantity?: int, lookup_key?: string, pricing_plan_component?: string}[], new_pricing_plan?: string, new_pricing_plan_version?: string, overrides?: array{partial_period_behaviors: array{type: string, license_fee?: array{credit_proration_behavior: string, debit_proration_behavior: string}}[]}, pricing_plan_subscription: string}, type: string}, remove?: array{type: string, invoice_discount_rule?: string}, subscribe?: array{collect_at?: string, effective_at?: array{timestamp?: string, type: string}, type: string, pricing_plan_subscription_details?: array{component_configurations?: array{quantity?: int, lookup_key?: string, pricing_plan_component?: string}[], metadata?: array<string, string>, overrides?: array{partial_period_behaviors: array{type: string, license_fee?: array{debit_proration_behavior: string}}[]}, pricing_plan: string, pricing_plan_version: string}, v1_subscription_details?: array{description?: string, items: array{metadata?: array<string, string>, price: string, quantity?: int}[], metadata?: array<string, string>}}}[], currency: string, cadence?: string} $params
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
     * Release a Billing Intent.
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
     * Reserve a Billing Intent.
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
     * Retrieve a Billing Intent.
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

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
