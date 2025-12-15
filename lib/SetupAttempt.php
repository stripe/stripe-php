<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A SetupAttempt describes one attempted confirmation of a SetupIntent,
 * whether that confirmation is successful or unsuccessful. You can use
 * SetupAttempts to inspect details of a specific attempt at setting up a
 * payment method using a SetupIntent.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|Application|string $application The value of <a href="https://docs.stripe.com/api/setup_intents/object#setup_intent_object-application">application</a> on the SetupIntent at the time of this confirmation.
 * @property null|bool $attach_to_self <p>If present, the SetupIntent's payment method will be attached to the in-context Stripe Account.</p><p>It can only be used for this Stripe Account’s own money movement flows like InboundTransfer and OutboundTransfers. It cannot be set to true when setting up a PaymentMethod for a Customer, and defaults to false when attaching a PaymentMethod to a Customer.</p>
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|Customer|string $customer The value of <a href="https://docs.stripe.com/api/setup_intents/object#setup_intent_object-customer">customer</a> on the SetupIntent at the time of this confirmation.
 * @property null|string $customer_account The value of <a href="https://docs.stripe.com/api/setup_intents/object#setup_intent_object-customer_account">customer_account</a> on the SetupIntent at the time of this confirmation.
 * @property null|string[] $flow_directions <p>Indicates the directions of money movement for which this payment method is intended to be used.</p><p>Include <code>inbound</code> if you intend to use the payment method as the origin to pull funds from. Include <code>outbound</code> if you intend to use the payment method as the destination to send funds to. You can include both if you intend to use the payment method for both purposes.</p>
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|Account|string $on_behalf_of The value of <a href="https://docs.stripe.com/api/setup_intents/object#setup_intent_object-on_behalf_of">on_behalf_of</a> on the SetupIntent at the time of this confirmation.
 * @property PaymentMethod|string $payment_method ID of the payment method used with this SetupAttempt.
 * @property (object{acss_debit?: (object{}&StripeObject), amazon_pay?: (object{}&StripeObject), au_becs_debit?: (object{}&StripeObject), bacs_debit?: (object{}&StripeObject), bancontact?: (object{bank_code: null|string, bank_name: null|string, bic: null|string, generated_sepa_debit: null|PaymentMethod|string, generated_sepa_debit_mandate: null|Mandate|string, iban_last4: null|string, preferred_language: null|string, verified_name: null|string}&StripeObject), boleto?: (object{}&StripeObject), card?: (object{brand: null|string, checks: null|(object{address_line1_check: null|string, address_postal_code_check: null|string, cvc_check: null|string}&StripeObject), country: null|string, description?: null|string, exp_month: null|int, exp_year: null|int, fingerprint?: null|string, funding: null|string, iin?: null|string, issuer?: null|string, last4: null|string, network: null|string, three_d_secure: null|(object{authentication_flow: null|string, electronic_commerce_indicator: null|string, result: null|string, result_reason: null|string, transaction_id: null|string, version: null|string}&StripeObject), wallet: null|(object{apple_pay?: (object{}&StripeObject), google_pay?: (object{}&StripeObject), type: string}&StripeObject)}&StripeObject), card_present?: (object{generated_card: null|PaymentMethod|string, offline: null|(object{stored_at: null|int, type: null|string}&StripeObject)}&StripeObject), cashapp?: (object{}&StripeObject), ideal?: (object{bank: null|string, bic: null|string, generated_sepa_debit: null|PaymentMethod|string, generated_sepa_debit_mandate: null|Mandate|string, iban_last4: null|string, verified_name: null|string}&StripeObject), kakao_pay?: (object{}&StripeObject), klarna?: (object{}&StripeObject), kr_card?: (object{}&StripeObject), link?: (object{}&StripeObject), naver_pay?: (object{buyer_id?: string}&StripeObject), nz_bank_account?: (object{}&StripeObject), paypal?: (object{}&StripeObject), payto?: (object{}&StripeObject), revolut_pay?: (object{}&StripeObject), sepa_debit?: (object{}&StripeObject), sofort?: (object{bank_code: null|string, bank_name: null|string, bic: null|string, generated_sepa_debit: null|PaymentMethod|string, generated_sepa_debit_mandate: null|Mandate|string, iban_last4: null|string, preferred_language: null|string, verified_name: null|string}&StripeObject), type: string, us_bank_account?: (object{}&StripeObject)}&StripeObject) $payment_method_details
 * @property null|(object{advice_code?: string, charge?: string, code?: string, decline_code?: string, doc_url?: string, message?: string, network_advice_code?: string, network_decline_code?: string, param?: string, payment_intent?: PaymentIntent, payment_method?: PaymentMethod, payment_method_type?: string, request_log_url?: string, setup_intent?: SetupIntent, source?: Account|BankAccount|Card|Source, type: string}&StripeObject) $setup_error The error encountered during this attempt to confirm the SetupIntent, if any.
 * @property SetupIntent|string $setup_intent ID of the SetupIntent that this attempt belongs to.
 * @property string $status Status of this SetupAttempt, one of <code>requires_confirmation</code>, <code>requires_action</code>, <code>processing</code>, <code>succeeded</code>, <code>failed</code>, or <code>abandoned</code>.
 * @property string $usage The value of <a href="https://docs.stripe.com/api/setup_intents/object#setup_intent_object-usage">usage</a> on the SetupIntent at the time of this confirmation, one of <code>off_session</code> or <code>on_session</code>.
 */
class SetupAttempt extends ApiResource
{
    const OBJECT_NAME = 'setup_attempt';

    /**
     * Returns a list of SetupAttempts that associate with a provided SetupIntent.
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, setup_intent: string, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<SetupAttempt> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }
}
