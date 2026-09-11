---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2130
is_breaking: true
is_stripe_api_change: true
released_in_version: 21.4.0-alpha.1
---

* Add support for new resource `CustomerTaxExemption`
* Add support for `all`, `create`, `delete`, and `retrieve` methods on resource `CustomerTaxExemption`
* Add support for `details` on `Account.future_requirements.errors[]`, `Account.requirements.errors[]`, `BankAccount.future_requirements.errors[]`, `BankAccount.requirements.errors[]`, `Capability.future_requirements.errors[]`, `Capability.requirements.errors[]`, `Person.future_requirements.errors[]`, and `Person.requirements.errors[]`
* ⚠️ Remove support for `sequra_payments` on `Account.capabilities`
* Add support for `subscription_pause` on `BillingPortal\Session.create().$params.flow_datum`
* ⚠️ Remove support for `sequra` on `Charge.payment_method_details`, `Checkout.Session.payment_method_options`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.payment_method_options`, and `PaymentRecord.payment_method_details`
* Add support for `enablement_details` on `Checkout.Session.automatic_tax`
* ⚠️ Remove support for value `sequra` from enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Add support for `credit` on `FinancialConnections.Transaction.classifications[]`
* Change type of `FinancialConnections.Transaction.classifications[].money_movement` from `nullable(BankConnectionsResourceTransactionResourceClassificationsLabels)` to `BankConnectionsResourceTransactionResourceClassificationsLabels`
* Change type of `FinancialConnections.Transaction.classifications[].personal_finance` from `nullable(BankConnectionsResourceTransactionResourceClassificationsLabels)` to `BankConnectionsResourceTransactionResourceClassificationsLabels`
* ⚠️ Change `FinancialConnections.Transaction.classifications[].money_movement` to be optional
* ⚠️ Change `FinancialConnections.Transaction.classifications[].personal_finance` to be optional
* Add support for `user_consent` on `Identity\VerificationSession.create().$params` and `Identity\VerificationSession.update().$params`
* Add support for `company_details` on `Invoice.payment_settings.payment_method_options.billie`, `PaymentIntent.confirm().$params.payment_method_option.billie`, `PaymentIntent.create().$params.payment_method_option.billie`, `PaymentIntent.payment_method_options.billie`, `PaymentIntent.update().$params.payment_method_option.billie`, `QuotePreviewInvoice.payment_settings.payment_method_options.billie`, and `Subscription.payment_settings.payment_method_options.billie`
* Add support for `reference` on `Invoice.payment_settings.payment_method_options.billie`, `PaymentIntent.confirm().$params.payment_method_option.billie`, `PaymentIntent.create().$params.payment_method_option.billie`, `PaymentIntent.payment_method_options.billie`, `PaymentIntent.update().$params.payment_method_option.billie`, and `QuotePreviewInvoice.payment_settings.payment_method_options.billie`
* Add support for `pos_condition` on `Issuing.Authorization` and `Issuing\Authorization.create().$params`
* Add support for `crypto_wallet` on `Issuing.Card`, `Issuing\Card.create().$params`, and `Issuing\Card.update().$params`
* Add support for `payment_evaluations` and `payment_method_details` on `PaymentAttemptRecord.report_authorized().$params`
* Add support for `aade_data` on `PaymentIntent.confirm().$params.payment_method_option.card_present`, `PaymentIntent.create().$params.payment_method_option.card_present`, and `PaymentIntent.update().$params.payment_method_option.card_present`
* ⚠️ Remove support for `cancel_at_period_end` on `Subscription.pending_update`
* Add support for `blik_recurring_payments` on `V2.Core.Account.configuration.merchant.capabilities`, `V2\Core\Account.create().$params.configuration.merchant.capability`, and `V2\Core\Account.update().$params.configuration.merchant.capability`
* Add support for `user_access` on `V2.Iam.ActivityLog.details`
* Add support for new value `user_access` on enum `V2.Iam.ActivityLog.details.type`
* Add support for new value `user_access_started` on enum `V2.Iam.ActivityLog.type`
* Add support for new value `blik_recurring_payments` on enum `EventsV2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent.updated_capability`
