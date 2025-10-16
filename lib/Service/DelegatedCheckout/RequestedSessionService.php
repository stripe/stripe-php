<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\DelegatedCheckout;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class RequestedSessionService extends \Stripe\Service\AbstractService
{
    /**
     * Confirms a requested session.
     *
     * @param string $id
     * @param null|array{expand?: string[], payment_method?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\DelegatedCheckout\RequestedSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function confirm($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/delegated_checkout/requested_sessions/%s/confirm', $id), $params, $opts);
    }

    /**
     * Creates a requested session.
     *
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\DelegatedCheckout\RequestedSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/delegated_checkout/requested_sessions', $params, $opts);
    }

    /**
     * Expires a requested session.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\DelegatedCheckout\RequestedSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function expire($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/delegated_checkout/requested_sessions/%s/expire', $id), $params, $opts);
    }

    /**
     * Retrieves a requested session.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\DelegatedCheckout\RequestedSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/delegated_checkout/requested_sessions/%s', $id), $params, $opts);
    }

    /**
     * Updates a requested session.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\DelegatedCheckout\RequestedSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/delegated_checkout/requested_sessions/%s', $id), $params, $opts);
    }
}
