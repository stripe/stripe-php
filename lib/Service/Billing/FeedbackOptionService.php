<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FeedbackOptionService extends \Stripe\Service\AbstractService
{
    /**
     * An API method for listing the feedback options model.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Billing\FeedbackOption>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/billing/feedback_options', $params, $opts);
    }

    /**
     * Creates a new feedback option.
     *
     * @param null|array{description: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\FeedbackOption
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/billing/feedback_options', $params, $opts);
    }

    /**
     * Deactivates a feedback option. Deactivated feedback options cannot be used in
     * portal configurations.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\FeedbackOption
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deactivate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/feedback_options/%s/deactivate', $id), $params, $opts);
    }

    /**
     * Retrieves a feedback options object given an ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\FeedbackOption
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/billing/feedback_options/%s', $id), $params, $opts);
    }

    /**
     * Updates the description of an existing feedback option.
     *
     * @param string $id
     * @param null|array{description?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\FeedbackOption
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/feedback_options/%s', $id), $params, $opts);
    }
}
