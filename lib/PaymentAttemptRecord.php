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
 * @property (object{currency: string, value: int}&StripeObject) $amount A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&StripeObject) $amount_authorized A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&StripeObject) $amount_canceled A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&StripeObject) $amount_failed A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&StripeObject) $amount_guaranteed A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&StripeObject) $amount_refunded A representation of an amount of money, consisting of an amount and a currency.
 * @property (object{currency: string, value: int}&StripeObject) $amount_requested A representation of an amount of money, consisting of an amount and a currency.
 * @property null|string $application ID of the Connect application that created the PaymentAttemptRecord.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{customer: null|string, email: null|string, name: null|string, phone: null|string}&StripeObject) $customer_details Customer information for this payment.
 * @property null|string $customer_presence Indicates whether the customer was present in your checkout flow during this payment.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{ach_credit_transfer?: (object{account_number: null|string, bank_name: null|string, routing_number: null|string, swift_code: null|string}&StripeObject), ach_debit?: (object{account_holder_type: null|string, bank_name: null|string, country: null|string, fingerprint: null|string, last4: null|string, routing_number: null|string}&StripeObject), acss_debit?: (object{bank_name: null|string, fingerprint: null|string, institution_number: null|string, last4: null|string, mandate?: string, transit_number: null|string}&StripeObject), affirm?: (object{location?: string, reader?: string, transaction_id: null|string}&StripeObject), afterpay_clearpay?: (object{order_id: null|string, reference: null|string}&StripeObject), alipay?: (object{buyer_id?: string, fingerprint: null|string, transaction_id: null|string}&StripeObject), alma?: (object{installments?: (object{count: int}&StripeObject), transaction_id: null|string}&StripeObject), amazon_pay?: (object{funding?: (object{card?: (object{brand: null|string, country: null|string, exp_month: null|int, exp_year: null|int, funding: null|string, last4: null|string}&StripeObject), type: null|string}&StripeObject), transaction_id: null|string}&StripeObject), au_becs_debit?: (object{bsb_number: null|string, fingerprint: null|string, last4: null|string, mandate?: string}&StripeObject), bacs_debit?: (object{fingerprint: null|string, last4: null|string, mandate: null|string, sort_code: null|string}&StripeObject), bancontact?: (object{bank_code: null|string, bank_name: null|string, bic: null|string, generated_sepa_debit: null|PaymentMethod|string, generated_sepa_debit_mandate: null|Mandate|string, iban_last4: null|string, preferred_language: null|string, verified_name: null|string}&StripeObject), billie?: (object{transaction_id: null|string}&StripeObject), billing_details: null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject), email: null|string, name: null|string, phone: null|string}&StripeObject), blik?: (object{buyer_id: null|string}&StripeObject), boleto?: (object{tax_id: string}&StripeObject), card?: (object{brand: string, capture_before?: int, checks: null|(object{address_line1_check: null|string, address_postal_code_check: null|string, cvc_check: null|string}&StripeObject), country: null|string, exp_month: int, exp_year: int, fingerprint?: null|string, funding: string, last4: string, moto?: bool, network: null|string, network_token?: null|(object{used: bool}&StripeObject), network_transaction_id: null|string, three_d_secure: null|(object{authentication_flow: null|string, result: null|string, result_reason: null|string, version: null|string}&StripeObject), wallet: null|(object{apple_pay?: (object{type: string}&StripeObject), dynamic_last4?: string, google_pay?: (object{}&StripeObject), type: string}&StripeObject)}&StripeObject), card_present?: (object{amount_authorized: null|int, brand: null|string, brand_product: null|string, capture_before?: int, cardholder_name: null|string, country: null|string, description?: null|string, emv_auth_data: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, generated_card: null|string, iin?: null|string, incremental_authorization_supported: bool, issuer?: null|string, last4: null|string, network: null|string, network_transaction_id: null|string, offline: null|(object{stored_at: null|int, type: null|string}&StripeObject), overcapture_supported: bool, preferred_locales: null|string[], read_method: null|string, receipt: null|(object{account_type?: string, application_cryptogram: null|string, application_preferred_name: null|string, authorization_code: null|string, authorization_response_code: null|string, cardholder_verification_method: null|string, dedicated_file_name: null|string, terminal_verification_results: null|string, transaction_status_information: null|string}&StripeObject), wallet?: (object{type: string}&StripeObject)}&StripeObject), cashapp?: (object{buyer_id: null|string, cashtag: null|string, transaction_id: null|string}&StripeObject), crypto?: (object{buyer_address?: string, network?: string, token_currency?: string, transaction_hash?: string}&StripeObject), custom?: (object{display_name: string, type: null|string}&StripeObject), customer_balance?: (object{}&StripeObject), eps?: (object{bank: null|string, verified_name: null|string}&StripeObject), fpx?: (object{account_holder_type: null|string, bank: string, transaction_id: null|string}&StripeObject), giropay?: (object{bank_code: null|string, bank_name: null|string, bic: null|string, verified_name: null|string}&StripeObject), grabpay?: (object{transaction_id: null|string}&StripeObject), ideal?: (object{bank: null|string, bic: null|string, generated_sepa_debit: null|PaymentMethod|string, generated_sepa_debit_mandate: null|Mandate|string, iban_last4: null|string, transaction_id: null|string, verified_name: null|string}&StripeObject), interac_present?: (object{brand: null|string, cardholder_name: null|string, country: null|string, description?: null|string, emv_auth_data: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, generated_card: null|string, iin?: null|string, issuer?: null|string, last4: null|string, network: null|string, network_transaction_id: null|string, preferred_locales: null|string[], read_method: null|string, receipt: null|(object{account_type?: string, application_cryptogram: null|string, application_preferred_name: null|string, authorization_code: null|string, authorization_response_code: null|string, cardholder_verification_method: null|string, dedicated_file_name: null|string, terminal_verification_results: null|string, transaction_status_information: null|string}&StripeObject)}&StripeObject), kakao_pay?: (object{buyer_id: null|string, transaction_id: null|string}&StripeObject), klarna?: (object{payer_details: null|(object{address: null|(object{country: null|string}&StripeObject)}&StripeObject), payment_method_category: null|string, preferred_locale: null|string}&StripeObject), konbini?: (object{store: null|(object{chain: null|string}&StripeObject)}&StripeObject), kr_card?: (object{brand: null|string, buyer_id: null|string, last4: null|string, transaction_id: null|string}&StripeObject), link?: (object{country: null|string}&StripeObject), mb_way?: (object{}&StripeObject), mobilepay?: (object{card: null|(object{brand: null|string, country: null|string, exp_month: null|int, exp_year: null|int, last4: null|string}&StripeObject)}&StripeObject), multibanco?: (object{entity: null|string, reference: null|string}&StripeObject), naver_pay?: (object{buyer_id: null|string, transaction_id: null|string}&StripeObject), nz_bank_account?: (object{account_holder_name: null|string, bank_code: string, bank_name: string, branch_code: string, last4: string, suffix: null|string}&StripeObject), oxxo?: (object{number: null|string}&StripeObject), p24?: (object{bank: null|string, reference: null|string, verified_name: null|string}&StripeObject), pay_by_bank?: (object{}&StripeObject), payco?: (object{buyer_id: null|string, transaction_id: null|string}&StripeObject), payment_method: null|string, paynow?: (object{location?: string, reader?: string, reference: null|string}&StripeObject), paypal?: (object{country: null|string, payer_email: null|string, payer_id: null|string, payer_name: null|string, seller_protection: null|(object{dispute_categories: null|string[], status: string}&StripeObject), transaction_id: null|string}&StripeObject), pix?: (object{bank_transaction_id?: null|string}&StripeObject), promptpay?: (object{reference: null|string}&StripeObject), revolut_pay?: (object{funding?: (object{card?: (object{brand: null|string, country: null|string, exp_month: null|int, exp_year: null|int, funding: null|string, last4: null|string}&StripeObject), type: null|string}&StripeObject), transaction_id: null|string}&StripeObject), samsung_pay?: (object{buyer_id: null|string, transaction_id: null|string}&StripeObject), satispay?: (object{transaction_id: null|string}&StripeObject), sepa_credit_transfer?: (object{bank_name: null|string, bic: null|string, iban: null|string}&StripeObject), sepa_debit?: (object{bank_code: null|string, branch_code: null|string, country: null|string, fingerprint: null|string, last4: null|string, mandate: null|string}&StripeObject), sofort?: (object{bank_code: null|string, bank_name: null|string, bic: null|string, country: null|string, generated_sepa_debit: null|PaymentMethod|string, generated_sepa_debit_mandate: null|Mandate|string, iban_last4: null|string, preferred_language: null|string, verified_name: null|string}&StripeObject), stripe_account?: (object{}&StripeObject), swish?: (object{fingerprint: null|string, payment_reference: null|string, verified_phone_last4: null|string}&StripeObject), twint?: (object{}&StripeObject), type: string, us_bank_account?: (object{account_holder_type: null|string, account_type: null|string, bank_name: null|string, fingerprint: null|string, last4: null|string, mandate?: Mandate|string, payment_reference: null|string, routing_number: null|string}&StripeObject), wechat?: (object{}&StripeObject), wechat_pay?: (object{fingerprint: null|string, location?: string, reader?: string, transaction_id: null|string}&StripeObject), zip?: (object{}&StripeObject)}&StripeObject) $payment_method_details Information about the Payment Method debited for this payment.
 * @property null|string $payment_record ID of the Payment Record this Payment Attempt Record belongs to.
 * @property (object{custom?: (object{payment_reference: null|string}&StripeObject), type: string}&StripeObject) $processor_details Processor information associated with this payment.
 * @property string $reported_by Indicates who reported the payment.
 * @property null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject), name: null|string, phone: null|string}&StripeObject) $shipping_details Shipping information for this payment.
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
     * @param null|array{expand?: string[], limit?: int, payment_record: string, starting_after?: string} $params
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
