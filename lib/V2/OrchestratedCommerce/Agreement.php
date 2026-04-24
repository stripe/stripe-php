<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\OrchestratedCommerce;

/**
 * An Orchestrated Commerce Agreement represents a mutual agreement between a seller and an orchestrator/agent on the Stripe network.
 *
 * @property string $id The unique identifier for the agreement.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created The time at which the agreement was created.
 * @property string $initiated_by The party that initiated the agreement.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{name: string, network_business_profile: string}&\Stripe\StripeObject) $orchestrator_details Details about the orchestrator.
 * @property (object{network_business_profile: string}&\Stripe\StripeObject) $seller_details Details about the seller.
 * @property string $status The current status of the agreement.
 * @property (object{orchestrator_confirmed_at?: int, seller_confirmed_at?: int, terminated_at?: int}&\Stripe\StripeObject) $status_transitions Timestamps of key status transitions for the agreement.
 * @property null|string $terminated_by The party that terminated the agreement, if applicable.
 */
class Agreement extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.orchestrated_commerce.agreement';

    const INITIATED_BY_ORCHESTRATOR = 'orchestrator';
    const INITIATED_BY_SELLER = 'seller';

    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_INITIATED = 'initiated';
    const STATUS_PARTIALLY_CONFIRMED = 'partially_confirmed';
    const STATUS_TERMINATED = 'terminated';

    const TERMINATED_BY_ORCHESTRATOR = 'orchestrator';
    const TERMINATED_BY_SELLER = 'seller';
}
