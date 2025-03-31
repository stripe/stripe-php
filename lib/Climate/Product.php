<?php

// File generated from our OpenAPI spec

namespace Stripe\Climate;

/**
 * A Climate product represents a type of carbon removal unit available for reservation.
 * You can retrieve it to see the current price and availability.
 *
 * @property string $id Unique identifier for the object. For convenience, Climate product IDs are human-readable strings that start with <code>climsku_</code>. See <a href="https://stripe.com/docs/climate/orders/carbon-removal-inventory">carbon removal inventory</a> for a list of available carbon removal products.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property \Stripe\StripeObject $current_prices_per_metric_ton Current prices for a metric ton of carbon removal in a currency's smallest unit.
 * @property null|int $delivery_year The year in which the carbon removal is expected to be delivered.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $metric_tons_available The quantity of metric tons available for reservation.
 * @property string $name The Climate product's name.
 * @property Supplier[] $suppliers The carbon removal suppliers that fulfill orders for this Climate product.
 */
class Product extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'climate.product';

    /**
     * Lists all available Climate product objects.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Product> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a Climate product with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Product
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
