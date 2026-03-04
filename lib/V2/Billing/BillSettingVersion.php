<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A Bill Setting Version is a specific configuration of a BillSetting at a point in time. Bill Setting Versions enable you to track changes to bill generation and invoice settings over time and manage which version is active for new billing operations.
 *
 * @property string $id The ID of the BillSettingVersion object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{tax?: (object{type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $calculation Settings related to calculating a bill.
 * @property int $created Timestamp of when the object was created.
 * @property null|(object{time_until_due?: (object{interval: string, interval_count: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $invoice Settings related to invoice behavior.
 * @property null|string $invoice_rendering_template The ID of the invoice rendering template to be used when generating invoices.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class BillSettingVersion extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.bill_setting_version';
}
