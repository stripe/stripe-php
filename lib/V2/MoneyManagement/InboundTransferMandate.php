<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * An InboundTransferMandate represents Stripe's authorization to debit a
 * merchant's external bank account (v2 credential) on their behalf.
 *
 * @property string $id Unique identifier for the InboundTransferMandate.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{lodgement_reference: string}&\Stripe\StripeObject) $au_becs Australian BECS-specific details. Present when type is AU_BECS.
 * @property null|(object{reference: string}&\Stripe\StripeObject) $bacs Bacs-specific details. Present when type is BACS.
 * @property string $created Creation time of the mandate. RFC 3339 UTC, millisecond precision.
 * @property string $credential The v2 credential (e.g. GB Bank Account) this mandate authorizes debits for.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The current lifecycle status of the mandate.
 * @property (object{canceled?: (object{reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Additional details about the current status (e.g. cancelation reason).
 * @property (object{activated_at?: string, canceled_at?: string, expired_at?: string}&\Stripe\StripeObject) $status_transitions Timestamps for each state transition.
 * @property string $type The mandate scheme type.
 * @property (object{accepted_at?: string, online?: (object{ip_address?: string, user_agent?: string}&\Stripe\StripeObject), type?: string}&\Stripe\StripeObject) $user_accepted_details Evidence of the merchant's acceptance of the mandate.
 */
class InboundTransferMandate extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.inbound_transfer_mandate';

    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
    const STATUS_EXPIRED = 'expired';
    const STATUS_PENDING = 'pending';

    const TYPE_AU_BECS = 'au_becs';
    const TYPE_BACS = 'bacs';
    const TYPE_NZ_BECS = 'nz_becs';
    const TYPE_SEPA = 'sepa';
}
