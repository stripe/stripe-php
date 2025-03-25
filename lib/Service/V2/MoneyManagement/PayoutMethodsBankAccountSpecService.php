<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PayoutMethodsBankAccountSpecService extends \Stripe\Service\AbstractService
{
    /**
     * Fetch the specifications for a set of countries to know which credential fields
     * are required, the validations for each fields, and how to translate these
     * country-specific fields to the generic fields in the PayoutMethodBankAccount
     * type.
     *
     * @param null|array{countries?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutMethodsBankAccountSpec
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->request('get', '/v2/money_management/payout_methods_bank_account_spec', $params, $opts);
    }
}
