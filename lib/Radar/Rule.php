<?php

// File generated from our OpenAPI spec

namespace Stripe\Radar;

/**
 * @property string $id Unique identifier for the object.
 * @property null|string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $action The action taken on the payment.
 * @property null|string $predicate The predicate to evaluate the payment against.
 */
class Rule extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.rule';
}
