<?php

namespace Stripe\ApiOperations;

use Stripe\Util\Util;

/**
 * Trait for deletable resources. Adds a `delete()` method to the class.
 *
 * This trait should only be applied to classes that derive from StripeObject.
 */
trait Delete
{
    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return static the deleted resource
     */
    public function delete($params = null, $opts = null)
    {
        self::_validateParams($params);
        $className = static::class;
        if (\defined("{$className}::DELETE_DEPRECATED_PARAMS")) {
            // @phpstan-ignore-next-line
            Util::triggerDeprecatedParamWarnings($params, static::DELETE_DEPRECATED_PARAMS);
        }

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
