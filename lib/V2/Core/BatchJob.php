<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * @property string $id Unique identifier for the batch job.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $url The URL to upload the JSONL file to.
 */
class BatchJob extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.batch_job';
}
