<?php

namespace Stripe;

/**
 * Class FileUpload
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property string $purpose
 * @property int $size
 * @property string $type
 *
 * @package Stripe
 */
class FileUpload extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;

    const OBJECT_NAME = "file_upload";

    public static function baseUrl()
    {
        return Stripe::$apiUploadBase;
    }

    public static function className()
    {
        return 'file';
    }
}
