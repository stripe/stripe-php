<?php

// File generated from our OpenAPI spec

namespace Stripe\GiftCards;

/**
 * A gift card transaction represents a single transaction on a referenced gift card.
 * A transaction is in one of three states, <code>confirmed</code>, <code>held</code> or <code>canceled</code>. A <code>confirmed</code>
 * transaction is one that has added/deducted funds. A <code>held</code> transaction has created a
 * temporary hold on funds, which can then be cancelled or confirmed. A <code>held</code> transaction
 * can be confirmed into a <code>confirmed</code> transaction, or canceled into a <code>canceled</code> transaction.
 * A <code>canceled</code> transaction has no effect on a gift card's balance.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|int $amount The amount of this transaction. A positive value indicates that funds were added to the gift card. A negative value indicates that funds were removed from the gift card.
 * @property null|int $confirmed_at Time at which the transaction was confirmed. Measured in seconds since the Unix epoch.
 * @property null|int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|\Stripe\StripeObject $created_by The related Stripe objects that created this gift card transaction.
 * @property null|string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|string $gift_card The gift card that this transaction occurred on
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $status Status of this transaction, one of <code>held</code>, <code>confirmed</code>, or <code>canceled</code>.
 * @property null|string $transfer_group A string that identifies this transaction as part of a group. See the <a href="https://stripe.com/docs/connect/separate-charges-and-transfers">Connect documentation</a> for details.
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'gift_cards.transaction';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;

    const STATUS_CANCELED = 'canceled';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_HELD = 'held';
    const STATUS_INVALID = 'invalid';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\GiftCards\Transaction the canceled transaction
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
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
     * @return \Stripe\GiftCards\Transaction the confirmed transaction
     */
    public function confirm($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/confirm';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
