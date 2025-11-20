<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $alert_id The alert ID.
 * @property string $grouping_key The grouping key for the alert.
 * @property (object{approved_amount?: (object{value?: int, currency?: string}&\Stripe\StripeObject), approved_impacted_requests?: int, declined_amount?: (object{value?: int, currency?: string}&\Stripe\StripeObject), declined_impacted_requests?: int}&\Stripe\StripeObject) $impact The user impact.
 * @property int $started_at The time when impact on the user experience was first detected.
 * @property string $summary A short description of the alert.
 */
class V2CoreHealthIssuingAuthorizationRequestTimeoutFiringEventData extends \Stripe\StripeObject {}
