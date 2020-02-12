<?php

namespace Stripe;

/**
 * Class UsageRecord.
 *
 * @property string $id
 * @property string $object
 * @property string $invoice
 * @property bool $livemode
 * @property \Stripe\StripeObject $period
 * @property string $subscription_item
 * @property int $total_usage
 */
class UsageRecordSummary extends ApiResource
{
    const OBJECT_NAME = 'usage_record_summary';
}
