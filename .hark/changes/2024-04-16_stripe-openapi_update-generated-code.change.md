---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1680
is_stripe_api_change: true
released_in_version: 14.2.0
---

* Add support for new resource `Entitlements.ActiveEntitlementSummary`
* Add support for new value `entitlements.active_entitlement_summary.updated` on enum `Event.type`
* Remove support for `config` on `Forwarding.Request`. This field is no longer used by the Forwarding Request API.
* Add support for `swish` on `PaymentMethodConfiguration`
