<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $grouping_key The grouping key for the alert.
 * @property (object{impacted_payments: int, impacted_payments_percentage: string}&\Stripe\StripeObject) $impact The user impact.
 * @property int $started_at The time when impact on the user experience was first detected.
 * @property string $summary A short description of the alert.
 */
class V2CoreHealthSepaDebitDelayedFiringEventData extends \Stripe\StripeObject {}
