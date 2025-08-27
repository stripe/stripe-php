<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $alert_id The alert ID.
 * @property string $grouping_key The grouping key for the alert.
 * @property (object{approved_amount: null|\Stripe\StripeObject, approved_impacted_requests: null|int, declined_amount: null|\Stripe\StripeObject, declined_impacted_requests: null|int}&\Stripe\StripeObject) $impact The user impact.
 * @property int $resolved_at The time when the user experience has returned to expected levels.
 * @property int $started_at The time when impact on the user experience was first detected.
 * @property string $summary A short description of the alert.
 */
class V2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEventData extends \Stripe\StripeObject {}
