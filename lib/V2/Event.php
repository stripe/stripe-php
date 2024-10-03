<?php

namespace Stripe\V2;

/**
 * @property string $id Unique identifier for the event.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Time at which the object was created.
 * @property \Stripe\StripeObject $reason Reason for the event.
 * @property string $type The type of the event.
 * @property null|string $context The Stripe account of the event
 */
abstract class Event extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.event';
}
