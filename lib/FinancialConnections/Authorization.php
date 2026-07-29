<?php

// File generated from our OpenAPI spec

namespace Stripe\FinancialConnections;

/**
 * An Authorization represents the set of credentials used to connect a group of Financial Connections Accounts.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $institution_name The name of the institution that this authorization belongs to.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property string $status The status of the connection to the Authorization.
 * @property (object{active?: (object{action: string, expected_deactivation_date: int}&\Stripe\StripeObject), inactive?: (object{action: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details
 */
class Authorization extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'financial_connections.authorization';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
}
