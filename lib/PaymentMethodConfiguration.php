<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * PaymentMethodConfigurations control which payment methods are displayed to your customers when you don't explicitly specify payment method types. You can have multiple configurations with different sets of payment methods for different scenarios.
 *
 * There are two types of PaymentMethodConfigurations. Which is used depends on the <a href="https://stripe.com/docs/connect/charges">charge type</a>:
 *
 * <strong>Direct</strong> configurations apply to payments created on your account, including Connect destination charges, Connect separate charges and transfers, and payments not involving Connect.
 *
 * <strong>Child</strong> configurations apply to payments created on your connected accounts using direct charges, and charges with the on_behalf_of parameter.
 *
 * Child configurations have a <code>parent</code> that sets default values and controls which settings connected accounts may override. You can specify a parent ID at payment time, and Stripe will automatically resolve the connected account’s associated child configuration. Parent configurations are <a href="https://dashboard.stripe.com/settings/payment_methods/connected_accounts">managed in the dashboard</a> and are not available in this API.
 *
 * Related guides:
 * - <a href="https://stripe.com/docs/connect/payment-method-configurations">Payment Method Configurations API</a>
 * - <a href="https://stripe.com/docs/payments/multiple-payment-method-configs">Multiple configurations on dynamic payment methods</a>
 * - <a href="https://stripe.com/docs/connect/multiple-payment-method-configurations">Multiple configurations for your Connect accounts</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|StripeObject $acss_debit
 * @property bool $active Whether the configuration can be used for new payments.
 * @property null|StripeObject $affirm
 * @property null|StripeObject $afterpay_clearpay
 * @property null|StripeObject $alipay
 * @property null|StripeObject $alma
 * @property null|StripeObject $amazon_pay
 * @property null|StripeObject $apple_pay
 * @property null|string $application For child configs, the Connect application associated with the configuration.
 * @property null|StripeObject $au_becs_debit
 * @property null|StripeObject $bacs_debit
 * @property null|StripeObject $bancontact
 * @property null|StripeObject $blik
 * @property null|StripeObject $boleto
 * @property null|StripeObject $card
 * @property null|StripeObject $cartes_bancaires
 * @property null|StripeObject $cashapp
 * @property null|StripeObject $customer_balance
 * @property null|StripeObject $eps
 * @property null|StripeObject $fpx
 * @property null|StripeObject $giropay
 * @property null|StripeObject $google_pay
 * @property null|StripeObject $grabpay
 * @property null|StripeObject $ideal
 * @property bool $is_default The default configuration is used whenever a payment method configuration is not specified.
 * @property null|StripeObject $jcb
 * @property null|StripeObject $klarna
 * @property null|StripeObject $konbini
 * @property null|StripeObject $link
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|StripeObject $mobilepay
 * @property null|StripeObject $multibanco
 * @property string $name The configuration's name.
 * @property null|StripeObject $oxxo
 * @property null|StripeObject $p24
 * @property null|string $parent For child configs, the configuration's parent configuration.
 * @property null|StripeObject $pay_by_bank
 * @property null|StripeObject $paynow
 * @property null|StripeObject $paypal
 * @property null|StripeObject $promptpay
 * @property null|StripeObject $revolut_pay
 * @property null|StripeObject $sepa_debit
 * @property null|StripeObject $sofort
 * @property null|StripeObject $swish
 * @property null|StripeObject $twint
 * @property null|StripeObject $us_bank_account
 * @property null|StripeObject $wechat_pay
 * @property null|StripeObject $zip
 */
class PaymentMethodConfiguration extends ApiResource
{
    const OBJECT_NAME = 'payment_method_configuration';

    use ApiOperations\Update;

    /**
     * Creates a payment method configuration.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @return PaymentMethodConfiguration the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * List payment method configurations.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection<PaymentMethodConfiguration> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieve payment method configuration.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return PaymentMethodConfiguration
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

    /**
     * Update payment method configuration.
     *
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return PaymentMethodConfiguration the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
