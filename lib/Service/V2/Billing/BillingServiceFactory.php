<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * Service factory class for API resources in the Billing namespace.
 *
 * @property BillSettingService $billSettings
 * @property CadenceService $cadences
 * @property CollectionSettingService $collectionSettings
 * @property CustomPricingUnitService $customPricingUnits
 * @property IntentService $intents
 * @property LicensedItemService $licensedItems
 * @property LicenseFeeService $licenseFees
 * @property LicenseFeeSubscriptionService $licenseFeeSubscriptions
 * @property MeteredItemService $meteredItems
 * @property MeterEventAdjustmentService $meterEventAdjustments
 * @property MeterEventService $meterEvents
 * @property MeterEventSessionService $meterEventSession
 * @property MeterEventStreamService $meterEventStream
 * @property PricingPlanService $pricingPlans
 * @property PricingPlanSubscriptionService $pricingPlanSubscriptions
 * @property ProfileService $profiles
 * @property RateCardService $rateCards
 * @property RateCardSubscriptionService $rateCardSubscriptions
 * @property ServiceActionService $serviceActions
 */
class BillingServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'billSettings' => BillSettingService::class,
        'cadences' => CadenceService::class,
        'collectionSettings' => CollectionSettingService::class,
        'customPricingUnits' => CustomPricingUnitService::class,
        'intents' => IntentService::class,
        'licensedItems' => LicensedItemService::class,
        'licenseFees' => LicenseFeeService::class,
        'licenseFeeSubscriptions' => LicenseFeeSubscriptionService::class,
        'meteredItems' => MeteredItemService::class,
        'meterEventAdjustments' => MeterEventAdjustmentService::class,
        'meterEvents' => MeterEventService::class,
        'meterEventSession' => MeterEventSessionService::class,
        'meterEventStream' => MeterEventStreamService::class,
        'pricingPlans' => PricingPlanService::class,
        'pricingPlanSubscriptions' => PricingPlanSubscriptionService::class,
        'profiles' => ProfileService::class,
        'rateCards' => RateCardService::class,
        'rateCardSubscriptions' => RateCardSubscriptionService::class,
        'serviceActions' => ServiceActionService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
