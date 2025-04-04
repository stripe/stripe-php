<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * Adjustments represent Stripe-initiated credits or debits to a user balance. They might be used to amend balances due to technical or operational error.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{type: string, adjustment: null|string, inbound_transfer: null|string, outbound_payment: null|string, outbound_transfer: null|string, received_credit: null|string, received_debit: null|string}&\Stripe\StripeObject) $adjusted_flow If applicable, contains information about the original flow linked to this Adjustment.
 * @property \Stripe\StripeObject $amount The amount of the Adjustment.
 * @property int $created Time at which the object was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|string $description Description of the Adjustment and what it was used for.
 * @property string $financial_account The FinancialAccount that this adjustment is for.
 * @property string $receipt_url A hosted transaction receipt URL that is provided when money movement is considered regulated under Stripe’s money transmission licenses.
 */
class Adjustment extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.adjustment';
}
