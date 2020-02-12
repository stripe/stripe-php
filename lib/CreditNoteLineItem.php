<?php

namespace Stripe;

/**
 * Class InvoiceLineItem.
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string $description
 * @property int $discount_amount
 * @property string $invoice_line_item
 * @property bool $livemode
 * @property int $quantity
 * @property array $tax_amounts
 * @property array $tax_rates
 * @property string $type
 * @property null|int $unit_amount
 * @property null|string $unit_amount_decimal
 */
class CreditNoteLineItem extends ApiResource
{
    const OBJECT_NAME = 'credit_note_line_item';
}
