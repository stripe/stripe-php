<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\Groups;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SpendModifierRuleService extends \Stripe\Service\AbstractService
{
    /**
     * List spend modifiers associated with a billing group.
     *
     * @param string $id
     * @param null|array{effective_at?: string, limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\GroupSpendModifier>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/groups/%s/spend_modifier_rules', $id), $params, $opts);
    }

    /**
     * Retrieve a spend modifier associated with a billing group.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\GroupSpendModifier
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/groups/%s/spend_modifier_rules/%s', $parentId, $id), $params, $opts);
    }
}
