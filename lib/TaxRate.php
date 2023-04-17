<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Tax rates can be applied to [invoices](https://stripe.com/docs/billing/invoices/tax-rates), [subscriptions](https://stripe.com/docs/billing/subscriptions/taxes) and
 * [Checkout Sessions](https://stripe.com/docs/payments/checkout/set-up-a-subscription#tax-rates) to collect tax.
 *
 * Related guide: [Tax Rates](https://stripe.com/docs/billing/taxes/tax-rates).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Defaults to `true`. When set to `false`, this tax rate cannot be used with new applications or Checkout Sessions, but will still work for subscriptions and invoices that already have it set.
 * @property null|string $country Two-letter country code ([ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2)).
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $description An arbitrary string attached to the tax rate for your internal use only. It will not be visible to your customers.
 * @property string $display_name The display name of the tax rates as it will appear to your customer on their receipt email, PDF, and the hosted invoice page.
 * @property bool $inclusive This specifies if the tax rate is inclusive or exclusive.
 * @property null|string $jurisdiction The jurisdiction for the tax rate. You can use this label field for tax reporting purposes. It also appears on your customer’s invoice.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property float $percentage This represents the tax rate percent out of 100.
 * @property null|string $state [ISO 3166-2 subdivision code](https://en.wikipedia.org/wiki/ISO_3166-2:US), without country prefix. For example, &quot;NY&quot; for New York, United States.
 * @property null|string $tax_type The high-level tax type, such as `vat` or `sales_tax`.
 */
class TaxRate extends ApiResource
{
    const OBJECT_NAME = 'tax_rate';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const TAX_TYPE_GST = 'gst';
    const TAX_TYPE_HST = 'hst';
    const TAX_TYPE_IGST = 'igst';
    const TAX_TYPE_JCT = 'jct';
    const TAX_TYPE_LEASE_TAX = 'lease_tax';
    const TAX_TYPE_PST = 'pst';
    const TAX_TYPE_QST = 'qst';
    const TAX_TYPE_RST = 'rst';
    const TAX_TYPE_SALES_TAX = 'sales_tax';
    const TAX_TYPE_VAT = 'vat';
}
