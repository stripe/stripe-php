---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1864
is_stripe_api_change: true
released_in_version: 17.4.0-beta.1
---

### Breaking changes
* Remove support for deprecated previews
  * Remove support for resources `Billing.MeterErrorReport`, `GiftCards.Card`, `GiftCards.Transaction`, and `Privacy.RedactionJobRootObjects`
  * Remove support for `all`, `create`, `retrieve`, `update`, and `validate` methods on resource `GiftCards.Card`
  * Remove support for `all`, `cancel`, `confirm`, `create`, `retrieve`, and `update` methods on resource `GiftCards.Transaction`
  * Remove support for `provisioning` on `Product`
  * Remove support for snapshot event `BILLING_METER_ERROR_REPORT_TRIGGERED` with resource `Billing.MeterErrorReport`
  * Remove support for error codes `gift_card_balance_insufficient`, `gift_card_code_exists`, and `gift_card_inactive` on `QuotePreviewInvoice.last_finalization_error`
* Remove support for `amount_remaining` and `credits` on `Order`
* Change type of `PaymentAttemptRecord.metadata` and `PaymentRecord.metadata` from `nullable(map(string: string))` to `map(string: string)`
* Remove support for `async_workflows` on `PaymentIntent`
* Change type of `Privacy.RedactionJob.objects` from `$Privacy.RedactionJobRootObjects` to `RedactionResourceRootObjects`
* Change type of `Privacy.RedactionJob.status` from `string` to `enum`
* Change type of `Privacy.RedactionJob.validation_behavior` from `string` to `enum('error'|'fix')`
* Change type of `Privacy.RedactionJobValidationError.code` from `string` to `enum`
* Change type of `Privacy.RedactionJobValidationError.erroring_object` from `map(string: string)` to `RedactionResourceErroringObject`
* Remove support for values `credits_attributed_to_debits` and `legacy_prorations` from enums `Quote.subscription_data.billing_mode`, `QuotePreviewSubscriptionSchedule.billing_mode`, `Subscription.billing_mode`, and `SubscriptionSchedule.billing_mode`
* Remove support for `status_details` and `status` on `Tax.Association`

### Other changes
* Add support for `migrate` method on resource `Subscription`
* Add support for `institution` on `FinancialConnections.Account`
* Add support for `countries` on `FinancialConnections.Institution`
* Add support for `hooks` on `PaymentIntent`
* Add support for `livemode` on `Privacy.RedactionJob`
* Add support for new values `classic` and `flexible` on enums `Quote.subscription_data.billing_mode`, `QuotePreviewSubscriptionSchedule.billing_mode`, `Subscription.billing_mode`, and `SubscriptionSchedule.billing_mode`
* Add support for `billing_mode_details` on `Subscription`
* Add support for `tax_transaction_attempts` on `Tax.Association`
* Add support for error code `forwarding_api_upstream_error` on `QuotePreviewInvoice.last_finalization_error`
