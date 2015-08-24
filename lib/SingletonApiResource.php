<?php

namespace Stripe;

abstract class SingletonApiResource extends ApiResource
{
    /**
     * @param null|string|array $options
     *
     * @return static
     *
     * @throws Error\Api
     */
    protected static function _singletonRetrieve($options = null)
    {
        $opts = Util\RequestOptions::parse($options);
        $instance = new static(null, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * {@inheritdoc}
     */
    public static function classUrl()
    {
        $base = static::className();

        return "/v1/${base}";
    }

    /**
     * {@inheritdoc}
     */
    public function instanceUrl()
    {
        return static::classUrl();
    }
}
