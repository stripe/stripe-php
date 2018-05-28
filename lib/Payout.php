<?php

namespace Stripe;

/**
 * Class Payout
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int $arrival_date
 * @property bool $automatic
 * @property string $balance_transaction
 * @property int $created
 * @property string $currency
 * @property string $destination
 * @property string $failure_balance_transaction
 * @property string $failure_code
 * @property string $failure_message
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property string $method
 * @property string $recipient
 * @property string $source_type
 * @property string $statement_descriptor
 * @property string $status
 * @property string $type
 *
 * @package Stripe
 */
class Payout extends ApiResource
{

    const OBJECT_NAME = "payout";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * @return Payout The canceled payout.
     */
    public function cancel()
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
