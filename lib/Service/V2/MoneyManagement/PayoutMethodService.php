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
     * Archive a `PayoutMethod`. Archiving prevents the Payout Method from being used
     * for outbound payments or transfers and omits it from normal list results. To
     * restore list visibility, use the [unarchive
     * endpoint](https://docs.stripe.com/api/v2/money-management/payout-methods/unarchive).
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutMethod
     *
     * @throws \Stripe\Exception\CannotProceedException
     * @throws \Stripe\Exception\InvalidPayoutMethodException
     * @throws \Stripe\Exception\ControlledByAlternateResourceException
     */
    public function archive($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/payout_methods/%s/archive', $id), $params, $opts);
    }

    /**
     * Disable a `PayoutMethod`. Disabling temporarily prevents the Payout Method from
     * being used for outbound payments or transfers while keeping it in normal list
     * results. To re-enable it, complete setup again by [creating an Outbound Setup
     * Intent](https://docs.stripe.com/api/v2/money-management/outbound-setup-intents/create).
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutMethod
     *
     * @throws \Stripe\Exception\CannotProceedException
     */
    public function disable($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/payout_methods/%s/disable', $id), $params, $opts);
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
     * Unarchive a `PayoutMethod`. Unarchiving restores the Payout Method to normal
     * list results and clears only its archived state. It doesn't guarantee that the
     * Payout Method can be used.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutMethod
     *
     * @throws \Stripe\Exception\InvalidPayoutMethodException
     * @throws \Stripe\Exception\ControlledByAlternateResourceException
     */
    public function unarchive($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/payout_methods/%s/unarchive', $id), $params, $opts);
    }
}
