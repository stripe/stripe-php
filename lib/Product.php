<?php

namespace Stripe;

/**
 * Store representations of products you sell in <code>Product</code> objects, used
 * in conjunction with <a href="https://stripe.com/docs/api#skus">SKUs</a>.
 * Products may be physical goods, to be shipped, or digital.
 *
 * Documentation on <code>Product</code>s for use with <code>Subscription</code>s
 * can be found at <a
 * href="https://stripe.com/docs/api#service_products">Subscription Products</a>.
 *
 * Related guide: <a
 * href="https://stripe.com/docs/orders#define-products-skus">Define products and
 * SKUs</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the product is currently available for purchase.
 * @property null|string[] $attributes A list of up to 5 attributes that each SKU can provide values for (e.g., <code>[&quot;color&quot;, &quot;size&quot;]</code>).
 * @property null|string $caption A short one-line description of the product, meant to be displayable to the customer. Only applicable to products of <code>type=good</code>.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string[] $deactivate_on An array of connect application identifiers that cannot purchase this product. Only applicable to products of <code>type=good</code>.
 * @property null|string $description The product's description, meant to be displayable to the customer. Use this field to optionally store a long form explanation of the product being sold for your own rendering purposes.
 * @property string[] $images A list of up to 8 URLs of images for this product, meant to be displayable to the customer. Only applicable to products of <code>type=good</code>.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $name The product's name, meant to be displayable to the customer. Whenever this product is sold via a subscription, name will show up on associated invoice line item descriptions.
 * @property null|\Stripe\StripeObject $package_dimensions The dimensions of this product for shipping purposes. A SKU associated with this product can override this value by having its own <code>package_dimensions</code>. Only applicable to products of <code>type=good</code>.
 * @property null|bool $shippable Whether this product is a shipped good. Only applicable to products of <code>type=good</code>.
 * @property null|string $statement_descriptor Extra information about a product which will appear on your customer's credit card statement. In the case that multiple products are billed at once, the first statement descriptor will be used.
 * @property string $type The type of the product. The product is either of type <code>good</code>, which is eligible for use with Orders and SKUs, or <code>service</code>, which is eligible for use with Subscriptions and Plans.
 * @property null|string $unit_label A label that represents units of this product in Stripe and on customers’ receipts and invoices. When set, this will be included in associated invoice line item descriptions.
 * @property int $updated Time at which the object was last updated. Measured in seconds since the Unix epoch.
 * @property null|string $url A URL of a publicly-accessible webpage for this product. Only applicable to products of <code>type=good</code>.
 */
class Product extends ApiResource
{
    const OBJECT_NAME = 'product';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const TYPE_GOOD = 'good';
    const TYPE_SERVICE = 'service';
}
