<?php

namespace Stripe\Service\V2\Core;

/**
 * Service factory class for API resources in the root namespace.
 * // Doc: The beginning of the section generated from our OpenAPI spec.
 *
 * @property AccountEvaluationService $accountEvaluations
 * @property AccountLinkService $accountLinks
 * @property AccountService $accounts
 * @property AccountTokenService $accountTokens
 * @property BatchJobService $batchJobs
 * @property ClaimableSandboxService $claimableSandboxes
 * @property ConnectionSessionService $connectionSessions
 * @property EventDestinationService $eventDestinations
 * @property EventService $events
 * @property Vault\VaultServiceFactory $vault
 * @property WorkflowRunService $workflowRuns
 * @property WorkflowService $workflows
 * // Doc: The end of the section generated from our OpenAPI spec
 */
class CoreServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        // Class Map: The beginning of the section generated from our OpenAPI spec
        'accountEvaluations' => AccountEvaluationService::class,
        'accountLinks' => AccountLinkService::class,
        'accounts' => AccountService::class,
        'accountTokens' => AccountTokenService::class,
        'batchJobs' => BatchJobService::class,
        'claimableSandboxes' => ClaimableSandboxService::class,
        'connectionSessions' => ConnectionSessionService::class,
        'eventDestinations' => EventDestinationService::class,
        'events' => EventService::class,
        'vault' => Vault\VaultServiceFactory::class,
        'workflowRuns' => WorkflowRunService::class,
        'workflows' => WorkflowService::class,
        // Class Map: The end of the section generated from our OpenAPI spec
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
