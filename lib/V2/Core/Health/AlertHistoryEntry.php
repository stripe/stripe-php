<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core\Health;

/**
 * An alert history entry representing a state transition of a health alert.
 *
 * @property string $id Unique identifier for the alert history entry.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{canonical_path: string, error_code?: string, http_method: string, http_status: string, impacted_requests: int, impacted_requests_percentage?: string, top_impacted_accounts?: (object{account: string, impacted_requests: int, impacted_requests_percentage?: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject) $api_error Populated when type is api_error.
 * @property null|(object{canonical_path: string, http_method: string, http_status: string, impacted_requests: int, impacted_requests_percentage?: string, top_impacted_accounts?: (object{account: string, impacted_requests: int, impacted_requests_percentage?: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject) $api_latency Populated when type is api_latency.
 * @property int $at The time at which this transition occurred.
 * @property null|(object{charge_type: string, current_percentage: string, dimensions?: (object{issuer?: string, type: string}&\Stripe\StripeObject)[], payment_method_type: string, previous_percentage: string}&\Stripe\StripeObject) $authorization_rate_drop Populated when type is authorization_rate_drop.
 * @property null|(object{element_type?: string, impacted_sessions: int}&\Stripe\StripeObject) $elements_error Populated when type is elements_error.
 * @property null|(object{context?: string, event_type: string, related_object: (object{id: string, type: string, url: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $event_generation_failure Populated when type is event_generation_failure.
 * @property null|(object{attack_type: string, impacted_requests: int, realized_fraud_amount: \Stripe\StripeObject}&\Stripe\StripeObject) $fraud_rate Populated when type is fraud_rate.
 * @property null|(object{observed_count: string, threshold_count: string, time_window: string}&\Stripe\StripeObject) $invoice_count_dropped Populated when type is invoice_count_dropped.
 * @property null|(object{approved_amount?: \Stripe\StripeObject, approved_impacted_requests?: int, declined_amount?: \Stripe\StripeObject, declined_impacted_requests?: int}&\Stripe\StripeObject) $issuing_authorization_request_errors Populated when type is issuing_authorization_request_errors.
 * @property null|(object{approved_amount?: \Stripe\StripeObject, approved_impacted_requests?: int, declined_amount?: \Stripe\StripeObject, declined_impacted_requests?: int}&\Stripe\StripeObject) $issuing_authorization_request_timeout Populated when type is issuing_authorization_request_timeout.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{ingestion_method?: string}&\Stripe\StripeObject) $meter_event_summaries_delayed Populated when type is meter_event_summaries_delayed.
 * @property null|(object{pipeline: string}&\Stripe\StripeObject) $metronome_notification_latency Populated when type is metronome_notification_latency.
 * @property null|(object{error_code?: string, impacted_requests: int, impacted_requests_percentage?: string, payment_method_type: string, top_impacted_accounts?: (object{account: string, impacted_requests: int, impacted_requests_percentage?: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject) $payment_method_error Populated when type is payment_method_error.
 * @property null|(object{impacted_payments: int, impacted_payments_percentage: string}&\Stripe\StripeObject) $sepa_debit_delayed Populated when type is sepa_debit_delayed.
 * @property null|(object{actual_traffic: int, canonical_path?: string, expected_traffic?: int, time_window: string}&\Stripe\StripeObject) $traffic_volume_drop Populated when type is traffic_volume_drop.
 * @property string $transition The type of transition that occurred.
 * @property string $type The type of the alert. Determines which sub-hash field is populated.
 * @property null|(object{impacted_requests: int}&\Stripe\StripeObject) $webhook_latency Populated when type is webhook_latency.
 */
class AlertHistoryEntry extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.health.alert_history_entry';

    public static function fieldEncodings()
    {
        return [
            'api_error' => [
                'kind' => 'object',
                'fields' => [
                    'impacted_requests_percentage' => [
                        'kind' => 'decimal_string',
                    ],
                    'top_impacted_accounts' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'impacted_requests_percentage' => [
                                    'kind' => 'decimal_string',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'api_latency' => [
                'kind' => 'object',
                'fields' => [
                    'impacted_requests_percentage' => [
                        'kind' => 'decimal_string',
                    ],
                    'top_impacted_accounts' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'impacted_requests_percentage' => [
                                    'kind' => 'decimal_string',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'authorization_rate_drop' => [
                'kind' => 'object',
                'fields' => [
                    'current_percentage' => ['kind' => 'decimal_string'],
                    'previous_percentage' => ['kind' => 'decimal_string'],
                ],
            ],
            'invoice_count_dropped' => [
                'kind' => 'object',
                'fields' => [
                    'observed_count' => ['kind' => 'decimal_string'],
                    'threshold_count' => ['kind' => 'decimal_string'],
                ],
            ],
            'payment_method_error' => [
                'kind' => 'object',
                'fields' => [
                    'impacted_requests_percentage' => [
                        'kind' => 'decimal_string',
                    ],
                    'top_impacted_accounts' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'impacted_requests_percentage' => [
                                    'kind' => 'decimal_string',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'sepa_debit_delayed' => [
                'kind' => 'object',
                'fields' => [
                    'impacted_payments_percentage' => [
                        'kind' => 'decimal_string',
                    ],
                ],
            ],
        ];
    }

    const TRANSITION_IMPACT_UPDATED = 'impact_updated';
    const TRANSITION_OPENED = 'opened';
    const TRANSITION_RESOLVED = 'resolved';

    const TYPE_API_ERROR = 'api_error';
    const TYPE_API_LATENCY = 'api_latency';
    const TYPE_AUTHORIZATION_RATE_DROP = 'authorization_rate_drop';
    const TYPE_ELEMENTS_ERROR = 'elements_error';
    const TYPE_EVENT_GENERATION_FAILURE = 'event_generation_failure';
    const TYPE_FRAUD_RATE = 'fraud_rate';
    const TYPE_INVOICE_COUNT_DROPPED = 'invoice_count_dropped';
    const TYPE_ISSUING_AUTHORIZATION_REQUEST_ERRORS = 'issuing_authorization_request_errors';
    const TYPE_ISSUING_AUTHORIZATION_REQUEST_TIMEOUT = 'issuing_authorization_request_timeout';
    const TYPE_METER_EVENT_SUMMARIES_DELAYED = 'meter_event_summaries_delayed';
    const TYPE_METRONOME_NOTIFICATION_LATENCY = 'metronome_notification_latency';
    const TYPE_PAYMENT_METHOD_ERROR = 'payment_method_error';
    const TYPE_SEPA_DEBIT_DELAYED = 'sepa_debit_delayed';
    const TYPE_TRAFFIC_VOLUME_DROP = 'traffic_volume_drop';
    const TYPE_WEBHOOK_LATENCY = 'webhook_latency';
}
