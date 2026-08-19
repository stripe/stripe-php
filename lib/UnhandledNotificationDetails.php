<?php

namespace Stripe;

class UnhandledNotificationDetails
{
    /** @var bool whether the SDK has types for this event */
    public $isKnownEventType;

    public function __construct($isKnownEventType)
    {
        $this->isKnownEventType = $isKnownEventType;
    }
}
