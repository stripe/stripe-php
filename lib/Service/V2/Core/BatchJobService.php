<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class BatchJobService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a new batch job.
     *
     * @param null|array{endpoint: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\BatchJob
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/batch_jobs', $params, $opts);
    }

    /**
     * Serializes a Customer update request into a batch job JSONL line.
     *
     * @param string $customer
     * @param null|\Stripe\CustomerUpdateParams $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return string
     */
    public function serializeV1CustomerUpdate($customer, $params = null, $opts = null)
    {
        $itemId = \Stripe\Util\Util::uuid();
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $stripeVersion = $opts->apiVersion ?? \Stripe\Stripe::getApiVersion();

        $item = [
            'id' => $itemId,
            'path_params' => ['customer' => $customer],
            'params' => $params,
            'stripe_version' => $stripeVersion,
        ];
        if (null !== $opts->stripeContext) {
            $item['context'] = $opts->stripeContext;
        }

        return \json_encode($item);
    }

    /**
     * Serializes a SubscriptionSchedule create request into a batch job JSONL line.
     *
     * @param null|\Stripe\SubscriptionScheduleCreateParams $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return string
     */
    public function serializeV1SubscriptionScheduleCreate($params = null, $opts = null)
    {
        $itemId = \Stripe\Util\Util::uuid();
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $stripeVersion = $opts->apiVersion ?? \Stripe\Stripe::getApiVersion();

        $item = [
            'id' => $itemId,
            'path_params' => null,
            'params' => $params,
            'stripe_version' => $stripeVersion,
        ];
        if (null !== $opts->stripeContext) {
            $item['context'] = $opts->stripeContext;
        }

        return \json_encode($item);
    }

    /**
     * Serializes a Subscription update request into a batch job JSONL line.
     *
     * @param string $subscription_exposed_id
     * @param null|\Stripe\SubscriptionUpdateParams $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return string
     */
    public function serializeV1SubscriptionUpdate($subscription_exposed_id, $params = null, $opts = null)
    {
        $itemId = \Stripe\Util\Util::uuid();
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $stripeVersion = $opts->apiVersion ?? \Stripe\Stripe::getApiVersion();

        $item = [
            'id' => $itemId,
            'path_params' => ['subscription_exposed_id' => $subscription_exposed_id],
            'params' => $params,
            'stripe_version' => $stripeVersion,
        ];
        if (null !== $opts->stripeContext) {
            $item['context'] = $opts->stripeContext;
        }

        return \json_encode($item);
    }
}
