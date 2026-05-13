<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A Financial Account Statement represents a monthly statement for a Financial Account.
 *
 * @property string $id Unique identifier for the statement.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Time at which the statement was created, in ISO 8601 format (UTC).
 * @property \Stripe\StripeObject $ending_balance Available balance at the end of the statement period.
 * @property null|\Stripe\StripeObject $files_by_currency Currency-specific files and file metadata. Null by default, populated by specifying include=files_by_currency in the Retrieve endpoint.
 * @property string $financial_account The Financial Account this statement belongs to.
 * @property bool $livemode True if the object exists in live mode, false if in test mode.
 * @property (object{end_date: string, start_date: string}&\Stripe\StripeObject) $period The time period covered by this statement.
 * @property null|string $restated_by The ID of the statement that replaced this one. Only present on statements that have been restated.
 * @property null|string $restated_statement The ID of the statement this one replaces. Only present on restatements.
 * @property \Stripe\StripeObject $starting_balance Available balance at the start of the statement period.
 * @property string $status The status of the statement. A statement is &quot;active&quot; by default. When a statement is replaced by a restatement, its status becomes &quot;restated&quot;.
 */
class FinancialAccountStatement extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.financial_account_statement';

    public static function fieldEncodings()
    {
        return [
            'files_by_currency' => [
                'kind' => 'array',
                'element' => [
                    'kind' => 'object',
                    'fields' => ['size' => ['kind' => 'int64_string']],
                ],
            ],
        ];
    }

    const STATUS_ACTIVE = 'active';
    const STATUS_RESTATED = 'restated';
}
