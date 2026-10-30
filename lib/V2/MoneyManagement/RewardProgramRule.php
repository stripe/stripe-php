<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A RewardProgramRule defines the matching conditions and cashback reward outcome shared across all
 * active enrollments in a RewardProgram. At most one RewardProgramRule may be active per RewardProgram
 * at a time.
 *
 * @property string $id Unique identifier for the RewardProgramRule.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{card_spend?: (object{merchant_category_codes?: (object{excluded: string[], included: string[]}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $condition Conditions that must be true for this rule to match a card transaction. Empty means the rule matches all transactions.
 * @property string $created Time at which the RewardProgramRule was created.
 * @property bool $livemode Whether this object exists in livemode or testmode.
 * @property string $name Human-readable name for this rule. Max 250 characters.
 * @property (object{cashback: (object{rate: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $reward The reward to grant when this rule matches.
 * @property string $reward_program The ID of the RewardProgram this rule belongs to. Immutable after creation.
 * @property string $status The status of the RewardProgramRule. Inactive by default on creation; use activate/deactivate to change.
 */
class RewardProgramRule extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.reward_program_rule';

    public static function fieldEncodings()
    {
        return [
            'reward' => [
                'kind' => 'object',
                'fields' => [
                    'cashback' => [
                        'kind' => 'object',
                        'fields' => ['rate' => ['kind' => 'decimal_string']],
                    ],
                ],
            ],
        ];
    }

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
}
