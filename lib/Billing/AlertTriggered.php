<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\Billing\Alert $alert A billing alert is a resource that notifies you when a certain usage threshold on a meter is crossed. For example, you might create a billing alert to notify you when a certain user made 100 API requests.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $customer ID of customer for which the alert triggered
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int $value The value triggering the alert
 */
class AlertTriggered extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.alert_triggered';
}
