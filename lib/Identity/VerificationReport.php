<?php

// File generated from our OpenAPI spec

namespace Stripe\Identity;

/**
 * A VerificationReport is the result of an attempt to collect and verify data from a user.
 * The collection of verification checks performed is determined from the <code>type</code> and <code>options</code>
 * parameters used. You can find the result of each verification check performed in the
 * appropriate sub-resource: <code>document</code>, <code>id_number</code>, <code>selfie</code>.
 *
 * Each VerificationReport contains a copy of any data collected by the user as well as
 * reference IDs which can be used to access collected images through the <a href="https://stripe.com/docs/api/files">FileUpload</a>
 * API. To configure and create VerificationReports, use the
 * <a href="https://stripe.com/docs/api/identity/verification_sessions">VerificationSession</a> API.
 *
 * Related guide: <a href="https://stripe.com/docs/identity/verification-sessions#results">Accessing verification results</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $client_reference_id A string to reference this user. This can be a customer ID, a session ID, or similar, and can be used to reconcile this verification with your internal systems.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property (object{address: null|(object{city: null|string, country: null|string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject&\stdClass), dob?: null|(object{day: null|int, month: null|int, year: null|int}&\Stripe\StripeObject&\stdClass), error: null|(object{code: null|string, reason: null|string}&\Stripe\StripeObject&\stdClass), expiration_date?: null|(object{day: null|int, month: null|int, year: null|int}&\Stripe\StripeObject&\stdClass), files: null|string[], first_name: null|string, issued_date: null|(object{day: null|int, month: null|int, year: null|int}&\Stripe\StripeObject&\stdClass), issuing_country: null|string, last_name: null|string, number?: null|string, status: string, type: null|string}&\Stripe\StripeObject&\stdClass) $document Result from a document check
 * @property (object{email: null|string, error: null|(object{code: null|string, reason: null|string}&\Stripe\StripeObject&\stdClass), status: string}&\Stripe\StripeObject&\stdClass) $email Result from a email check
 * @property (object{dob?: null|(object{day: null|int, month: null|int, year: null|int}&\Stripe\StripeObject&\stdClass), error: null|(object{code: null|string, reason: null|string}&\Stripe\StripeObject&\stdClass), first_name: null|string, id_number?: null|string, id_number_type: null|string, last_name: null|string, status: string}&\Stripe\StripeObject&\stdClass) $id_number Result from an id_number check
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{document?: (object{allowed_types?: string[], require_id_number?: bool, require_live_capture?: bool, require_matching_selfie?: bool}&\Stripe\StripeObject&\stdClass), id_number?: (object{}&\Stripe\StripeObject&\stdClass)}&\Stripe\StripeObject&\stdClass) $options
 * @property (object{error: null|(object{code: null|string, reason: null|string}&\Stripe\StripeObject&\stdClass), phone: null|string, status: string}&\Stripe\StripeObject&\stdClass) $phone Result from a phone check
 * @property (object{document: null|string, error: null|(object{code: null|string, reason: null|string}&\Stripe\StripeObject&\stdClass), selfie: null|string, status: string}&\Stripe\StripeObject&\stdClass) $selfie Result from a selfie check
 * @property string $type Type of report.
 * @property null|string $verification_flow The configuration token of a verification flow from the dashboard.
 * @property null|string $verification_session ID of the VerificationSession that created this report.
 */
class VerificationReport extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'identity.verification_report';

    const TYPE_DOCUMENT = 'document';
    const TYPE_ID_NUMBER = 'id_number';
    const TYPE_VERIFICATION_FLOW = 'verification_flow';

    /**
     * List all verification reports.
     *
     * @param null|array{client_reference_id?: string, created?: int|array, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, type?: string, verification_session?: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Identity\VerificationReport> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves an existing VerificationReport.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Identity\VerificationReport
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
