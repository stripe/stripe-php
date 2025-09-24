<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * RecipientVerification represents a verification of recipient you intend to send funds to.
 *
 * @property string $id The ID of the RecipientVerification.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|string $consumed_by The OBP/OBT ID that consumed this verification, present if one is successfully created.
 * @property int $created Time at which the RecipientVerification was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property int $expires_at Time at which the RecipientVerification expires, 5 minutes after the creation. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $match_result Closed Enum. Match level of the RecipientVerification: <code>match</code>, <code>close_match</code>, <code>no_match</code>, <code>unavailable</code>.
 * @property (object{matched_name?: string, message: string, provided_name: string}&\Stripe\StripeObject) $match_result_details Details for the match result.
 * @property string $status Closed Enum. Current status of the RecipientVerification: <code>verified</code>, <code>consumed</code>, <code>expired</code>, <code>awaiting_acknowledgement</code>, <code>acknowledged</code>.
 * @property null|(object{acknowledged_at?: int, consumed_at?: int}&\Stripe\StripeObject) $status_transitions Hash containing timestamps of when the object transitioned to a particular status.
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
}
