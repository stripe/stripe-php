<?php

namespace Stripe;

/**
 * @property string             $id Unique identifier for the event.
 * @property string             $type
 * @property string             $created
 * @property null|string        $context
 * @property null|RelatedObject $related_object
 * @property null|Reason        $reason
 */
class ThinEvent
{
    public $id;
    public $type;
    public $created;
    public $context;
    public $related_object;
    public $reason;
}
