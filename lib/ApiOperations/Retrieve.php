<?php

namespace Stripe\ApiOperations;

/**
 * Trait for retrievable resources. Adds a `retrieve()` static method to the
 * class.
 *
 * This trait should only be applied to classes that derive from StripeObject.
 */
trait Retrieve
{
    /**
     * @param array|string      $id The ID of the API resource to retrieve,
     *                              or an options array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return \Stripe\StripeObject
     * @throws \Stripe\Error\Api
     * @throws \Stripe\Error\ApiConnection
     * @throws \Stripe\Error\Authentication
     * @throws \Stripe\Error\Card
     * @throws \Stripe\Error\Idempotency
     * @throws \Stripe\Error\InvalidRequest
     * @throws \Stripe\Error\Permission
     * @throws \Stripe\Error\RateLimit
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();
        return $instance;
    }
}
