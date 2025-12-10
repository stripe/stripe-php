<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PromotionCodeService extends AbstractService
{
    /**
     * Returns a list of your promotion codes.
     *
     * @param null|array{active?: bool, code?: string, coupon?: string, created?: array|int, customer?: string, customer_account?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\PromotionCode>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/promotion_codes', $params, $opts);
    }

    /**
     * A promotion code points to an underlying promotion. You can optionally restrict
     * the code to a specific customer, redemption limit, and expiration date.
     *
     * @param null|array{active?: bool, code?: string, customer?: string, customer_account?: string, expand?: string[], expires_at?: int, max_redemptions?: int, metadata?: array<string, string>, promotion: array{coupon?: string, type: string}, restrictions?: array{currency_options?: array<string, array{minimum_amount?: int}>, first_time_transaction?: bool, minimum_amount?: int, minimum_amount_currency?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PromotionCode
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/promotion_codes', $params, $opts);
    }

    /**
     * Retrieves the promotion code with the given ID. In order to retrieve a promotion
     * code by the customer-facing <code>code</code> use <a
     * href="/docs/api/promotion_codes/list">list</a> with the desired
     * <code>code</code>.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PromotionCode
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/promotion_codes/%s', $id), $params, $opts);
    }

    /**
     * Updates the specified promotion code by setting the values of the parameters
     * passed. Most fields are, by design, not editable.
     *
     * @param string $id
     * @param null|array{active?: bool, expand?: string[], metadata?: null|array<string, string>, restrictions?: array{currency_options?: array<string, array{minimum_amount?: int}>}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\PromotionCode
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/promotion_codes/%s', $id), $params, $opts);
    }
}
