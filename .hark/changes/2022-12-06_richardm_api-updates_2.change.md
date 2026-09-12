---
title: API Updates
pr_url: https://github.com/stripe/stripe-php/pull/1404
is_stripe_api_change: true
released_in_version: 10.1.0
---

* Remove support for resources `Order` and `Sku`
* Remove support for `all`, `cancel`, `create`, `list_line_items`, `reopen`, `retrieve`, `submit`, and `update` methods on resource `Order`
* Remove support for `all`, `create`, `delete`, `retrieve`, and `update` methods on resource `Sku`
* Add support for `custom_text` on `Checkout.Session` and `PaymentLink`
* Add support for `invoice_creation` and `invoice` on `Checkout.Session`
* Remove support for `product` on `LineItem`
* Add support for `latest_charge` on `PaymentIntent`
* Remove support for `charges` on `PaymentIntent`
