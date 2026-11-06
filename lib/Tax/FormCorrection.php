<?php

// File generated from our OpenAPI spec

namespace Stripe\Tax;

/**
 * Corrections to filed tax forms.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{correction_type?: string, form?: string}&\Stripe\StripeObject)[] $correction_forms The tax forms created by the correction.
 * @property null|string $original_form The original tax form that was corrected.
 */
class FormCorrection extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'tax.form_correction';
}
