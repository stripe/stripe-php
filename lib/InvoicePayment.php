<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Invoice Payments represent payments made against invoices. Invoice Payments can
 * be accessed in two ways:
 * 1. By expanding the <code>payments</code> field on the <a href="https://stripe.com/docs/api#invoice">Invoice</a> resource.
 * 2. By using the Invoice Payment retrieve and list endpoints.
 *
 * Invoice Payments include the mapping between payment objects, such as Payment Intent, and Invoices.
 * This resource and its endpoints allows you to easily track if a payment is associated with a specific invoice and
 * monitor the allocation details of the payments.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|int $amount_paid Amount that was actually paid for this invoice, in cents (or local equivalent). This field is null until the payment is <code>paid</code>. This amount can be less than the <code>amount_requested</code> if the PaymentIntent’s <code>amount_received</code> is not sufficient to pay all of the invoices that it is attached to.
 * @property int $amount_requested Amount intended to be paid toward this invoice, in cents (or local equivalent)
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property Invoice|string $invoice The invoice that was paid.
 * @property bool $is_default Stripe automatically creates a default InvoicePayment when the invoice is finalized, and keeps it synchronized with the invoice’s <code>amount_remaining</code>. The PaymentIntent associated with the default payment can’t be edited or canceled directly.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{charge?: Charge|string, payment_intent?: PaymentIntent|string, payment_record?: PaymentRecord|string, type: string}&StripeObject) $payment
 * @property string $status The status of the payment, one of <code>open</code>, <code>paid</code>, or <code>canceled</code>.
 * @property (object{canceled_at: null|int, paid_at: null|int}&StripeObject) $status_transitions
 */
class InvoicePayment extends ApiResource
{
    const OBJECT_NAME = 'invoice_payment';

    /**
     * When retrieving an invoice, there is an includable payments property containing
     * the first handful of those items. There is also a URL where you can retrieve the
     * full (paginated) list of payments.
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], invoice?: string, limit?: int, payment?: array{payment_intent?: string, payment_record?: string, type: string}, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<InvoicePayment> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the invoice payment with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return InvoicePayment
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
