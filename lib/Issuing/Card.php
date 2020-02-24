<?php

namespace Stripe\Issuing;

/**
 * You can <a href="https://stripe.com/docs/issuing/cards">create physical or
 * virtual cards</a> that are issued to cardholders.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $authorization_controls
 * @property string $brand The brand of the card.
 * @property null|\Stripe\Issuing\Cardholder $cardholder The <a href="https://stripe.com/docs/api#issuing_cardholder_object">Cardholder</a> object to which the card belongs.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property int $exp_month The expiration month of the card.
 * @property int $exp_year The expiration year of the card.
 * @property string $last4 The last 4 digits of the card number.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $name The name of the cardholder, printed on the card.
 * @property null|\Stripe\StripeObject $pin Metadata about the PIN on the card.
 * @property null|string|\Stripe\Issuing\Card $replacement_for The card this card replaces, if any.
 * @property null|string $replacement_reason The reason why the previous card needed to be replaced.
 * @property null|\Stripe\StripeObject $shipping Where and how the card will be shipped.
 * @property string $status Whether authorizations can be approved on this card.
 * @property string $type The type of the card.
 */
class Card extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.card';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CardDetails the card details associated with that issuing card
     */
    public function details($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/details';
        list($response, $opts) = $this->_request('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
