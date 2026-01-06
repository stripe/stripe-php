<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * OutboundPaymentQuote represents a quote that provides fee and amount estimates for OutboundPayment.
 *
 * @property string $id Unique identifier for the OutboundPaymentQuote.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{value?: int, currency?: string}&\Stripe\StripeObject) $amount The &quot;presentment amount&quot; for the OutboundPaymentQuote.
 * @property int $created Time at which the OutboundPaymentQuote was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|(object{speed?: string, bank_account?: string}&\Stripe\StripeObject) $delivery_options Delivery options to be used to send the OutboundPayment.
 * @property (object{amount: (object{value?: int, currency?: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[] $estimated_fees The estimated fees for the OutboundPaymentQuote.
 * @property (object{debited: (object{value?: int, currency?: string}&\Stripe\StripeObject), financial_account: string}&\Stripe\StripeObject) $from Details about the sender of an OutboundPaymentQuote.
 * @property (object{lock_duration: string, lock_expires_at?: int, lock_status: string, rates: \Stripe\StripeObject, to_currency: string}&\Stripe\StripeObject) $fx_quote The underlying FXQuote details for the OutboundPaymentQuote.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{credited: (object{value?: int, currency?: string}&\Stripe\StripeObject), payout_method: string, recipient: string}&\Stripe\StripeObject) $to Details about the recipient of an OutboundPaymentQuote.
 */
class OutboundPaymentQuote extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.outbound_payment_quote';
}
