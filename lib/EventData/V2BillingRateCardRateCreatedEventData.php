<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $billable_item The ID of the BillableItem which this Rate is associated with.
 * @property int $created Timestamp of when the object was created.
 * @property string $rate_card The ID of the RateCard which this Rate belongs to.
 * @property string $rate_card_version The ID of the latest RateCard Version when the Rate was created.
 */
class V2BillingRateCardRateCreatedEventData extends \Stripe\StripeObject {}
