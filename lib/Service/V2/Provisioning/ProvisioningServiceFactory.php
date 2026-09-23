<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Provisioning;

/**
 * Service factory class for API resources in the Provisioning namespace.
 *
 * @property Catalog\CatalogServiceFactory $catalog
 * @property EligibilityService $eligibility
 * @property PaymentMethodRequestService $paymentMethodRequests
 * @property PaymentProfileService $paymentProfile
 * @property ProjectService $projects
 * @property ProviderConnectionRequestService $providerConnectionRequests
 * @property ProviderConnectionService $providerConnections
 * @property ResourceService $resources
 */
class ProvisioningServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'catalog' => Catalog\CatalogServiceFactory::class,
        'eligibility' => EligibilityService::class,
        'paymentMethodRequests' => PaymentMethodRequestService::class,
        'paymentProfile' => PaymentProfileService::class,
        'projects' => ProjectService::class,
        'providerConnectionRequests' => ProviderConnectionRequestService::class,
        'providerConnections' => ProviderConnectionService::class,
        'resources' => ResourceService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
