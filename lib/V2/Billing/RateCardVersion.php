<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A Rate Card Version represents a specific configuration of a Rate Card at a point in time. Versions are created automatically
 * when you add or modify rates on a Rate Card, allowing you to track changes and manage which version is active for new
 * subscriptions. Each version maintains a record of when it was created.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Timestamp of when the object was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $rate_card_id The ID of the Rate Card that this version belongs to.
 */
class RateCardVersion extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.rate_card_version';
}
