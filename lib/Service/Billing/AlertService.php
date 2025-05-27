<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AlertService extends \Stripe\Service\AbstractService
{
    /**
     * Reactivates this alert, allowing it to trigger again.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\Alert
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function activate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/alerts/%s/activate', $id), $params, $opts);
    }

    /**
     * Lists billing active and inactive alerts.
     *
     * @param null|array{alert_type?: string, ending_before?: string, expand?: string[], limit?: int, meter?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Billing\Alert>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/billing/alerts', $params, $opts);
    }

    /**
     * Archives this alert, removing it from the list view and APIs. This is
     * non-reversible.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\Alert
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function archive($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/alerts/%s/archive', $id), $params, $opts);
    }

    /**
     * Creates a billing alert.
     *
     * @param null|array{alert_type: string, expand?: string[], title: string, usage_threshold?: array{filters?: array{customer?: string, type: string}[], gte: int, meter: string, recurrence: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\Alert
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/billing/alerts', $params, $opts);
    }

    /**
     * Deactivates this alert, preventing it from triggering.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\Alert
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deactivate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/alerts/%s/deactivate', $id), $params, $opts);
    }

    /**
     * Retrieves a billing alert given an ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\Alert
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/billing/alerts/%s', $id), $params, $opts);
    }
}
