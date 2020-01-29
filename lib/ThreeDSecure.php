<?php

namespace Stripe;

/**
 * Class ThreeDSecure
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property bool $authenticated
 * @property \Stripe\Card $card
 * @property int $created
 * @property string $currency
 * @property bool $livemode
 * @property string|null $redirect_url
 * @property string $status
 *
 * @package Stripe
 */
class ThreeDSecure extends ApiResource
{
    const OBJECT_NAME = 'three_d_secure';

    use ApiOperations\Create;
    use ApiOperations\Retrieve;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        return "/v1/3d_secure";
    }
}
