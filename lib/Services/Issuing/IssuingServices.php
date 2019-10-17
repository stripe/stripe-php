<?php

namespace Stripe\Services\Issuing;

class IssuingServices extends \Stripe\Services\ServiceNamespace
{
    public function getServiceClass($name)
    {
        switch ($name) {
            case 'cards':
                return CardService::class;
        }

        return null;
    }
}
