<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * PaymentMethodConfigurations control which payment methods are displayed to your customers when you don't explicitly specify payment method types. You can have multiple configurations with different sets of payment methods for different scenarios.
 *
 * There are two types of PaymentMethodConfigurations. Which is used depends on the <a href="https://docs.stripe.com/connect/charges">charge type</a>:
 *
 * <strong>Direct</strong> configurations apply to payments created on your account, including Connect destination charges, Connect separate charges and transfers, and payments not involving Connect.
 *
 * <strong>Child</strong> configurations apply to payments created on your connected accounts using direct charges, and charges with the on_behalf_of parameter.
 *
 * Child configurations have a <code>parent</code> that sets default values and controls which settings connected accounts may override. You can specify a parent ID at payment time, and Stripe will automatically resolve the connected account’s associated child configuration. Parent configurations are <a href="https://dashboard.stripe.com/settings/payment_methods/connected_accounts">managed in the dashboard</a> and are not available in this API.
 *
 * Related guides:
 * - <a href="https://docs.stripe.com/connect/payment-method-configurations">Payment Method Configurations API</a>
 * - <a href="https://docs.stripe.com/payments/multiple-payment-method-configs">Multiple configurations on dynamic payment methods</a>
 * - <a href="https://docs.stripe.com/connect/multiple-payment-method-configurations">Multiple configurations for your Connect accounts</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $acss_debit
 * @property bool $active Whether the configuration can be used for new payments.
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $affirm
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $afterpay_clearpay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $alipay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $alma
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $amazon_pay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $apple_pay
 * @property null|string $application For child configs, the Connect application associated with the configuration.
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $au_becs_debit
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $bacs_debit
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $bancontact
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $billie
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $blik
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $boleto
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $card
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $cartes_bancaires
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $cashapp
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $crypto
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $customer_balance
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $eps
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $fpx
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $giropay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $google_pay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $grabpay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $ideal
 * @property bool $is_default The default configuration is used whenever a payment method configuration is not specified.
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $jcb
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $kakao_pay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $klarna
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $konbini
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $kr_card
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $link
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $mb_way
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $mobilepay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $multibanco
 * @property string $name The configuration's name.
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $naver_pay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $nz_bank_account
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $oxxo
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $p24
 * @property null|string $parent For child configs, the configuration's parent configuration.
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $pay_by_bank
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $payco
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $paynow
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $paypal
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $payto
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $pix
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $promptpay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $revolut_pay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $samsung_pay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $satispay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $sepa_debit
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $sofort
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $swish
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $twint
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $us_bank_account
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $wechat_pay
 * @property null|(object{available: bool, display_preference: (object{overridable: null|bool, preference: string, value: string}&StripeObject)}&StripeObject) $zip
 */
class PaymentMethodConfiguration extends ApiResource
{
    const OBJECT_NAME = 'payment_method_configuration';

    use ApiOperations\Update;

