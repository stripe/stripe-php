<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Crypto;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class DepositAddressService extends \Stripe\Service\AbstractService
{
    /**
     * Lists crypto deposit addresses for the authenticated merchant. Supports
     * cursor-based pagination and optional filtering by customer, network, or on-chain
     * address.
     *
     * @param null|array{address?: string, customer?: string, customer_account?: string, ending_before?: string, expand?: string[], limit?: int, network?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Crypto\DepositAddress>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/crypto/deposit_addresses', $params, $opts);
    }

    /**
     * Creates a new crypto deposit address for the authenticated merchant on the
     * specified network. The returned address can be used across multiple
     * PaymentIntents.
     *
     * @param null|array{customer?: string, expand?: string[], metadata?: array<string, string>, network: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Crypto\DepositAddress
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/crypto/deposit_addresses', $params, $opts);
    }

    /**
     * Retrieves the details of an existing crypto deposit address by ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Crypto\DepositAddress
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/crypto/deposit_addresses/%s', $id), $params, $opts);
    }
}
