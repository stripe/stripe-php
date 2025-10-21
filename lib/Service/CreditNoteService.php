<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CreditNoteService extends AbstractService
{
    /**
     * Returns a list of credit notes.
     *
     * @param null|array{created?: array|int, customer?: string, ending_before?: string, expand?: string[], invoice?: string, limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\CreditNote>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/credit_notes', $params, $opts);
    }

    /**
     * When retrieving a credit note, you’ll get a <strong>lines</strong> property
     * containing the first handful of those items. There is also a URL where you can
     * retrieve the full (paginated) list of line items.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\CreditNoteLineItem>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allLines($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/credit_notes/%s/lines', $parentId), $params, $opts);
    }

    /**
     * Issue a credit note to adjust the amount of a finalized invoice. A credit note
     * will first reduce the invoice’s <code>amount_remaining</code> (and
     * <code>amount_due</code>), but not below zero. This amount is indicated by the
     * credit note’s <code>pre_payment_amount</code>. The excess amount is indicated by
     * <code>post_payment_amount</code>, and it can result in any combination of the
     * following:
     *
     * <ul> <li>Refunds: create a new refund (using <code>refund_amount</code>) or link
     * existing refunds (using <code>refunds</code>).</li> <li>Customer balance credit:
     * credit the customer’s balance (using <code>credit_amount</code>) which will be
     * automatically applied to their next invoice when it’s finalized.</li>
     * <li>Outside of Stripe credit: record the amount that is or will be credited
     * outside of Stripe (using <code>out_of_band_amount</code>).</li> </ul>
     *
     * The sum of refunds, customer balance credits, and outside of Stripe credits must
     * equal the <code>post_payment_amount</code>.
     *
     * You may issue multiple credit notes for an invoice. Each credit note may
     * increment the invoice’s <code>pre_payment_credit_notes_amount</code>,
     * <code>post_payment_credit_notes_amount</code>, or both, depending on the
     * invoice’s <code>amount_remaining</code> at the time of credit note creation.
     *
     * @param null|array{amount?: int, credit_amount?: int, effective_at?: int, email_type?: string, expand?: string[], invoice: string, lines?: (array{amount?: int, description?: string, invoice_line_item?: string, quantity?: int, tax_amounts?: null|array{amount: int, tax_rate: string, taxable_amount: int}[], tax_rates?: null|string[], type: string, unit_amount?: int, unit_amount_decimal?: string})[], memo?: string, metadata?: array<string, string>, out_of_band_amount?: int, reason?: string, refund_amount?: int, refunds?: array{amount_refunded?: int, payment_record_refund?: array{payment_record: string, refund_group: string}, refund?: string, type?: string}[], shipping_cost?: array{shipping_rate?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CreditNote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/credit_notes', $params, $opts);
    }

    /**
     * Get a preview of a credit note without creating it.
     *
     * @param null|array{amount?: int, credit_amount?: int, effective_at?: int, email_type?: string, expand?: string[], invoice: string, lines?: (array{amount?: int, description?: string, invoice_line_item?: string, quantity?: int, tax_amounts?: null|array{amount: int, tax_rate: string, taxable_amount: int}[], tax_rates?: null|string[], type: string, unit_amount?: int, unit_amount_decimal?: string})[], memo?: string, metadata?: array<string, string>, out_of_band_amount?: int, reason?: string, refund_amount?: int, refunds?: array{amount_refunded?: int, payment_record_refund?: array{payment_record: string, refund_group: string}, refund?: string, type?: string}[], shipping_cost?: array{shipping_rate?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CreditNote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function preview($params = null, $opts = null)
    {
        return $this->request('get', '/v1/credit_notes/preview', $params, $opts);
    }

    /**
     * When retrieving a credit note preview, you’ll get a <strong>lines</strong>
     * property containing the first handful of those items. This URL you can retrieve
     * the full (paginated) list of line items.
     *
     * @param null|array{amount?: int, credit_amount?: int, effective_at?: int, email_type?: string, ending_before?: string, expand?: string[], invoice: string, limit?: int, lines?: (array{amount?: int, description?: string, invoice_line_item?: string, quantity?: int, tax_amounts?: null|array{amount: int, tax_rate: string, taxable_amount: int}[], tax_rates?: null|string[], type: string, unit_amount?: int, unit_amount_decimal?: string})[], memo?: string, metadata?: array<string, string>, out_of_band_amount?: int, reason?: string, refund_amount?: int, refunds?: array{amount_refunded?: int, payment_record_refund?: array{payment_record: string, refund_group: string}, refund?: string, type?: string}[], shipping_cost?: array{shipping_rate?: string}, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\CreditNoteLineItem>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function previewLines($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/credit_notes/preview/lines', $params, $opts);
    }

    /**
     * Retrieves the credit note object with the given identifier.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CreditNote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/credit_notes/%s', $id), $params, $opts);
    }

    /**
     * Updates an existing credit note.
     *
     * @param string $id
     * @param null|array{expand?: string[], memo?: string, metadata?: array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CreditNote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/credit_notes/%s', $id), $params, $opts);
    }

    /**
     * Marks a credit note as void. Learn more about <a
     * href="/docs/billing/invoices/credit-notes#voiding">voiding credit notes</a>.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\CreditNote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function voidCreditNote($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/credit_notes/%s/void', $id), $params, $opts);
    }
}
