<?php

// File generated from our OpenAPI spec

namespace Stripe\GiftCards;

/**
 * A gift card represents a single gift card owned by a customer, including the
 * remaining balance, gift card code, and whether or not it is active.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether this gift card can be used or not.
 * @property int $amount_available The amount of funds available for new transactions.
 * @property int $amount_held The amount of funds marked as held.
 * @property null|string $code Code used to redeem this gift card.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|\Stripe\StripeObject $created_by The related Stripe objects that created this gift card.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|\Stripe\Collection<\Stripe\GiftCards\Transaction> $transactions Transactions on this gift card.
 */
class Card extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'gift_cards.card';

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
     * @return \Stripe\GiftCards\Card the validated card
     */
    public static function validate($params = null, $opts = null)
    {
        $url = static::classUrl() . '/validate';
        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
