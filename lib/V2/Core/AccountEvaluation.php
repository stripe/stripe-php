<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * Account Evaluation resource.
 *
 * @property string $id Unique identifier for the account evaluation.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|string $account The account ID if this evaluation is for an existing account.
 * @property null|(object{defaults?: (object{profile: (object{business_url: string, doing_business_as?: string, product_description?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), identity?: (object{business_details: (object{registered_name?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $account_data Account data if this evaluation is for an account without an existing Stripe entity.
 * @property int $created Timestamp at which the evaluation was created.
 * @property string[] $evaluations_triggered List of signals that were triggered for evaluation.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class AccountEvaluation extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.account_evaluation';
}
