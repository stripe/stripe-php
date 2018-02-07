<?php

namespace Stripe;

/**
 * Class InvoiceItem
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string $currency
 * @property string $customer
 * @property int $date
 * @property string $description
 * @property bool $discountable
 * @property string $invoice
 * @property bool $livemode
 * @property AttachedObject $metadata
 * @property mixed $period
 * @property Plan $plan
 * @property bool $proration
 * @property int $quantity
 * @property string $subscription
 * @property string $subscription_item
 *
 * @package Stripe
 */
class InvoiceItem extends ApiResource
{
    /**
     * @param array|string $id The ID of the invoice item to retrieve, or an
     *     options array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return InvoiceItem
     */
    public static function retrieve($id, $opts = null)
    {
        return self::_retrieve($id, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of InvoiceItems
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return InvoiceItem The created invoice item.
     */
    public static function create($params = null, $opts = null)
    {
        return self::_create($params, $opts);
    }

    /**
     * @param string $id The ID of the invoice item to update.
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return InvoiceItem The updated invoice item.
     */
    public static function update($id, $params = null, $options = null)
    {
        return self::_update($id, $params, $options);
    }

    /**
     * @param array|string|null $opts
     *
     * @return InvoiceItem The saved invoice item.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return InvoiceItem The deleted invoice item.
     */
    public function delete($params = null, $opts = null)
    {
        return $this->_delete($params, $opts);
    }
}
