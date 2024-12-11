<?php

// File generated from our OpenAPI spec

namespace Stripe\Treasury;

/**
 * Encodes whether a FinancialAccount has access to a particular Feature, with a <code>status</code> enum and associated <code>status_details</code>.
 * Stripe or the platform can control Features via the requested field.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{requested: bool, status: string, status_details: ((object{code: string, resolution: null|string, restriction?: string}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass) $card_issuing Toggle settings for enabling/disabling a feature
 * @property (object{requested: bool, status: string, status_details: ((object{code: string, resolution: null|string, restriction?: string}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass) $deposit_insurance Toggle settings for enabling/disabling a feature
 * @property (object{aba?: (object{bank?: string, requested: bool, status: string, status_details: ((object{code: string, resolution: null|string, restriction?: string}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $financial_addresses Settings related to Financial Addresses features on a Financial Account
 * @property (object{ach?: (object{requested: bool, status: string, status_details: ((object{code: string, resolution: null|string, restriction?: string}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $inbound_transfers InboundTransfers contains inbound transfers features for a FinancialAccount.
 * @property (object{requested: bool, status: string, status_details: ((object{code: string, resolution: null|string, restriction?: string}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass) $intra_stripe_flows Toggle settings for enabling/disabling a feature
 * @property (object{ach?: (object{requested: bool, status: string, status_details: ((object{code: string, resolution: null|string, restriction?: string}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass), us_domestic_wire?: (object{requested: bool, status: string, status_details: ((object{code: string, resolution: null|string, restriction?: string}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $outbound_payments Settings related to Outbound Payments features on a Financial Account
 * @property (object{ach?: (object{requested: bool, status: string, status_details: ((object{code: string, resolution: null|string, restriction?: string}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass), us_domestic_wire?: (object{requested: bool, status: string, status_details: ((object{code: string, resolution: null|string, restriction?: string}&\Stripe\StripeObject&\stdClass))[]}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $outbound_transfers OutboundTransfers contains outbound transfers features for a FinancialAccount.
 */
class FinancialAccountFeatures extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'treasury.financial_account_features';
}
