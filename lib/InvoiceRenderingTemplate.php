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
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $nickname A brief description of the template, hidden from customers
 * @property string $status The status of the template, one of <code>active</code> or <code>archived</code>.
 * @property int $version Version of this template; version increases by one when an update on the template changes any field that controls invoice rendering
 */
class InvoiceRenderingTemplate extends ApiResource
{
    const OBJECT_NAME = 'invoice_rendering_template';

    const STATUS_ACTIVE = 'active';
    const STATUS_ARCHIVED = 'archived';

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
