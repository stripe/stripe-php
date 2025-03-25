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
     * Archive a UsBankAccount object. UsBankAccount objects will not be automatically
     * archived by Stripe. Archived UsBankAccount objects cannot be used as outbound
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
     * Create a UsBankAccount object.
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
     * Retrieve a UsBankAccount object.
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
     * Update a UsBankAccount object. This is limited to supplying a previously empty
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
