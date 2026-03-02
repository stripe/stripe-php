<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property int $created Timestamp of when the object was created.
 * @property string $custom_pricing_unit The ID of the custom pricing unit this overage rate applies to.
 * @property string $rate_card The ID of the RateCard which this custom pricing unit overage rate belongs to.
 * @property string $rate_card_version The ID of the RateCard Version when the custom pricing unit overage rate was created.
 */
class V2BillingRateCardCustomPricingUnitOverageRateCreatedEventData extends \Stripe\StripeObject {}
