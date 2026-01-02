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
     * @param null|array{expand?: string[], payment_method?: string, payment_method_data?: array{billing_details?: array{address?: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state: string}, email?: string, name?: string, phone?: string}, card?: array{cvc?: string, exp_month: int, exp_year: int, number: string}, type?: string}, risk_details?: array{client_device_metadata_details?: array{radar_session?: string, referrer?: string, remote_ip?: string, time_on_page_ms?: int, user_agent?: string}}} $params
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
     * @param null|array{currency: string, customer?: string, expand?: string[], fulfillment_details?: array{address?: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state: string}, email?: string, name?: string, phone?: string}, line_item_details: array{quantity: int, sku_id: string}[], metadata?: array<string, string>, payment_method?: string, payment_method_data?: array{billing_details?: array{address?: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state: string}, email?: string, name?: string, phone?: string}, card?: array{cvc?: string, exp_month: int, exp_year: int, number: string}, type?: string}, seller_details: array{network_profile: string}, setup_future_usage?: string, shared_metadata?: array<string, string>} $params
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
     * @param null|array{expand?: string[], fulfillment_details?: array{address?: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state: string}, email?: string, name?: string, phone?: string, selected_fulfillment_option?: array{shipping: array{shipping_option: string}, type: string}}, line_item_details?: array{key: string, quantity: int}[], metadata?: null|array<string, string>, payment_method?: string, payment_method_data?: null|array{billing_details?: array{address?: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state: string}, email?: string, name?: string, phone?: string}, card?: array{cvc?: string, exp_month: int, exp_year: int, number: string}, type?: string}, shared_metadata?: null|array<string, string>} $params
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
