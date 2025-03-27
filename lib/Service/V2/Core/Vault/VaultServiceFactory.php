<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core\Vault;

/**
 * Service factory class for API resources in the Vault namespace.
 *
 * @property GbBankAccountService $gbBankAccounts
 * @property UsBankAccountService $usBankAccounts
 */
class VaultServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'gbBankAccounts' => GbBankAccountService::class,
        'usBankAccounts' => UsBankAccountService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
