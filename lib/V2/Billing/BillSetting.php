<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * BillSetting is responsible for settings which dictate generating bills, which include settings for calculating totals on bills, tax on bill items, as well as how to generate and present invoices.
 *
 * @property string $id The ID of the BillSetting object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{tax?: (object{type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $calculation Settings related to calculating a bill.
 * @property int $created Timestamp of when the object was created.
 * @property null|string $display_name An optional field for adding a display name for the BillSetting object.
 * @property null|(object{time_until_due?: (object{interval: string, interval_count: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $invoice Settings related to invoice behavior.
 * @property null|string $invoice_rendering_template The ID of the invoice rendering template to be used when generating invoices.
 * @property string $latest_version The latest version of the current settings object. This will be Updated every time an attribute of the settings is updated.
 * @property string $live_version The current live version of the settings object. This can be different from latest_version if settings are updated without setting live_version='latest'.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key A lookup key used to retrieve settings dynamically from a static string. This may be up to 200 characters.
 */
class BillSetting extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.bill_setting';
}
