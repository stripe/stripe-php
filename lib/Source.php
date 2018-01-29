<?php

namespace Stripe;

/**
 * Class Source
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string $client_secret
 * @property mixed $code_verification
 * @property int $created
 * @property string $currency
 * @property string $flow
 * @property bool $livemode
 * @property AttachedObject $metadata
 * @property mixed $owner
 * @property mixed $receiver
 * @property mixed $redirect
 * @property string $statement_descriptor
 * @property string $status
 * @property string $type
 * @property string $usage
 *
 * @package Stripe
 */
class Source extends ApiResource
{
    /**
     * @param array|string $id The ID of the source to retrieve, or an options
     *     array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return Source
     */
    public static function retrieve($id, $opts = null)
    {
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Source The created Source.
     */
    public static function create($params = null, $opts = null)
    {
        return self::_create($params, $opts);
    }

    /**
     * @param string $id The ID of the source to update.
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Source The updated source.
     */
    public static function update($id, $params = null, $options = null)
    {
        return self::_update($id, $params, $options);
    }

    /**
     * @param array|string|null $opts
     *
     * @return Source The saved source.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Source The detached source.
     */
    public function detach($params = null, $options = null)
    {
        self::_validateParams($params);

        $id = $this['id'];
        if (!$id) {
            $class = get_class($this);
            $msg = "Could not determine which URL to request: $class instance "
             . "has invalid ID: $id";
            throw new Error\InvalidRequest($msg, null);
        }

        if ($this['customer']) {
            $base = Customer::classUrl();
            $parentExtn = urlencode(Util\Util::utf8($this['customer']));
            $extn = urlencode(Util\Util::utf8($id));
            $url = "$base/$parentExtn/sources/$extn";

            list($response, $opts) = $this->_request('delete', $url, $params, $options);
            $this->refreshFrom($response, $opts);
            return $this;
        } else {
            $message = "This source object does not appear to be currently attached "
               . "to a customer object.";
            throw new Error\Api($message);
        }
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Source The detached source.
     *
     * @deprecated Use the `detach` method instead.
     */
    public function delete($params = null, $options = null)
    {
        $this->detach($params, $options);
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Collection The list of source transactions.
     */
    public function sourceTransactions($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/source_transactions';
        list($response, $opts) = $this->_request('get', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response, $opts);
        $obj->setLastResponse($response);
        return $obj;
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Source The verified source.
     */
    public function verify($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/verify';
        list($response, $opts) = $this->_request('post', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
