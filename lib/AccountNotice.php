<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A notice to a Connected account. Notice can be sent by Stripe on your behalf or you can opt to send the notices yourself.
 *
 * See the <a href="https://stripe.com/docs/issuing/compliance-us/issuing-regulated-customer-notices">guide to send notices</a> to your connected accounts.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|int $deadline When present, the deadline for sending the notice to meet the relevant regulations.
 * @property null|\Stripe\StripeObject $email Information about the email when sent.
 * @property null|\Stripe\StripeObject $linked_objects Information about objects related to the notice.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $reason Reason the notice is being sent. The reason determines what copy the notice must contain. See the <a href="https://stripe.com/docs/issuing/compliance-us/issuing-regulated-customer-notices">regulated customer notices</a> guide. All reasons might not apply to your integration, and Stripe might add new reasons in the future, so we recommend an internal warning when you receive an unknown reason.
 * @property null|int $sent_at Date when the notice was sent. When absent, you must send the notice, update the content of the email and date when it was sent.
 */
class AccountNotice extends ApiResource
{
    const OBJECT_NAME = 'account_notice';

    use ApiOperations\Update;

    const REASON_ISSUING_ACCOUNT_CLOSED_FOR_INACTIVITY = 'issuing.account_closed_for_inactivity';
    const REASON_ISSUING_ACCOUNT_CLOSED_FOR_NOT_PROVIDING_BUSINESS_MODEL_CLARIFICATION = 'issuing.account_closed_for_not_providing_business_model_clarification';
    const REASON_ISSUING_ACCOUNT_CLOSED_FOR_NOT_PROVIDING_URL_CLARIFICATION = 'issuing.account_closed_for_not_providing_url_clarification';
    const REASON_ISSUING_ACCOUNT_CLOSED_FOR_NOT_PROVIDING_USE_CASE_CLARIFICATION = 'issuing.account_closed_for_not_providing_use_case_clarification';
    const REASON_ISSUING_ACCOUNT_CLOSED_FOR_TERMS_OF_SERVICE_VIOLATION = 'issuing.account_closed_for_terms_of_service_violation';
    const REASON_ISSUING_APPLICATION_REJECTED_FOR_FAILURE_TO_VERIFY = 'issuing.application_rejected_for_failure_to_verify';
    const REASON_ISSUING_CREDIT_APPLICATION_REJECTED = 'issuing.credit_application_rejected';
    const REASON_ISSUING_CREDIT_INCREASE_APPLICATION_REJECTED = 'issuing.credit_increase_application_rejected';
    const REASON_ISSUING_CREDIT_LIMIT_DECREASED = 'issuing.credit_limit_decreased';
    const REASON_ISSUING_CREDIT_LINE_CLOSED = 'issuing.credit_line_closed';
    const REASON_ISSUING_DISPUTE_LOST = 'issuing.dispute_lost';
    const REASON_ISSUING_DISPUTE_SUBMITTED = 'issuing.dispute_submitted';
    const REASON_ISSUING_DISPUTE_WON = 'issuing.dispute_won';

    /**
     * Retrieves a list of <code>AccountNotice</code> objects. The objects are sorted
     * in descending order by creation date, with the most-recently-created object
     * appearing first.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\AccountNotice> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves an <code>AccountNotice</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\AccountNotice
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates an <code>AccountNotice</code> object.
     *
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\AccountNotice the updated resource
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
}
