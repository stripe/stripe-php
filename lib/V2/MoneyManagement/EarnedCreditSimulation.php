<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * EarnedCredit Simulations represent simulated EarnedCredit creation requests for testing purposes.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property bool $livemode Has the value true if the object exists in live mode.
 * @property string $status The status of the request, signifying whether simulated EarnedCredit creation was initiated.
 */
class EarnedCreditSimulation extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.earned_credit_simulation';

    const STATUS_ACCEPTED = 'accepted';
}
