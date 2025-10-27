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
     * Confirm that you have received the result of the Confirmation of Payee request,
     * and that you are okay with proceeding to pay out to this bank account despite
     * the account not matching, partially matching, or the service being unavailable.
     * Once you confirm this, you will be able to send OutboundPayments, but this may
     * lead to funds being sent to the wrong account, which we might not be able to
     * recover.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\GbBankAccount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function acknowledgeConfirmationOfPayee($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/vault/gb_bank_accounts/%s/acknowledge_confirmation_of_payee', $id), $params, $opts);
    }

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
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function archive($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/vault/gb_bank_accounts/%s/archive', $id), $params, $opts);
    }

    /**
     * Create a GB bank account.
     *
     * @param null|array{account_number: string, bank_account_type?: string, confirmation_of_payee?: array{business_type?: string, initiate: bool, name?: string}, sort_code: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\GbBankAccount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/vault/gb_bank_accounts', $params, $opts);
    }

    /**
     * Initiate Confirmation of Payee (CoP) in order to verify that the owner of a UK
     * bank account matches who you expect. This must be done on all UK bank accounts
     * before sending domestic OutboundPayments. If the result is a partial match or a
     * non match, explicit acknowledgement using AcknowledgeConfirmationOfPayee is
     * required before sending funds.
     *
     * @param string $id
     * @param null|array{business_type?: string, name?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\GbBankAccount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function initiateConfirmationOfPayee($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/vault/gb_bank_accounts/%s/initiate_confirmation_of_payee', $id), $params, $opts);
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
