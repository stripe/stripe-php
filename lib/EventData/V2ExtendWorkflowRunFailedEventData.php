<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property string $dashboard_url A Stripe dashboard URL with more information about the Workflow Run failure.
 * @property (object{error_message?: string}&\Stripe\StripeObject) $failure_details Details about the Workflow Run's transition into the FAILED state.
 */
class V2ExtendWorkflowRunFailedEventData extends \Stripe\StripeObject {}
