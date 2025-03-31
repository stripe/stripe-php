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
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $acss_debit
 * @property bool $active Whether the configuration can be used for new payments.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $affirm
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $afterpay_clearpay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $alipay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $alma
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $amazon_pay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $apple_pay
 * @property null|string $application For child configs, the Connect application associated with the configuration.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $au_becs_debit
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $bacs_debit
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $bancontact
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $billie
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $blik
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $boleto
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $card
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $cartes_bancaires
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $cashapp
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $customer_balance
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $eps
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $fpx
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $giropay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $google_pay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $grabpay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $ideal
 * @property bool $is_default The default configuration is used whenever a payment method configuration is not specified.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $jcb
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $klarna
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $konbini
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $link
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $mobilepay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $multibanco
 * @property string $name The configuration's name.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $nz_bank_account
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $oxxo
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $p24
 * @property null|string $parent For child configs, the configuration's parent configuration.
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $pay_by_bank
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $paynow
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $paypal
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $promptpay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $revolut_pay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $satispay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $sepa_debit
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $sofort
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $swish
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $twint
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $us_bank_account
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $wechat_pay
 * @property (object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&\stdClass&StripeObject)}&\stdClass&StripeObject) $zip
 */
class PaymentMethodConfiguration extends ApiResource
{
    const OBJECT_NAME = 'payment_method_configuration';

    use ApiOperations\Update;

    /**
     * Creates a payment method configuration.
     *
     * @param null|array{acss_debit?: array{display_preference?: array{preference?: string}}, affirm?: array{display_preference?: array{preference?: string}}, afterpay_clearpay?: array{display_preference?: array{preference?: string}}, alipay?: array{display_preference?: array{preference?: string}}, alma?: array{display_preference?: array{preference?: string}}, amazon_pay?: array{display_preference?: array{preference?: string}}, apple_pay?: array{display_preference?: array{preference?: string}}, apple_pay_later?: array{display_preference?: array{preference?: string}}, au_becs_debit?: array{display_preference?: array{preference?: string}}, bacs_debit?: array{display_preference?: array{preference?: string}}, bancontact?: array{display_preference?: array{preference?: string}}, billie?: array{display_preference?: array{preference?: string}}, blik?: array{display_preference?: array{preference?: string}}, boleto?: array{display_preference?: array{preference?: string}}, card?: array{display_preference?: array{preference?: string}}, cartes_bancaires?: array{display_preference?: array{preference?: string}}, cashapp?: array{display_preference?: array{preference?: string}}, customer_balance?: array{display_preference?: array{preference?: string}}, eps?: array{display_preference?: array{preference?: string}}, expand?: string[], fpx?: array{display_preference?: array{preference?: string}}, giropay?: array{display_preference?: array{preference?: string}}, google_pay?: array{display_preference?: array{preference?: string}}, grabpay?: array{display_preference?: array{preference?: string}}, ideal?: array{display_preference?: array{preference?: string}}, jcb?: array{display_preference?: array{preference?: string}}, klarna?: array{display_preference?: array{preference?: string}}, konbini?: array{display_preference?: array{preference?: string}}, link?: array{display_preference?: array{preference?: string}}, mobilepay?: array{display_preference?: array{preference?: string}}, multibanco?: array{display_preference?: array{preference?: string}}, name?: string, nz_bank_account?: array{display_preference?: array{preference?: string}}, oxxo?: array{display_preference?: array{preference?: string}}, p24?: array{display_preference?: array{preference?: string}}, parent?: string, pay_by_bank?: array{display_preference?: array{preference?: string}}, paynow?: array{display_preference?: array{preference?: string}}, paypal?: array{display_preference?: array{preference?: string}}, promptpay?: array{display_preference?: array{preference?: string}}, revolut_pay?: array{display_preference?: array{preference?: string}}, satispay?: array{display_preference?: array{preference?: string}}, sepa_debit?: array{display_preference?: array{preference?: string}}, sofort?: array{display_preference?: array{preference?: string}}, swish?: array{display_preference?: array{preference?: string}}, twint?: array{display_preference?: array{preference?: string}}, us_bank_account?: array{display_preference?: array{preference?: string}}, wechat_pay?: array{display_preference?: array{preference?: string}}, zip?: array{display_preference?: array{preference?: string}}} $params
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
     * @param null|array{application?: null|string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
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
     * @param null|array{acss_debit?: array{display_preference?: array{preference?: string}}, active?: bool, affirm?: array{display_preference?: array{preference?: string}}, afterpay_clearpay?: array{display_preference?: array{preference?: string}}, alipay?: array{display_preference?: array{preference?: string}}, alma?: array{display_preference?: array{preference?: string}}, amazon_pay?: array{display_preference?: array{preference?: string}}, apple_pay?: array{display_preference?: array{preference?: string}}, apple_pay_later?: array{display_preference?: array{preference?: string}}, au_becs_debit?: array{display_preference?: array{preference?: string}}, bacs_debit?: array{display_preference?: array{preference?: string}}, bancontact?: array{display_preference?: array{preference?: string}}, billie?: array{display_preference?: array{preference?: string}}, blik?: array{display_preference?: array{preference?: string}}, boleto?: array{display_preference?: array{preference?: string}}, card?: array{display_preference?: array{preference?: string}}, cartes_bancaires?: array{display_preference?: array{preference?: string}}, cashapp?: array{display_preference?: array{preference?: string}}, customer_balance?: array{display_preference?: array{preference?: string}}, eps?: array{display_preference?: array{preference?: string}}, expand?: string[], fpx?: array{display_preference?: array{preference?: string}}, giropay?: array{display_preference?: array{preference?: string}}, google_pay?: array{display_preference?: array{preference?: string}}, grabpay?: array{display_preference?: array{preference?: string}}, ideal?: array{display_preference?: array{preference?: string}}, jcb?: array{display_preference?: array{preference?: string}}, klarna?: array{display_preference?: array{preference?: string}}, konbini?: array{display_preference?: array{preference?: string}}, link?: array{display_preference?: array{preference?: string}}, mobilepay?: array{display_preference?: array{preference?: string}}, multibanco?: array{display_preference?: array{preference?: string}}, name?: string, nz_bank_account?: array{display_preference?: array{preference?: string}}, oxxo?: array{display_preference?: array{preference?: string}}, p24?: array{display_preference?: array{preference?: string}}, pay_by_bank?: array{display_preference?: array{preference?: string}}, paynow?: array{display_preference?: array{preference?: string}}, paypal?: array{display_preference?: array{preference?: string}}, promptpay?: array{display_preference?: array{preference?: string}}, revolut_pay?: array{display_preference?: array{preference?: string}}, satispay?: array{display_preference?: array{preference?: string}}, sepa_debit?: array{display_preference?: array{preference?: string}}, sofort?: array{display_preference?: array{preference?: string}}, swish?: array{display_preference?: array{preference?: string}}, twint?: array{display_preference?: array{preference?: string}}, us_bank_account?: array{display_preference?: array{preference?: string}}, wechat_pay?: array{display_preference?: array{preference?: string}}, zip?: array{display_preference?: array{preference?: string}}} $params
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
