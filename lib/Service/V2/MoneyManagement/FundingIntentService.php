<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FundingIntentService extends \Stripe\Service\AbstractService
{
    /**
     * Lists FundingIntents.
     *
     * @param null|array{created?: array{gt?: string, gte?: string, lt?: string, lte?: string}, limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\FundingIntent>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/funding_intents', $params, $opts);
    }

    /**
     * Cancels a FundingIntent that can still be canceled.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FundingIntent
     *
     * @throws \Stripe\Exception\CannotProceedException
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/funding_intents/%s/cancel', $id), $params, $opts);
    }

    /**
     * Confirms a FundingIntent that is ready for processing.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FundingIntent
     *
     * @throws \Stripe\Exception\CannotProceedException
     */
    public function confirm($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/funding_intents/%s/confirm', $id), $params, $opts);
    }

    /**
     * Creates a FundingIntent that adds funds to a FinancialAccount.
     *
     * @param null|array{amount: \Stripe\StripeObject, check?: array{back_image?: string, front_image?: string}, confirmation_method?: string, description?: string, metadata?: array<string, string>, settlement_timing?: array{delay_days_override?: int}, to: array{currency: string, financial_account: string}, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FundingIntent
     *
     * @throws \Stripe\Exception\CannotProceedException
     * @throws \Stripe\Exception\FeatureNotEnabledException
     * @throws \Stripe\Exception\CapabilityNotEnabledException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/funding_intents', $params, $opts);
    }

    /**
     * Retrieves a FundingIntent by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FundingIntent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/funding_intents/%s', $id), $params, $opts);
    }

    /**
     * Updates the mutable details of a FundingIntent.
     *
     * @param string $id
     * @param null|array{amount?: \Stripe\StripeObject, check?: array{back_image?: string, front_image?: string}, confirmation_method?: string, description?: string, metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FundingIntent
     *
     * @throws \Stripe\Exception\CannotProceedException
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/funding_intents/%s', $id), $params, $opts);
    }
}
