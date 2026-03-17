<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A product_feature represents an attachment between a feature and a product.
 * When a product is purchased that has a feature attached, Stripe will create an entitlement to the feature for the purchasing customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property Entitlements\Feature $entitlement_feature A feature represents a monetizable ability or functionality in your system. Features can be assigned to products, and when those products are purchased, Stripe will create an entitlement to the feature for the purchasing customer.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 */
class ProductFeature extends ApiResource
{
    const OBJECT_NAME = 'product_feature';
}
