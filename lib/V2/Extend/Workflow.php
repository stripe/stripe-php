<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Extend;

/**
 * A Stripe Workflow is a sequence of actions, like Stripe API calls, that are taken in response to an initiating trigger.
 * A trigger can be a Stripe API event, or a manual invocation.
 *
 * @property string $id The unique ID of the Workflow.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created When the Workflow was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status Whether this Workflow is active, inactive, or in some other state. Only active Workflows may be invoked.
 * @property string $title Workflow title.
 * @property (object{event_trigger?: (object{events_from: string[], type: string}&\Stripe\StripeObject), manual?: (object{}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[] $triggers Under what conditions will this Workflow launch.
 */
class Workflow extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.extend.workflow';

    const STATUS_ACTIVE = 'active';
    const STATUS_ARCHIVED = 'archived';
    const STATUS_DRAFT = 'draft';
    const STATUS_INACTIVE = 'inactive';
}
