<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PayoutIntentService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of PayoutIntents.
     *
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\PayoutIntent>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/payout_intents', $params, $opts);
    }

    /**
     * Cancels a PayoutIntent. Only pending PayoutIntents or processing PayoutIntents
     * with cancelable OutboundPayment/Transfer can be canceled.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutIntent
     *
     * @throws \Stripe\Exception\NotCancelableException
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/payout_intents/%s/cancel', $id), $params, $opts);
    }

    /**
     * Creates a PayoutIntent.
     *
     * @param null|array{amount: \Stripe\StripeObject, description?: string, from: array{currency: string, financial_account: string}, metadata?: array<string, string>, recipient_notification?: array{setting: string}, schedule_options?: array{execute_on?: string}, statement_descriptor?: string, to: array{currency?: string, payout_method?: string, payout_method_options?: array{bank_account?: array{preferred_network_options?: array{ach?: array{submission?: string, transaction_purpose?: string}}, preferred_networks: string[]}}, recipient?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutIntent
     *
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/payout_intents', $params, $opts);
    }

    /**
     * Retrieves the details of an existing PayoutIntent by passing the unique
     * PayoutIntent ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/payout_intents/%s', $id), $params, $opts);
    }

    /**
     * Updates a PayoutIntent. Only pending or requires_action PayoutIntents that are
     * editable can be updated.
     *
     * @param string $id
     * @param null|array{amount?: \Stripe\StripeObject, description?: string, from?: array{currency: string, financial_account: string}, metadata?: array<string, string>, recipient_notification?: array{setting: string}, schedule_options?: array{execute_on?: string}, statement_descriptor?: string, to?: array{currency?: string, payout_method?: string, payout_method_options?: array{bank_account?: array{preferred_network_options?: array{ach?: array{submission?: string, transaction_purpose?: string}}, preferred_networks: string[]}}, recipient?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutIntent
     *
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/payout_intents/%s', $id), $params, $opts);
    }
}
