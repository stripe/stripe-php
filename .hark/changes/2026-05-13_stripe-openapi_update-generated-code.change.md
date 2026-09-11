---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2067
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.2.0-alpha.5
---

* Add support for new resources `V2.Core.FeeBatch`, `V2.Core.FeeEntry`, `V2.MoneyManagement.DebitDispute`, and `V2.MoneyManagement.FinancialAccountStatement`
* Add support for `simulate_network_lifecycle_pre_arbitration_response` and `simulate_network_lifecycle_pre_arbitration_submission` test helper methods on resource `Issuing.Dispute`
* Add support for `all` method on resource `PaymentLocation`
* Add support for `all` and `retrieve` methods on resources `V2.Core.FeeBatch`, `V2.Core.FeeEntry`, and `V2.MoneyManagement.FinancialAccountStatement`
* Add support for `all`, `create`, and `retrieve` methods on resource `V2.MoneyManagement.DebitDispute`
* Add support for `discounts` on `DelegatedCheckout.RequestedSession`, `DelegatedCheckout\RequestedSession.create().$params`, and `DelegatedCheckout\RequestedSession.update().$params`
* Add support for `amount_sale` on `DelegatedCheckout.RequestedSession.line_item_details[]` and `DelegatedCheckout.RequestedSession.total_details`
* Add support for `amount_discount` and `breakdown` on `DelegatedCheckout.RequestedSession.total_details`
* ⚠️ Remove support for `check_deposit_address` on `Invoice.create().$params.payment_setting.payment_method_option.check_scan`, `Invoice.payment_settings.payment_method_options.check_scan`, `Invoice.update().$params.payment_setting.payment_method_option.check_scan`, `QuotePreviewInvoice.payment_settings.payment_method_options.check_scan`, `Subscription.create().$params.payment_setting.payment_method_option.check_scan`, `Subscription.payment_settings.payment_method_options.check_scan`, and `Subscription.update().$params.payment_setting.payment_method_option.check_scan`
* Add support for `payment_evaluations` on `PaymentAttemptRecord.report_guaranteed().$params`, `PaymentRecord.report_payment().$params.guaranteed`, `PaymentRecord.report_payment_attempt().$params.guaranteed`, and `PaymentRecord.report_payment_attempt_guaranteed().$params`
* Add support for `location` on `PaymentIntent.confirm().$params.payment_detail`, `PaymentIntent.create().$params.payment_detail`, `PaymentIntent.update().$params.payment_detail`, `SetupIntent.confirm().$params.setup_detail`, `SetupIntent.create().$params.setup_detail`, and `SetupIntent.update().$params.setup_detail`
* Add support for `onboarding_data_update_acknowledged` on `PaymentLocation.update().$params`
* Change `PaymentLocation.create().$params.address.country` and `PaymentLocation.update().$params.address.country` to be optional
* Add support for `customer` on `Radar\CustomerEvaluation.update().$params`
* Add support for `status` on `Radar.CustomerEvaluation` and `Radar\CustomerEvaluation.update().$params`
* Change `Radar\CustomerEvaluation.update().$params.type` to be optional
* Add support for `payment_behavior` on `Subscription.resume().$params`
* Add support for `dispute_details` on `V2.MoneyManagement.ReceivedDebit`
* Add support for new value `debit_dispute` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
* Add support for `debit_dispute` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
* Add support for new value `debit_dispute` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
* Add support for `payment_attempt_record` on `EventsV2PaymentsOffSessionPaymentAttemptFailedEvent` and `EventsV2PaymentsOffSessionPaymentFailedEvent`
* Add support for event notifications `V2MoneyManagementFinancialAccountStatementCreatedEvent` and `V2MoneyManagementFinancialAccountStatementRestatedEvent` with related object `V2.MoneyManagement.FinancialAccountStatement`
