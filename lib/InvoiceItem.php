<?php

namespace Stripe;

class InvoiceItem extends ApiResource
{
    /**
     * @param string $id The ID of the invoice item to retrieve.
     * @param string|null $apiKey
     *
     * @return InvoiceItem
     */
    public static function retrieve($id, $apiKey = null)
    {
        return self::_retrieve($id, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return array An array of InvoiceItems.
     */
    public static function all($params = null, $apiKey = null)
    {
        return self::_all($params, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return InvoiceItem The created invoice item.
     */
    public static function create($params = null, $apiKey = null)
    {
        return self::_create($params, $apiKey);
    }

    /**
     * @return InvoiceItem The saved invoice item.
     */
    public function save()
    {
        return self::_save();
    }

    /**
     * @return InvoiceItem The deleted invoice item.
     */
    public function delete($params = null)
    {
        return self::_delete($params);
    }
}
