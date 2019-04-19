<?php

namespace Stripe;

/**
 * Class Customer
 *
 * @property string $id
 * @property string $object
 * @property int $account_balance
 * @property string $created
 * @property string $currency
 * @property string $default_source
 * @property bool $delinquent
 * @property string $description
 * @property Discount $discount
 * @property string $email
 * @property string $invoice_prefix
 * @property mixed $invoice_settings
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property mixed $shipping
 * @property Collection $sources
 * @property Collection $subscriptions
 * @property mixed $tax_info
 * @property mixed $tax_info_verification
 *
 * @package Stripe
 */
class Customer extends ApiResource
{

    const OBJECT_NAME = "customer";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\NestedResource;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    public static function getSavedNestedResources()
    {
        static $savedNestedResources = null;
        if ($savedNestedResources === null) {
            $savedNestedResources = new Util\Set([
                'source',
            ]);
        }
        return $savedNestedResources;
    }

    const PATH_SOURCES = '/sources';

    /**
     * @param array|null $params
     *
     * @return InvoiceItem The resulting invoice item.
     *
     * @deprecated This method is deprecated and planned for removal. Prefer using
     *             \Stripe\InvoiceItem::create() instead.
     * @see \Stripe\InvoiceItem::create()
     */
    // TODO: remove in next major version
    public function addInvoiceItem($params = null)
    {
        trigger_error(
            "This method is deprecated and planned for removal. Prefer using \Stripe\InvoiceItem::create() instead",
            E_USER_DEPRECATED
        );

        $params = $params ?: [];
        $params['customer'] = $this->id;
        $ii = InvoiceItem::create($params, $this->_opts);
        return $ii;
    }

    /**
     * @param array|null $params
     *
     * @return array An array of the customer's Invoices.
     *
     * @deprecated This method is deprecated and planned for removal. Prefer using
     *             \Stripe\Invoice::all() instead.
     * @see \Stripe\Invoice::all()
     */
    // TODO: remove in next major version
    public function invoices($params = null)
    {
        trigger_error(
            "This method is deprecated and planned for removal. Prefer using \Stripe\Invoice::all() instead",
            E_USER_DEPRECATED
        );

        $params = $params ?: [];
        $params['customer'] = $this->id;
        $invoices = Invoice::all($params, $this->_opts);
        return $invoices;
    }

    /**
     * @param array|null $params
     *
     * @return array An array of the customer's InvoiceItems.
     *
     * @deprecated This method is deprecated and planned for removal. Prefer using
     *             \Stripe\InvoiceItem::all() instead.
     * @see \Stripe\InvoiceItem::all()
     */
    // TODO: remove in next major version
    public function invoiceItems($params = null)
    {
        trigger_error(
            "This method is deprecated and planned for removal. Prefer using \Stripe\InvoiceItem::all() instead",
            E_USER_DEPRECATED
        );

        $params = $params ?: [];
        $params['customer'] = $this->id;
        $iis = InvoiceItem::all($params, $this->_opts);
        return $iis;
    }

    /**
     * @param array|null $params
     *
     * @return array An array of the customer's Charges.
     *
     * @deprecated This method is deprecated and planned for removal. Prefer using
     *             \Stripe\Charge::all() instead.
     * @see \Stripe\Charge::all()
     */
    // TODO: remove in next major version
    public function charges($params = null)
    {
        trigger_error(
            "This method is deprecated and planned for removal. Prefer using \Stripe\Charge::all() instead",
            E_USER_DEPRECATED
        );

        $params = $params ?: [];
        $params['customer'] = $this->id;
        $charges = Charge::all($params, $this->_opts);
        return $charges;
    }

    /**
     * @param array|null $params
     *
     * @return Subscription The updated subscription.
     *
     * @deprecated This method is deprecated and planned for removal. Prefer using
     *             \Stripe\Subscription::update() instead.
     * @see \Stripe\Subscription::update()
     */
    // TODO: remove in next major version
    public function updateSubscription($params = null)
    {
        trigger_error(
            "This method is deprecated and planned for removal. Prefer using \Stripe\Subscription::update() instead",
            E_USER_DEPRECATED
        );

        $url = $this->instanceUrl() . '/subscription';
        list($response, $opts) = $this->_request('post', $url, $params);
        $this->refreshFrom(['subscription' => $response], $opts, true);
        return $this->subscription;
    }

    /**
     * @param array|null $params
     *
     * @return Subscription The cancelled subscription.
     *
     * @deprecated This method is deprecated and planned for removal. Prefer using
     *             \Stripe\Subscription::cancel() instead.
     * @see \Stripe\Subscription::cancel()
     */
    // TODO: remove in next major version
    public function cancelSubscription($params = null)
    {
        trigger_error(
            "This method is deprecated and planned for removal. Prefer using \Stripe\Subscription::cancel() instead",
            E_USER_DEPRECATED
        );

        $url = $this->instanceUrl() . '/subscription';
        list($response, $opts) = $this->_request('delete', $url, $params);
        $this->refreshFrom(['subscription' => $response], $opts, true);
        return $this->subscription;
    }

    /**
     * @return Customer The updated customer.
     */
    public function deleteDiscount()
    {
        $url = $this->instanceUrl() . '/discount';
        list($response, $opts) = $this->_request('delete', $url);
        $this->refreshFrom(['discount' => null], $opts, true);
    }

    /**
     * @param string|null $id The ID of the customer on which to create the source.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function createSource($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_SOURCES, $params, $opts);
    }

    /**
     * @param string|null $id The ID of the customer to which the source belongs.
     * @param string|null $sourceId The ID of the source to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function retrieveSource($id, $sourceId, $params = null, $opts = null)
    {
        return self::_retrieveNestedResource($id, static::PATH_SOURCES, $sourceId, $params, $opts);
    }

    /**
     * @param string|null $id The ID of the customer to which the source belongs.
     * @param string|null $sourceId The ID of the source to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function updateSource($id, $sourceId, $params = null, $opts = null)
    {
        return self::_updateNestedResource($id, static::PATH_SOURCES, $sourceId, $params, $opts);
    }

    /**
     * @param string|null $id The ID of the customer to which the source belongs.
     * @param string|null $sourceId The ID of the source to delete.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function deleteSource($id, $sourceId, $params = null, $opts = null)
    {
        return self::_deleteNestedResource($id, static::PATH_SOURCES, $sourceId, $params, $opts);
    }

    /**
     * @param string|null $id The ID of the customer on which to retrieve the sources.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection The list of sources.
     */
    public static function allSources($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_SOURCES, $params, $opts);
    }
}
