<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class DisputeService extends AbstractService
{
    /**
     * Returns a list of your disputes.
     *
     * @param null|array{charge?: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, payment_intent?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Dispute>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/disputes', $params, $opts);
    }

    /**
     * Closing the dispute for a charge indicates that you do not have any evidence to
     * submit and are essentially dismissing the dispute, acknowledging it as lost.
     *
     * The status of the dispute will change from <code>needs_response</code> to
     * <code>lost</code>. <em>Closing a dispute is irreversible</em>.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function close($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/disputes/%s/close', $id), $params, $opts);
    }

    /**
     * Retrieves the dispute with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/disputes/%s', $id), $params, $opts);
    }

    /**
     * When you get a dispute, contacting your customer is always the best first step.
     * If that doesn’t work, you can submit evidence to help us resolve the dispute in
     * your favor. You can do this in your <a
     * href="https://dashboard.stripe.com/disputes">dashboard</a>, but if you prefer,
     * you can use the API to submit evidence programmatically.
     *
     * Depending on your dispute type, different evidence fields will give you a better
     * chance of winning your dispute. To figure out which evidence fields to provide,
     * see our <a href="/docs/disputes/categories">guide to dispute types</a>.
     *
     * @param string $id
     * @param null|array{evidence?: array{access_activity_log?: string, billing_address?: string, cancellation_policy?: string, cancellation_policy_disclosure?: string, cancellation_rebuttal?: string, customer_communication?: string, customer_email_address?: string, customer_name?: string, customer_purchase_ip?: string, customer_signature?: string, duplicate_charge_documentation?: string, duplicate_charge_explanation?: string, duplicate_charge_id?: string, enhanced_evidence?: null|array{visa_compelling_evidence_3?: array{disputed_transaction?: array{customer_account_id?: null|string, customer_device_fingerprint?: null|string, customer_device_id?: null|string, customer_email_address?: null|string, customer_purchase_ip?: null|string, merchandise_or_services?: string, product_description?: null|string, shipping_address?: array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string}}, prior_undisputed_transactions?: (array{charge: string, customer_account_id?: null|string, customer_device_fingerprint?: null|string, customer_device_id?: null|string, customer_email_address?: null|string, customer_purchase_ip?: null|string, product_description?: null|string, shipping_address?: array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string}})[]}, visa_compliance?: array{fee_acknowledged?: bool}}, product_description?: string, receipt?: string, refund_policy?: string, refund_policy_disclosure?: string, refund_refusal_explanation?: string, service_date?: string, service_documentation?: string, shipping_address?: string, shipping_carrier?: string, shipping_date?: string, shipping_documentation?: string, shipping_tracking_number?: string, uncategorized_file?: string, uncategorized_text?: string}, expand?: string[], metadata?: null|array<string, string>, submit?: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Dispute
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/disputes/%s', $id), $params, $opts);
    }
}
