<?php

namespace Stripe;

/**
 * Class OAuthErrorObject
 *
 * @property string $error
 * @property string $error_description
 *
 * @package Stripe
 */
class OAuthErrorObject extends StripeObject
{
    /**
     * Refreshes this object using the provided values.
     *
     * @param array $values
     * @param array|string|Util\RequestOptions|null $opts
     * @param bool $partial Defaults to false.
     */
    public function refreshFrom($values, $opts, $partial = false)
    {
        // Unlike most other API resources, the API will omit attributes in
        // error objects when they have a null value. We manually set default
        // values here to facilitate generic error handling.
        $values = \array_merge([
            'error' => null,
            'error_description' => null,
        ], $values);
        parent::refreshFrom($values, $opts, $partial);
    }
}
