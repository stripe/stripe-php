<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * Every time an applicant submits an application for a Charge Card product your platform offers, or every time your platform takes a proactive credit decision on an existing account, you must record the decision by creating a new <code>CreditUnderwritingRecord</code> object on a connected account.
 *
 * <a href="https://stripe.com/docs/issuing/credit/report-credit-decisions-and-manage-aans">Follow the guide</a> to learn about your requirements as a platform.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{application_method: string, purpose: string, submitted_at: int}&\Stripe\StripeObject&\stdClass) $application For decisions triggered by an application, details about the submission.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $created_from The event that triggered the underwriting.
 * @property (object{email: string, name: string}&\Stripe\StripeObject&\stdClass) $credit_user
 * @property null|int $decided_at Date when a decision was made.
 * @property null|(object{application_rejected: null|(object{reason_other_explanation: null|string, reasons: string[]}&\Stripe\StripeObject&\stdClass), credit_limit_approved: null|(object{amount: int, currency: string}&\Stripe\StripeObject&\stdClass), credit_limit_decreased: null|(object{amount: int, currency: string, reason_other_explanation: null|string, reasons: string[]}&\Stripe\StripeObject&\stdClass), credit_line_closed: null|(object{reason_other_explanation: null|string, reasons: string[]}&\Stripe\StripeObject&\stdClass), type: string}&\Stripe\StripeObject&\stdClass) $decision Details about the decision.
 * @property null|int $decision_deadline For underwriting initiated by an application, a decision must be taken 30 days after the submission.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $regulatory_reporting_file File containing regulatory reporting data for the decision. Required if you are subject to this <a href="https://stripe.com/docs/issuing/credit/report-required-regulatory-data-for-credit-decisions">reporting requirement</a>.
 * @property null|(object{explanation: string, original_decision_type: string}&\Stripe\StripeObject&\stdClass) $underwriting_exception If an exception to the usual underwriting criteria was made for this application, details about the exception must be provided. Exceptions should only be granted in rare circumstances, in consultation with Stripe Compliance.
 */
class CreditUnderwritingRecord extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.credit_underwriting_record';

    const CREATED_FROM_APPLICATION = 'application';
    const CREATED_FROM_PROACTIVE_REVIEW = 'proactive_review';

    /**
     * Retrieves a list of <code>CreditUnderwritingRecord</code> objects. The objects
     * are sorted in descending order by creation date, with the most-recently-created
     * object appearing first.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Issuing\CreditUnderwritingRecord> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a <code>CreditUnderwritingRecord</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CreditUnderwritingRecord
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CreditUnderwritingRecord the corrected credit underwriting record
     */
    public function correct($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/correct';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\CreditUnderwritingRecord the created credit underwriting record
     */
    public static function createFromApplication($params = null, $opts = null)
    {
        $url = static::classUrl() . '/create_from_application';
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
     * @return \Stripe\Issuing\CreditUnderwritingRecord the created credit underwriting record
     */
    public static function createFromProactiveReview($params = null, $opts = null)
    {
        $url = static::classUrl() . '/create_from_proactive_review';
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
     * @return \Stripe\Issuing\CreditUnderwritingRecord the reported credit underwriting record
     */
    public function reportDecision($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/report_decision';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
