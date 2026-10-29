<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A FinancialAccount represents a balance and can be the source or destination of money movement.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{available: \Stripe\StripeObject, inbound_pending: \Stripe\StripeObject, outbound_pending: \Stripe\StripeObject}&\Stripe\StripeObject) $balance The FinancialAccount's balance, split into <code>available</code>, <code>inbound_pending</code>, and <code>outbound_pending</code> balances. Each balance is a hash keyed by lowercase currency codes, with an amount for each currency.
 * @property string $country Open Enum. The country where the LegalEntity associated with the FinancialAccount is based, represented as a two-letter country code.
 * @property string $created Time at which the object was created. Represented as an RFC 3339 timestamp in UTC with millisecond precision, for example <code>2022-09-18T13:22:18.123Z</code>.
 * @property null|string $display_name A descriptive name for the FinancialAccount, up to 50 characters long. This name appears in the Stripe Dashboard and embedded components.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{type: string}&\Stripe\StripeObject) $other If the FinancialAccount's <code>type</code> is <code>other</code>, this hash identifies its actual type. Upgrade your API version to see that type in <code>type</code>.
 * @property string $status Closed Enum. An enum representing the status of the FinancialAccount. This indicates whether or not the FinancialAccount can be used for any money movement flows.
 * @property null|(object{closed?: (object{forwarding_settings?: (object{payment_method?: string, payout_method?: string}&\Stripe\StripeObject), reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Additional details related to the status of the FinancialAccount.
 * @property null|(object{deposit_insurance_eligibility?: (object{bank_name: string, currencies: string[], type: string}&\Stripe\StripeObject)[], holds_currencies: string[]}&\Stripe\StripeObject) $storage If the FinancialAccount's <code>type</code> is <code>storage</code>, this hash contains details specific to that type.
 * @property string $type Closed Enum. The type of the FinancialAccount. Details specific to the type appear in the matching hash. For example, a <code>storage</code> FinancialAccount includes a <code>storage</code> hash.
 */
class FinancialAccount extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.financial_account';

    const STATUS_CLOSED = 'closed';
    const STATUS_OPEN = 'open';
    const STATUS_PENDING = 'pending';

    const TYPE_OTHER = 'other';
    const TYPE_STORAGE = 'storage';
}
