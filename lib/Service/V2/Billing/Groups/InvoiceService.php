<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\Groups;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class InvoiceService extends \Stripe\Service\AbstractService
{
    /**
     * Create an empty invoice using the billing group's settings.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\GroupInvoice
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/groups/%s/invoices', $id), $params, $opts);
    }
}
