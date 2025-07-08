<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class QuoteService extends AbstractService
{
    /**
     * Accepts the specified quote.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Quote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function accept($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/quotes/%s/accept', $id), $params, $opts);
    }

    /**
     * Returns a list of your quotes.
     *
     * @param null|array{customer?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string, test_clock?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Quote>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/quotes', $params, $opts);
    }

    /**
     * When retrieving a quote, there is an includable <a
     * href="https://stripe.com/docs/api/quotes/object#quote_object-computed-upfront-line_items"><strong>computed.upfront.line_items</strong></a>
     * property containing the first handful of those items. There is also a URL where
     * you can retrieve the full (paginated) list of upfront line items.
     *
     * @param string $id
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\LineItem>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allComputedUpfrontLineItems($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/quotes/%s/computed_upfront_line_items', $id), $params, $opts);
    }

    /**
     * When retrieving a quote, there is an includable <strong>line_items</strong>
     * property containing the first handful of those items. There is also a URL where
     * you can retrieve the full (paginated) list of line items.
     *
     * @param string $id
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\LineItem>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allLineItems($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/quotes/%s/line_items', $id), $params, $opts);
    }

    /**
     * Cancels the quote.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Quote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/quotes/%s/cancel', $id), $params, $opts);
    }

    /**
     * A quote models prices and services for a customer. Default options for
     * <code>header</code>, <code>description</code>, <code>footer</code>, and
     * <code>expires_at</code> can be set in the dashboard via the <a
     * href="https://dashboard.stripe.com/settings/billing/quote">quote template</a>.
     *
     * @param null|array{application_fee_amount?: null|int, application_fee_percent?: null|float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, collection_method?: string, customer?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], expires_at?: int, footer?: null|string, from_quote?: array{is_revision?: bool, quote: string}, header?: null|string, invoice_settings?: array{days_until_due?: int, issuer?: array{account?: string, type: string}}, line_items?: (array{discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], price?: string, price_data?: array{currency: string, product: string, recurring?: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], metadata?: array<string, string>, on_behalf_of?: null|string, subscription_data?: array{billing_mode?: array{type: string}, description?: string, effective_date?: null|array|int|string, metadata?: array<string, string>, trial_period_days?: null|int}, test_clock?: string, transfer_data?: null|array{amount?: int, amount_percent?: float, destination: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Quote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/quotes', $params, $opts);
    }

    /**
     * Finalizes the quote.
     *
     * @param string $id
     * @param null|array{expand?: string[], expires_at?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Quote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function finalizeQuote($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/quotes/%s/finalize', $id), $params, $opts);
    }

    /**
     * Download the PDF for a finalized quote. Explanation for special handling can be
     * found <a href="https://docs.stripe.com/quotes/overview#quote_pdf">here</a>.
     *
     * @param string $id
     * @param callable $readBodyChunkCallable
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return mixed
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function pdf($id, $readBodyChunkCallable, $params = null, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        if (!isset($opts->apiBase)) {
            $opts->apiBase = $this->getClient()->getFilesBase();
        }

        return $this->requestStream('get', $this->buildPath('/v1/quotes/%s/pdf', $id), $readBodyChunkCallable, $params, $opts);
    }

    /**
     * Retrieves the quote with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Quote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/quotes/%s', $id), $params, $opts);
    }

    /**
     * A quote models prices and services for a customer.
     *
     * @param string $id
     * @param null|array{application_fee_amount?: null|int, application_fee_percent?: null|float, automatic_tax?: array{enabled: bool, liability?: array{account?: string, type: string}}, collection_method?: string, customer?: string, default_tax_rates?: null|string[], description?: null|string, discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], expires_at?: int, footer?: null|string, header?: null|string, invoice_settings?: array{days_until_due?: int, issuer?: array{account?: string, type: string}}, line_items?: (array{discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], id?: string, price?: string, price_data?: array{currency: string, product: string, recurring?: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, quantity?: int, tax_rates?: null|string[]})[], metadata?: array<string, string>, on_behalf_of?: null|string, subscription_data?: array{description?: null|string, effective_date?: null|array|int|string, metadata?: array<string, string>, trial_period_days?: null|int}, transfer_data?: null|array{amount?: int, amount_percent?: float, destination: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Quote
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/quotes/%s', $id), $params, $opts);
    }
}
