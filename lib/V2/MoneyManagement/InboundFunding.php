<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * An InboundFunding represents an other-to-me pull movement into a FinancialAccount.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The amount of the InboundFunding.
 * @property string $created Time at which the object was created.
 * @property null|string $description An arbitrary string attached to the InboundFunding.
 * @property (object{debited: \Stripe\StripeObject, payment_method: (object{type: string, us_paper_check?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $from The source of the funds.
 * @property (object{check_failed?: (object{failure_code?: string, failure_reason?: string}&\Stripe\StripeObject), check_processing?: (object{}&\Stripe\StripeObject), check_queued?: (object{}&\Stripe\StripeObject), check_returned?: (object{return_code?: string, return_reason?: string, reversal_transaction?: string}&\Stripe\StripeObject), check_succeeded?: (object{}&\Stripe\StripeObject), created: string, effective_at: string, id: string, type: string}&\Stripe\StripeObject)[] $history The check lifecycle history.
 * @property bool $livemode Whether the InboundFunding exists in live mode.
 * @property string $status The current status of the InboundFunding.
 * @property (object{credited: \Stripe\StripeObject, financial_account: string}&\Stripe\StripeObject) $to The destination for the funds.
 */
class InboundFunding extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.inbound_funding';

    const STATUS_FAILED = 'failed';
    const STATUS_PROCESSING = 'processing';
    const STATUS_QUEUED = 'queued';
    const STATUS_RETURNED = 'returned';
    const STATUS_SUCCEEDED = 'succeeded';
}
