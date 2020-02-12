<?php

namespace Stripe;

/**
 * Class ApplicationFeeRefund.
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property string $balance_transaction
 * @property int $created
 * @property string $currency
 * @property string $fee
 * @property \Stripe\StripeObject $metadata
 */
class ApplicationFeeRefund extends ApiResource
{
    const OBJECT_NAME = 'fee_refund';

    use ApiOperations\Update {
        save as protected _save;
    }

    /**
     * @return string the API URL for this Stripe refund
     */
    public function instanceUrl()
    {
        $id = $this['id'];
        $fee = $this['fee'];
        if (!$id) {
            throw new Exception\UnexpectedValueException(
                'Could not determine which URL to request: ' .
                "class instance has invalid ID: {$id}",
                null
            );
        }
        $id = Util\Util::utf8($id);
        $fee = Util\Util::utf8($fee);

        $base = ApplicationFee::classUrl();
        $feeExtn = \urlencode($fee);
        $extn = \urlencode($id);

        return "{$base}/{$feeExtn}/refunds/{$extn}";
    }

    /**
     * @param null|array|string $opts
     *
     * @return ApplicationFeeRefund the saved refund
     */
    public function save($opts = null)
    {
        return $this->_save($opts);
    }
}
