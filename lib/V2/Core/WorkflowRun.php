<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * An execution of a Workflow in response to a triggering event.
 *
 * @property string $id The unique ID of the Workflow Run.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created When the Workflow Run was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The current Workflow Run execution status.
 * @property null|(object{failed?: (object{action?: string, error_code: string, error_message?: string}&\Stripe\StripeObject), started?: (object{}&\Stripe\StripeObject), succeeded?: (object{status_code: string, status_message?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Details about the Workflow Run's status transitions.
 * @property (object{failed_at?: int, started_at?: int, succeeded_at?: int}&\Stripe\StripeObject) $status_transitions Summary information about the Workflow Run's status transitions.
 * @property (object{type: string, event_trigger?: (object{id: string, type: string}&\Stripe\StripeObject), manual?: (object{input_parameters: \Stripe\StripeObject}&\Stripe\StripeObject)}&\Stripe\StripeObject) $trigger A record of the trigger that launched this Workflow Run.
 * @property string $workflow The Workflow this Run belongs to.
 */
class WorkflowRun extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.workflow_run';

    const STATUS_FAILED = 'failed';
    const STATUS_STARTED = 'started';
    const STATUS_SUCCEEDED = 'succeeded';
}
