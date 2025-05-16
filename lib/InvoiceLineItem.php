<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Invoice Line Items represent the individual lines within an <a href="https://stripe.com/docs/api/invoices">invoice</a> and only exist within the context of an invoice.
 *
 * Each line item is backed by either an <a href="https://stripe.com/docs/api/invoiceitems">invoice item</a> or a <a href="https://stripe.com/docs/api/subscription_items">subscription item</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount The amount, in cents (or local equivalent).
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|((object{amount: int, discount: Discount|string}&StripeObject))[] $discount_amounts The amount of discount calculated per discount for this line item.
 * @property bool $discountable If true, discounts will apply to this line item. Always false for prorations.
 * @property (Discount|string)[] $discounts The discounts applied to the invoice line item. Line item discounts are applied before invoice discounts. Use <code>expand[]=discounts</code> to expand each discount.
 * @property null|string $invoice The ID of the invoice that contains this line item.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format. Note that for line items with <code>type=subscription</code>, <code>metadata</code> reflects the current metadata from the subscription associated with the line item, unless the invoice line was directly updated with different metadata after creation.
 * @property null|(object{invoice_item_details: null|(object{invoice_item: string, proration: bool, proration_details: null|(object{credited_items: null|(object{invoice: string, invoice_line_items: string[]}&StripeObject)}&StripeObject), subscription: null|string}&StripeObject), subscription_item_details: null|(object{invoice_item: null|string, proration: bool, proration_details: null|(object{credited_items: null|(object{invoice: string, invoice_line_items: string[]}&StripeObject)}&StripeObject), subscription: null|string, subscription_item: string}&StripeObject), type: string}&StripeObject) $parent The parent that generated this invoice
 * @property (object{end: int, start: int}&StripeObject) $period
 * @property null|((object{amount: int, credit_balance_transaction?: null|Billing\CreditBalanceTransaction|string, discount?: Discount|string, type: string}&StripeObject))[] $pretax_credit_amounts Contains pretax credit amounts (ex: discount, credit grants, etc) that apply to this line item.
 * @property null|(object{price_details?: (object{price: string, product: string}&StripeObject), type: string, unit_amount_decimal: null|string}&StripeObject) $pricing The pricing information of the line item.
 * @property null|int $quantity The quantity of the subscription, if the line item is a subscription or a proration.
 * @property null|string|Subscription $subscription
 * @property null|((object{amount: int, tax_behavior: string, tax_rate_details: null|(object{tax_rate: string}&StripeObject), taxability_reason: string, taxable_amount: null|int, type: string}&StripeObject))[] $taxes The tax information of the line item.
 */
class InvoiceLineItem extends ApiResource
{
    const OBJECT_NAME = 'line_item';

    use ApiOperations\Update;

    /**
     * Updates an invoice’s line item. Some fields, such as <code>tax_amounts</code>,
     * only live on the invoice line item, so they can only be updated through this
     * endpoint. Other fields, such as <code>amount</code>, live on both the invoice
     * item and the invoice line item, so updates on this endpoint will propagate to
     * the invoice item as well. Updating an invoice’s line item is only possible
     * before the invoice is finalized.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{amount?: int, description?: string, discountable?: bool, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], metadata?: null|array<string, string>, period?: array{end: int, start: int}, price_data?: array{currency: string, product?: string, product_data?: array{description?: string, images?: string[], metadata?: array<string, string>, name: string, tax_code?: string}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, pricing?: array{price?: string}, quantity?: int, tax_amounts?: null|array{amount: int, tax_rate_data: array{country?: string, description?: string, display_name: string, inclusive: bool, jurisdiction?: string, jurisdiction_level?: string, percentage: float, state?: string, tax_type?: string}, taxability_reason?: string, taxable_amount: int}[], tax_rates?: null|string[]} $params
     * @param null|array|string $opts
     *
     * @return InvoiceLineItem the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
