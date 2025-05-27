<?php

// File generated from our OpenAPI spec

namespace Stripe\Privacy;

/**
 * The Redaction Job validation error object contains information about
 * errors that affect the ability to redact a specific object in a
 * redaction job.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $code A code indicating the reason for the error.
 * @property null|(object{id: string, object_type: string}&\Stripe\StripeObject) $erroring_object If the error is related to a specific object, this field includes the object's identifier and object type.
 * @property string $message A human-readable message providing more details about the error.
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
