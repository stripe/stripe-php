<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PaymentMethodConfigurationService extends \Stripe\Service\AbstractService
{
    /**
     * List payment method configurations.
     *
     * @param null|array{application?: null|string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\PaymentMethodConfiguration>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/payment_method_configurations', $params, $opts);
    }

    /**
     * Creates a payment method configuration.
     *
     * @param null|array{acss_debit?: array{display_preference?: array{preference?: string}}, affirm?: array{display_preference?: array{preference?: string}}, afterpay_clearpay?: array{display_preference?: array{preference?: string}}, alipay?: array{display_preference?: array{preference?: string}}, alma?: array{display_preference?: array{preference?: string}}, amazon_pay?: array{display_preference?: array{preference?: string}}, apple_pay?: array{display_preference?: array{preference?: string}}, apple_pay_later?: array{display_preference?: array{preference?: string}}, au_becs_debit?: array{display_preference?: array{preference?: string}}, bacs_debit?: array{display_preference?: array{preference?: string}}, bancontact?: array{display_preference?: array{preference?: string}}, blik?: array{display_preference?: array{preference?: string}}, boleto?: array{display_preference?: array{preference?: string}}, card?: array{display_preference?: array{preference?: string}}, cartes_bancaires?: array{display_preference?: array{preference?: string}}, cashapp?: array{display_preference?: array{preference?: string}}, customer_balance?: array{display_preference?: array{preference?: string}}, eps?: array{display_preference?: array{preference?: string}}, expand?: string[], fpx?: array{display_preference?: array{preference?: string}}, giropay?: array{display_preference?: array{preference?: string}}, google_pay?: array{display_preference?: array{preference?: string}}, gopay?: array{display_preference?: array{preference?: string}}, grabpay?: array{display_preference?: array{preference?: string}}, id_bank_transfer?: array{display_preference?: array{preference?: string}}, ideal?: array{display_preference?: array{preference?: string}}, jcb?: array{display_preference?: array{preference?: string}}, klarna?: array{display_preference?: array{preference?: string}}, konbini?: array{display_preference?: array{preference?: string}}, link?: array{display_preference?: array{preference?: string}}, mobilepay?: array{display_preference?: array{preference?: string}}, multibanco?: array{display_preference?: array{preference?: string}}, name?: string, oxxo?: array{display_preference?: array{preference?: string}}, p24?: array{display_preference?: array{preference?: string}}, parent?: string, paynow?: array{display_preference?: array{preference?: string}}, paypal?: array{display_preference?: array{preference?: string}}, payto?: array{display_preference?: array{preference?: string}}, promptpay?: array{display_preference?: array{preference?: string}}, qris?: array{display_preference?: array{preference?: string}}, revolut_pay?: array{display_preference?: array{preference?: string}}, sepa_debit?: array{display_preference?: array{preference?: string}}, shopeepay?: array{display_preference?: array{preference?: string}}, sofort?: array{display_preference?: array{preference?: string}}, swish?: array{display_preference?: array{preference?: string}}, twint?: array{display_preference?: array{preference?: string}}, us_bank_account?: array{display_preference?: array{preference?: string}}, wechat_pay?: array{display_preference?: array{preference?: string}}, zip?: array{display_preference?: array{preference?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethodConfiguration
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/payment_method_configurations', $params, $opts);
    }

    /**
     * Retrieve payment method configuration.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethodConfiguration
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/payment_method_configurations/%s', $id), $params, $opts);
    }

    /**
     * Update payment method configuration.
     *
     * @param string $id
     * @param null|array{acss_debit?: array{display_preference?: array{preference?: string}}, active?: bool, affirm?: array{display_preference?: array{preference?: string}}, afterpay_clearpay?: array{display_preference?: array{preference?: string}}, alipay?: array{display_preference?: array{preference?: string}}, alma?: array{display_preference?: array{preference?: string}}, amazon_pay?: array{display_preference?: array{preference?: string}}, apple_pay?: array{display_preference?: array{preference?: string}}, apple_pay_later?: array{display_preference?: array{preference?: string}}, au_becs_debit?: array{display_preference?: array{preference?: string}}, bacs_debit?: array{display_preference?: array{preference?: string}}, bancontact?: array{display_preference?: array{preference?: string}}, blik?: array{display_preference?: array{preference?: string}}, boleto?: array{display_preference?: array{preference?: string}}, card?: array{display_preference?: array{preference?: string}}, cartes_bancaires?: array{display_preference?: array{preference?: string}}, cashapp?: array{display_preference?: array{preference?: string}}, customer_balance?: array{display_preference?: array{preference?: string}}, eps?: array{display_preference?: array{preference?: string}}, expand?: string[], fpx?: array{display_preference?: array{preference?: string}}, giropay?: array{display_preference?: array{preference?: string}}, google_pay?: array{display_preference?: array{preference?: string}}, gopay?: array{display_preference?: array{preference?: string}}, grabpay?: array{display_preference?: array{preference?: string}}, id_bank_transfer?: array{display_preference?: array{preference?: string}}, ideal?: array{display_preference?: array{preference?: string}}, jcb?: array{display_preference?: array{preference?: string}}, klarna?: array{display_preference?: array{preference?: string}}, konbini?: array{display_preference?: array{preference?: string}}, link?: array{display_preference?: array{preference?: string}}, mobilepay?: array{display_preference?: array{preference?: string}}, multibanco?: array{display_preference?: array{preference?: string}}, name?: string, oxxo?: array{display_preference?: array{preference?: string}}, p24?: array{display_preference?: array{preference?: string}}, paynow?: array{display_preference?: array{preference?: string}}, paypal?: array{display_preference?: array{preference?: string}}, payto?: array{display_preference?: array{preference?: string}}, promptpay?: array{display_preference?: array{preference?: string}}, qris?: array{display_preference?: array{preference?: string}}, revolut_pay?: array{display_preference?: array{preference?: string}}, sepa_debit?: array{display_preference?: array{preference?: string}}, shopeepay?: array{display_preference?: array{preference?: string}}, sofort?: array{display_preference?: array{preference?: string}}, swish?: array{display_preference?: array{preference?: string}}, twint?: array{display_preference?: array{preference?: string}}, us_bank_account?: array{display_preference?: array{preference?: string}}, wechat_pay?: array{display_preference?: array{preference?: string}}, zip?: array{display_preference?: array{preference?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethodConfiguration
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/payment_method_configurations/%s', $id), $params, $opts);
    }
}
