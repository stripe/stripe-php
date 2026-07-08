<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * An Account v2 object represents a company, individual, or other entity that your Stripe integration interacts with. It contains both identifying information and properties that control its behavior and functionality. An Account can have one or more configurations that enable sets of related features, such as allowing it to act as a merchant or customer.
 * The Accounts v2 API is broadly available to Connect platforms, and to other users in preview. The Accounts v2 API also supports the Global Payouts preview feature.
 *
 * @property string $id Unique identifier for the Account.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string[] $applied_configurations The configurations that have been applied to this account.
 * @property null|bool $closed Indicates whether the account has been closed.
 * @property null|(object{card_creator?: (object{applied: bool, capabilities?: (object{commercial?: (object{celtic?: (object{charge_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), spend_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), cross_river_bank?: (object{charge_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), prepaid_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), spend_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), fifth_third?: (object{charge_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), lead?: (object{prepaid_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), stripe?: (object{charge_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), prepaid_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), consumer?: (object{celtic?: (object{revolving_credit_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), cross_river_bank?: (object{prepaid_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), lead?: (object{debit_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), prepaid_card?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), customer?: (object{applied: bool, automatic_indirect_tax?: (object{exempt?: string, ip_address?: string, location?: (object{country?: string, state?: string}&\Stripe\StripeObject), location_source?: string}&\Stripe\StripeObject), billing?: (object{default_payment_method?: string, invoice?: (object{custom_fields: (object{name: string, value: string}&\Stripe\StripeObject)[], footer?: string, next_sequence?: int, prefix?: string, rendering?: (object{amount_tax_display?: string, template?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), capabilities?: (object{automatic_indirect_tax?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), shipping?: (object{address?: (object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}&\Stripe\StripeObject), name?: string, phone?: string}&\Stripe\StripeObject), test_clock?: string}&\Stripe\StripeObject), merchant?: (object{applied: bool, bacs_debit_payments?: (object{display_name?: string, service_user_number?: string}&\Stripe\StripeObject), branding?: (object{icon?: string, logo?: string, primary_color?: string, secondary_color?: string}&\Stripe\StripeObject), capabilities?: (object{ach_debit_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), acss_debit_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), affirm_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), afterpay_clearpay_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), alma_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), amazon_pay_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), au_becs_debit_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), bacs_debit_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), bancontact_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), blik_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), boleto_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), card_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), cartes_bancaires_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), cashapp_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), eps_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), fpx_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), gb_bank_transfer_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), grabpay_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), ideal_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), jcb_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), jp_bank_transfer_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), kakao_pay_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), klarna_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), konbini_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), kr_card_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), link_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), mobilepay_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), multibanco_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), mx_bank_transfer_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), naver_pay_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), oxxo_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), p24_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), pay_by_bank_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), payco_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), paynow_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), promptpay_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), revolut_pay_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), samsung_pay_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), sepa_bank_transfer_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), sepa_debit_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), stripe_balance?: (object{payouts?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), sunbit_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), swish_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), twint_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), us_bank_transfer_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), zip_payments?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), card_payments?: (object{decline_on?: (object{avs_failure?: bool, cvc_failure?: bool}&\Stripe\StripeObject)}&\Stripe\StripeObject), konbini_payments?: (object{support?: (object{email?: string, hours?: (object{end_time?: string, start_time?: string}&\Stripe\StripeObject), phone?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), mcc?: string, script_statement_descriptor?: (object{kana?: (object{descriptor?: string, prefix?: string}&\Stripe\StripeObject), kanji?: (object{descriptor?: string, prefix?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), sepa_debit_payments?: (object{creditor_id?: string}&\Stripe\StripeObject), smart_disputes?: (object{auto_respond?: (object{preference?: string, value?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), statement_descriptor?: (object{descriptor?: string, prefix?: string}&\Stripe\StripeObject), support?: (object{address?: (object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}&\Stripe\StripeObject), email?: string, phone?: string, url?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), money_manager?: (object{applied: bool, capabilities?: (object{business_storage?: (object{inbound?: (object{aud?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), cad?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), eur?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), gbp?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), usd?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), usdc?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), outbound?: (object{aud?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), cad?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), eur?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), gbp?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), usd?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), usdc?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), consumer_storage?: (object{inbound?: (object{usd?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), usdc?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), outbound?: (object{usd?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), usdc?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), inbound_transfers?: (object{bank_accounts?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), outbound_payments?: (object{bank_accounts?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), cards?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), crypto_wallets?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), financial_accounts?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), paper_checks?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), outbound_transfers?: (object{bank_accounts?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), crypto_wallets?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), financial_accounts?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), received_credits?: (object{bank_accounts?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), crypto_wallets?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), received_debits?: (object{bank_accounts?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), high_risk_activities?: string[], high_risk_activities_description?: string, money_services_description?: string, operates_in_prohibited_countries?: bool, participates_in_regulated_activity?: bool, purpose_of_funds?: string, purpose_of_funds_description?: string, regulated_activity?: (object{description?: string, license_number?: string, primary_regulatory_authority_country?: string, primary_regulatory_authority_name?: string}&\Stripe\StripeObject), source_of_funds?: string, source_of_funds_description?: string}&\Stripe\StripeObject), recipient?: (object{applied: bool, capabilities?: (object{bank_accounts?: (object{ach?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), becs?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), eft?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), fedwire?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), fps?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), instant?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), local?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), npp?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), rtp?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), sepa_credit?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), sepa_instant?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), swift?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), wire?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), cards?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), crypto_wallets?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), paper_checks?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), stripe_balance?: (object{payouts?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), stripe_transfers?: (object{protections: (object{psp_migration: (object{expires_at?: int, requested_at: int, status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), status: string, status_details: (object{code: string, resolution: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), default_outbound_destination?: (object{id: string, type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $configuration An Account represents a company, individual, or other entity that a user interacts with. Accounts store identity information and one or more configurations that enable product-specific capabilities. You can assign configurations at creation or add them later.
 * @property null|string $contact_email The primary contact email address for the Account.
 * @property null|string $contact_phone The default contact phone for the Account.
 * @property int $created Time at which the object was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|string $dashboard A value indicating the Stripe dashboard this Account has access to. This will depend on which configurations are enabled for this account.
 * @property null|(object{currency?: string, locales?: string[], profile?: (object{business_url?: string, doing_business_as?: string, product_description?: string}&\Stripe\StripeObject), responsibilities: (object{fees_collector?: string, losses_collector?: string, requirements_collector: string}&\Stripe\StripeObject), timezone?: string}&\Stripe\StripeObject) $defaults Default values for settings shared across Account configurations.
 * @property null|string $display_name A descriptive name for the Account. This name will be surfaced in the Stripe Dashboard and on any invoices sent to the Account.
 * @property null|(object{entries?: (object{awaiting_action_from: string, description: string, errors: (object{code: string, description: string}&\Stripe\StripeObject)[], impact: (object{restricts_capabilities?: (object{capability: string, configuration: string, deadline: (object{status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), minimum_deadline: (object{status: string}&\Stripe\StripeObject), reference?: (object{inquiry?: string, resource?: string, type: string}&\Stripe\StripeObject), requested_reasons: (object{code: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)[], minimum_transition_date?: int, summary?: (object{minimum_deadline?: (object{status: string, time?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $future_requirements Information about the future requirements for the Account that will eventually come into effect, including what information needs to be collected, and by when.
 * @property null|(object{attestations?: (object{directorship_declaration?: (object{date?: int, ip?: string, user_agent?: string}&\Stripe\StripeObject), ownership_declaration?: (object{date?: int, ip?: string, user_agent?: string}&\Stripe\StripeObject), persons_provided?: (object{directors?: bool, executives?: bool, owners?: bool, ownership_exemption_reason?: string}&\Stripe\StripeObject), representative_declaration?: (object{date?: int, ip?: string, user_agent?: string}&\Stripe\StripeObject), terms_of_service?: (object{account?: (object{date?: int, ip?: string, user_agent?: string}&\Stripe\StripeObject), card_creator?: (object{commercial?: (object{account_holder?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), celtic?: (object{apple_pay?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), charge_card?: (object{bank_terms?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), platform?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), spend_card?: (object{bank_terms?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), financing_disclosures?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), platform?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), cross_river_bank?: (object{apple_pay?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), charge_card?: (object{bank_terms?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), financing_disclosures?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), platform?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), prepaid_card?: (object{bank_terms?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), platform?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), spend_card?: (object{bank_terms?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), financing_disclosures?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), fifth_third?: (object{bank_terms?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), platform?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), global_account_holder?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), lead?: (object{apple_pay?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), prepaid_card?: (object{bank_terms?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), platform?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), consumer?: (object{account_holder?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), celtic?: (object{apple_pay?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), revolving_credit_card?: (object{bank_terms?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), financing_disclosures?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), platform?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), cross_river_bank?: (object{prepaid_card?: (object{bank_terms?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), financing_disclosures?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), platform?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), global_account_holder?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), lead?: (object{apple_pay?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), debit_card?: (object{bank_terms?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), financing_disclosures?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), platform?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), prepaid_card?: (object{bank_terms?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), financing_disclosures?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject), platform?: (object{date?: int, ip?: string, url?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), consumer_money_manager?: (object{date?: int, ip?: string, user_agent?: string}&\Stripe\StripeObject), consumer_privacy_disclosures?: (object{date?: int, ip?: string, user_agent?: string}&\Stripe\StripeObject), crypto_money_manager?: (object{date?: int, ip?: string, user_agent?: string}&\Stripe\StripeObject), money_manager?: (object{date?: int, ip?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), business_details?: (object{address?: (object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}&\Stripe\StripeObject), annual_revenue?: (object{amount?: \Stripe\StripeObject, fiscal_year_end?: string}&\Stripe\StripeObject), compliance_screening_description?: string, documents?: (object{bank_account_ownership_verification?: (object{files: string[], type: string}&\Stripe\StripeObject), company_license?: (object{files: string[], type: string}&\Stripe\StripeObject), company_memorandum_of_association?: (object{files: string[], type: string}&\Stripe\StripeObject), company_ministerial_decree?: (object{files: string[], type: string}&\Stripe\StripeObject), company_registration_verification?: (object{files: string[], type: string}&\Stripe\StripeObject), company_tax_id_verification?: (object{files: string[], type: string}&\Stripe\StripeObject), primary_verification?: (object{front_back: (object{back?: string, front: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), proof_of_address?: (object{files: string[], type: string}&\Stripe\StripeObject), proof_of_registration?: (object{files: string[], signer?: (object{person: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), proof_of_ultimate_beneficial_ownership?: (object{files: string[], signer?: (object{person: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), estimated_worker_count?: int, id_numbers?: (object{registrar?: string, type: string}&\Stripe\StripeObject)[], monthly_estimated_revenue?: (object{amount?: \Stripe\StripeObject}&\Stripe\StripeObject), phone?: string, registered_name?: string, registration_date?: (object{day: int, month: int, year: int}&\Stripe\StripeObject), script_addresses?: (object{kana?: (object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}&\Stripe\StripeObject), kanji?: (object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), script_names?: (object{kana?: (object{registered_name?: string}&\Stripe\StripeObject), kanji?: (object{registered_name?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), structure?: string}&\Stripe\StripeObject), country?: string, entity_type?: string, individual?: (object{account: string, additional_addresses?: (object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, purpose: string, state?: string, town?: string}&\Stripe\StripeObject)[], additional_names?: (object{full_name?: string, given_name?: string, purpose: string, surname?: string}&\Stripe\StripeObject)[], additional_terms_of_service?: (object{account?: (object{date?: int, ip?: string, user_agent?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), address?: (object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}&\Stripe\StripeObject), created: int, date_of_birth?: (object{day: int, month: int, year: int}&\Stripe\StripeObject), documents?: (object{company_authorization?: (object{files: string[], type: string}&\Stripe\StripeObject), passport?: (object{files: string[], type: string}&\Stripe\StripeObject), primary_verification?: (object{front_back: (object{back?: string, front: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), secondary_verification?: (object{front_back: (object{back?: string, front: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), visa?: (object{files: string[], type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), email?: string, given_name?: string, id: string, id_numbers?: (object{type: string}&\Stripe\StripeObject)[], legal_gender?: string, metadata?: \Stripe\StripeObject, nationalities?: string[], object: string, phone?: string, political_exposure?: string, relationship?: (object{authorizer?: bool, director?: bool, executive?: bool, legal_guardian?: bool, owner?: bool, percent_ownership?: string, representative?: bool, title?: string}&\Stripe\StripeObject), script_addresses?: (object{kana?: (object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}&\Stripe\StripeObject), kanji?: (object{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), script_names?: (object{kana?: (object{given_name?: string, surname?: string}&\Stripe\StripeObject), kanji?: (object{given_name?: string, surname?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), surname?: string, updated: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $identity Information about the company, individual, and business represented by the Account.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{network_business_profile?: string, type: string}&\Stripe\StripeObject) $related_network_object The network object related to this Account.
 * @property null|(object{entries?: (object{awaiting_action_from: string, description: string, errors: (object{code: string, description: string}&\Stripe\StripeObject)[], impact: (object{restricts_capabilities?: (object{capability: string, configuration: string, deadline: (object{status: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), minimum_deadline: (object{status: string}&\Stripe\StripeObject), reference?: (object{inquiry?: string, resource?: string, type: string}&\Stripe\StripeObject), requested_reasons: (object{code: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)[], summary?: (object{minimum_deadline?: (object{status: string, time?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $requirements Information about the active requirements for the Account, including what information needs to be collected, and by when.
 */
class Account extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.account';

    public static function fieldEncodings()
    {
        return [
            'configuration' => [
                'kind' => 'object',
                'fields' => [
                    'card_creator' => [
                        'kind' => 'object',
                        'fields' => [
                            'capabilities' => [
                                'kind' => 'object',
                                'fields' => [
                                    'commercial' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'celtic' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'charge_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'spend_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'cross_river_bank' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'charge_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'prepaid_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'spend_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'fifth_third' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'charge_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'lead' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'prepaid_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'stripe' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'charge_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'prepaid_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'consumer' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'celtic' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'revolving_credit_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'cross_river_bank' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'prepaid_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'lead' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'debit_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'prepaid_card' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'customer' => [
                        'kind' => 'object',
                        'fields' => [
                            'capabilities' => [
                                'kind' => 'object',
                                'fields' => [
                                    'automatic_indirect_tax' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'merchant' => [
                        'kind' => 'object',
                        'fields' => [
                            'capabilities' => [
                                'kind' => 'object',
                                'fields' => [
                                    'ach_debit_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'acss_debit_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'affirm_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'afterpay_clearpay_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'alma_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'amazon_pay_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'au_becs_debit_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'bacs_debit_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'bancontact_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'blik_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'boleto_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'card_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'cartes_bancaires_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'cashapp_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'eps_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'fpx_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'gb_bank_transfer_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'grabpay_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'ideal_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'jcb_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'jp_bank_transfer_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'kakao_pay_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'klarna_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'konbini_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'kr_card_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'link_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'mobilepay_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'multibanco_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'mx_bank_transfer_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'naver_pay_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'oxxo_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'p24_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'pay_by_bank_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'payco_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'paynow_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'promptpay_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'revolut_pay_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'samsung_pay_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'sepa_bank_transfer_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'sepa_debit_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'stripe_balance' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'payouts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'sunbit_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'swish_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'twint_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'us_bank_transfer_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'zip_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'money_manager' => [
                        'kind' => 'object',
                        'fields' => [
                            'capabilities' => [
                                'kind' => 'object',
                                'fields' => [
                                    'business_storage' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'inbound' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'aud' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'cad' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'eur' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'gbp' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usd' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usdc' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'outbound' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'aud' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'cad' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'eur' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'gbp' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usd' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usdc' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'consumer_storage' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'inbound' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'usd' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usdc' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'outbound' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'usd' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usdc' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'inbound_transfers' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'bank_accounts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'outbound_payments' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'bank_accounts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'cards' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'crypto_wallets' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'financial_accounts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'paper_checks' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'outbound_transfers' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'bank_accounts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'crypto_wallets' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'financial_accounts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'received_credits' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'bank_accounts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'crypto_wallets' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'received_debits' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'bank_accounts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'recipient' => [
                        'kind' => 'object',
                        'fields' => [
                            'capabilities' => [
                                'kind' => 'object',
                                'fields' => [
                                    'bank_accounts' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'ach' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'becs' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'eft' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'fedwire' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'fps' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'instant' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'local' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'npp' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'rtp' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'sepa_credit' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'sepa_instant' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'swift' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'wire' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'cards' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'crypto_wallets' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'paper_checks' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'protections' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'psp_migration' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'expires_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                            'requested_at' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'stripe_balance' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'payouts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'stripe_transfers' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'identity' => [
                'kind' => 'object',
                'fields' => [
                    'individual' => [
                        'kind' => 'object',
                        'fields' => [
                            'relationship' => [
                                'kind' => 'object',
                                'fields' => [
                                    'percent_ownership' => [
                                        'kind' => 'decimal_string',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    const DASHBOARD_EXPRESS = 'express';
    const DASHBOARD_FULL = 'full';
    const DASHBOARD_NONE = 'none';
}
