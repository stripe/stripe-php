<?php

namespace Stripe;

/**
 * Class ApplePayDomain
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property string $domain_name
 * @property bool $livemode
 *
 * @package Stripe
 */
class ApplePayDomain extends ApiResource
{
    const OBJECT_NAME = 'apple_pay_domain';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;

    /**
     * @return string The class URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public static function classUrl()
    {
        return '/v1/apple_pay/domains';
    }
}
