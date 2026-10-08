<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Provisioning;

/**
 * The <code>Resource</code> resource represents a provider-managed resource provisioned on behalf of
 * a <code>Project</code>.
 *
 * @property string $id Unique identifier for the resource.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|string $catalog Catalog partition containing the resource's provider service.
 * @property string $created Time at which the resource was created.
 * @property string $environment Provider environment in which the resource runs.
 * @property null|string $error_message Error reported when provisioning the resource fails.
 * @property bool $livemode Whether this resource uses Stripe live-mode objects. This is independent of the provider catalog and is immutable for the lifetime of the resource.
 * @property null|string $name Human-readable name of the resource.
 * @property null|\Stripe\StripeObject $needs_information_schema Schema describing additional information the provider requires to finish provisioning.
 * @property string $provider Identifier of the provider that manages the resource.
 * @property string $service_ref Identifier of the provider service used to provision the resource.
 * @property string $status Current provisioning status of the resource.
 * @property null|(object{message: string, received_at: string}&\Stripe\StripeObject) $user_message Message supplied by the provider when the resource becomes ready.
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
