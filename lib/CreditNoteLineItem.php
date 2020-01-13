<?php

namespace Stripe;

/**
 * Class InvoiceLineItem
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
 * @property int|null $unit_amount
 * @property string|null $unit_amount_decimal
 *
 * @package Stripe
 */
class CreditNoteLineItem extends ApiResource
{
    const OBJECT_NAME = 'credit_note_line_item';
}
