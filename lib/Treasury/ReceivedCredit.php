<?php

// File generated from our OpenAPI spec

namespace Stripe\Treasury;

/**
 * ReceivedCredits represent funds sent to a [FinancialAccount](https://stripe.com/docs/api#financial_accounts) (for
 * example, via ACH or wire). These money movements are not initiated from the
 * FinancialAccount.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount (in cents) transferred.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|string $failure_code Reason for the failure. A ReceivedCredit might fail because the receiving FinancialAccount is closed or frozen.
 * @property null|string $financial_account The FinancialAccount that received the funds.
 * @property null|string $hosted_regulatory_receipt_url A [hosted transaction receipt](https://stripe.com/docs/treasury/moving-money/regulatory-receipts) URL that is provided when money movement is considered regulated under Stripe's money transmission licenses.
 * @property \Stripe\StripeObject $initiating_payment_method_details
 * @property \Stripe\StripeObject $linked_flows
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property string $network The rails used to send the funds.
 * @property null|\Stripe\StripeObject $reversal_details Details describing when a ReceivedCredit may be reversed.
 * @property string $status Status of the ReceivedCredit. ReceivedCredits are created either `succeeded` (approved) or `failed` (declined). If a ReceivedCredit is declined, the failure reason can be found in the `failure_code` field.
 * @property null|string|\Stripe\Treasury\Transaction $transaction The Transaction associated with this object.
 */
class ReceivedCredit extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'treasury.received_credit';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;

    const FAILURE_CODE_ACCOUNT_CLOSED = 'account_closed';
    const FAILURE_CODE_ACCOUNT_FROZEN = 'account_frozen';
    const FAILURE_CODE_OTHER = 'other';

    const NETWORK_ACH = 'ach';
    const NETWORK_CARD = 'card';
    const NETWORK_STRIPE = 'stripe';
    const NETWORK_US_DOMESTIC_WIRE = 'us_domestic_wire';

    const STATUS_FAILED = 'failed';
    const STATUS_SUCCEEDED = 'succeeded';
}
