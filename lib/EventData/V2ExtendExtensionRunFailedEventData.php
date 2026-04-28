<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property (object{debug_url: string, message: string}&\Stripe\StripeObject) $error Details about the error that occurred.
 * @property (object{id: string, method: string, name: string, version: string}&\Stripe\StripeObject) $extension Details about the extension that failed.
 * @property string $extension_run_id The ID of the extension run that failed.
 */
class V2ExtendExtensionRunFailedEventData extends \Stripe\StripeObject {}
