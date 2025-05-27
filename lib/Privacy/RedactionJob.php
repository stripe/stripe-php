<?php

// File generated from our OpenAPI spec

namespace Stripe\Privacy;

/**
 * The Redaction Job object redacts Stripe objects. You can use it
 * to coordinate the removal of personal information from selected
 * objects, making them permanently inaccessible in the Stripe Dashboard
 * and API.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{charges: null|string[], checkout_sessions: null|string[], customers: null|string[], identity_verification_sessions: null|string[], invoices: null|string[], issuing_cardholders: null|string[], payment_intents: null|string[], radar_value_list_items: null|string[], setup_intents: null|string[]}&\Stripe\StripeObject) $objects The objects to redact in this job.
 * @property string $status The status of the job.
 * @property null|string $validation_behavior Validation behavior determines how a job validates objects for redaction eligibility. Default is <code>error</code>.
 */
class RedactionJob extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'privacy.redaction_job';

    use \Stripe\ApiOperations\NestedResource;
    use \Stripe\ApiOperations\Update;

    const STATUS_CANCELED = 'canceled';
    const STATUS_CANCELING = 'canceling';
    const STATUS_CREATED = 'created';
    const STATUS_FAILED = 'failed';
    const STATUS_READY = 'ready';
    const STATUS_REDACTING = 'redacting';
    const STATUS_SUCCEEDED = 'succeeded';
    const STATUS_VALIDATING = 'validating';

    const VALIDATION_BEHAVIOR_ERROR = 'error';
    const VALIDATION_BEHAVIOR_FIX = 'fix';

    /**
     * Creates a redaction job. When a job is created, it will start to validate.
     *
     * @param null|array{expand?: string[], objects: array{charges?: string[], checkout_sessions?: string[], customers?: string[], identity_verification_sessions?: string[], invoices?: string[], issuing_cardholders?: string[], issuing_cards?: string[], payment_intents?: string[], radar_value_list_items?: string[], setup_intents?: string[]}, validation_behavior?: string} $params
     * @param null|array|string $options
     *
     * @return RedactionJob the created resource
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
     * Returns a list of redaction jobs.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<RedactionJob> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a previously created redaction job.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return RedactionJob
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
     * Updates the properties of a redaction job without running or canceling the job.
     *
     * If the job to update is in a <code>failed</code> status, it will not
     * automatically start to validate. Once you applied all of the changes, use the
     * validate API to start validation again.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], validation_behavior?: string} $params
     * @param null|array|string $opts
     *
     * @return RedactionJob the updated resource
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
     * @return RedactionJob the canceled redaction job
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
     * @return RedactionJob the runed redaction job
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function run($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/run';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return RedactionJob the validated redaction job
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function validate($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/validate';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    const PATH_VALIDATION_ERRORS = '/validation_errors';

    /**
     * @param string $id the ID of the redaction job on which to retrieve the redaction job validation errors
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<RedactionJobValidationError> the list of redaction job validation errors
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function allValidationErrors($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_VALIDATION_ERRORS, $params, $opts);
    }
}
