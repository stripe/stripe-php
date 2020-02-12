<?php

namespace Stripe;

/**
 * Class TransferReversal.
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string $balance_transaction
 * @property int $created
 * @property string $currency
 * @property string $destination_payment_refund
 * @property \Stripe\StripeObject $metadata
 * @property string $source_refund
 * @property string $transfer
 */
class TransferReversal extends ApiResource
{
    const OBJECT_NAME = 'transfer_reversal';

    use ApiOperations\Update {
        save as protected _save;
    }

    /**
     * @return string the API URL for this Stripe transfer reversal
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        $transfer = $this['transfer'];
        if (!$id) {
            throw new Exception\UnexpectedValueException(
                'Could not determine which URL to request: ' .
                "class instance has invalid ID: {$id}",
                null
            );
        }
        $id = Util\Util::utf8($id);
        $transfer = Util\Util::utf8($transfer);

        $base = Transfer::classUrl();
        $transferExtn = \urlencode($transfer);
        $extn = \urlencode($id);

        return "{$base}/{$transferExtn}/reversals/{$extn}";
    }

    /**
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return TransferReversal the saved reversal
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }
}
