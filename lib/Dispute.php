<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A dispute occurs when a customer questions your charge with their card issuer.
 * When this happens, you have the opportunity to respond to the dispute with
 * evidence that shows that the charge is legitimate.
 *
 * Related guide: <a href="https://stripe.com/docs/disputes">Disputes and fraud</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Disputed amount. Usually the amount of the charge, but it can differ (usually because of currency fluctuation or because only part of the order is disputed).
 * @property BalanceTransaction[] $balance_transactions List of zero, one, or two balance transactions that show funds withdrawn and reinstated to your Stripe account as a result of this dispute.
 * @property Charge|string $charge ID of the charge that's disputed.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string[] $enhanced_eligibility_types List of eligibility types that are included in <code>enhanced_evidence</code>.
 * @property (object{access_activity_log: null|string, billing_address: null|string, cancellation_policy: null|File|string, cancellation_policy_disclosure: null|string, cancellation_rebuttal: null|string, customer_communication: null|File|string, customer_email_address: null|string, customer_name: null|string, customer_purchase_ip: null|string, customer_signature: null|File|string, duplicate_charge_documentation: null|File|string, duplicate_charge_explanation: null|string, duplicate_charge_id: null|string, enhanced_evidence: (object{visa_compelling_evidence_3?: (object{disputed_transaction: null|(object{customer_account_id: null|string, customer_device_fingerprint: null|string, customer_device_id: null|string, customer_email_address: null|string, customer_purchase_ip: null|string, merchandise_or_services: null|string, product_description: null|string, shipping_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject)}&StripeObject), prior_undisputed_transactions: ((object{charge: string, customer_account_id: null|string, customer_device_fingerprint: null|string, customer_device_id: null|string, customer_email_address: null|string, customer_purchase_ip: null|string, product_description: null|string, shipping_address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&StripeObject)}&StripeObject))[]}&StripeObject), visa_compliance?: (object{fee_acknowledged: bool}&StripeObject)}&StripeObject), product_description: null|string, receipt: null|File|string, refund_policy: null|File|string, refund_policy_disclosure: null|string, refund_refusal_explanation: null|string, service_date: null|string, service_documentation: null|File|string, shipping_address: null|string, shipping_carrier: null|string, shipping_date: null|string, shipping_documentation: null|File|string, shipping_tracking_number: null|string, uncategorized_file: null|File|string, uncategorized_text: null|string}&StripeObject) $evidence
 * @property (object{due_by: null|int, enhanced_eligibility: (object{visa_compelling_evidence_3?: (object{required_actions: string[], status: string}&StripeObject), visa_compliance?: (object{status: string}&StripeObject)}&StripeObject), has_evidence: bool, past_due: bool, submission_count: int}&StripeObject) $evidence_details
 * @property bool $is_charge_refundable If true, it's still possible to refund the disputed payment. After the payment has been fully refunded, no further funds are withdrawn from your Stripe account as a result of this dispute.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $network_reason_code Network-dependent reason code for the dispute.
 * @property null|PaymentIntent|string $payment_intent ID of the PaymentIntent that's disputed.
 * @property null|(object{amazon_pay?: (object{dispute_type: null|string}&StripeObject), card?: (object{brand: string, case_type: string, network_reason_code: null|string}&StripeObject), klarna?: (object{reason_code: null|string}&StripeObject), paypal?: (object{case_id: null|string, reason_code: null|string}&StripeObject), type: string}&StripeObject) $payment_method_details
 * @property string $reason Reason given by cardholder for dispute. Possible values are <code>bank_cannot_process</code>, <code>check_returned</code>, <code>credit_not_processed</code>, <code>customer_initiated</code>, <code>debit_not_authorized</code>, <code>duplicate</code>, <code>fraudulent</code>, <code>general</code>, <code>incorrect_account_details</code>, <code>insufficient_funds</code>, <code>product_not_received</code>, <code>product_unacceptable</code>, <code>subscription_canceled</code>, or <code>unrecognized</code>. Learn more about <a href="https://stripe.com/docs/disputes/categories">dispute reasons</a>.
 * @property string $status Current status of dispute. Possible values are <code>warning_needs_response</code>, <code>warning_under_review</code>, <code>warning_closed</code>, <code>needs_response</code>, <code>under_review</code>, <code>won</code>, or <code>lost</code>.
 */
