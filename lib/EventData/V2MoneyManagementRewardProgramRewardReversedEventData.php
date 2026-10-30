<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $account The connected account whose reward is reversed.
 * @property null|(object{cardholder?: string, issuing_transaction?: string, original_transaction?: string}&\Stripe\StripeObject) $card_spend Issuing card spend details for the reversal.
 * @property (object{amount: \Stripe\StripeObject, earning_period?: (object{end: int, start: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $reward The reward to debit from the connected account.
 */
class V2MoneyManagementRewardProgramRewardReversedEventData extends \Stripe\StripeObject {}
