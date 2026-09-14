---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1661
is_stripe_api_change: true
released_in_version: 13.16.0-beta.1
---

* Add support for new resources `Entitlements.ActiveEntitlementSummary` and `Entitlements.ActiveEntitlement`
* Add support for `all` method on resource `ActiveEntitlement`
* Add support for `use_stripe_sdk` on `ConfirmationToken`
* Remove support for `payment_method` on `ConfirmationToken`
* Change type of `ConfirmationToken.mandate_data` from `ConfirmationTokensResourceMandateData` to `nullable(ConfirmationTokensResourceMandateData)`
* Add support for `active` and `metadata` on `Entitlements.Feature`
* Add support for new value `entitlements.active_entitlement_summary.updated` on enum `Event.type`
* Remove support for value `customer.entitlement_summary.updated` from enum `Event.type`
