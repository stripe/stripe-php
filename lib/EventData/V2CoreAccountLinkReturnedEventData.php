<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $account_id The ID of the v2 account.
 * @property string[] $configurations Configurations on the Account that was onboarded via the account link.
 * @property string $use_case Open Enum. The use case type of the account link that has been completed.
 */
class V2CoreAccountLinkReturnedEventData extends \Stripe\StripeObject {}
