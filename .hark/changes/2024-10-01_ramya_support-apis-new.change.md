---
title: Support for APIs in the new API version 2024-09-30.acacia
pr_link: https://github.com/stripe/stripe-php/pull/1756
is_stripe_api_change: true
released_in_version: 16.0.0
---

This release changes the pinned API version to `2024-09-30.acacia`. Please read the [API Changelog](https://docs.stripe.com/changelog/acacia#2024-09-30.acacia) and carefully review the API changes before upgrading.

### ⚠️ Breaking changes

* Rename `usage_threshold_config` to `usage_threshold` on `Billing.Alert`
* Remove support for `filter` on `Billing.Alert`. Use the filters on the `usage_threshold` instead


### Additions

* Add support for new value `international_transaction` on enum `Treasury.ReceivedCredit.failure_code`
* Add support for new Usage Billing APIs `Billing.MeterEvent`, `Billing.MeterEventAdjustments`, `Billing.MeterEventSession`, `Billing.MeterEventStream` and the new Events API `Core.Events` under the [v2 namespace ](https://docs.corp.stripe.com/api-v2-overview)
* Add new method `parseThinEvent()` on the `StripeClient` class to parse [thin events](https://docs.corp.stripe.com/event-destinations#events-overview).
* Add a new method [rawRequest()](https://github.com/stripe/stripe-node/tree/master?tab=readme-ov-file#custom-requests) on the `StripeClient` class that takes a HTTP method type, url and relevant parameters to make requests to the Stripe API that are not yet supported in the SDK.
