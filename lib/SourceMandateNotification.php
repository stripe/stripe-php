<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Source mandate notifications should be created when a notification related to
 * a source mandate must be sent to the payer. They will trigger a webhook or
 * deliver an email to the customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{statement_descriptor?: string}&StripeObject) $acss_debit
 * @property null|int $amount A positive integer in the smallest currency unit (that is, 100 cents for $1.00, or 1 for ¥1, Japanese Yen being a zero-decimal currency) representing the amount associated with the mandate notification. The amount is expressed in the currency of the underlying source. Required if the notification type is <code>debit_initiated</code>.
 * @property null|(object{last4?: string}&StripeObject) $bacs_debit
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $reason The reason of the mandate notification. Valid reasons are <code>mandate_confirmed</code> or <code>debit_initiated</code>.
 * @property null|(object{creditor_identifier?: string, last4?: string, mandate_reference?: string}&StripeObject) $sepa_debit
 * @property Source $source <p><code>Source</code> objects allow you to accept a variety of payment methods. They represent a customer's payment instrument, and can be used with the Stripe API just like a <code>Card</code> object: once chargeable, they can be charged, or can be attached to customers.</p><p>Stripe doesn't recommend using the deprecated <a href="https://stripe.com/docs/api/sources">Sources API</a>. We recommend that you adopt the <a href="https://stripe.com/docs/api/payment_methods">PaymentMethods API</a>. This newer API provides access to our latest features and payment method types.</p><p>Related guides: <a href="https://stripe.com/docs/sources">Sources API</a> and <a href="https://stripe.com/docs/sources/customers">Sources &amp; Customers</a>.</p>
 * @property string $status The status of the mandate notification. Valid statuses are <code>pending</code> or <code>submitted</code>.
 * @property string $type The type of source this mandate notification is attached to. Should be the source type identifier code for the payment method, such as <code>three_d_secure</code>.
 */
class SourceMandateNotification extends ApiResource
{
    const OBJECT_NAME = 'source_mandate_notification';
}
