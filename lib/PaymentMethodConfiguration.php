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
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $acss_debit
 * @property bool $active Whether the configuration can be used for new payments.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $affirm
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $afterpay_clearpay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $alipay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $alma
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $amazon_pay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $apple_pay
 * @property null|string $application For child configs, the Connect application associated with the configuration.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $au_becs_debit
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $bacs_debit
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $bancontact
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $blik
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $boleto
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $card
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $cartes_bancaires
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $cashapp
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $customer_balance
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $eps
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $fpx
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $giropay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $google_pay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $gopay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $grabpay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $id_bank_transfer
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $ideal
 * @property bool $is_default The default configuration is used whenever a payment method configuration is not specified.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $jcb
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $klarna
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $konbini
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $link
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $mobilepay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $multibanco
 * @property string $name The configuration's name.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $oxxo
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $p24
 * @property null|string $parent For child configs, the configuration's parent configuration.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $paynow
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $paypal
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $payto
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $promptpay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $qris
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $revolut_pay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $sepa_debit
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $shopeepay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $sofort
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $swish
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $twint
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $us_bank_account
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $wechat_pay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $zip
 */
class PaymentMethodConfiguration extends ApiResource
{
    const OBJECT_NAME = 'payment_method_configuration';

    use ApiOperations\Update;

    /**
     * Creates a payment method configuration.
     *
     * @param null|array{acss_debit?: array{display_preference?: array{preference?: string}}, affirm?: array{display_preference?: array{preference?: string}}, afterpay_clearpay?: array{display_preference?: array{preference?: string}}, alipay?: array{display_preference?: array{preference?: string}}, alma?: array{display_preference?: array{preference?: string}}, amazon_pay?: array{display_preference?: array{preference?: string}}, apple_pay?: array{display_preference?: array{preference?: string}}, apple_pay_later?: array{display_preference?: array{preference?: string}}, au_becs_debit?: array{display_preference?: array{preference?: string}}, bacs_debit?: array{display_preference?: array{preference?: string}}, bancontact?: array{display_preference?: array{preference?: string}}, blik?: array{display_preference?: array{preference?: string}}, boleto?: array{display_preference?: array{preference?: string}}, card?: array{display_preference?: array{preference?: string}}, cartes_bancaires?: array{display_preference?: array{preference?: string}}, cashapp?: array{display_preference?: array{preference?: string}}, customer_balance?: array{display_preference?: array{preference?: string}}, eps?: array{display_preference?: array{preference?: string}}, expand?: string[], fpx?: array{display_preference?: array{preference?: string}}, giropay?: array{display_preference?: array{preference?: string}}, google_pay?: array{display_preference?: array{preference?: string}}, gopay?: array{display_preference?: array{preference?: string}}, grabpay?: array{display_preference?: array{preference?: string}}, id_bank_transfer?: array{display_preference?: array{preference?: string}}, ideal?: array{display_preference?: array{preference?: string}}, jcb?: array{display_preference?: array{preference?: string}}, klarna?: array{display_preference?: array{preference?: string}}, konbini?: array{display_preference?: array{preference?: string}}, link?: array{display_preference?: array{preference?: string}}, mobilepay?: array{display_preference?: array{preference?: string}}, multibanco?: array{display_preference?: array{preference?: string}}, name?: string, oxxo?: array{display_preference?: array{preference?: string}}, p24?: array{display_preference?: array{preference?: string}}, parent?: string, paynow?: array{display_preference?: array{preference?: string}}, paypal?: array{display_preference?: array{preference?: string}}, payto?: array{display_preference?: array{preference?: string}}, promptpay?: array{display_preference?: array{preference?: string}}, qris?: array{display_preference?: array{preference?: string}}, revolut_pay?: array{display_preference?: array{preference?: string}}, sepa_debit?: array{display_preference?: array{preference?: string}}, shopeepay?: array{display_preference?: array{preference?: string}}, sofort?: array{display_preference?: array{preference?: string}}, swish?: array{display_preference?: array{preference?: string}}, twint?: array{display_preference?: array{preference?: string}}, us_bank_account?: array{display_preference?: array{preference?: string}}, wechat_pay?: array{display_preference?: array{preference?: string}}, zip?: array{display_preference?: array{preference?: string}}} $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethodConfiguration the created resource
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * List payment method configurations.
     *
     * @param null|array{application?: null|string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\PaymentMethodConfiguration> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieve payment method configuration.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethodConfiguration
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Update payment method configuration.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{acss_debit?: array{display_preference?: array{preference?: string}}, active?: bool, affirm?: array{display_preference?: array{preference?: string}}, afterpay_clearpay?: array{display_preference?: array{preference?: string}}, alipay?: array{display_preference?: array{preference?: string}}, alma?: array{display_preference?: array{preference?: string}}, amazon_pay?: array{display_preference?: array{preference?: string}}, apple_pay?: array{display_preference?: array{preference?: string}}, apple_pay_later?: array{display_preference?: array{preference?: string}}, au_becs_debit?: array{display_preference?: array{preference?: string}}, bacs_debit?: array{display_preference?: array{preference?: string}}, bancontact?: array{display_preference?: array{preference?: string}}, blik?: array{display_preference?: array{preference?: string}}, boleto?: array{display_preference?: array{preference?: string}}, card?: array{display_preference?: array{preference?: string}}, cartes_bancaires?: array{display_preference?: array{preference?: string}}, cashapp?: array{display_preference?: array{preference?: string}}, customer_balance?: array{display_preference?: array{preference?: string}}, eps?: array{display_preference?: array{preference?: string}}, expand?: string[], fpx?: array{display_preference?: array{preference?: string}}, giropay?: array{display_preference?: array{preference?: string}}, google_pay?: array{display_preference?: array{preference?: string}}, gopay?: array{display_preference?: array{preference?: string}}, grabpay?: array{display_preference?: array{preference?: string}}, id_bank_transfer?: array{display_preference?: array{preference?: string}}, ideal?: array{display_preference?: array{preference?: string}}, jcb?: array{display_preference?: array{preference?: string}}, klarna?: array{display_preference?: array{preference?: string}}, konbini?: array{display_preference?: array{preference?: string}}, link?: array{display_preference?: array{preference?: string}}, mobilepay?: array{display_preference?: array{preference?: string}}, multibanco?: array{display_preference?: array{preference?: string}}, name?: string, oxxo?: array{display_preference?: array{preference?: string}}, p24?: array{display_preference?: array{preference?: string}}, paynow?: array{display_preference?: array{preference?: string}}, paypal?: array{display_preference?: array{preference?: string}}, payto?: array{display_preference?: array{preference?: string}}, promptpay?: array{display_preference?: array{preference?: string}}, qris?: array{display_preference?: array{preference?: string}}, revolut_pay?: array{display_preference?: array{preference?: string}}, sepa_debit?: array{display_preference?: array{preference?: string}}, shopeepay?: array{display_preference?: array{preference?: string}}, sofort?: array{display_preference?: array{preference?: string}}, swish?: array{display_preference?: array{preference?: string}}, twint?: array{display_preference?: array{preference?: string}}, us_bank_account?: array{display_preference?: array{preference?: string}}, wechat_pay?: array{display_preference?: array{preference?: string}}, zip?: array{display_preference?: array{preference?: string}}} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PaymentMethodConfiguration the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
