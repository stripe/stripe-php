<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Invoice Items represent the component lines of an [invoice](https://stripe.com/docs/api/invoices). An invoice item is
 * added to an invoice by creating or updating it with an `invoice`
 * field, at which point it will be included as [an invoice line item](https://stripe.com/docs/api/invoices/line_item)
 * within [invoice.lines](https://stripe.com/docs/api/invoices/object#invoice_object-lines).
 *
 * Invoice Items can be created before you are ready to actually send the invoice.
 * This can be particularly useful when combined with a [subscription](https://stripe.com/docs/api/subscriptions). Sometimes you
 * want to add a charge or credit to a customer, but actually charge or credit the
 * customer’s card only at the end of a regular billing cycle. This is useful for
 * combining several charges (to minimize per-transaction fees), or for having
 * Stripe tabulate your usage-based billing totals.
 *
 * Related guides: [Integrate with the Invoicing API](https://stripe.com/docs/invoicing/integration), [Subscription Invoices](https://stripe.com/docs/billing/invoices/subscription#adding-upcoming-invoice-items).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount (in the `currency` specified) of the invoice item. This should always be equal to `unit_amount * quantity`.
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property string|\Stripe\Customer $customer The ID of the customer who will be billed when this invoice item is billed.
 * @property int $date Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property bool $discountable If true, discounts will apply to this invoice item. Always false for prorations.
 * @property null|(string|\Stripe\Discount)[] $discounts The discounts which apply to the invoice item. Item discounts are applied before invoice discounts. Use `expand[]=discounts` to expand each discount.
 * @property null|string|\Stripe\Invoice $invoice The ID of the invoice this invoice item belongs to.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\StripeObject $period
 * @property null|\Stripe\Plan $plan If the invoice item is a proration, the plan of the subscription that the proration was computed for.
 * @property null|\Stripe\Price $price The price of the invoice item.
 * @property bool $proration Whether the invoice item was created automatically as a proration adjustment when the customer switched plans.
 * @property int $quantity Quantity of units for the invoice item. If the invoice item is a proration, the quantity of the subscription that the proration was computed for.
 * @property null|string|\Stripe\Subscription $subscription The subscription that this invoice item has been created for, if any.
 * @property null|string $subscription_item The subscription item that this invoice item has been created for, if any.
 * @property null|\Stripe\TaxRate[] $tax_rates The tax rates which apply to the invoice item. When set, the `default_tax_rates` on the invoice do not apply to this invoice item.
 * @property null|string|\Stripe\TestHelpers\TestClock $test_clock ID of the test clock this invoice item belongs to.
 * @property null|int $unit_amount Unit amount (in the `currency` specified) of the invoice item.
 * @property null|string $unit_amount_decimal Same as `unit_amount`, but contains a decimal value with at most 12 decimal places.
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
