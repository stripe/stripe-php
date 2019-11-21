<?php

namespace Stripe;

/**
 * Class InvoiceItem
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string $currency
 * @property string $customer
 * @property int $date
 * @property string $description
 * @property bool $discountable
 * @property string $invoice
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property mixed $period
 * @property mixed $plan
 * @property bool $proration
 * @property int $quantity
 * @property string $subscription
 * @property string $subscription_item
 * @property mixed $tax_rates
 * @property bool $unified_proration
 * @property int $unit_amount
 * @property string $unit_amount_decimal
 *
 * @package Stripe
 */
class InvoiceItem extends ApiResource
{
    const OBJECT_NAME = 'invoiceitem';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
