<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property (object{name: string, network_business_profile: string}&\Stripe\StripeObject) $orchestrator_details Details about the orchestrator.
 * @property (object{network_business_profile: string}&\Stripe\StripeObject) $seller_details Details about the seller.
 * @property int $terminated_at The time at which the agreement was terminated.
 * @property string $terminated_by The party that terminated the agreement.
 */
class V2OrchestratedCommerceAgreementTerminatedEventData extends \Stripe\StripeObject {}
