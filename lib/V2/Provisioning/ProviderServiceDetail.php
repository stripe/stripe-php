<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Provisioning;

/**
 * The <code>ProviderServiceDetail</code> resource represents a service offered by a
 * provider in the catalog.
 *
 * @property string $id Unique identifier for the provider service.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{direction: string, service: string}&\Stripe\StripeObject)[] $allowed_updates Updates allowed for resources using this service.
 * @property string $availability Availability of the service.
 * @property string[] $categories Categories the service belongs to.
 * @property \Stripe\StripeObject $configuration_schema Schema describing the configuration accepted by this service.
 * @property (object{count?: (object{at_most: int}&\Stripe\StripeObject), mutual_exclusion_allowed_updates?: bool, type: string}&\Stripe\StripeObject)[] $constraints Constraints on resources using this service.
 * @property string $created Time at which the service was created.
 * @property string $description Description of the service.
 * @property bool $development Denormalized from the parent Provider. If a Provider's partition changes, re-sync its services. proto3 scalar defaults apply: if unset, this value is <code>false</code>.
 * @property null|string $group Group the service belongs to, used to organize related services.
 * @property string $kind Kind of the service.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $llm_context URL of additional context about the service intended for LLM consumption.
 * @property (object{component: (object{options: (object{is_default?: bool, paid: (object{description?: string, freeform?: string, type: string}&\Stripe\StripeObject), parent_services: string[], type: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), paid: (object{description?: string, freeform?: string, type: string}&\Stripe\StripeObject), paid_pricing: (object{configuration: \Stripe\StripeObject, description?: string, freeform?: string, is_default?: bool, type: string}&\Stripe\StripeObject)[], type: string}&\Stripe\StripeObject) $pricing Pricing details for the service.
 * @property string $provider Identifier of the provider that offers this service.
 * @property string $provider_name Human-readable name of the provider that offers this service.
 * @property string $scope Scope of the service.
 * @property string $service_id Identifier of the service, unique within its provider.
 * @property string[] $updateable_to Deprecated: use allowed_updates instead.
 */
class ProviderServiceDetail extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.provisioning.provider_service_detail';

    const AVAILABILITY_AVAILABLE = 'available';
    const AVAILABILITY_NOT_IN_COUNTRY = 'not_in_country';
    const AVAILABILITY_UNAVAILABLE = 'unavailable';

    const KIND_DEPLOYABLE = 'deployable';
    const KIND_PLAN = 'plan';

    const SCOPE_ACCOUNT = 'account';
    const SCOPE_PROJECT = 'project';
}
