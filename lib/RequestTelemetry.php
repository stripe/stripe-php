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
    /** @var string[] */
    public $usage;

    /**
     * Initialize a new telemetry object.
     *
     * @param string $requestId the request's request ID
     * @param int $requestDuration the request's duration in milliseconds
     * @param string[] $usage names of tracked behaviors associated with this request
     */
    public function __construct($requestId, $requestDuration, $usage = [])
    {
        $this->requestId = $requestId;
        $this->requestDuration = $requestDuration;
        $this->usage = $usage;
    }
}
