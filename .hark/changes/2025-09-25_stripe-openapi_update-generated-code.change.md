---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1914
is_stripe_api_change: true
released_in_version: 18.1.0-beta.1
---

* Add support for `attach_cadence` method on resource `Subscription`
* Add support for `billing_cadence` on `Invoice.create_preview().$params`, `Subscription.create().$params`, `Subscription.update().$params`, and `Subscription`
* Add support for `billing_cadence_details` on `Invoice.parent` and `QuotePreviewInvoice.parent`
* Add support for new value `billing_cadence_details` on enums `Invoice.parent.type` and `QuotePreviewInvoice.parent.type`
