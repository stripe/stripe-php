<?php

namespace Stripe\V2;

/**
 * @property string $id The ID of the object that's being deleted.
 * @property null|string $object String representing the type of the object that has been deleted.
 */
class DeletedObject extends \Stripe\ApiResource
{
    const OBJECT_NAME = '';
}
