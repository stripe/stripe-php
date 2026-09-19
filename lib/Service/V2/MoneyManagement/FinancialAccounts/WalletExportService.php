<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement\FinancialAccounts;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class WalletExportService extends \Stripe\Service\AbstractService
{
    /**
     * Exports wallet credentials encrypted to the supplied recipient key. The first
     * successful request starts one fixed one-hour retrieval window; later requests
     * may use a different recipient key without extending it.
     *
     * @param string $id
     * @param null|array{encryption: array{recipient_public_key: string, type: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAccountWalletExportCredentials
     *
     * @throws \Stripe\Exception\ServiceUnavailableException
     */
    public function exportCredentials($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/financial_accounts/%s/wallet_export/export_credentials', $id), $params, $opts);
    }

    /**
     * Retrieves the wallet export metadata for a closed FinancialAccount. Credentials
     * are returned only by the export_credentials action.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAccountWalletExport
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/financial_accounts/%s/wallet_export', $id), $params, $opts);
    }
}
