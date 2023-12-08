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
 * @property null|\Stripe\StripeObject $acss_debit
 * @property bool $active Whether the configuration can be used for new payments.
 * @property null|\Stripe\StripeObject $affirm
 * @property null|\Stripe\StripeObject $afterpay_clearpay
 * @property null|\Stripe\StripeObject $alipay
 * @property null|\Stripe\StripeObject $apple_pay
 * @property null|string $application For child configs, the Connect application associated with the configuration.
 * @property null|\Stripe\StripeObject $au_becs_debit
 * @property null|\Stripe\StripeObject $bacs_debit
 * @property null|\Stripe\StripeObject $bancontact
 * @property null|\Stripe\StripeObject $blik
 * @property null|\Stripe\StripeObject $boleto
 * @property null|\Stripe\StripeObject $card
 * @property null|\Stripe\StripeObject $cartes_bancaires
 * @property null|\Stripe\StripeObject $cashapp
 * @property null|\Stripe\StripeObject $eps
 * @property null|\Stripe\StripeObject $fpx
 * @property null|\Stripe\StripeObject $giropay
 * @property null|\Stripe\StripeObject $google_pay
 * @property null|\Stripe\StripeObject $grabpay
 * @property null|\Stripe\StripeObject $id_bank_transfer
 * @property null|\Stripe\StripeObject $ideal
 * @property bool $is_default The default configuration is used whenever a payment method configuration is not specified.
 * @property null|\Stripe\StripeObject $jcb
 * @property null|\Stripe\StripeObject $klarna
 * @property null|\Stripe\StripeObject $konbini
 * @property null|\Stripe\StripeObject $link
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $multibanco
 * @property string $name The configuration's name.
 * @property null|\Stripe\StripeObject $netbanking
 * @property null|\Stripe\StripeObject $oxxo
 * @property null|\Stripe\StripeObject $p24
 * @property null|string $parent For child configs, the configuration's parent configuration.
 * @property null|\Stripe\StripeObject $pay_by_bank
 * @property null|\Stripe\StripeObject $paynow
 * @property null|\Stripe\StripeObject $paypal
 * @property null|\Stripe\StripeObject $promptpay
 * @property null|\Stripe\StripeObject $sepa_debit
 * @property null|\Stripe\StripeObject $sofort
 * @property null|\Stripe\StripeObject $upi
 * @property null|\Stripe\StripeObject $us_bank_account
 * @property null|\Stripe\StripeObject $wechat_pay
 */
class PaymentMethodConfiguration extends ApiResource
{
    const OBJECT_NAME = 'payment_method_configuration';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
