<?php

namespace Stripe\BillingPortal;

/**
 * A Session describes the instantiation of the self-serve portal for a particular
 * customer. By visiting the self-serve portal's URL, the customer can manage their
 * subscriptions and billing details. For security reasons, Sessions are
 * short-lived and will expire if the customer does not visit the URL. Create
 * Sessions on-demand.
 *
 * Integration guide: <a
 * href="https://stripe.com/docs/billing/subscriptions/integrating-self-serve-portal">Billing
 * self-serve portal</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $customer The ID of the customer for this session.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $return_url The URL to which Stripe should send customers when they click on the link to return to your website.
 * @property string $url The short-lived URL of the session giving customers access to the self-serve portal.
 */
class Session extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing_portal.session';

    use \Stripe\ApiOperations\Create;
}
