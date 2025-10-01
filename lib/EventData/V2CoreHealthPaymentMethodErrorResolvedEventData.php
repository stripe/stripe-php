<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $grouping_key The grouping key for the alert.
 * @property (object{error_code?: string, impacted_requests: int, payment_method_type: string}&\Stripe\StripeObject) $impact The user impact.
 * @property int $resolved_at The time when the user experience has returned to expected levels.
 * @property int $started_at The time when impact on the user experience was first detected.
 * @property string $summary A short description of the alert.
 */
class V2CoreHealthPaymentMethodErrorResolvedEventData extends \Stripe\StripeObject {}
