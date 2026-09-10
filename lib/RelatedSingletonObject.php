<?php

namespace Stripe;

/**
 * @property string $type the "object" of the related object.
 * @property string $url a relative url to retrieve the related object.
 */
class RelatedSingletonObject
{
    public $type;
    public $url;

    public function __construct($json)
    {
        $this->type = $json['type'];
        $this->url = $json['url'];
    }
}
