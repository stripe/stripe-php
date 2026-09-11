---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/1939
is_stripe_api_change: true
released_in_version: 18.1.0-alpha.3
---

* Add support for new resources `DelegatedCheckout.RequestedSession` and `Identity.BlocklistEntry`
* Add support for `confirm`, `create`, `expire`, `retrieve`, and `update` methods on resource `DelegatedCheckout.RequestedSession`
* Add support for `all`, `create`, `disable`, and `retrieve` methods on resource `Identity.BlocklistEntry`
* Add support for `blocked_by_entry` on `Identity.VerificationReport.document`, `Identity.VerificationReport.selfie`, and `Identity\VerificationReport.all().$params`
