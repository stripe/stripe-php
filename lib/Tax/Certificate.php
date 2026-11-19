<?php

// File generated from our OpenAPI spec

namespace Stripe\Tax;

/**
 * A Tax Certificate associates an uploaded exemption or resale certificate file with a customer's tax exemption. A tax exemption can have multiple certificates. Deleting a tax exemption also deletes its certificates, but retains their uploaded files.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property bool $deleted If <code>true</code>, the certificate has been deleted. If <code>false</code>, it hasn't been deleted.
 * @property string|\Stripe\File $file The ID of the uploaded certificate <a href="/api/files/object">file</a>.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|string|\Stripe\CustomerTaxExemption $tax_exemption The ID of the <a href="/api/tax/exemptions/object">customer tax exemption</a> associated with this certificate.
 */
class Certificate extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'tax.certificate';

    /**
     * Creates a Tax Certificate associated with a tax exemption. Before creating the
     * certificate, <a href="/api/files/create">upload a file</a> with purpose
     * <code>tax_certificate</code>.
     *
     * @param null|array{expand?: string[], file: string, tax_exemption: string} $params
     * @param null|array|string $options
     *
     * @return Certificate the created resource
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
     * Deletes a Tax Certificate without deleting its uploaded file. You can reuse the
     * file to create another certificate, and you can still retrieve the deleted
     * certificate.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Certificate the deleted resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($params = null, $opts = null)
    {
        self::_validateParams($params);

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * Lists a tax exemption’s certificates, ordered from newest to oldest. The list
     * excludes deleted certificates.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, tax_exemption: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Certificate> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a Tax Certificate. Deleted certificates remain retrievable with all
     * their fields and <code>deleted</code> set to <code>true</code>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Certificate
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
