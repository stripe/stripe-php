<?php

// File generated from our OpenAPI spec

namespace Stripe\Tax;

/**
 * A Tax <code>Registration</code> lets us know that your business is registered to collect tax on payments within a region, enabling you to <a href="https://stripe.com/docs/tax">automatically collect tax</a>.
 *
 * Stripe doesn't register on your behalf with the relevant authorities when you create a Tax <code>Registration</code> object. For more information on how to register to collect tax, see <a href="https://stripe.com/docs/tax/registering">our guide</a>.
 *
 * Related guide: <a href="https://stripe.com/docs/tax/registrations-api">Using the Registrations API</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $active_from Time at which the registration becomes active. Measured in seconds since the Unix epoch.
 * @property string $country Two-letter country code (<a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO 3166-1 alpha-2</a>).
 * @property (object{ae?: (object{type: string}&\Stripe\StripeObject), al?: (object{type: string}&\Stripe\StripeObject), am?: (object{type: string}&\Stripe\StripeObject), ao?: (object{type: string}&\Stripe\StripeObject), at?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), au?: (object{type: string}&\Stripe\StripeObject), ba?: (object{type: string}&\Stripe\StripeObject), bb?: (object{type: string}&\Stripe\StripeObject), be?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), bg?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), bh?: (object{type: string}&\Stripe\StripeObject), bs?: (object{type: string}&\Stripe\StripeObject), by?: (object{type: string}&\Stripe\StripeObject), ca?: (object{province_standard?: (object{province: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), cd?: (object{type: string}&\Stripe\StripeObject), ch?: (object{type: string}&\Stripe\StripeObject), cl?: (object{type: string}&\Stripe\StripeObject), co?: (object{type: string}&\Stripe\StripeObject), cr?: (object{type: string}&\Stripe\StripeObject), cy?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), cz?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), de?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), dk?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), ec?: (object{type: string}&\Stripe\StripeObject), ee?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), eg?: (object{type: string}&\Stripe\StripeObject), es?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), fi?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), fr?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), gb?: (object{type: string}&\Stripe\StripeObject), ge?: (object{type: string}&\Stripe\StripeObject), gn?: (object{type: string}&\Stripe\StripeObject), gr?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), hr?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), hu?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), id?: (object{type: string}&\Stripe\StripeObject), ie?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), is?: (object{type: string}&\Stripe\StripeObject), it?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), jp?: (object{type: string}&\Stripe\StripeObject), ke?: (object{type: string}&\Stripe\StripeObject), kh?: (object{type: string}&\Stripe\StripeObject), kr?: (object{type: string}&\Stripe\StripeObject), kz?: (object{type: string}&\Stripe\StripeObject), lt?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), lu?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), lv?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), ma?: (object{type: string}&\Stripe\StripeObject), md?: (object{type: string}&\Stripe\StripeObject), me?: (object{type: string}&\Stripe\StripeObject), mk?: (object{type: string}&\Stripe\StripeObject), mr?: (object{type: string}&\Stripe\StripeObject), mt?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), mx?: (object{type: string}&\Stripe\StripeObject), my?: (object{type: string}&\Stripe\StripeObject), ng?: (object{type: string}&\Stripe\StripeObject), nl?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), no?: (object{type: string}&\Stripe\StripeObject), np?: (object{type: string}&\Stripe\StripeObject), nz?: (object{type: string}&\Stripe\StripeObject), om?: (object{type: string}&\Stripe\StripeObject), pe?: (object{type: string}&\Stripe\StripeObject), pl?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), pt?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), ro?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), rs?: (object{type: string}&\Stripe\StripeObject), ru?: (object{type: string}&\Stripe\StripeObject), sa?: (object{type: string}&\Stripe\StripeObject), se?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), sg?: (object{type: string}&\Stripe\StripeObject), si?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), sk?: (object{standard?: (object{place_of_supply_scheme: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), sn?: (object{type: string}&\Stripe\StripeObject), sr?: (object{type: string}&\Stripe\StripeObject), th?: (object{type: string}&\Stripe\StripeObject), tj?: (object{type: string}&\Stripe\StripeObject), tr?: (object{type: string}&\Stripe\StripeObject), tz?: (object{type: string}&\Stripe\StripeObject), ug?: (object{type: string}&\Stripe\StripeObject), us?: (object{local_amusement_tax?: (object{jurisdiction: string}&\Stripe\StripeObject), local_lease_tax?: (object{jurisdiction: string}&\Stripe\StripeObject), state: string, state_sales_tax?: (object{elections?: (object{jurisdiction?: string, type: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), uy?: (object{type: string}&\Stripe\StripeObject), uz?: (object{type: string}&\Stripe\StripeObject), vn?: (object{type: string}&\Stripe\StripeObject), za?: (object{type: string}&\Stripe\StripeObject), zm?: (object{type: string}&\Stripe\StripeObject), zw?: (object{type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $country_options
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|int $expires_at If set, the registration stops being active at this time. If not set, the registration will be active indefinitely. Measured in seconds since the Unix epoch.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The status of the registration. This field is present for convenience and can be deduced from <code>active_from</code> and <code>expires_at</code>.
 */
