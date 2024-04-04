<?php

// File generated from our OpenAPI spec

namespace Stripe\Terminal;

/**
 * A Reader represents a physical device for accepting payment details.
 *
 * Related guide: <a href="https://stripe.com/docs/terminal/payments/connect-reader">Connecting to a reader</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Stripe\StripeObject $action The most recent action performed by the reader.
 * @property null|string $device_sw_version The current software version of the reader.
 * @property string $device_type Type of reader, one of <code>bbpos_wisepad3</code>, <code>stripe_m2</code>, <code>bbpos_chipper2x</code>, <code>bbpos_wisepos_e</code>, <code>verifone_P400</code>, <code>simulated_wisepos_e</code>, or <code>mobile_phone_reader</code>.
 * @property null|string $ip_address The local IP address of the reader.
 * @property string $label Custom label given to the reader for easier identification.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string|\Stripe\Terminal\Location $location The location identifier of the reader.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $serial_number Serial number of the reader.
 * @property null|string $status The networking status of the reader.
 */
class Reader extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'terminal.reader';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;

    const DEVICE_TYPE_BBPOS_CHIPPER2X = 'bbpos_chipper2x';
    const DEVICE_TYPE_BBPOS_WISEPAD3 = 'bbpos_wisepad3';
    const DEVICE_TYPE_BBPOS_WISEPOS_E = 'bbpos_wisepos_e';
    const DEVICE_TYPE_MOBILE_PHONE_READER = 'mobile_phone_reader';
    const DEVICE_TYPE_SIMULATED_WISEPOS_E = 'simulated_wisepos_e';
    const DEVICE_TYPE_STRIPE_M2 = 'stripe_m2';
    const DEVICE_TYPE_VERIFONE_P400 = 'verifone_P400';

    const STATUS_OFFLINE = 'offline';
    const STATUS_ONLINE = 'online';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader the canceled reader
     */
    public function cancelAction($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel_action';
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
     * @return \Stripe\Terminal\Reader the processed reader
     */
    public function processPaymentIntent($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/process_payment_intent';
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
     * @return \Stripe\Terminal\Reader the processed reader
     */
    public function processSetupIntent($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/process_setup_intent';
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
     * @return \Stripe\Terminal\Reader the refunded reader
     */
    public function refundPayment($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/refund_payment';
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
     * @return \Stripe\Terminal\Reader the seted reader
     */
    public function setReaderDisplay($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/set_reader_display';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
