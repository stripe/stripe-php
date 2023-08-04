<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * An object detailing payment method configurations.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Stripe\StripeObject $acss_debit
 * @property bool $active Whether the configuration can be used for new payments.
 * @property null|\Stripe\StripeObject $affirm
 * @property null|\Stripe\StripeObject $afterpay_clearpay
 * @property null|\Stripe\StripeObject $alipay
 * @property null|\Stripe\StripeObject $apple_pay
 * @property null|string $application The Connect application associated with this configuration.
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
 * @property bool $is_default The default configuration is used whenever no payment method configuration is specified.
 * @property null|\Stripe\StripeObject $jcb
 * @property null|\Stripe\StripeObject $klarna
 * @property null|\Stripe\StripeObject $konbini
 * @property null|\Stripe\StripeObject $link
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $multibanco
 * @property string $name Configuration name.
 * @property null|\Stripe\StripeObject $netbanking
 * @property null|\Stripe\StripeObject $oxxo
 * @property null|\Stripe\StripeObject $p24
 * @property null|string $parent The configuration's parent configuration.
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
