<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Provisioning;

/**
 * A ProviderConnectionRequest represents an in-progress account-linking workflow. Once the
 * workflow completes, <code>provider_connection</code> is populated with the resulting ProviderConnection.
 *
 * @property string $id Unique identifier for the provider connection request.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|string $created Time at which the provider connection request was created.
 * @property null|(object{code: string, message: string}&\Stripe\StripeObject) $error Error from the account-linking workflow, set when request_status is ERROR.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $needs_information_schema Schema describing the information the provider still needs, set when request_status is NEEDS_INFORMATION.
 * @property string $provider Identifier of the provider this connection request is linked to.
 * @property null|ProviderConnection $provider_connection A ProviderConnection represents a link between a project and a provider account that resources can be created against; unlinking it prevents further resource creation.
 * @property null|string $redirect_url URL the caller should redirect to in order to continue the account-linking workflow.
 * @property string $request_status Status of the underlying account-linking workflow. Unset once the workflow completes; see provider_connection for the resulting connection's status.
 * @property string[] $scopes Scopes requested for the account-linking workflow.
 */
class ProviderConnectionRequest extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.provisioning.provider_connection_request';

    const REQUEST_STATUS_COMPLETE = 'complete';
    const REQUEST_STATUS_ERROR = 'error';
    const REQUEST_STATUS_NEEDS_INFORMATION = 'needs_information';
    const REQUEST_STATUS_PENDING_AUTH = 'pending_auth';
    const REQUEST_STATUS_REQUESTED = 'requested';
}
