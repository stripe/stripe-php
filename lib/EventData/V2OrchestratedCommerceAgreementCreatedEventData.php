<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property int $created The time at which the agreement was created.
 * @property string $initiated_by The party that initiated the agreement.
 * @property (object{name: string, network_business_profile: string}&\Stripe\StripeObject) $orchestrator_details Details about the orchestrator.
 * @property (object{network_business_profile: string}&\Stripe\StripeObject) $seller_details Details about the seller.
 */
class V2OrchestratedCommerceAgreementCreatedEventData extends \Stripe\StripeObject {}
