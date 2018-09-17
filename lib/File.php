<?php

namespace Stripe;

/**
 * Class File
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property string $filename
 * @property string $purpose
 * @property int $size
 * @property string $type
 * @property string $url
 *
 * @package Stripe
 */
class File extends ApiResource
{
    // This resource can have two different object names. In latter API
    // versions, only `file` is used, but since stripe-php may be used with
    // any API version, we need to support deserializing the older
    // `file_upload` object into the same class.
    const OBJECT_NAME = "file";
    const OBJECT_NAME_ALT = "file_upload";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;

    public static function baseUrl()
    {
        return Stripe::$apiUploadBase;
    }

    public static function classUrl()
    {
        return '/v1/files';
    }
}

// For backwards compatibility, the `File` class is aliased to `FileUpload`.
class_alias('Stripe\\File', 'Stripe\\FileUpload');
