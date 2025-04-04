<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $developer_message_summary Extra field included in the event's <code>data</code> when fetched from /v2/events.
 * @property (object{error_count: int, error_types: (object{code: string, error_count: int, sample_errors: (object{error_message: string, request: (object{identifier: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)[]}&\Stripe\StripeObject) $reason This contains information about why meter error happens.
 * @property int $validation_end The end of the window that is encapsulated by this summary.
 * @property int $validation_start The start of the window that is encapsulated by this summary.
 */
class V1BillingMeterNoMeterFoundEventData extends \Stripe\StripeObject {}
