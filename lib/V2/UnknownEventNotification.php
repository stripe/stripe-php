<?php

namespace Stripe\V2;

/**
 * A class representing an EventNotification that the SDK doesn't have types for.
 *
 * @property null|\Stripe\RelatedObject $related_object Object containing the reference to API resource relevant to the event.
 */
class UnknownEventNotification extends EventNotification
{
    public $related_object;
}
