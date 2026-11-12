<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Invoice Rendering Templates are used to configure how invoices are rendered on surfaces like the PDF. Invoice Rendering Templates
 * can be created from within the Dashboard, and they can be used over the API when creating invoices.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{display: null|string}&StripeObject) $line_item_policy The policy that controls how individual line items are rendered
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property null|StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $nickname A brief description of the template, hidden from customers
 * @property string $status The status of the template, one of <code>active</code> or <code>archived</code>.
 * @property null|((object{display_items: null|string, filter: null|string, group_by: null|string}&StripeObject))[] $summary_item_policies The policies that control how line items are grouped into summary items
 * @property int $version Version of this template; version increases by one when an update on the template changes any field that controls invoice rendering
 */
class InvoiceRenderingTemplate extends ApiResource
{
    const OBJECT_NAME = 'invoice_rendering_template';

    use ApiOperations\Update;

    const STATUS_ACTIVE = 'active';
    const STATUS_ARCHIVED = 'archived';

    /**
     * Creates an invoice rendering template.
     *
     * @param null|array{expand?: string[], line_item_policy?: array{display?: string}, metadata?: array<string, string>, nickname?: string, summary_item_policies?: array{display_items?: string, filter?: string, group_by?: string}[]} $params
     * @param null|array|string $options
     *
     * @return InvoiceRenderingTemplate the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * List all templates, ordered by creation date, with the most recently created
     * template appearing first.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<InvoiceRenderingTemplate> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves an invoice rendering template with the given ID. It by default returns
     * the latest version of the template. Optionally, specify a version to see
     * previous versions.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return InvoiceRenderingTemplate
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates an existing invoice rendering template.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], line_item_policy?: null|array{display?: string}, metadata?: null|array<string, string>, nickname?: string, summary_item_policies?: null|array{display_items?: string, filter?: string, group_by?: string}[]} $params
     * @param null|array|string $opts
     *
     * @return InvoiceRenderingTemplate the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return InvoiceRenderingTemplate the archived invoice rendering template
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function archive($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/archive';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return InvoiceRenderingTemplate the unarchived invoice rendering template
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function unarchive($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/unarchive';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
