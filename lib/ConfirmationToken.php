<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * ConfirmationTokens help transport client side data collected by Stripe JS over
 * to your server for confirming a PaymentIntent or SetupIntent. If the confirmation
 * is successful, values present on the ConfirmationToken are written onto the Intent.
 *
 * To learn more about how to use ConfirmationToken, visit the related guides:
 * - <a href="https://stripe.com/docs/payments/finalize-payments-on-the-server">Finalize payments on the server</a>
 * - <a href="https://stripe.com/docs/payments/build-a-two-step-confirmation">Build two-step confirmation</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|int $expires_at Time at which this ConfirmationToken expires and can no longer be used to confirm a PaymentIntent or SetupIntent.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{customer_acceptance: (object{online: null|(object{ip_address: null|string, user_agent: null|string}&\Stripe\StripeObject&\stdClass), type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $mandate_data Data used for generating a Mandate.
 * @property null|string $payment_intent ID of the PaymentIntent that this ConfirmationToken was used to confirm, or null if this ConfirmationToken has not yet been used.
 * @property null|(object{card: null|(object{cvc_token: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $payment_method_options Payment-method-specific configuration for this ConfirmationToken.
 * @property null|(object{acss_debit?: (object{bank_name: null|string, fingerprint: null|string, institution_number: null|string, last4: null|string, transit_number: null|string}&\Stripe\StripeObject&\stdClass), affirm?: (object{}&\Stripe\StripeObject&\stdClass), afterpay_clearpay?: (object{}&\Stripe\StripeObject&\stdClass), alipay?: (object{}&\Stripe\StripeObject&\stdClass), allow_redisplay?: string, alma?: (object{}&\Stripe\StripeObject&\stdClass), amazon_pay?: (object{}&\Stripe\StripeObject&\stdClass), au_becs_debit?: (object{bsb_number: null|string, fingerprint: null|string, last4: null|string}&\Stripe\StripeObject&\stdClass), bacs_debit?: (object{fingerprint: null|string, last4: null|string, sort_code: null|string}&\Stripe\StripeObject&\stdClass), bancontact?: (object{}&\Stripe\StripeObject&\stdClass), billing_details: (object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), email: null|string, name: null|string, phone: null|string}&\Stripe\StripeObject&\stdClass), blik?: (object{}&\Stripe\StripeObject&\stdClass), boleto?: (object{tax_id: string}&\Stripe\StripeObject&\stdClass), card?: (object{brand: string, checks: null|(object{address_line1_check: null|string, address_postal_code_check: null|string, cvc_check: null|string}&\Stripe\StripeObject&\stdClass), country: null|string, description?: null|string, display_brand: null|string, exp_month: int, exp_year: int, fingerprint?: null|string, funding: string, generated_from: null|(object{charge: null|string, payment_method_details: null|(object{card_present?: (object{amount_authorized: null|int, brand: null|string, brand_product: null|string, capture_before?: int, cardholder_name: null|string, country: null|string, description?: null|string, emv_auth_data: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, generated_card: null|string, iin?: null|string, incremental_authorization_supported: bool, issuer?: null|string, last4: null|string, network: null|string, network_transaction_id: null|string, offline: null|(object{stored_at: null|int, type: null|string}&\Stripe\StripeObject&\stdClass), overcapture_supported: bool, preferred_locales: null|string[], read_method: null|string, receipt: null|(object{account_type?: string, application_cryptogram: null|string, application_preferred_name: null|string, authorization_code: null|string, authorization_response_code: null|string, cardholder_verification_method: null|string, dedicated_file_name: null|string, terminal_verification_results: null|string, transaction_status_information: null|string}&\Stripe\StripeObject&\stdClass), wallet?: (object{type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), type: string}&\Stripe\StripeObject&\stdClass), setup_attempt: null|string|\Stripe\SetupAttempt}&\Stripe\StripeObject&\stdClass), iin?: null|string, issuer?: null|string, last4: string, networks: null|(object{available: string[], preferred: null|string}&\Stripe\StripeObject&\stdClass), regulated_status: null|string, three_d_secure_usage: null|(object{supported: bool}&\Stripe\StripeObject&\stdClass), wallet: null|(object{amex_express_checkout?: (object{}&\Stripe\StripeObject&\stdClass), apple_pay?: (object{}&\Stripe\StripeObject&\stdClass), dynamic_last4: null|string, google_pay?: (object{}&\Stripe\StripeObject&\stdClass), link?: (object{}&\Stripe\StripeObject&\stdClass), masterpass?: (object{billing_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), email: null|string, name: null|string, shipping_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), samsung_pay?: (object{}&\Stripe\StripeObject&\stdClass), type: string, visa_checkout?: (object{billing_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), email: null|string, name: null|string, shipping_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), card_present?: (object{brand: null|string, brand_product: null|string, cardholder_name: null|string, country: null|string, description?: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, iin?: null|string, issuer?: null|string, last4: null|string, networks: null|(object{available: string[], preferred: null|string}&\Stripe\StripeObject&\stdClass), offline: null|(object{stored_at: null|int, type: null|string}&\Stripe\StripeObject&\stdClass), preferred_locales: null|string[], read_method: null|string, wallet?: (object{type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), cashapp?: (object{buyer_id: null|string, cashtag: null|string}&\Stripe\StripeObject&\stdClass), customer: null|string|\Stripe\Customer, customer_balance?: (object{}&\Stripe\StripeObject&\stdClass), eps?: (object{bank: null|string}&\Stripe\StripeObject&\stdClass), fpx?: (object{account_holder_type: null|string, bank: string}&\Stripe\StripeObject&\stdClass), giropay?: (object{}&\Stripe\StripeObject&\stdClass), gopay?: (object{}&\Stripe\StripeObject&\stdClass), grabpay?: (object{}&\Stripe\StripeObject&\stdClass), id_bank_transfer?: (object{bank: null|string, bank_code: null|string, bank_name: null|string, display_name: null|string}&\Stripe\StripeObject&\stdClass), ideal?: (object{bank: null|string, bic: null|string}&\Stripe\StripeObject&\stdClass), interac_present?: (object{brand: null|string, cardholder_name: null|string, country: null|string, description?: null|string, exp_month: int, exp_year: int, fingerprint: null|string, funding: null|string, iin?: null|string, issuer?: null|string, last4: null|string, networks: null|(object{available: string[], preferred: null|string}&\Stripe\StripeObject&\stdClass), preferred_locales: null|string[], read_method: null|string}&\Stripe\StripeObject&\stdClass), kakao_pay?: (object{}&\Stripe\StripeObject&\stdClass), klarna?: (object{dob?: null|(object{day: null|int, month: null|int, year: null|int}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), konbini?: (object{}&\Stripe\StripeObject&\stdClass), kr_card?: (object{brand: null|string, last4: null|string}&\Stripe\StripeObject&\stdClass), link?: (object{email: null|string, persistent_token?: string}&\Stripe\StripeObject&\stdClass), mb_way?: (object{}&\Stripe\StripeObject&\stdClass), mobilepay?: (object{}&\Stripe\StripeObject&\stdClass), multibanco?: (object{}&\Stripe\StripeObject&\stdClass), naver_pay?: (object{funding: string}&\Stripe\StripeObject&\stdClass), oxxo?: (object{}&\Stripe\StripeObject&\stdClass), p24?: (object{bank: null|string}&\Stripe\StripeObject&\stdClass), pay_by_bank?: (object{}&\Stripe\StripeObject&\stdClass), payco?: (object{}&\Stripe\StripeObject&\stdClass), paynow?: (object{}&\Stripe\StripeObject&\stdClass), paypal?: (object{country: null|string, fingerprint?: null|string, payer_email: null|string, payer_id: null|string, verified_email?: null|string}&\Stripe\StripeObject&\stdClass), payto?: (object{bsb_number: null|string, last4: null|string, pay_id: null|string}&\Stripe\StripeObject&\stdClass), pix?: (object{}&\Stripe\StripeObject&\stdClass), promptpay?: (object{}&\Stripe\StripeObject&\stdClass), qris?: (object{}&\Stripe\StripeObject&\stdClass), rechnung?: (object{dob?: (object{day: int, month: int, year: int}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), revolut_pay?: (object{}&\Stripe\StripeObject&\stdClass), samsung_pay?: (object{}&\Stripe\StripeObject&\stdClass), sepa_debit?: (object{bank_code: null|string, branch_code: null|string, country: null|string, fingerprint: null|string, generated_from: null|(object{charge: null|string|\Stripe\Charge, setup_attempt: null|string|\Stripe\SetupAttempt}&\Stripe\StripeObject&\stdClass), last4: null|string}&\Stripe\StripeObject&\stdClass), shopeepay?: (object{}&\Stripe\StripeObject&\stdClass), sofort?: (object{country: null|string}&\Stripe\StripeObject&\stdClass), swish?: (object{}&\Stripe\StripeObject&\stdClass), twint?: (object{}&\Stripe\StripeObject&\stdClass), type: string, us_bank_account?: (object{account_holder_type: null|string, account_number?: null|string, account_type: null|string, bank_name: null|string, financial_connections_account: null|string, fingerprint: null|string, last4: null|string, networks: null|(object{preferred: null|string, supported: string[]}&\Stripe\StripeObject&\stdClass), routing_number: null|string, status_details: null|(object{blocked?: (object{network_code: null|string, reason: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), wechat_pay?: (object{}&\Stripe\StripeObject&\stdClass), zip?: (object{}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $payment_method_preview Payment details collected by the Payment Element, used to create a PaymentMethod when a PaymentIntent or SetupIntent is confirmed with this ConfirmationToken.
 * @property null|string $return_url Return URL used to confirm the Intent.
 * @property null|string $setup_future_usage <p>Indicates that you intend to make future payments with this ConfirmationToken's payment method.</p><p>The presence of this property will <a href="https://stripe.com/docs/payments/save-during-payment">attach the payment method</a> to the PaymentIntent's Customer, if present, after the PaymentIntent is confirmed and any required actions from the user are complete.</p>
 * @property null|string $setup_intent ID of the SetupIntent that this ConfirmationToken was used to confirm, or null if this ConfirmationToken has not yet been used.
 * @property null|(object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), name: string, phone: null|string}&\Stripe\StripeObject&\stdClass) $shipping Shipping information collected on this ConfirmationToken.
 * @property bool $use_stripe_sdk Indicates whether the Stripe SDK is used to handle confirmation flow. Defaults to <code>true</code> on ConfirmationToken.
 */
class ConfirmationToken extends ApiResource
{
    const OBJECT_NAME = 'confirmation_token';

    const SETUP_FUTURE_USAGE_OFF_SESSION = 'off_session';
    const SETUP_FUTURE_USAGE_ON_SESSION = 'on_session';

    /**
     * Retrieves an existing ConfirmationToken object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\ConfirmationToken
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
