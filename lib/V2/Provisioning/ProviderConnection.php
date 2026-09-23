<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Provisioning;

/**
 * A ProviderConnection represents a link between a project and a provider account that
 * resources can be created against; unlinking it prevents further resource creation.
 *
 * @property string $id Unique identifier for the provider connection.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|string $created Time at which the provider connection was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $provider Identifier of the provider this connection is linked to.
 * @property null|string $provider_account Identifier of the connected account at the provider, if one has been established.
 * @property null|(object{active_services: (object{display_name?: string, provider_resource_id?: string, service_id: string, status: string}&\Stripe\StripeObject)[], active_services_provided: bool, display_name?: string, id: string, link_action?: string, primary_email?: string}&\Stripe\StripeObject) $provider_account_details Details about the connected provider account.
 * @property string $status Current status of the provider connection.
 */
class ProviderConnection extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.provisioning.provider_connection';

    const STATUS_ACTIVE = 'active';
    const STATUS_EXPIRED = 'expired';
    const STATUS_UNKNOWN = 'unknown';
}
