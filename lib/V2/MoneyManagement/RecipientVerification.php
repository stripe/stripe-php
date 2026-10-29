<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * RecipientVerification represents a verification of recipient you intend to send funds to.
 *
 * @property string $id The ID of the RecipientVerification.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{outbound_payment?: string, type: string}&\Stripe\StripeObject) $consumed_by The resource that consumed this verification.
 * @property string $created Time at which the RecipientVerification was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|string $expires_at Time at which the RecipientVerification expires, 5 minutes after the creation. Only applicable for Verification of Payee (VoP) verifications. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $match_result Closed Enum. Match level of the RecipientVerification: <code>match</code>, <code>close_match</code>, <code>no_match</code>, <code>unavailable</code>.
 * @property (object{matched_business_type?: string, matched_name?: string, message: string, provided_business_type?: string, provided_name: string}&\Stripe\StripeObject) $match_result_details Details for the match result.
 * @property string $payout_method ID of the payout method that was verified.
 * @property null|string $recipient ID of the recipient account. Omitted for same-entity payouts.
 * @property string $status Current status of the recipient verification.
 * @property null|(object{acknowledged_at?: string, consumed_at?: string}&\Stripe\StripeObject) $status_transitions Hash containing timestamps of when the object transitioned to a particular status.
 * @property string $verification_type Open Enum. The type of verification performed: <code>verification_of_payee</code>, <code>confirmation_of_payee</code>.
 */
class RecipientVerification extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.recipient_verification';

    const MATCH_RESULT_CLOSE_MATCH = 'close_match';
    const MATCH_RESULT_MATCH = 'match';
    const MATCH_RESULT_NO_MATCH = 'no_match';
    const MATCH_RESULT_UNAVAILABLE = 'unavailable';

    const STATUS_ACKNOWLEDGED = 'acknowledged';
    const STATUS_AWAITING_ACKNOWLEDGEMENT = 'awaiting_acknowledgement';
    const STATUS_CONSUMED = 'consumed';
    const STATUS_EXPIRED = 'expired';
    const STATUS_VERIFIED = 'verified';

    const VERIFICATION_TYPE_CONFIRMATION_OF_PAYEE = 'confirmation_of_payee';
    const VERIFICATION_TYPE_VERIFICATION_OF_PAYEE = 'verification_of_payee';
}
