<?php

namespace Stripe\ApiOperations;

/**
 * Trait for deletable resources. Adds a `delete()` method to the class.
 *
 * This trait should only be applied to classes that derive from ApiResource.
 */
trait Delete
{
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource The deleted resource.
     */
    public function delete($params = null, $opts = null)
    {
        return $this->_delete($params, $opts);
    }
}
