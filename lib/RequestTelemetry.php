<?php

namespace Stripe;

/**
 * Class RequestTelemetry
 *
 * Tracks client request telemetry
 * @package Stripe
 */
class RequestTelemetry
{
    public $requestId;
    public $requestDuration;

    public function __construct($requestId, $requestDuration)
    {
        $this->requestId = $requestId;
        $this->requestDuration = $requestDuration;
    }
}
