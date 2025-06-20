<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Payments;

/**
 * Off-session payment resource.
 *
 * @property string $id ID of the OSP.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount_requested The amount you requested to be collected on the OSP upon creation.
 * @property string $cadence The frequency of the underlying payment that this OSP represents.
 * @property string $compartment_id ID of owning compartment.
 * @property int $created Timestamp of creation.
 * @property string $customer Customer owning the supplied payment method.
 * @property null|string $failure_reason Reason why the OSP failed.
 * @property null|string $last_authorization_attempt_error Last error returned by the financial partner for a failed authorization.
 * @property null|string $latest_payment_attempt_record Payment attempt record for the latest attempt, if one exists.
 * @property bool $livemode True if the txn is livemode, false otherwise.
 * @property \Stripe\StripeObject $metadata Metadata you provided.
 * @property null|string $on_behalf_of OBO, same as on the PI.
 * @property string $payment_method ID of payment method.
 * @property null|string $payment_record Payment record associated with the OSP. consistent across attempts.
 * @property (object{attempts: int, retry_strategy: string}&\Stripe\StripeObject) $retry_details Details about the OSP retries.
 * @property null|string $statement_descriptor Statement descriptor you provided.
 * @property null|string $statement_descriptor_suffix Statement descriptor suffix you provided, similar to that on the PI.
 * @property string $status Status of the OSP.
 * @property null|string $test_clock Test clock to be used to advance the retry attempts.
 * @property null|(object{amount: null|int, destination: string}&\Stripe\StripeObject) $transfer_data Instructions for the transfer to be made with this OSP after successful money movement.
 */
class OffSessionPayment extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.payments.off_session_payment';

    const CADENCE_RECURRING = 'recurring';
    const CADENCE_UNSCHEDULED = 'unscheduled';

    const FAILURE_REASON_REJECTED_BY_PARTNER = 'rejected_by_partner';
    const FAILURE_REASON_RETRIES_EXHAUSTED = 'retries_exhausted';

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
    const STATUS_PENDING_RETRY = 'pending_retry';
    const STATUS_PROCESSING = 'processing';
    const STATUS_REQUIRES_CAPTURE = 'requires_capture';
    const STATUS_SUCCEEDED = 'succeeded';
}
