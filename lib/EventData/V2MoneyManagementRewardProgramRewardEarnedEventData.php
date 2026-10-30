<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $account The connected account that earned the reward.
 * @property null|(object{cardholder?: string, issuing_transaction?: string}&\Stripe\StripeObject) $card_spend Issuing card spend details for the reward.
 * @property (object{amount: \Stripe\StripeObject, earning_period?: (object{end: int, start: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $reward The reward to credit to the connected account.
 */
class V2MoneyManagementRewardProgramRewardEarnedEventData extends \Stripe\StripeObject {}
