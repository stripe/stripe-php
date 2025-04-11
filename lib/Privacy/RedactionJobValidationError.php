<?php

// File generated from our OpenAPI spec

namespace Stripe\Privacy;

/**
 * Validation errors.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $code
 * @property null|\Stripe\StripeObject $erroring_object
 * @property string $message
 */
class RedactionJobValidationError extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'privacy.redaction_job_validation_error';
}
