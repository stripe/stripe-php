<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * The invoice payment object.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|int $amount_overpaid Excess payment that was received for this invoice and credited to the customer’s <code>invoice_credit_balance</code>. This field is null until the payment is <code>paid</code>. Overpayment can happen when you attach more than one PaymentIntent to the invoice, and each of them succeeds. To avoid overpayment, cancel any PaymentIntents that you do not need before attaching more.
 * @property null|int $amount_paid Amount that was actually paid for this invoice, in cents (or local equivalent). This field is null until the payment is <code>paid</code>. This amount can be less than the <code>amount_requested</code> if the PaymentIntent’s <code>amount_received</code> is not sufficient to pay all of the invoices that it is attached to.
 * @property int $amount_requested Amount intended to be paid toward this invoice, in cents (or local equivalent)
 * @property null|string|\Stripe\Charge $charge ID of the successful charge for this payment. This field is null when the payment is <code>open</code> or <code>canceled</code>.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string|\Stripe\Invoice $invoice The invoice that was paid.
 * @property null|bool $is_default Stripe automatically creates a default InvoicePayment when the invoice is finalized, and keeps it synchronized with the invoice’s <code>amount_remaining</code>. The PaymentIntent associated with the default payment can’t be edited or canceled directly.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string|\Stripe\PaymentIntent $payment_intent ID of the PaymentIntent associated with this payment. Note: This property is only populated for invoices finalized on or after March 15th, 2019.
 * @property string $status The status of the payment, one of <code>open</code>, <code>paid</code>, or <code>canceled</code>.
 * @property \Stripe\StripeObject $status_transitions
 */
class InvoicePayment extends ApiResource
{
    const OBJECT_NAME = 'invoice_payment';
}
