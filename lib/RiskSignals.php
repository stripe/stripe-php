<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $session_metadata Represents the status of risk signal session metadata collection. When false, the account has payouts and payments disabled.
 */
class RiskSignals extends ApiResource
{
    const OBJECT_NAME = 'risk_signals';
}
