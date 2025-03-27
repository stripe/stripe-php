<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Payment Attempt Record represents an individual attempt at making a payment, on or off Stripe.
 * Each payment attempt tries to collect a fixed amount of money from a fixed customer and payment
 * method. Payment Attempt Records are attached to Payment Records. Only one attempt per Payment Record
 * can have guaranteed funds.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{currency: string, value: int}&\stdClass&StripeObject) $amount_canceled A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&\stdClass&StripeObject) $amount_failed A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&\stdClass&StripeObject) $amount_guaranteed A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&\stdClass&StripeObject) $amount_requested A representation of an amount of money, consisting of an amount and a currency.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{customer: null|string, email: null|string, name: null|string, phone: null|string}&\stdClass&StripeObject) $customer_details Customer information for this payment.
 * @property null|string $customer_presence Indicates whether the customer was present in your checkout flow during this payment.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{ach_credit_transfer?: (object{account_number: null|string, bank_name: null|string, routing_number: null|string, swift_code: null|string}&\stdClass&StripeObject), ach_debit?: (object{account_holder_type: null|string, bank_name: null|string, country: null|string, fingerprint: null|string, last4: null|string, routing_number: null|string}&\stdClass&StripeObject), acss_debit?: (object{bank_name: null|string, fingerprint: null|string, institution_number: null|string, last4: null|string, mandate?: string, transit_number: null|string}&\stdClass&StripeObject), affirm?: (object{transaction_id: null|string}&\stdClass&StripeObject), afterpay_clearpay?: (object{order_id: null|string, reference: null|string}&\stdClass&StripeObject), alipay?: (object{buyer_id?: string, fingerprint: null|string, transaction_id: null|string}&\stdClass&StripeObject), alma?: (object{}&\stdClass&StripeObject), amazon_pay?: (object{funding?: (object{card?: (object{brand: null|string, brand_product?: null|string, country: null|string, exp_month: null|int, exp_year: null|int, funding: null|string, last4: null|string}&\stdClass&StripeObject), type: null|string}&\stdClass&StripeObject)}&\stdClass&StripeObject), au_becs_debit?: (object{bsb_number: null|string, fingerprint: null|string, last4: null|string, mandate?: string}&\stdClass&StripeObject), bacs_debit?: (object{fingerprint: null|string, last4: null|string, mandate: null|string, sort_code: null|string}&\stdClass&StripeObject), bancontact?: (object{bank_code: null|string, bank_name: null|string, bic: null|string, generated_sepa_debit: null|PaymentMethod|string, generated_sepa_debit_mandate: null|Mandate|string, iban_last4: null|string, preferred_language: null|string, verified_name: null|string}&\stdClass&StripeObject), billie?: (object{}&\stdClass&StripeObject), billing_details: null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\stdClass&StripeObject), email: null|string, name: null|string, phone: null|string}&\stdClass&StripeObject), blik?: (object{buyer_id: null|string}&\stdClass&StripeObject), boleto?: (object{tax_id: string}&\stdClass&StripeObject), card?: (object{brand: string, capture_before?: int, checks: null|(object{address_line1_check: null|string, address_postal_code_check: null|string, cvc_check: null|string}&\stdClass&StripeObject), country: null|string, exp_month: int, exp_year: int, fingerprint?: null|string, funding: string, last4: string, moto?: bool, network: null|string, network_token?: null|(object{used: bool}&\stdClass&StripeObject), network_transaction_id: null|string, three_d_secure: null|(object{authentication_flow: null|string, result: null|string, result_reason: null|string, version: null|string}&\stdClass&StripeObject)}&\stdClass&StripeObject), card_present?: (object{amount_authorized: null|int, brand: null|string, brand_product: null|string, capture_before?: int, cardholder_name: null|string, country: null|string, description?: null|string, emv_auth_data: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, generated_card: null|string, iin?: null|string, incremental_authorization_supported: bool, issuer?: null|string, last4: null|string, network: null|string, network_transaction_id: null|string, offline: null|(object{stored_at: null|int, type: null|string}&\stdClass&StripeObject), overcapture_supported: bool, preferred_locales: null|string[], read_method: null|string, receipt: null|(object{account_type?: string, application_cryptogram: null|string, application_preferred_name: null|string, authorization_code: null|string, authorization_response_code: null|string, cardholder_verification_method: null|string, dedicated_file_name: null|string, terminal_verification_results: null|string, transaction_status_information: null|string}&\stdClass&StripeObject), wallet?: (object{type: string}&\stdClass&StripeObject)}&\stdClass&StripeObject), cashapp?: (object{buyer_id: null|string, cashtag: null|string}&\stdClass&StripeObject), custom?: (object{display_name: string, type: null|string}&\stdClass&StripeObject), customer_balance?: (object{}&\stdClass&StripeObject), eps?: (object{bank: null|string, verified_name: null|string}&\stdClass&StripeObject), fpx?: (object{account_holder_type: null|string, bank: string, transaction_id: null|string}&\stdClass&StripeObject), giropay?: (object{bank_code: null|string, bank_name: null|string, bic: null|string, verified_name: null|string}&\stdClass&StripeObject), gopay?: (object{}&\stdClass&StripeObject), grabpay?: (object{transaction_id: null|string}&\stdClass&StripeObject), id_bank_transfer?: (object{account_number: string, bank: string, bank_code?: string, bank_name?: string, display_name?: string}&\stdClass&StripeObject), ideal?: (object{bank: null|string, bic: null|string, generated_sepa_debit: null|PaymentMethod|string, generated_sepa_debit_mandate: null|Mandate|string, iban_last4: null|string, verified_name: null|string}&\stdClass&StripeObject), interac_present?: (object{brand: null|string, cardholder_name: null|string, country: null|string, description?: null|string, emv_auth_data: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, generated_card: null|string, iin?: null|string, issuer?: null|string, last4: null|string, network: null|string, network_transaction_id: null|string, preferred_locales: null|string[], read_method: null|string, receipt: null|(object{account_type?: string, application_cryptogram: null|string, application_preferred_name: null|string, authorization_code: null|string, authorization_response_code: null|string, cardholder_verification_method: null|string, dedicated_file_name: null|string, terminal_verification_results: null|string, transaction_status_information: null|string}&\stdClass&StripeObject)}&\stdClass&StripeObject), kakao_pay?: (object{buyer_id: null|string}&\stdClass&StripeObject), klarna?: (object{payer_details: null|(object{address: null|(object{country: null|string}&\stdClass&StripeObject)}&\stdClass&StripeObject), payment_method_category: null|string, preferred_locale: null|string}&\stdClass&StripeObject), konbini?: (object{store: null|(object{chain: null|string}&\stdClass&StripeObject)}&\stdClass&StripeObject), kr_card?: (object{brand: null|string, buyer_id: null|string, last4: null|string}&\stdClass&StripeObject), link?: (object{country: null|string}&\stdClass&StripeObject), mb_way?: (object{}&\stdClass&StripeObject), mobilepay?: (object{card: null|(object{brand: null|string, country: null|string, exp_month: null|int, exp_year: null|int, last4: null|string}&\stdClass&StripeObject)}&\stdClass&StripeObject), multibanco?: (object{entity: null|string, reference: null|string}&\stdClass&StripeObject), naver_pay?: (object{buyer_id: null|string}&\stdClass&StripeObject), nz_bank_account?: (object{account_holder_name: null|string, bank_code: string, bank_name: string, branch_code: string, last4: string, suffix: null|string}&\stdClass&StripeObject), oxxo?: (object{number: null|string}&\stdClass&StripeObject), p24?: (object{bank: null|string, reference: null|string, verified_name: null|string}&\stdClass&StripeObject), pay_by_bank?: (object{}&\stdClass&StripeObject), payco?: (object{buyer_id: null|string}&\stdClass&StripeObject), payment_method: null|string, paynow?: (object{reference: null|string}&\stdClass&StripeObject), paypal?: (object{country: null|string, payer_email: null|string, payer_id: null|string, payer_name: null|string, seller_protection: null|(object{dispute_categories: null|string[], status: string}&\stdClass&StripeObject), shipping?: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\stdClass&StripeObject), transaction_id: null|string, verified_address?: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\stdClass&StripeObject), verified_email?: null|string, verified_name?: null|string}&\stdClass&StripeObject), payto?: (object{bsb_number: null|string, last4: null|string, mandate?: string, pay_id: null|string}&\stdClass&StripeObject), pix?: (object{bank_transaction_id?: null|string}&\stdClass&StripeObject), promptpay?: (object{reference: null|string}&\stdClass&StripeObject), qris?: (object{}&\stdClass&StripeObject), rechnung?: (object{}&\stdClass&StripeObject), revolut_pay?: (object{funding?: (object{card?: (object{brand: null|string, brand_product?: null|string, country: null|string, exp_month: null|int, exp_year: null|int, funding: null|string, last4: null|string}&\stdClass&StripeObject), type: null|string}&\stdClass&StripeObject)}&\stdClass&StripeObject), samsung_pay?: (object{buyer_id: null|string}&\stdClass&StripeObject), satispay?: (object{}&\stdClass&StripeObject), sepa_credit_transfer?: (object{bank_name: null|string, bic: null|string, iban: null|string}&\stdClass&StripeObject), sepa_debit?: (object{bank_code: null|string, branch_code: null|string, country: null|string, fingerprint: null|string, last4: null|string, mandate: null|string}&\stdClass&StripeObject), shopeepay?: (object{}&\stdClass&StripeObject), sofort?: (object{bank_code: null|string, bank_name: null|string, bic: null|string, country: null|string, generated_sepa_debit: null|PaymentMethod|string, generated_sepa_debit_mandate: null|Mandate|string, iban_last4: null|string, preferred_language: null|string, verified_name: null|string}&\stdClass&StripeObject), stripe_account?: (object{}&\stdClass&StripeObject), stripe_balance?: (object{account?: null|string, source_type: string}&\stdClass&StripeObject), swish?: (object{fingerprint: null|string, payment_reference: null|string, verified_phone_last4: null|string}&\stdClass&StripeObject), twint?: (object{}&\stdClass&StripeObject), type: string, us_bank_account?: (object{account_holder_type: null|string, account_type: null|string, bank_name: null|string, fingerprint: null|string, last4: null|string, mandate?: Mandate|string, payment_reference: null|string, routing_number: null|string}&\stdClass&StripeObject), wechat?: (object{}&\stdClass&StripeObject), wechat_pay?: (object{fingerprint: null|string, transaction_id: null|string}&\stdClass&StripeObject), zip?: (object{}&\stdClass&StripeObject)}&\stdClass&StripeObject) $payment_method_details Information about the Payment Method debited for this payment.
 * @property null|string $payment_record ID of the Payment Record this Payment Attempt Record belongs to.
 * @property null|string $payment_reference An opaque string for manual reconciliation of this payment, for example a check number or a payment processor ID.
 * @property string $reported_by Indicates who reported the payment.
 * @property null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\stdClass&StripeObject), name: null|string, phone: null|string}&\stdClass&StripeObject) $shipping_details Shipping information for this payment.
 */
class PaymentAttemptRecord extends ApiResource
{
    const OBJECT_NAME = 'payment_attempt_record';

    const CUSTOMER_PRESENCE_OFF_SESSION = 'off_session';
    const CUSTOMER_PRESENCE_ON_SESSION = 'on_session';

    const REPORTED_BY_SELF = 'self';
    const REPORTED_BY_STRIPE = 'stripe';

    /**
     * List all the Payment Attempt Records attached to the specified Payment Record.
     *
     * @param null|array{expand?: string[], payment_record: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<PaymentAttemptRecord> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves a Payment Attempt Record with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return PaymentAttemptRecord
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
