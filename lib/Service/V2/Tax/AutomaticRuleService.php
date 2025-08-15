<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Tax;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AutomaticRuleService extends \Stripe\Service\AbstractService
{
    /**
     * Creates an AutomaticRule object.
     *
     * @param null|array{billable_item: string, tax_code: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\AutomaticRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/tax/automatic_rules', $params, $opts);
    }

    /**
     * Deactivates an AutomaticRule object. Deactivated AutomaticRule objects are
     * ignored in future tax calculations.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\AutomaticRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deactivate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/tax/automatic_rules/%s/deactivate', $id), $params, $opts);
    }

    /**
     * Finds an AutomaticRule object by BillableItem ID.
     *
     * @param null|array{billable_item: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\AutomaticRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function find($params = null, $opts = null)
    {
        return $this->request('get', '/v2/tax/automatic_rules/find', $params, $opts);
    }

    /**
     * Retrieves an AutomaticRule object by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\AutomaticRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/tax/automatic_rules/%s', $id), $params, $opts);
    }

    /**
     * Updates the automatic Tax configuration for an AutomaticRule object.
     *
     * @param string $id
     * @param null|array{tax_code: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\AutomaticRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/tax/automatic_rules/%s', $id), $params, $opts);
    }
}
