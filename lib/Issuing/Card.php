<?php

namespace Stripe\Issuing;

/**
 * Class Card
 *
 * @property string $id
 * @property string $object
 * @property \Stripe\StripeObject $authorization_controls
 * @property string $brand
 * @property \Stripe\Issuing\Cardholder|null $cardholder
 * @property int $created
 * @property string $currency
 * @property int $exp_month
 * @property int $exp_year
 * @property string $last4
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property string $name
 * @property \Stripe\StripeObject|null $pin
 * @property string|null $replacement_for
 * @property string|null $replacement_reason
 * @property \Stripe\StripeObject|null $shipping
 * @property string $status
 * @property string $type
 *
 * @package Stripe\Issuing
 */
class Card extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.card';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CardDetails The card details associated with that issuing card.
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
