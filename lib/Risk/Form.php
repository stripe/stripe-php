<?php

// File generated from our OpenAPI spec

namespace Stripe\Risk;

/**
 * A risk Form represents a request from Stripe for information about a connected account.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{explanation?: string}&\Stripe\StripeObject) $appeal
 * @property null|(object{files?: string[]}&\Stripe\StripeObject) $authorization_documents
 * @property null|int $closed_at Time at which the Form closed, measured in seconds since the Unix epoch.
 * @property null|int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If it exists in a sandbox, the value is <code>false</code>.
 * @property null|int $opened_at Time at which the Form opened, measured in seconds since the Unix epoch.
 * @property null|(object{multi_processor?: (object{files?: (object{file?: string, tag?: string}&\Stripe\StripeObject)[], value?: string}&\Stripe\StripeObject), purpose?: string, stripe_selection_rationale?: string}&\Stripe\StripeObject) $payment_processing
 * @property null|(object{items_removed_at?: int}&\Stripe\StripeObject) $product_removal
 * @property null|(object{attestation?: (object{attested_at?: int, fields?: string[]}&\Stripe\StripeObject)}&\Stripe\StripeObject) $reviewed_fields
 * @property null|(object{source_of_wealth?: (object{description?: string, files?: string[]}&\Stripe\StripeObject)}&\Stripe\StripeObject) $self_funding_context
 * @property string $status The current status of the Form.
 * @property null|(object{fields_to_review?: string[], transactions?: string[]}&\Stripe\StripeObject) $subject
 * @property null|(object{frequency?: string, purpose?: string, purpose_files?: string[], sender_relationship?: string, source_of_funds?: (object{description?: string, files?: string[]}&\Stripe\StripeObject), use_of_funds?: string}&\Stripe\StripeObject) $transaction_context
 * @property string $type The type of information requested by Stripe.
 */
class Form extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'risk.form';

    use \Stripe\ApiOperations\Update;

    const STATUS_CLOSED = 'closed';
    const STATUS_OPEN = 'open';

    const TYPE_APPEAL = 'appeal';
    const TYPE_AUTHORIZATION_DOCUMENTS = 'authorization_documents';
    const TYPE_PAYMENT_PROCESSING = 'payment_processing';
    const TYPE_PRODUCT_REMOVAL = 'product_removal';
    const TYPE_REVIEWED_FIELDS = 'reviewed_fields';
    const TYPE_SELF_FUNDING_CONTEXT = 'self_funding_context';
    const TYPE_TRANSACTION_CONTEXT = 'transaction_context';

    /**
     * Retrieves a risk Form by ID.
     *
     * <h3>Error Codes</h3>
     *
     * | Code | HTTP status | Description | | — | — | — | | <code>form_not_found</code>
     * | 400 | No Form matches the supplied ID. |
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Form
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
     * Updates a risk Form with the connected account’s response.
     *
     * <h3>Error Codes</h3>
     *
     * | Code | HTTP status | Description | | — | — | — | | <code>form_not_found</code>
     * | 400 | No Form matches the supplied ID. | | <code>form_closed</code> | 400 |
     * The Form is closed and cannot accept updates. | |
     * <code>invalid_field_for_form_type</code> | 400 | Submitted fields contain
     * invalid values. | | <code>form_field_already_submitted</code> | 400 | A
     * submitted field has already been submitted. | |
     * <code>form_insufficient_fields</code> | 400 | Required fields are missing for
     * this Form type. | | <code>resource_missing</code> | 404 | A submitted file does
     * not exist or is not accessible to the requesting account. |
     *
     * Validation errors include a summary in <code>message</code>. Missing required
     * properties use <code>form_insufficient_fields</code> and include
     * <code>missing_fields</code>, an array of public dotted paths. Missing required
     * properties take precedence over value violations.
     *
     * Invalid values use <code>invalid_field_for_form_type</code> and include
     * <code>violations</code>. Each violation has a public dotted <code>field</code>
     * path and a <code>reason</code> of <code>missing_value</code> or
     * <code>invalid_value</code>. Reviewed-field violations include a corrective
     * <code>message</code>; corrective messages for other Form types are omitted. For
     * an array member, <code>target</code> identifies the member’s field path. For a
     * scalar value, <code>target</code> is explicitly null.
     *
     * For example, a reviewed-fields submission with an out-of-date timestamp and an
     * omitted requested member returns both violations:
     *
     * <code>json {  "error": {  "type": "invalid_request_error",  "code":
     * "invalid_field_for_form_type",  "message": "Submitted fields are invalid for
     * Form type reviewed_fields. See violations for details and corrective actions for
     * these fields: ’reviewed_fields.attestation.attested_at’,
     * ’reviewed_fields.attestation.fields’.",  "violations": [  {  "field":
     * "reviewed_fields.attestation.attested_at",  "reason": "invalid_value",
     * "message": "The attestation timestamp is out of date. Review and attest the
     * requested information again, then provide the new attestation timestamp.",
     * "target": null  },  {  "field": "reviewed_fields.attestation.fields",  "reason":
     * "missing_value",  "message": "’defaults.profile.product_description’ is required
     * by subject.fields_to_review but is missing from
     * reviewed_fields.attestation.fields. Review this information, then include its
     * path in the attestation.",  "target": "defaults.profile.product_description"  }
     * ]  } } </code>
     *
     * A v1 request with no extracted field submissions is rejected before the Form is
     * loaded, including for reviewed-fields Forms. This early error uses
     * <code>form_insufficient_fields</code> and omits <code>missing_fields</code>,
     * <code>violations</code>, and <code>param</code>. Partially populated
     * reviewed-fields requests use structured missing-property validation.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{appeal?: array{explanation: string}, authorization_documents?: array{files: string[]}, expand?: string[], payment_processing?: array{multi_processor?: array{files?: array{file: string, tag?: string}[], value?: string}, purpose?: string, stripe_selection_rationale?: string}, product_removal?: array{items_removed_at: int}, reviewed_fields?: array{attestation: array{attested_at?: int, fields?: string[]}}, self_funding_context?: array{source_of_wealth?: array{description?: string, files?: string[]}}, transaction_context?: array{frequency?: string, purpose?: string, purpose_files?: string[], sender_relationship?: string, source_of_funds?: array{description?: string, files?: string[]}, use_of_funds?: string}} $params
     * @param null|array|string $opts
     *
     * @return Form the updated resource
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
}
