<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * As a <a href="https://stripe.com/docs/issuing">card issuer</a>, you can dispute transactions that the cardholder does not recognize, suspects to be fraudulent, or has other issues with.
 *
 * Related guide: <a href="https://stripe.com/docs/issuing/purchases/disputes">Issuing disputes</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Disputed amount in the card's currency and in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a>. Usually the amount of the <code>transaction</code>, but can differ (usually because of currency fluctuation).
 * @property null|\Stripe\BalanceTransaction[] $balance_transactions List of balance transactions associated with the dispute.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency The currency the <code>transaction</code> was made in.
 * @property (object{canceled?: (object{additional_documentation: null|string|\Stripe\File, canceled_at: null|int, cancellation_policy_provided: null|bool, cancellation_reason: null|string, expected_at: null|int, explanation: null|string, product_description: null|string, product_type: null|string, return_status: null|string, returned_at: null|int}&\Stripe\StripeObject&\stdClass), duplicate?: (object{additional_documentation: null|string|\Stripe\File, card_statement: null|string|\Stripe\File, cash_receipt: null|string|\Stripe\File, check_image: null|string|\Stripe\File, explanation: null|string, original_transaction: null|string}&\Stripe\StripeObject&\stdClass), fraudulent?: (object{additional_documentation: null|string|\Stripe\File, explanation: null|string}&\Stripe\StripeObject&\stdClass), merchandise_not_as_described?: (object{additional_documentation: null|string|\Stripe\File, explanation: null|string, received_at: null|int, return_description: null|string, return_status: null|string, returned_at: null|int}&\Stripe\StripeObject&\stdClass), no_valid_authorization?: (object{additional_documentation: null|string|\Stripe\File, explanation: null|string}&\Stripe\StripeObject&\stdClass), not_received?: (object{additional_documentation: null|string|\Stripe\File, expected_at: null|int, explanation: null|string, product_description: null|string, product_type: null|string}&\Stripe\StripeObject&\stdClass), other?: (object{additional_documentation: null|string|\Stripe\File, explanation: null|string, product_description: null|string, product_type: null|string}&\Stripe\StripeObject&\stdClass), reason: string, service_not_as_described?: (object{additional_documentation: null|string|\Stripe\File, canceled_at: null|int, cancellation_reason: null|string, explanation: null|string, received_at: null|int}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $evidence
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $loss_reason The enum that describes the dispute loss outcome. If the dispute is not lost, this field will be absent. New enum values may be added in the future, so be sure to handle unknown values.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $status Current status of the dispute.
 * @property string|\Stripe\Issuing\Transaction $transaction The transaction being disputed.
 * @property null|(object{debit_reversal: null|string, received_debit: string}&\Stripe\StripeObject&\stdClass) $treasury <a href="https://stripe.com/docs/api/treasury">Treasury</a> details related to this dispute if it was created on a [FinancialAccount](/docs/api/treasury/financial_accounts
 */
class Dispute extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.dispute';

    use \Stripe\ApiOperations\Update;

    const LOSS_REASON_CARDHOLDER_AUTHENTICATION_ISSUER_LIABILITY = 'cardholder_authentication_issuer_liability';
    const LOSS_REASON_ECI5_TOKEN_TRANSACTION_WITH_TAVV = 'eci5_token_transaction_with_tavv';
    const LOSS_REASON_EXCESS_DISPUTES_IN_TIMEFRAME = 'excess_disputes_in_timeframe';
    const LOSS_REASON_HAS_NOT_MET_THE_MINIMUM_DISPUTE_AMOUNT_REQUIREMENTS = 'has_not_met_the_minimum_dispute_amount_requirements';
    const LOSS_REASON_INVALID_DUPLICATE_DISPUTE = 'invalid_duplicate_dispute';
    const LOSS_REASON_INVALID_INCORRECT_AMOUNT_DISPUTE = 'invalid_incorrect_amount_dispute';
    const LOSS_REASON_INVALID_NO_AUTHORIZATION = 'invalid_no_authorization';
    const LOSS_REASON_INVALID_USE_OF_DISPUTES = 'invalid_use_of_disputes';
    const LOSS_REASON_MERCHANDISE_DELIVERED_OR_SHIPPED = 'merchandise_delivered_or_shipped';
    const LOSS_REASON_MERCHANDISE_OR_SERVICE_AS_DESCRIBED = 'merchandise_or_service_as_described';
    const LOSS_REASON_NOT_CANCELLED = 'not_cancelled';
    const LOSS_REASON_OTHER = 'other';
    const LOSS_REASON_REFUND_ISSUED = 'refund_issued';
    const LOSS_REASON_SUBMITTED_BEYOND_ALLOWABLE_TIME_LIMIT = 'submitted_beyond_allowable_time_limit';
    const LOSS_REASON_TRANSACTION_3DS_REQUIRED = 'transaction_3ds_required';
    const LOSS_REASON_TRANSACTION_APPROVED_AFTER_PRIOR_FRAUD_DISPUTE = 'transaction_approved_after_prior_fraud_dispute';
    const LOSS_REASON_TRANSACTION_AUTHORIZED = 'transaction_authorized';
    const LOSS_REASON_TRANSACTION_ELECTRONICALLY_READ = 'transaction_electronically_read';
    const LOSS_REASON_TRANSACTION_QUALIFIES_FOR_VISA_EASY_PAYMENT_SERVICE = 'transaction_qualifies_for_visa_easy_payment_service';
    const LOSS_REASON_TRANSACTION_UNATTENDED = 'transaction_unattended';

    const STATUS_EXPIRED = 'expired';
    const STATUS_LOST = 'lost';
    const STATUS_SUBMITTED = 'submitted';
    const STATUS_UNSUBMITTED = 'unsubmitted';
    const STATUS_WON = 'won';

    /**
     * Creates an Issuing <code>Dispute</code> object. Individual pieces of evidence
     * within the <code>evidence</code> object are optional at this point. Stripe only
     * validates that required evidence is present during submission. Refer to <a
     * href="/docs/issuing/purchases/disputes#dispute-reasons-and-evidence">Dispute
     * reasons and evidence</a> for more details about evidence requirements.
     *
     * @param null|array{amount?: int, evidence?: array{canceled?: null|array{additional_documentation?: null|string, canceled_at?: null|int, cancellation_policy_provided?: null|bool, cancellation_reason?: null|string, expected_at?: null|int, explanation?: null|string, product_description?: null|string, product_type?: null|string, return_status?: null|string, returned_at?: null|int}, duplicate?: null|array{additional_documentation?: null|string, card_statement?: null|string, cash_receipt?: null|string, check_image?: null|string, explanation?: null|string, original_transaction?: string}, fraudulent?: null|array{additional_documentation?: null|string, explanation?: null|string}, merchandise_not_as_described?: null|array{additional_documentation?: null|string, explanation?: null|string, received_at?: null|int, return_description?: null|string, return_status?: null|string, returned_at?: null|int}, no_valid_authorization?: null|array{additional_documentation?: null|string, explanation?: null|string}, not_received?: null|array{additional_documentation?: null|string, expected_at?: null|int, explanation?: null|string, product_description?: null|string, product_type?: null|string}, other?: null|array{additional_documentation?: null|string, explanation?: null|string, product_description?: null|string, product_type?: null|string}, reason?: string, service_not_as_described?: null|array{additional_documentation?: null|string, canceled_at?: null|int, cancellation_reason?: null|string, explanation?: null|string, received_at?: null|int}}, expand?: string[], metadata?: \Stripe\StripeObject, transaction?: string, treasury?: array{received_debit: string}} $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Dispute the created resource
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of Issuing <code>Dispute</code> objects. The objects are sorted
     * in descending order by creation date, with the most recently created object
     * appearing first.
     *
     * @param null|array{created?: int|array, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string, transaction?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Issuing\Dispute> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Dispute</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Dispute
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates the specified Issuing <code>Dispute</code> object by setting the values
     * of the parameters passed. Any parameters not provided will be left unchanged.
     * Properties on the <code>evidence</code> object can be unset by passing in an
     * empty string.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{amount?: int, evidence?: array{canceled?: null|array{additional_documentation?: null|string, canceled_at?: null|int, cancellation_policy_provided?: null|bool, cancellation_reason?: null|string, expected_at?: null|int, explanation?: null|string, product_description?: null|string, product_type?: null|string, return_status?: null|string, returned_at?: null|int}, duplicate?: null|array{additional_documentation?: null|string, card_statement?: null|string, cash_receipt?: null|string, check_image?: null|string, explanation?: null|string, original_transaction?: string}, fraudulent?: null|array{additional_documentation?: null|string, explanation?: null|string}, merchandise_not_as_described?: null|array{additional_documentation?: null|string, explanation?: null|string, received_at?: null|int, return_description?: null|string, return_status?: null|string, returned_at?: null|int}, no_valid_authorization?: null|array{additional_documentation?: null|string, explanation?: null|string}, not_received?: null|array{additional_documentation?: null|string, expected_at?: null|int, explanation?: null|string, product_description?: null|string, product_type?: null|string}, other?: null|array{additional_documentation?: null|string, explanation?: null|string, product_description?: null|string, product_type?: null|string}, reason?: string, service_not_as_described?: null|array{additional_documentation?: null|string, canceled_at?: null|int, cancellation_reason?: null|string, explanation?: null|string, received_at?: null|int}}, expand?: string[], metadata?: null|\Stripe\StripeObject} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Dispute the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Dispute the submited dispute
     */
    public function submit($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/submit';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
