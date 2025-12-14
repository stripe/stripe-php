<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PayoutMethodService extends \Stripe\Service\AbstractService
{
    /**
     * List objects that adhere to the PayoutMethod interface.
     *
     * @param null|array{limit?: int, usage_status?: array{payments?: string[], transfers?: string[]}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\PayoutMethod>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/payout_methods', $params, $opts);
    }

    /**
     * Archive a PayoutMethod object. Archived objects cannot be used as payout methods
     * and will not appear in the payout method list.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutMethod
     *
     * @throws \Stripe\Exception\ControlledByDashboardException
     * @throws \Stripe\Exception\InvalidPayoutMethodException
     * @throws \Stripe\Exception\ControlledByAlternateResourceException
     */
    public function archive($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/payout_methods/%s/archive', $id), $params, $opts);
    }

    /**
     * Retrieve a PayoutMethod object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutMethod
     *
     * @throws \Stripe\Exception\InvalidPayoutMethodException
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/payout_methods/%s', $id), $params, $opts);
    }

    /**
     * Unarchive an PayoutMethod object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutMethod
     *
     * @throws \Stripe\Exception\ControlledByDashboardException
     * @throws \Stripe\Exception\InvalidPayoutMethodException
     * @throws \Stripe\Exception\ControlledByAlternateResourceException
     */
    public function unarchive($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/payout_methods/%s/unarchive', $id), $params, $opts);
    }
}
