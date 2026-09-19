<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core\Vault;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class NetworkTokenService extends \Stripe\Service\AbstractService
{
    /**
     * Create or Return a Network Token Using Raw Card Data.
     *
     * @param null|array{card?: array{exp_month: string, exp_year: string, number: string, origin?: string, owner_details?: array{email?: string, phone?: string}}, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\NetworkToken
     *
     * @throws \Stripe\Exception\CannotProceedException
     * @throws \Stripe\Exception\BlockedByStripeException
     * @throws \Stripe\Exception\MerchantNotGatedException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/vault/network_tokens', $params, $opts);
    }

    /**
     * Creates or returns a Network Token from an existing card reference.
     *
     * @param null|array{card?: array{origin?: string, reference: string}, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\NetworkToken
     *
     * @throws \Stripe\Exception\CannotProceedException
     * @throws \Stripe\Exception\BlockedByStripeException
     */
    public function createFromCredential($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/vault/network_tokens/create_from_credential', $params, $opts);
    }

    /**
     * Every successful call generates a new cryptogram, and retrying can generate
     * another cryptogram. The cryptogram is returned only in this response and is
     * never persisted.
     *
     * @param string $id
     * @param null|array{type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\NetworkToken
     *
     * @throws \Stripe\Exception\RateLimitException
     * @throws \Stripe\Exception\CannotProceedException
     */
    public function generateCryptogram($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/vault/network_tokens/%s/generate_cryptogram', $id), $params, $opts);
    }

    /**
     * Retrieves an existing network token.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\NetworkToken
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/vault/network_tokens/%s', $id), $params, $opts);
    }
}
