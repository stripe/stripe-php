<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Extend;

/**
 * Represents a user-defined object definition that models a custom object.
 * Object definitions enable the object records API to create and manage records of that object.
 *
 * @property string $id Unique identifier for the object definition.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $api_name_plural The plural API name used in this definition's object record API paths. Immutable across versions.
 * @property string $api_name_singular The singular API name used in the object tag of this definition's records. Immutable across versions.
 * @property string $created Time at which the object definition was created.
 * @property string $latest_version The ID of the latest object definition version.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class ObjectDefinition extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.extend.object_definition';
}
