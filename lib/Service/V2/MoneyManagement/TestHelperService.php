<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @property TestHelpers\FinancialAddressService $financialAddresses
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TestHelperService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'financialAddresses' => TestHelpers\FinancialAddressService::class,
    ];

    /**
     * Creates an EarnedCredit in a Sandbox environment for testing purposes.
     *
     * @param null|array{amount: \Stripe\StripeObject, financial_account: string, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\EarnedCreditSimulation
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function earnedCredits($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/test_helpers/earned_credits', $params, $opts);
    }

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
