<?php

namespace Stripe;

/**
 * @property string             $id       Unique identifier for the event.
 * @property string             $type     The type of the event.
 * @property string             $created  Time at which the object was created.
 * @property null|string        $context  Authentication context needed to fetch the event or related object.
 * @property null|RelatedObject $related_object Object containing the reference to API resource relevant to the event.
 */
class ThinEvent
{
    public $id;
    public $type;
    public $created;
    public $context;
    public $related_object;
}
