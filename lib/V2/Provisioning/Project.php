<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Provisioning;

/**
 * The <code>Project</code> resource represents a container for provisioned resources and their
 * associated configuration.
 *
 * @property string $id Unique identifier for the project.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $catalog Catalog partition the project belongs to.
 * @property string $created Time at which the project was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $name Human-readable name of the project.
 * @property null|(object{email?: string, verified_fields: string[]}&\Stripe\StripeObject) $profile Use the /v2/provisioning/identity endpoint instead for IAM information.
 * @property null|string $project_profile Identifier of the developer profile associated with the project.
 */
class Project extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.provisioning.project';

    const CATALOG_DEV = 'dev';
    const CATALOG_PROD = 'prod';
    const CATALOG_TESTING = 'testing';
}
