<?php

namespace Stripe;

class Recipient extends ApiResource
{
    /**
     * @param string $id The ID of the recipient to retrieve.
     * @param string|null $apiKey
     *
     * @return Recipient
     */
    public static function retrieve($id, $apiKey = null)
    {
        return self::_retrieve($id, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return array An array of Recipients.
     */
    public static function all($params = null, $apiKey = null)
    {
        return self::_all($params, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return Recipient The created recipient.
     */
    public static function create($params = null, $apiKey = null)
    {
        return self::_create($params, $apiKey);
    }

    /**
     * @return Recipient The saved recipient.
     */
    public function save()
    {
        return $this->_save();
    }

    /**
     * @param array|null $params
     *
     * @return Recipient The deleted recipient.
     */
    public function delete($params = null)
    {
        return $this->_delete($params);
    }


    /**
     * @param array|null $params
     *
     * @return array An array of the recipient's Transfers.
     */
    public function transfers($params = array())
    {
        $params['recipient'] = $this->id;
        $transfers = Transfer::all($params, $this->_opts);
        return $transfers;
    }
}
