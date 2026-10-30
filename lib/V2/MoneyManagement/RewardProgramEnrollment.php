<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A RewardProgramEnrollment represents the binding of a connected account / Issuer Program to a shared
 * RewardProgram. RewardProgramEnrollments are platform-owned canonical objects and are active by default
 * on creation. At most one RewardProgramEnrollment may be active per Issuer Program globally, across all
 * RewardPrograms.
 *
 * @property string $id Unique identifier for the RewardProgramEnrollment.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $account The connected account enrolled in this RewardProgram. Immutable after creation.
 * @property (object{issuer_program: string}&\Stripe\StripeObject) $card_spend Issuing-specific per-enrollment configuration. Immutable after creation.
 * @property string $created Time at which the RewardProgramEnrollment was created.
 * @property bool $livemode Whether this object exists in livemode or testmode.
 * @property string $reward_program The ID of the RewardProgram this enrollment belongs to. Immutable after creation.
 * @property string $status The status of the RewardProgramEnrollment. Active by default on creation; use activate/deactivate to change.
 */
class RewardProgramEnrollment extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.reward_program_enrollment';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
}
