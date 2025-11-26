<?php

// File generated from our OpenAPI spec

namespace Stripe\V2;

/**
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{value?: int, currency?: string}&\Stripe\StripeObject)[] $amounts The amounts of the microdeposits that were generated.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status Closed Enum. The status of the request.
 */
class FinancialAddressGeneratedMicrodeposits extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'financial_address_generated_microdeposits';
}
