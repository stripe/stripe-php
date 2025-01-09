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
 * @property null|string|\Stripe\Application $application The value of <a href="https://stripe.com/docs/api/setup_intents/object#setup_intent_object-application">application</a> on the SetupIntent at the time of this confirmation.
 * @property null|bool $attach_to_self <p>If present, the SetupIntent's payment method will be attached to the in-context Stripe Account.</p><p>It can only be used for this Stripe Account’s own money movement flows like InboundTransfer and OutboundTransfers. It cannot be set to true when setting up a PaymentMethod for a Customer, and defaults to false when attaching a PaymentMethod to a Customer.</p>
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string|\Stripe\Customer $customer The value of <a href="https://stripe.com/docs/api/setup_intents/object#setup_intent_object-customer">customer</a> on the SetupIntent at the time of this confirmation.
 * @property null|string[] $flow_directions <p>Indicates the directions of money movement for which this payment method is intended to be used.</p><p>Include <code>inbound</code> if you intend to use the payment method as the origin to pull funds from. Include <code>outbound</code> if you intend to use the payment method as the destination to send funds to. You can include both if you intend to use the payment method for both purposes.</p>
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string|\Stripe\Account $on_behalf_of The value of <a href="https://stripe.com/docs/api/setup_intents/object#setup_intent_object-on_behalf_of">on_behalf_of</a> on the SetupIntent at the time of this confirmation.
 * @property string|\Stripe\PaymentMethod $payment_method ID of the payment method used with this SetupAttempt.
 * @property (object{acss_debit?: (object{}&\Stripe\StripeObject&\stdClass), amazon_pay?: (object{}&\Stripe\StripeObject&\stdClass), au_becs_debit?: (object{}&\Stripe\StripeObject&\stdClass), bacs_debit?: (object{}&\Stripe\StripeObject&\stdClass), bancontact?: (object{bank_code: null|string, bank_name: null|string, bic: null|string, generated_sepa_debit: null|string|\Stripe\PaymentMethod, generated_sepa_debit_mandate: null|string|\Stripe\Mandate, iban_last4: null|string, preferred_language: null|string, verified_name: null|string}&\Stripe\StripeObject&\stdClass), boleto?: (object{}&\Stripe\StripeObject&\stdClass), card?: (object{brand: null|string, checks: null|(object{address_line1_check: null|string, address_postal_code_check: null|string, cvc_check: null|string}&\Stripe\StripeObject&\stdClass), country: null|string, description?: null|string, exp_month: null|int, exp_year: null|int, fingerprint?: null|string, funding: null|string, iin?: null|string, issuer?: null|string, last4: null|string, network: null|string, three_d_secure: null|(object{authentication_flow: null|string, electronic_commerce_indicator: null|string, result: null|string, result_reason: null|string, transaction_id: null|string, version: null|string}&\Stripe\StripeObject&\stdClass), wallet: null|(object{apple_pay?: (object{}&\Stripe\StripeObject&\stdClass), google_pay?: (object{}&\Stripe\StripeObject&\stdClass), type: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), card_present?: (object{generated_card: null|string|\Stripe\PaymentMethod, offline: null|(object{stored_at: null|int, type: null|string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass), cashapp?: (object{}&\Stripe\StripeObject&\stdClass), id_bank_transfer?: (object{bank: null|string, bank_code: null|string, bank_name: null|string, display_name: null|string}&\Stripe\StripeObject&\stdClass), ideal?: (object{bank: null|string, bic: null|string, generated_sepa_debit: null|string|\Stripe\PaymentMethod, generated_sepa_debit_mandate: null|string|\Stripe\Mandate, iban_last4: null|string, verified_name: null|string}&\Stripe\StripeObject&\stdClass), kakao_pay?: (object{}&\Stripe\StripeObject&\stdClass), klarna?: (object{}&\Stripe\StripeObject&\stdClass), kr_card?: (object{}&\Stripe\StripeObject&\stdClass), link?: (object{}&\Stripe\StripeObject&\stdClass), paypal?: (object{}&\Stripe\StripeObject&\stdClass), payto?: (object{}&\Stripe\StripeObject&\stdClass), revolut_pay?: (object{}&\Stripe\StripeObject&\stdClass), sepa_debit?: (object{}&\Stripe\StripeObject&\stdClass), sofort?: (object{bank_code: null|string, bank_name: null|string, bic: null|string, generated_sepa_debit: null|string|\Stripe\PaymentMethod, generated_sepa_debit_mandate: null|string|\Stripe\Mandate, iban_last4: null|string, preferred_language: null|string, verified_name: null|string}&\Stripe\StripeObject&\stdClass), type: string, us_bank_account?: (object{}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $payment_method_details
 * @property null|(object{advice_code?: string, charge?: string, code?: string, decline_code?: string, doc_url?: string, message?: string, network_advice_code?: string, network_decline_code?: string, param?: string, payment_intent?: \Stripe\PaymentIntent, payment_method?: \Stripe\PaymentMethod, payment_method_type?: string, request_log_url?: string, setup_intent?: \Stripe\SetupIntent, source?: \Stripe\Account|\Stripe\BankAccount|\Stripe\Card|\Stripe\Source, type: string}&\Stripe\StripeObject&\stdClass) $setup_error The error encountered during this attempt to confirm the SetupIntent, if any.
 * @property string|\Stripe\SetupIntent $setup_intent ID of the SetupIntent that this attempt belongs to.
 * @property string $status Status of this SetupAttempt, one of <code>requires_confirmation</code>, <code>requires_action</code>, <code>processing</code>, <code>succeeded</code>, <code>failed</code>, or <code>abandoned</code>.
 * @property string $usage The value of <a href="https://stripe.com/docs/api/setup_intents/object#setup_intent_object-usage">usage</a> on the SetupIntent at the time of this confirmation, one of <code>off_session</code> or <code>on_session</code>.
 */
class SetupAttempt extends ApiResource
{
    const OBJECT_NAME = 'setup_attempt';

    /**
     * Returns a list of SetupAttempts that associate with a provided SetupIntent.
     *
     * @param null|array{created?: int|array, ending_before?: string, expand?: string[], limit?: int, setup_intent: string, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\SetupAttempt> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }
}
