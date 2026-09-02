<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $id Unique identifier for the payment retry evaluation.
 * @property bool $livemode Whether the event was created in livemode.
 * @property null|string $payment_intent The PaymentIntent ID. Present when the evaluation is for a PaymentIntent.
 * @property null|string $payment_record The PaymentRecord ID. Present when the evaluation is for a PaymentRecord.
 */
class V2SignalsPaymentRetryEvaluationsRetryRecommendedEventData extends \Stripe\StripeObject {}
