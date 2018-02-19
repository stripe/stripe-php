<?php

namespace Stripe;

/**
 * Class Dispute
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property mixed $balance_transactions
 * @property string $charge
 * @property int $created
 * @property string $currency
 * @property mixed $evidence
 * @property mixed $evidence_details
 * @property bool $is_charge_refundable
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property string $reason
 * @property string $status
 *
 * @package Stripe
 */
class Dispute extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const OBJECT_NAME = "dispute";

    /**
     * @param array|string|null $options
     *
     * @return Dispute The closed dispute.
     * @throws Error\Api
     * @throws Error\ApiConnection
     * @throws Error\Authentication
     * @throws Error\Card
     * @throws Error\Idempotency
     * @throws Error\InvalidRequest
     * @throws Error\Permission
     * @throws Error\RateLimit
     */
    public function close($options = null)
    {
        $url = $this->instanceUrl() . '/close';
        list($response, $opts) = $this->_request('post', $url, null, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
