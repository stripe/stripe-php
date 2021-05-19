<?php

// File generated from our OpenAPI spec

namespace Stripe\Identity;

/**
 * A VerificationSession is the starting-point for a verification flow that will
 * collect and verify data on your users. Each VerificationSesssion has a URL which
 * provides access to Stripe’s hosted identity verification UI. When you direct
 * your users to the link, Stripe will collect personal information and verify it.
 * You can retrieve the VerificationSession later to see the status of the checks
 * performed and access any data collected from your users.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $client_secret This string value can be passed to stripe.js to embed a verification flow directly into your app.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|\Stripe\StripeObject $last_error Hash of details on the last error encountered in the verification process.
 * @property null|string|\Stripe\Identity\VerificationReport $last_verification_report Link to the most recent completed VerificationReport for this Session.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\StripeObject $options
 * @property null|\Stripe\StripeObject $redaction Redaction status of this VerificationSession. If the VerificationSession is not redacted, this field will be null.
 * @property string $status Status of this VerificationSession. Read more about each <a href="https://stripe.com/docs/identity/how-sessions-work">VerificationSession status</a>.
 * @property string $type Type of report requested.
 * @property null|string $url Link to the Stripe-hosted identity verification portal that you can send a user to for verification.
 * @property null|\Stripe\StripeObject $verified_outputs Hash of verified data about this person that results from a successful verification report.
 */
class VerificationSession extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'identity.verification_session';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;

    const STATUS_CANCELED = 'canceled';
    const STATUS_PROCESSING = 'processing';
    const STATUS_REQUIRES_INPUT = 'requires_input';
    const STATUS_VERIFIED = 'verified';

    const TYPE_DOCUMENT = 'document';
    const TYPE_ID_NUMBER = 'id_number';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return VerificationSession the canceled verification session
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
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return VerificationSession the redacted verification session
     */
    public function redact($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/redact';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
