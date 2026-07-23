<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $action Whether the alert was triggered or recovered.
 * @property null|int $aggregation_period_end End of the aggregation period for which this notification was sent. Only present for usage threshold alerts.
 * @property null|int $aggregation_period_start Start of the aggregation period for which this notification was sent. Only present for usage threshold alerts.
 * @property string $alert ID of the billing alert that generated this notification.
 * @property string $alert_type The type of billing alert that generated this notification.
 * @property null|string $cadence The billing cadence associated with this notification. Only present for spend threshold alerts grouped by billing cadence.
 * @property null|string $currency Three-letter ISO currency code for the value, in lowercase. Only present for spend and credit balance threshold alerts.
 * @property null|string $custom_pricing_unit Custom pricing unit for the threshold value
 * @property string $customer ID of the customer for which the alert notification was sent.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|string $meter ID of the billing meter associated with this notification. Only present for usage threshold alerts.
 * @property string $notification_event ID of the event delivered for this notification. Retrievable via the Events API for a limited time; for long-term audit scenarios, capture the full event payload at webhook delivery time.
 * @property int $notified_at Time at which the notification was sent. Measured in seconds since the Unix epoch.
 * @property null|string $subscription ID of the subscription associated with this notification. Only present for spend threshold alerts grouped by subscription.
 * @property string $value The value that triggered the alert. This may be a decimal string for custom pricing unit alerts. For usage threshold alerts, this is the meter event count. For credit balance and spend threshold alerts, this is the amount in the smallest currency unit.
 */
class AlertNotification extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.alert_notification';

    const ACTION_RECOVERED = 'recovered';
    const ACTION_TRIGGERED = 'triggered';

    const ALERT_TYPE_CREDIT_BALANCE_THRESHOLD = 'credit_balance_threshold';
    const ALERT_TYPE_SPEND_THRESHOLD = 'spend_threshold';
    const ALERT_TYPE_USAGE_THRESHOLD = 'usage_threshold';
}
