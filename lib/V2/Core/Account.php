<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * A V2 Account is a representation of a company or individual that a Stripe user does business with. Accounts contain the contact details, Legal Entity information, and configuration required to enable the Account for use across Stripe products.
 *
 * @property string $id Unique identifier for the Account.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string[] $applied_configurations Filter only accounts that have all of the configurations specified. If omitted, returns all accounts regardless of which configurations they have.
 * @property null|(object{customer: null|(object{automatic_indirect_tax: null|(object{exempt: null|string, ip_address: null|string, location: null|(object{country: null|string, state: null|string}&\stdClass&\Stripe\StripeObject), location_source: null|string}&\stdClass&\Stripe\StripeObject), billing: null|(object{default_payment_method: null|string, invoice: null|(object{custom_fields: (object{name: string, value: string}&\stdClass&\Stripe\StripeObject)[], footer: null|string, next_sequence: null|int, prefix: null|string, rendering: null|(object{amount_tax_display: null|string, template: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), capabilities: null|(object{automatic_indirect_tax: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), shipping: null|(object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\stdClass&\Stripe\StripeObject), name: null|string, phone: null|string}&\stdClass&\Stripe\StripeObject), test_clock: null|string}&\stdClass&\Stripe\StripeObject), merchant: null|(object{bacs_debit_payments: null|(object{display_name: null|string, service_user_number: null|string}&\stdClass&\Stripe\StripeObject), branding: null|(object{icon: null|string, logo: null|string, primary_color: null|string, secondary_color: null|string}&\stdClass&\Stripe\StripeObject), capabilities: null|(object{ach_debit_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), acss_debit_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), affirm_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), afterpay_clearpay_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), alma_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), amazon_pay_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), au_becs_debit_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), bacs_debit_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), bancontact_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), blik_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), boleto_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), card_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), cartes_bancaires_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), cashapp_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), eps_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), fpx_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), gb_bank_transfer_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), grabpay_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), ideal_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), jcb_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), jp_bank_transfer_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), kakao_pay_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), klarna_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), konbini_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), kr_card_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), link_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), mobilepay_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), multibanco_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), mx_bank_transfer_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), naver_pay_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), oxxo_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), p24_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), pay_by_bank_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), payco_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), paynow_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), promptpay_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), revolut_pay_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), samsung_pay_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), sepa_bank_transfer_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), sepa_debit_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), swish_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), twint_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), us_bank_transfer_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), zip_payments: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), card_payments: null|(object{decline_on: null|(object{avs_failure: null|bool, cvc_failure: null|bool}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), mcc: null|string, sepa_debit_payments: null|(object{creditor_id: null|string}&\stdClass&\Stripe\StripeObject), statement_descriptor: null|(object{descriptor: null|string, prefix: null|string}&\stdClass&\Stripe\StripeObject), support: null|(object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\stdClass&\Stripe\StripeObject), email: null|string, phone: null|string, url: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), recipient: null|(object{capabilities: null|(object{bank_accounts: null|(object{local: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), wire: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), cards: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject), stripe_balance: null|(object{stripe_transfers: null|(object{requested: bool, status: string, status_details: (object{code: string, resolution: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), default_outbound_destination: null|(object{type: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject) $configuration An Account Configuration which allows the Account to take on a key persona across Stripe products.
 * @property null|string $contact_email The default contact email address for the Account.
 * @property int $created Time at which the object was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property null|string $dashboard A value indicating the Stripe dashboard this Account has access to. This will depend on which configurations are enabled for this account.
 * @property null|(object{currency: null|string, locales: null|string[], responsibilities: null|(object{fees_collector: string, losses_collector: string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject) $defaults Default values to be used on Account Configurations.
 * @property null|string $display_name A descriptive name for the Account. This name will be surfaced in the Stripe Dashboard and on any invoices sent to the Account.
 * @property null|(object{attestations: null|(object{directorship_declaration: null|(object{date: null|int, ip: null|string, user_agent: null|string}&\stdClass&\Stripe\StripeObject), ownership_declaration: null|(object{date: null|int, ip: null|string, user_agent: null|string}&\stdClass&\Stripe\StripeObject), persons_provided: null|(object{directors: null|bool, executives: null|bool, owners: null|bool, ownership_exemption_reason: null|string}&\stdClass&\Stripe\StripeObject), terms_of_service: null|(object{account: null|(object{date: null|int, ip: null|string, user_agent: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), business_details: null|(object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\stdClass&\Stripe\StripeObject), annual_revenue: null|(object{amount: null|\Stripe\StripeObject, fiscal_year_end: null|string}&\stdClass&\Stripe\StripeObject), documents: null|(object{bank_account_ownership_verification: null|(object{files: string[], type: string}&\stdClass&\Stripe\StripeObject), company_license: null|(object{files: string[], type: string}&\stdClass&\Stripe\StripeObject), company_memorandum_of_association: null|(object{files: string[], type: string}&\stdClass&\Stripe\StripeObject), company_ministerial_decree: null|(object{files: string[], type: string}&\stdClass&\Stripe\StripeObject), company_registration_verification: null|(object{files: string[], type: string}&\stdClass&\Stripe\StripeObject), company_tax_id_verification: null|(object{files: string[], type: string}&\stdClass&\Stripe\StripeObject), primary_verification: null|(object{front_back: (object{back: null|string, front: string}&\stdClass&\Stripe\StripeObject), type: string}&\stdClass&\Stripe\StripeObject), proof_of_registration: null|(object{files: string[], type: string}&\stdClass&\Stripe\StripeObject), proof_of_ultimate_beneficial_ownership: null|(object{files: string[], type: string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), doing_business_as: null|string, estimated_worker_count: null|int, id_numbers: null|((object{registrar: null|string, type: string}&\stdClass&\Stripe\StripeObject))[], monthly_estimated_revenue: null|(object{amount: null|\Stripe\StripeObject}&\stdClass&\Stripe\StripeObject), phone: null|string, product_description: null|string, registered_name: null|string, script_addresses: null|(object{kana: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\stdClass&\Stripe\StripeObject), kanji: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), script_names: null|(object{kana: null|(object{registered_name: null|string}&\stdClass&\Stripe\StripeObject), kanji: null|(object{registered_name: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), structure: null|string, url: null|string}&\stdClass&\Stripe\StripeObject), country: null|string, entity_type: null|string, individual: null|(object{account: string, additional_addresses: null|((object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, purpose: string, state: null|string, town: null|string}&\stdClass&\Stripe\StripeObject))[], additional_names: null|((object{full_name: null|string, given_name: null|string, purpose: string, surname: null|string}&\stdClass&\Stripe\StripeObject))[], additional_terms_of_service: null|(object{account: null|(object{date: null|int, ip: null|string, user_agent: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\stdClass&\Stripe\StripeObject), created: int, date_of_birth: null|(object{day: int, month: int, year: int}&\stdClass&\Stripe\StripeObject), documents: null|(object{company_authorization: null|(object{files: string[], type: string}&\stdClass&\Stripe\StripeObject), passport: null|(object{files: string[], type: string}&\stdClass&\Stripe\StripeObject), primary_verification: null|(object{front_back: (object{back: null|string, front: string}&\stdClass&\Stripe\StripeObject), type: string}&\stdClass&\Stripe\StripeObject), secondary_verification: null|(object{front_back: (object{back: null|string, front: string}&\stdClass&\Stripe\StripeObject), type: string}&\stdClass&\Stripe\StripeObject), visa: null|(object{files: string[], type: string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), email: null|string, given_name: null|string, id: string, id_numbers: null|(object{type: string}&\stdClass&\Stripe\StripeObject)[], legal_gender: null|string, metadata: null|\Stripe\StripeObject, nationalities: null|string[], object: string, phone: null|string, political_exposure: null|string, relationship: null|(object{director: null|bool, executive: null|bool, legal_guardian: null|bool, owner: null|bool, percent_ownership: null|string, representative: null|bool, title: null|string}&\stdClass&\Stripe\StripeObject), script_addresses: null|(object{kana: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\stdClass&\Stripe\StripeObject), kanji: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string, town: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), script_names: null|(object{kana: null|(object{given_name: null|string, surname: null|string}&\stdClass&\Stripe\StripeObject), kanji: null|(object{given_name: null|string, surname: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), surname: null|string, updated: int}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject) $identity Information about the company, individual, and business represented by the Account.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{collector: string, entries: null|((object{awaiting_action_from: string, description: string, errors: (object{code: string, description: string}&\stdClass&\Stripe\StripeObject)[], impact: (object{restricts_capabilities: null|(object{capability: string, configuration: string, deadline: (object{status: string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject)[], restricts_payouts: null|(object{deadline: (object{status: string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject), minimum_deadline: (object{status: string}&\stdClass&\Stripe\StripeObject), reference: null|(object{inquiry: null|string, resource: null|string, type: string}&\stdClass&\Stripe\StripeObject), requested_reasons: (object{code: string}&\stdClass&\Stripe\StripeObject)[]}&\stdClass&\Stripe\StripeObject))[], summary: null|(object{minimum_deadline: null|(object{status: string, time: null|int}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject) $requirements Information about the requirements for the Account, including what information needs to be collected, and by when.
 */
class Account extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.account';

    const DASHBOARD_EXPRESS = 'express';
    const DASHBOARD_FULL = 'full';
    const DASHBOARD_NONE = 'none';
}
