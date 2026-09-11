---
title: Deserialize into correct v2 EventData types
pr_link: https://github.com/stripe/stripe-php/pull/1775
released_in_version: 16.1.1
---

* Fixes a bug where v2 EventData was not being deserialized into the appropriate type for `V1BillingMeterErrorReportTriggeredEvent` and `V1BillingMeterNoMeterFoundEvent`
