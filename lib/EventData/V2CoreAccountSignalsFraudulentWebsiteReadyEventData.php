<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property null|string $account The account for which the signals belong to. Empty if this was an entityless request.
 * @property string $details Human readable description of concerns found in the website, produced by LLM. If risk_level is unknown, this explains why evaluation could not run.
 * @property int $evaluated_at Time at which the signal was evaluated.
 * @property string $evaluation_id Unique identifier for the fraudulent website evaluation request.
 * @property string $risk_level Risk level for the fraudulent website signal. If evaluation could not run (like invalid website), we return unknown.
 * @property string $signal_id Unique identifier for the fraudulent website signal.
 */
class V2CoreAccountSignalsFraudulentWebsiteReadyEventData extends \Stripe\StripeObject {}
