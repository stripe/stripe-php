<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $alert_id The alert ID.
 * @property string $grouping_key The grouping key for the alert.
 * @property (object{attack_type: string, impacted_requests: int, realized_fraud_amount: (object{value?: int, currency?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $impact The user impact.
 * @property null|int $resolved_at The time when the user experience has returned to expected levels.
 * @property int $started_at The time when impact on the user experience was first detected.
 * @property string $summary A short description of the alert.
 */
class V2CoreHealthFraudRateIncreasedEventData extends \Stripe\StripeObject {}
