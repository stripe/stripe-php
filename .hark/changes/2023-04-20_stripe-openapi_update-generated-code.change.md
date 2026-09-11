---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1480
is_stripe_api_change: true
released_in_version: 10.13.0
---

* Change type of `Identity.VerificationSession.options` from `VerificationSessionOptions` to `nullable(VerificationSessionOptions)`
* Change type of `Identity.VerificationSession.type` from `enum('document'|'id_number')` to `nullable(enum('document'|'id_number'))`
