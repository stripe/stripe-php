---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2116
is_breaking: true
is_stripe_api_change: true
released_in_version: 21.3.0-alpha.1
---

* Add support for new resource `V2.Tax.OperationsResolveAddressResult`
* Add support for `resolve_address` method on resource `V2.Tax.OperationsResolveAddressResult`
* Add support for `confirm` and `fx_quote` methods on resource `V2.MoneyManagement.PayoutIntent`
* ⚠️ Add support for new value `partner_disabled` on enums `Account.future_requirements.errors[].code`, `Account.requirements.errors[].code`, `BankAccount.future_requirements.errors[].code`, `BankAccount.requirements.errors[].code`, `Capability.future_requirements.errors[].code`, `Capability.requirements.errors[].code`, `Person.future_requirements.errors[].code`, and `Person.requirements.errors[].code`
* ⚠️ Remove support for values `partner_disabled_dispute_rate`, `partner_disabled_responsibilities`, `partner_disabled_restricted_business`, and `partner_disabled_suspected_fraud` from enums `Account.future_requirements.errors[].code`, `Account.requirements.errors[].code`, `BankAccount.future_requirements.errors[].code`, `BankAccount.requirements.errors[].code`, `Capability.future_requirements.errors[].code`, `Capability.requirements.errors[].code`, `Person.future_requirements.errors[].code`, and `Person.requirements.errors[].code`
* Add support for `customer_update` on `BillingPortal.Session.flow`
* Add support for new value `customer_update` on enum `BillingPortal.Session.flow.type`
* Add support for `funding_source_group` on `Charge.payment_method_details.link`
* ⚠️ Remove support for `pricing_group` on `Charge.payment_method_details.link`
* Add support for new value `celo` on enum `Crypto.CustomerConsumerWallet.network`
* Add support for new value `celo` on enum `Crypto.OnrampSession.transaction_details.destination_network`
* Add support for new value `celo` on enum `Crypto.OnrampSession.transaction_details.destination_networks`
* Add support for `celo` on `Crypto.OnrampSession.transaction_details.wallet_addresses`
* Add support for `customer_portal` on `CustomerSession.components`
* Add support for `applied_to_invoice` and `type` on `CustomerBalanceTransaction.create().$params`
* Add support for `classification_state` and `enrichment_state` on `FinancialConnections.Account`
* Add support for `country` on `FinancialConnections.Session.filters`
* Add support for `classifications` and `enrichments` on `FinancialConnections.Transaction`
* Add support for `customer_balance` on `Invoice` and `QuotePreviewInvoice`
* Add support for `billie` on `Invoice.payment_settings.payment_method_options`, `QuotePreviewInvoice.payment_settings.payment_method_options`, and `Subscription.payment_settings.payment_method_options`
* Add support for new values `billie`, `paypay`, and `vipps` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
* Add support for `hold_amount_details` and `hold_amount` on `Issuing.Authorization.pending_request` and `Issuing.Authorization.request_history[]`
* Add support for new values `hu` and `ro` on enum `Issuing.Cardholder.preferred_locales`
* Add support for `network_decline_code` on `PaymentAttemptRecord.report_failed().$params.payment_method_detail.card` and `PaymentRecord.report_payment_attempt_failed().$params.payment_method_detail.card`
* Add support for `setup_future_usage` on `PaymentIntent.payment_method_options.sequra`
* Add support for `status` on `QuotePreviewSubscriptionSchedule.pause_schedules[].pause`, `QuotePreviewSubscriptionSchedule.pause_schedules[].resume`, `SubscriptionSchedule.pause_schedules[].pause`, and `SubscriptionSchedule.pause_schedules[].resume`
* Change `SubscriptionSchedule.create().$params.pause_schedule.pause` to be optional
* Change type of `SubscriptionSchedule.update().$params.pause_schedule.resume` from `pause_schedule_update_resume_params` to `emptyable(pause_schedule_update_resume_params)`
* Add support for `acquirer` on `EventsV2CoreHealthAuthorizationRateDropFiringEvent.impact.dimensions[]`, `EventsV2CoreHealthAuthorizationRateDropResolvedEvent.impact.dimensions[]`, `V2.Core.Health.Alert.authorization_rate_drop.dimensions[]`, and `V2.Core.Health.AlertHistoryEntry.authorization_rate_drop.dimensions[]`
* ⚠️ Change type of `EventsV2CoreHealthAuthorizationRateDropFiringEvent.impact.dimensions[].type`, `EventsV2CoreHealthAuthorizationRateDropResolvedEvent.impact.dimensions[].type`, `V2.Core.Health.Alert.authorization_rate_drop.dimensions[].type`, and `V2.Core.Health.AlertHistoryEntry.authorization_rate_drop.dimensions[].type` from `literal('issuer')` to `enum('acquirer'|'issuer')`
* Add support for `confirmation_method` on `V2.MoneyManagement.PayoutIntent` and `V2\MoneyManagement\PayoutIntent.create().$params`
* Add support for `estimated_fees` and `fx_quote` on `V2.MoneyManagement.PayoutIntent`
* Add support for `debited` on `V2.MoneyManagement.PayoutIntent.from`
* Add support for `confirm` on `V2.MoneyManagement.PayoutIntent.next_action`
* ⚠️ Change type of `V2.MoneyManagement.PayoutIntent.next_action.type` from `literal('handle_failure')` to `enum('confirm'|'handle_failure')`
* Add support for `credited` on `V2.MoneyManagement.PayoutIntent.to`
* Add support for event notification `V1BalanceSettingsUpdatedEvent` with related object `BalanceSettings`
* Add support for event notification `V1BillingCreditBalanceTransactionCreatedEvent` with related object `Billing.CreditBalanceTransaction`
* Add support for event notifications `V1BillingCreditGrantCreatedEvent` and `V1BillingCreditGrantUpdatedEvent` with related object `Billing.CreditGrant`
* Add support for event notifications `V1BillingMeterCreatedEvent`, `V1BillingMeterDeactivatedEvent`, `V1BillingMeterReactivatedEvent`, and `V1BillingMeterUpdatedEvent` with related object `Billing.Meter`
* Add support for event notifications `V1FinancialConnectionsAccountAccountNumbersUpdatedEvent`, `V1FinancialConnectionsAccountExpectedDeactivationDateUpdatedEvent`, `V1FinancialConnectionsAccountSupportedPaymentMethodTypesUpdatedEvent`, `V1FinancialConnectionsAccountUpcomingAccountNumberExpiryEvent`, and `V1FinancialConnectionsAccountUpcomingDeactivationEvent` with related object `FinancialConnections.Account`
* Add support for event notification `V1InvoicePaymentAttemptRequiredEvent` with related object `Invoice`
* Add support for error type `FxQuoteNeedsRefreshException`
