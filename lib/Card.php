<?php

namespace Stripe;

/**
 * Class Card
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string|\Stripe\Account|null $account The account this card belongs to. This attribute will not be in the card object if the card belongs to a customer or recipient instead.
 * @property string|null $address_city City/District/Suburb/Town/Village.
 * @property string|null $address_country Billing address country, if provided when creating card.
 * @property string|null $address_line1 Address line 1 (Street address/PO Box/Company name).
 * @property string|null $address_line1_check If <code>address_line1</code> was provided, results of the check: <code>pass</code>, <code>fail</code>, <code>unavailable</code>, or <code>unchecked</code>.
 * @property string|null $address_line2 Address line 2 (Apartment/Suite/Unit/Building).
 * @property string|null $address_state State/County/Province/Region.
 * @property string|null $address_zip ZIP or postal code.
 * @property string|null $address_zip_check If <code>address_zip</code> was provided, results of the check: <code>pass</code>, <code>fail</code>, <code>unavailable</code>, or <code>unchecked</code>.
 * @property string[]|null $available_payout_methods A set of available payout methods for this card. Will be either <code>[&quot;standard&quot;]</code> or <code>[&quot;standard&quot;, &quot;instant&quot;]</code>. Only values from this set should be passed as the <code>method</code> when creating a transfer.
 * @property string $brand Card brand. Can be <code>American Express</code>, <code>Diners Club</code>, <code>Discover</code>, <code>JCB</code>, <code>MasterCard</code>, <code>UnionPay</code>, <code>Visa</code>, or <code>Unknown</code>.
 * @property string|null $country Two-letter ISO code representing the country of the card. You could use this attribute to get a sense of the international breakdown of cards you've collected.
 * @property string|null $currency
 * @property string|\Stripe\Customer|null $customer The customer that this card belongs to. This attribute will not be in the card object if the card belongs to an account or recipient instead.
 * @property string|null $cvc_check If a CVC was provided, results of the check: <code>pass</code>, <code>fail</code>, <code>unavailable</code>, or <code>unchecked</code>.
 * @property bool|null $default_for_currency Whether this card is the default external account for its currency.
 * @property string|null $dynamic_last4 (For tokenized numbers only.) The last four digits of the device account number.
 * @property int $exp_month Two-digit number representing the card's expiration month.
 * @property int $exp_year Four-digit number representing the card's expiration year.
 * @property string|null $fingerprint Uniquely identifies this particular card number. You can use this attribute to check whether two customers who've signed up with you are using the same card number, for example.
 * @property string $funding Card funding type. Can be <code>credit</code>, <code>debit</code>, <code>prepaid</code>, or <code>unknown</code>.
 * @property string $last4 The last four digits of the card.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string|null $name Cardholder name.
 * @property string|\Stripe\Recipient|null $recipient The recipient that this card belongs to. This attribute will not be in the card object if the card belongs to a customer or account instead.
 * @property string|null $tokenization_method If the card number is tokenized, this is the method that was used. Can be <code>amex_express_checkout</code>, <code>android_pay</code> (includes Google Pay), <code>apple_pay</code>, <code>masterpass</code>, <code>visa_checkout</code>, or null.
 *
 * @package Stripe
 */
class Card extends ApiResource
{
    const OBJECT_NAME = 'card';

    use ApiOperations\Delete;
    use ApiOperations\Update;

    /**
     * Possible string representations of the CVC check status.
     *
     * @see https://stripe.com/docs/api/cards/object#card_object-cvc_check
     */
    const CVC_CHECK_FAIL        = 'fail';
    const CVC_CHECK_PASS        = 'pass';
    const CVC_CHECK_UNAVAILABLE = 'unavailable';
    const CVC_CHECK_UNCHECKED   = 'unchecked';

    /**
     * Possible string representations of the funding of the card.
     *
     * @see https://stripe.com/docs/api/cards/object#card_object-funding
     */
    const FUNDING_CREDIT  = 'credit';
    const FUNDING_DEBIT   = 'debit';
    const FUNDING_PREPAID = 'prepaid';
    const FUNDING_UNKNOWN = 'unknown';

    /**
     * Possible string representations of the tokenization method when using Apple Pay or Google Pay.
     *
     * @see https://stripe.com/docs/api/cards/object#card_object-tokenization_method
     */
    const TOKENIZATION_METHOD_APPLE_PAY  = 'apple_pay';
    const TOKENIZATION_METHOD_GOOGLE_PAY = 'google_pay';

    /**
     * @return string The instance URL for this resource. It needs to be special
     *    cased because cards are nested resources that may belong to different
     *    top-level resources.
     */
    public function instanceUrl()
    {
        if ($this['customer']) {
            $base = Customer::classUrl();
            $parent = $this['customer'];
            $path = 'sources';
        } elseif ($this['account']) {
            $base = Account::classUrl();
            $parent = $this['account'];
            $path = 'external_accounts';
        } elseif ($this['recipient']) {
            $base = Recipient::classUrl();
            $parent = $this['recipient'];
            $path = 'cards';
        } else {
            $msg = "Cards cannot be accessed without a customer ID, account ID or recipient ID.";
            throw new Exception\UnexpectedValueException($msg);
        }
        $parentExtn = \urlencode(Util\Util::utf8($parent));
        $extn = \urlencode(Util\Util::utf8($this['id']));
        return "{$base}/{$parentExtn}/{$path}/{$extn}";
    }

    /**
     * @param array|string $_id
     * @param array|string|null $_opts
     *
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function retrieve($_id, $_opts = null)
    {
        $msg = "Cards cannot be retrieved without a customer ID or an " .
               "account ID. Retrieve a card using " .
               "`Customer::retrieveSource('customer_id', 'card_id')` or " .
               "`Account::retrieveExternalAccount('account_id', 'card_id')`.";
        throw new Exception\BadMethodCallException($msg);
    }

    /**
     * @param string $_id
     * @param array|null $_params
     * @param array|string|null $_options
     *
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function update($_id, $_params = null, $_options = null)
    {
        $msg = "Cards cannot be updated without a customer ID or an " .
               "account ID. Update a card using " .
               "`Customer::updateSource('customer_id', 'card_id', " .
               "\$updateParams)` or `Account::updateExternalAccount(" .
               "'account_id', 'card_id', \$updateParams)`.";
        throw new Exception\BadMethodCallException($msg);
    }
}
