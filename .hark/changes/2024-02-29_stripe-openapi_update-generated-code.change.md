---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1655
is_stripe_api_change: true
released_in_version: 13.14.0-beta.1
---

* Remove support for resource `Entitlements.Event`
* Change type of `ConfirmationToken.mandate_data` from `nullable(ConfirmationTokensResourceMandateData)` to `ConfirmationTokensResourceMandateData`
* Remove support for `quantity` and `type` on `Entitlements.Feature`
* Add support for `livemode` on `Issuing.PersonalizationDesign`
