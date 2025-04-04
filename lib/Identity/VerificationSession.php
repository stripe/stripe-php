<?php

// File generated from our OpenAPI spec

namespace Stripe\Identity;

/**
 * A VerificationSession guides you through the process of collecting and verifying the identities
 * of your users. It contains details about the type of verification, such as what <a href="/docs/identity/verification-checks">verification
 * check</a> to perform. Only create one VerificationSession for
 * each verification in your system.
 *
 * A VerificationSession transitions through <a href="/docs/identity/how-sessions-work">multiple
 * statuses</a> throughout its lifetime as it progresses through
 * the verification flow. The VerificationSession contains the user's verified data after
 * verification checks are complete.
 *
 * Related guide: <a href="https://stripe.com/docs/identity/verification-sessions">The Verification Sessions API</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $client_reference_id A string to reference this user. This can be a customer ID, a session ID, or similar, and can be used to reconcile this verification with your internal systems.
 * @property null|string $client_secret The short-lived client secret used by Stripe.js to <a href="https://stripe.com/docs/js/identity/modal">show a verification modal</a> inside your app. This client secret expires after 24 hours and can only be used once. Don’t store it, log it, embed it in a URL, or expose it to anyone other than the user. Make sure that you have TLS enabled on any page that includes the client secret. Refer to our docs on <a href="https://stripe.com/docs/identity/verification-sessions#client-secret">passing the client secret to the frontend</a> to learn more.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{code: null|string, reason: null|string}&\Stripe\StripeObject) $last_error If present, this property tells you the last error encountered when processing the verification.
 * @property null|string|VerificationReport $last_verification_report ID of the most recent VerificationReport. <a href="https://stripe.com/docs/identity/verification-sessions#results">Learn more about accessing detailed verification results.</a>
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{document?: (object{allowed_types?: string[], require_id_number?: bool, require_live_capture?: bool, require_matching_selfie?: bool}&\Stripe\StripeObject), email?: (object{require_verification?: bool}&\Stripe\StripeObject), id_number?: (object{}&\Stripe\StripeObject), phone?: (object{require_verification?: bool}&\Stripe\StripeObject)}&\Stripe\StripeObject) $options A set of options for the session’s verification checks.
 * @property null|(object{email?: string, phone?: string}&\Stripe\StripeObject) $provided_details Details provided about the user being verified. These details may be shown to the user.
 * @property null|(object{status: string}&\Stripe\StripeObject) $redaction Redaction status of this VerificationSession. If the VerificationSession is not redacted, this field will be null.
 * @property null|string $related_customer Customer ID
 * @property string $status Status of this VerificationSession. <a href="https://stripe.com/docs/identity/how-sessions-work">Learn more about the lifecycle of sessions</a>.
 * @property string $type The type of <a href="https://stripe.com/docs/identity/verification-checks">verification check</a> to be performed.
 * @property null|string $url The short-lived URL that you use to redirect a user to Stripe to submit their identity information. This URL expires after 48 hours and can only be used once. Don’t store it, log it, send it in emails or expose it to anyone other than the user. Refer to our docs on <a href="https://stripe.com/docs/identity/verify-identity-documents?platform=web&amp;type=redirect">verifying identity documents</a> to learn how to redirect users to Stripe.
 * @property null|string $verification_flow The configuration token of a verification flow from the dashboard.
 * @property null|(object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), dob?: null|(object{day: null|int, month: null|int, year: null|int}&\Stripe\StripeObject), email: null|string, first_name: null|string, id_number?: null|string, id_number_type: null|string, last_name: null|string, phone: null|string}&\Stripe\StripeObject) $verified_outputs The user’s verified data.
 */
class VerificationSession extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'identity.verification_session';

    use \Stripe\ApiOperations\Update;

    const STATUS_CANCELED = 'canceled';
    const STATUS_PROCESSING = 'processing';
    const STATUS_REQUIRES_INPUT = 'requires_input';
    const STATUS_VERIFIED = 'verified';

    const TYPE_DOCUMENT = 'document';
    const TYPE_ID_NUMBER = 'id_number';
    const TYPE_VERIFICATION_FLOW = 'verification_flow';

    /**
     * Creates a VerificationSession object.
     *
     * After the VerificationSession is created, display a verification modal using the
     * session <code>client_secret</code> or send your users to the session’s
     * <code>url</code>.
     *
     * If your API key is in test mode, verification checks won’t actually process,
     * though everything else will occur as if in live mode.
     *
     * Related guide: <a href="/docs/identity/verify-identity-documents">Verify your
     * users’ identity documents</a>
     *
     * @param null|array{client_reference_id?: string, expand?: string[], metadata?: \Stripe\StripeObject, options?: array{document?: null|array{allowed_types?: string[], require_id_number?: bool, require_live_capture?: bool, require_matching_selfie?: bool}}, provided_details?: array{email?: string, phone?: string}, related_customer?: string, return_url?: string, type?: string, verification_flow?: string} $params
     * @param null|array|string $options
     *
     * @return VerificationSession the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * Returns a list of VerificationSessions.
     *
     * @param null|array{client_reference_id?: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, related_customer?: string, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<VerificationSession> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a VerificationSession that was previously created.
     *
     * When the session status is <code>requires_input</code>, you can use this method
     * to retrieve a valid <code>client_secret</code> or <code>url</code> to allow
     * re-submission.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return VerificationSession
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates a VerificationSession object.
     *
     * When the session status is <code>requires_input</code>, you can use this method
     * to update the verification check and options.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], metadata?: \Stripe\StripeObject, options?: array{document?: null|array{allowed_types?: string[], require_id_number?: bool, require_live_capture?: bool, require_matching_selfie?: bool}}, provided_details?: array{email?: string, phone?: string}, type?: string} $params
     * @param null|array|string $opts
     *
     * @return VerificationSession the updated resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return VerificationSession the canceled verification session
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return VerificationSession the redacted verification session
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function redact($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/redact';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
