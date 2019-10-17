<?php

namespace Stripe\Services;

class CoreServices extends ServiceNamespace
{
    public function getServiceClass($name)
    {
        switch ($name) {
            case 'coupons':
                return CouponService::class;
            case 'files':
                return FileService::class;
            case 'issuing':
                return Issuing\IssuingServices::class;
            case 'paymentSources':
                return PaymentSourceService::class;
        }

        return null;
    }
}
