<?php

// File generated from our OpenAPI spec

namespace Stripe\V2;

/**
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The status of the request, signifying whether a simulated credit was initiated.
 */
class FinancialAddressCreditSimulation extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'financial_address_credit_simulation';
}
