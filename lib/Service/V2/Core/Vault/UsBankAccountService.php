<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core\Vault;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class UsBankAccountService extends \Stripe\Service\AbstractService
{
    /**
     * List USBankAccount objects. Optionally filter by verification status.
     *
     * @param null|array{limit?: int, verification_status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Core\Vault\UsBankAccount>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/core/vault/us_bank_accounts', $params, $opts);
    }

    /**
     * Archive a USBankAccount object. USBankAccount objects will not be automatically
     * archived by Stripe. Archived USBankAccount objects cannot be used as outbound
     * destinations and will not appear in the outbound destination list.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\UsBankAccount
     *
     * @throws \Stripe\Exception\ControlledByDashboardException
     */
    public function archive($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/vault/us_bank_accounts/%s/archive', $id), $params, $opts);
    }

    /**
     * Confirm microdeposits amounts or descriptor code that you have received from the
     * Send Microdeposits request. Once you correctly confirm this, this US Bank
     * Account will be verified and eligible to transfer funds with.
     *
     * @param string $id
     * @param null|array{amounts?: int[], descriptor_code?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\UsBankAccount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function confirmMicrodeposits($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/vault/us_bank_accounts/%s/confirm_microdeposits', $id), $params, $opts);
    }

    /**
     * Create a USBankAccount object.
     *
     * @param null|array{account_number: string, bank_account_type?: string, fedwire_routing_number?: string, routing_number?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\UsBankAccount
     *
     * @throws \Stripe\Exception\BlockedByStripeException
     * @throws \Stripe\Exception\InvalidPaymentMethodException
     * @throws \Stripe\Exception\QuotaExceededException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/vault/us_bank_accounts', $params, $opts);
    }

    /**
     * Retrieve a USBankAccount object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\UsBankAccount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/vault/us_bank_accounts/%s', $id), $params, $opts);
    }

    /**
     * Send microdeposits in order to verify your US Bank Account so it is eligible to
     * transfer funds. This will start the verification process and you must Confirm
     * Microdeposits to successfully verify your US Bank Account.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\UsBankAccount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function sendMicrodeposits($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/vault/us_bank_accounts/%s/send_microdeposits', $id), $params, $opts);
    }

    /**
     * Update a USBankAccount object. This is limited to supplying a previously empty
     * routing_number field.
     *
     * @param string $id
     * @param null|array{fedwire_routing_number?: string, routing_number?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Vault\UsBankAccount
     *
     * @throws \Stripe\Exception\BlockedByStripeException
     * @throws \Stripe\Exception\InvalidPaymentMethodException
     * @throws \Stripe\Exception\QuotaExceededException
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/vault/us_bank_accounts/%s', $id), $params, $opts);
    }
}