class Dispute extends ApiResource
{
    const OBJECT_NAME = 'dispute';

    use ApiOperations\Update;

    const REASON_BANK_CANNOT_PROCESS = 'bank_cannot_process';
    const REASON_CHECK_RETURNED = 'check_returned';
    const REASON_CREDIT_NOT_PROCESSED = 'credit_not_processed';
    const REASON_CUSTOMER_INITIATED = 'customer_initiated';
    const REASON_DEBIT_NOT_AUTHORIZED = 'debit_not_authorized';
    const REASON_DUPLICATE = 'duplicate';
    const REASON_FRAUDULENT = 'fraudulent';
    const REASON_GENERAL = 'general';
    const REASON_INCORRECT_ACCOUNT_DETAILS = 'incorrect_account_details';
    const REASON_INSUFFICIENT_FUNDS = 'insufficient_funds';
    const REASON_PRODUCT_NOT_RECEIVED = 'product_not_received';
    const REASON_PRODUCT_UNACCEPTABLE = 'product_unacceptable';
    const REASON_SUBSCRIPTION_CANCELED = 'subscription_canceled';
    const REASON_UNRECOGNIZED = 'unrecognized';

    const STATUS_LOST = 'lost';
    const STATUS_NEEDS_RESPONSE = 'needs_response';
    const STATUS_UNDER_REVIEW = 'under_review';
    const STATUS_WARNING_CLOSED = 'warning_closed';
    const STATUS_WARNING_NEEDS_RESPONSE = 'warning_needs_response';
    const STATUS_WARNING_UNDER_REVIEW = 'warning_under_review';
    const STATUS_WON = 'won';

    /**
     * Returns a list of your disputes.
     *
     * @param null|array{charge?: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, payment_intent?: string, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<Dispute> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the dispute with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Dispute
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
     * @param string $id the ID of the resource to update
     * @param null|array{evidence?: array{access_activity_log?: string, billing_address?: string, cancellation_policy?: string, cancellation_policy_disclosure?: string, cancellation_rebuttal?: string, customer_communication?: string, customer_email_address?: string, customer_name?: string, customer_purchase_ip?: string, customer_signature?: string, duplicate_charge_documentation?: string, duplicate_charge_explanation?: string, duplicate_charge_id?: string, enhanced_evidence?: null|array{visa_compelling_evidence_3?: array{disputed_transaction?: array{customer_account_id?: null|string, customer_device_fingerprint?: null|string, customer_device_id?: null|string, customer_email_address?: null|string, customer_purchase_ip?: null|string, merchandise_or_services?: string, product_description?: null|string, shipping_address?: array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string}}, prior_undisputed_transactions?: (array{charge: string, customer_account_id?: null|string, customer_device_fingerprint?: null|string, customer_device_id?: null|string, customer_email_address?: null|string, customer_purchase_ip?: null|string, product_description?: null|string, shipping_address?: array{city?: null|string, country?: null|string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string}})[]}, visa_compliance?: array{fee_acknowledged?: bool}}, product_description?: string, receipt?: string, refund_policy?: string, refund_policy_disclosure?: string, refund_refusal_explanation?: string, service_date?: string, service_documentation?: string, shipping_address?: string, shipping_carrier?: string, shipping_date?: string, shipping_documentation?: string, shipping_tracking_number?: string, uncategorized_file?: string, uncategorized_text?: string}, expand?: string[], metadata?: null|array<string, string>, submit?: bool} $params
     * @param null|array|string $opts
     *
     * @return Dispute the updated resource
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
     * @return Dispute the closed dispute
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function close($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/close';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
