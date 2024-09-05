<?php

// File generated from our OpenAPI spec

namespace Stripe\Terminal;

/**
 * Returns data collected by Terminal readers. This data is only stored for 24 hours.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $magstripe The magstripe data collected by the reader.
 * @property string $type The type of data collected by the reader.
 */
class ReaderCollectedData extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'terminal.reader_collected_data';

    /**
     * Retrieve data collected using Reader hardware.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\ReaderCollectedData
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
