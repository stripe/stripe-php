<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * Adjustments represent Stripe-initiated credits or debits to a user balance. They might be used to amend balances due to technical or operational error.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{type: string, adjustment?: string, inbound_transfer?: string, outbound_payment?: string, outbound_transfer?: string, received_credit?: string, received_debit?: string}&\Stripe\StripeObject) $adjusted_flow If applicable, contains information about the original flow linked to this Adjustment.
 * @property (object{value?: int, currency?: string}&\Stripe\StripeObject) $amount The amount of the Adjustment.
 * @property int $created Time at which the object was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|string $description Description of the Adjustment and what it was used for.
 * @property string $financial_account The FinancialAccount that this adjustment is for.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $receipt_url A link to the Stripe-hosted receipt that is provided when money movement is considered regulated under Stripe’s money transmission licenses. The receipt link remains active for 60 days from the Adjustment creation date. After this period, the link will expire and the receipt url value will be null.
 */
class Adjustment extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.adjustment';
}
