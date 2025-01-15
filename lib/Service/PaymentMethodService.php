<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentMethodService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of PaymentMethods for Treasury flows. If you want to list the
     * PaymentMethods attached to a Customer for payments, you should use the <a
     * href="/docs/api/payment_methods/customer_list">List a Customer’s
     * PaymentMethods</a> API instead.
     *
     * @param null|array{customer?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\PaymentMethod>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/payment_methods', $params, $opts);
    }

    /**
     * Attaches a PaymentMethod object to a Customer.
     *
     * To attach a new PaymentMethod to a customer for future payments, we recommend
     * you use a <a href="/docs/api/setup_intents">SetupIntent</a> or a PaymentIntent
     * with <a
     * href="/docs/api/payment_intents/create#create_payment_intent-setup_future_usage">setup_future_usage</a>.
     * These approaches will perform any necessary steps to set up the PaymentMethod
     * for future payments. Using the <code>/v1/payment_methods/:id/attach</code>
     * endpoint without first using a SetupIntent or PaymentIntent with
     * <code>setup_future_usage</code> does not optimize the PaymentMethod for future
     * use, which makes later declines and payment friction more likely. See <a
     * href="/docs/payments/payment-intents#future-usage">Optimizing cards for future
     * payments</a> for more information about setting up future payments.
     *
     * To use this PaymentMethod as the default for invoice or subscription payments,
     * set <a
     * href="/docs/api/customers/update#update_customer-invoice_settings-default_payment_method"><code>invoice_settings.default_payment_method</code></a>,
     * on the Customer to the PaymentMethod’s ID.
     *
     * @param string $id
     * @param null|array{customer: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod
     */
    public function attach($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_methods/%s/attach', $id), $params, $opts);
    }

    /**
     * Creates a PaymentMethod object. Read the <a
     * href="/docs/stripe-js/reference#stripe-create-payment-method">Stripe.js
     * reference</a> to learn how to create PaymentMethods via Stripe.js.
     *
     * Instead of creating a PaymentMethod directly, we recommend using the <a
     * href="/docs/payments/accept-a-payment">PaymentIntents</a> API to accept a
     * payment immediately or the <a
     * href="/docs/payments/save-and-reuse">SetupIntent</a> API to collect payment
     * method details ahead of a future payment.
     *
     * @param null|array{acss_debit?: array{account_number: string, institution_number: string, transit_number: string}, affirm?: array{}, afterpay_clearpay?: array{}, alipay?: array{}, allow_redisplay?: string, alma?: array{}, amazon_pay?: array{}, au_becs_debit?: array{account_number: string, bsb_number: string}, bacs_debit?: array{account_number?: string, sort_code?: string}, bancontact?: array{}, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, blik?: array{}, boleto?: array{tax_id: string}, card?: array{cvc?: string, exp_month?: int, exp_year?: int, networks?: array{preferred?: string}, number?: string, token?: string}, cashapp?: array{}, customer?: string, customer_balance?: array{}, eps?: array{bank?: string}, expand?: string[], fpx?: array{account_holder_type?: string, bank: string}, giropay?: array{}, gopay?: array{}, grabpay?: array{}, id_bank_transfer?: array{bank?: string}, ideal?: array{bank?: string}, interac_present?: array{}, kakao_pay?: array{}, klarna?: array{dob?: array{day: int, month: int, year: int}}, konbini?: array{}, kr_card?: array{}, link?: array{}, mb_way?: array{}, metadata?: \Stripe\StripeObject, mobilepay?: array{}, multibanco?: array{}, naver_pay?: array{funding?: string}, oxxo?: array{}, p24?: array{bank?: string}, pay_by_bank?: array{}, payco?: array{}, payment_method?: string, paynow?: array{}, paypal?: array{}, payto?: array{account_number?: string, bsb_number?: string, pay_id?: string}, pix?: array{}, promptpay?: array{}, qris?: array{}, radar_options?: array{session?: string}, rechnung?: array{dob: array{day: int, month: int, year: int}}, revolut_pay?: array{}, samsung_pay?: array{}, sepa_debit?: array{iban: string}, shopeepay?: array{}, sofort?: array{country: string}, swish?: array{}, twint?: array{}, type?: string, us_bank_account?: array{account_holder_type?: string, account_number?: string, account_type?: string, financial_connections_account?: string, routing_number?: string}, wechat_pay?: array{}, zip?: array{}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/payment_methods', $params, $opts);
    }

    /**
     * Detaches a PaymentMethod object from a Customer. After a PaymentMethod is
     * detached, it can no longer be used for a payment or re-attached to a Customer.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod
     */
    public function detach($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_methods/%s/detach', $id), $params, $opts);
    }

    /**
     * Retrieves a PaymentMethod object attached to the StripeAccount. To retrieve a
     * payment method attached to a Customer, you should use <a
     * href="/docs/api/payment_methods/customer">Retrieve a Customer’s
     * PaymentMethods</a>.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_methods/%s', $id), $params, $opts);
    }

    /**
     * Updates a PaymentMethod object. A PaymentMethod must be attached a customer to
     * be updated.
     *
     * @param string $id
     * @param null|array{allow_redisplay?: string, billing_details?: array{address?: null|array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: null|string, name?: null|string, phone?: null|string}, card?: array{exp_month?: int, exp_year?: int, networks?: array{preferred?: null|string}}, expand?: string[], link?: array{}, metadata?: null|\Stripe\StripeObject, naver_pay?: array{funding?: string}, pay_by_bank?: array{}, payto?: array{account_number?: string, bsb_number?: string, pay_id?: string}, us_bank_account?: array{account_holder_type?: string, account_type?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethod
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_methods/%s', $id), $params, $opts);
    }
}
