<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * A billing alert is a resource that notifies you when a certain usage threshold on a meter is crossed. For example, you might create a billing alert to notify you when a certain user made 100 API requests.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $alert_type Defines the type of the alert.
 * @property null|\Stripe\StripeObject $filter Limits the scope of the alert to a specific <a href="https://stripe.com/docs/api/customers">customer</a>.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $status Status of the alert. This can be active, inactive or archived.
 * @property string $title Title of the alert.
 * @property null|\Stripe\StripeObject $usage_threshold_config Encapsulates configuration of the alert to monitor usage on a specific <a href="https://stripe.com/docs/api/billing/meter">Billing Meter</a>.
 */
class Alert extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.alert';

    const STATUS_ACTIVE = 'active';
    const STATUS_ARCHIVED = 'archived';
    const STATUS_INACTIVE = 'inactive';
}
