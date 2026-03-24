<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $account The account for which the signals belong to.
 * @property int $evaluated_at Time at which the signal was evaluated.
 * @property (object{description: string, impact: string, indicator: string}&\Stripe\StripeObject)[] $indicators Array of objects representing individual factors that contributed to the calculated probability of delinquency.
 * @property null|string $probability The probability of delinquency. Can be between 0.00 and 100.00.
 * @property string $risk_level Categorical assessment of the delinquency risk based on probability.
 * @property string $signal_id Unique identifier for the delinquency signal.
 */
class V1AccountSignalsIncludingDelinquencyCreatedEventData extends \Stripe\StripeObject {}
