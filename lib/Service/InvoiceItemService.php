<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class InvoiceItemService extends AbstractService
{
    /**
     * Returns a list of your invoice items. Invoice items are returned sorted by
     * creation date, with the most recently created invoice items appearing first.
     *
     * @param null|array{created?: array|int, customer?: string, ending_before?: string, expand?: string[], invoice?: string, limit?: int, pending?: bool, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\InvoiceItem>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/invoiceitems', $params, $opts);
    }

    /**
     * Creates an item to be added to a draft invoice (up to 250 items per invoice). If
     * no invoice is specified, the item will be on the next invoice created for the
     * customer specified.
     *
     * @param null|array{amount?: int, currency?: string, customer: string, description?: string, discountable?: bool, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], invoice?: string, metadata?: null|array<string, string>, period?: array{end: int, start: int}, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, pricing?: array{price?: string}, quantity?: int, subscription?: string, tax_behavior?: string, tax_code?: null|string, tax_rates?: string[], unit_amount_decimal?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\InvoiceItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/invoiceitems', $params, $opts);
    }

    /**
     * Deletes an invoice item, removing it from an invoice. Deleting invoice items is
     * only possible when they’re not attached to invoices, or if it’s attached to a
     * draft invoice.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\InvoiceItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/invoiceitems/%s', $id), $params, $opts);
    }

    /**
     * Retrieves the invoice item with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\InvoiceItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/invoiceitems/%s', $id), $params, $opts);
    }

    /**
     * Updates the amount or description of an invoice item on an upcoming invoice.
     * Updating an invoice item is only possible before the invoice it’s attached to is
     * closed.
     *
     * @param string $id
     * @param null|array{amount?: int, description?: string, discountable?: bool, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], metadata?: null|array<string, string>, period?: array{end: int, start: int}, price_data?: array{currency: string, product: string, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, pricing?: array{price?: string}, quantity?: int, tax_behavior?: string, tax_code?: null|string, tax_rates?: null|string[], unit_amount_decimal?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\InvoiceItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/invoiceitems/%s', $id), $params, $opts);
    }
}
