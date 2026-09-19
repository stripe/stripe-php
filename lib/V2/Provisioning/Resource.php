<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Provisioning;

/**
 * The <code>Resource</code> resource represents a provider-managed resource provisioned on behalf of
 * a <code>Project</code>.
 *
 * @property string $id
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|string $catalog
 * @property string $created
 * @property string $environment
 * @property null|string $error_message
 * @property bool $livemode Whether this resource uses Stripe live-mode objects. This is independent of the provider catalog and is immutable for the lifetime of the resource.
 * @property null|string $name
 * @property null|\Stripe\StripeObject $needs_information_schema
 * @property string $provider
 * @property string $service_ref
 * @property string $status
 * @property null|(object{message: string, received_at: string}&\Stripe\StripeObject) $user_message
 */
class Resource extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.provisioning.resource';

    const CATALOG_DEV = 'dev';
    const CATALOG_PROD = 'prod';
    const CATALOG_TESTING = 'testing';

    const ENVIRONMENT_DEV = 'dev';
    const ENVIRONMENT_PROD = 'prod';

    const STATUS_COMPLETE = 'complete';
    const STATUS_ERRORED = 'errored';
    const STATUS_NEEDS_INFORMATION = 'needs_information';
    const STATUS_PENDING = 'pending';
    const STATUS_REMOVED = 'removed';
}
