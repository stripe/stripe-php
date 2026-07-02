<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Crypto;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OnrampSessionService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of onramp sessions that match the filter criteria. The onramp
     * sessions are returned in sorted order, with the most recent onramp sessions
     * appearing first.
     *
     * @param null|array{created?: array|int, destination_currency?: string, destination_network?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Crypto\OnrampSession>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/crypto/onramp_sessions', $params, $opts);
    }

    /**
     * Completes a headless CryptoOnrampSession.
     *
     * This method will attempt to confirm the payment and execute the quote to deliver
     * the crypto to the customer.
     *
     * @param string $id
     * @param null|array{expand?: string[], mandate_data?: array{customer_acceptance: array{accepted_at?: int, offline?: array{}, online?: array{ip_address: string, user_agent: string}, type: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Crypto\OnrampSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function checkout($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/crypto/onramp_sessions/%s/checkout', $id), $params, $opts);
    }

    /**
     * Creates a CryptoOnrampSession object.
     *
     * After the CryptoOnrampSession is created, display the onramp session modal using
     * the <code>client_secret</code>.
     *
     * Related guide: <a href="/docs/crypto/integrate-the-onramp">Set up an onramp
     * integration</a>
     *
     * @param null|array{customer_ip_address?: string, destination_amount?: string, destination_currencies?: string[], destination_currency?: string, destination_network?: string, destination_networks?: string[], expand?: string[], kyc_details?: array{}, lock_wallet_address?: bool, metadata?: array<string, string>, settlement_speed?: string, source_amount?: string, source_currency?: string, wallet_addresses?: array{destination_tags?: array{stellar?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Crypto\OnrampSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/crypto/onramp_sessions', $params, $opts);
    }

    /**
     * Refreshes an executable quote for a CryptoOnrampSession.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Crypto\OnrampSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function quote($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/crypto/onramp_sessions/%s/quote', $id), $params, $opts);
    }

    /**
     * Retrieves the details of a CryptoOnrampSession that was previously created.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Crypto\OnrampSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/crypto/onramp_sessions/%s', $id), $params, $opts);
    }
}
