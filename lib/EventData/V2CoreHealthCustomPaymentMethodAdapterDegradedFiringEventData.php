<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $alert_id The alert ID.
 * @property string $grouping_key The grouping key for the alert.
 * @property (object{custom_payment_method_disabled_from_checkout: bool, custom_payment_method_type_details: (object{auto_disabled_at?: int, display_name: string, reverse_api_url: string, type: string}&\Stripe\StripeObject), degraded_health_reason: string}&\Stripe\StripeObject) $impact The user impact.
 * @property string $severity The severity of the alert.
 * @property int $started_at The time when impact on the user experience was first detected.
 * @property string $summary A short description of the alert.
 */
class V2CoreHealthCustomPaymentMethodAdapterDegradedFiringEventData extends \Stripe\StripeObject {}
