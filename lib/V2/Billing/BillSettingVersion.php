<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
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
