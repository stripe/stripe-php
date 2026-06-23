<?php

namespace Stripe;

/**
 * @property string $id Unique identifier for the event.
 * @property string $type the "object" of the related object.
 * @property string $url a relative url to retrieve the related object.
 */
class RelatedObject
{
    public $id;
    public $type;
    public $url;

    public function __construct($json)
    {
        $this->id = $json['id'];
        $this->type = $json['type'];
        $this->url = $json['url'];
    }
}
