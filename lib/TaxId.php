<?php

namespace Stripe;

/**
 * Class TaxId
 *
 * @package Stripe
 *
 * @property string $id
 * @property string $object
 * @property string $country
 * @property int $created
 * @property string $customer
 * @property bool $livemode
 * @property string $type
 * @property string $value
 * @property mixed $verification
 */
class TaxId extends ApiResource
{
    const OBJECT_NAME = "tax_id";

    use ApiOperations\Delete;

    /**
     * Possible string representations of a tax id's type.
     * @link https://stripe.com/docs/api/customer_tax_ids/object#tax_id_object-type
     */
    const TYPE_AU_ABN  = 'au_abn';
    const TYPE_CH_VAT  = 'ch_vat';
    const TYPE_EU_VAT  = 'eu_vat';
    const TYPE_IN_GST  = 'in_gst';
    const TYPE_MX_RFC  = 'mx_rfc';
    const TYPE_NO_VAT  = 'no_vat';
    const TYPE_NZ_GST  = 'nz_gst';
    const TYPE_UNKNOWN = 'unknown';
    const TYPE_ZA_VAT  = 'za_vat';

    /**
     * Possible string representations of the verification status.
     * @link https://stripe.com/docs/api/customer_tax_ids/object#tax_id_object-verification
     */
    const VERIFICATION_STATUS_PENDING     = 'pending';
    const VERIFICATION_STATUS_UNAVAILABLE = 'unavailable';
    const VERIFICATION_STATUS_UNVERIFIED  = 'unverified';
    const VERIFICATION_STATUS_VERIFIED    = 'verified';

    /**
     * @return string The API URL for this tax id.
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        $customer = $this['customer'];
        if (!$id) {
            throw new Exception\UnexpectedValueException(
                "Could not determine which URL to request: class instance has invalid ID: $id"
            );
        }
        $id = Util\Util::utf8($id);
        $customer = Util\Util::utf8($customer);

        $base = Customer::classUrl();
        $customerExtn = urlencode($customer);
        $extn = urlencode($id);
        return "$base/$customerExtn/tax_ids/$extn";
    }

    /**
     * @param array|string $_id
     * @param array|string|null $_opts
     *
     * @throws \Stripe\Exception\BadMethodCallException
     */
    public static function retrieve($_id, $_opts = null)
    {
        $msg = "Tax IDs cannot be retrieved without a customer ID. Retrieve " .
               "a tax ID using `Customer::retrieveTaxId('customer_id', " .
               "'tax_id_id')`.";
        throw new Exception\BadMethodCallException($msg);
    }
}
