<?php

namespace Stripe;

/**
 * Class Source
 *
 * @property string $id
 * @property string $object
 * @property \Stripe\StripeObject $ach_credit_transfer
 * @property \Stripe\StripeObject $ach_debit
 * @property \Stripe\StripeObject $acss_debit
 * @property \Stripe\StripeObject $alipay
 * @property int|null $amount
 * @property \Stripe\StripeObject $au_becs_debit
 * @property \Stripe\StripeObject $bancontact
 * @property \Stripe\StripeObject $card
 * @property \Stripe\StripeObject $card_present
 * @property string $client_secret
 * @property \Stripe\StripeObject $code_verification
 * @property int $created
 * @property string|null $currency
 * @property string $customer
 * @property \Stripe\StripeObject $eps
 * @property string $flow
 * @property \Stripe\StripeObject $giropay
 * @property \Stripe\StripeObject $ideal
 * @property \Stripe\StripeObject $klarna
 * @property bool $livemode
 * @property \Stripe\StripeObject|null $metadata
 * @property \Stripe\StripeObject $multibanco
 * @property \Stripe\StripeObject|null $owner
 * @property \Stripe\StripeObject $p24
 * @property \Stripe\StripeObject $receiver
 * @property \Stripe\StripeObject $redirect
 * @property \Stripe\StripeObject $sepa_credit_transfer
 * @property \Stripe\StripeObject $sepa_debit
 * @property \Stripe\StripeObject $sofort
 * @property \Stripe\StripeObject $source_order
 * @property string|null $statement_descriptor
 * @property string $status
 * @property \Stripe\StripeObject $three_d_secure
 * @property string $type
 * @property string|null $usage
 * @property \Stripe\StripeObject $wechat
 *
 * @package Stripe
 */
class Source extends ApiResource
{
    const OBJECT_NAME = 'source';

    use ApiOperations\Create;
    use ApiOperations\NestedResource;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * Possible string representations of source flows.
     * @link https://stripe.com/docs/api#source_object-flow
     */
    const FLOW_REDIRECT          = 'redirect';
    const FLOW_RECEIVER          = 'receiver';
    const FLOW_CODE_VERIFICATION = 'code_verification';
    const FLOW_NONE              = 'none';

    /**
     * Possible string representations of source statuses.
     * @link https://stripe.com/docs/api#source_object-status
     */
    const STATUS_CANCELED   = 'canceled';
    const STATUS_CHARGEABLE = 'chargeable';
    const STATUS_CONSUMED   = 'consumed';
    const STATUS_FAILED     = 'failed';
    const STATUS_PENDING    = 'pending';

    /**
     * Possible string representations of source usage.
     * @link https://stripe.com/docs/api#source_object-usage
     */
    const USAGE_REUSABLE   = 'reusable';
    const USAGE_SINGLE_USE = 'single_use';

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\UnexpectedValueException if the source is not attached to a customer
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Source The detached source.
     */
    public function detach($params = null, $opts = null)
    {
        self::_validateParams($params);

        $id = $this['id'];
        if (!$id) {
            $class = get_class($this);
            $msg = "Could not determine which URL to request: $class instance "
             . "has invalid ID: $id";
            throw new Exception\UnexpectedValueException($msg, null);
        }

        if ($this['customer']) {
            $base = Customer::classUrl();
            $parentExtn = urlencode(Util\Util::utf8($this['customer']));
            $extn = urlencode(Util\Util::utf8($id));
            $url = "$base/$parentExtn/sources/$extn";

            list($response, $opts) = $this->_request('delete', $url, $params, $opts);
            $this->refreshFrom($response, $opts);
            return $this;
        } else {
            $message = "This source object does not appear to be currently attached "
               . "to a customer object.";
            throw new Exception\UnexpectedValueException($message);
        }
    }

    /**
     * @deprecated sourceTransactions is deprecated. Please use Source::allSourceTransactions instead.
     *
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection The list of source transactions.
     */
    public function sourceTransactions($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/source_transactions';
        list($response, $opts) = $this->_request('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response, $opts);
        $obj->setLastResponse($response);
        return $obj;
    }

    /**
     * @param string $id
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection The list of source transactions.
     */
    public static function allSourceTransactions($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, '/source_transactions', $params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return Source The verified source.
     */
    public function verify($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/verify';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
