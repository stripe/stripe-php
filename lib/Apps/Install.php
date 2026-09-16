<?php

// File generated from our OpenAPI spec

namespace Stripe\Apps;

/**
 * An object representing an app installation.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $account The ID of the account that the app install belongs to.
 * @property string $app The ID of the app installed.
 * @property bool $approval_required Whether the installer must authorize pending permissions, content security policy entries, or endpoints.
 * @property null|string $auth_code The authorization code for an oauth app install.
 * @property (object{connect_src: null|string[], image_src: null|string[], purpose: null|string}&\Stripe\StripeObject) $authorized_content_security_policy
 * @property string[] $authorized_endpoints The endpoint URLs authorized by the installer.
 * @property string[] $authorized_permissions The permissions authorized by the installer.
 * @property string $channel The distribution channel associated with the app install.
 * @property null|(object{connect_src: null|string[], image_src: null|string[]}&\Stripe\StripeObject) $content_security_policy_granted The content security policy entries authorized by the installer.
 * @property (object{connect_src: null|string[], image_src: null|string[]}&\Stripe\StripeObject) $content_security_policy_pending
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $created_by The ID of the embedding platform that created the install, if applicable.
 * @property null|string[] $endpoints_granted The endpoint URLs authorized by the installer.
 * @property string[] $endpoints_pending The endpoint URLs requested by the latest app version that the installer has not authorized.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|string[] $permissions_granted The permissions authorized by the installer.
 * @property string[] $permissions_pending The permissions requested by the latest app version that the installer has not authorized.
 * @property string $state The status of the app install.
 * @property null|string $status The status of the app install.
 */
class Install extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'apps.install';

    const STATUS_INSTALLED = 'installed';
    const STATUS_INSTALLING = 'installing';
    const STATUS_INSTALL_FAILED = 'install_failed';
    const STATUS_UNINSTALLING = 'uninstalling';
    const STATUS_UNINSTALL_FAILED = 'uninstall_failed';
}
