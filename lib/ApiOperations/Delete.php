<?php

namespace Stripe\ApiOperations;

/**
 * Trait for deletable resources. Adds a `delete()` method to the class.
 *
 * This trait should only be applied to classes that derive from StripeObject.
 */
trait Delete
{
    /**
     * @param array|null        $params
     * @param array|string|null $opts
     *
     * @return \Stripe\ApiResource The deleted resource.
     * @throws \Stripe\Error\Api
     * @throws \Stripe\Error\ApiConnection
     * @throws \Stripe\Error\Authentication
     * @throws \Stripe\Error\Card
     * @throws \Stripe\Error\Idempotency
     * @throws \Stripe\Error\InvalidRequest
     * @throws \Stripe\Error\Permission
     * @throws \Stripe\Error\RateLimit
     */
    public function delete($params = null, $opts = null)
    {
        self::_validateParams($params);

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
