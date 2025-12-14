<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2;

/**
 * Service factory class for API resources in the V2 namespace.
 *
 * @property Billing\BillingServiceFactory $billing
 * @property Core\CoreServiceFactory $core
 * @property Iam\IamServiceFactory $iam
 * @property MoneyManagement\MoneyManagementServiceFactory $moneyManagement
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
        'core' => Core\CoreServiceFactory::class,
        'iam' => Iam\IamServiceFactory::class,
        'moneyManagement' => MoneyManagement\MoneyManagementServiceFactory::class,
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
