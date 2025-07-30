<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Payments;

/**
 * OffSessionPayment resource.
 *
 * @property string $id Unique identifier for the object..
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount_requested The “presentment amount” to be collected from the customer.
 * @property string $cadence The frequency of the underlying payment.
 * @property string $compartment_id ID of the owning compartment.
 * @property int $created Creation time of the OffSessionPayment. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property string $customer ID of the Customer to which this OffSessionPayment belongs.
 * @property null|string $failure_reason The reason why the OffSessionPayment failed.
 * @property null|string $last_authorization_attempt_error The payment error encountered in the previous attempt to authorize the payment.
 * @property null|string $latest_payment_attempt_record Payment attempt record for the latest attempt, if one exists.
 * @property bool $livemode Has the value true if the object exists in live mode or the value false if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://docs.corp.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format. Learn more about <a href="https://docs.corp.stripe.com/payments/payment-intents#storing-information-in-metadata">storing information in metadata</a>.
 * @property null|string $on_behalf_of The account (if any) for which the funds of the OffSessionPayment are intended.
 * @property string $payment_method ID of the payment method used in this OffSessionPayment.
 * @property null|string $payment_record Payment record associated with the OffSessionPayment.
 * @property (object{attempts: int, retry_strategy: string}&\Stripe\StripeObject) $retry_details Details about the OffSessionPayment retries.
 * @property null|string $statement_descriptor Text that appears on the customer’s statement as the statement descriptor for a non-card charge. This value overrides the account’s default statement descriptor. For information about requirements, including the 22-character limit, see the <a href="https://docs.stripe.com/get-started/account/statement-descriptors">Statement Descriptor docs</a>.
 * @property null|string $statement_descriptor_suffix Provides information about a card charge. Concatenated to the account’s <a href="https://docs.stripe.com/get-started/account/statement-descriptors#static">statement descriptor prefix</a> to form the complete statement descriptor that appears on the customer’s statement.
 * @property string $status Status of this OffSessionPayment, one of <code>pending</code>, <code>pending_retry</code>, <code>processing</code>, <code>failed</code>, <code>canceled</code>, <code>requires_capture</code>, or <code>succeeded</code>.
 * @property null|string $test_clock Test clock that can be used to advance the retry attempts in a sandbox.
 * @property null|(object{amount: null|int, destination: string}&\Stripe\StripeObject) $transfer_data The data that automatically creates a Transfer after the payment finalizes. Learn more about the use case for <a href="https://docs.corp.stripe.com/payments/connected-accounts">connected accounts</a>.
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
