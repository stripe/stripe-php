<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Reporting;

/**
 * The Report resource represents a customizable report template that provides insights into various aspects of your Stripe integration.
 *
 * @property string $id The unique identifier of the <code>Report</code> object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $name The human-readable name of the <code>Report</code>.
 * @property \Stripe\StripeObject $parameters Specification of the parameters that the <code>Report</code> accepts. It details each parameter's name, description, whether it is required, and any validations performed.
 */
class Report extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.reporting.report';
}
