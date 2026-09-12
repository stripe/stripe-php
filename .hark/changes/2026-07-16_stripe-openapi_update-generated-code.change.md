---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/2096
is_breaking: true
is_stripe_api_change: true
released_in_version: 21.1.0-alpha.1
---

* ⚠️ Remove support for resource `FrMealVouchersOnboarding`
* ⚠️ Remove support for `all`, `create`, `retrieve`, and `update` methods on resource `FrMealVouchersOnboarding`
* Add support for `create` method on resource `PaymentRecord`
* Add support for new value `chaps` on enums `FundingInstructions.bank_transfer.financial_addresses[].supported_networks` and `PaymentIntent.next_action.display_bank_transfer_instructions.financial_addresses[].supported_networks`
* ⚠️ Remove support for `financial_accounts_transactions`, `financial_accounts`, and `recipients_list` on `AccountSession.create().$params.component`
* Add support for `smart_disputes_management` on `AccountSession.components.disputes_list.features`, `AccountSession.components.payment_details.features`, `AccountSession.components.payment_disputes.features`, and `AccountSession.components.payments.features`
* Add support for new value `ic_nif` on enums `Checkout.Session.collected_information.tax_id.type`, `Checkout.Session.customer_details.tax_ids[].type`, `Invoice.customer_tax_ids[].type`, `Order.tax_details.tax_ids[].type`, `QuotePreviewInvoice.customer_tax_ids[].type`, `Tax.Calculation.customer_details.tax_ids[].type`, and `Tax.Transaction.customer_details.tax_ids[].type`
* Add support for new values `financial_connections.account.expected_deactivation_date_updated`, `financial_connections.account.supported_payment_method_types_updated`, `financial_connections.account.upcoming_deactivation`, `financial_connections.authorization.expected_deactivation_date_updated`, and `financial_connections.authorization.upcoming_deactivation` on enum `Event.type`
* Add support for `mode` on `FinancialConnections.Session.manual_entry`
* Add support for new values `alipay` and `sequra` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
* Add support for new value `stripe_internal_error` on enum `Issuing.Authorization.request_history[].reason`
* Add support for `business_name` on `Issuing.Card.shipping`
* Add support for new value `correos` on enum `Issuing.Card.shipping.carrier`
* ⚠️ Change type of `Issuing.Transaction.network_data.trace_id` from `IssuingTransactionTraceId` to `nullable(IssuingTransactionTraceId)`
* Add support for `pause_schedules` on `QuotePreviewSubscriptionSchedule`, `SubscriptionSchedule.create().$params`, `SubscriptionSchedule.update().$params`, and `SubscriptionSchedule`
* Add support for `trial` on `QuotePreviewSubscriptionSchedule.phases[]` and `SubscriptionSchedule.phases[]`
* Add support for `payment_record` on `Refund.create().$params`
* Add support for `redirect_to_url` on `SharedPayment.IssuedToken.next_action`
* ⚠️ Change type of `SharedPayment.IssuedToken.next_action.type` from `literal('use_stripe_sdk')` to `enum('redirect_to_url'|'use_stripe_sdk')`
* Add support for snapshot events `FINANCIAL_CONNECTIONS_ACCOUNT_EXPECTED_DEACTIVATION_DATE_UPDATED`, `FINANCIAL_CONNECTIONS_ACCOUNT_SUPPORTED_PAYMENT_METHOD_TYPES_UPDATED`, and `FINANCIAL_CONNECTIONS_ACCOUNT_UPCOMING_DEACTIVATION` with resource `FinancialConnections.Account`
* Add support for snapshot events `FINANCIAL_CONNECTIONS_AUTHORIZATION_EXPECTED_DEACTIVATION_DATE_UPDATED` and `FINANCIAL_CONNECTIONS_AUTHORIZATION_UPCOMING_DEACTIVATION` with resource `FinancialConnections.Authorization`
