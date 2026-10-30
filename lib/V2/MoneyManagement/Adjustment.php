<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * An Adjustment records a credit or debit that Stripe makes to your Financial Account balance,
 * for example to correct technical or operational errors.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{adjustment?: string, inbound_transfer?: string, outbound_payment?: string, outbound_transfer?: string, received_credit?: string, received_debit?: string, type: string}&\Stripe\StripeObject) $adjusted_flow Details about the original flow object linked to this Adjustment, if applicable. <code>adjusted_flow.type</code> identifies the kind of object. The corresponding field contains its ID: for an InboundTransfer, <code>adjusted_flow.inbound_transfer</code> contains the InboundTransfer's ID. Pass that ID to the <code>adjusted_flow</code> parameter on List Adjustments.
 * @property \Stripe\StripeObject $amount The amount of the Adjustment.
 * @property string $created Time at which the object was created. Represented as an RFC 3339 timestamp in UTC with millisecond precision, for example <code>2022-09-18T13:22:18.123Z</code>.
 * @property null|string $description A description of the Adjustment and its purpose.
 * @property string $financial_account The ID of the FinancialAccount whose balance this Adjustment affects.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $receipt_url A link to the Stripe-hosted receipt provided when money movement is regulated under Stripe's money transmission licenses. You can use this link to view the receipt for 60 days after the Adjustment is created. After that, the link expires and <code>receipt_url</code> is <code>null</code>.
 * @property null|string $reference A reference for the Adjustment that associates it with related records or operations.
 */
class Adjustment extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.adjustment';
}
