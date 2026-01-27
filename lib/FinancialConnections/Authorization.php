<?php

// File generated from our OpenAPI spec

namespace Stripe\FinancialConnections;

/**
 * An Authorization represents the set of credentials used to connect a group of Financial Connections Accounts.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{account?: string|\Stripe\Account, customer?: string|\Stripe\Customer, customer_account?: string, type: string}&\Stripe\StripeObject) $account_holder The account holder that this authorization belongs to.
 * @property null|Institution|string $institution The ID of the Financial Connections Institution this account belongs to. Note that this relationship may sometimes change in rare circumstances (e.g. institution mergers).
 * @property string $institution_name The name of the institution that this authorization belongs to.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The status of the connection to the Authorization.
 * @property (object{inactive?: (object{action: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details
 */
class Authorization extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'financial_connections.authorization';

    const STATUS_ACTIVE = 'active';
    const STATUS_DISCONNECTED = 'disconnected';
    const STATUS_INACTIVE = 'inactive';

    /**
     * Retrieves the details of an Financial Connections <code>Authorization</code>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Authorization
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
