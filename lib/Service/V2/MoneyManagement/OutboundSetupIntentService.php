<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class OutboundSetupIntentService extends \Stripe\Service\AbstractService
{
    /**
     * List the OutboundSetupIntent objects.
     *
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\OutboundSetupIntent>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/outbound_setup_intents', $params, $opts);
    }

    /**
     * Cancel an OutboundSetupIntent object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundSetupIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/outbound_setup_intents/%s/cancel', $id), $params, $opts);
    }

    /**
     * Create an OutboundSetupIntent object.
     *
     * @param null|array{payout_method?: string, payout_method_data?: array{type: string, bank_account?: array{account_number: string, bank_account_type?: string, branch_number?: string, country: string, routing_number?: string, swift_code?: string}, card?: array{exp_month: string, exp_year: string, number: string}, crypto_wallet?: array{address: string, memo?: string, network: string}}, usage_intent?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundSetupIntent
     *
     * @throws \Stripe\Exception\BlockedByStripeException
     * @throws \Stripe\Exception\InvalidPayoutMethodException
     * @throws \Stripe\Exception\QuotaExceededException
     * @throws \Stripe\Exception\ControlledByAlternateResourceException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/outbound_setup_intents', $params, $opts);
    }

    /**
     * Retrieve an OutboundSetupIntent object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundSetupIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/outbound_setup_intents/%s', $id), $params, $opts);
    }

    /**
     * Update an OutboundSetupIntent object.
     *
     * @param string $id
     * @param null|array{payout_method?: string, payout_method_data?: array{type: string, bank_account?: array{account_number: string, bank_account_type?: string, branch_number?: string, country: string, routing_number?: string, swift_code?: string}, card?: array{exp_month?: string, exp_year?: string, number?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\OutboundSetupIntent
     *
     * @throws \Stripe\Exception\QuotaExceededException
     * @throws \Stripe\Exception\BlockedByStripeException
     * @throws \Stripe\Exception\InvalidPayoutMethodException
     * @throws \Stripe\Exception\ControlledByAlternateResourceException
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/outbound_setup_intents/%s', $id), $params, $opts);
    }
}
