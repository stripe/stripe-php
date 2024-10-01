<?php

namespace Stripe;

/**
 * @property string             $id       Unique identifier for the event.
 * @property string             $type     The type of the event.
 * @property string             $created  Time at which the object was created.
 * @property null|string        $context  Authentication context needed to fetch the event or related object.
 * @property null|RelatedObject $related_object // TODO Check if this can be removed and fix the tests
 * @property null|Reason        $reason   Reason for the event.
 * @property bool               $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
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
