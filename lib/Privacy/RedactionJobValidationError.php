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

    const CODE_INVALID_CASCADING_SOURCE = 'invalid_cascading_source';
    const CODE_INVALID_FILE_PURPOSE = 'invalid_file_purpose';
    const CODE_INVALID_STATE = 'invalid_state';
    const CODE_LOCKED_BY_OTHER_JOB = 'locked_by_other_job';
    const CODE_TOO_MANY_OBJECTS = 'too_many_objects';
}
