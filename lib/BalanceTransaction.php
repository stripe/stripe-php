<?php

namespace Stripe;

class BalanceTransaction extends ApiResource
{
    /**
     * @return string The class URL for this resource. It needs to be special
     *    cased because it doesn't fit into the standard resource pattern.
     */
    public static function classUrl()
    {
        return "/v1/balance/history";
    }

    /**
     * @param string $id The ID of the balance transaction to retrieve.
     * @param string|null $apiKey
     *
     * @return BalanceTransaction
     */
    public static function retrieve($id, $apiKey = null)
    {
        $class = get_class();
        return self::_scopedRetrieve($class, $id, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return array An array of BalanceTransactions.
     */
    public static function all($params = null, $apiKey = null)
    {
        $class = get_class();
        return self::_scopedAll($class, $params, $apiKey);
    }
}
