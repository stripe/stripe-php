<?php

namespace Stripe;

/**
 * Class RequestTelemetry.
 *
 * Tracks client request telemetry
 */
class RequestTelemetry
{
    /** @var string */
    public $requestId;
    /** @var int */
    public $requestDuration;
    /** @var array */
    public $usage;

    /**
     * Initialize a new telemetry object.
     *
     * @param string $requestId the request's request ID
     * @param int $requestDuration the request's duration in milliseconds
     * @param array $usage the request's duration in milliseconds
     */
    public function __construct($requestId, $requestDuration, $usage = [])
    {
        $this->requestId = $requestId;
        $this->requestDuration = $requestDuration;
        $this->usage = $usage;
    }
}
