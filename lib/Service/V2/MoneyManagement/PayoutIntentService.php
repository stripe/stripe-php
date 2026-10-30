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
     * Cancels a PayoutIntent in the `pending` or `requires_action` state, or a
     * `processing` PayoutIntent with a cancelable OutboundPayment.
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
     * Confirms a PayoutIntent in the `requires_action` state, transitioning it to
     * `pending`.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutIntent
     *
     * @throws \Stripe\Exception\FxQuoteNeedsRefreshException
     */
    public function confirm($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/payout_intents/%s/confirm', $id), $params, $opts);
    }

    /**
     * Creates a PayoutIntent.
     *
     * @param null|array{amount: \Stripe\StripeObject, confirmation_method?: string, description?: string, from: array{currency: string, financial_account: string}, metadata?: array<string, string>, recipient_notification?: array{setting: string}, schedule_options?: array{execute_on?: string}, statement_descriptor?: string, to: array{currency?: string, payout_method?: string, payout_method_options?: array{bank_account?: array{preferred_network_options?: array{ach?: array{addenda?: string, submission?: string, transaction_purpose?: string}}, preferred_networks?: string[]}}, recipient?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutIntent
     *
     * @throws \Stripe\Exception\CapabilityNotEnabledException
     * @throws \Stripe\Exception\RecipientNotNotifiableException
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/payout_intents', $params, $opts);
    }

    /**
     * Refreshes the FX quote for a PayoutIntent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function refreshFxQuote($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/payout_intents/%s/refresh_fx_quote', $id), $params, $opts);
    }

    /**
     * Refreshes the recipient verification for a PayoutIntent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function refreshRecipientVerification($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/payout_intents/%s/refresh_recipient_verification', $id), $params, $opts);
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
     * Updates an editable PayoutIntent in the `pending` or `requires_action` state.
     *
     * @param string $id
     * @param null|array{description?: string, metadata?: array<string, string>, recipient_notification?: array{setting: string}, schedule_options?: array{execute_on?: string}, statement_descriptor?: string, to?: array{currency?: string, payout_method?: string, payout_method_options?: array{bank_account?: array{preferred_network_options?: array{ach?: array{addenda?: string, submission?: string, transaction_purpose?: string}}, preferred_networks?: string[]}}, recipient?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\PayoutIntent
     *
     * @throws \Stripe\Exception\CapabilityNotEnabledException
     * @throws \Stripe\Exception\RecipientNotNotifiableException
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/payout_intents/%s', $id), $params, $opts);
    }
}
