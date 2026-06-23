<?php

namespace Stripe\V2;

/**
 * A reference to a Stripe object. Holds the object's id and type.
 *
 * @property string $type The object type identifier (e.g. "v2.core.account").
 * @property string $id   Unique identifier for the referenced object.
 */
class Ref extends \Stripe\StripeObject
{
}
