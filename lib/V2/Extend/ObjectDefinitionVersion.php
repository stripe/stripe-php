<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Extend;

/**
 * Represents an immutable version of an object definition.
 * It defines the fields of the object records created from it.
 *
 * @property string $id The complete version ID, consisting of the object definition ID, <code>@</code>, and a semantic version.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $created Time at which the object definition version was created.
 * @property null|string $description A description of what this version of the object definition represents.
 * @property string $display_name_plural The human-readable plural name of this version.
 * @property string $display_name_singular The human-readable singular name of this version.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $object_definition The ID of the parent object definition.
 * @property (object{api_name_plural: string, api_name_singular: string, id: string}&\Stripe\StripeObject) $parent_details The stable identity and API names of the parent object definition.
 * @property \Stripe\StripeObject $properties The schema of the object record fields defined by this object definition.
 * @property string $version The semantic version of this object definition version, in <code>major.minor.patch</code> format.
 */
class ObjectDefinitionVersion extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.extend.object_definition_version';
}
