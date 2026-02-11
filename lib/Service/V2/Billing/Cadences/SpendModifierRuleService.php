<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\Cadences;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SpendModifierRuleService extends \Stripe\Service\AbstractService
{
    /**
     * List all Spend Modifiers associated with a Billing Cadence.
     *
     * @param string $id
     * @param null|array{effective_at?: string, limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\CadenceSpendModifier>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/cadences/%s/spend_modifier_rules', $id), $params, $opts);
    }

    /**
     * Retrieve a Spend Modifier associated with a Billing Cadence.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\CadenceSpendModifier
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/cadences/%s/spend_modifier_rules/%s', $parentId, $id), $params, $opts);
    }
}
