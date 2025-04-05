<?php

// File generated from our OpenAPI spec

namespace Stripe\Privacy;

/**
 * The objects to redact, grouped by type. All redactable objects associated with these objects will be redacted as well.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string[] $charges
 * @property null|string[] $checkout_sessions
 * @property null|string[] $customers
 * @property null|string[] $identity_verification_sessions
 * @property null|string[] $invoices
 * @property null|string[] $issuing_cardholders
 * @property null|string[] $payment_intents
 * @property null|string[] $radar_value_list_items
 * @property null|string[] $setup_intents
 */
class RedactionJobRootObjects extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'privacy.redaction_job_root_objects';
}
