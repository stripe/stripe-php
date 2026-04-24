<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2;

/**
 * Service factory class for API resources in the V2 namespace.
 *
 * @property Billing\BillingServiceFactory $billing
 * @property Commerce\CommerceServiceFactory $commerce
 * @property Core\CoreServiceFactory $core
 * @property Data\DataServiceFactory $data
 * @property Extend\ExtendServiceFactory $extend
 * @property Iam\IamServiceFactory $iam
 * @property MoneyManagement\MoneyManagementServiceFactory $moneyManagement
 * @property Network\NetworkServiceFactory $network
 * @property OrchestratedCommerce\OrchestratedCommerceServiceFactory $orchestratedCommerce
 * @property Payments\PaymentsServiceFactory $payments
 * @property Reporting\ReportingServiceFactory $reporting
 * @property Tax\TaxServiceFactory $tax
 * @property TestHelpers\TestHelpersServiceFactory $testHelpers
 */
class V2ServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'billing' => Billing\BillingServiceFactory::class,
        'commerce' => Commerce\CommerceServiceFactory::class,
        'core' => Core\CoreServiceFactory::class,
        'data' => Data\DataServiceFactory::class,
        'extend' => Extend\ExtendServiceFactory::class,
        'iam' => Iam\IamServiceFactory::class,
        'moneyManagement' => MoneyManagement\MoneyManagementServiceFactory::class,
        'network' => Network\NetworkServiceFactory::class,
        'orchestratedCommerce' => OrchestratedCommerce\OrchestratedCommerceServiceFactory::class,
        'payments' => Payments\PaymentsServiceFactory::class,
        'reporting' => Reporting\ReportingServiceFactory::class,
        'tax' => Tax\TaxServiceFactory::class,
        'testHelpers' => TestHelpers\TestHelpersServiceFactory::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
