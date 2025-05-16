<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * To top up your Stripe balance, you create a top-up object. You can retrieve
 * individual top-ups, as well as list all top-ups. Top-ups are identified by a
 * unique, random ID.
 *
 * Related guide: <a href="https://stripe.com/docs/connect/top-ups">Topping up your platform account</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount transferred.
 * @property null|BalanceTransaction|string $balance_transaction ID of the balance transaction that describes the impact of this top-up on your account balance. May not be specified depending on status of top-up.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property null|int $expected_availability_date Date the funds are expected to arrive in your Stripe account for payouts. This factors in delays like weekends or bank holidays. May not be specified depending on status of top-up.
 * @property null|string $failure_code Error code explaining reason for top-up failure if available (see <a href="https://stripe.com/docs/api#errors">the errors section</a> for a list of codes).
 * @property null|string $failure_message Message to user further explaining reason for top-up failure if available.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|Source $source The source field is deprecated. It might not always be present in the API response.
 * @property null|string $statement_descriptor Extra information about a top-up. This will appear on your source's bank statement. It must contain at least one letter.
 * @property string $status The status of the top-up is either <code>canceled</code>, <code>failed</code>, <code>pending</code>, <code>reversed</code>, or <code>succeeded</code>.
 * @property null|string $transfer_group A string that identifies this top-up as part of a group.
 */
class Topup extends ApiResource
{
    const OBJECT_NAME = 'topup';

    use ApiOperations\Update;

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
    const STATUS_REVERSED = 'reversed';
    const STATUS_SUCCEEDED = 'succeeded';

    /**
     * Top up the balance of an account.
     *
     * @param null|array{amount: int, currency: string, description?: string, expand?: string[], metadata?: null|array<string, string>, source?: string, statement_descriptor?: string, transfer_group?: string} $params
     * @param null|array|string $options
     *
     * @return Topup the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of top-ups.
     *
     * @param null|array{amount?: array|int, created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<Topup> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a top-up that has previously been created. Supply the
     * unique top-up ID that was returned from your previous request, and Stripe will
     * return the corresponding top-up information.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Topup
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates the metadata of a top-up. Other top-up details are not editable by
     * design.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{description?: string, expand?: string[], metadata?: null|array<string, string>} $params
     * @param null|array|string $opts
     *
     * @return Topup the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Topup the canceled topup
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
