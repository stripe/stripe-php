<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core\Vault;

/**
 * A NetworkToken object represents a network token provisioned for a card.
 *
 * @property string $id ID of the NetworkToken object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $created Created timestamp.
 * @property null|(object{eci?: string, type: string, value: string}&\Stripe\StripeObject) $cryptogram This field is unset in create and retrieve responses. It is populated only after a successful generate_cryptogram request.
 * @property null|string $exp_month The month the network token expires.
 * @property null|string $exp_year The year the network token expires.
 * @property bool $livemode Whether the object exists in live mode or in test mode.
 * @property null|string $number The network token number.
 * @property string $status Closed Enum. The status of the network token.
 */
class NetworkToken extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.vault.network_token';

    const STATUS_ACTIVE = 'active';
    const STATUS_DEACTIVATED = 'deactivated';
    const STATUS_SUSPENDED = 'suspended';
}
