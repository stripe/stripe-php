<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * An Issuing <code>Cardholder</code> object represents an individual or business entity who is <a href="https://stripe.com/docs/issuing">issued</a> cards.
 *
 * Related guide: <a href="https://stripe.com/docs/issuing/cards/virtual/issue-cards#create-cardholder">How to create a cardholder</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{address: (object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $billing
 * @property null|(object{tax_id_provided: bool}&\Stripe\StripeObject) $company Additional information about a <code>company</code> cardholder.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $email The cardholder's email address.
 * @property null|(object{card_issuing?: null|(object{user_terms_acceptance: null|(object{date: null|int, ip: null|string, user_agent: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject), dob: null|(object{day: null|int, month: null|int, year: null|int}&\Stripe\StripeObject), first_name: null|string, last_name: null|string, verification: null|(object{document: null|(object{back: null|string|\Stripe\File, front: null|string|\Stripe\File}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $individual Additional information about an <code>individual</code> cardholder.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $name The cardholder's name. This will be printed on cards issued to them.
 * @property null|string $phone_number The cardholder's phone number. This is required for all cardholders who will be creating EU cards. See the <a href="https://stripe.com/docs/issuing/3d-secure#when-is-3d-secure-applied">3D Secure documentation</a> for more details.
 * @property null|string[] $preferred_locales The cardholder’s preferred locales (languages), ordered by preference. Locales can be <code>de</code>, <code>en</code>, <code>es</code>, <code>fr</code>, or <code>it</code>. This changes the language of the <a href="https://stripe.com/docs/issuing/3d-secure">3D Secure flow</a> and one-time password messages sent to the cardholder.
 * @property (object{disabled_reason: null|string, past_due: null|string[]}&\Stripe\StripeObject) $requirements
 * @property null|(object{allowed_categories: null|string[], allowed_merchant_countries: null|string[], blocked_categories: null|string[], blocked_merchant_countries: null|string[], spending_limits: null|((object{amount: int, categories: null|string[], interval: string}&\Stripe\StripeObject))[], spending_limits_currency: null|string}&\Stripe\StripeObject) $spending_controls Rules that control spending across this cardholder's cards. Refer to our <a href="https://stripe.com/docs/issuing/controls/spending-controls">documentation</a> for more details.
 * @property string $status Specifies whether to permit authorizations on this cardholder's cards.
 * @property string $type One of <code>individual</code> or <code>company</code>. See <a href="https://stripe.com/docs/issuing/other/choose-cardholder">Choose a cardholder type</a> for more details.
 */
class Cardholder extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.cardholder';

    use \Stripe\ApiOperations\Update;

    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';
    const STATUS_INACTIVE = 'inactive';

    const TYPE_COMPANY = 'company';
    const TYPE_INDIVIDUAL = 'individual';

    /**
     * Creates a new Issuing <code>Cardholder</code> object that can be issued cards.
     *
     * @param null|array{billing: array{address: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}}, company?: array{tax_id?: string}, email?: string, expand?: string[], individual?: array{card_issuing?: array{user_terms_acceptance?: array{date?: int, ip?: string, user_agent?: null|string}}, dob?: array{day: int, month: int, year: int}, first_name?: string, last_name?: string, verification?: array{document?: array{back?: string, front?: string}}}, metadata?: \Stripe\StripeObject, name: string, phone_number?: string, preferred_locales?: string[], spending_controls?: array{allowed_categories?: string[], allowed_merchant_countries?: string[], blocked_categories?: string[], blocked_merchant_countries?: string[], spending_limits?: array{amount: int, categories?: string[], interval: string}[], spending_limits_currency?: string}, status?: string, type?: string} $params
     * @param null|array|string $options
     *
     * @return Cardholder the created resource
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
     * Returns a list of Issuing <code>Cardholder</code> objects. The objects are
     * sorted in descending order by creation date, with the most recently created
     * object appearing first.
     *
     * @param null|array{created?: array|int, email?: string, ending_before?: string, expand?: string[], limit?: int, phone_number?: string, starting_after?: string, status?: string, type?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Cardholder> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Cardholder</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Cardholder
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
     * Updates the specified Issuing <code>Cardholder</code> object by setting the
     * values of the parameters passed. Any parameters not provided will be left
     * unchanged.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{billing?: array{address: array{city: string, country: string, line1: string, line2?: string, postal_code: string, state?: string}}, company?: array{tax_id?: string}, email?: string, expand?: string[], individual?: array{card_issuing?: array{user_terms_acceptance?: array{date?: int, ip?: string, user_agent?: null|string}}, dob?: array{day: int, month: int, year: int}, first_name?: string, last_name?: string, verification?: array{document?: array{back?: string, front?: string}}}, metadata?: \Stripe\StripeObject, phone_number?: string, preferred_locales?: string[], spending_controls?: array{allowed_categories?: string[], allowed_merchant_countries?: string[], blocked_categories?: string[], blocked_merchant_countries?: string[], spending_limits?: array{amount: int, categories?: string[], interval: string}[], spending_limits_currency?: string}, status?: string} $params
     * @param null|array|string $opts
     *
     * @return Cardholder the updated resource
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
