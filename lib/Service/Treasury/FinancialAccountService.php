<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Treasury;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FinancialAccountService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of FinancialAccounts.
     *
     * @param null|array{created?: int|array, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Treasury\FinancialAccount>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/treasury/financial_accounts', $params, $opts);
    }

    /**
     * Closes a FinancialAccount. A FinancialAccount can only be closed if it has a
     * zero balance, has no pending InboundTransfers, and has canceled all attached
     * Issuing cards.
     *
     * @param string $id
     * @param null|array{expand?: string[], forwarding_settings?: array{financial_account?: string, payment_method?: string, type: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\FinancialAccount
     */
    public function close($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/treasury/financial_accounts/%s/close', $id), $params, $opts);
    }

    /**
     * Creates a new FinancialAccount. For now, each connected account can only have
     * one FinancialAccount.
     *
     * @param null|array{display_name?: null|string, expand?: string[], features?: array{card_issuing?: array{requested: bool}, deposit_insurance?: array{requested: bool}, financial_addresses?: array{aba?: array{bank?: string, requested: bool}}, inbound_transfers?: array{ach?: array{requested: bool}}, intra_stripe_flows?: array{requested: bool}, outbound_payments?: array{ach?: array{requested: bool}, us_domestic_wire?: array{requested: bool}}, outbound_transfers?: array{ach?: array{requested: bool}, us_domestic_wire?: array{requested: bool}}}, metadata?: \Stripe\StripeObject, nickname?: null|string, platform_restrictions?: array{inbound_flows?: string, outbound_flows?: string}, supported_currencies: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\FinancialAccount
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/treasury/financial_accounts', $params, $opts);
    }

    /**
     * Retrieves the details of a FinancialAccount.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\FinancialAccount
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/treasury/financial_accounts/%s', $id), $params, $opts);
    }

    /**
     * Retrieves Features information associated with the FinancialAccount.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\FinancialAccountFeatures
     */
    public function retrieveFeatures($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/treasury/financial_accounts/%s/features', $id), $params, $opts);
    }

    /**
     * Updates the details of a FinancialAccount.
     *
     * @param string $id
     * @param null|array{display_name?: null|string, expand?: string[], features?: array{card_issuing?: array{requested: bool}, deposit_insurance?: array{requested: bool}, financial_addresses?: array{aba?: array{bank?: string, requested: bool}}, inbound_transfers?: array{ach?: array{requested: bool}}, intra_stripe_flows?: array{requested: bool}, outbound_payments?: array{ach?: array{requested: bool}, us_domestic_wire?: array{requested: bool}}, outbound_transfers?: array{ach?: array{requested: bool}, us_domestic_wire?: array{requested: bool}}}, forwarding_settings?: array{financial_account?: string, payment_method?: string, type: string}, metadata?: \Stripe\StripeObject, nickname?: null|string, platform_restrictions?: array{inbound_flows?: string, outbound_flows?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\FinancialAccount
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/treasury/financial_accounts/%s', $id), $params, $opts);
    }

    /**
     * Updates the Features associated with a FinancialAccount.
     *
     * @param string $id
     * @param null|array{card_issuing?: array{requested: bool}, deposit_insurance?: array{requested: bool}, expand?: string[], financial_addresses?: array{aba?: array{bank?: string, requested: bool}}, inbound_transfers?: array{ach?: array{requested: bool}}, intra_stripe_flows?: array{requested: bool}, outbound_payments?: array{ach?: array{requested: bool}, us_domestic_wire?: array{requested: bool}}, outbound_transfers?: array{ach?: array{requested: bool}, us_domestic_wire?: array{requested: bool}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\FinancialAccountFeatures
     */
    public function updateFeatures($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/treasury/financial_accounts/%s/features', $id), $params, $opts);
    }
}
