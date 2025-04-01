<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\BillingPortal;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SessionService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a session of the customer portal.
     *
     * @param null|array{configuration?: string, customer?: string, customer_account?: string, expand?: string[], flow_data?: array{after_completion?: array{hosted_confirmation?: array{custom_message?: string}, redirect?: array{return_url: string}, type: string}, subscription_cancel?: array{retention?: array{coupon_offer: array{coupon: string}, type: string}, subscription: string}, subscription_update?: array{subscription: string}, subscription_update_confirm?: array{discounts?: array{coupon?: string, promotion_code?: string}[], items: array{id: string, price?: string, quantity?: int}[], subscription: string}, type: string}, locale?: string, on_behalf_of?: string, return_url?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\BillingPortal\Session
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/billing_portal/sessions', $params, $opts);
    }
}
