<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A FinancialAccount represents a balance and can be used as the source or destination for the money management (<code>/v2/money_management</code>) APIs.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{available: \Stripe\StripeObject, inbound_pending: \Stripe\StripeObject, outbound_pending: \Stripe\StripeObject}&\Stripe\StripeObject) $balance Multi-currency balance of this FinancialAccount, split by availability state. Each balance is represented as a hash where the key is the three-letter ISO currency code, in lowercase, and the value is the amount for that currency.
 * @property string $country Open Enum. Two-letter country code that represents the country where the LegalEntity associated with the FinancialAccount is based in.
 * @property int $created Time at which the object was created.
 * @property null|string $display_name A descriptive name for the FinancialAccount, up to 50 characters long. This name will be used in the Stripe Dashboard and embedded components.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{type: string}&\Stripe\StripeObject) $managed_by If this is a managed FinancialAccount, <code>managed_by</code> indicates the product that created and manages this FinancialAccount. For managed FinancialAccounts, creation of money management resources can only be orchestrated by the managing product.
 * @property null|\Stripe\StripeObject $metadata Metadata associated with the FinancialAccount.
 * @property null|(object{type: string}&\Stripe\StripeObject) $other If this is a <code>other</code> FinancialAccount, this hash indicates what the actual type is. Upgrade your API version to see it reflected in <code>type</code>.
 * @property null|(object{default_currency: string, settlement_currencies: string[]}&\Stripe\StripeObject) $payments If this is a <code>payments</code> FinancialAccount, this hash include details specific to <code>payments</code> FinancialAccount.
 * @property string $status Closed Enum. An enum representing the status of the FinancialAccount. This indicates whether or not the FinancialAccount can be used for any money movement flows.
 * @property null|(object{closed?: (object{forwarding_settings?: (object{payment_method?: string, payout_method?: string}&\Stripe\StripeObject), reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details
 * @property null|(object{holds_currencies: string[]}&\Stripe\StripeObject) $storage If this is a <code>storage</code> FinancialAccount, this hash includes details specific to <code>storage</code> FinancialAccounts.
 * @property string $type Type of the FinancialAccount. An additional hash is included on the FinancialAccount with a name matching this value. It contains additional information specific to the FinancialAccount type.
 */
class FinancialAccount extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.financial_account';

    const STATUS_CLOSED = 'closed';
    const STATUS_OPEN = 'open';
    const STATUS_PENDING = 'pending';

    const TYPE_OTHER = 'other';
    const TYPE_PAYMENTS = 'payments';
    const TYPE_STORAGE = 'storage';
}
