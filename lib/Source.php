<?php

namespace Stripe;

/**
 * Class Source
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $ach_credit_transfer
 * @property \Stripe\StripeObject $ach_debit
 * @property \Stripe\StripeObject $acss_debit
 * @property \Stripe\StripeObject $alipay
 * @property int|null $amount A positive integer in the smallest currency unit (that is, 100 cents for $1.00, or 1 for ¥1, Japanese Yen being a zero-decimal currency) representing the total amount associated with the source. This is the amount for which the source will be chargeable once ready. Required for <code>single_use</code> sources.
 * @property \Stripe\StripeObject $au_becs_debit
 * @property \Stripe\StripeObject $bancontact
 * @property \Stripe\StripeObject $card
 * @property \Stripe\StripeObject $card_present
 * @property string $client_secret The client secret of the source. Used for client-side retrieval using a publishable key.
 * @property \Stripe\StripeObject $code_verification
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|null $currency Three-letter <a href="https://stripe.com/docs/currencies">ISO code for the currency</a> associated with the source. This is the currency for which the source will be chargeable once ready. Required for <code>single_use</code> sources.
 * @property string $customer The ID of the customer to which this source is attached. This will not be present when the source has not been attached to a customer.
 * @property \Stripe\StripeObject $eps
 * @property string $flow The authentication <code>flow</code> of the source. <code>flow</code> is one of <code>redirect</code>, <code>receiver</code>, <code>code_verification</code>, <code>none</code>.
 * @property \Stripe\StripeObject $giropay
 * @property \Stripe\StripeObject $ideal
 * @property \Stripe\StripeObject $klarna
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject|null $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\StripeObject $multibanco
 * @property \Stripe\StripeObject|null $owner Information about the owner of the payment instrument that may be used or required by particular source types.
 * @property \Stripe\StripeObject $p24
 * @property \Stripe\StripeObject $receiver
 * @property \Stripe\StripeObject $redirect
 * @property \Stripe\StripeObject $sepa_credit_transfer
 * @property \Stripe\StripeObject $sepa_debit
 * @property \Stripe\StripeObject $sofort
 * @property \Stripe\StripeObject $source_order
 * @property string|null $statement_descriptor Extra information about a source. This will appear on your customer's statement every time you charge the source.
 * @property string $status The status of the source, one of <code>canceled</code>, <code>chargeable</code>, <code>consumed</code>, <code>failed</code>, or <code>pending</code>. Only <code>chargeable</code> sources can be used to create a charge.
 * @property \Stripe\StripeObject $three_d_secure
 * @property string $type The <code>type</code> of the source. The <code>type</code> is a payment method, one of <code>ach_credit_transfer</code>, <code>ach_debit</code>, <code>alipay</code>, <code>bancontact</code>, <code>card</code>, <code>card_present</code>, <code>eps</code>, <code>giropay</code>, <code>ideal</code>, <code>multibanco</code>, <code>klarna</code>, <code>p24</code>, <code>sepa_debit</code>, <code>sofort</code>, <code>three_d_secure</code>, or <code>wechat</code>. An additional hash is included on the source with a name matching this value. It contains additional information specific to the <a href="https://stripe.com/docs/sources">payment method</a> used.
 * @property string|null $usage Either <code>reusable</code> or <code>single_use</code>. Whether this source should be reusable or not. Some source types may or may not be reusable by construction, while others may leave the option at creation. If an incompatible value is passed, an error will be returned.
 * @property \Stripe\StripeObject $wechat
 *
 * @package Stripe
 */
class Source extends ApiResource
{
    const OBJECT_NAME = 'source';

    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    use ApiOperations\NestedResource;

    /**
     * Possible string representations of source flows.
     *
     * @see https://stripe.com/docs/api#source_object-flow
     */
    const FLOW_REDIRECT          = 'redirect';
    const FLOW_RECEIVER          = 'receiver';
    const FLOW_CODE_VERIFICATION = 'code_verification';
    const FLOW_NONE              = 'none';

    /**
     * Possible string representations of source statuses.
     *
     * @see https://stripe.com/docs/api#source_object-status
     */
    const STATUS_CANCELED   = 'canceled';
    const STATUS_CHARGEABLE = 'chargeable';
    const STATUS_CONSUMED   = 'consumed';
    const STATUS_FAILED     = 'failed';
    const STATUS_PENDING    = 'pending';

    /**
     * Possible string representations of source usage.
     *
     * @see https://stripe.com/docs/api#source_object-usage
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
            $class = \get_class($this);
            $msg = "Could not determine which URL to request: {$class} instance "
             . "has invalid ID: {$id}";
            throw new Exception\UnexpectedValueException($msg, null);
        }

        if ($this['customer']) {
            $base = Customer::classUrl();
            $parentExtn = \urlencode(Util\Util::utf8($this['customer']));
            $extn = \urlencode(Util\Util::utf8($id));
            $url = "{$base}/{$parentExtn}/sources/{$extn}";

            list($response, $opts) = $this->_request('delete', $url, $params, $opts);
            $this->refreshFrom($response, $opts);
            return $this;
        }
        $message = "This source object does not appear to be currently attached "
               . "to a customer object.";
        throw new Exception\UnexpectedValueException($message);
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
