<?php

namespace Stripe\Service\V2\Core;

/**
 * Service factory class for API resources in the root namespace.
 * // Doc: The beginning of the section generated from our OpenAPI spec.
 *
 * @property AccountLinkService $accountLinks
 * @property AccountService $accounts
 * @property ClaimableSandboxService $claimableSandboxes
 * @property EventDestinationService $eventDestinations
 * @property EventService $events
 * @property Vault\VaultServiceFactory $vault
 * // Doc: The end of the section generated from our OpenAPI spec
 */
class CoreServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        // Class Map: The beginning of the section generated from our OpenAPI spec
        'accountLinks' => AccountLinkService::class,
        'accounts' => AccountService::class,
        'claimableSandboxes' => ClaimableSandboxService::class,
        'eventDestinations' => EventDestinationService::class,
        'events' => EventService::class,
        'vault' => Vault\VaultServiceFactory::class,
        // Class Map: The end of the section generated from our OpenAPI spec
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
