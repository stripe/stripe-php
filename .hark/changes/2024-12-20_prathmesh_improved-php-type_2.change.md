---
title: Improved php type hints
pr_link: https://github.com/stripe/stripe-php/pull/1794
released_in_version: 16.5.0-beta.1
---

### Adds Create/Update/Retrieve/Delete/All/Search parameters

You will now be able to get type hints of the keys that can passed without switching out of your IDE. Eg.
```php
* @param null|array{customer:string, components: array} $params
```

<img width="417" alt="PHPStorm IDE with array type hints" src="https://github.com/user-attachments/assets/e914dcda-354f-4df2-b82e-217ad931e71d">

### Updated StripeObject class properties
We changed the type of class properties from `StripeObject` to something more specific.

For example: Invoice settings was defined as a StripeObject in Customer resource.

https://github.com/stripe/stripe-php/blob/bae10cd799404f0f4862ec03810c5ff8ca634b30/lib/Customer.php#L25

Now you will be able to reference `custom_fields` and `rendering_options` on `customer->invoice_settings` without PHPStan complaining.
```php
* @property object{custom_fields: null|object{name: string, value: string}&\Stripe\StripeObject&\stdClass[], default_payment_method: null|string|\Stripe\PaymentMethod, footer: null|string, rendering_options: null|object{amount_tax_display: null|string, template: null|string}&\Stripe\StripeObject&\stdClass}&\Stripe\StripeObject&\stdClass $invoice_settings
 */
```
