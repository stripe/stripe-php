<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * You can [create physical or virtual cards](https://stripe.com/docs/issuing/cards) that are issued to cardholders.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $brand The brand of the card.
 * @property null|string $cancellation_reason The reason why the card was canceled.
 * @property \Stripe\Issuing\Cardholder $cardholder <p>An Issuing `Cardholder` object represents an individual or business entity who is [issued](https://stripe.com/docs/issuing) cards.</p><p>Related guide: [How to create a Cardholder](https://stripe.com/docs/issuing/cards#create-cardholder)</p>
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Supported currencies are `usd` in the US, `eur` in the EU, and `gbp` in the UK.
 * @property null|string $cvc The card's CVC. For security reasons, this is only available for virtual cards, and will be omitted unless you explicitly request it with [the `expand` parameter](https://stripe.com/docs/api/expanding_objects). Additionally, it's only available via the [&quot;Retrieve a card&quot; endpoint](https://stripe.com/docs/api/issuing/cards/retrieve), not via &quot;List all cards&quot; or any other endpoint.
 * @property int $exp_month The expiration month of the card.
 * @property int $exp_year The expiration year of the card.
 * @property null|string $financial_account The financial account this card is attached to.
 * @property string $last4 The last 4 digits of the card number.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $number The full unredacted card number. For security reasons, this is only available for virtual cards, and will be omitted unless you explicitly request it with [the `expand` parameter](https://stripe.com/docs/api/expanding_objects). Additionally, it's only available via the [&quot;Retrieve a card&quot; endpoint](https://stripe.com/docs/api/issuing/cards/retrieve), not via &quot;List all cards&quot; or any other endpoint.
 * @property null|string|\Stripe\Issuing\Card $replaced_by The latest card that replaces this card, if any.
 * @property null|string|\Stripe\Issuing\Card $replacement_for The card this card replaces, if any.
 * @property null|string $replacement_reason The reason why the previous card needed to be replaced.
 * @property null|\Stripe\StripeObject $shipping Where and how the card will be shipped.
 * @property \Stripe\StripeObject $spending_controls
 * @property string $status Whether authorizations can be approved on this card. May be blocked from activating cards depending on past-due Cardholder requirements. Defaults to `inactive`.
 * @property string $type The type of the card.
 * @property null|\Stripe\StripeObject $wallets Information relating to digital wallets (like Apple Pay and Google Pay).
 */
class Card extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.card';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}
