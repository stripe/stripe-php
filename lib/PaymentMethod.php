<?php

namespace Stripe;

/**
 * PaymentMethod objects represent your customer's payment instruments. They can be
 * used with <a
 * href="https://stripe.com/docs/payments/payment-intents">PaymentIntents</a> to
 * collect payments or saved to Customer objects to store instrument details for
 * future payments.
 *
 * Related guides: <a
 * href="https://stripe.com/docs/payments/payment-methods">Payment Methods</a> and
 * <a href="https://stripe.com/docs/payments/more-payment-scenarios">More Payment
 * Scenarios</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $au_becs_debit
 * @property \Stripe\StripeObject $bacs_debit
 * @property \Stripe\StripeObject $bancontact
 * @property \Stripe\StripeObject $billing_details
 * @property \Stripe\StripeObject $card
 * @property \Stripe\StripeObject $card_present
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string|\Stripe\Customer $customer The ID of the Customer to which this PaymentMethod is saved. This will not be set when the PaymentMethod has not been saved to a Customer.
 * @property \Stripe\StripeObject $eps
 * @property \Stripe\StripeObject $fpx
 * @property \Stripe\StripeObject $giropay
 * @property \Stripe\StripeObject $ideal
 * @property \Stripe\StripeObject $interac_present
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\StripeObject $p24
 * @property \Stripe\StripeObject $sepa_debit
 * @property string $type The type of the PaymentMethod. An additional hash is included on the PaymentMethod with a name matching this value. It contains additional information specific to the PaymentMethod type.
 */
class PaymentMethod extends ApiResource
{
    const OBJECT_NAME = 'payment_method';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const ACCOUNT_HOLDER_TYPE_COMPANY = 'company';
    const ACCOUNT_HOLDER_TYPE_INDIVIDUAL = 'individual';

    const BANK_ABN_AMRO = 'abn_amro';
    const BANK_AFFIN_BANK = 'affin_bank';
    const BANK_ALLIANCE_BANK = 'alliance_bank';
    const BANK_AMBANK = 'ambank';
    const BANK_ASN_BANK = 'asn_bank';
    const BANK_BANK_ISLAM = 'bank_islam';
    const BANK_BANK_MUAMALAT = 'bank_muamalat';
    const BANK_BANK_RAKYAT = 'bank_rakyat';
    const BANK_BSN = 'bsn';
    const BANK_BUNQ = 'bunq';
    const BANK_CIMB = 'cimb';
    const BANK_DEUTSCHE_BANK = 'deutsche_bank';
    const BANK_HANDELSBANKEN = 'handelsbanken';
    const BANK_HONG_LEONG_BANK = 'hong_leong_bank';
    const BANK_HSBC = 'hsbc';
    const BANK_ING = 'ing';
    const BANK_KFH = 'kfh';
    const BANK_KNAB = 'knab';
    const BANK_MAYBANK2E = 'maybank2e';
    const BANK_MAYBANK2U = 'maybank2u';
    const BANK_MONEYOU = 'moneyou';
    const BANK_OCBC = 'ocbc';
    const BANK_PB_ENTERPRISE = 'pb_enterprise';
    const BANK_PUBLIC_BANK = 'public_bank';
    const BANK_RABOBANK = 'rabobank';
    const BANK_REGIOBANK = 'regiobank';
    const BANK_RHB = 'rhb';
    const BANK_SNS_BANK = 'sns_bank';
    const BANK_STANDARD_CHARTERED = 'standard_chartered';
    const BANK_TRIODOS_BANK = 'triodos_bank';
    const BANK_UOB = 'uob';
    const BANK_VAN_LANSCHOT = 'van_lanschot';

    const TYPE_AMEX_EXPRESS_CHECKOUT = 'amex_express_checkout';
    const TYPE_APPLE_PAY = 'apple_pay';
    const TYPE_AU_BECS_DEBIT = 'au_becs_debit';
    const TYPE_BACS_DEBIT = 'bacs_debit';
    const TYPE_BANCONTACT = 'bancontact';
    const TYPE_CARD = 'card';
    const TYPE_CARD_PRESENT = 'card_present';
    const TYPE_EPS = 'eps';
    const TYPE_FPX = 'fpx';
    const TYPE_GIROPAY = 'giropay';
    const TYPE_GOOGLE_PAY = 'google_pay';
    const TYPE_IDEAL = 'ideal';
    const TYPE_MASTERPASS = 'masterpass';
    const TYPE_P24 = 'p24';
    const TYPE_SAMSUNG_PAY = 'samsung_pay';
    const TYPE_SEPA_DEBIT = 'sepa_debit';
    const TYPE_VISA_CHECKOUT = 'visa_checkout';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return PaymentMethod the attached payment method
     */
    public function attach($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/attach';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return PaymentMethod the detached payment method
     */
    public function detach($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/detach';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
