<?php

namespace Stripe;

class Plan extends ApiResource
{
    /**
     * @param string $id The ID of the plan to retrieve.
     * @param string|null $apiKey
     *
     * @return Plan
     */
    public static function retrieve($id, $apiKey = null)
    {
        return self::_retrieve($id, $apiKey);
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return Plan The created plan.
     */
    public static function create($params = null, $apiKey = null)
    {
        return self::_create($params, $apiKey);
    }

    /**
     * @param array|null $params
     *
     * @return Plan The deleted plan.
     */
    public function delete($params = null)
    {
        return self::_delete($params);
    }

    /**
     * @return Plan The saved plan.
     */
    public function save()
    {
        return self::_save();
    }

    /**
     * @param array|null $params
     * @param string|null $apiKey
     *
     * @return array An array of Plans.
     */
    public static function all($params = null, $apiKey = null)
    {
        return self::_all($params, $apiKey);
    }
}