class Registration extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'tax.registration';

    use \Stripe\ApiOperations\Update;

    const STATUS_ACTIVE = 'active';
    const STATUS_EXPIRED = 'expired';
    const STATUS_SCHEDULED = 'scheduled';

    /**
     * Creates a new Tax <code>Registration</code> object.
     *
     * @param null|array{active_from: array|int|string, country: string, country_options: array{ae?: array{type: string}, al?: array{type: string}, am?: array{type: string}, ao?: array{type: string}, at?: array{standard?: array{place_of_supply_scheme: string}, type: string}, au?: array{type: string}, ba?: array{type: string}, bb?: array{type: string}, be?: array{standard?: array{place_of_supply_scheme: string}, type: string}, bg?: array{standard?: array{place_of_supply_scheme: string}, type: string}, bh?: array{type: string}, bs?: array{type: string}, by?: array{type: string}, ca?: array{province_standard?: array{province: string}, type: string}, cd?: array{type: string}, ch?: array{type: string}, cl?: array{type: string}, co?: array{type: string}, cr?: array{type: string}, cy?: array{standard?: array{place_of_supply_scheme: string}, type: string}, cz?: array{standard?: array{place_of_supply_scheme: string}, type: string}, de?: array{standard?: array{place_of_supply_scheme: string}, type: string}, dk?: array{standard?: array{place_of_supply_scheme: string}, type: string}, ec?: array{type: string}, ee?: array{standard?: array{place_of_supply_scheme: string}, type: string}, eg?: array{type: string}, es?: array{standard?: array{place_of_supply_scheme: string}, type: string}, fi?: array{standard?: array{place_of_supply_scheme: string}, type: string}, fr?: array{standard?: array{place_of_supply_scheme: string}, type: string}, gb?: array{type: string}, ge?: array{type: string}, gn?: array{type: string}, gr?: array{standard?: array{place_of_supply_scheme: string}, type: string}, hr?: array{standard?: array{place_of_supply_scheme: string}, type: string}, hu?: array{standard?: array{place_of_supply_scheme: string}, type: string}, id?: array{type: string}, ie?: array{standard?: array{place_of_supply_scheme: string}, type: string}, is?: array{type: string}, it?: array{standard?: array{place_of_supply_scheme: string}, type: string}, jp?: array{type: string}, ke?: array{type: string}, kh?: array{type: string}, kr?: array{type: string}, kz?: array{type: string}, lt?: array{standard?: array{place_of_supply_scheme: string}, type: string}, lu?: array{standard?: array{place_of_supply_scheme: string}, type: string}, lv?: array{standard?: array{place_of_supply_scheme: string}, type: string}, ma?: array{type: string}, md?: array{type: string}, me?: array{type: string}, mk?: array{type: string}, mr?: array{type: string}, mt?: array{standard?: array{place_of_supply_scheme: string}, type: string}, mx?: array{type: string}, my?: array{type: string}, ng?: array{type: string}, nl?: array{standard?: array{place_of_supply_scheme: string}, type: string}, no?: array{type: string}, np?: array{type: string}, nz?: array{type: string}, om?: array{type: string}, pe?: array{type: string}, pl?: array{standard?: array{place_of_supply_scheme: string}, type: string}, pt?: array{standard?: array{place_of_supply_scheme: string}, type: string}, ro?: array{standard?: array{place_of_supply_scheme: string}, type: string}, rs?: array{type: string}, ru?: array{type: string}, sa?: array{type: string}, se?: array{standard?: array{place_of_supply_scheme: string}, type: string}, sg?: array{type: string}, si?: array{standard?: array{place_of_supply_scheme: string}, type: string}, sk?: array{standard?: array{place_of_supply_scheme: string}, type: string}, sn?: array{type: string}, sr?: array{type: string}, th?: array{type: string}, tj?: array{type: string}, tr?: array{type: string}, tz?: array{type: string}, ug?: array{type: string}, us?: array{local_amusement_tax?: array{jurisdiction: string}, local_lease_tax?: array{jurisdiction: string}, state: string, state_sales_tax?: array{elections: array{jurisdiction?: string, type: string}[]}, type: string}, uy?: array{type: string}, uz?: array{type: string}, vn?: array{type: string}, za?: array{type: string}, zm?: array{type: string}, zw?: array{type: string}}, expand?: string[], expires_at?: int} $params
     * @param null|array|string $options
     *
     * @return Registration the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of Tax <code>Registration</code> objects.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Registration> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Returns a Tax <code>Registration</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Registration
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

    /**
     * Updates an existing Tax <code>Registration</code> object.
     *
     * A registration cannot be deleted after it has been created. If you wish to end a
     * registration you may do so by setting <code>expires_at</code>.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{active_from?: array|int|string, expand?: string[], expires_at?: null|array|int|string} $params
     * @param null|array|string $opts
     *
     * @return Registration the updated resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
