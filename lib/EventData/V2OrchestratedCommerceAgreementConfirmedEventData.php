<?php

// File generated from our OpenAPI spec

namespace Stripe\EventData;

/**
 * @property int $orchestrator_confirmed_at The time at which the orchestrator confirmed the agreement.
 * @property (object{name: string, network_business_profile: string}&\Stripe\StripeObject) $orchestrator_details Details about the orchestrator.
 * @property int $seller_confirmed_at The time at which the seller confirmed the agreement.
 * @property (object{network_business_profile: string}&\Stripe\StripeObject) $seller_details Details about the seller.
 */
class V2OrchestratedCommerceAgreementConfirmedEventData extends \Stripe\StripeObject {}
