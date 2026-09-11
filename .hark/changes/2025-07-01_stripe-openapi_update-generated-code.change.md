---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1876
is_stripe_api_change: true
released_in_version: 17.5.0-beta.1
---

* Change type of `Quote.subscription_data.billing_mode` from `enum('classic'|'flexible')` to `QuotesResourceSubscriptionDataBillingMode`
* Add support for new value `crypto` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
* Change type of `QuotePreviewSubscriptionSchedule.billing_mode`, `Subscription.billing_mode`, and `SubscriptionSchedule.billing_mode` from `enum('classic'|'flexible')` to `SubscriptionsResourceBillingMode`
* Remove support for `billing_mode_details` on `Subscription`
* Add support for new value `xx` on enums `V2.Core.Account.identity.country`, `V2.Core.Person.additional_addresses[].country`, `V2.Core.Person.address.country`, and `V2.MoneyManagement.FinancialAccount.country`
* Add support for new value `xx` on enum `V2.Core.Person.nationalities`
* Add support for `metadata` on `V2.MoneyManagement.FinancialAccount`
* Remove support for `description` on `V2.MoneyManagement.FinancialAccount`
* Add support for new value `pending` on enum `V2.MoneyManagement.FinancialAccount.status`
* Remove support for `attempts` on `V2.Payments.OffSessionPayment`
* Change type of `V2.Payments.OffSessionPayment.transfer_data.amount` from `integer` to `nullable(integer)`
* Change type of `V2.MoneyManagement.ReceivedCredit.balance_transfer.type` from `literal('payout_v1')` to `enum('outbound_payment'|'outbound_transfer'|'payout_v1')`
* Change type of `V2.MoneyManagement.ReceivedCredit.balance_transfer.payout_v1` from `string` to `nullable(string)`
