<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * Debit Simulations represent a simulated debit transaction applied to financial addresses for testing purposes.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The status of the request, signifying whether a simulated debit was initiated.
 */
class FinancialAddressDebitSimulation extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.financial_address_debit_simulation';
}
