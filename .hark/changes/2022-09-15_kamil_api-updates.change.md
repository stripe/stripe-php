---
title: API Updates
pr_url: https://github.com/stripe/stripe-php/pull/1365
is_stripe_api_change: true
released_in_version: 9.6.0
---

* Add support for `from_invoice` and `latest_revision` on `Invoice`
* Add support for new value `pix` on enum `PaymentLink.payment_method_types[]`
* Add support for `pix` on `PaymentMethod`
* Add support for new value `pix` on enum `PaymentMethod.type`
* Add support for `created` on `Treasury.CreditReversal` and `Treasury.DebitReversal`
