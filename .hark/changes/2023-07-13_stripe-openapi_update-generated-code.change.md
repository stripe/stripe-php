---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1525
is_stripe_api_change: true
released_in_version: 10.17.0
---

* Add support for new resource `Tax.Settings`
* Add support for `retrieve` and `update` methods on resource `Settings`
* Add support for new value `invalid_tax_location` on enum `StripeError.code`
* Add support for `product` on `Tax.TransactionLineItem`
* Add constant for `tax.settings.updated` webhook event
