<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\BillingPortal;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ConfigurationService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of configurations that describe the functionality of the customer
     * portal.
     *
     * @param null|array{active?: bool, ending_before?: string, expand?: string[], is_default?: bool, limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\BillingPortal\Configuration>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/billing_portal/configurations', $params, $opts);
    }

    /**
     * Creates a configuration that describes the functionality and behavior of a
     * PortalSession.
     *
     * @param null|array{business_profile?: array{headline?: null|string, privacy_policy_url?: string, terms_of_service_url?: string}, default_return_url?: null|string, expand?: string[], features: array{customer_update?: array{allowed_updates?: null|string[], enabled: bool}, invoice_history?: array{enabled: bool}, payment_method_update?: array{enabled: bool, payment_method_configuration?: null|string}, subscription_cancel?: array{cancellation_reason?: array{enabled: bool, options: null|string[]}, enabled: bool, mode?: string, proration_behavior?: string}, subscription_update?: array{default_allowed_updates?: null|string[], enabled: bool, products?: null|array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, prices: string[], product: string}[], proration_behavior?: string, schedule_at_period_end?: array{conditions?: array{type: string}[]}, trial_update_behavior?: string}}, login_page?: array{enabled: bool}, metadata?: array<string, string>, name?: null|string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BillingPortal\Configuration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/billing_portal/configurations', $params, $opts);
    }

    /**
     * Retrieves a configuration that describes the functionality of the customer
     * portal.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BillingPortal\Configuration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/billing_portal/configurations/%s', $id), $params, $opts);
    }

    /**
     * Updates a configuration that describes the functionality of the customer portal.
     *
     * @param string $id
     * @param null|array{active?: bool, business_profile?: array{headline?: null|string, privacy_policy_url?: null|string, terms_of_service_url?: null|string}, default_return_url?: null|string, expand?: string[], features?: array{customer_update?: array{allowed_updates?: null|string[], enabled?: bool}, invoice_history?: array{enabled: bool}, payment_method_update?: array{enabled: bool, payment_method_configuration?: null|string}, subscription_cancel?: array{cancellation_reason?: array{enabled: bool, options?: null|string[]}, enabled?: bool, mode?: string, proration_behavior?: string}, subscription_update?: array{default_allowed_updates?: null|string[], enabled?: bool, products?: null|array{adjustable_quantity?: array{enabled: bool, maximum?: int, minimum?: int}, prices: string[], product: string}[], proration_behavior?: string, schedule_at_period_end?: array{conditions?: null|array{type: string}[]}, trial_update_behavior?: string}}, login_page?: array{enabled: bool}, metadata?: null|array<string, string>, name?: null|string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BillingPortal\Configuration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing_portal/configurations/%s', $id), $params, $opts);
    }
}