    /**
     * Creates a payment method configuration.
     *
     * @param null|array{acss_debit?: array{display_preference?: array{preference?: string}}, affirm?: array{display_preference?: array{preference?: string}}, afterpay_clearpay?: array{display_preference?: array{preference?: string}}, alipay?: array{display_preference?: array{preference?: string}}, alma?: array{display_preference?: array{preference?: string}}, amazon_pay?: array{display_preference?: array{preference?: string}}, apple_pay?: array{display_preference?: array{preference?: string}}, apple_pay_later?: array{display_preference?: array{preference?: string}}, au_becs_debit?: array{display_preference?: array{preference?: string}}, bacs_debit?: array{display_preference?: array{preference?: string}}, bancontact?: array{display_preference?: array{preference?: string}}, billie?: array{display_preference?: array{preference?: string}}, blik?: array{display_preference?: array{preference?: string}}, boleto?: array{display_preference?: array{preference?: string}}, card?: array{display_preference?: array{preference?: string}}, cartes_bancaires?: array{display_preference?: array{preference?: string}}, cashapp?: array{display_preference?: array{preference?: string}}, crypto?: array{display_preference?: array{preference?: string}}, customer_balance?: array{display_preference?: array{preference?: string}}, eps?: array{display_preference?: array{preference?: string}}, expand?: string[], fpx?: array{display_preference?: array{preference?: string}}, fr_meal_voucher_conecs?: array{display_preference?: array{preference?: string}}, giropay?: array{display_preference?: array{preference?: string}}, google_pay?: array{display_preference?: array{preference?: string}}, grabpay?: array{display_preference?: array{preference?: string}}, ideal?: array{display_preference?: array{preference?: string}}, jcb?: array{display_preference?: array{preference?: string}}, kakao_pay?: array{display_preference?: array{preference?: string}}, klarna?: array{display_preference?: array{preference?: string}}, konbini?: array{display_preference?: array{preference?: string}}, kr_card?: array{display_preference?: array{preference?: string}}, link?: array{display_preference?: array{preference?: string}}, mb_way?: array{display_preference?: array{preference?: string}}, mobilepay?: array{display_preference?: array{preference?: string}}, multibanco?: array{display_preference?: array{preference?: string}}, name?: string, naver_pay?: array{display_preference?: array{preference?: string}}, nz_bank_account?: array{display_preference?: array{preference?: string}}, oxxo?: array{display_preference?: array{preference?: string}}, p24?: array{display_preference?: array{preference?: string}}, parent?: string, pay_by_bank?: array{display_preference?: array{preference?: string}}, payco?: array{display_preference?: array{preference?: string}}, paynow?: array{display_preference?: array{preference?: string}}, paypal?: array{display_preference?: array{preference?: string}}, payto?: array{display_preference?: array{preference?: string}}, pix?: array{display_preference?: array{preference?: string}}, promptpay?: array{display_preference?: array{preference?: string}}, revolut_pay?: array{display_preference?: array{preference?: string}}, samsung_pay?: array{display_preference?: array{preference?: string}}, satispay?: array{display_preference?: array{preference?: string}}, sepa_debit?: array{display_preference?: array{preference?: string}}, sofort?: array{display_preference?: array{preference?: string}}, swish?: array{display_preference?: array{preference?: string}}, twint?: array{display_preference?: array{preference?: string}}, us_bank_account?: array{display_preference?: array{preference?: string}}, wechat_pay?: array{display_preference?: array{preference?: string}}, zip?: array{display_preference?: array{preference?: string}}} $params
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
     * @param null|array{acss_debit?: array{display_preference?: array{preference?: string}}, active?: bool, affirm?: array{display_preference?: array{preference?: string}}, afterpay_clearpay?: array{display_preference?: array{preference?: string}}, alipay?: array{display_preference?: array{preference?: string}}, alma?: array{display_preference?: array{preference?: string}}, amazon_pay?: array{display_preference?: array{preference?: string}}, apple_pay?: array{display_preference?: array{preference?: string}}, apple_pay_later?: array{display_preference?: array{preference?: string}}, au_becs_debit?: array{display_preference?: array{preference?: string}}, bacs_debit?: array{display_preference?: array{preference?: string}}, bancontact?: array{display_preference?: array{preference?: string}}, billie?: array{display_preference?: array{preference?: string}}, blik?: array{display_preference?: array{preference?: string}}, boleto?: array{display_preference?: array{preference?: string}}, card?: array{display_preference?: array{preference?: string}}, cartes_bancaires?: array{display_preference?: array{preference?: string}}, cashapp?: array{display_preference?: array{preference?: string}}, crypto?: array{display_preference?: array{preference?: string}}, customer_balance?: array{display_preference?: array{preference?: string}}, eps?: array{display_preference?: array{preference?: string}}, expand?: string[], fpx?: array{display_preference?: array{preference?: string}}, fr_meal_voucher_conecs?: array{display_preference?: array{preference?: string}}, giropay?: array{display_preference?: array{preference?: string}}, google_pay?: array{display_preference?: array{preference?: string}}, grabpay?: array{display_preference?: array{preference?: string}}, ideal?: array{display_preference?: array{preference?: string}}, jcb?: array{display_preference?: array{preference?: string}}, kakao_pay?: array{display_preference?: array{preference?: string}}, klarna?: array{display_preference?: array{preference?: string}}, konbini?: array{display_preference?: array{preference?: string}}, kr_card?: array{display_preference?: array{preference?: string}}, link?: array{display_preference?: array{preference?: string}}, mb_way?: array{display_preference?: array{preference?: string}}, mobilepay?: array{display_preference?: array{preference?: string}}, multibanco?: array{display_preference?: array{preference?: string}}, name?: string, naver_pay?: array{display_preference?: array{preference?: string}}, nz_bank_account?: array{display_preference?: array{preference?: string}}, oxxo?: array{display_preference?: array{preference?: string}}, p24?: array{display_preference?: array{preference?: string}}, pay_by_bank?: array{display_preference?: array{preference?: string}}, payco?: array{display_preference?: array{preference?: string}}, paynow?: array{display_preference?: array{preference?: string}}, paypal?: array{display_preference?: array{preference?: string}}, payto?: array{display_preference?: array{preference?: string}}, pix?: array{display_preference?: array{preference?: string}}, promptpay?: array{display_preference?: array{preference?: string}}, revolut_pay?: array{display_preference?: array{preference?: string}}, samsung_pay?: array{display_preference?: array{preference?: string}}, satispay?: array{display_preference?: array{preference?: string}}, sepa_debit?: array{display_preference?: array{preference?: string}}, sofort?: array{display_preference?: array{preference?: string}}, swish?: array{display_preference?: array{preference?: string}}, twint?: array{display_preference?: array{preference?: string}}, us_bank_account?: array{display_preference?: array{preference?: string}}, wechat_pay?: array{display_preference?: array{preference?: string}}, zip?: array{display_preference?: array{preference?: string}}} $params
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
