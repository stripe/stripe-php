<?php

namespace Stripe;

/**
 * Class BitcoinReceiver
 *
 * @property string $id
 * @property string $object
 * @property bool $active
 * @property int $amount
 * @property int $amount_received
 * @property int $bitcoin_amount
 * @property int $bitcoin_amount_received
 * @property string $bitcoin_uri
 * @property int $created
 * @property string $currency
 * @property string $customer
 * @property string $description
 * @property string $email
 * @property bool $filled
 * @property string $inbound_address
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property string $payment
 * @property string $refund_address
 * @property mixed $transactions
 * @property bool $uncaptured_funds
 * @property bool $used_for_payment
 *
 * @package Stripe
 */
class BitcoinReceiver extends ApiResource
{
    const OBJECT_NAME = 'bitcoin_receiver';

    use ApiOperations\All;
    use ApiOperations\Retrieve;

    /**
     * @return string The class URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public static function classUrl()
    {
        return "/v1/bitcoin/receivers";
    }

    /**
     * @return string The instance URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public function instanceUrl()
    {
        if ($this['customer']) {
            $base = Customer::classUrl();
            $parent = $this['customer'];
            $path = 'sources';
            $parentExtn = urlencode(Util\Util::utf8($parent));
            $extn = urlencode(Util\Util::utf8($this['id']));
            return "$base/$parentExtn/$path/$extn";
        } else {
            $base = BitcoinReceiver::classUrl();
            $extn = urlencode(Util\Util::utf8($this['id']));
            return "$base/$extn";
        }
    }
}
