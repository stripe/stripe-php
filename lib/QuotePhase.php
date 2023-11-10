<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A quote phase describes the line items, coupons, and trialing status of a subscription for a predefined time period.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount_subtotal Total before any discounts or taxes are applied.
 * @property int $amount_total Total after discounts and taxes are applied.
 * @property null|string $billing_cycle_anchor If set to <code>reset</code>, the billing_cycle_anchor of the subscription is set to the start of the phase when entering the phase. If unset, then the billing cycle anchor is automatically modified as needed when entering the phase. For more information, see the billing cycle <a href="https://stripe.com/docs/billing/subscriptions/billing-cycle">documentation</a>.
 * @property null|string $collection_method Either <code>charge_automatically</code>, or <code>send_invoice</code>. When charging automatically, Stripe will attempt to pay the underlying subscription at the end of each billing cycle using the default source attached to the customer. When sending an invoice, Stripe will email your customer an invoice with payment instructions and mark the subscription as <code>active</code>.
 * @property null|(string|\Stripe\TaxRate)[] $default_tax_rates The default tax rates to apply to the subscription during this phase of the quote.
 * @property (string|\Stripe\Discount)[] $discounts The stackable discounts that will be applied to the subscription on this phase. Subscription item discounts are applied before subscription discounts.
 * @property null|int $end_date The end of this phase of the quote
 * @property null|\Stripe\StripeObject $invoice_settings The invoice settings applicable during this phase.
 * @property null|int $iterations Integer representing the multiplier applied to the price interval. For example, <code>iterations=2</code> applied to a price with <code>interval=month</code> and <code>interval_count=3</code> results in a phase of duration <code>2 * 3 months = 6 months</code>.
 * @property null|\Stripe\Collection<\Stripe\LineItem> $line_items A list of items the customer is being quoted for.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that will declaratively set metadata on the subscription schedule's phases when the quote is accepted.
 * @property string $proration_behavior If the quote will prorate when transitioning to this phase. Possible values are <code>create_prorations</code> and <code>none</code>.
 * @property \Stripe\StripeObject $total_details
 * @property null|bool $trial If set to true the entire phase is counted as a trial and the customer will not be charged for any recurring fees.
 * @property null|int $trial_end When the trial ends within the phase.
 */
class QuotePhase extends ApiResource
{
    const OBJECT_NAME = 'quote_phase';

    use ApiOperations\All;
    use ApiOperations\Retrieve;

    const COLLECTION_METHOD_CHARGE_AUTOMATICALLY = 'charge_automatically';
    const COLLECTION_METHOD_SEND_INVOICE = 'send_invoice';

    const PRORATION_BEHAVIOR_ALWAYS_INVOICE = 'always_invoice';
    const PRORATION_BEHAVIOR_CREATE_PRORATIONS = 'create_prorations';
    const PRORATION_BEHAVIOR_NONE = 'none';

    /**
     * @param string $id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\LineItem> list of line items
     */
    public static function allLineItems($id, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/line_items';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
