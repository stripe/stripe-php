<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Mandate is a record of the permission that your customer gives you to debit their payment method.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{accepted_at: null|int, offline?: (object{}&StripeObject), online?: (object{ip_address: null|string, user_agent: null|string}&StripeObject), type: string}&StripeObject) $customer_acceptance
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{}&StripeObject) $multi_use
 * @property null|string $on_behalf_of The account (if any) that the mandate is intended for.
 * @property PaymentMethod|string $payment_method ID of the payment method associated with this mandate.
 * @property (object{acss_debit?: (object{default_for?: string[], interval_description: null|string, payment_schedule: string, transaction_type: string}&StripeObject), amazon_pay?: (object{}&StripeObject), au_becs_debit?: (object{url: string}&StripeObject), bacs_debit?: (object{network_status: string, reference: string, revocation_reason: null|string, url: string}&StripeObject), card?: (object{}&StripeObject), cashapp?: (object{}&StripeObject), kakao_pay?: (object{}&StripeObject), klarna?: (object{}&StripeObject), kr_card?: (object{}&StripeObject), link?: (object{}&StripeObject), naver_pay?: (object{}&StripeObject), nz_bank_account?: (object{}&StripeObject), paypal?: (object{billing_agreement_id: null|string, payer_id: null|string}&StripeObject), payto?: (object{amount: null|int, amount_type: string, end_date: null|string, payment_schedule: string, payments_per_period: null|int, purpose: null|string, start_date: null|string}&StripeObject), revolut_pay?: (object{}&StripeObject), sepa_debit?: (object{reference: string, url: string}&StripeObject), type: string, us_bank_account?: (object{collection_method?: string}&StripeObject)}&StripeObject) $payment_method_details
 * @property null|(object{amount: int, currency: string}&StripeObject) $single_use
 * @property string $status The mandate status indicates whether or not you can use it to initiate a payment.
 * @property string $type The type of the mandate.
 */
class Mandate extends ApiResource
{
    const OBJECT_NAME = 'mandate';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PENDING = 'pending';

    const TYPE_MULTI_USE = 'multi_use';
    const TYPE_SINGLE_USE = 'single_use';

    /**
     * Retrieves a Mandate object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Mandate
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
