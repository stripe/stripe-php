<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\ThreeDSecure;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AuthenticationService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of 3D Secure Authentications.
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\ThreeDSecure\Authentication>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/three_d_secure/authentications', $params, $opts);
    }

    /**
     * This endpoint cancels a 3DS Authentication. You can cancel a 3DS Authentication
     * object when it’s in a non-final status: <code>requires_submission</code> or
     * <code>requires_challenge</code>.
     *
     * @param string $id
     * @param null|array{expand?: string[], metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\ThreeDSecure\Authentication
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/three_d_secure/authentications/%s/cancel', $id), $params, $opts);
    }

    /**
     * This endpoint creates a 3DS Authentication. Refer to the <a
     * href="/payments/3d-secure/standalone-3d-secure#create-a-3ds-authentication-object">Create
     * a 3DS Authentication object section of the Standalone 3DS guide</a> for more
     * information.
     *
     * You can pass the submit parameter to automatically submit the 3DS Authentication
     * object when you create it. Refer to the <a
     * href="/payments/3d-secure/standalone-3d-secure#submit-at-creation">Submit at
     * creation section of the Standalone 3DS guide</a> for more information.
     *
     * @param null|array{acquirer_details?: array{acquirer_bin: string, acquirer_country: string, acquirer_merchant_id: string, mcc?: string, merchant_name?: string, requestor_id?: string}, amount?: int, channel: array{browser?: array{accept_header: string, color_depth?: int, device_id?: string, ip_address: string, java_enabled?: bool, javascript_enabled: bool, language: string, screen_height?: int, screen_width?: int, timezone_offset?: int, user_agent: string}, three_r_i?: array{previous_authentication: string, type: string}, type: string}, currency?: string, directory_server?: string, expand?: string[], flow_preference?: array{challenge?: array{type: string}, data_share?: array{type: string}, frictionless?: array{type: string}, type: string}, future_usage?: array{installment?: array{amount: int, expiry: array{date?: string, type: string}, interval?: string, interval_count?: int, number: int}, recurring?: array{amount: int, expiry: array{date?: string, type: string}, interval?: string, interval_count?: int}, type: string}, message_category: string, metadata?: null|array<string, string>, payment_method?: string, payment_method_data?: array{billing_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, email?: string, name?: string, phone?: string}, card: array{cvc?: string, exp_month?: int, exp_year?: int, number?: string, token?: string}, type: string}, reason?: string, shipping_address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, submit?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\ThreeDSecure\Authentication
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/three_d_secure/authentications', $params, $opts);
    }

    /**
     * This endpoint retrieves a 3DS Authentication.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\ThreeDSecure\Authentication
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/three_d_secure/authentications/%s', $id), $params, $opts);
    }

    /**
     * This endpoint submits a 3DS Authentication. You can submit a 3DS Authentication
     * object when it has status <code>requires_submission</code>. Refer to the <a
     * href="/payments/3d-secure/standalone-3d-secure#submit-the-3ds-authentication-object">Submit
     * the 3DS Authentication object section of the Standalone 3DS guide</a> for more
     * information.
     *
     * @param string $id
     * @param null|array{expand?: string[], fingerprinting_result?: string, metadata?: null|array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\ThreeDSecure\Authentication
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function submit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/three_d_secure/authentications/%s/submit', $id), $params, $opts);
    }
}
