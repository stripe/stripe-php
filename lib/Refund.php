<?php

namespace Stripe;

class Refund extends ApiResource
{

    /**
     * @param string $id The ID of the refund to retrieve.
     * @param array|string|null $options
     *
     * @return Refund
     */
    public static function retrieve($id, $options = null)
    {
        return self::_retrieve($id, $options);
    }

    /**
     * @param string $id The ID of the refund to update.
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Refund The updated refund.
     */
    public static function update($id, $params = null, $options = null)
    {
        return self::_update($id, $params, $options);
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Collection of Refunds
     */
    public static function all($params = null, $options = null)
    {
        return self::_all($params, $options);
    }

    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Refund The created refund.
     */
    public static function create($params = null, $options = null)
    {
        return self::_create($params, $options);
    }

    /**
     * @param array|string|null $opts
     *
     * @return Refund The saved refund.
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }
}
