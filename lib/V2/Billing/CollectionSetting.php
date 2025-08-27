<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * Settings that configure and manage the behavior of collecting payments.
 *
 * @property string $id The ID of the CollectionSetting.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|string $collection_method Either automatic, or send_invoice. When charging automatically, Stripe will attempt to pay this bill at the end of the period using the payment method attached to the payer profile. When sending an invoice, Stripe will email your payer profile an invoice with payment instructions. Defaults to automatic.
 * @property int $created Timestamp of when the object was created.
 * @property null|string $display_name An optional field for adding a display name for the CollectionSetting object.
 * @property null|(object{payment_due: null|(object{enabled: bool, include_payment_link: bool}&\Stripe\StripeObject)}&\Stripe\StripeObject) $email_delivery Email delivery settings.
 * @property string $latest_version The latest version of the current settings object. This will be Updated every time an attribute of the settings is updated.
 * @property string $live_version The current live version of the settings object. This can be different from latest_version if settings are updated without setting live_version='latest'.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key A lookup key used to retrieve settings dynamically from a static string. This may be up to 200 characters.
 * @property null|string $payment_method_configuration The ID of the PaymentMethodConfiguration object, which controls which payment methods are displayed to your customers.
 * @property null|(object{acss_debit: null|(object{mandate_options: null|(object{transaction_type: null|string}&\Stripe\StripeObject), verification_method: null|string}&\Stripe\StripeObject), bancontact: null|(object{preferred_language: null|string}&\Stripe\StripeObject), card: null|(object{mandate_options: null|(object{amount: null|int, amount_type: null|string, description: null|string}&\Stripe\StripeObject), network: null|string, request_three_d_secure: null|string}&\Stripe\StripeObject), customer_balance: null|(object{bank_transfer: null|(object{eu_bank_transfer: null|(object{country: string}&\Stripe\StripeObject), type: null|string}&\Stripe\StripeObject), funding_type: null|string}&\Stripe\StripeObject), konbini: null|(object{}&\Stripe\StripeObject), sepa_debit: null|(object{}&\Stripe\StripeObject), us_bank_account: null|(object{financial_connections: (object{filters: null|(object{account_subcategories: string[]}&\Stripe\StripeObject), permissions: string[], prefetch: string[]}&\Stripe\StripeObject), verification_method: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $payment_method_options Payment Method specific configuration stored on the object.
 */
class CollectionSetting extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.collection_setting';

    const COLLECTION_METHOD_AUTOMATIC = 'automatic';
    const COLLECTION_METHOD_SEND_INVOICE = 'send_invoice';
}
