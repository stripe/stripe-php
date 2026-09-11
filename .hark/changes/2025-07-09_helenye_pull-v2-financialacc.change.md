---
title: Pull in V2 FinancialAccount changes for June release
pr_link: https://github.com/stripe/stripe-php/pull/1886
is_stripe_api_change: true
released_in_version: 17.5.0-beta.2
---

* Add support for `close` and `create` methods on resource `V2.MoneyManagement.FinancialAccount`
* Add support for new value `storer` on enum `V2.Core.Account.applied_configurations`
* Add support for `status_details` on `V2.MoneyManagement.FinancialAccount`
* Add support for thin events `V2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationStorerUpdatedEvent` with related object `V2.Core.Account`
* Add support for error types `AlreadyExistsException` and `NonZeroBalanceException`
