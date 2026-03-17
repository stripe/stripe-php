<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * The credit note line item object.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The integer amount in cents (or local equivalent) representing the gross amount being credited for this line item, excluding (exclusive) tax and discounts.
 * @property null|string $description Description of the item being credited.
 * @property int $discount_amount The integer amount in cents (or local equivalent) representing the discount being credited for this line item.
 * @property ((object{amount: int, discount: Discount|string}&StripeObject))[] $discount_amounts The amount of discount calculated per discount for this line item
 * @property null|string $invoice_line_item ID of the invoice line item being credited
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property ((object{amount: int, credit_balance_transaction?: Billing\CreditBalanceTransaction|string, discount?: Discount|string, type: string}&StripeObject))[] $pretax_credit_amounts The pretax credit amounts (ex: discount, credit grants, etc) for this line item.
 * @property null|int $quantity The number of units of product being credited.
 * @property TaxRate[] $tax_rates The tax rates which apply to the line item.
 * @property null|((object{amount: int, tax_behavior: string, tax_rate_details: null|(object{tax_rate: string}&StripeObject), taxability_reason: string, taxable_amount: null|int, type: string}&StripeObject))[] $taxes The tax information of the line item.
 * @property string $type The type of the credit note line item, one of <code>invoice_line_item</code> or <code>custom_line_item</code>. When the type is <code>invoice_line_item</code> there is an additional <code>invoice_line_item</code> property on the resource the value of which is the id of the credited line item on the invoice.
 * @property null|int $unit_amount The cost of each unit of product being credited.
 * @property null|string $unit_amount_decimal Same as <code>unit_amount</code>, but contains a decimal value with at most 12 decimal places.
 */
class CreditNoteLineItem extends ApiResource
{
    const OBJECT_NAME = 'credit_note_line_item';
}
