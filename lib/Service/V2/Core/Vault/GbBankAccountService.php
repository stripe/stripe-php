<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core\Vault;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class GbBankAccountService extends \Stripe\Service\AbstractService
{
    /**
     * List objects that can be used as destinations for outbound money movement via
     * OutboundPayment.
     *
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Core\Vault\GbBankAccount>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/core/vault/gb_bank_accounts', $params, $opts);
    }

    /**
     * Archive a GBBankAccount object. Archived GBBankAccount objects cannot be used as
     * outbound destinations and will not appear in the outbound destination list.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\GbBankAccount
     *
     * @throws \Stripe\Exception\CannotProceedException
     * @throws \Stripe\Exception\ControlledByAlternateResourceException
     */
    public function archive($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/vault/gb_bank_accounts/%s/archive', $id), $params, $opts);
    }

    /**
     * Create a GB bank account.
     *
     * @param null|array{account_number?: string, bank_account_type?: string, confirmation_of_payee?: array{business_type?: string, initiate: bool, name?: string}, currency: string, iban?: string, sort_code?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\GbBankAccount
     *
     * @throws \Stripe\Exception\BlockedByStripeException
     * @throws \Stripe\Exception\CannotProceedException
     * @throws \Stripe\Exception\InvalidVaultedCredentialException
     * @throws \Stripe\Exception\QuotaExceededException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/vault/gb_bank_accounts', $params, $opts);
    }

    /**
     * Retrieve a GB bank account.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\GbBankAccount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/vault/gb_bank_accounts/%s', $id), $params, $opts);
    }
}
