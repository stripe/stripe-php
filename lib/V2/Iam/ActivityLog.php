<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Iam;

/**
 * An activity log records a single action performed on an account.
 *
 * @property string $id Unique identifier of the activity log entry.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{api_key?: (object{id: string}&\Stripe\StripeObject), type: string, user?: (object{email: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $actor The actor that performed the action.
 * @property string $context The account on which the action was performed.
 * @property int $created Timestamp when the activity log entry was created.
 * @property (object{api_key?: (object{created: int, expires_at?: int, id: string, ip_allowlist: string[], managed_by?: (object{application?: (object{id: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), name?: string, new_key?: string, note?: string, type: string}&\Stripe\StripeObject), type: string, user_invite?: (object{invited_user_email: string, roles: string[]}&\Stripe\StripeObject), user_roles?: (object{new_roles: string[], old_roles: string[], source: string, user_email: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $details Action-specific details of the activity log entry.
 * @property bool $livemode Whether the action was performed in live mode.
 * @property string $type The type of action that was performed.
 */
class ActivityLog extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.iam.activity_log';

    const TYPE_API_KEY_CREATED = 'api_key_created';
    const TYPE_API_KEY_DELETED = 'api_key_deleted';
    const TYPE_API_KEY_UPDATED = 'api_key_updated';
    const TYPE_API_KEY_VIEWED = 'api_key_viewed';
    const TYPE_USER_INVITE_ACCEPTED = 'user_invite_accepted';
    const TYPE_USER_INVITE_CREATED = 'user_invite_created';
    const TYPE_USER_INVITE_DELETED = 'user_invite_deleted';
    const TYPE_USER_ROLES_DELETED = 'user_roles_deleted';
    const TYPE_USER_ROLES_UPDATED = 'user_roles_updated';
}
