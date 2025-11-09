<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $alert_id The alert ID.
 * @property string $grouping_key The grouping key for the alert.
 * @property (object{context?: string, event_type: string, related_object: (object{id: string, type: string, url: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $impact The user impact.
 * @property int $resolved_at The time when the user experience has returned to expected levels.
 * @property string $summary A short description of the alert.
 */
class V2CoreHealthEventGenerationFailureResolvedEventData extends \Stripe\StripeObject {}
