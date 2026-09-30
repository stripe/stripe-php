<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Data;

/**
 * The <code>Report</code> resource represents a Stripe-defined, parameterized report that provides
 * insights into various aspects of your Stripe integration.
 *
 * @property string $id The unique identifier of the <code>Report</code>.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|string $default_sql Representative SQL generated using common parameter values, or an explanatory message when the report's SQL cannot be exposed. Only present when requested via <code>include[0]=default_sql</code>.
 * @property string $description A human-readable description of what this report contains.
 * @property bool $livemode Whether this <code>Report</code> is available in live mode.
 * @property string $name The human-readable name of the <code>Report</code>.
 * @property null|\Stripe\StripeObject $parameters Specification of the parameters that the <code>Report</code> accepts, keyed by parameter name.
 */
class Report extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.data.report';
}
