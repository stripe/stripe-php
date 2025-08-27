<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class RateCardSubscriptionService extends \Stripe\Service\AbstractService
{
    /**
     * List all Rate Card Subscription objects.
     *
     * @param null|array{billing_cadence?: string, limit?: int, payer?: array{customer?: string, type: string}, rate_card?: string, rate_card_version?: string, servicing_status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\RateCardSubscription>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/rate_card_subscriptions', $params, $opts);
    }

    /**
     * Cancel an existing, active Rate Card Subscription.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCardSubscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/rate_card_subscriptions/%s/cancel', $id), $params, $opts);
    }

    /**
     * Create a Rate Card Subscription to bill a Rate Card on a specified Billing
     * Cadence.
     *
     * @param null|array{billing_cadence: string, metadata?: array<string, string>, rate_card: string, rate_card_version?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCardSubscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/rate_card_subscriptions', $params, $opts);
    }

    /**
     * Retrieve a Rate Card Subscription by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCardSubscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/rate_card_subscriptions/%s', $id), $params, $opts);
    }

    /**
     * Update fields on an existing, active Rate Card Subscription.
     *
     * @param string $id
     * @param null|array{metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\RateCardSubscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/rate_card_subscriptions/%s', $id), $params, $opts);
    }
}
