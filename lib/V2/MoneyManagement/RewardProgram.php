<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A RewardProgram represents shared card-spend cashback reward configuration for Issuing Card-Spend
 * Rewards. It is not scoped to a single Issuer Program or connected account.
 *
 * @property string $id Unique identifier for the RewardProgram.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $created Time at which the RewardProgram was created.
 * @property string $fulfilled_by Determines who performs reward money movement after rule evaluation. Immutable after creation.
 * @property bool $livemode Whether this object exists in livemode or testmode.
 * @property string $name Display name for the RewardProgram.
 * @property string $status The status of the RewardProgram. Inactive by default on creation; use activate/deactivate to change.
 */
class RewardProgram extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.reward_program';

    const FULFILLED_BY_APPLICATION = 'application';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
}
