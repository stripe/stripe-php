<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property null|string $doc_url Stripe doc link to debug the issue.
 * @property string $message User Message detailing the reason code and possible resolution .
 * @property string $reason_code Open Enum. The <code>errored</code> status reason.
 */
class V2PaymentsSettlementAllocationIntentErroredEventData extends \Stripe\StripeObject {}
