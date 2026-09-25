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
 * @property string $created Timestamp when the activity log entry was created.
 * @property (object{account_security?: (object{new_anomaly_settings?: (object{dormant_api_key_protection_enabled?: bool, money_movement_anomaly_detection_enabled?: bool, request_level_anomaly_detection_enabled?: bool}&\Stripe\StripeObject), old_anomaly_settings?: (object{dormant_api_key_protection_enabled?: bool, money_movement_anomaly_detection_enabled?: bool, request_level_anomaly_detection_enabled?: bool}&\Stripe\StripeObject)}&\Stripe\StripeObject), api_key?: (object{created: string, expires_at?: string, id: string, ip_allowlist: string[], managed_by?: (object{application?: (object{id: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), name?: string, new_key?: string, note?: string, type: string}&\Stripe\StripeObject), authentication?: (object{backup_email?: string, challenge_type?: string, surface?: string, target_email?: string}&\Stripe\StripeObject), scim?: (object{group_name: string, new_roles: string[], old_roles: string[], role_assigned_context?: string, user_email?: string}&\Stripe\StripeObject), sso?: (object{mandate?: string}&\Stripe\StripeObject), type: string, user_access?: (object{authentication: (object{primary_factor: (object{sso_provider?: string, type: string}&\Stripe\StripeObject), secondary_factors: (object{sso_provider?: string, type: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), dashboard_client?: (object{browser: string, browser_version: string, device_type: string, os: string}&\Stripe\StripeObject), expires_at: string, network: (object{city: string, country: string, ip_address: string, region: string}&\Stripe\StripeObject), risk: (object{level: string, signals: (object{novel_device?: (object{}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), roles: string[], session_fingerprint: string, surface: string}&\Stripe\StripeObject), user_invite?: (object{invited_user_email: string, roles: string[]}&\Stripe\StripeObject), user_profile?: (object{new_email?: string, new_redacted_phone_number?: string, old_email?: string, old_redacted_phone_number?: string}&\Stripe\StripeObject), user_roles?: (object{new_roles: string[], old_roles: string[], source: string, user_email: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $details Action-specific details of the activity log entry.
 * @property bool $livemode Whether the action was performed in live mode.
 * @property null|(object{id: string, type: string}&\Stripe\StripeObject) $related_object The object related to the activity log entry.
 * @property null|(object{id: string}&\Stripe\StripeObject) $request The API request that instigated the action.
 * @property string $type The type of action that was performed.
 */
class ActivityLog extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.iam.activity_log';

    const TYPE_ANOMALY_DETECTION_SETTINGS_UPDATED = 'anomaly_detection_settings_updated';
    const TYPE_API_KEY_CREATED = 'api_key_created';
    const TYPE_API_KEY_DELETED = 'api_key_deleted';
    const TYPE_API_KEY_UPDATED = 'api_key_updated';
    const TYPE_API_KEY_VIEWED = 'api_key_viewed';
    const TYPE_ISSUING_ACTIVATED = 'issuing_activated';
    const TYPE_ISSUING_BALANCE_TRANSFER_CREATED = 'issuing_balance_transfer_created';
    const TYPE_ISSUING_CARDHOLDER_CREATED = 'issuing_cardholder_created';
    const TYPE_ISSUING_CARDHOLDER_UPDATED = 'issuing_cardholder_updated';
    const TYPE_ISSUING_CARD_CREATED = 'issuing_card_created';
    const TYPE_ISSUING_CARD_SENSITIVE_DETAILS_VIEWED = 'issuing_card_sensitive_details_viewed';
    const TYPE_ISSUING_CARD_UPDATED = 'issuing_card_updated';
    const TYPE_ISSUING_DISPUTE_CREATED = 'issuing_dispute_created';
    const TYPE_ISSUING_DISPUTE_SUBMITTED = 'issuing_dispute_submitted';
    const TYPE_ISSUING_DISPUTE_UPDATED = 'issuing_dispute_updated';
    const TYPE_MANUAL_PAYOUTS_DISABLED = 'manual_payouts_disabled';
    const TYPE_MANUAL_PAYOUTS_ENABLED = 'manual_payouts_enabled';
    const TYPE_PAYOUT_DESTINATION_ADDED = 'payout_destination_added';
    const TYPE_PAYOUT_DESTINATION_REMOVED = 'payout_destination_removed';
    const TYPE_PAYOUT_DESTINATION_UPDATED = 'payout_destination_updated';
    const TYPE_PAYOUT_SCHEDULE_EDITS_DISABLED = 'payout_schedule_edits_disabled';
    const TYPE_PAYOUT_SCHEDULE_EDITS_ENABLED = 'payout_schedule_edits_enabled';
    const TYPE_SCIM_GROUP_DELETED = 'scim_group_deleted';
    const TYPE_SCIM_GROUP_MEMBER_ADDED = 'scim_group_member_added';
    const TYPE_SCIM_GROUP_MEMBER_REMOVED = 'scim_group_member_removed';
    const TYPE_SCIM_GROUP_ROLES_UPDATED = 'scim_group_roles_updated';
    const TYPE_SCIM_GROUP_UPDATED = 'scim_group_updated';
    const TYPE_SSO_DOMAIN_VERIFIED = 'sso_domain_verified';
    const TYPE_SSO_SETTINGS_CREATED = 'sso_settings_created';
    const TYPE_SSO_SETTINGS_DELETED = 'sso_settings_deleted';
    const TYPE_SSO_SETTINGS_UPDATED = 'sso_settings_updated';
    const TYPE_TWO_STEP_AUTHENTICATION_MANDATE_DISABLED = 'two_step_authentication_mandate_disabled';
    const TYPE_TWO_STEP_AUTHENTICATION_MANDATE_ENABLED = 'two_step_authentication_mandate_enabled';
    const TYPE_USER_ACCESS_STARTED = 'user_access_started';
    const TYPE_USER_AUTH_CHALLENGE_FAILED = 'user_auth_challenge_failed';
    const TYPE_USER_EMAIL_CHANGED = 'user_email_changed';
    const TYPE_USER_EMAIL_VERIFIED = 'user_email_verified';
    const TYPE_USER_EXPRESS_PHONE_NUMBER_CHANGED = 'user_express_phone_number_changed';
    const TYPE_USER_GOOGLE_ACCOUNT_CONNECTED = 'user_google_account_connected';
    const TYPE_USER_GOOGLE_ACCOUNT_DISCONNECTED = 'user_google_account_disconnected';
    const TYPE_USER_INVITE_ACCEPTED = 'user_invite_accepted';
    const TYPE_USER_INVITE_CREATED = 'user_invite_created';
    const TYPE_USER_INVITE_DELETED = 'user_invite_deleted';
    const TYPE_USER_PASSKEY_ADDED = 'user_passkey_added';
    const TYPE_USER_PASSKEY_REMOVED = 'user_passkey_removed';
    const TYPE_USER_PASSKEY_UPDATED = 'user_passkey_updated';
    const TYPE_USER_PASSKEY_UPGRADED = 'user_passkey_upgraded';
    const TYPE_USER_PASSWORD_CHANGED = 'user_password_changed';
    const TYPE_USER_PASSWORD_INITIALIZED = 'user_password_initialized';
    const TYPE_USER_PASSWORD_RESET_FAILED = 'user_password_reset_failed';
    const TYPE_USER_PASSWORD_RESET_REQUESTED = 'user_password_reset_requested';
    const TYPE_USER_PASSWORD_RESET_SUCCEEDED = 'user_password_reset_succeeded';
    const TYPE_USER_ROLES_DELETED = 'user_roles_deleted';
    const TYPE_USER_ROLES_UPDATED = 'user_roles_updated';
    const TYPE_USER_TWO_STEP_AUTHENTICATION_BACKUP_CODE_USED = 'user_two_step_authentication_backup_code_used';
    const TYPE_USER_TWO_STEP_AUTHENTICATION_METHOD_ADDED = 'user_two_step_authentication_method_added';
    const TYPE_USER_TWO_STEP_AUTHENTICATION_METHOD_REMOVED = 'user_two_step_authentication_method_removed';
    const TYPE_USER_TWO_STEP_AUTHENTICATION_METHOD_RESET = 'user_two_step_authentication_method_reset';
    const TYPE_USER_TWO_STEP_AUTHENTICATION_METHOD_UPDATED = 'user_two_step_authentication_method_updated';
    const TYPE_USER_TWO_STEP_AUTHENTICATION_RESET_REQUESTED = 'user_two_step_authentication_reset_requested';
}
