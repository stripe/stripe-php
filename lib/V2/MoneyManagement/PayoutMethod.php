<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * Use the PayoutMethods API to list and interact with PayoutMethod objects.
 *
 * @property string $id ID of the PayoutMethod object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string[] $available_payout_speeds A set of available payout speeds for this payout method.
 * @property null|(object{archived: bool, bank_account_type: string, bank_name: string, country: string, enabled_delivery_options: string[], last4: string, routing_number: null|string, supported_currencies: string[]}&\Stripe\StripeObject) $bank_account The PayoutMethodBankAccount object details.
 * @property null|(object{archived: bool, exp_month: string, exp_year: string, last4: string}&\Stripe\StripeObject) $card The PayoutMethodCard object details.
 * @property int $created Created timestamp.
 * @property null|string $latest_outbound_setup_intent ID of the underlying active OutboundSetupIntent object, if any.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $type Closed Enum. The type of payout method.
 * @property (object{payments: string, transfers: string}&\Stripe\StripeObject) $usage_status Indicates whether the payout method has met the necessary requirements for outbound money movement.
 */
class PayoutMethod extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.payout_method';

    const TYPE_BANK_ACCOUNT = 'bank_account';
    const TYPE_CARD = 'card';
}
