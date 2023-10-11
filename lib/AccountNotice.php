<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A notice to a Connected account. Notice can be sent by Stripe on your behalf or you can opt to send the notices yourself.
 *
 * See the <a href="https://stripe.com/docs/issuing/compliance-us/issuing-regulated-customer-notices">guide to send notices</a> to your connected accounts.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|int $deadline When present, the deadline for sending the notice to meet the relevant regulations.
 * @property null|\Stripe\StripeObject $email Information about the email when sent.
 * @property null|\Stripe\StripeObject $linked_objects Information about objects related to the notice.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $reason Reason the notice is being sent. The reason determines what copy the notice must contain. See the <a href="https://stripe.com/docs/issuing/compliance-us/issuing-regulated-customer-notices">regulated customer notices</a> guide. All reasons might not apply to your integration, and Stripe might add new reasons in the future, so we recommend an internal warning when you receive an unknown reason.
 * @property null|int $sent_at Date when the notice was sent. When absent, you must send the notice, update the content of the email and date when it was sent.
 */
class AccountNotice extends ApiResource
{
    const OBJECT_NAME = 'account_notice';

    use ApiOperations\All;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const REASON_ISSUING_ACCOUNT_CLOSED_FOR_INACTIVITY = 'issuing.account_closed_for_inactivity';
    const REASON_ISSUING_ACCOUNT_CLOSED_FOR_TERMS_OF_SERVICE_VIOLATION = 'issuing.account_closed_for_terms_of_service_violation';
    const REASON_ISSUING_APPLICATION_REJECTED_FOR_FAILURE_TO_VERIFY = 'issuing.application_rejected_for_failure_to_verify';
    const REASON_ISSUING_CREDIT_APPLICATION_REJECTED = 'issuing.credit_application_rejected';
    const REASON_ISSUING_CREDIT_INCREASE_APPLICATION_REJECTED = 'issuing.credit_increase_application_rejected';
    const REASON_ISSUING_CREDIT_LIMIT_DECREASED = 'issuing.credit_limit_decreased';
    const REASON_ISSUING_CREDIT_LINE_CLOSED = 'issuing.credit_line_closed';
    const REASON_ISSUING_DISPUTE_LOST = 'issuing.dispute_lost';
    const REASON_ISSUING_DISPUTE_SUBMITTED = 'issuing.dispute_submitted';
    const REASON_ISSUING_DISPUTE_WON = 'issuing.dispute_won';
}
