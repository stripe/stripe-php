<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $account Account ID that this signal is associated with.
 * @property int $evaluated_at Timestamp when the signal was evaluated.
 * @property null|(object{indicators: (object{description: string, impact: string, indicator: string}&\Stripe\StripeObject)[], probability?: string, risk_level: string}&\Stripe\StripeObject) $fraudulent_merchant Fraudulent merchant signal data. Present when type is fraudulent_merchant.
 * @property string $type The type of account signal. Currently only fraudulent_merchant is supported.
 */
class V2SignalsAccountSignalFraudulentMerchantReadyEventData extends \Stripe\StripeObject {}
