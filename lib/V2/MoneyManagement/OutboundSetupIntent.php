<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * Use the OutboundSetupIntent API to create and setup usable payout methods.
 *
 * @property string $id ID of the outbound setup intent.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Created timestamp.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{type: string, confirmation_of_payee?: (object{object: string, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $next_action Specifies which actions needs to be taken next to continue setup of the credential.
 * @property PayoutMethod $payout_method Use the PayoutMethods API to list and interact with PayoutMethod objects.
 * @property string $status Closed Enum. Status of the outbound setup intent.
 * @property string $usage_intent The intended money movement flow this payout method should be set up for, specified in params.
 */
class OutboundSetupIntent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.outbound_setup_intent';

    const STATUS_CANCELED = 'canceled';
    const STATUS_REQUIRES_ACTION = 'requires_action';
    const STATUS_REQUIRES_PAYOUT_METHOD = 'requires_payout_method';
    const STATUS_SUCCEEDED = 'succeeded';

    const USAGE_INTENT_PAYMENT = 'payment';
    const USAGE_INTENT_TRANSFER = 'transfer';
}
