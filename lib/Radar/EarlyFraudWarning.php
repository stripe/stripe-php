<?php

// File generated from our OpenAPI spec

namespace Stripe\Radar;

/**
 * An early fraud warning indicates that the card issuer has notified us that a
 * charge may be fraudulent.
 *
 * Related guide: [Early Fraud Warnings](https://stripe.com/docs/disputes/measuring#early-fraud-warnings).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $actionable An EFW is actionable if it has not received a dispute and has not been fully refunded. You may wish to proactively refund a charge that receives an EFW, in order to avoid receiving a dispute later.
 * @property string|\Stripe\Charge $charge ID of the charge this early fraud warning is for, optionally expanded.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $fraud_type The type of fraud labelled by the issuer. One of `card_never_received`, `fraudulent_card_application`, `made_with_counterfeit_card`, `made_with_lost_card`, `made_with_stolen_card`, `misc`, `unauthorized_use_of_card`.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property null|string|\Stripe\PaymentIntent $payment_intent ID of the Payment Intent this early fraud warning is for, optionally expanded.
 */
class EarlyFraudWarning extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.early_fraud_warning';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;

    const FRAUD_TYPE_CARD_NEVER_RECEIVED = 'card_never_received';
    const FRAUD_TYPE_FRAUDULENT_CARD_APPLICATION = 'fraudulent_card_application';
    const FRAUD_TYPE_MADE_WITH_COUNTERFEIT_CARD = 'made_with_counterfeit_card';
    const FRAUD_TYPE_MADE_WITH_LOST_CARD = 'made_with_lost_card';
    const FRAUD_TYPE_MADE_WITH_STOLEN_CARD = 'made_with_stolen_card';
    const FRAUD_TYPE_MISC = 'misc';
    const FRAUD_TYPE_UNAUTHORIZED_USE_OF_CARD = 'unauthorized_use_of_card';
}
