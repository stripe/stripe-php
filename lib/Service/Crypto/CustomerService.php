<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Crypto;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CustomerService extends \Stripe\Service\AbstractService
{
    /**
     * Lists the Consumer Wallets for a Crypto Customer.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Crypto\CustomerConsumerWallet>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allCryptoConsumerWallets($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/crypto/customers/%s/crypto_consumer_wallets', $parentId), $params, $opts);
    }

    /**
     * Lists the Payment Tokens for a Crypto Customer.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Crypto\CustomerPaymentToken>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allPaymentTokens($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/crypto/customers/%s/payment_tokens', $parentId), $params, $opts);
    }

    /**
     * Retrieves the details of a Crypto Customer.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Crypto\Customer
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/crypto/customers/%s', $id), $params, $opts);
    }
}
