<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A Billing Group Invoice references an empty invoice created with the billing group's settings.
 *
 * @property string $id The ID of the BillingGroupInvoice object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $created Timestamp of when the BillingGroupInvoice object was created.
 * @property string $invoice_id The ID of the created Invoice object.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class GroupInvoice extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.group_invoice';
}
