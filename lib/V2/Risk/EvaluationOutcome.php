<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Risk;

/**
 * An immutable, point-in-time risk evaluation result that captures recommended controls and
 * their expected impact. The type identifies the scenario evaluated and its corresponding details.
 * Unavailable optional values are null.
 *
 * @property string $id Unique identifier for the evaluation outcome, prefixed with evalout_.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{account?: string, customer?: string, data?: (object{contact_email?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $account_details Subject of the evaluation. Exactly one of account, customer, or data is provided.
 * @property string $created Timestamp when the evaluation was created.
 * @property null|(object{business_objective: (object{baseline_outcome?: (object{loss: \Stripe\StripeObject, profitability: \Stripe\StripeObject, revenue: \Stripe\StripeObject}&\Stripe\StripeObject), projected_outcome?: (object{loss: \Stripe\StripeObject, profitability: \Stripe\StripeObject, revenue: \Stripe\StripeObject}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), controls: (object{risk_reserve?: (object{action: string, target?: (object{percent: int, release_after_days: int, release_type: string, sweep_available_funds: bool}&\Stripe\StripeObject)}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[], risk_appetite: (object{mode: string}&\Stripe\StripeObject), supporting_signals?: (object{merchant_delinquency?: (object{evaluated_at: string, probability?: string, risk_level: string, signal: string}&\Stripe\StripeObject), payment_delinquency_exposure?: (object{evaluated_at: string, exposure_amount: \Stripe\StripeObject, signal: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $delinquency Recommended controls, expected financial impact, and supporting signals for a delinquency evaluation. Populated when type is delinquency; null otherwise.
 * @property bool $livemode Whether the evaluation outcome is in live mode.
 * @property string $origin How the outcome was generated.
 * @property string $type Scenario evaluated; determines which type-specific payload is provided.
 */
class EvaluationOutcome extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.risk.evaluation_outcome';

    public static function fieldEncodings()
    {
        return [
            'delinquency' => [
                'kind' => 'object',
                'fields' => [
                    'supporting_signals' => [
                        'kind' => 'object',
                        'fields' => [
                            'merchant_delinquency' => [
                                'kind' => 'object',
                                'fields' => [
                                    'probability' => [
                                        'kind' => 'decimal_string',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    const ORIGIN_RULE_OUTCOME = 'rule_outcome';
    const ORIGIN_STRIPE_RECOMMENDATION = 'stripe_recommendation';

    const TYPE_DELINQUENCY = 'delinquency';
}
