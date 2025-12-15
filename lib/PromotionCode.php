<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Promotion Code represents a customer-redeemable code for an underlying promotion.
 * You can create multiple codes for a single promotion.
 *
 * If you enable promotion codes in your <a href="https://docs.stripe.com/customer-management/configure-portal">customer portal configuration</a>, then customers can redeem a code themselves when updating a subscription in the portal.
 * Customers can also view the currently active promotion codes and coupons on each of their subscriptions in the portal.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the promotion code is currently active. A promotion code is only active if the coupon is also valid.
 * @property string $code The customer-facing code. Regardless of case, this code must be unique across all active promotion codes for each customer. Valid characters are lower case letters (a-z), upper case letters (A-Z), and digits (0-9).
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|Customer|string $customer The customer who can use this promotion code.
 * @property null|string $customer_account The account representing the customer who can use this promotion code.
 * @property null|int $expires_at Date at which the promotion code can no longer be redeemed.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|int $max_redemptions Maximum number of times this promotion code can be redeemed.
 * @property null|StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property (object{coupon: null|Coupon|string, type: string}&StripeObject) $promotion
 * @property (object{currency_options?: StripeObject, first_time_transaction: bool, minimum_amount: null|int, minimum_amount_currency: null|string}&StripeObject) $restrictions
 * @property int $times_redeemed Number of times this promotion code has been used.
 */
class PromotionCode extends ApiResource
{
    const OBJECT_NAME = 'promotion_code';

    use ApiOperations\Update;

    /**
     * A promotion code points to an underlying promotion. You can optionally restrict
     * the code to a specific customer, redemption limit, and expiration date.
     *
     * @param null|array{active?: bool, code?: string, customer?: string, customer_account?: string, expand?: string[], expires_at?: int, max_redemptions?: int, metadata?: array<string, string>, promotion: array{coupon?: string, type: string}, restrictions?: array{currency_options?: array<string, array{minimum_amount?: int}>, first_time_transaction?: bool, minimum_amount?: int, minimum_amount_currency?: string}} $params
     * @param null|array|string $options
     *
     * @return PromotionCode the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of your promotion codes.
     *
     * @param null|array{active?: bool, code?: string, coupon?: string, created?: array|int, customer?: string, customer_account?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<PromotionCode> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the promotion code with the given ID. In order to retrieve a promotion
     * code by the customer-facing <code>code</code> use <a
     * href="/docs/api/promotion_codes/list">list</a> with the desired
     * <code>code</code>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return PromotionCode
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates the specified promotion code by setting the values of the parameters
     * passed. Most fields are, by design, not editable.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{active?: bool, expand?: string[], metadata?: null|array<string, string>, restrictions?: array{currency_options?: array<string, array{minimum_amount?: int}>}} $params
     * @param null|array|string $opts
     *
     * @return PromotionCode the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
