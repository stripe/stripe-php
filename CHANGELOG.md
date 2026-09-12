<!--
THIS IS A GENERATED FILE. Any changes you make to it directly will be blown away.
Instead, edit a corresponding `.change.md` file and run `hark build`.
-->

# Changelog

> This changelog only covers the **private preview** releases. Each release builds on the most recent GA release; see those notes in [the GA changelog](https://github.com/stripe/stripe-php/blob/master/CHANGELOG.md).

## 21.4.0-alpha.3 - 2026-09-09
* [#2141](https://github.com/stripe/stripe-php/pull/2141) Update generated code for private-preview
  * Add support for `customer_tax_exemption` on `Tax.Calculation.shipping_cost.tax_breakdown[]`, `Tax.CalculationLineItem.tax_breakdown[]`, and `Tax.Transaction.shipping_cost.tax_breakdown[]`
  * Add support for new value `data_share_only` on enums `Charge.payment_method_details.card.three_d_secure.result`, `PaymentAttemptRecord.payment_method_details.card.three_d_secure.result`, `PaymentRecord.payment_method_details.card.three_d_secure.result`, and `SetupAttempt.payment_method_details.card.three_d_secure.result`
  * Add support for `backdate_start_date` on `Checkout.Session.items[].subscription` and `Checkout\Session.create().$params.item.subscription`
  * Add support for `signals` on `Identity.VerificationReport`
  * Add support for `network_response_code` on `Issuing.Authorization.request_history[]`
  * Add support for `unit_cost_precision` on `PaymentIntent.capture().$params.amount_detail.line_item`, `PaymentIntent.confirm().$params.amount_detail.line_item`, `PaymentIntent.create().$params.amount_detail.line_item`, `PaymentIntent.decrement_authorization().$params.amount_detail.line_item`, `PaymentIntent.increment_authorization().$params.amount_detail.line_item`, `PaymentIntent.update().$params.amount_detail.line_item`, and `PaymentIntentAmountDetailsLineItem`
  * Change `PaymentIntent.payment_record` to be required
  * Add support for `active` on `ProductCatalog\TrialOffer.all().$params`
  * Change `Subscription.trial_settings.end_behavior.billing_cycle_anchor` to be required
  * Add support for new value `rtp` on enum `Treasury.FinancialAccount.financial_addresses[].supported_networks`
  * Add support for new value `blik_recurring_payments` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`

## 21.4.0-alpha.2 - 2026-09-02
* ⚠️ [#2135](https://github.com/stripe/stripe-php/pull/2135) Update generated code for private-preview
  * Add support for new resources `Radar.BillingEvaluation`, `V2.Signals.PaymentRetryEvaluation`, `V2.Signals.PaymentRetrySignal`, and `V2.Tax.IntegrationConfiguration`
  * Add support for `create` method on resource `Radar.BillingEvaluation`
  * Add support for `all`, `create`, `deactivate`, `retrieve`, and `update` methods on resource `Billing.FeedbackOption`
  * Add support for `retrieve` and `update` methods on resource `V2.Tax.IntegrationConfiguration`
  * Add support for `retrieve` method on resource `V2.Signals.PaymentRetrySignal`
  * Add support for `cancel`, `create`, `retrieve`, and `update` methods on resource `V2.Signals.PaymentRetryEvaluation`
  * Add support for `disable` method on resource `V2.MoneyManagement.PayoutMethod`
  * Add support for `update` method on resource `V2.Core.ApprovalRequest`
  * ⚠️ Remove support for `execute` and `submit` methods on resource `V2.Core.ApprovalRequest`
  * Add support for `disable_stripe_user_authentication` on `AccountSession.create().$params.component.payment_method_setting.feature`
  * Add support for `capital_financing_manual_payment` on `AccountSession.components`
  * Add support for `sequra_payments` on `Account.capabilities`
  * Add support for `feedback_options` on `BillingPortal\Configuration.create().$params.feature.subscription_cancel.cancellation_reason` and `BillingPortal\Configuration.update().$params.feature.subscription_cancel.cancellation_reason`
  * Add support for new value `fundbox_ca_financing` on enum `Capital.FinancingSummary.details.disclaimer_variant`
  * Add support for `sequra` on `Charge.payment_method_details`, `Checkout.Session.payment_method_options`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.payment_method_options`, and `PaymentRecord.payment_method_details`
  * ⚠️ Remove support for value `data_share_only` from enums `Charge.payment_method_details.card.three_d_secure.result`, `PaymentAttemptRecord.payment_method_details.card.three_d_secure.result`, `PaymentRecord.payment_method_details.card.three_d_secure.result`, and `SetupAttempt.payment_method_details.card.three_d_secure.result`
  * Add support for `funding_types_blocked` on `Checkout\Session.create().$params.payment_method_option.card.restriction`
  * Add support for `payment_intent_data` on `Checkout\Session.update().$params`
  * ⚠️ Change type of `Checkout.Session.payment_method_options.bancontact.setup_future_usage` from `literal('none')` to `enum('none'|'off_session')`
  * Add support for `metadata` on `ConfirmationToken`, `V2.Signals.AccountActivity`, and `V2\Signals\AccountActivity.create().$params`
  * Add support for new value `sequra` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
  * Add support for `active_entitlements` and `customer_portal` on `CustomerSession.create().$params.component`
  * Add support for `address_match_confidence` and `name_match_confidence` on `Identity.VerificationReport.email` and `Identity.VerificationReport.phone`
  * Add support for `domain_country`, `email_exists_confidence`, `observed_domain_tenure_days`, `observed_email_tenure_days`, and `phone_match_confidence` on `Identity.VerificationReport.email`
  * Add support for new values `email_address_mismatch`, `email_name_mismatch`, `email_ownership_unverified`, `email_phone_mismatch`, and `email_short_tenure` on enum `Identity.VerificationReport.email.error.code`
  * Add support for `carrier`, `line_type`, and `observed_phone_tenure_days` on `Identity.VerificationReport.phone`
  * Add support for new values `phone_address_mismatch`, `phone_invalid_line_type`, `phone_invalid`, `phone_name_mismatch`, `phone_ownership_unverified`, `phone_short_tenure`, and `phone_unsupported_country` on enum `Identity.VerificationReport.phone.error.code`
  * Add support for new values `email_address_mismatch`, `email_name_mismatch`, `email_ownership_unverified`, `email_phone_mismatch`, `email_short_tenure`, `phone_address_mismatch`, `phone_invalid_line_type`, `phone_invalid`, `phone_name_mismatch`, `phone_ownership_unverified`, `phone_short_tenure`, and `phone_unsupported_country` on enum `Identity.VerificationSession.last_error.code`
  * Add support for new value `truemoney` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
  * ⚠️ Remove support for `payment_method_types` on `PaymentIntent.confirm().$params`, `PaymentIntent.create().$params`, `PaymentIntent.update().$params`, `SetupIntent.create().$params`, and `SetupIntent.update().$params`
  * Add support for `verification_method` on `PaymentIntent.confirm().$params.payment_method_option.bacs_debit`, `PaymentIntent.create().$params.payment_method_option.bacs_debit`, `PaymentIntent.payment_method_options.bacs_debit`, `PaymentIntent.update().$params.payment_method_option.bacs_debit`, `SetupIntent.confirm().$params.payment_method_option.bacs_debit`, `SetupIntent.create().$params.payment_method_option.bacs_debit`, `SetupIntent.payment_method_options.bacs_debit`, and `SetupIntent.update().$params.payment_method_option.bacs_debit`
  * Add support for new value `touch_n_go` on enums `PaymentIntent.allowed_payment_method_types` and `SetupIntent.allowed_payment_method_types`
  * Add support for new value `sequra` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
  * Change `PaymentIntent.allowed_payment_method_types` and `SetupIntent.allowed_payment_method_types` to be required
  * Add support for `application_fee_amount`, `application_fee_percent`, `on_behalf_of`, and `transfer_data` on `PaymentLink.update().$params`
  * Add support for `canceled` on `PaymentRecord.report_payment().$params` and `PaymentRecord.report_payment_attempt().$params`
  * ⚠️ Change type of `ProductCatalog.TrialOffer.price` from `$Price` to `deletable($Price)`
  * ⚠️ Change `ProductCatalog.TrialOffer.name` to be optional
  * Add support for `recurring` on `SharedPayment.GrantedToken.usage_limits`, `SharedPayment.IssuedToken.usage_limits`, `SharedPayment\GrantedToken.create().$params.usage_limit`, and `SharedPayment\IssuedToken.create().$params.usage_limit`
  * Add support for `feedback_option` on `Subscription.cancel().$params.cancellation_detail` and `Subscription.update().$params.cancellation_detail`
  * Add support for `pricing_token` on `Subscription.update().$params`
  * Add support for `igic` on `Tax\Registration.create().$params.country_option.at`, `Tax\Registration.create().$params.country_option.be`, `Tax\Registration.create().$params.country_option.bg`, `Tax\Registration.create().$params.country_option.cy`, `Tax\Registration.create().$params.country_option.cz`, `Tax\Registration.create().$params.country_option.de`, `Tax\Registration.create().$params.country_option.dk`, `Tax\Registration.create().$params.country_option.e`, `Tax\Registration.create().$params.country_option.ee`, `Tax\Registration.create().$params.country_option.fi`, `Tax\Registration.create().$params.country_option.fr`, `Tax\Registration.create().$params.country_option.gr`, `Tax\Registration.create().$params.country_option.hr`, `Tax\Registration.create().$params.country_option.hu`, `Tax\Registration.create().$params.country_option.ie`, `Tax\Registration.create().$params.country_option.it`, `Tax\Registration.create().$params.country_option.lt`, `Tax\Registration.create().$params.country_option.lu`, `Tax\Registration.create().$params.country_option.lv`, `Tax\Registration.create().$params.country_option.mt`, `Tax\Registration.create().$params.country_option.nl`, `Tax\Registration.create().$params.country_option.pl`, `Tax\Registration.create().$params.country_option.pt`, `Tax\Registration.create().$params.country_option.ro`, `Tax\Registration.create().$params.country_option.se`, `Tax\Registration.create().$params.country_option.si`, and `Tax\Registration.create().$params.country_option.sk`
  * Add support for `one_time_fees` on `V2.Billing.Contract` and `V2\Billing\Contract.create().$params`
  * ⚠️ Remove support for `payment_method_collection` on `V2.Core.Account.configuration.merchant.gross_settlement`, `V2\Core\Account.create().$params.configuration.merchant.gross_settlement`, and `V2\Core\Account.update().$params.configuration.merchant.gross_settlement`
  * Add support for `payout_methods` on `V2.Core.Account.defaults` and `V2\Core\Account.update().$params.default`
  * Add support for `reason` on `V2.Core.ApprovalRequest`
  * ⚠️ Remove support for `description` on `V2.Core.ApprovalRequest`
  * Add support for `api_key`, `type`, and `user` on `V2.Core.ApprovalRequest.requested_by` and `V2.Core.ApprovalRequest.review.reviewed_by`
  * ⚠️ Remove support for `id` and `name` on `V2.Core.ApprovalRequest.requested_by` and `V2.Core.ApprovalRequest.review.reviewed_by`
  * Add support for `approved_at` on `V2.Core.ApprovalRequest.status_transitions`
  * ⚠️ Remove support for `requires_execution_at` on `V2.Core.ApprovalRequest.status_transitions`
  * Add support for `crypto_transaction` on `V2.Core.FeeBatch.collection_records[]`
  * Add support for new value `crypto_transaction` on enum `V2.Core.FeeBatch.collection_records[].type`
  * Add support for `restricted` on `V2.Core.Vault.GbBankAccount` and `V2.Core.Vault.UsBankAccount`
  * Add support for `savings` on `V2.MoneyManagement.FinancialAccount` and `V2\MoneyManagement\FinancialAccount.create().$params`
  * Add support for new value `savings` on enum `V2.MoneyManagement.FinancialAccount.type`
  * Add support for `enabled_delivery_schemes` on `V2.MoneyManagement.PayoutMethod.bank_account`
  * ⚠️ Remove support for `enabled_delivery_options` on `V2.MoneyManagement.PayoutMethod.bank_account`
  * Add support for new value `disabled` on enum `V2.MoneyManagement.PayoutMethod.usage_status.payments`
  * Add support for new value `disabled` on enum `V2.MoneyManagement.PayoutMethod.usage_status.transfers`
  * Add support for `to_account` on `V2.MoneyManagement.ReceivedDebit.balance_transfer`
  * Add support for `account_restricted` and `account_suspended` on `V2.Signals.AccountActivity` and `V2\Signals\AccountActivity.create().$params`
  * Add support for new values `account_restricted` and `account_suspended` on enum `V2.Signals.AccountActivity.type`
  * ⚠️ Remove support for value `not_assessed` from enums `V2.Signals.AccountEvaluation.evaluated_signals.fraudulent_website.risk_level`, `V2.Signals.AccountEvaluation.evaluated_signals.user_account_sharing.risk_level`, `V2.Signals.AccountEvaluation.evaluated_signals.user_multi_accounting.risk_level`, `V2.Signals.AccountSignal.fraudulent_merchant.risk_level`, `V2.Signals.AccountSignal.fraudulent_website.risk_level`, `V2.Signals.AccountSignal.merchant_delinquency.risk_level`, `V2.Signals.AccountSignal.user_account_sharing.risk_level`, and `V2.Signals.AccountSignal.user_multi_accounting.risk_level`
  * Add support for `additional_details` on `V2.Signals.AccountSignal.fraudulent_merchant` and `V2.Signals.AccountSignal.merchant_delinquency`
  * ⚠️ Remove support for `indicators` on `V2.Signals.AccountSignal.fraudulent_merchant` and `V2.Signals.AccountSignal.merchant_delinquency`
  * Add support for `action`, `created`, and `status` on `V2\Core\ApprovalRequest.all().$params`
  * Add support for `one_time_fee_actions` on `V2\Billing\Contract.update().$params`
  * Add support for event notifications `V2CoreHealthMetronomeNotificationLatencyFiringEvent`, `V2CoreHealthMetronomeNotificationLatencyResolvedEvent`, and `V2SignalsPaymentRetryEvaluationsRetryRecommendedEvent`
  * Add support for event notifications `V2MoneyManagementPayoutIntentCanceledEvent`, `V2MoneyManagementPayoutIntentCreatedEvent`, `V2MoneyManagementPayoutIntentPostedEvent`, `V2MoneyManagementPayoutIntentProcessingEvent`, and `V2MoneyManagementPayoutIntentRequiresActionEvent` with related object `V2.MoneyManagement.PayoutIntent`
  * Add support for error codes `authentication_failure`, `capability_not_active`, `expired_payment_method`, `incorrect_postal_code`, `invalid_canceled_subscription_fields`, and `payment_method_restricted` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `QuotePreviewInvoice.last_finalization_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, `StripeError`, and `Terminal.Reader.action.api_error`

## 21.4.0-alpha.1 - 2026-08-26
This release changes the pinned API version to `2026-08-26.preview`.

* [#2123](https://github.com/stripe/stripe-php/pull/2123) Add non-verified manged handlers
* ⚠️ [#2130](https://github.com/stripe/stripe-php/pull/2130) Update generated code for private-preview
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

## 21.3.0-alpha.2 - 2026-08-19
* ⚠️ [#2120](https://github.com/stripe/stripe-php/pull/2120) Update generated code for private-preview
  * Add support for new resources `Billing.FeedbackOption` and `PaymentPlan`
  * ⚠️ Remove support for resource `Billing.FeedbackOptions`
  * Add support for `all`, `create`, `retrieve`, and `update` methods on resource `PaymentPlan`
  * Add support for `update` method on resource `V2.MoneyManagement.Transaction`
  * Add support for `wechat_pay_payments` on `Account.create().$params.setting`, `Account.settings`, and `Account.update().$params.setting`
  * ⚠️ Change type of `BillingPortal.Configuration.features.subscription_cancel.cancellation_reason.feedback_options` from `$Billing.FeedbackOptions` to `$Billing.FeedbackOption`
  * Change `BillingPortal.Configuration.features.subscription_cancel.cancellation_reason.feedback_options` to be required
  * Add support for `subscription_pause` on `BillingPortal.Session.flow`
  * Add support for new value `subscription_pause` on enum `BillingPortal.Session.flow.type`
  * Add support for new value `usdt` on enum `Crypto.OnrampSession.transaction_details.destination_currencies`
  * Add support for new value `usdt` on enum `Crypto.OnrampSession.transaction_details.destination_currency`
  * Add support for `active_entitlements` on `CustomerSession.components`
  * Add support for `shared_payment_issued_token` on `DelegatedCheckout\RequestedSession.confirm().$params`
  * Add support for new values `payment_plan.created`, `payment_plan.installment_due`, `payment_plan.installment_paid`, `payment_plan.installment_will_be_due`, and `payment_plan.updated` on enum `Event.type`
  * Add support for `managed_payments` on `Invoice.create().$params`, `InvoiceItem.create().$params`, `InvoiceItem`, `Invoice`, and `QuotePreviewInvoice`
  * Add support for `payment_plan` on `Invoice`
  * Add support for `estimated_fee_details` and `estimated_fee` on `Issuing.Authorization.pending_request.hold_amount_details` and `Issuing.Authorization.request_history[].hold_amount_details`
  * ⚠️ Remove support for `cryptogram` on `PaymentAttemptRecord.payment_method_details.card.three_d_secure` and `PaymentRecord.payment_method_details.card.three_d_secure`
  * ⚠️ Change type of `ProductCatalog.TrialOffer.end_behavior.transition.price` from `$Price` to `deletable($Price)`
  * ⚠️ Change type of `Subscription.cancellation_details.feedback_option` from `$Billing.FeedbackOptions` to `$Billing.FeedbackOption`
  * Add support for `cancel_at_period_end` on `Subscription.pending_update`
  * Change `Subscription.cancellation_details.feedback_option` to be required
  * Add support for `igic` on `Tax.Registration.country_options.at`, `Tax.Registration.country_options.be`, `Tax.Registration.country_options.bg`, `Tax.Registration.country_options.cy`, `Tax.Registration.country_options.cz`, `Tax.Registration.country_options.de`, `Tax.Registration.country_options.dk`, `Tax.Registration.country_options.ee`, `Tax.Registration.country_options.es`, `Tax.Registration.country_options.fi`, `Tax.Registration.country_options.fr`, `Tax.Registration.country_options.gr`, `Tax.Registration.country_options.hr`, `Tax.Registration.country_options.hu`, `Tax.Registration.country_options.ie`, `Tax.Registration.country_options.it`, `Tax.Registration.country_options.lt`, `Tax.Registration.country_options.lu`, `Tax.Registration.country_options.lv`, `Tax.Registration.country_options.mt`, `Tax.Registration.country_options.nl`, `Tax.Registration.country_options.pl`, `Tax.Registration.country_options.pt`, `Tax.Registration.country_options.ro`, `Tax.Registration.country_options.se`, `Tax.Registration.country_options.si`, and `Tax.Registration.country_options.sk`
  * Add support for `metadata` on `V2.Billing.Contract.pricing_lines.data[].pricing.price_details.pricing_overrides.data[]`, `V2.Billing.Contract.pricing_overrides.data[]`, `V2.MoneyManagement.Transaction`, `V2\Billing\Contract.create().$params.pricing_override`, `V2\Billing\Contract.update().$params.pricing_line_action.update`, `V2\Billing\Contract.update().$params.pricing_override_action.add`, `V2\Billing\Contract.update().$params.pricing_override_action.update`, and `V2\Billing\Contract.update().$params`
  * Add support for `tax_amount` on `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[]`
  * Add support for `payout_method_options` on `V2.MoneyManagement.OutboundPaymentQuote.to` and `V2\MoneyManagement\OutboundPaymentQuote.create().$params.to`
  * Change type of `V2\Billing\Contract.update().$params.pricing_line_action.update.pricing.price_detail.pricing_override_action.update.metadata` from `string` to `emptyable(string)`
  * Add support for snapshot events `PAYMENT_PLAN_CREATED`, `PAYMENT_PLAN_INSTALLMENT_DUE`, `PAYMENT_PLAN_INSTALLMENT_PAID`, `PAYMENT_PLAN_INSTALLMENT_WILL_BE_DUE`, and `PAYMENT_PLAN_UPDATED` with resource `PaymentPlan`

## 21.3.0-alpha.1 - 2026-08-12
This release changes the pinned API version to `2026-08-12.preview`.

* ⚠️ [#2116](https://github.com/stripe/stripe-php/pull/2116) Update generated code for private-preview
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

## 21.2.0-alpha.2 - 2026-08-05
* [#2108](https://github.com/stripe/stripe-php/pull/2108) Update generated code for private-preview
  * Add support for new resource `Billing.FeedbackOptions`
  * Add support for `sequra_payments` on `Account.capabilities`
  * Add support for `feedback_options` on `BillingPortal.Configuration.features.subscription_cancel.cancellation_reason`
  * Add support for `sequra` on `Charge.payment_method_details`, `Checkout.Session.payment_method_options`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.payment_method_options`, and `PaymentRecord.payment_method_details`
  * Add support for `retrieval_reference_number` on `Charge.payment_method_details.card_present`, `ConfirmationToken.payment_method_preview.card.generated_from.payment_method_details.card_present`, `PaymentAttemptRecord.payment_method_details.card_present`, `PaymentMethod.card.generated_from.payment_method_details.card_present`, and `PaymentRecord.payment_method_details.card_present`
  * Add support for `pricing_group` on `Charge.payment_method_details.link`
  * Add support for `tax_rates` on `Checkout.Session.shipping_options[]`, `Checkout\Session.create().$params.shipping_option`, and `Checkout\Session.update().$params.shipping_option`
  * Add support for new value `daikin` on enums `Checkout.Session.automatic_surcharge.provider` and `PaymentLink.automatic_surcharge.provider`
  * Add support for `funding_types_blocked` on `Checkout.Session.payment_method_options.card.restrictions`
  * Add support for new value `sequra` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
  * Add support for `healthcare` on `Issuing\Authorization.capture().$params.purchase_detail`, `Issuing\Authorization.create().$params`, `Issuing\Transaction.create_force_capture().$params.purchase_detail`, and `Issuing\Transaction.create_unlinked_refund().$params.purchase_detail`
  * Change type of `Issuing.Authorization.healthcare.verification_status` from `nullable(enum('iias_merchant_exempt'|'iias_merchant_not_certified'|'iias_verified'|'not_verified'))` to `enum('iias_merchant_exempt'|'iias_merchant_not_certified'|'iias_verified'|'not_verified')`
  * Add support for `is_anomalous` on `PaymentAttemptRecord.report_guaranteed().$params`
  * Add support for new value `sequra` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
  * Add support for `aade_data` on `PaymentIntent.payment_method_options.card_present`
  * Change `Radar.PaymentEvaluation.payment_details.payment_method_details.card.first6` to be required
  * Change `Radar.PaymentEvaluation.payment_details.payment_method_details.card.last4` to be required
  * Add support for `feedback_option` on `Subscription.cancellation_details`
  * Add support for `application` on `V2.Payments.OffSessionPayment`
  * Add support for `status` on `V2\MoneyManagement\FinancialAccountStatement.all().$params`
  * Change `V2\Billing\Contract.create().$params.pricing_lines` to be optional

## 21.2.0-alpha.1 - 2026-07-29
This release changes the pinned API version to `2026-07-29.preview`.

* ⚠️ [#2104](https://github.com/stripe/stripe-php/pull/2104) Update generated code for private-preview
  * Add support for new resources `V2.MoneyManagement.ReceivedDebitMandate`, `V2.Risk.Inquiry`, `V2.Signals.AccountActivity`, and `V2.Signals.AccountEvaluation`
  * Add support for `create` and `retrieve` methods on resource `V2.Signals.AccountEvaluation`
  * Add support for `create`, `delete`, and `retrieve` methods on resource `V2.Signals.AccountActivity`
  * Add support for `all`, `retrieve`, and `update` methods on resource `V2.Risk.Inquiry`
  * Add support for `all`, `cancel`, and `retrieve` methods on resource `V2.MoneyManagement.ReceivedDebitMandate`
  * Add support for `rate_cards` on `Billing.CreditGrant.applicability_config.scope`, `Billing\CreditBalanceSummary.retrieve().$params.filter.applicability_scope`, and `Billing\CreditGrant.create().$params.applicability_config.scope`
  * ⚠️ Change type of `ConfirmationToken.payment_method_preview.gift_card.brand`, `GiftCard.brand`, `GiftCard.create().$params.brand`, `PaymentMethod.gift_card.brand`, `Terminal\Reader.activate_gift_card().$params.brand`, `Terminal\Reader.cashout_gift_card().$params.brand`, `Terminal\Reader.check_gift_card_balance().$params.brand`, and `Terminal\Reader.reload_gift_card().$params.brand` from `enum('fiserv_valuelink'|'givex'|'svs')` to `literal('svs')`
  * Add support for new value `tempo` on enum `Crypto.CustomerConsumerWallet.network`
  * Add support for new value `tempo` on enum `Crypto.OnrampSession.transaction_details.destination_network`
  * Add support for new value `tempo` on enum `Crypto.OnrampSession.transaction_details.destination_networks`
  * Add support for `tempo` on `Crypto.OnrampSession.transaction_details.wallet_addresses`
  * Add support for new value `try_again_later` on enum `GiftCardOperation.failure_code`
  * Add support for `healthcare` on `Issuing.Authorization`
  * Add support for `product_code` on `Issuing.Card`, `Issuing\Card.create().$params`, and `Issuing\Card.update().$params`
  * Add support for `product_graduation_state` on `Issuing.Card`
  * Add support for `cvc` and `number` on `Radar\PaymentEvaluation.create().$params.payment_detail.payment_method_detail.card`
  * Change `Radar\PaymentEvaluation.create().$params.payment_detail.payment_method_detail.card.first6` to be optional
  * Change `Radar\PaymentEvaluation.create().$params.payment_detail.payment_method_detail.card.last4` to be optional
  * Add support for `card` on `Radar.PaymentEvaluation.payment_details.payment_method_details`
  * ⚠️ Change type of `Terminal\Reader.collect_payment_method().$params.collect_config.gift_card_brand` and `Terminal\Reader.process_payment_intent().$params.process_config.gift_card_brand` from `enum('fiserv_valuelink'|'givex'|'svs')` to `literal('svs')`
  * Add support for `gift_card` on `Terminal\Reader.present_payment_method().$params`
  * Add support for `amount_due` and `customer_balance_applied` on `V2.Billing.Intent.amount_details`
  * ⚠️ Change type of `V2.Core.AccountEvaluation.evaluations_triggered` from `literal('fraudulent_website')` to `enum('fraudulent_website'|'user_account_sharing'|'user_multi_accounting')`
  * Add support for `gross_settlement` on `V2.Core.Account.configuration.merchant`, `V2\Core\Account.create().$params.configuration.merchant`, and `V2\Core\Account.update().$params.configuration.merchant`
  * ⚠️ Change type of `V2.MoneyManagement.DebitDispute.bank_transfer.network` from `literal('ach')` to `enum('ach'|'bacs')`
  * Add support for new values `beneficiary_unrecognized`, `mandate_canceled_by_stripe`, `mandate_canceled`, `no_advance_notice`, `originator_requested`, and `signature_invalid` on enum `V2.MoneyManagement.DebitDispute.bank_transfer.reason`
  * ⚠️ Remove support for `managed_by` on `V2.MoneyManagement.FinancialAccount`
  * Add support for `payout_intent` on `V2.MoneyManagement.OutboundPayment`
  * Add support for `settles_at` on `V2.MoneyManagement.ReceivedDebit`
  * Add support for `gb_bank_account` on `V2.MoneyManagement.ReceivedDebit.bank_transfer`
  * ⚠️ Change type of `V2.MoneyManagement.ReceivedDebit.bank_transfer.origin_type` from `literal('us_bank_account')` to `enum('gb_bank_account'|'us_bank_account')`
  * ⚠️ Change type of `V2.MoneyManagement.ReceivedDebit.bank_transfer.payment_method_type` from `literal('us_bank_account')` to `enum('gb_bank_account'|'us_bank_account')`
  * Add support for new value `scheduled` on enum `V2.MoneyManagement.ReceivedDebit.status`
  * Add support for new value `no_mandate` on enum `V2.MoneyManagement.ReceivedDebit.status_details.failed.reason`
  * Add support for `target_date` on `V2.Payments.OffSessionPayment` and `V2\Payments\OffSessionPayment.create().$params`
  * Add support for `account_evaluation`, `fraudulent_website`, `payment_delinquency_exposure`, `user_account_sharing`, and `user_multi_accounting` on `V2.Signals.AccountSignal`
  * Add support for new values `fraudulent_website`, `user_account_sharing`, and `user_multi_accounting` on enum `V2.Signals.AccountSignal.type`
  * Change type of `V2\MoneyManagement\FinancialAddressDebitSimulation.debit().$params.network` from `literal('ach')` to `enum('ach'|'bacs')`
  * Add support for `received_debit_mandate` on `V2\MoneyManagement\ReceivedDebit.all().$params`
  * ⚠️ Remove support for `payout_intent` on `V2\MoneyManagement\OutboundPayment.create().$params`
  * Change type of `V2\Core\AccountEvaluation.create().$params.signals` from `literal('fraudulent_website')` to `enum('fraudulent_website'|'user_account_sharing'|'user_multi_accounting')`
  * ⚠️ Remove support for `id` on `EventsV2SignalsAccountSignalFraudulentMerchantReadyEvent`
  * Add support for event notifications `V2MoneyManagementReceivedDebitCreatedEvent` and `V2MoneyManagementReceivedDebitScheduledEvent` with related object `V2.MoneyManagement.ReceivedDebit`
  * Add support for event notifications `V2MoneyManagementReceivedDebitMandateCanceledEvent`, `V2MoneyManagementReceivedDebitMandateCreatedEvent`, `V2MoneyManagementReceivedDebitMandateExpiredEvent`, `V2MoneyManagementReceivedDebitMandatePendingCancellationEvent`, and `V2MoneyManagementReceivedDebitMandateUpdatedEvent` with related object `V2.MoneyManagement.ReceivedDebitMandate`
  * Add support for event notification `V2SignalsAccountEvaluationCompleteEvent` with related object `V2.Signals.AccountEvaluation`
  * Add support for event notifications `V2SignalsAccountSignalFraudulentWebsiteReadyEvent` and `V2SignalsAccountSignalPaymentDelinquencyExposureReadyEvent` with related object `V2.Signals.AccountSignal`

## 21.1.0-alpha.2 - 2026-07-22
* ⚠️ [#2103](https://github.com/stripe/stripe-php/pull/2103) Update generated code for private-preview
  * Add support for new resources `Billing.AlertNotification` and `Crypto.DepositAddress`
  * Add support for `all`, `create`, and `retrieve` methods on resource `Crypto.DepositAddress`
  * Add support for `all` method on resource `Billing.AlertNotification`
  * Add support for new values `partner_disabled_dispute_rate`, `partner_disabled_responsibilities`, `partner_disabled_restricted_business`, and `partner_disabled_suspected_fraud` on enums `Account.future_requirements.errors[].code`, `Account.requirements.errors[].code`, `BankAccount.future_requirements.errors[].code`, `BankAccount.requirements.errors[].code`, `Capability.future_requirements.errors[].code`, `Capability.requirements.errors[].code`, `Person.future_requirements.errors[].code`, and `Person.requirements.errors[].code`
  * Add support for new value `data_share_only` on enums `Charge.payment_method_details.card.three_d_secure.result`, `PaymentAttemptRecord.payment_method_details.card.three_d_secure.result`, `PaymentRecord.payment_method_details.card.three_d_secure.result`, and `SetupAttempt.payment_method_details.card.three_d_secure.result`
  * Add support for `vipps` on `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, `PaymentMethod`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
  * Add support for new value `vipps` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
  * Add support for new value `sui` on enum `Crypto.CustomerConsumerWallet.network`
  * Add support for new value `sui` on enum `Crypto.OnrampSession.transaction_details.destination_network`
  * Add support for new value `sui` on enum `Crypto.OnrampSession.transaction_details.destination_networks`
  * Add support for `sui` on `Crypto.OnrampSession.transaction_details.wallet_addresses`
  * Add support for `use_stripe_sdk` on `DelegatedCheckout\RequestedSession.confirm().$params`
  * Add support for new value `mb_way` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
  * Add support for `ev_charging` on `PaymentIntent.capture().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.confirm().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.create().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.decrement_authorization().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.increment_authorization().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.update().$params.amount_detail.line_item.payment_method_option.card`, and `PaymentIntentAmountDetailsLineItem.payment_method_options.card`
  * ⚠️ Change type of `PaymentIntent.allowed_payment_method_types` from `string` to `enum`
  * Add support for new value `vipps` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
  * Add support for `tax_items` on `PaymentIntent.payment_details.car_rental_data[].total.tax`, `PaymentIntent.payment_details.flight_data[].total.tax`, and `PaymentIntent.payment_details.lodging_data[].total.tax`
  * ⚠️ Remove support for `taxes` on `PaymentIntent.payment_details.car_rental_data[].total.tax`, `PaymentIntent.payment_details.flight_data[].total.tax`, and `PaymentIntent.payment_details.lodging_data[].total.tax`
  * Change `PaymentRecord.create().$params.closed` to be optional
  * Change `PaymentRecord.create().$params.funded` to be optional
  * Add support for `card` on `Radar\PaymentEvaluation.create().$params.payment_detail.payment_method_detail`
  * ⚠️ Remove support for `acss_debit`, `afterpay_clearpay`, `alipay`, `alma`, `amazon_pay`, `au_becs_debit`, `bacs_debit`, `bancontact`, `billie`, `bizum`, `blik`, `boleto`, `card_present`, `cashapp`, `crypto`, `customer_balance`, `eps`, `fpx`, `gift_card`, `giropay`, `gopay`, `grabpay`, `id_bank_transfer`, `ideal`, `interac_present`, `kakao_pay`, `konbini`, `kr_card`, `mb_way`, `mobilepay`, `multibanco`, `naver_pay`, `nz_bank_account`, `oxxo`, `p24`, `pay_by_bank`, `payco`, `paynow`, `paypal`, `paypay`, `payto`, `pix`, `promptpay`, `qris`, `rechnung`, `revolut_pay`, `samsung_pay`, `satispay`, `scalapay`, `sepa_debit`, `shopeepay`, `sofort`, `stripe_balance`, `sunbit`, `swish`, `tamara`, `twint`, `upi`, `us_bank_account`, `wechat_pay`, and `zip` on `SharedPayment.GrantedToken.payment_method_details`
  * ⚠️ Add support for new value `shop_pay` on enum `SharedPayment.GrantedToken.payment_method_details.type`
  * ⚠️ Remove support for values `acss_debit`, `afterpay_clearpay`, `alipay`, `alma`, `amazon_pay`, `au_becs_debit`, `bacs_debit`, `bancontact`, `billie`, `bizum`, `blik`, `boleto`, `card_present`, `cashapp`, `crypto`, `custom`, `customer_balance`, `eps`, `fpx`, `gift_card`, `giropay`, `gopay`, `grabpay`, `id_bank_transfer`, `ideal`, `interac_present`, `kakao_pay`, `konbini`, `kr_card`, `mb_way`, `mobilepay`, `multibanco`, `naver_pay`, `nz_bank_account`, `oxxo`, `p24`, `pay_by_bank`, `payco`, `paynow`, `paypal`, `paypay`, `payto`, `pix`, `promptpay`, `qris`, `rechnung`, `revolut_pay`, `samsung_pay`, `satispay`, `scalapay`, `sepa_debit`, `shopeepay`, `sofort`, `stripe_balance`, `sunbit`, `swish`, `tamara`, `twint`, `upi`, `us_bank_account`, `wechat_pay`, and `zip` from enum `SharedPayment.GrantedToken.payment_method_details.type`
  * Add support for `spend_card` on `V2.Core.Account.configuration.card_creator.capabilities.commercial.stripe`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.stripe`, and `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.stripe`
  * Add support for new value `commercial.stripe.spend_card` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for new value `payment_delinquency_exposure` on enum `V2.Signals.AccountSignal.type`
  * Add support for new value `commercial.stripe.spend_card` on enum `EventsV2CoreAccountIncludingConfigurationCardCreatorCapabilityStatusUpdatedEvent.updated_capability`

## 21.1.0-alpha.1 - 2026-07-16
* ⚠️ [#2096](https://github.com/stripe/stripe-php/pull/2096) Update generated code for private-preview
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

## 20.4.0-alpha.3 - 2026-07-08
This release changes the pinned API version to `2026-07-08.preview`.

* ⚠️ [#2092](https://github.com/stripe/stripe-php/pull/2092) Update generated code for private-preview
  * Add support for `activate_gift_card`, `cashout_gift_card`, `check_gift_card_balance`, and `reload_gift_card` methods on resource `Terminal.Reader`
  * Add support for `aggregation_period` on `Billing.AlertRecovered`
  * Add support for new values `mass_transit_parking_tax` and `parking_tax` on enums `Tax.Calculation.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`, `Tax.Calculation.tax_breakdown[].tax_rate_details.tax_type`, `Tax.CalculationLineItem.tax_breakdown[].tax_rate_details.tax_type`, and `Tax.Transaction.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`
  * Add support for `administrative_address` and `principal_place_of_business` on `Account.company`
  * Add support for new values `bnp_paribas`, `citibank`, and `mbsb_bank` on enums `Charge.payment_method_details.fpx.bank`, `ConfirmationToken.payment_method_preview.fpx.bank`, `PaymentAttemptRecord.payment_method_details.fpx.bank`, `PaymentMethod.fpx.bank`, `PaymentRecord.payment_method_details.fpx.bank`, and `SharedPayment.GrantedToken.payment_method_details.fpx.bank`
  * Add support for `address_collection_precision` on `Checkout.Session.automatic_tax`
  * Add support for `tax_id` on `Checkout.Session.collected_information`
  * ⚠️ Remove support for `tax_ids` on `Checkout.Session.collected_information`
  * Add support for `setup_future_usage` on `Checkout.Session.payment_method_options.payco`, `Checkout.Session.payment_method_options.samsung_pay`, `PaymentIntent.confirm().$params.payment_method_option.paypay`, `PaymentIntent.create().$params.payment_method_option.paypay`, `PaymentIntent.payment_method_options.payco`, `PaymentIntent.payment_method_options.paypay`, `PaymentIntent.payment_method_options.samsung_pay`, and `PaymentIntent.update().$params.payment_method_option.paypay`
  * Add support for `network` on `Dispute.payment_method_details.card`
  * Add support for `require_payment_method_support` on `FinancialConnections.Session.filters`
  * Add support for `network_data` on `Issuing.Authorization.request_history[]`
  * Add support for `acquiring_institution_country`, `acquiring_institution_id`, `retrieval_reference_number`, `routed_network`, and `trace_id` on `Issuing.Transaction.network_data`
  * Add support for `custom_fields`, `description`, and `footer` on `Quote.invoice_settings`, `QuotePreviewSubscriptionSchedule.default_settings.invoice_settings`, `QuotePreviewSubscriptionSchedule.phases[].invoice_settings`, `SubscriptionSchedule.default_settings.invoice_settings`, and `SubscriptionSchedule.phases[].invoice_settings`
  * Add support for `paypay` on `SetupAttempt.payment_method_details`
  * Add support for `mass_transit_parking_tax` and `parking_tax` on `Tax.Registration.country_options.us`
  * Add support for new values `mass_transit_parking_tax` and `parking_tax` on enum `Tax.Registration.country_options.us.type`
  * Add support for `gift_card_brand` on `Terminal\Reader.collect_payment_method().$params.collect_config` and `Terminal\Reader.process_payment_intent().$params.process_config`
  * Add support for `activate_gift_card`, `cashout_gift_card`, `check_gift_card_balance`, `deactivate_gift_card`, and `reload_gift_card` on `Terminal.Reader.action`
  * Add support for new values `activate_gift_card`, `cashout_gift_card`, `check_gift_card_balance`, `deactivate_gift_card`, and `reload_gift_card` on enum `Terminal.Reader.action.type`
  * Add support for `status_transitions` on `V2.Billing.Contract`
  * ⚠️ Remove support for `one_time_fees` on `V2.Billing.Contract` and `V2\Billing\Contract.create().$params`
  * ⚠️ Remove support for `status_details` on `V2.Billing.Contract`
  * Add support for `id` and `priority` on `V2.Billing.Contract.pricing_lines.data[].pricing.price_details.pricing_overrides.data[]`
  * ⚠️ Remove support for `pricing_override` on `V2.Billing.Contract.pricing_lines.data[].pricing.price_details.pricing_overrides.data[]`
  * ⚠️ Remove support for `tiering_mode` and `tiers` on `V2.Billing.Contract.pricing_lines.data[].pricing.price_details.pricing_overrides.data[].overwrite_price`, `V2\Billing\Contract.create().$params.pricing_line.pricing.price_detail.pricing_override.overwrite_price`, `V2\Billing\Contract.update().$params.pricing_line_action.add.pricing.price_detail.pricing_override.overwrite_price`, `V2\Billing\Contract.update().$params.pricing_line_action.update.pricing.price_detail.pricing_override_action.add.overwrite_price`, and `V2\Billing\Contract.update().$params.pricing_override_action.add.overwrite_price`
  * Add support for `multiply_pricing` on `V2.Billing.Contract.pricing_overrides.data[]`, `V2\Billing\Contract.create().$params.pricing_override`, and `V2\Billing\Contract.update().$params.pricing_override_action.add`
  * ⚠️ Remove support for `multiplier` on `V2.Billing.Contract.pricing_overrides.data[]`, `V2\Billing\Contract.create().$params.pricing_override`, and `V2\Billing\Contract.update().$params.pricing_override_action.add`
  * ⚠️ Change type of `V2.Billing.Contract.pricing_overrides.data[].type`, `V2\Billing\Contract.create().$params.pricing_override.type`, and `V2\Billing\Contract.update().$params.pricing_override_action.add.type` from `literal('multiplier')` to `literal('multiply_pricing')`
  * Add support for `related_network_object` on `V2.Core.Account` and `V2\Core\Account.all().$params`
  * Add support for new value `network_business_profile_wallet` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
  * Add support for `network_business_profile_wallet` on `V2.MoneyManagement.PayoutMethod`
  * Add support for new value `network_business_profile_wallet` on enum `V2.MoneyManagement.PayoutMethod.type`
  * Add support for `stripe_network_transfer` on `V2.MoneyManagement.ReceivedCredit`
  * Add support for new value `stripe_network_transfer` on enum `V2.MoneyManagement.ReceivedCredit.type`
  * ⚠️ Change type of `V2\Billing\Contract.create().$params.pricing_line.ends_at.type`, `V2\Billing\Contract.create().$params.pricing_line.pricing.price_detail.pricing_override.ends_at.type`, `V2\Billing\Contract.create().$params.pricing_override.ends_at.type`, and `V2\Billing\Contract.update().$params.pricing_line_action.add.pricing.price_detail.pricing_override.ends_at.type` from `enum('contract_end'|'timestamp')` to `literal('timestamp')`
  * ⚠️ Change type of `V2\Billing\Contract.create().$params.pricing_line.pricing.price_detail.pricing_override.starts_at.type`, `V2\Billing\Contract.create().$params.pricing_line.starts_at.type`, `V2\Billing\Contract.create().$params.pricing_override.starts_at.type`, and `V2\Billing\Contract.update().$params.pricing_line_action.add.pricing.price_detail.pricing_override.starts_at.type` from `enum('contract_start'|'timestamp')` to `literal('timestamp')`
  * Change `V2\Billing\Contract.create().$params.pricing_override.priority` and `V2\Billing\Contract.update().$params.pricing_override_action.add.priority` to be optional
  * ⚠️ Change type of `V2\Billing\Contract.update().$params.pricing_line_action.add.ends_at.type`, `V2\Billing\Contract.update().$params.pricing_line_action.update.ends_at.type`, `V2\Billing\Contract.update().$params.pricing_line_action.update.pricing.price_detail.pricing_override_action.add.ends_at.type`, `V2\Billing\Contract.update().$params.pricing_line_action.update.pricing.price_detail.pricing_override_action.update.ends_at.type`, `V2\Billing\Contract.update().$params.pricing_override_action.add.ends_at.type`, and `V2\Billing\Contract.update().$params.pricing_override_action.update.ends_at.type` from `enum('billing_period_end'|'timestamp')` to `literal('timestamp')`
  * ⚠️ Change type of `V2\Billing\Contract.update().$params.pricing_line_action.add.starts_at.type`, `V2\Billing\Contract.update().$params.pricing_line_action.update.pricing.price_detail.pricing_override_action.add.starts_at.type`, `V2\Billing\Contract.update().$params.pricing_line_action.update.pricing.price_detail.pricing_override_action.update.starts_at.type`, `V2\Billing\Contract.update().$params.pricing_line_action.update.starts_at.type`, `V2\Billing\Contract.update().$params.pricing_override_action.add.starts_at.type`, and `V2\Billing\Contract.update().$params.pricing_override_action.update.starts_at.type` from `enum('billing_period_start'|'timestamp')` to `literal('timestamp')`
  * Add support for event notifications `V2BillingContractActivatedEvent`, `V2BillingContractCanceledEvent`, `V2BillingContractCreatedEvent`, `V2BillingContractEndedEvent`, and `V2BillingContractUpdatedEvent` with related object `V2.Billing.Contract`

## 20.4.0-alpha.2 - 2026-07-01
This release changes the pinned API version to `2026-07-01.preview`.

* ⚠️ [#2089](https://github.com/stripe/stripe-php/pull/2089) Update generated code for private-preview
  * Add support for new resources `Crypto.CustomerConsumerWallet`, `Crypto.CustomerPaymentToken`, `Crypto.Customer`, `Crypto.OnrampSession`, and `Crypto.OnrampTransactionLimits`
  * Add support for `all` and `retrieve` methods on resource `Crypto.Customer`
  * Add support for `all`, `checkout`, `create`, `quote`, and `retrieve` methods on resource `Crypto.OnrampSession`
  * Add support for `retrieve` method on resource `Crypto.OnrampTransactionLimits`
  * Add support for `electronic_commerce_indicator` on `Charge.payment_method_details.card`
  * Add support for `amount_received` and `amount_requested` on `Charge.payment_method_details.crypto`, `PaymentAttemptRecord.payment_method_details.crypto`, and `PaymentRecord.payment_method_details.crypto`
  * Add support for `fingerprint` on `Charge.payment_method_details.gift_card`, `PaymentAttemptRecord.payment_method_details.gift_card`, and `PaymentRecord.payment_method_details.gift_card`
  * Add support for `address_collection_precision` on `Checkout\Session.create().$params.automatic_tax`
  * Add support for `subscription` on `Checkout.Session.items[]`
  * ⚠️  Remove support for `deactivation` on `GiftCardOperation`
  * ⚠️  Remove support for value `deactivation` from enum `GiftCardOperation.type`
  * Add support for `merchant_amount_exchange_rate` on `Issuing.Authorization` and `Issuing.Transaction`
  * Add support for `device_id` on `Issuing.Authorization.token_details.network_data.device` and `Issuing.Token.network_data.device`
  * Add support for `program` on `Issuing.Card`
  * Add support for `payment_method_details` on `PaymentAttemptRecord.report_failed().$params` and `PaymentRecord.report_payment_attempt_failed().$params`
  * Add support for `reason` on `PaymentAttemptRecord.report_refund().$params` and `PaymentRecord.report_refund().$params`
  * Add support for `amount_reconciliation` on `PaymentIntent.confirm().$params.payment_method_option.crypto`, `PaymentIntent.create().$params.payment_method_option.crypto`, `PaymentIntent.payment_method_options.crypto`, and `PaymentIntent.update().$params.payment_method_option.crypto`
  * Add support for `connect_permissions` and `permissions` on `V2.Iam.ApiKey`, `V2\Iam\ApiKey.create().$params`, and `V2\Iam\ApiKey.update().$params`
  * Add support for `credit` on `V2.MoneyManagement.FinancialAccount`
  * Add support for new value `credit` on enum `V2.MoneyManagement.FinancialAccount.type`
  * Add support for new value `currency_required` on enum `V2.MoneyManagement.PayoutIntent.next_action.handle_failure.failure_reason`
  * Add support for new values `issuing_authorization`, `issuing_transaction`, and `platform_funded_credit_transaction` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
  * Add support for `account`, `issuing_authorization`, `issuing_dispute`, and `issuing_transaction` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
  * Add support for new values `issuing_authorization`, `issuing_dispute`, and `issuing_transaction` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
  * Change type of `V2\MoneyManagement\FinancialAccount.create().$params.type` from `literal('storage')` to `enum('credit'|'storage')`
  * Add support for `expires_at` on `V2\Iam\ApiKey.create().$params`

## 20.4.0-alpha.1 - 2026-06-24
This release changes the pinned API version to `2026-06-24.preview`.

* ⚠️ [#2086](https://github.com/stripe/stripe-php/pull/2086) Update generated code for private-preview
  * Add support for new resources `V2.Billing.ContractPricingLineQuantityChange`, `V2.Core.Health.AlertHistoryEntry`, `V2.Core.Health.Alert`, `V2.MoneyManagement.FinancialAddressDebitSimulation`, and `V2.MoneyManagement.PayoutIntent`
  * ⚠️ Remove support for resource `V2.Billing.ContractLicensePricingQuantityChange`
  * Add support for `report_offer_acceptance` method on resource `Issuing.CreditUnderwritingRecord`
  * Add support for `provisional_credit` test helper method on resource `Issuing.Dispute`
  * Add support for `report_early_fraud_warning` method on resource `PaymentAttemptRecord`
  * Add support for `search` method on resource `PaymentRecord`
  * Add support for `debit` method on resource `V2.MoneyManagement.FinancialAddressDebitSimulation`
  * Add support for `all`, `cancel`, `create`, `retrieve`, and `update` methods on resource `V2.MoneyManagement.PayoutIntent`
  * Add support for `all` and `retrieve` methods on resource `V2.Core.Health.Alert`
  * Add support for `delete` method on resource `V2.Billing.Contract`
  * ⚠️ Remove support for `performance_location_details` on `Tax.TransactionLineItem`
  * Add support for `financial_accounts_transactions`, `financial_accounts`, and `recipients_list` on `AccountSession.components` and `AccountSession.create().$params.component`
  * Add support for `location` and `reader` on `Charge.payment_method_details.gift_card`, `GiftCardOperation`, `PaymentAttemptRecord.payment_method_details.gift_card`, and `PaymentRecord.payment_method_details.gift_card`
  * Add support for `subscription` on `Checkout\Session.create().$params.item`
  * Add support for `items` on `Checkout.Session`
  * Add support for `brand` on `Checkout.Session.current_attempt.payment_method_details.card`
  * Add support for `network_data` on `Issuing\Authorization.capture().$params` and `Issuing\Transaction.create_force_capture().$params`
  * Add support for `enriched_merchant_data` on `Issuing.Authorization`
  * Add support for `available_balance` and `current_balance` on `Issuing.Authorization.balance_response`
  * ⚠️ Remove support for `amount` on `Issuing.Authorization.balance_response`
  * Add support for `decision_deadline_updated_at` on `Issuing.CreditUnderwritingRecord`
  * Add support for `acquirer_reference_number` on `Issuing.Transaction.network_data`
  * Change `PaymentAttemptRecord.report_refund().$params.outcome` and `PaymentRecord.report_refund().$params.outcome` to be optional
  * Add support for `tip` on `PaymentIntent.capture().$params.amount_detail`, `PaymentIntent.confirm().$params.amount_detail`, `PaymentIntent.create().$params.amount_detail`, `PaymentIntent.decrement_authorization().$params.amount_detail`, `PaymentIntent.increment_authorization().$params.amount_detail`, and `PaymentIntent.update().$params.amount_detail`
  * Add support for `billing_cycle_anchor` on `V2.Billing.Contract` and `V2\Billing\Contract.create().$params`
  * ⚠️ Remove support for `contract_line_details`, `contract_value_details`, and `license_quantities` on `V2.Billing.Contract`
  * Add support for `bill_settings_details` on `V2.Billing.Contract.billing_settings` and `V2\Billing\Contract.create().$params.billing_setting`
  * Add support for `billing_profile_details` and `collection_settings_details` on `V2.Billing.Contract.billing_settings`
  * ⚠️ Remove support for `contract_billing_details` on `V2.Billing.Contract.billing_settings` and `V2\Billing\Contract.create().$params.billing_setting`
  * ⚠️ Change type of `V2.Billing.Contract.one_time_fees` from `array(an object)` to `an object`
  * ⚠️ Change type of `V2.Billing.Contract.pricing_lines` from `array(an object)` to `an object`
  * ⚠️ Change type of `V2.Billing.Contract.pricing_overrides` from `array(an object)` to `an object`
  * ⚠️ Change `V2.Billing.Contract.pricing_lines` to be optional
  * ⚠️ Change `V2.Billing.Contract.pricing_overrides` to be optional
  * Add support for `mode` on `V2.Commerce.ProductCatalogImport`
  * Add support for new value `money_manager` on enums `EventsV2CoreAccountLinkReturnedEvent.configurations`, `V2.Core.AccountLink.use_case.account_onboarding.configurations`, and `V2.Core.AccountLink.use_case.account_update.configurations`
  * ⚠️ Add support for new value `money_manager` on enum `V2.Core.Account.applied_configurations`
  * ⚠️ Remove support for value `storer` from enum `V2.Core.Account.applied_configurations`
  * Add support for `money_manager` on `V2.Core.Account.configuration`, `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.configuration`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.configuration`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
  * ⚠️ Remove support for `storer` on `V2.Core.Account.configuration`, `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.configuration`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.configuration`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
  * Add support for `sunbit_payments` on `V2.Core.Account.configuration.merchant.capabilities`, `V2\Core\Account.create().$params.configuration.merchant.capability`, and `V2\Core\Account.update().$params.configuration.merchant.capability`
  * Add support for `ach`, `becs`, `eft`, `fedwire`, `fps`, `npp`, `rtp`, `sepa_credit`, `sepa_instant`, and `swift` on `V2.Core.Account.configuration.recipient.capabilities.bank_accounts`, `V2\Core\Account.create().$params.configuration.recipient.capability.bank_account`, and `V2\Core\Account.update().$params.configuration.recipient.capability.bank_account`
  * Add support for new values `bank_accounts.ach`, `bank_accounts.becs`, `bank_accounts.eft`, `bank_accounts.fedwire`, `bank_accounts.fps`, `bank_accounts.npp`, `bank_accounts.rtp`, `bank_accounts.sepa_credit`, `bank_accounts.sepa_instant`, `bank_accounts.swift`, `business_storage.inbound.eur`, `business_storage.inbound.gbp`, `business_storage.inbound.usd`, `business_storage.outbound.eur`, `business_storage.outbound.gbp`, `business_storage.outbound.usd`, `consumer_storage.inbound.usd`, `consumer_storage.outbound.usd`, `received_credits.bank_accounts`, and `received_debits.bank_accounts` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for new value `money_manager` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].configuration` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].configuration`
  * Add support for `consumer_money_manager` on `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service`
  * Add support for `crypto_money_manager` on `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
  * ⚠️ Remove support for `consumer_storer` on `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service`
  * ⚠️ Remove support for `crypto_storer` on `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
  * ⚠️ Remove support for `maximum_rps` on `V2.Core.BatchJob` and `V2\Core\BatchJob.create().$params`
  * Add support for `bic` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
  * ⚠️ Remove support for `swift_code` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
  * Add support for `attachment` on `V2.MoneyManagement.OutboundPayment.delivery_options.paper_check` and `V2\MoneyManagement\OutboundPayment.create().$params.delivery_option.paper_check`
  * Add support for `processing` on `V2.MoneyManagement.OutboundPayment.status_details` and `V2.MoneyManagement.OutboundTransfer.status_details`
  * Add support for new values `fx_rate_drift_exceeded_after_review` and `review_rejected` on enum `V2.MoneyManagement.OutboundPayment.status_details.failed.reason`
  * Add support for `payout_method_options` on `V2.MoneyManagement.OutboundPayment.to`, `V2.MoneyManagement.OutboundTransfer.to`, `V2\MoneyManagement\OutboundPayment.create().$params.to`, and `V2\MoneyManagement\OutboundTransfer.create().$params.to`
  * Add support for new values `fx_rate_drift_exceeded_after_review` and `review_rejected` on enum `V2.MoneyManagement.OutboundTransfer.status_details.failed.reason`
  * Add support for `account_holder_name` on `V2.MoneyManagement.ReceivedCredit.bank_transfer.us_bank_account`
  * Add support for `returned` on `V2.MoneyManagement.ReceivedDebit.status_details`
  * Add support for new value `capability_inactive` on enum `V2.MoneyManagement.ReceivedDebit.status_details.failed.reason`
  * Add support for `returned_at` on `V2.MoneyManagement.ReceivedDebit.status_transitions`
  * Add support for `payout_intent` on `V2\MoneyManagement\OutboundPayment.create().$params`
  * Add support for `statuses` on `V2\MoneyManagement\FinancialAccount.all().$params`
  * ⚠️ Remove support for `status` on `V2\MoneyManagement\FinancialAccount.all().$params`
  * Change `V2\Core\BatchJob.create().$params.metadata` to be optional
  * Add support for `include` on `V2\Billing\Contract.all().$params`
  * ⚠️ Remove support for `contract_lines` on `V2\Billing\Contract.create().$params`
  * ⚠️ Remove support for `license_quantity_actions` on `V2\Billing\Contract.create().$params` and `V2\Billing\Contract.update().$params`
  * ⚠️ Add support for `billing_profile_details` and `collection_settings_details` on `V2\Billing\Contract.create().$params.billing_setting`
  * ⚠️ Add support for `amount`, `bill_at`, and `product` on `V2\Billing\Contract.create().$params.one_time_fee`
  * Add support for `lookup_key` on `V2\Billing\Contract.create().$params.one_time_fee`
  * ⚠️ Remove support for `bill_schedule`, `billable_item_type`, and `product_details` on `V2\Billing\Contract.create().$params.one_time_fee`
  * Add support for `pricing_overrides` and `quantity_changes` on `V2\Billing\Contract.create().$params.pricing_line.pricing.price_detail` and `V2\Billing\Contract.update().$params.pricing_line_action.add.pricing.price_detail`
  * ⚠️ Remove support for `quantity` on `V2\Billing\Contract.create().$params.pricing_line.pricing.price_detail` and `V2\Billing\Contract.update().$params.pricing_line_action.add.pricing.price_detail`
  * ⚠️ Remove support for `overwrite_price` on `V2\Billing\Contract.create().$params.pricing_override`
  * Add support for `pricing_line_ids` and `pricing_line_lookup_keys` on `V2\Billing\Contract.create().$params.pricing_override.multiplier.criterion` and `V2\Billing\Contract.update().$params.pricing_override_action.add.multiplier.criterion`
  * ⚠️ Remove support for `billable_item_ids`, `billable_item_lookup_keys`, `billable_item_types`, `metadata_conditions`, and `rate_card_ids` on `V2\Billing\Contract.create().$params.pricing_override.multiplier.criterion` and `V2\Billing\Contract.update().$params.pricing_override_action.add.multiplier.criterion`
  * ⚠️ Change type of `V2\Billing\Contract.create().$params.pricing_override.type` and `V2\Billing\Contract.update().$params.pricing_override_action.add.type` from `enum('multiplier'|'overwrite_price')` to `literal('multiplier')`
  * Change `V2\Billing\Contract.create().$params.pricing_overrides` to be optional
  * Change `V2\Billing\Contract.create().$params.pricing_override.multiplier.criteria` to be optional
  * Add support for `pricing` on `V2\Billing\Contract.update().$params.pricing_line_action.update`
  * ⚠️ Remove support for `price` on `V2\Billing\Contract.update().$params.pricing_override_action.add.overwrite_price`
  * Add support for `cancel_pricing_lines` and `proration_behavior` on `V2\Billing\Contract.cancel().$params`
  * Add support for new value `sunbit_payments` on enum `EventsV2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent.updated_capability`
  * Add support for new values `bank_accounts.ach`, `bank_accounts.becs`, `bank_accounts.eft`, `bank_accounts.fedwire`, `bank_accounts.fps`, `bank_accounts.npp`, `bank_accounts.rtp`, `bank_accounts.sepa_credit`, `bank_accounts.sepa_instant`, and `bank_accounts.swift` on enum `EventsV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent.updated_capability`
  * Add support for event notifications `V2CoreAccountIncludingConfigurationMoneyManagerCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationMoneyManagerUpdatedEvent` with related object `V2.Core.Account`
  * Add support for event notifications `V2MoneyManagementDebitDisputeFailedEvent`, `V2MoneyManagementDebitDisputeSubmittedEvent`, and `V2MoneyManagementDebitDisputeSucceededEvent` with related object `V2.MoneyManagement.DebitDispute`
  * Add support for event notification `V2MoneyManagementOutboundPaymentUnderReviewEvent` with related object `V2.MoneyManagement.OutboundPayment`
  * Add support for event notification `V2MoneyManagementOutboundTransferUnderReviewEvent` with related object `V2.MoneyManagement.OutboundTransfer`
  * ⚠️ Remove support for event notifications `V2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationStorerUpdatedEvent` with related object `V2.Core.Account`

## 20.3.0-alpha.4 - 2026-06-17
* ⚠️ [#2083](https://github.com/stripe/stripe-php/pull/2083) Update generated code for private-preview
  * Add support for `retrieve` method on resource `Radar.CustomerEvaluation`
  * Add support for `disable_stripe_user_authentication` on `AccountSession.components.bills.features`
  * Add support for `tamara` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentMethod.create().$params`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, `SetupIntent.update().$params.payment_method_datum`, and `SharedPayment.GrantedToken.payment_method_details`
  * Add support for `status` on `Charge.payment_method_details.card.account_funding`
  * ⚠️ Remove support for `processed_transaction_type` on `Charge.payment_method_details.card.account_funding`
  * Add support for `items` on `Checkout\Session.create().$params`
  * ⚠️ Remove support for `brand` on `Checkout.Session.current_attempt.payment_method_details.card`
  * ⚠️ Remove support for `first6` on `ConfirmationToken.payment_method_preview.gift_card`, `PaymentMethod.gift_card`, and `SharedPayment.GrantedToken.payment_method_details.gift_card`
  * Add support for new value `tamara` on enums `ConfirmationToken.payment_method_preview.type`, `PaymentMethod.type`, and `SharedPayment.GrantedToken.payment_method_details.type`
  * Add support for `fingerprint` on `GiftCard`
  * Add support for `blik` on `Mandate.payment_method_details`
  * Add support for `buyer_id` on `Order.create().$params.payment.setting.payment_method_option.wechat_pay`, `Order.payment.settings.payment_method_options.wechat_pay`, `Order.update().$params.payment.setting.payment_method_option.wechat_pay`, `PaymentIntent.confirm().$params.payment_method_option.wechat_pay`, `PaymentIntent.create().$params.payment_method_option.wechat_pay`, `PaymentIntent.payment_method_options.wechat_pay`, and `PaymentIntent.update().$params.payment_method_option.wechat_pay`
  * Add support for new value `mini_program` on enums `Order.payment.settings.payment_method_options.wechat_pay.client` and `PaymentIntent.payment_method_options.wechat_pay.client`
  * Add support for `payment_method_details` on `PaymentAttemptRecord.report_guaranteed().$params` and `PaymentRecord.report_payment_attempt_guaranteed().$params`
  * Add support for `failed` and `refund_group` on `PaymentAttemptRecord.report_refund().$params` and `PaymentRecord.report_refund().$params`
  * Change type of `PaymentAttemptRecord.report_refund().$params.outcome` and `PaymentRecord.report_refund().$params.outcome` from `literal('refunded')` to `enum('failed'|'refunded')`
  * Add support for `beneficiary_details` on `PaymentIntent.confirm().$params.payment_detail.money_service`, `PaymentIntent.create().$params.payment_detail.money_service`, `PaymentIntent.payment_details.money_services`, and `PaymentIntent.update().$params.payment_detail.money_service`
  * ⚠️ Remove support for `beneficiary_account` and `beneficiary_details` on `PaymentIntent.confirm().$params.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_detail.money_service.account_funding`, `PaymentIntent.payment_details.money_services.account_funding`, and `PaymentIntent.update().$params.payment_detail.money_service.account_funding`
  * ⚠️ Remove support for `sender_account` on `PaymentIntent.confirm().$params.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_detail.money_service.account_funding`, and `PaymentIntent.update().$params.payment_detail.money_service.account_funding`
  * Add support for `given_name` and `surname` on `PaymentIntent.confirm().$params.payment_detail.money_service.account_funding.sender_detail`, `PaymentIntent.create().$params.payment_detail.money_service.account_funding.sender_detail`, `PaymentIntent.payment_details.money_services.account_funding.sender_details`, and `PaymentIntent.update().$params.payment_detail.money_service.account_funding.sender_detail`
  * ⚠️ Remove support for `name` on `PaymentIntent.confirm().$params.payment_detail.money_service.account_funding.sender_detail`, `PaymentIntent.create().$params.payment_detail.money_service.account_funding.sender_detail`, `PaymentIntent.payment_details.money_services.account_funding.sender_details`, and `PaymentIntent.update().$params.payment_detail.money_service.account_funding.sender_detail`
  * Change type of `PaymentIntent.confirm().$params.payment_method_option.card.capture_method`, `PaymentIntent.create().$params.payment_method_option.card.capture_method`, and `PaymentIntent.update().$params.payment_method_option.card.capture_method` from `literal('manual')` to `enum('automatic_delayed'|'manual')`
  * ⚠️ Remove support for `wallet` on `PaymentIntent.confirm().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.confirm().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.update().$params.payment_method_option.card.payment_detail.money_service.account_funding`, and `PaymentIntent.update().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`
  * Add support for `transaction_verification_options` on `PaymentIntent.confirm().$params.payment_method_option.crypto`, `PaymentIntent.create().$params.payment_method_option.crypto`, `PaymentIntent.payment_method_options.crypto`, and `PaymentIntent.update().$params.payment_method_option.crypto`
  * Change type of `PaymentIntent.simulate_crypto_deposit().$params.token_currency` from `literal('usdc')` to `enum('usdc'|'usdg'|'usdp')`
  * Add support for `forced_capture` on `PaymentIntent.advanced_feature_details`
  * Add support for new value `tamara` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
  * Add support for `wechat_pay_handle_app_redirect` on `PaymentIntent.next_action` and `SetupIntent.next_action`
  * Add support for `ethereum` and `polygon` on `PaymentIntent.next_action.crypto_display_details.deposit_addresses`
  * ⚠️ Change type of `PaymentIntent.next_action.crypto_display_details.deposit_addresses.base.supported_tokens[].token_currency`, `PaymentIntent.next_action.crypto_display_details.deposit_addresses.solana.supported_tokens[].token_currency`, and `PaymentIntent.next_action.crypto_display_details.deposit_addresses.tempo.supported_tokens[].token_currency` from `literal('usdc')` to `enum('usdc'|'usdg'|'usdp')`
  * Add support for `beneficiary_account` on `PaymentIntent.payment_details.money_services`
  * ⚠️ Change type of `PaymentIntent.payment_method_options.card.capture_method` from `literal('manual')` to `enum('automatic_delayed'|'manual')`
  * Add support for new value `automatic_delayed` on enum `PaymentIntent.payment_method_options.card_present.capture_method`
  * Add support for new values `ethereum` and `polygon` on enum `PaymentIntent.payment_method_options.crypto.deposit_options.networks`
  * Change type of `PaymentLocation.update().$params.business_registration.siret` from `string` to `emptyable(string)`
  * Add support for `card` on `PaymentRecord.report_payment().$params.payment_method_detail` and `PaymentRecord.report_payment_attempt().$params.payment_method_detail`
  * Change type of `PaymentRecord.report_payment().$params.payment_method_detail.type` and `PaymentRecord.report_payment_attempt().$params.payment_method_detail.type` from `literal('custom')` to `enum('card'|'custom')`
  * Add support for `managed_payments` on `Product`
  * Add support for `payment_attempt_record` on `Refund.all().$params` and `Refund.create().$params`
  * Add support for `payment_record` on `Refund.all().$params`
  * Add support for `protections` on `V2.Core.Account.configuration.card_creator.capabilities.commercial.celtic.charge_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.celtic.spend_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.cross_river_bank.charge_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.cross_river_bank.prepaid_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.cross_river_bank.spend_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.fifth_third.charge_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.lead.prepaid_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.stripe.charge_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.stripe.prepaid_card`, `V2.Core.Account.configuration.card_creator.capabilities.consumer.celtic.revolving_credit_card`, `V2.Core.Account.configuration.card_creator.capabilities.consumer.cross_river_bank.prepaid_card`, `V2.Core.Account.configuration.card_creator.capabilities.consumer.lead.debit_card`, `V2.Core.Account.configuration.card_creator.capabilities.consumer.lead.prepaid_card`, `V2.Core.Account.configuration.customer.capabilities.automatic_indirect_tax`, `V2.Core.Account.configuration.merchant.capabilities.ach_debit_payments`, `V2.Core.Account.configuration.merchant.capabilities.acss_debit_payments`, `V2.Core.Account.configuration.merchant.capabilities.affirm_payments`, `V2.Core.Account.configuration.merchant.capabilities.afterpay_clearpay_payments`, `V2.Core.Account.configuration.merchant.capabilities.alma_payments`, `V2.Core.Account.configuration.merchant.capabilities.amazon_pay_payments`, `V2.Core.Account.configuration.merchant.capabilities.au_becs_debit_payments`, `V2.Core.Account.configuration.merchant.capabilities.bacs_debit_payments`, `V2.Core.Account.configuration.merchant.capabilities.bancontact_payments`, `V2.Core.Account.configuration.merchant.capabilities.blik_payments`, `V2.Core.Account.configuration.merchant.capabilities.boleto_payments`, `V2.Core.Account.configuration.merchant.capabilities.card_payments`, `V2.Core.Account.configuration.merchant.capabilities.cartes_bancaires_payments`, `V2.Core.Account.configuration.merchant.capabilities.cashapp_payments`, `V2.Core.Account.configuration.merchant.capabilities.eps_payments`, `V2.Core.Account.configuration.merchant.capabilities.fpx_payments`, `V2.Core.Account.configuration.merchant.capabilities.gb_bank_transfer_payments`, `V2.Core.Account.configuration.merchant.capabilities.grabpay_payments`, `V2.Core.Account.configuration.merchant.capabilities.ideal_payments`, `V2.Core.Account.configuration.merchant.capabilities.jcb_payments`, `V2.Core.Account.configuration.merchant.capabilities.jp_bank_transfer_payments`, `V2.Core.Account.configuration.merchant.capabilities.kakao_pay_payments`, `V2.Core.Account.configuration.merchant.capabilities.klarna_payments`, `V2.Core.Account.configuration.merchant.capabilities.konbini_payments`, `V2.Core.Account.configuration.merchant.capabilities.kr_card_payments`, `V2.Core.Account.configuration.merchant.capabilities.link_payments`, `V2.Core.Account.configuration.merchant.capabilities.mobilepay_payments`, `V2.Core.Account.configuration.merchant.capabilities.multibanco_payments`, `V2.Core.Account.configuration.merchant.capabilities.mx_bank_transfer_payments`, `V2.Core.Account.configuration.merchant.capabilities.naver_pay_payments`, `V2.Core.Account.configuration.merchant.capabilities.oxxo_payments`, `V2.Core.Account.configuration.merchant.capabilities.p24_payments`, `V2.Core.Account.configuration.merchant.capabilities.pay_by_bank_payments`, `V2.Core.Account.configuration.merchant.capabilities.payco_payments`, `V2.Core.Account.configuration.merchant.capabilities.paynow_payments`, `V2.Core.Account.configuration.merchant.capabilities.promptpay_payments`, `V2.Core.Account.configuration.merchant.capabilities.revolut_pay_payments`, `V2.Core.Account.configuration.merchant.capabilities.samsung_pay_payments`, `V2.Core.Account.configuration.merchant.capabilities.sepa_bank_transfer_payments`, `V2.Core.Account.configuration.merchant.capabilities.sepa_debit_payments`, `V2.Core.Account.configuration.merchant.capabilities.stripe_balance.payouts`, `V2.Core.Account.configuration.merchant.capabilities.swish_payments`, `V2.Core.Account.configuration.merchant.capabilities.twint_payments`, `V2.Core.Account.configuration.merchant.capabilities.us_bank_transfer_payments`, `V2.Core.Account.configuration.merchant.capabilities.zip_payments`, `V2.Core.Account.configuration.recipient.capabilities.bank_accounts.instant`, `V2.Core.Account.configuration.recipient.capabilities.bank_accounts.local`, `V2.Core.Account.configuration.recipient.capabilities.bank_accounts.wire`, `V2.Core.Account.configuration.recipient.capabilities.cards`, `V2.Core.Account.configuration.recipient.capabilities.crypto_wallets`, `V2.Core.Account.configuration.recipient.capabilities.paper_checks`, `V2.Core.Account.configuration.recipient.capabilities.stripe_balance.payouts`, `V2.Core.Account.configuration.recipient.capabilities.stripe_balance.stripe_transfers`, `V2.Core.Account.configuration.storer.capabilities.consumer.holds_currencies.usd`, `V2.Core.Account.configuration.storer.capabilities.financial_addresses.bank_accounts`, `V2.Core.Account.configuration.storer.capabilities.financial_addresses.crypto_wallets`, `V2.Core.Account.configuration.storer.capabilities.holds_currencies.eur`, `V2.Core.Account.configuration.storer.capabilities.holds_currencies.gbp`, `V2.Core.Account.configuration.storer.capabilities.holds_currencies.usd`, `V2.Core.Account.configuration.storer.capabilities.holds_currencies.usdc`, `V2.Core.Account.configuration.storer.capabilities.inbound_transfers.bank_accounts`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments.bank_accounts`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments.cards`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments.crypto_wallets`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments.financial_accounts`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments.paper_checks`, `V2.Core.Account.configuration.storer.capabilities.outbound_transfers.bank_accounts`, `V2.Core.Account.configuration.storer.capabilities.outbound_transfers.crypto_wallets`, `V2.Core.Account.configuration.storer.capabilities.outbound_transfers.financial_accounts`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.celtic.charge_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.celtic.spend_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.cross_river_bank.charge_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.cross_river_bank.prepaid_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.cross_river_bank.spend_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.fifth_third.charge_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.lead.prepaid_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.stripe.charge_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.stripe.prepaid_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.consumer.celtic.revolving_credit_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.consumer.cross_river_bank.prepaid_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.consumer.lead.debit_card`, `V2\Core\Account.create().$params.configuration.card_creator.capability.consumer.lead.prepaid_card`, `V2\Core\Account.create().$params.configuration.customer.capability.automatic_indirect_tax`, `V2\Core\Account.create().$params.configuration.merchant.capability.ach_debit_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.acss_debit_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.affirm_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.afterpay_clearpay_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.alma_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.amazon_pay_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.au_becs_debit_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.bacs_debit_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.bancontact_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.blik_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.boleto_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.card_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.cartes_bancaires_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.cashapp_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.eps_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.fpx_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.gb_bank_transfer_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.grabpay_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.ideal_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.jcb_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.jp_bank_transfer_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.kakao_pay_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.klarna_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.konbini_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.kr_card_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.link_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.mobilepay_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.multibanco_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.mx_bank_transfer_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.naver_pay_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.oxxo_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.p24_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.pay_by_bank_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.payco_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.paynow_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.promptpay_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.revolut_pay_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.samsung_pay_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.sepa_bank_transfer_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.sepa_debit_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.swish_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.twint_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.us_bank_transfer_payment`, `V2\Core\Account.create().$params.configuration.merchant.capability.zip_payment`, `V2\Core\Account.create().$params.configuration.recipient.capability.bank_account.instant`, `V2\Core\Account.create().$params.configuration.recipient.capability.bank_account.local`, `V2\Core\Account.create().$params.configuration.recipient.capability.bank_account.wire`, `V2\Core\Account.create().$params.configuration.recipient.capability.card`, `V2\Core\Account.create().$params.configuration.recipient.capability.crypto_wallet`, `V2\Core\Account.create().$params.configuration.recipient.capability.paper_check`, `V2\Core\Account.create().$params.configuration.recipient.capability.stripe_balance.stripe_transfer`, `V2\Core\Account.create().$params.configuration.storer.capability.consumer.holds_currency.usd`, `V2\Core\Account.create().$params.configuration.storer.capability.financial_address.bank_account`, `V2\Core\Account.create().$params.configuration.storer.capability.financial_address.crypto_wallet`, `V2\Core\Account.create().$params.configuration.storer.capability.holds_currency.eur`, `V2\Core\Account.create().$params.configuration.storer.capability.holds_currency.gbp`, `V2\Core\Account.create().$params.configuration.storer.capability.holds_currency.usd`, `V2\Core\Account.create().$params.configuration.storer.capability.holds_currency.usdc`, `V2\Core\Account.create().$params.configuration.storer.capability.inbound_transfer.bank_account`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_payment.bank_account`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_payment.card`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_payment.crypto_wallet`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_payment.financial_account`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_payment.paper_check`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_transfer.bank_account`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_transfer.crypto_wallet`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_transfer.financial_account`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.celtic.charge_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.celtic.spend_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.cross_river_bank.charge_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.cross_river_bank.prepaid_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.cross_river_bank.spend_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.fifth_third.charge_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.lead.prepaid_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.stripe.charge_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.stripe.prepaid_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.consumer.celtic.revolving_credit_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.consumer.cross_river_bank.prepaid_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.consumer.lead.debit_card`, `V2\Core\Account.update().$params.configuration.card_creator.capability.consumer.lead.prepaid_card`, `V2\Core\Account.update().$params.configuration.customer.capability.automatic_indirect_tax`, `V2\Core\Account.update().$params.configuration.merchant.capability.ach_debit_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.acss_debit_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.affirm_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.afterpay_clearpay_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.alma_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.amazon_pay_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.au_becs_debit_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.bacs_debit_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.bancontact_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.blik_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.boleto_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.card_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.cartes_bancaires_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.cashapp_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.eps_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.fpx_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.gb_bank_transfer_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.grabpay_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.ideal_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.jcb_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.jp_bank_transfer_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.kakao_pay_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.klarna_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.konbini_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.kr_card_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.link_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.mobilepay_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.multibanco_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.mx_bank_transfer_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.naver_pay_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.oxxo_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.p24_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.pay_by_bank_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.payco_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.paynow_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.promptpay_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.revolut_pay_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.samsung_pay_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.sepa_bank_transfer_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.sepa_debit_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.swish_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.twint_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.us_bank_transfer_payment`, `V2\Core\Account.update().$params.configuration.merchant.capability.zip_payment`, `V2\Core\Account.update().$params.configuration.recipient.capability.bank_account.instant`, `V2\Core\Account.update().$params.configuration.recipient.capability.bank_account.local`, `V2\Core\Account.update().$params.configuration.recipient.capability.bank_account.wire`, `V2\Core\Account.update().$params.configuration.recipient.capability.card`, `V2\Core\Account.update().$params.configuration.recipient.capability.crypto_wallet`, `V2\Core\Account.update().$params.configuration.recipient.capability.paper_check`, `V2\Core\Account.update().$params.configuration.recipient.capability.stripe_balance.stripe_transfer`, `V2\Core\Account.update().$params.configuration.storer.capability.consumer.holds_currency.usd`, `V2\Core\Account.update().$params.configuration.storer.capability.financial_address.bank_account`, `V2\Core\Account.update().$params.configuration.storer.capability.financial_address.crypto_wallet`, `V2\Core\Account.update().$params.configuration.storer.capability.holds_currency.eur`, `V2\Core\Account.update().$params.configuration.storer.capability.holds_currency.gbp`, `V2\Core\Account.update().$params.configuration.storer.capability.holds_currency.usd`, `V2\Core\Account.update().$params.configuration.storer.capability.holds_currency.usdc`, `V2\Core\Account.update().$params.configuration.storer.capability.inbound_transfer.bank_account`, `V2\Core\Account.update().$params.configuration.storer.capability.outbound_payment.bank_account`, `V2\Core\Account.update().$params.configuration.storer.capability.outbound_payment.card`, `V2\Core\Account.update().$params.configuration.storer.capability.outbound_payment.crypto_wallet`, `V2\Core\Account.update().$params.configuration.storer.capability.outbound_payment.financial_account`, `V2\Core\Account.update().$params.configuration.storer.capability.outbound_payment.paper_check`, `V2\Core\Account.update().$params.configuration.storer.capability.outbound_transfer.bank_account`, `V2\Core\Account.update().$params.configuration.storer.capability.outbound_transfer.crypto_wallet`, and `V2\Core\Account.update().$params.configuration.storer.capability.outbound_transfer.financial_account`

## 20.3.0-alpha.3 - 2026-06-10
This release changes the pinned API version to `2026-06-10.preview`.

* ⚠️ [#2082](https://github.com/stripe/stripe-php/pull/2082) Update generated code for private-preview
  * Add support for new resources `GiftCardOperation`, `GiftCard`, and `TaxFund`
  * Add support for `retrieve` method on resource `GiftCardOperation`
  * Add support for `activate`, `cashout`, `check_balance`, `create`, `reload`, `retrieve`, and `void_operation` methods on resource `GiftCard`
  * Add support for `all` and `retrieve` methods on resource `TaxFund`
  * Add support for `update_crypto_refund_address` method on resource `PaymentIntent`
  * Add support for `performance_location_details` on `Tax.CalculationLineItem`, `Tax.TransactionLineItem`, and `Tax\Calculation.create().$params.line_item`
  * ⚠️ Remove support for `money_services` on `Charge.capture().$params.payment_detail`, `Charge.update().$params.payment_detail`, and `PaymentIntent.capture().$params.payment_detail`
  * Add support for `fr_meal_voucher` on `Charge.payment_method_details.card.benefits`
  * Add support for `multicapture` on `Charge.payment_method_details.card_present`, `ConfirmationToken.payment_method_preview.card.generated_from.payment_method_details.card_present`, `PaymentAttemptRecord.payment_method_details.card_present`, `PaymentMethod.card.generated_from.payment_method_details.card_present`, and `PaymentRecord.payment_method_details.card_present`
  * Add support for `pix` on `Checkout.Session.current_attempt.payment_method_details`
  * Add support for new value `jaywan` on enum `Checkout.Session.current_attempt.payment_method_details.card.brand`
  * Add support for `provisional_credit` on `Issuing.Dispute` and `Issuing\Dispute.update().$params`
  * Add support for `reason` on `PaymentAttemptRecord.report_canceled().$params` and `PaymentRecord.report_payment_attempt_canceled().$params`
  * Add support for `fiserv_valuelink`, `givex`, and `svs` on `PaymentAttemptRecord.processor_details` and `PaymentRecord.processor_details`
  * ⚠️ Change type of `PaymentAttemptRecord.processor_details.type` and `PaymentRecord.processor_details.type` from `literal('custom')` to `enum('custom'|'fiserv_valuelink'|'givex'|'svs')`
  * Add support for `capture_by` and `capture_delay` on `PaymentIntent.confirm().$params.payment_method_option.card_present`, `PaymentIntent.confirm().$params.payment_method_option.card`, `PaymentIntent.create().$params.payment_method_option.card_present`, `PaymentIntent.create().$params.payment_method_option.card`, `PaymentIntent.payment_method_options.card_present`, `PaymentIntent.payment_method_options.card`, `PaymentIntent.update().$params.payment_method_option.card_present`, and `PaymentIntent.update().$params.payment_method_option.card`
  * ⚠️ Remove support for `liquid_asset` on `PaymentIntent.confirm().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.confirm().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.update().$params.payment_method_option.card.payment_detail.money_service.account_funding`, and `PaymentIntent.update().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`
  * Add support for `request_multicapture` on `PaymentIntent.confirm().$params.payment_method_option.card_present`, `PaymentIntent.create().$params.payment_method_option.card_present`, `PaymentIntent.payment_method_options.card_present`, and `PaymentIntent.update().$params.payment_method_option.card_present`
  * Add support for `ignore_application_fee`, `ignore_transfer_data`, and `request_partial_authorization` on `PaymentIntent.confirm().$params.payment_method_option.gift_card`, `PaymentIntent.create().$params.payment_method_option.gift_card`, and `PaymentIntent.update().$params.payment_method_option.gift_card`
  * Change `PaymentIntent.confirm().$params.payment_detail.benefit.fr_meal_voucher.siret`, `PaymentIntent.create().$params.payment_detail.benefit.fr_meal_voucher.siret`, `PaymentIntent.update().$params.payment_detail.benefit.fr_meal_voucher.siret`, `SetupIntent.confirm().$params.setup_detail.benefit.fr_meal_voucher.siret`, `SetupIntent.create().$params.setup_detail.benefit.fr_meal_voucher.siret`, and `SetupIntent.update().$params.setup_detail.benefit.fr_meal_voucher.siret` to be optional
  * Add support for `latest_payment_attempt_record` and `payment_record` on `PaymentIntent`
  * ⚠️ Remove support for `reauthorization` and `reauthorize_before` on `PaymentIntent.advanced_feature_details`
  * Add support for `refund_address` on `PaymentIntent.next_action.crypto_display_details.deposit_addresses.base`, `PaymentIntent.next_action.crypto_display_details.deposit_addresses.solana`, and `PaymentIntent.next_action.crypto_display_details.deposit_addresses.tempo`
  * Add support for `location` on `PaymentIntent.payment_details` and `SetupIntent.setup_details`
  * Add support for new value `transaction_verification` on enum `PaymentIntent.payment_method_options.crypto.mode`
  * Add support for `data` on `Radar\AccountEvaluation.create().$params.login_initiated.client_device_metadata_detail`, `Radar\AccountEvaluation.create().$params.registration_initiated.client_device_metadata_detail`, and `Radar\CustomerEvaluation.create().$params.evaluation_context.client_detail`
  * Change `Radar\AccountEvaluation.create().$params.login_initiated.client_device_metadata_detail.radar_session`, `Radar\AccountEvaluation.create().$params.registration_initiated.client_device_metadata_detail.radar_session`, and `Radar\CustomerEvaluation.create().$params.evaluation_context.client_detail.radar_session` to be optional
  * Add support for new value `promotion` on enum `V2.Commerce.ProductCatalogImport.feed_type`
  * ⚠️ Change type of `V2.Core.FeeBatch.adjustments.tax_adjustment` from `amount` to `an object`
  * ⚠️ Change type of `V2.Core.FeeBatch.amount`, `V2.Core.FeeBatch.collection_records[].amount`, `V2.Core.FeeBatch.collection_records[].tax.amount`, `V2.Core.FeeBatch.tax.amount`, `V2.Core.FeeEntry.amount`, and `V2.Core.FeeEntry.tax.amount` from `amount` to `an object`
  * Add support for new value `tax_fund` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
  * Add support for `tax_fund` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
  * Add support for new value `tax_fund` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`

## 20.3.0-alpha.2 - 2026-06-03
This release changes the pinned API version to `2026-06-03.preview`.

* ⚠️ [#2074](https://github.com/stripe/stripe-php/pull/2074) Update generated code for private-preview
  * Add support for new resources `DelegatedCheckout.OrderEvent`, `DelegatedCheckout.Order`, `V2.Billing.ContractLicensePricingQuantityChange`, `V2.Billing.Contract`, and `V2.Signals.AccountSignal`
  * Add support for `retrieve` method on resource `DelegatedCheckout.Order`
  * Add support for `list_orders` method on resource `DelegatedCheckout.RequestedSession`
  * Add support for `all` and `retrieve` methods on resource `V2.Signals.AccountSignal`
  * Add support for `activate`, `all`, `cancel`, `create`, `retrieve`, and `update` methods on resource `V2.Billing.Contract`
  * Add support for `birth_address` on `Account.create().$params.individual`, `Account.update().$params.individual`, `Person.create().$params`, `Person.update().$params`, `Person`, `Token.create().$params.account.individual`, and `Token.create().$params.person`
  * Change type of `Charge.capture().$params.payment_detail.money_service.transaction_type`, `Charge.update().$params.payment_detail.money_service.transaction_type`, `PaymentIntent.capture().$params.payment_detail.money_service.transaction_type`, `PaymentIntent.confirm().$params.payment_detail.money_service.transaction_type`, `PaymentIntent.create().$params.payment_detail.money_service.transaction_type`, and `PaymentIntent.update().$params.payment_detail.money_service.transaction_type` from `literal('account_funding')` to `enum('account_funding'|'debt_repayment')`
  * Add support for new value `proserv` on enums `Checkout.Session.automatic_surcharge.provider` and `PaymentLink.automatic_surcharge.provider`
  * Add support for `provisioning_decision` and `token_type` on `Issuing.Authorization.token_details` and `Issuing.Token`
  * Add support for `token_decision_recommendation` on `Issuing.Authorization.token_details.network_data.visa` and `Issuing.Token.network_data.visa`
  * Add support for `language` on `Issuing.Token.network_data.device`
  * Add support for `digital_asset_category` on `PaymentIntent.confirm().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.confirm().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.update().$params.payment_method_option.card.payment_detail.money_service.account_funding`, and `PaymentIntent.update().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`
  * Add support for `static_address` on `PaymentIntent.confirm().$params.payment_method_option.crypto.deposit_option`, `PaymentIntent.create().$params.payment_method_option.crypto.deposit_option`, `PaymentIntent.payment_method_options.crypto.deposit_options`, and `PaymentIntent.update().$params.payment_method_option.crypto.deposit_option`
  * Add support for `payment_reference` on `PaymentIntent.create().$params.payments_orchestration`
  * ⚠️ Remove support for `payment_details` on `PaymentIntent.create().$params.payments_orchestration`
  * ⚠️ Change type of `PaymentIntent.payment_details.money_services.transaction_type` from `literal('account_funding')` to `enum('account_funding'|'debt_repayment')`
  * Add support for `ending_before`, `limit`, and `starting_after` on `PaymentLocation.all().$params`
  * ⚠️ Change `Radar\IssuingAuthorizationEvaluation.create().$params.card_detail.last4` to be required
  * Add support for `schema` on `V2.Data.Reporting.QueryRun.result.file` and `V2.Reporting.ReportRun.result.file`
  * Add support for new value `payout_method_amount_limit_exceeded` on enum `V2.MoneyManagement.OutboundPayment.status_details.failed.reason`
  * Add support for `include` on `V2\Data\Reporting\QueryRun.retrieve().$params` and `V2\Reporting\ReportRun.retrieve().$params`
  * Add support for `requirements_collector` on `V2\Core\Account.create().$params.default.responsibility` and `V2\Core\Account.update().$params.default.responsibility`
  * Add support for event notification `V2SignalsAccountSignalMerchantDelinquencyReadyEvent` with related object `V2.Signals.AccountSignal`

## 20.3.0-alpha.1 - 2026-05-27
This release changes the pinned API version to `2026-05-27.preview`.

* ⚠️ [#2073](https://github.com/stripe/stripe-php/pull/2073) Update generated code for private-preview
  * Change type of `Billing\Alert.create().$params.spend_threshold.group_by` from `literal('pricing_plan_subscription')` to `enum('billing_cadence'|'pricing_plan_subscription')`
  * ⚠️ Change type of `Billing.Alert.spend_threshold.group_by` from `literal('pricing_plan_subscription')` to `enum('billing_cadence'|'pricing_plan_subscription')`
  * Change `DelegatedCheckout.RequestedSession.affiliate_attributions` to be required
  * Add support for new value `institution_requirement` on enum `FinancialConnections.Account.status_details.inactive.cause`
  * Add support for `wechat_pay` on `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `QuotePreviewInvoice.payment_settings.payment_method_options`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
  * Add support for `gift_card` on `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, and `PaymentIntent.update().$params.payment_method_option`
  * Add support for `payment_details` on `PaymentIntent.create().$params.payments_orchestration`
  * Add support for `enabled` on `PaymentIntent.payment_details.benefit.fr_meal_voucher` and `SetupIntent.setup_details.benefit.fr_meal_voucher`
  * ⚠️ Remove support for `login_failed`, `registration_failed`, `registration_success`, and `type` on `Radar\CustomerEvaluation.update().$params`
  * ⚠️ Remove support for `latest_version` on `V2.Billing.LicenseFee`, `V2.Billing.PricingPlan`, and `V2.Billing.RateCard`
  * ⚠️ Remove support for `service_interval_count` and `service_interval` on `V2.Billing.LicenseFee` and `V2.Billing.RateCard`
  * Add support for `debit_agreement` on `V2.MoneyManagement.ReceivedCredit.stripe_balance_payment`
  * Add support for `canonical_path` on `EventsV2CoreHealthTrafficVolumeDropFiringEvent.impact` and `EventsV2CoreHealthTrafficVolumeDropResolvedEvent.impact`
  * Add support for snapshot event `PAYMENT_INTENT_EXPIRED` with resource `PaymentIntent`
  * Add support for event notifications `V2CoreHealthElementsErrorFiringEvent`, `V2CoreHealthElementsErrorResolvedEvent`, `V2CoreHealthInvoiceCountDroppedFiringEvent`, and `V2CoreHealthInvoiceCountDroppedResolvedEvent`

## 20.2.0-alpha.6 - 2026-05-20
* ⚠️ [#2068](https://github.com/stripe/stripe-php/pull/2068) Update generated code for private-preview
  * Add support for new resource `PaymentLocationCapability`
  * Add support for `all`, `retrieve`, and `update` methods on resource `PaymentLocationCapability`
  * Add support for `close` and `simulate_network_lifecycle_dispute_response` test helper methods on resource `Issuing.Dispute`
  * Change type of `DelegatedCheckout\RequestedSession.update().$params.discount.codes` from `array(string)` to `emptyable(array(string))`
  * ⚠️ Remove support for `credited_items` on `InvoiceItem.proration_details`
  * Add support for `balance_response` on `Issuing.Authorization`
  * Add support for `payment_evaluations` on `PaymentAttemptRecord.report_canceled().$params`, `PaymentAttemptRecord.report_failed().$params`, `PaymentRecord.report_payment().$params.failed`, `PaymentRecord.report_payment_attempt().$params.failed`, `PaymentRecord.report_payment_attempt_canceled().$params`, and `PaymentRecord.report_payment_attempt_failed().$params`
  * Add support for `enabled` on `PaymentIntent.confirm().$params.payment_detail.benefit.fr_meal_voucher`, `PaymentIntent.create().$params.payment_detail.benefit.fr_meal_voucher`, `PaymentIntent.update().$params.payment_detail.benefit.fr_meal_voucher`, `SetupIntent.confirm().$params.setup_detail.benefit.fr_meal_voucher`, `SetupIntent.create().$params.setup_detail.benefit.fr_meal_voucher`, and `SetupIntent.update().$params.setup_detail.benefit.fr_meal_voucher`
  * Add support for `advanced_feature_details` and `allowed_payment_method_types` on `PaymentIntent`
  * Change type of `PaymentLocation.update().$params.address.city` from `string` to `emptyable(string)`
  * Change type of `PaymentLocation.update().$params.address.line1` from `string` to `emptyable(string)`
  * Change type of `PaymentLocation.update().$params.address.line2` from `string` to `emptyable(string)`
  * Change type of `PaymentLocation.update().$params.address.postal_code` from `string` to `emptyable(string)`
  * Change type of `PaymentLocation.update().$params.address.state` from `string` to `emptyable(string)`
  * Change `Subscription.pause().$params.type` to be optional
  * ⚠️ Remove support for `payment_behavior` on `Subscription.resume().$params`
  * ⚠️ Remove support for `status_details` on `Subscription`

## 20.2.0-alpha.5 - 2026-05-13
* ⚠️ [#2067](https://github.com/stripe/stripe-php/pull/2067) Update generated code for private-preview
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

## 20.2.0-alpha.4 - 2026-05-06
* [#2066](https://github.com/stripe/stripe-php/pull/2066) Add EventNotificationHandler (private preview)
* [#2065](https://github.com/stripe/stripe-php/pull/2065) Update generated code for private-preview
  * Add support for new resource `PaymentLocation`
  * Add support for `create`, `delete`, `retrieve`, and `update` methods on resource `PaymentLocation`
  * Add support for `protections` on `Account.create().$params.capability.card_payment`, `Account.update().$params.capability.card_payment`, and `Capability`
  * Add support for `gift_card` on `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentMethod.create().$params`, `PaymentMethod`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, `SetupIntent.update().$params.payment_method_datum`, and `SharedPayment.GrantedToken.payment_method_details`
  * Add support for new value `gift_card` on enums `ConfirmationToken.payment_method_preview.type`, `PaymentMethod.type`, and `SharedPayment.GrantedToken.payment_method_details.type`
  * Add support for `metadata` on `DelegatedCheckout\RequestedSession.confirm().$params`
  * Add support for `credited_items` on `InvoiceItem.proration_details`
  * Add support for `network_lifecycle` on `Issuing.Dispute`
  * Add support for new value `gift_card` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
  * Add support for `status_details` on `Subscription`

## 20.2.0-alpha.3 - 2026-04-28
* [#2063](https://github.com/stripe/stripe-php/pull/2063) Update generated code for private-preview
  * Add support for `debit_card` on `V2.Core.Account.configuration.card_creator.capabilities.consumer.lead`, `V2.Core.Account.identity.attestations.terms_of_service.card_creator.consumer.lead`, `V2\Core\Account.create().$params.configuration.card_creator.capability.consumer.lead`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.card_creator.consumer.lead`, `V2\Core\Account.update().$params.configuration.card_creator.capability.consumer.lead`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service.card_creator.consumer.lead`
  * Add support for new value `consumer.lead.debit_card` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for new value `consumer.lead.debit_card` on enum `EventsV2CoreAccountIncludingConfigurationCardCreatorCapabilityStatusUpdatedEvent.updated_capability`

## 20.2.0-alpha.2 - 2026-04-28
* ⚠️ [#2062](https://github.com/stripe/stripe-php/pull/2062) Update generated code for private-preview
  * Add support for new resource `V2.Data.Analytics.MetricQueryResult`
  * Add support for `create`, `retrieve`, and `revoke` methods on resource `SharedPayment.IssuedToken`
  * Add support for `create` method on resource `V2.Data.Analytics.MetricQueryResult`
  * Add support for `balance_report` and `payout_reconciliation_report` on `AccountSession.components` and `AccountSession.create().$params.component`
  * Add support for `app_distribution` and `sunbit_payments` on `Account.capabilities`, `Account.create().$params.capability`, and `Account.update().$params.capability`
  * Add support for new values `fee_credit_funding`, `inbound_transfer_reversal`, and `inbound_transfer` on enum `BalanceTransaction.type`
  * Add support for `sunbit` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentMethod.create().$params`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
  * Add support for new values `phantom_cash` and `usdt` on enums `Charge.payment_method_details.crypto.token_currency`, `PaymentAttemptRecord.payment_method_details.crypto.token_currency`, and `PaymentRecord.payment_method_details.crypto.token_currency`
  * Add support for `last4` on `Charge.payment_method_details.gift_card`, `PaymentAttemptRecord.payment_method_details.gift_card`, and `PaymentRecord.payment_method_details.gift_card`
  * Add support for `location` and `reader` on `Charge.payment_method_details.klarna`, `PaymentAttemptRecord.payment_method_details.klarna`, and `PaymentRecord.payment_method_details.klarna`
  * Add support for `blik` on `Checkout\Session.create().$params.payment_method_option`, `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `QuotePreviewInvoice.payment_settings.payment_method_options`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
  * Add support for new values `fo_vat`, `gi_tin`, `it_cf`, and `py_ruc` on enums `Checkout.Session.collected_information.tax_ids[].type`, `Checkout.Session.customer_details.tax_ids[].type`, `Invoice.customer_tax_ids[].type`, `Order.tax_details.tax_ids[].type`, `QuotePreviewInvoice.customer_tax_ids[].type`, `Tax.Calculation.customer_details.tax_ids[].type`, `Tax.Transaction.customer_details.tax_ids[].type`, and `TaxId.type`
  * Change `Checkout.Session.managed_payments`, `PaymentIntent.managed_payments`, `PaymentLink.managed_payments`, and `Subscription.managed_payments` to be required
  * Add support for `shared_payment_granted_token` on `ConfirmationToken.create().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentMethod`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
  * Add support for new value `sunbit` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
  * Change type of `CreditNote.total_taxes[].tax_rate_details.tax_rate`, `CreditNoteLineItem.taxes[].tax_rate_details.tax_rate`, `Invoice.total_taxes[].tax_rate_details.tax_rate`, `InvoiceLineItem.taxes[].tax_rate_details.tax_rate`, and `QuotePreviewInvoice.total_taxes[].tax_rate_details.tax_rate` from `string` to `expandable($TaxRate)`
  * Add support for `buyer_consents` on `DelegatedCheckout\RequestedSession.confirm().$params`
  * Add support for `consents` on `DelegatedCheckout.RequestedSession.buyer_consents.marketing`
  * Add support for new value `blik` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
  * Change `Invoice.payment_settings.payment_method_options.pix`, `QuotePreviewInvoice.payment_settings.payment_method_options.pix`, and `Subscription.payment_settings.payment_method_options.pix` to be required
  * Change `Invoice.payment_settings.payment_method_options.upi`, `QuotePreviewInvoice.payment_settings.payment_method_options.upi`, and `Subscription.payment_settings.payment_method_options.upi` to be required
  * Add support for `payment_facilitator_id` and `sub_merchant_id` on `Issuing\Authorization.create().$params.merchant_datum`, `Issuing\Transaction.create_force_capture().$params.merchant_datum`, and `Issuing\Transaction.create_unlinked_refund().$params.merchant_datum`
  * Add support for `card_presence` on `Issuing.Authorization`
  * Add support for `allowed_card_presences` and `blocked_card_presences` on `Issuing.Card.spending_controls`, `Issuing.Cardholder.spending_controls`, `Issuing\Card.create().$params.spending_control`, `Issuing\Card.update().$params.spending_control`, `Issuing\Cardholder.create().$params.spending_control`, and `Issuing\Cardholder.update().$params.spending_control`
  * Add support for new value `fulfillment_error` on enum `Issuing.Card.cancellation_reason`
  * Add support for new value `fulfillment_error` on enum `Issuing.Card.replacement_reason`
  * ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.gift_card.balance` and `PaymentRecord.payment_method_details.gift_card.balance` from `PaymentFlowsPrivatePaymentMethodsGiftCardDeprecatedDetailsResourceBalanceAmount` to `nullable(PaymentsPrimitivesPaymentRecordsResourcePaymentMethodGiftCardDetailsResourceBalance)`
  * ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.gift_card.brand` and `PaymentRecord.payment_method_details.gift_card.brand` from `enum('fiserv_valuelink'|'givex'|'svs')` to `nullable(enum('fiserv_valuelink'|'givex'|'svs'))`
  * ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.gift_card.first6` and `PaymentRecord.payment_method_details.gift_card.first6` from `string` to `nullable(string)`
  * ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.gift_card.transaction_id` and `PaymentRecord.payment_method_details.gift_card.transaction_id` from `string` to `nullable(string)`
  * Add support for `amount_to_confirm` on `PaymentIntent.confirm().$params`
  * Add support for new value `sunbit` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
  * Add support for `klarna_display_qr_code` on `PaymentIntent.next_action`
  * Add support for new value `sunbit` on enum `PaymentLink.payment_method_types`
  * Add support for `validation_errors` on `Privacy.RedactionJob`
  * Add support for `tax_details` on `Product`
  * ⚠️ Change type of `Radar.PaymentEvaluation.client_device_metadata_details.radar_session` from `string` to `nullable(string)`
  * Add support for new values `low`, `not_assessed`, and `unknown` on enum `Radar.PaymentEvaluation.signals.fraudulent_payment.risk_level`
  * Add support for new value `account` on enum `Radar.ValueList.item_type`
  * Add support for `moto` on `SetupAttempt.payment_method_details.card`
  * Change `SetupIntent.next_action.pix_display_qr_code.data` to be required
  * Change `SetupIntent.next_action.pix_display_qr_code.expires_at` to be required
  * Change `SetupIntent.next_action.pix_display_qr_code.hosted_instructions_url` to be required
  * Change `SetupIntent.next_action.pix_display_qr_code.image_url_png` to be required
  * Change `SetupIntent.next_action.pix_display_qr_code.image_url_svg` to be required
  * Add support for `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on `Tax\Registration.create().$params.country_option.me`
  * Add support for `purpose` on `Treasury.OutboundPayment` and `Treasury\OutboundPayment.create().$params`
  * Add support for `crypto_wallet` on `V2.MoneyManagement.FinancialAddress.credentials`
  * Add support for `mx_bank_account` on `V2.MoneyManagement.FinancialAddress.credentials` and `V2.MoneyManagement.ReceivedCredit.bank_transfer`
  * Add support for new values `crypto_wallet` and `mx_bank_account` on enum `V2.MoneyManagement.FinancialAddress.credentials.type`
  * Add support for `crypto_wallet_transfer` on `V2.MoneyManagement.ReceivedCredit`
  * Add support for `eu_bank_account` on `V2.MoneyManagement.ReceivedCredit.bank_transfer`
  * Add support for new values `crypto_wallet`, `eu_bank_account`, and `mx_bank_account` on enum `V2.MoneyManagement.ReceivedCredit.bank_transfer.origin_type`
  * Add support for new value `crypto_wallet_transfer` on enum `V2.MoneyManagement.ReceivedCredit.type`
  * Change `V2\Payments\OffSessionPayment.capture().$params.metadata` and `V2\Payments\OffSessionPayment.create().$params.metadata` to be optional
  * Add support for `crypto_properties` and `settlement_currency` on `V2\MoneyManagement\FinancialAddress.create().$params`
  * Add support for event notifications `V2CoreApprovalRequestCreatedEvent` and `V2CoreApprovalRequestExpiredEvent` with related object `V2.Core.ApprovalRequest`
  * Add support for event notification `V2ExtendExtensionRunFailedEvent`
  * Add support for error codes `action_blocked` and `approval_required` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `QuotePreviewInvoice.last_finalization_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`

## 20.2.0-alpha.1 - 2026-04-24
This release changes the pinned API version to `2026-04-22.preview`.

* ⚠️ [#2058](https://github.com/stripe/stripe-php/pull/2058) Update generated code for private-preview
  * Add support for new resources `V2.Commerce.ProductCatalogImport`, `V2.Core.ApprovalRequest`, `V2.Extend.WorkflowRun`, `V2.Extend.Workflow`, `V2.Iam.ActivityLog`, `V2.Network.BusinessProfile`, and `V2.OrchestratedCommerce.Agreement`
  * ⚠️ Remove support for resources `V2.Core.WorkflowRun` and `V2.Core.Workflow`
  * Add support for `all`, `confirm`, `create`, `retrieve`, and `terminate` methods on resource `V2.OrchestratedCommerce.Agreement`
  * Add support for `me` and `retrieve` methods on resource `V2.Network.BusinessProfile`
  * Add support for `all` method on resource `V2.Iam.ActivityLog`
  * Add support for `all` and `retrieve` methods on resource `V2.Extend.WorkflowRun`
  * Add support for `all`, `invoke`, and `retrieve` methods on resource `V2.Extend.Workflow`
  * Add support for `all`, `cancel`, `execute`, `retrieve`, and `submit` methods on resource `V2.Core.ApprovalRequest`
  * Add support for `create` and `retrieve` methods on resource `V2.Commerce.ProductCatalogImport`
  * ⚠️ Remove support for `all` and `retrieve` methods on resource `V2.Core.WorkflowRun`
  * ⚠️ Remove support for `all`, `invoke`, and `retrieve` methods on resource `V2.Core.Workflow`
  * Add support for `renew_onboarding_link` method on resource `V2.Core.ClaimableSandbox`
  * ⚠️ Remove support for `customer` on `SharedPayment.IssuedToken`
  * Change type of `SharedPayment.IssuedToken.payment_method` from `nullable(string)` to `string`
  * Add support for `bill_management` and `send_money` on `AccountSession.components.bills.features`
  * Add support for `gift_card` on `Charge.payment_method_details`, `PaymentAttemptRecord.payment_method_details`, and `PaymentRecord.payment_method_details`
  * Add support for `custom_payment_method_types` on `Checkout.Session` and `Checkout\Session.create().$params`
  * Add support for `payment_record` on `Checkout.Session`
  * ⚠️ Remove support for `shared_payment_granted_token` on `ConfirmationToken.create().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent`, `PaymentMethod`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
  * Add support for `payment_method` on `ConfirmationToken.payment_method_preview.sepa_debit.generated_from`, `PaymentMethod.sepa_debit.generated_from`, and `SharedPayment.GrantedToken.payment_method_details.sepa_debit.generated_from`
  * Add support for `return_url` on `DelegatedCheckout\RequestedSession.confirm().$params`
  * Add support for `buyer_consents` on `DelegatedCheckout.RequestedSession`
  * ⚠️ Change type of `DelegatedCheckout.RequestedSession.fulfillment_details.fulfillment_options[].type`, `DelegatedCheckout.RequestedSession.fulfillment_details.selected_fulfillment_option.type`, and `DelegatedCheckout.RequestedSession.fulfillment_details.selected_fulfillment_option_overrides[].type` from `string` to `enum('digital'|'shipping')`
  * Add support for `crypto_transactions` on `Issuing.Authorization`, `Issuing.Dispute`, and `Issuing.Transaction`
  * Add support for `payment_facilitator_id` and `sub_merchant_id` on `Issuing.Authorization.merchant_data` and `Issuing.Transaction.merchant_data`
  * Add support for `identifiers` on `Order.create().$params.line_item.product_datum`, `Order.update().$params.line_item.product_datum`, `Product.create().$params`, `Product.update().$params`, and `Product`
  * Add support for `agent_details` on `PaymentIntent`
  * Add support for `external_reference` on `Price.create().$params` and `Price.update().$params`
  * Add support for `login_succeeded` and `registration_succeeded` on `Radar.AccountEvaluation.events[]` and `Radar\AccountEvaluation.update().$params`
  * Add support for `print_content` on `Terminal.Reader.action`
  * Add support for new value `print_content` on enum `Terminal.Reader.action.type`
  * Add support for new values `cn_bank_account` and `jp_bank_account` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
  * Add support for new values `bm_crn`, `bo_tin`, `bt_tpn`, `co_nit`, `ec_ruc`, `eg_tin`, `gh_tin`, `gy_tin`, `hn_rtn`, `jm_trn`, `jo_crn`, `ke_pin`, `ky_crn`, `lk_tin`, `mo_tin`, `mv_tin`, `ng_tin`, `pa_ruc`, `ph_tin`, `py_ruc`, `sl_tin`, `sv_nit`, `uy_ruc`, `vg_cn`, and `za_tin` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
  * Add support for new values `bm_pp`, `bo_ci`, `bt_cid`, `eg_tin`, `gh_pin`, `gy_tin`, `hn_rtn`, `jm_trn`, `jo_pin`, `ky_pp`, `lk_nic`, `mo_bir`, `mt_nic`, `mv_tin`, `pa_ruc`, `ph_tin`, `py_ruc`, `si_pin`, `sv_nit`, and `vg_pp` on enums `V2.Core.Account.identity.individual.id_numbers[].type` and `V2.Core.AccountPerson.id_numbers[].type`
  * Add support for `app_channel` on `V2.Core.ClaimableSandbox` and `V2\Core\ClaimableSandbox.create().$params`
  * Add support for `onboarding_link_details` and `owner_details` on `V2.Core.ClaimableSandbox`
  * ⚠️ Remove support for `claim_url` on `V2.Core.ClaimableSandbox`
  * ⚠️ Remove support for `owner_account` on `V2.Core.ClaimableSandbox.sandbox_details`
  * Add support for new value `live` on enum `V2.Core.ClaimableSandbox.status`
  * Add support for `snapshot_event` on `V2.Core.Event`
  * Add support for new values `futsu` and `toza` on enums `V2.Core.Vault.GbBankAccount.bank_account_type` and `V2.MoneyManagement.PayoutMethod.bank_account.bank_account_type`
  * ⚠️ Change `V2.MoneyManagement.CurrencyConversion.financial_account` to be optional
  * Add support for `multiprocessor_settlement` on `V2.MoneyManagement.FinancialAccount`
  * Add support for new value `multiprocessor_settlement` on enum `V2.MoneyManagement.FinancialAccount.type`
  * Add support for `ca_bank_account` on `V2.MoneyManagement.FinancialAddress.credentials` and `V2.MoneyManagement.ReceivedCredit.bank_transfer`
  * Add support for new value `ca_bank_account` on enum `V2.MoneyManagement.FinancialAddress.credentials.type`
  * Add support for new value `tempo` on enum `V2.MoneyManagement.PayoutMethod.crypto_wallet.network`
  * Add support for new value `ca_bank_account` on enum `V2.MoneyManagement.ReceivedCredit.bank_transfer.origin_type`
  * ⚠️ Remove support for value `return` from enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
  * Add support for `amount_details` and `payment_details` on `V2.Payments.OffSessionPayment`, `V2\Payments\OffSessionPayment.capture().$params`, and `V2\Payments\OffSessionPayment.create().$params`
  * Add support for `description` on `V2.Payments.OffSessionPayment` and `V2\Payments\OffSessionPayment.create().$params`
  * Add support for `mcc` on `V2\Payments\OffSessionPayment.create().$params.payment_method_option.card`
  * Change `V2\Payments\OffSessionPayment.create().$params.payment_method_option.card.network_transaction_id` to be optional
  * Add support for `storage` on `V2\MoneyManagement\FinancialAccount.update().$params`
  * Add support for `fx_quote` on `V2\MoneyManagement\CurrencyConversion.create().$params`
  * Change `V2\MoneyManagement\CurrencyConversion.create().$params.financial_account` to be optional
  * ⚠️ Add support for `onboarding_link_details` on `V2\Core\ClaimableSandbox.create().$params`
  * Change type of `V2\Core\BatchJob.create().$params.endpoint.http_method` from `literal('post')` to `enum('delete'|'post')`
  * Add support for new value `meter_event_value_too_many_digits` on enums `EventsV1BillingMeterErrorReportTriggeredEvent.reason.error_types[].code` and `EventsV1BillingMeterNoMeterFoundEvent.reason.error_types[].code`
  * Add support for `treasury_transaction` on `EventsV2MoneyManagementTransactionCreatedEvent`
  * Add support for event notifications `V1AccountApplicationAuthorizedEvent`, `V1AccountApplicationDeauthorizedEvent`, `V1AccountExternalAccountCreatedEvent`, `V1AccountExternalAccountDeletedEvent`, `V1AccountExternalAccountUpdatedEvent`, `V1BillingPortalSessionCreatedEvent`, `V1EntitlementsActiveEntitlementSummaryUpdatedEvent`, `V2CoreHealthMeterEventSummariesDelayedFiringEvent`, and `V2CoreHealthMeterEventSummariesDelayedResolvedEvent`
  * Add support for event notification `V1AccountUpdatedEvent` with related object `Account`
  * Add support for event notifications `V1ApplicationFeeCreatedEvent` and `V1ApplicationFeeRefundedEvent` with related object `ApplicationFee`
  * Add support for event notification `V1ApplicationFeeRefundUpdatedEvent` with related object `ApplicationFeeRefund`
  * Add support for event notification `V1BalanceAvailableEvent` with related object `Balance`
  * Add support for event notification `V1BillingAlertTriggeredEvent` with related object `Billing.Alert`
  * Add support for event notifications `V1BillingPortalConfigurationCreatedEvent` and `V1BillingPortalConfigurationUpdatedEvent` with related object `BillingPortal.Configuration`
  * Add support for event notification `V1CapabilityUpdatedEvent` with related object `Capability`
  * Add support for event notification `V1CashBalanceFundsAvailableEvent` with related object `CashBalance`
  * Add support for event notifications `V1ChargeCapturedEvent`, `V1ChargeExpiredEvent`, `V1ChargeFailedEvent`, `V1ChargePendingEvent`, `V1ChargeRefundedEvent`, `V1ChargeSucceededEvent`, and `V1ChargeUpdatedEvent` with related object `Charge`
  * Add support for event notifications `V1ChargeDisputeClosedEvent`, `V1ChargeDisputeCreatedEvent`, `V1ChargeDisputeFundsReinstatedEvent`, `V1ChargeDisputeFundsWithdrawnEvent`, and `V1ChargeDisputeUpdatedEvent` with related object `Dispute`
  * Add support for event notifications `V1ChargeRefundUpdatedEvent`, `V1RefundCreatedEvent`, `V1RefundFailedEvent`, and `V1RefundUpdatedEvent` with related object `Refund`
  * Add support for event notifications `V1CheckoutSessionAsyncPaymentFailedEvent`, `V1CheckoutSessionAsyncPaymentSucceededEvent`, `V1CheckoutSessionCompletedEvent`, and `V1CheckoutSessionExpiredEvent` with related object `Checkout.Session`
  * Add support for event notifications `V1ClimateOrderCanceledEvent`, `V1ClimateOrderCreatedEvent`, `V1ClimateOrderDelayedEvent`, `V1ClimateOrderDeliveredEvent`, and `V1ClimateOrderProductSubstitutedEvent` with related object `Climate.Order`
  * Add support for event notifications `V1ClimateProductCreatedEvent` and `V1ClimateProductPricingUpdatedEvent` with related object `Climate.Product`
  * Add support for event notifications `V1CouponCreatedEvent`, `V1CouponDeletedEvent`, and `V1CouponUpdatedEvent` with related object `Coupon`
  * Add support for event notifications `V1CreditNoteCreatedEvent`, `V1CreditNoteUpdatedEvent`, and `V1CreditNoteVoidedEvent` with related object `CreditNote`
  * Add support for event notifications `V1CustomerCreatedEvent`, `V1CustomerDeletedEvent`, and `V1CustomerUpdatedEvent` with related object `Customer`
  * Add support for event notifications `V1CustomerSubscriptionCreatedEvent`, `V1CustomerSubscriptionDeletedEvent`, `V1CustomerSubscriptionPausedEvent`, `V1CustomerSubscriptionPendingUpdateAppliedEvent`, `V1CustomerSubscriptionPendingUpdateExpiredEvent`, `V1CustomerSubscriptionResumedEvent`, `V1CustomerSubscriptionTrialWillEndEvent`, and `V1CustomerSubscriptionUpdatedEvent` with related object `Subscription`
  * Add support for event notifications `V1CustomerTaxIdCreatedEvent`, `V1CustomerTaxIdDeletedEvent`, and `V1CustomerTaxIdUpdatedEvent` with related object `TaxId`
  * Add support for event notification `V1CustomerCashBalanceTransactionCreatedEvent` with related object `CustomerCashBalanceTransaction`
  * Add support for event notification `V1FileCreatedEvent` with related object `File`
  * Add support for event notifications `V1FinancialConnectionsAccountCreatedEvent`, `V1FinancialConnectionsAccountDeactivatedEvent`, `V1FinancialConnectionsAccountDisconnectedEvent`, `V1FinancialConnectionsAccountReactivatedEvent`, `V1FinancialConnectionsAccountRefreshedBalanceEvent`, `V1FinancialConnectionsAccountRefreshedOwnershipEvent`, and `V1FinancialConnectionsAccountRefreshedTransactionsEvent` with related object `FinancialConnections.Account`
  * Add support for event notifications `V1IdentityVerificationSessionCanceledEvent`, `V1IdentityVerificationSessionCreatedEvent`, `V1IdentityVerificationSessionProcessingEvent`, `V1IdentityVerificationSessionRedactedEvent`, `V1IdentityVerificationSessionRequiresInputEvent`, and `V1IdentityVerificationSessionVerifiedEvent` with related object `Identity.VerificationSession`
  * Add support for event notifications `V1InvoiceCreatedEvent`, `V1InvoiceDeletedEvent`, `V1InvoiceFinalizationFailedEvent`, `V1InvoiceFinalizedEvent`, `V1InvoiceMarkedUncollectibleEvent`, `V1InvoiceOverdueEvent`, `V1InvoiceOverpaidEvent`, `V1InvoicePaidEvent`, `V1InvoicePaymentActionRequiredEvent`, `V1InvoicePaymentFailedEvent`, `V1InvoicePaymentSucceededEvent`, `V1InvoiceSentEvent`, `V1InvoiceUpcomingEvent`, `V1InvoiceUpdatedEvent`, `V1InvoiceVoidedEvent`, and `V1InvoiceWillBeDueEvent` with related object `Invoice`
  * Add support for event notification `V1InvoicePaymentPaidEvent` with related object `InvoicePayment`
  * Add support for event notifications `V1InvoiceitemCreatedEvent` and `V1InvoiceitemDeletedEvent` with related object `InvoiceItem`
  * Add support for event notifications `V1IssuingAuthorizationCreatedEvent`, `V1IssuingAuthorizationRequestEvent`, and `V1IssuingAuthorizationUpdatedEvent` with related object `Issuing.Authorization`
  * Add support for event notifications `V1IssuingCardCreatedEvent` and `V1IssuingCardUpdatedEvent` with related object `Issuing.Card`
  * Add support for event notifications `V1IssuingCardholderCreatedEvent` and `V1IssuingCardholderUpdatedEvent` with related object `Issuing.Cardholder`
  * Add support for event notifications `V1IssuingDisputeClosedEvent`, `V1IssuingDisputeCreatedEvent`, `V1IssuingDisputeFundsReinstatedEvent`, `V1IssuingDisputeFundsRescindedEvent`, `V1IssuingDisputeSubmittedEvent`, and `V1IssuingDisputeUpdatedEvent` with related object `Issuing.Dispute`
  * Add support for event notifications `V1IssuingPersonalizationDesignActivatedEvent`, `V1IssuingPersonalizationDesignDeactivatedEvent`, `V1IssuingPersonalizationDesignRejectedEvent`, and `V1IssuingPersonalizationDesignUpdatedEvent` with related object `Issuing.PersonalizationDesign`
  * Add support for event notifications `V1IssuingTokenCreatedEvent` and `V1IssuingTokenUpdatedEvent` with related object `Issuing.Token`
  * Add support for event notifications `V1IssuingTransactionCreatedEvent`, `V1IssuingTransactionPurchaseDetailsReceiptUpdatedEvent`, and `V1IssuingTransactionUpdatedEvent` with related object `Issuing.Transaction`
  * Add support for event notification `V1MandateUpdatedEvent` with related object `Mandate`
  * Add support for event notifications `V1PaymentIntentAmountCapturableUpdatedEvent`, `V1PaymentIntentCanceledEvent`, `V1PaymentIntentCreatedEvent`, `V1PaymentIntentPartiallyFundedEvent`, `V1PaymentIntentPaymentFailedEvent`, `V1PaymentIntentProcessingEvent`, `V1PaymentIntentRequiresActionEvent`, and `V1PaymentIntentSucceededEvent` with related object `PaymentIntent`
  * Add support for event notifications `V1PaymentLinkCreatedEvent` and `V1PaymentLinkUpdatedEvent` with related object `PaymentLink`
  * Add support for event notifications `V1PaymentMethodAttachedEvent`, `V1PaymentMethodAutomaticallyUpdatedEvent`, `V1PaymentMethodDetachedEvent`, and `V1PaymentMethodUpdatedEvent` with related object `PaymentMethod`
  * Add support for event notifications `V1PayoutCanceledEvent`, `V1PayoutCreatedEvent`, `V1PayoutFailedEvent`, `V1PayoutPaidEvent`, `V1PayoutReconciliationCompletedEvent`, and `V1PayoutUpdatedEvent` with related object `Payout`
  * Add support for event notifications `V1PersonCreatedEvent`, `V1PersonDeletedEvent`, and `V1PersonUpdatedEvent` with related object `Person`
  * Add support for event notifications `V1PlanCreatedEvent`, `V1PlanDeletedEvent`, and `V1PlanUpdatedEvent` with related object `Plan`
  * Add support for event notifications `V1PriceCreatedEvent`, `V1PriceDeletedEvent`, and `V1PriceUpdatedEvent` with related object `Price`
  * Add support for event notifications `V1ProductCreatedEvent`, `V1ProductDeletedEvent`, and `V1ProductUpdatedEvent` with related object `Product`
  * Add support for event notifications `V1PromotionCodeCreatedEvent` and `V1PromotionCodeUpdatedEvent` with related object `PromotionCode`
  * Add support for event notifications `V1QuoteAcceptedEvent`, `V1QuoteCanceledEvent`, `V1QuoteCreatedEvent`, and `V1QuoteFinalizedEvent` with related object `Quote`
  * Add support for event notifications `V1RadarEarlyFraudWarningCreatedEvent` and `V1RadarEarlyFraudWarningUpdatedEvent` with related object `Radar.EarlyFraudWarning`
  * Add support for event notifications `V1ReviewClosedEvent` and `V1ReviewOpenedEvent` with related object `Review`
  * Add support for event notifications `V1SetupIntentCanceledEvent`, `V1SetupIntentCreatedEvent`, `V1SetupIntentRequiresActionEvent`, `V1SetupIntentSetupFailedEvent`, and `V1SetupIntentSucceededEvent` with related object `SetupIntent`
  * Add support for event notification `V1SigmaScheduledQueryRunCreatedEvent` with related object `Sigma.ScheduledQueryRun`
  * Add support for event notifications `V1SourceCanceledEvent`, `V1SourceChargeableEvent`, `V1SourceFailedEvent`, and `V1SourceRefundAttributesRequiredEvent` with related object `Source`
  * Add support for event notifications `V1SubscriptionScheduleAbortedEvent`, `V1SubscriptionScheduleCanceledEvent`, `V1SubscriptionScheduleCompletedEvent`, `V1SubscriptionScheduleCreatedEvent`, `V1SubscriptionScheduleExpiringEvent`, `V1SubscriptionScheduleReleasedEvent`, and `V1SubscriptionScheduleUpdatedEvent` with related object `SubscriptionSchedule`
  * Add support for event notification `V1TaxSettingsUpdatedEvent` with related object `Tax.Settings`
  * Add support for event notifications `V1TaxRateCreatedEvent` and `V1TaxRateUpdatedEvent` with related object `TaxRate`
  * Add support for event notifications `V1TerminalReaderActionFailedEvent`, `V1TerminalReaderActionSucceededEvent`, and `V1TerminalReaderActionUpdatedEvent` with related object `Terminal.Reader`
  * Add support for event notifications `V1TestHelpersTestClockAdvancingEvent`, `V1TestHelpersTestClockCreatedEvent`, `V1TestHelpersTestClockDeletedEvent`, `V1TestHelpersTestClockInternalFailureEvent`, and `V1TestHelpersTestClockReadyEvent` with related object `TestHelpers.TestClock`
  * Add support for event notifications `V1TopupCanceledEvent`, `V1TopupCreatedEvent`, `V1TopupFailedEvent`, `V1TopupReversedEvent`, and `V1TopupSucceededEvent` with related object `Topup`
  * Add support for event notifications `V1TransferCreatedEvent`, `V1TransferReversedEvent`, and `V1TransferUpdatedEvent` with related object `Transfer`
  * Add support for event notifications `V2CommerceProductCatalogImportsFailedEvent`, `V2CommerceProductCatalogImportsProcessingEvent`, `V2CommerceProductCatalogImportsSucceededEvent`, and `V2CommerceProductCatalogImportsSucceededWithErrorsEvent` with related object `V2.Commerce.ProductCatalogImport`
  * Add support for event notifications `V2CoreApprovalRequestApprovedEvent`, `V2CoreApprovalRequestCanceledEvent`, `V2CoreApprovalRequestFailedEvent`, `V2CoreApprovalRequestRejectedEvent`, and `V2CoreApprovalRequestSucceededEvent` with related object `V2.Core.ApprovalRequest`
  * Add support for event notification `V2CoreClaimableSandboxUpdatedEvent` with related object `V2.Core.ClaimableSandbox`
  * Add support for event notifications `V2ExtendWorkflowRunFailedEvent`, `V2ExtendWorkflowRunStartedEvent`, and `V2ExtendWorkflowRunSucceededEvent` with related object `V2.Extend.WorkflowRun`
  * Add support for event notifications `V2OrchestratedCommerceAgreementConfirmedEvent`, `V2OrchestratedCommerceAgreementCreatedEvent`, `V2OrchestratedCommerceAgreementPartiallyConfirmedEvent`, and `V2OrchestratedCommerceAgreementTerminatedEvent` with related object `V2.OrchestratedCommerce.Agreement`
  * ⚠️ Remove support for event notification `V2CoreClaimableSandboxSandboxDetailsOwnerAccountUpdatedEvent` with related object `V2.Core.ClaimableSandbox`
  * Add support for error type `FxQuoteExpiredException`

## 20.1.0-alpha.4 - 2026-04-15
* [#2057](https://github.com/stripe/stripe-php/pull/2057) Update generated code for private-preview
  * Add support for `latest_version` on `V2.Billing.LicenseFee`, `V2.Billing.PricingPlan`, and `V2.Billing.RateCard`
  * Add support for `service_interval_count` and `service_interval` on `V2.Billing.LicenseFee` and `V2.Billing.RateCard`
* ⚠️ [#2055](https://github.com/stripe/stripe-php/pull/2055) Update generated code for private-preview
  * Add support for new resources `V2.Core.WorkflowRun` and `V2.Core.Workflow`
  * Add support for `report_authorized` method on resource `PaymentAttemptRecord`
  * Add support for `all` and `retrieve` methods on resource `V2.Core.WorkflowRun`
  * Add support for `all`, `invoke`, and `retrieve` methods on resource `V2.Core.Workflow`
  * Add support for `next_action` and `status` on `SharedPayment.IssuedToken`
  * ⚠️ Remove support for `network_id` on `SharedPayment.IssuedToken.seller_details`
  * Add support for `bills` on `AccountSession.components`
  * Add support for `settlement_currencies` on `BalanceSettings.payments` and `BalanceSettings.update().$params.payment`
  * Add support for `default_settlement_currency` on `BalanceSettings.payments`
  * Add support for `account_funding` on `Charge.payment_method_details.card`
  * Add support for `automatic_surcharge` on `Checkout.Session`, `Checkout\Session.create().$params`, `PaymentLink.create().$params`, and `PaymentLink`
  * Add support for `bizum` on `Checkout.Session.payment_method_options` and `Checkout\Session.create().$params.payment_method_option`
  * Add support for `surcharge_cost` on `Checkout.Session`
  * Add support for `amount_surcharge` on `Checkout.Session.total_details`
  * Add support for `shared_payment_granted_token` on `ConfirmationToken.create().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_datum`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
  * Add support for `details` on `Identity.VerificationReport.email`
  * Add support for new value `email` on enums `Identity.VerificationReport.type` and `Identity.VerificationSession.type`
  * Add support for `confirm` on `Identity\VerificationSession.create().$params` and `Identity\VerificationSession.update().$params`
  * Add support for `subscription` on `InvoiceItem.parent.schedule_details`
  * ⚠️ Remove support for `shared_payment_granted_token` on `PaymentIntent.confirm().$params` and `PaymentIntent.create().$params`
  * Add support for `money_services` on `PaymentIntent.payment_details`
  * ⚠️ Remove support for `external_reference` on `Plan`
  * Change `SharedPayment.GrantedToken.payment_method_details.billing_details` to be required

## 20.1.0-alpha.3 - 2026-04-08
This release changes the pinned API version to `2026-04-08.preview`.

* ⚠️ [#2053](https://github.com/stripe/stripe-php/pull/2053) Update generated code for private-preview
  * Add support for `payment_record` on `ApplicationFee.fee_source`
  * Add support for `fleet_data` on `Charge.capture().$params.payment_detail`, `Charge.update().$params.payment_detail`, `PaymentIntent.capture().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.capture().$params.payment_detail`, `PaymentIntent.confirm().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.confirm().$params.payment_detail`, `PaymentIntent.create().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.create().$params.payment_detail`, `PaymentIntent.decrement_authorization().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.increment_authorization().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.payment_details`, `PaymentIntent.update().$params.amount_detail.line_item.payment_method_option.card`, `PaymentIntent.update().$params.payment_detail`, and `PaymentIntentAmountDetailsLineItem.payment_method_options.card`
  * Add support for `beneficiary_account`, `beneficiary_details`, `sender_account`, and `sender_details` on `Charge.capture().$params.payment_detail.money_service.account_funding`, `Charge.update().$params.payment_detail.money_service.account_funding`, `PaymentIntent.capture().$params.payment_detail.money_service.account_funding`, `PaymentIntent.confirm().$params.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_detail.money_service.account_funding`, and `PaymentIntent.update().$params.payment_detail.money_service.account_funding`
  * Change type of `Charge.capture().$params.payment_detail.money_service.transaction_type`, `Charge.update().$params.payment_detail.money_service.transaction_type`, `PaymentIntent.capture().$params.payment_detail.money_service.transaction_type`, `PaymentIntent.confirm().$params.payment_detail.money_service.transaction_type`, `PaymentIntent.create().$params.payment_detail.money_service.transaction_type`, and `PaymentIntent.update().$params.payment_detail.money_service.transaction_type` from `literal('account_funding')` to `emptyable(literal('account_funding'))`
  * Add support for new value `requires_action` on enum `DelegatedCheckout.RequestedSession.status`
  * Add support for `bizum` on `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `QuotePreviewInvoice.payment_settings.payment_method_options`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
  * Add support for new value `bizum` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
  * Add support for `quantity_precision` on `PaymentIntent.capture().$params.amount_detail.line_item`, `PaymentIntent.confirm().$params.amount_detail.line_item`, `PaymentIntent.create().$params.amount_detail.line_item`, `PaymentIntent.decrement_authorization().$params.amount_detail.line_item`, `PaymentIntent.increment_authorization().$params.amount_detail.line_item`, `PaymentIntent.update().$params.amount_detail.line_item`, and `PaymentIntentAmountDetailsLineItem`
  * Add support for `liquid_asset` and `wallet` on `PaymentIntent.confirm().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.confirm().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.update().$params.payment_method_option.card.payment_detail.money_service.account_funding`, and `PaymentIntent.update().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`
  * Add support for `shared_payment_granted_token` on `PaymentMethod`
  * ⚠️ Change type of `Radar.CustomerEvaluation.event_type` from `string` to `enum('login'|'registration')`
  * ⚠️ Change type of `Radar.CustomerEvaluation.signals.account_sharing.risk_level` and `Radar.CustomerEvaluation.signals.multi_accounting.risk_level` from `string` to `enum`
  * Add support for `data` on `Radar.PaymentEvaluation.client_device_metadata_details` and `Radar\PaymentEvaluation.create().$params.client_device_metadata_detail`
  * Add support for `sunbit` on `SharedPayment.GrantedToken.payment_method_details`
  * Add support for new value `sunbit` on enum `SharedPayment.GrantedToken.payment_method_details.type`
  * ⚠️ Remove support for values `bm_crn`, `bo_tin`, `bt_tpn`, `co_nit`, `ec_ruc`, `eg_tin`, `gh_tin`, `gy_tin`, `hn_rtn`, `jm_trn`, `jo_crn`, `ke_pin`, `ky_crn`, `lk_tin`, `mo_tin`, `mv_tin`, `ng_tin`, `pa_ruc`, `ph_tin`, `py_ruc`, `sl_tin`, `sv_nit`, `uy_ruc`, `vg_cn`, and `za_tin` from enum `V2.Core.Account.identity.business_details.id_numbers[].type`
  * ⚠️ Remove support for values `bm_pp`, `bo_ci`, `bt_cid`, `eg_tin`, `gh_pin`, `gy_tin`, `hn_rtn`, `jm_trn`, `jo_pin`, `ky_pp`, `lk_nic`, `mo_bir`, `mt_nic`, `mv_tin`, `pa_ruc`, `ph_tin`, `py_ruc`, `si_pin`, `sv_nit`, and `vg_pp` from enums `V2.Core.Account.identity.individual.id_numbers[].type` and `V2.Core.AccountPerson.id_numbers[].type`
  * Add support for error type `CannotProceedException`

## 20.1.0-alpha.2 - 2026-04-01
This release changes the pinned API version to `2026-04-01.preview`.

* [#2052](https://github.com/stripe/stripe-php/pull/2052) Fixes an issue encoding two-dimensional array request params where the SDK incorrectly flattens the array.
* ⚠️ [#2051](https://github.com/stripe/stripe-php/pull/2051) Update generated code for private-preview
  * Add support for new resources `SharedPayment.IssuedToken` and `V2.Data.Reporting.QueryRun`
  * Add support for `create` and `retrieve` methods on resource `V2.Data.Reporting.QueryRun`
  * Add support for `pause` and `resume` methods on resource `V2.Payments.OffSessionPayment`
  * Add support for `tenant_keys`, `tenant_operator`, and `tenant_values` on `Billing\MeterEventSummary.all().$params`
  * Add support for `money_services` on `Charge.capture().$params.payment_detail`, `Charge.update().$params.payment_detail`, `PaymentIntent.capture().$params.payment_detail`, `PaymentIntent.confirm().$params.payment_detail`, `PaymentIntent.create().$params.payment_detail`, and `PaymentIntent.update().$params.payment_detail`
  * Add support for `payment_method_options` on `DelegatedCheckout.RequestedSession`, `DelegatedCheckout\RequestedSession.create().$params`, and `DelegatedCheckout\RequestedSession.update().$params`
  * ⚠️ Remove support for `payment_method_data` on `DelegatedCheckout\RequestedSession.confirm().$params`, `DelegatedCheckout\RequestedSession.create().$params`, and `DelegatedCheckout\RequestedSession.update().$params`
  * Add support for `card_brands` and `payment_method_types` on `DelegatedCheckout.RequestedSession.seller_details`
  * Change type of `DelegatedCheckout.RequestedSession.shared_payment_issued_token` from `string` to `expandable($SharedPayment.IssuedToken)`
  * Add support for `check_scan` on `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `QuotePreviewInvoice.payment_settings.payment_method_options`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
  * Add support for new value `check_scan` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
  * Add support for `processor_details` on `PaymentAttemptRecord.report_failed().$params`, `PaymentAttemptRecord.report_guaranteed().$params`, `PaymentRecord.report_payment().$params.failed`, `PaymentRecord.report_payment().$params.guaranteed`, `PaymentRecord.report_payment_attempt().$params.failed`, `PaymentRecord.report_payment_attempt().$params.guaranteed`, `PaymentRecord.report_payment_attempt_failed().$params`, and `PaymentRecord.report_payment_attempt_guaranteed().$params`
  * Add support for `payment_details` on `PaymentIntent.confirm().$params.payment_method_option.card_present`, `PaymentIntent.confirm().$params.payment_method_option.card`, `PaymentIntent.create().$params.payment_method_option.card_present`, `PaymentIntent.create().$params.payment_method_option.card`, `PaymentIntent.update().$params.payment_method_option.card_present`, and `PaymentIntent.update().$params.payment_method_option.card`
  * ⚠️ Remove support for `bill_from` on `QuotePreviewSubscriptionSchedule.billing_schedules[]`, `Subscription.billing_schedules[]`, and `SubscriptionSchedule.billing_schedules[]`
  * Add support for `agent_details`, `payment_method_details`, and `risk_details` on `SharedPayment.GrantedToken`
  * Add support for `paper_checks` on `V2.Account.configuration.recipient_data.features`, `V2.Core.Account.configuration.recipient.capabilities`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments`, `V2\Account.create().$params.configuration.recipient_datum.feature`, `V2\Account.update().$params.configuration.recipient_datum.feature`, `V2\Core\Account.create().$params.configuration.recipient.capability`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_payment`, `V2\Core\Account.update().$params.configuration.recipient.capability`, and `V2\Core\Account.update().$params.configuration.storer.capability.outbound_payment`
  * Add support for new value `paper_checks` on enum `V2.Account.configuration.supportable_features.recipient_data`
  * Add support for new value `paper_checks` on enum `V2.Account.requirements[].impact.required_for_features`
  * ⚠️ Change type of `V2.Billing.Cadence.settings_data.collection.payment_method_options.konbini`, `V2.Billing.CollectionSetting.payment_method_options.konbini`, `V2.Billing.CollectionSettingVersion.payment_method_options.konbini`, `V2\Billing\CollectionSetting.create().$params.payment_method_option.konbini`, and `V2\Billing\CollectionSetting.update().$params.payment_method_option.konbini` from `map(string: dynamic)` to `an object`
  * ⚠️ Change type of `V2.Billing.Cadence.settings_data.collection.payment_method_options.sepa_debit`, `V2.Billing.CollectionSetting.payment_method_options.sepa_debit`, `V2.Billing.CollectionSettingVersion.payment_method_options.sepa_debit`, `V2\Billing\CollectionSetting.create().$params.payment_method_option.sepa_debit`, and `V2\Billing\CollectionSetting.update().$params.payment_method_option.sepa_debit` from `map(string: dynamic)` to `an object`
  * Add support for `id` on `V2.Billing.CadenceSpendModifier.max_billing_period_spend.amount.custom_pricing_unit`, `V2.Billing.IntentAction.apply.spend_modifier_rule.max_billing_period_spend.amount.custom_pricing_unit`, and `V2\Billing\Intent.create().$params.action.apply.spend_modifier_rule.max_billing_period_spend.amount.custom_pricing_unit`
  * Add support for new values `outbound_payments.paper_checks` and `paper_checks` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for new values `bm_crn`, `bo_tin`, `bt_tpn`, `co_nit`, `ec_ruc`, `eg_tin`, `gh_tin`, `gy_tin`, `hn_rtn`, `jm_trn`, `jo_crn`, `ke_pin`, `ky_crn`, `lk_tin`, `mo_tin`, `mv_tin`, `ng_tin`, `pa_ruc`, `ph_tin`, `py_ruc`, `sl_tin`, `sv_nit`, `uy_ruc`, `vg_cn`, and `za_tin` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
  * Add support for new values `bm_pp`, `bo_ci`, `bt_cid`, `eg_tin`, `gh_pin`, `gy_tin`, `hn_rtn`, `jm_trn`, `jo_pin`, `ky_pp`, `lk_nic`, `mo_bir`, `mt_nic`, `mv_tin`, `pa_ruc`, `ph_tin`, `py_ruc`, `si_pin`, `sv_nit`, and `vg_pp` on enums `V2.Core.Account.identity.individual.id_numbers[].type` and `V2.Core.AccountPerson.id_numbers[].type`
  * ⚠️ Change type of `V2.Core.Event.reason.request.client.stripe_action` from `map(string: dynamic)` to `an object`
  * ⚠️ Change type of `V2.MoneyManagement.InboundTransfer.transfer_history[].bank_debit_processing` from `map(string: dynamic)` to `an object`
  * ⚠️ Change type of `V2.MoneyManagement.InboundTransfer.transfer_history[].bank_debit_queued` from `map(string: dynamic)` to `an object`
  * ⚠️ Change type of `V2.MoneyManagement.InboundTransfer.transfer_history[].bank_debit_succeeded` from `map(string: dynamic)` to `an object`
  * Add support for new values `paper_check_attachment_too_large`, `paper_check_expired`, and `paper_check_undeliverable` on enum `V2.MoneyManagement.OutboundPayment.status_details.failed.reason`
  * ⚠️ Remove support for `town` on `V2.MoneyManagement.OutboundPayment.tracking_details.paper_check.mailing_address`
  * Change `V2.MoneyManagement.OutboundPayment.delivery_options.paper_check.memo` to be required
  * Add support for new value `payout_method_amount_limit_exceeded` on enum `V2.MoneyManagement.OutboundTransfer.status_details.failed.reason`
  * Add support for `application_fee_amount_requested` on `V2.Payments.OffSessionPayment`
  * ⚠️ Remove support for `compartment_id` on `V2.Payments.OffSessionPayment`
  * Add support for new value `exceeded_retry_window` on enum `V2.Payments.OffSessionPayment.failure_reason`
  * Add support for `retry_until` on `V2.Payments.OffSessionPayment.retry_details`
  * Add support for new value `paused` on enum `V2.Payments.OffSessionPayment.status`
  * ⚠️ Change `V2.Reporting.ReportRun.result.file` to be optional
  * Add support for `application_fee_amount` on `V2\Payments\OffSessionPayment.capture().$params` and `V2\Payments\OffSessionPayment.create().$params`
  * Add support for new value `paper_checks` on enum `EventsV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent.updated_capability`
  * Add support for new value `outbound_payments.paper_checks` on enum `EventsV2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent.updated_capability`
  * Add support for `alert_id` on `EventsV2CoreHealthApiErrorResolvedEvent`, `EventsV2CoreHealthApiLatencyResolvedEvent`, `EventsV2CoreHealthAuthorizationRateDropResolvedEvent`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsResolvedEvent`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent`, `EventsV2CoreHealthPaymentMethodErrorResolvedEvent`, `EventsV2CoreHealthSepaDebitDelayedFiringEvent`, `EventsV2CoreHealthSepaDebitDelayedResolvedEvent`, `EventsV2CoreHealthTrafficVolumeDropResolvedEvent`, and `EventsV2CoreHealthWebhookLatencyResolvedEvent`
  * Add support for `api_key` on `EventsV2IamApiKeyCreatedEvent`, `EventsV2IamApiKeyDefaultSecretRevealedEvent`, `EventsV2IamApiKeyExpiredEvent`, `EventsV2IamApiKeyPermissionsUpdatedEvent`, `EventsV2IamApiKeyRotatedEvent`, and `EventsV2IamApiKeyUpdatedEvent`
  * Add support for `stripe_access_grant` on `EventsV2IamStripeAccessGrantApprovedEvent`, `EventsV2IamStripeAccessGrantCanceledEvent`, `EventsV2IamStripeAccessGrantDeniedEvent`, `EventsV2IamStripeAccessGrantRemovedEvent`, `EventsV2IamStripeAccessGrantRequestedEvent`, and `EventsV2IamStripeAccessGrantUpdatedEvent`
  * Add support for event notifications `V2DataReportingQueryRunCreatedEvent`, `V2DataReportingQueryRunFailedEvent`, `V2DataReportingQueryRunSucceededEvent`, and `V2DataReportingQueryRunUpdatedEvent` with related object `V2.Data.Reporting.QueryRun`
  * Add support for event notifications `V2PaymentsOffSessionPaymentPausedEvent` and `V2PaymentsOffSessionPaymentResumedEvent` with related object `V2.Payments.OffSessionPayment`

## 20.1.0-alpha.1 - 2026-03-25
This release changes the pinned API version to `2026-03-25.preview`.

This release contains additional breaking changes. See the [GA changelog](https://github.com/stripe/stripe-php/blob/master/CHANGELOG.md#2000---2026-03-25) for more information.

* ⚠️ [#2037](https://github.com/stripe/stripe-php/pull/2037) Update generated code for private-preview
  * Add support for new resource `V2.Core.AccountEvaluation`
  * ⚠️ Remove support for resources `V2.Billing.LicenseFeeSubscription` and `V2.Billing.PricingPlanSubscriptionComponents`
  * Add support for `create` method on resource `V2.Core.AccountEvaluation`
  * ⚠️ Remove support for `retrieve` method on resources `V2.Billing.LicenseFeeSubscription` and `V2.Billing.PricingPlanSubscriptionComponents`
  * Add support for `modify_rates` method on resource `V2.Billing.RateCard`
  * Add support for `remove_discounts` method on resource `V2.Billing.PricingPlanSubscription`
  * Add support for new value `eg_bank_account` on enum `V2.Account.configuration.recipient_data.default_outbound_destination.type`
  * Add support for `invoice_resources` on `V2.Billing.Intent`
  * Add support for `amount_due` and `customer_balance_applied` on `V2.Billing.Intent.amount_details`
  * Add support for `expires_at` on `V2.Billing.Intent.status_transitions`
  * Add support for `discount` on `V2.Billing.IntentAction.apply` and `V2\Billing\Intent.create().$params.action.apply`
  * Add support for `timestamp` on `V2.Billing.IntentAction.apply.effective_at` and `V2\Billing\Intent.create().$params.action.apply.effective_at`
  * Add support for new values `current_billing_period_start` and `timestamp` on enum `V2.Billing.IntentAction.apply.effective_at.type`
  * Add support for new value `discount` on enum `V2.Billing.IntentAction.apply.type`
  * ⚠️ Change type of `V2.Billing.IntentAction.deactivate.pricing_plan_subscription_details.overrides.partial_period_behaviors[].type`, `V2.Billing.IntentAction.modify.pricing_plan_subscription_details.overrides.partial_period_behaviors[].type`, `V2.Billing.IntentAction.subscribe.pricing_plan_subscription_details.overrides.partial_period_behaviors[].type`, `V2\Billing\Intent.create().$params.action.deactivate.pricing_plan_subscription_detail.override.partial_period_behavior.type`, `V2\Billing\Intent.create().$params.action.modify.pricing_plan_subscription_detail.override.partial_period_behavior.type`, and `V2\Billing\Intent.create().$params.action.subscribe.pricing_plan_subscription_detail.override.partial_period_behavior.type` from `literal('license_fee')` to `enum('license_fee'|'recurring_credit_grant')`
  * Add support for `service_cycle` on `V2.Billing.LicenseFee` and `V2.Billing.RateCard`
  * ⚠️ Remove support for `latest_version` on `V2.Billing.LicenseFee`, `V2.Billing.PricingPlan`, and `V2.Billing.RateCard`
  * ⚠️ Remove support for `service_interval_count` and `service_interval` on `V2.Billing.LicenseFee` and `V2.Billing.RateCard`
  * ⚠️ Change type of `V2.Billing.LicenseFee.transform_quantity.divide_by`, `V2.Billing.LicenseFeeVersion.transform_quantity.divide_by`, `V2.Billing.RateCardRate.transform_quantity.divide_by`, `V2\Billing\LicenseFee.create().$params.transform_quantity.divide_by`, `V2\Billing\LicenseFee.update().$params.transform_quantity.divide_by`, and `V2\Billing\RateCardRate.create().$params.transform_quantity.divide_by` from `longInteger` to `int64_string`
  * Add support for `discount_details` and `pricing_plan_component_details` on `V2.Billing.PricingPlanSubscription`
  * Add support for new value `crypto_wallets` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * ⚠️ Remove support for value `crypto` from enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for `balance_by_funds_type` on `V2.MoneyManagement.FinancialAccount.payments`
  * Add support for new value `next_day_payout_fee` on enum `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[].type`
  * Add support for `treasury_transaction_entry` on `V2.MoneyManagement.TransactionEntry`
  * Add support for `treasury_credit_reversal`, `treasury_debit_reversal`, `treasury_inbound_transfer`, `treasury_issuing_authorization`, `treasury_outbound_payment`, `treasury_outbound_transfer`, `treasury_received_credit`, and `treasury_received_debit` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
  * Add support for new values `treasury_credit_reversal`, `treasury_debit_reversal`, `treasury_inbound_transfer`, `treasury_issuing_authorization`, `treasury_other`, `treasury_outbound_payment`, `treasury_outbound_transfer`, `treasury_received_credit`, and `treasury_received_debit` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
  * Add support for `treasury_transaction` on `V2.MoneyManagement.Transaction`
  * Add support for new value `no_valid_payment_method` on enum `V2.Payments.OffSessionPayment.failure_reason`
  * Add support for `metadata` on `V2.Payments.SettlementAllocationIntentSplit`
  * ⚠️ Change type of `V2.Reporting.ReportRun.result.file.size` from `longInteger` to `int64_string`
  * Add support for `statement_descriptor` on `V2\MoneyManagement\OutboundPayment.create().$params` and `V2\MoneyManagement\OutboundTransfer.create().$params`
  * Add support for `include` on `V2\Billing\Intent.create().$params`, `V2\Billing\Intent.reserve().$params`, `V2\Billing\PricingPlanSubscription.all().$params`, `V2\Billing\PricingPlanSubscription.retrieve().$params`, `V2\MoneyManagement\FinancialAccount.all().$params`, and `V2\MoneyManagement\FinancialAccount.retrieve().$params`
  * Add support for event notifications `V1AccountSignalsIncludingDelinquencyCreatedEvent`, `V2CoreAccountSignalsFraudulentWebsiteReadyEvent`, and `V2SignalsAccountSignalFraudulentMerchantReadyEvent`
* ⚠️ [#2049](https://github.com/stripe/stripe-php/pull/2049) Update generated code for private-preview
  * Add support for new resource `RiskSignals`
  * Add support for `financial_account_rewards` and `nesting_demo` on `AccountSession.components`
  * Add support for `upi_payments` on `Account.capabilities`, `Account.create().$params.capability`, and `Account.update().$params.capability`
  * Add support for `risk_signals` on `Account`
  * Add support for `fraud_intent` on `AccountSignals`
  * Add support for new value `related_accounts` on enum `AccountSignals.delinquency.indicators[].indicator`
  * Add support for `risk_reserved` on `Balance`
  * ⚠️ Remove support for `billable_items` on `Billing.Alert.spend_threshold.filters`
  * Add support for `upi` on `Charge.payment_method_details`, `Checkout.Session.payment_method_options`, `Checkout\Session.create().$params.payment_method_option`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `Mandate.payment_method_details`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `SetupAttempt.payment_method_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.confirm().$params.payment_method_option`, `SetupIntent.create().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_option`, `SetupIntent.payment_method_options`, `SetupIntent.update().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_option`
  * Add support for new value `tempo` on enums `Charge.payment_method_details.crypto.network`, `PaymentAttemptRecord.payment_method_details.crypto.network`, and `PaymentRecord.payment_method_details.crypto.network`
  * ⚠️ Remove support for `source_type` on `Charge.payment_method_details.stripe_balance`, `ConfirmationToken.create().$params.payment_method_datum.stripe_balance`, `ConfirmationToken.payment_method_preview.stripe_balance`, `PaymentAttemptRecord.payment_method_details.stripe_balance`, `PaymentIntent.confirm().$params.payment_method_datum.stripe_balance`, `PaymentIntent.create().$params.payment_method_datum.stripe_balance`, `PaymentIntent.update().$params.payment_method_datum.stripe_balance`, `PaymentMethod.create().$params.stripe_balance`, `PaymentMethod.stripe_balance`, `PaymentRecord.payment_method_details.stripe_balance`, `SetupIntent.confirm().$params.payment_method_datum.stripe_balance`, `SetupIntent.create().$params.payment_method_datum.stripe_balance`, and `SetupIntent.update().$params.payment_method_datum.stripe_balance`
  * Add support for `integration_identifier` on `Checkout.Session` and `Checkout\Session.create().$params`
  * Change type of `Checkout\Session.create().$params.line_item.price_datum.product_datum.tax_detail.tax_code`, `Checkout\Session.update().$params.line_item.price_datum.product_datum.tax_detail.tax_code`, `Invoice.add_lines().$params.line.price_datum.product_datum.tax_detail.tax_code`, `Invoice.update_lines().$params.line.price_datum.product_datum.tax_detail.tax_code`, `InvoiceLineItem.update().$params.price_datum.product_datum.tax_detail.tax_code`, `PaymentLink.create().$params.line_item.price_datum.product_datum.tax_detail.tax_code`, `Plan.create().$params.product.tax_detail.tax_code`, `Price.create().$params.product_datum.tax_detail.tax_code`, `Product.create().$params.tax_detail.tax_code`, and `Product.update().$params.tax_detail.tax_code` from `string` to `emptyable(string)`
  * Add support for `crypto` on `Checkout\Session.create().$params.payment_method_option`
  * Add support for `pending_invoice_item_interval` on `Checkout\Session.create().$params.subscription_datum` and `Checkout\Session.update().$params.subscription_datum`
  * Change `Checkout\Session.create().$params.line_item.price_datum.product_datum.tax_detail.tax_code`, `Checkout\Session.update().$params.line_item.price_datum.product_datum.tax_detail.tax_code`, `Invoice.add_lines().$params.line.price_datum.product_datum.tax_detail.tax_code`, `Invoice.update_lines().$params.line.price_datum.product_datum.tax_detail.tax_code`, `InvoiceLineItem.update().$params.price_datum.product_datum.tax_detail.tax_code`, `PaymentLink.create().$params.line_item.price_datum.product_datum.tax_detail.tax_code`, `Plan.create().$params.product.tax_detail.tax_code`, `Price.create().$params.product_datum.tax_detail.tax_code`, `Product.create().$params.tax_detail.tax_code`, and `Product.update().$params.tax_detail.tax_code` to be optional
  * Add support for new value `application` on enums `Checkout.Session.automatic_tax.liability.type`, `Checkout.Session.invoice_creation.invoice_data.issuer.type`, `Invoice.automatic_tax.liability.type`, `Invoice.issuer.type`, `PaymentLink.automatic_tax.liability.type`, `PaymentLink.invoice_creation.invoice_data.issuer.type`, `PaymentLink.subscription_data.invoice_settings.issuer.type`, `Quote.automatic_tax.liability.type`, `Quote.invoice_settings.issuer.type`, `QuotePreviewInvoice.automatic_tax.liability.type`, `QuotePreviewInvoice.issuer.type`, `QuotePreviewSubscriptionSchedule.default_settings.automatic_tax.liability.type`, `QuotePreviewSubscriptionSchedule.default_settings.invoice_settings.issuer.type`, `QuotePreviewSubscriptionSchedule.phases[].automatic_tax.liability.type`, `QuotePreviewSubscriptionSchedule.phases[].invoice_settings.issuer.type`, `Subscription.automatic_tax.liability.type`, `Subscription.invoice_settings.issuer.type`, `SubscriptionSchedule.default_settings.automatic_tax.liability.type`, `SubscriptionSchedule.default_settings.invoice_settings.issuer.type`, `SubscriptionSchedule.phases[].automatic_tax.liability.type`, and `SubscriptionSchedule.phases[].invoice_settings.issuer.type`
  * Add support for `au_becs_debit`, `bacs_debit`, `boleto`, `link`, `sepa_debit`, and `us_bank_account` on `Checkout.Session.current_attempt.payment_method_details`
  * Add support for new values `elements`, `embedded_page`, `form`, and `hosted_page` on enum `Checkout.Session.ui_mode`
  * ⚠️ Remove support for values `custom`, `embedded`, and `hosted` from enum `Checkout.Session.ui_mode`
  * Add support for new value `marine_carbon_removal` on enum `Climate.Supplier.removal_pathway`
  * Add support for new value `upi` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
  * Add support for `metadata` on `CreditNote.create().$params.line`, `CreditNote.preview().$params.line`, `CreditNote.preview_lines().$params.line`, and `CreditNoteLineItem`
  * Add support for `selected_fulfillment_option_overrides` on `DelegatedCheckout.RequestedSession.fulfillment_details`
  * Add support for `line_item_keys` on `DelegatedCheckout.RequestedSession.fulfillment_details.fulfillment_options[].digital.digital_options[]` and `DelegatedCheckout.RequestedSession.fulfillment_details.fulfillment_options[].shipping.shipping_options[]`
  * Add support for `quantity_decimal` on `Invoice.add_lines().$params.line`, `Invoice.create_preview().$params.invoice_item`, `Invoice.update_lines().$params.line`, `InvoiceItem.create().$params`, `InvoiceItem.update().$params`, `InvoiceItem`, `InvoiceLineItem.update().$params`, and `InvoiceLineItem`
  * Add support for `expires_after_seconds` on `Invoice.create().$params.payment_setting.payment_method_option.pix`, `Invoice.payment_settings.payment_method_options.pix`, `Invoice.update().$params.payment_setting.payment_method_option.pix`, `QuotePreviewInvoice.payment_settings.payment_method_options.pix`, `Subscription.create().$params.payment_setting.payment_method_option.pix`, `Subscription.payment_settings.payment_method_options.pix`, and `Subscription.update().$params.payment_setting.payment_method_option.pix`
  * ⚠️ Add support for `level` on `Issuing\Authorization.create().$params.risk_assessment.card_testing_risk` and `Issuing\Authorization.create().$params.risk_assessment.merchant_dispute_risk`
  * ⚠️ Remove support for `risk_level` on `Issuing\Authorization.create().$params.risk_assessment.card_testing_risk` and `Issuing\Authorization.create().$params.risk_assessment.merchant_dispute_risk`
  * Add support for new values `da`, `pl`, and `sv` on enum `Issuing.Cardholder.preferred_locales`
  * Add support for `lifecycle_controls` on `Issuing.Card` and `Issuing\Card.create().$params`
  * ⚠️ Change type of `Issuing.Token.network_data.visa.card_reference_id` from `string` to `nullable(string)`
  * ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.brand` and `PaymentRecord.payment_method_details.card.brand` from `enum` to `nullable(enum)`
  * ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.exp_month` and `PaymentRecord.payment_method_details.card.exp_month` from `longInteger` to `nullable(longInteger)`
  * ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.exp_year` and `PaymentRecord.payment_method_details.card.exp_year` from `longInteger` to `nullable(longInteger)`
  * ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.funding` and `PaymentRecord.payment_method_details.card.funding` from `enum('credit'|'debit'|'prepaid'|'unknown')` to `nullable(enum('credit'|'debit'|'prepaid'|'unknown'))`
  * ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.last4` and `PaymentRecord.payment_method_details.card.last4` from `string` to `nullable(string)`
  * ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.card.moto` and `PaymentRecord.payment_method_details.card.moto` from `boolean` to `nullable(boolean)`
  * Add support for `cryptogram`, `electronic_commerce_indicator`, `exemption_indicator_applied`, and `exemption_indicator` on `PaymentAttemptRecord.payment_method_details.card.three_d_secure` and `PaymentRecord.payment_method_details.card.three_d_secure`
  * Add support for `surcharge` on `PaymentIntent.amount_details`, `PaymentIntent.capture().$params.amount_detail`, `PaymentIntent.confirm().$params.amount_detail`, `PaymentIntent.create().$params.amount_detail`, `PaymentIntent.increment_authorization().$params.amount_detail`, and `PaymentIntent.update().$params.amount_detail`
  * Add support for `mandate_options` on `PaymentIntent.confirm().$params.payment_method_option.stripe_balance`, `PaymentIntent.create().$params.payment_method_option.stripe_balance`, `PaymentIntent.payment_method_options.stripe_balance`, and `PaymentIntent.update().$params.payment_method_option.stripe_balance`
  * Add support for `amount_details` and `payment_details` on `PaymentIntent.decrement_authorization().$params`
  * Add support for new value `upi` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
  * Add support for `upi_handle_redirect_or_display_qr_code` on `PaymentIntent.next_action` and `SetupIntent.next_action`
  * Add support for `managed_payments` on `PaymentLink.create().$params` and `PaymentLink`
  * Add support for new value `upi` on enum `PaymentLink.payment_method_types`
  * Add support for `recommended_action` and `signals` on `Radar.PaymentEvaluation`
  * ⚠️ Remove support for `insights` on `Radar.PaymentEvaluation`
  * Add support for new value `crypto_fingerprint` on enum `Radar.ValueList.item_type`
  * Add support for `stripe_balance` on `SetupIntent.confirm().$params.payment_method_option`, `SetupIntent.create().$params.payment_method_option`, `SetupIntent.payment_method_options`, and `SetupIntent.update().$params.payment_method_option`
  * Add support for new value `resolved` on enum `SharedPayment.GrantedToken.deactivated_reason`
  * Add support for `recurring_interval` on `SharedPayment.GrantedToken.usage_limits`
  * ⚠️ Change type of `SharedPayment.GrantedToken.usage_limits.expires_at` from `DateTime` to `nullable(DateTime)`
  * Add support for `presentment_details` on `Subscription`
  * Add support for new value `canceled_by_retention_policy` on enum `Subscription.cancellation_details.reason`
  * ⚠️ Remove support for `invoice_resources` on `V2.Billing.Intent`
  * ⚠️ Remove support for `amount_due` and `customer_balance_applied` on `V2.Billing.Intent.amount_details`
  * Add support for `recurring_credit_grant` on `V2.Billing.IntentAction.modify.pricing_plan_subscription_details.overrides.partial_period_behaviors[]`, `V2.Billing.IntentAction.subscribe.pricing_plan_subscription_details.overrides.partial_period_behaviors[]`, `V2\Billing\Intent.create().$params.action.modify.pricing_plan_subscription_detail.override.partial_period_behavior`, and `V2\Billing\Intent.create().$params.action.subscribe.pricing_plan_subscription_detail.override.partial_period_behavior`
  * Add support for `consumer_privacy_disclosures` and `consumer_storer` on `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service`
  * ⚠️ Remove support for `include` on `V2\Billing\Intent.create().$params` and `V2\Billing\Intent.reserve().$params`
  * Add support for error code `service_period_coupon_with_metered_tiered_item_unsupported` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `QuotePreviewInvoice.last_finalization_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`
* [#2048](https://github.com/stripe/stripe-php/pull/2048) Update generated code for private-preview
  * Release specs are identical.

## 19.5.0-alpha.4 - 2026-03-18
* ⚠️ [#2031](https://github.com/stripe/stripe-php/pull/2031) Update generated code for private-preview
  * Add support for new resources `Orchestration.PaymentAttempt` and `Radar.CustomerEvaluation`
  * Add support for `retrieve` method on resource `Orchestration.PaymentAttempt`
  * Add support for `create` and `update` methods on resource `Radar.CustomerEvaluation`
  * Add support for `approve` method on resource `Checkout.Session`
  * Add support for `report_authenticated`, `report_canceled`, `report_failed`, `report_guaranteed`, `report_informational`, and `report_refund` methods on resource `PaymentAttemptRecord`
  * Add support for `create_us_paper_check_on_application` on `AccountSession.create().$params.component.check_scanning.feature`
  * ⚠️ Change `AccountSignals.delinquency` to be optional
  * Add support for `approval_method` on `Checkout.Session` and `Checkout\Session.create().$params`
  * Add support for `current_attempt` on `Checkout.Session`
  * Add support for `selected_fulfillment_option_overrides` on `DelegatedCheckout\RequestedSession.update().$params.fulfillment_detail`
  * Add support for `pricing_plan_subscription_details` on `InvoiceItem.parent` and `InvoiceLineItem.parent`
  * ⚠️ Remove support for `license_fee_subscription_details` on `InvoiceItem.parent` and `InvoiceLineItem.parent`
  * ⚠️ Remove support for `pricing_plan_subscription` and `pricing_plan_version` on `InvoiceItem.parent.rate_card_subscription_details` and `InvoiceLineItem.parent.rate_card_subscription_details`
  * Add support for new value `pricing_plan_subscription_details` on enum `InvoiceItem.parent.type`
  * ⚠️ Remove support for value `license_fee_subscription_details` from enum `InvoiceItem.parent.type`
  * Add support for new value `discounts` on enum `InvoiceItem.frozen_fields`
  * Add support for new value `pricing_plan_subscription_details` on enum `InvoiceLineItem.parent.type`
  * ⚠️ Remove support for value `license_fee_subscription_details` from enum `InvoiceLineItem.parent.type`
  * Add support for `token_details` on `Issuing.Authorization`
  * Add support for `failure_code` on `PaymentRecord.report_payment().$params.failed`, `PaymentRecord.report_payment_attempt().$params.failed`, and `PaymentRecord.report_payment_attempt_failed().$params`
  * Change `PaymentRecord.report_payment_attempt_canceled().$params.canceled_at` to be optional
  * Change `PaymentRecord.report_payment_attempt_failed().$params.failed_at` to be optional
  * Change `PaymentRecord.report_payment_attempt_guaranteed().$params.guaranteed_at` to be optional
  * Change `PaymentRecord.report_refund().$params.refunded` to be optional
  * ⚠️ Change `Radar\IssuingAuthorizationEvaluation.create().$params.card_detail.bin_country` to be required
  * Add support for `recurring_interval` on `SharedPayment\GrantedToken.create().$params.usage_limit`
  * Change `SharedPayment\GrantedToken.create().$params.usage_limit.expires_at` to be optional
  * Add support for `home_rule_tax` on `Tax.Registration.country_options.us` and `Tax\Registration.create().$params.country_option.me`
  * Add support for new value `home_rule_tax` on enum `Tax.Registration.country_options.us.type`
* [#2035](https://github.com/stripe/stripe-php/pull/2035) Update generated code for private-preview
  * Add support for `simulate_crypto_deposit` test helper method on resource `PaymentIntent`
  * Add support for `deposit_options` and `mode` on `PaymentIntent.confirm().$params.payment_method_option.crypto`, `PaymentIntent.create().$params.payment_method_option.crypto`, `PaymentIntent.payment_method_options.crypto`, and `PaymentIntent.update().$params.payment_method_option.crypto`
  * Add support for `crypto_display_details` on `PaymentIntent.next_action`

## 19.5.0-alpha.3 - 2026-03-11
* ⚠️ [#2026](https://github.com/stripe/stripe-php/pull/2026) Update generated code for private-preview
  * Add support for new resource `Radar.IssuingAuthorizationEvaluation`
  * Add support for `create` method on resource `Radar.IssuingAuthorizationEvaluation`
  * Add support for new value `fee_credits` on enum `BalanceTransaction.balance_type`
  * ⚠️ Rename `affiliate_attributions` to `affiliate_attribution` on `DelegatedCheckout\RequestedSession.confirm().$params` and `DelegatedCheckout\RequestedSession.create().$params`
  * Add support for `amount_to_counter` on `Dispute`
  * Add support for `frozen_fields` on `InvoiceItem`
  * Add support for new value `next_billing_period_start` on enum `V2.Billing.IntentAction.apply.effective_at.type`
  * Add support for `consumer` on `V2.Core.Account.configuration.card_creator.capabilities`, `V2.Core.Account.identity.attestations.terms_of_service.card_creator`, `V2\Core\Account.create().$params.configuration.card_creator.capability`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.card_creator`, `V2\Core\Account.update().$params.configuration.card_creator.capability`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service.card_creator`
  * Add support for `fifth_third` on `V2.Core.Account.configuration.card_creator.capabilities.commercial`, `V2.Core.Account.identity.attestations.terms_of_service.card_creator.commercial`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.card_creator.commercial`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service.card_creator.commercial`
  * Add support for `prepaid_card` on `V2.Core.Account.configuration.card_creator.capabilities.commercial.cross_river_bank`, `V2.Core.Account.identity.attestations.terms_of_service.card_creator.commercial.cross_river_bank`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial.cross_river_bank`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.card_creator.commercial.cross_river_bank`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial.cross_river_bank`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service.card_creator.commercial.cross_river_bank`
  * Add support for new values `commercial.cross_river_bank.prepaid_card`, `commercial.fifth_third.charge_card`, `consumer.celtic.revolving_credit_card`, `consumer.cross_river_bank.prepaid_card`, and `consumer.lead.prepaid_card` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for `payment_method_data` on `V2\Payments\OffSessionPayment.create().$params`
  * Change `V2\Payments\OffSessionPayment.create().$params.payment_method` to be optional
  * Add support for new values `commercial.cross_river_bank.prepaid_card`, `commercial.fifth_third.charge_card`, `consumer.celtic.revolving_credit_card`, `consumer.cross_river_bank.prepaid_card`, and `consumer.lead.prepaid_card` on enum `EventsV2CoreAccountIncludingConfigurationCardCreatorCapabilityStatusUpdatedEvent.updated_capability`

## 19.5.0-alpha.2 - 2026-03-04
This release changes the pinned API version to `2026-03-04.preview`.

* ⚠️ [#2021](https://github.com/stripe/stripe-php/pull/2021) Update generated code for private-preview
  * Add support for new resources `Billing.AlertRecovered` and `Profile`
  * Add support for `reauthorize` method on resource `PaymentIntent`
  * Add support for `settings` on `QuoteLine.actions[].add_discount`, `QuoteLine.actions[].add_item.discounts[]`, `QuoteLine.actions[].set_discounts[]`, `QuoteLine.actions[].set_items[].discounts[]`, `QuotePreviewSubscriptionSchedule.phases[].discounts[]`, `QuotePreviewSubscriptionSchedule.phases[].items[].discounts[]`, `SubscriptionSchedule.phases[].discounts[]`, and `SubscriptionSchedule.phases[].items[].discounts[]`
  * Add support for `smart_disputes` on `Account.create().$params.setting`, `Account.settings`, `Account.update().$params.setting`, `V2.Core.Account.configuration.merchant`, `V2\Core\Account.create().$params.configuration.merchant`, and `V2\Core\Account.update().$params.configuration.merchant`
  * Add support for `email_customers_on_successful_payment` on `Account.create().$params.setting.payment`, `Account.settings.payments`, and `Account.update().$params.setting.payment`
  * Add support for `balance_update_details` on `Billing.CreditBalanceSummary.balances[]`
  * Add support for `reauthorization` and `reauthorize_before` on `Charge.payment_method_details.card_present`, `Charge.payment_method_details.card`, `ConfirmationToken.payment_method_preview.card.generated_from.payment_method_details.card_present`, `PaymentAttemptRecord.payment_method_details.card_present`, `PaymentMethod.card.generated_from.payment_method_details.card_present`, and `PaymentRecord.payment_method_details.card_present`
  * Add support for `location` and `reader` on `Charge.payment_method_details.card_present`, `Charge.payment_method_details.interac_present`, `ConfirmationToken.payment_method_preview.card.generated_from.payment_method_details.card_present`, `PaymentAttemptRecord.payment_method_details.card_present`, `PaymentAttemptRecord.payment_method_details.interac_present`, `PaymentMethod.card.generated_from.payment_method_details.card_present`, `PaymentRecord.payment_method_details.card_present`, and `PaymentRecord.payment_method_details.interac_present`
  * Add support for `managed_payments` on `Checkout.Session`, `Checkout\Session.create().$params`, `PaymentIntent`, `SetupIntent`, and `Subscription`
  * Add support for new value `lk_vat` on enums `Checkout.Session.collected_information.tax_ids[].type`, `Checkout.Session.customer_details.tax_ids[].type`, `Invoice.customer_tax_ids[].type`, `Order.tax_details.tax_ids[].type`, `QuotePreviewInvoice.customer_tax_ids[].type`, `Tax.Calculation.customer_details.tax_ids[].type`, `Tax.Transaction.customer_details.tax_ids[].type`, and `TaxId.type`
  * Add support for `digital` on `DelegatedCheckout.RequestedSession.fulfillment_details.fulfillment_options[]`, `DelegatedCheckout.RequestedSession.fulfillment_details.selected_fulfillment_option`, and `DelegatedCheckout\RequestedSession.update().$params.fulfillment_detail.selected_fulfillment_option`
  * Change `DelegatedCheckout\RequestedSession.update().$params.fulfillment_detail.selected_fulfillment_option.shipping` to be optional
  * Add support for `affiliate_attributions` on `DelegatedCheckout.RequestedSession`, `DelegatedCheckout\RequestedSession.confirm().$params`, and `DelegatedCheckout\RequestedSession.create().$params`
  * Add support for `fulfillment_type` on `DelegatedCheckout.RequestedSession.line_item_details[]`
  * Add support for `marketplace_seller_details`, `network_profile`, `privacy_notice_url`, `return_policy_url`, `store_policy_url`, and `terms_of_service_url` on `DelegatedCheckout.RequestedSession.seller_details`
  * Add support for `amount_to_counter` on `Dispute.update().$params`
  * Add support for new values `reserve.hold.created`, `reserve.hold.updated`, `reserve.plan.created`, `reserve.plan.disabled`, `reserve.plan.expired`, `reserve.plan.updated`, and `reserve.release.created` on enum `Event.type`
  * Add support for new values `terminal_wifi_certificate` and `terminal_wifi_private_key` on enum `File.purpose`
  * Add support for new value `pay_by_bank` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
  * Add support for `display_name` and `service_user_number` on `Mandate.payment_method_details.bacs_debit`
  * ⚠️ Change type of `PaymentAttemptRecord.payment_method_details.boleto.tax_id` and `PaymentRecord.payment_method_details.boleto.tax_id` from `string` to `nullable(string)`
  * Change type of `PaymentAttemptRecord.payment_method_details.us_bank_account.expected_debit_date` and `PaymentRecord.payment_method_details.us_bank_account.expected_debit_date` from `nullable(string)` to `string`
  * Add support for `request_reauthorization` on `PaymentIntent.confirm().$params.payment_method_option.card_present`, `PaymentIntent.confirm().$params.payment_method_option.card`, `PaymentIntent.create().$params.payment_method_option.card_present`, `PaymentIntent.create().$params.payment_method_option.card`, `PaymentIntent.payment_method_options.card_present`, `PaymentIntent.payment_method_options.card`, `PaymentIntent.update().$params.payment_method_option.card_present`, and `PaymentIntent.update().$params.payment_method_option.card`
  * Add support for `transaction_purpose` on `PaymentIntent.confirm().$params.payment_method_option.us_bank_account`, `PaymentIntent.create().$params.payment_method_option.us_bank_account`, `PaymentIntent.payment_method_options.us_bank_account`, and `PaymentIntent.update().$params.payment_method_option.us_bank_account`
  * Add support for new value `requires_reauthorization` on enum `PaymentIntent.status`
  * Add support for `optional_items` on `PaymentLink.update().$params`
  * Add support for new value `billing_schedules_invalid` on enum `Quote.status_details.stale.last_reason.type`
  * ⚠️ Remove support for `card_issuer_decline` on `Radar.PaymentEvaluation.insights`
  * Add support for `payment_behavior` on `SubscriptionItem.delete().$params`
  * Add support for `billing_cycle_anchor` on `Subscription.trial_settings.end_behavior`
  * Add support for `lk` on `Tax.Registration.country_options` and `Tax\Registration.create().$params.country_option`
  * Add support for `cellular` and `stripe_s710` on `Terminal.Configuration`, `Terminal\Configuration.create().$params`, and `Terminal\Configuration.update().$params`
  * Add support for new values `simulated_stripe_s710` and `stripe_s710` on enum `Terminal.Reader.device_type`
  * Add support for new values `ar_bank_account`, `bt_bank_account`, `co_bank_account`, `cr_bank_account`, `do_bank_account`, `gt_bank_account`, `md_bank_account`, `mk_bank_account`, `mo_bank_account`, `mz_bank_account`, `pe_bank_account`, `pk_bank_account`, `tw_bank_account`, and `uz_bank_account` on enums `V2.Account.configuration.recipient_data.default_outbound_destination.type` and `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
  * Add support for `recipient_onboarding` and `recipient_update` on `V2.Core.AccountLink.use_case` and `V2\Core\AccountLink.create().$params.use_case`
  * Add support for new values `recipient_onboarding` and `recipient_update` on enum `V2.Core.AccountLink.use_case.type`
  * Add support for `consumer` on `V2.Core.Account.configuration.storer.capabilities`, `V2\Core\Account.create().$params.configuration.storer.capability`, and `V2\Core\Account.update().$params.configuration.storer.capability`
  * Add support for new value `consumer.holds_currencies.usd` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for `funds_usage_type` on `V2.MoneyManagement.FinancialAccount.storage` and `V2\MoneyManagement\FinancialAccount.create().$params.storage`
  * Add support for `purpose` on `V2.MoneyManagement.OutboundPayment` and `V2\MoneyManagement\OutboundPayment.create().$params`
  * Add support for `branch_number` and `swift_code` on `V2.MoneyManagement.PayoutMethod.bank_account`
  * Add support for new values `dispute`, `inbound_payment_failure`, `inbound_payment`, `india_mdr_processing_fee`, `payment_method_passthrough_fee`, `refund`, and `tax_withholding` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
  * ⚠️ Remove support for values `charge_failure` and `charge` from enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
  * ⚠️ Change `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow` to be optional
  * Add support for new value `consumer.holds_currencies.usd` on enum `EventsV2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent.updated_capability`
  * Add support for snapshot event `BILLING_ALERT_RECOVERED` with resource `Billing.AlertRecovered`
  * Add support for snapshot events `RESERVE_HOLD_CREATED` and `RESERVE_HOLD_UPDATED` with resource `Reserve.Hold`
  * Add support for snapshot events `RESERVE_PLAN_CREATED`, `RESERVE_PLAN_DISABLED`, `RESERVE_PLAN_EXPIRED`, and `RESERVE_PLAN_UPDATED` with resource `Reserve.Plan`
  * Add support for snapshot event `RESERVE_RELEASE_CREATED` with resource `Reserve.Release`
  * Add support for event notification `V2BillingRateCardCustomPricingUnitOverageRateCreatedEvent` with related object `V2.Billing.RateCardCustomPricingUnitOverageRate`
  * Add support for event notifications `V2IamStripeAccessGrantApprovedEvent`, `V2IamStripeAccessGrantCanceledEvent`, `V2IamStripeAccessGrantDeniedEvent`, `V2IamStripeAccessGrantRemovedEvent`, `V2IamStripeAccessGrantRequestedEvent`, and `V2IamStripeAccessGrantUpdatedEvent`
  * Add support for error codes `storer_capability_missing` and `storer_capability_not_active` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `QuotePreviewInvoice.last_finalization_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`

## 19.5.0-alpha.1 - 2026-02-25
This release uses the API version `2026-01-28.preview`.

* [#2013](https://github.com/stripe/stripe-php/pull/2013) Update generated code for private-preview
  * Add support for new resource `AccountSignals`
  * Add support for `retrieve` method on resource `AccountSignals`
  * Add support for `aggregation_period`, `group_by`, and `triggered_at` on `Billing.AlertTriggered`
  * Add support for `external_account_collection` on `AccountLink.create().$params.collection_option`
  * Add support for `funding_source` on `ApplicationFee`
  * Change `DelegatedCheckout\RequestedSession.confirm().$params.payment_method_datum.billing_detail.address.line1`, `DelegatedCheckout\RequestedSession.create().$params.fulfillment_detail.address.line1`, `DelegatedCheckout\RequestedSession.create().$params.payment_method_datum.billing_detail.address.line1`, `DelegatedCheckout\RequestedSession.update().$params.fulfillment_detail.address.line1`, and `DelegatedCheckout\RequestedSession.update().$params.payment_method_datum.billing_detail.address.line1` to be optional
  * Add support for `hosted` and `ui_mode` on `FinancialConnections.Session` and `FinancialConnections\Session.create().$params`
  * Add support for `url` on `FinancialConnections.Session`
  * Add support for `billing_cycle_anchor` on `Subscription.create().$params.trial_setting.end_behavior` and `Subscription.update().$params.trial_setting.end_behavior`

## 19.4.0-alpha.4 - 2026-02-19
* ⚠️ [#2010](https://github.com/stripe/stripe-php/pull/2010) Update generated code for private-preview
  * Add support for `spend_threshold` on `Billing.Alert` and `Billing\Alert.create().$params`
  * ⚠️ Add support for new value `spend_threshold` on enum `Billing.Alert.alert_type`
  * Add support for `invoice_item`, `proration_details`, `proration`, and `subscription` on `InvoiceLineItem.parent.schedule_details`
  * Add support for `custom` on `PaymentMethod.update().$params`
  * Add support for `payment_method_reference` and `usage` on `PaymentMethod.custom`
  * Add support for `outstanding_usage_through` and `unused_time_from` on `Subscription.pause().$params.bill_for`
  * ⚠️ Remove support for `outstanding_usage` and `unused_time` on `Subscription.pause().$params.bill_for`
  * ⚠️ Remove support for `payment_behavior` on `Subscription.resume().$params`

## 19.4.0-alpha.3 - 2026-02-11
* [#2008](https://github.com/stripe/stripe-php/pull/2008) Update generated code for private-preview
  * Add support for new resources `V2.Billing.CadenceSpendModifier`, `V2.Billing.OneTimeItem`, and `V2.Billing.RateCardCustomPricingUnitOverageRate`
  * Add support for `all`, `create`, `delete`, and `retrieve` methods on resource `V2.Billing.RateCardCustomPricingUnitOverageRate`
  * Add support for `all`, `create`, `retrieve`, and `update` methods on resource `V2.Billing.OneTimeItem`
  * Add support for `retrieve` method on resource `V2.Billing.CadenceSpendModifier`
  * Change `EventsV2CoreHealthFraudRateIncreasedEvent.impact.realized_fraud_amount.value`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent.impact.approved_amount.value`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent.impact.declined_amount.value`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsResolvedEvent.impact.approved_amount.value`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsResolvedEvent.impact.declined_amount.value`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutFiringEvent.impact.approved_amount.value`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutFiringEvent.impact.declined_amount.value`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent.impact.approved_amount.value`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent.impact.declined_amount.value`, `V2.Billing.ServiceAction.credit_grant.amount.monetary.value`, `V2.Billing.ServiceAction.credit_grant_per_tenant.amount.monetary.value`, `V2.Core.Account.identity.business_details.annual_revenue.amount.value`, `V2.Core.Account.identity.business_details.monthly_estimated_revenue.amount.value`, `V2.FinancialAddressGeneratedMicrodeposits.amounts[].value`, `V2.MoneyManagement.Adjustment.amount.value`, `V2.MoneyManagement.CurrencyConversion.from.amount.value`, `V2.MoneyManagement.CurrencyConversion.to.amount.value`, `V2.MoneyManagement.FinancialAccount.balance.available.value.value`, `V2.MoneyManagement.FinancialAccount.balance.inbound_pending.value.value`, `V2.MoneyManagement.FinancialAccount.balance.outbound_pending.value.value`, `V2.MoneyManagement.FinancialAccount.payments.starting_balance.available.value.value`, `V2.MoneyManagement.InboundTransfer.amount.value`, `V2.MoneyManagement.InboundTransfer.from.debited.value`, `V2.MoneyManagement.InboundTransfer.to.credited.value`, `V2.MoneyManagement.OutboundPayment.amount.value`, `V2.MoneyManagement.OutboundPayment.from.debited.value`, `V2.MoneyManagement.OutboundPayment.to.credited.value`, `V2.MoneyManagement.OutboundPaymentQuote.amount.value`, `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[].amount.value`, `V2.MoneyManagement.OutboundPaymentQuote.from.debited.value`, `V2.MoneyManagement.OutboundPaymentQuote.to.credited.value`, `V2.MoneyManagement.OutboundTransfer.amount.value`, `V2.MoneyManagement.OutboundTransfer.from.debited.value`, `V2.MoneyManagement.OutboundTransfer.to.credited.value`, `V2.MoneyManagement.ReceivedCredit.amount.value`, `V2.MoneyManagement.ReceivedCredit.external_amount.value`, `V2.MoneyManagement.ReceivedDebit.amount.value`, `V2.MoneyManagement.ReceivedDebit.card_spend.authorization.amount.value`, `V2.MoneyManagement.ReceivedDebit.card_spend.card_transactions[].amount.value`, `V2.MoneyManagement.ReceivedDebit.external_amount.value`, `V2.MoneyManagement.Transaction.amount.value`, `V2.MoneyManagement.Transaction.balance_impact.available.value`, `V2.MoneyManagement.Transaction.balance_impact.inbound_pending.value`, `V2.MoneyManagement.Transaction.balance_impact.outbound_pending.value`, `V2.MoneyManagement.TransactionEntry.balance_impact.available.value`, `V2.MoneyManagement.TransactionEntry.balance_impact.inbound_pending.value`, `V2.MoneyManagement.TransactionEntry.balance_impact.outbound_pending.value`, `V2.Payments.OffSessionPayment.amount_capturable.value`, `V2.Payments.OffSessionPayment.amount_requested.value`, `V2.Payments.SettlementAllocationIntent.amount.value`, `V2.Payments.SettlementAllocationIntentSplit.amount.value`, `V2\Billing\ServiceAction.create().$params.credit_grant.amount.monetary.value`, `V2\Billing\ServiceAction.create().$params.credit_grant_per_tenant.amount.monetary.value`, `V2\Core\Account.create().$params.identity.business_detail.annual_revenue.amount.value`, `V2\Core\Account.create().$params.identity.business_detail.monthly_estimated_revenue.amount.value`, `V2\Core\Account.update().$params.identity.business_detail.annual_revenue.amount.value`, `V2\Core\Account.update().$params.identity.business_detail.monthly_estimated_revenue.amount.value`, `V2\Core\AccountToken.create().$params.identity.business_detail.annual_revenue.amount.value`, `V2\Core\AccountToken.create().$params.identity.business_detail.monthly_estimated_revenue.amount.value`, `V2\FinancialAddressCreditSimulation.credit().$params.amount.value`, `V2\MoneyManagement\CurrencyConversion.create().$params.from.amount.value`, `V2\MoneyManagement\CurrencyConversion.create().$params.to.amount.value`, `V2\MoneyManagement\InboundTransfer.create().$params.amount.value`, `V2\MoneyManagement\OutboundPayment.create().$params.amount.value`, `V2\MoneyManagement\OutboundPaymentQuote.create().$params.amount.value`, `V2\MoneyManagement\OutboundTransfer.create().$params.amount.value`, `V2\Payments\OffSessionPayment.create().$params.amount.value`, `V2\Payments\SettlementAllocationIntent.create().$params.amount.value`, `V2\Payments\SettlementAllocationIntent.update().$params.amount.value`, and `V2\Payments\SettlementAllocationIntentSplit.create().$params.amount.value` to be required
  * Change `EventsV2CoreHealthFraudRateIncreasedEvent.impact.realized_fraud_amount.currency`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent.impact.approved_amount.currency`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent.impact.declined_amount.currency`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsResolvedEvent.impact.approved_amount.currency`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsResolvedEvent.impact.declined_amount.currency`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutFiringEvent.impact.approved_amount.currency`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutFiringEvent.impact.declined_amount.currency`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent.impact.approved_amount.currency`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent.impact.declined_amount.currency`, `V2.Billing.ServiceAction.credit_grant.amount.monetary.currency`, `V2.Billing.ServiceAction.credit_grant_per_tenant.amount.monetary.currency`, `V2.Core.Account.identity.business_details.annual_revenue.amount.currency`, `V2.Core.Account.identity.business_details.monthly_estimated_revenue.amount.currency`, `V2.FinancialAddressGeneratedMicrodeposits.amounts[].currency`, `V2.MoneyManagement.Adjustment.amount.currency`, `V2.MoneyManagement.CurrencyConversion.from.amount.currency`, `V2.MoneyManagement.CurrencyConversion.to.amount.currency`, `V2.MoneyManagement.FinancialAccount.balance.available.value.currency`, `V2.MoneyManagement.FinancialAccount.balance.inbound_pending.value.currency`, `V2.MoneyManagement.FinancialAccount.balance.outbound_pending.value.currency`, `V2.MoneyManagement.FinancialAccount.payments.starting_balance.available.value.currency`, `V2.MoneyManagement.InboundTransfer.amount.currency`, `V2.MoneyManagement.InboundTransfer.from.debited.currency`, `V2.MoneyManagement.InboundTransfer.to.credited.currency`, `V2.MoneyManagement.OutboundPayment.amount.currency`, `V2.MoneyManagement.OutboundPayment.from.debited.currency`, `V2.MoneyManagement.OutboundPayment.to.credited.currency`, `V2.MoneyManagement.OutboundPaymentQuote.amount.currency`, `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[].amount.currency`, `V2.MoneyManagement.OutboundPaymentQuote.from.debited.currency`, `V2.MoneyManagement.OutboundPaymentQuote.to.credited.currency`, `V2.MoneyManagement.OutboundTransfer.amount.currency`, `V2.MoneyManagement.OutboundTransfer.from.debited.currency`, `V2.MoneyManagement.OutboundTransfer.to.credited.currency`, `V2.MoneyManagement.ReceivedCredit.amount.currency`, `V2.MoneyManagement.ReceivedCredit.external_amount.currency`, `V2.MoneyManagement.ReceivedDebit.amount.currency`, `V2.MoneyManagement.ReceivedDebit.card_spend.authorization.amount.currency`, `V2.MoneyManagement.ReceivedDebit.card_spend.card_transactions[].amount.currency`, `V2.MoneyManagement.ReceivedDebit.external_amount.currency`, `V2.MoneyManagement.Transaction.amount.currency`, `V2.MoneyManagement.Transaction.balance_impact.available.currency`, `V2.MoneyManagement.Transaction.balance_impact.inbound_pending.currency`, `V2.MoneyManagement.Transaction.balance_impact.outbound_pending.currency`, `V2.MoneyManagement.TransactionEntry.balance_impact.available.currency`, `V2.MoneyManagement.TransactionEntry.balance_impact.inbound_pending.currency`, `V2.MoneyManagement.TransactionEntry.balance_impact.outbound_pending.currency`, `V2.Payments.OffSessionPayment.amount_capturable.currency`, `V2.Payments.OffSessionPayment.amount_requested.currency`, `V2.Payments.SettlementAllocationIntent.amount.currency`, `V2.Payments.SettlementAllocationIntentSplit.amount.currency`, `V2\Billing\ServiceAction.create().$params.credit_grant.amount.monetary.currency`, `V2\Billing\ServiceAction.create().$params.credit_grant_per_tenant.amount.monetary.currency`, `V2\Core\Account.create().$params.identity.business_detail.annual_revenue.amount.currency`, `V2\Core\Account.create().$params.identity.business_detail.monthly_estimated_revenue.amount.currency`, `V2\Core\Account.update().$params.identity.business_detail.annual_revenue.amount.currency`, `V2\Core\Account.update().$params.identity.business_detail.monthly_estimated_revenue.amount.currency`, `V2\Core\AccountToken.create().$params.identity.business_detail.annual_revenue.amount.currency`, `V2\Core\AccountToken.create().$params.identity.business_detail.monthly_estimated_revenue.amount.currency`, `V2\FinancialAddressCreditSimulation.credit().$params.amount.currency`, `V2\MoneyManagement\CurrencyConversion.create().$params.from.amount.currency`, `V2\MoneyManagement\CurrencyConversion.create().$params.to.amount.currency`, `V2\MoneyManagement\InboundTransfer.create().$params.amount.currency`, `V2\MoneyManagement\OutboundPayment.create().$params.amount.currency`, `V2\MoneyManagement\OutboundPaymentQuote.create().$params.amount.currency`, `V2\MoneyManagement\OutboundTransfer.create().$params.amount.currency`, `V2\Payments\OffSessionPayment.create().$params.amount.currency`, `V2\Payments\SettlementAllocationIntent.create().$params.amount.currency`, `V2\Payments\SettlementAllocationIntent.update().$params.amount.currency`, and `V2\Payments\SettlementAllocationIntentSplit.create().$params.amount.currency` to be required
  * Add support for `settlement_type` on `ApplicationFee`
  * Add support for `rate_card_custom_pricing_unit_overage_rate_details` on `InvoiceItem.pricing` and `InvoiceLineItem.pricing`
  * Add support for new value `rate_card_custom_pricing_unit_overage_rate_details` on enums `InvoiceItem.pricing.type` and `InvoiceLineItem.pricing.type`
  * Add support for `default_settings` on `Invoice.create_preview().$params.schedule_detail`
  * Change type of `Quote.update().$params.subscription_data_override.billing_schedules` from `emptyable(array(billing_schedules_update_specs))` to `array(billing_schedules_update_specs)`
  * Add support for `payment_behavior` on `Subscription.resume().$params`
  * Add support for `effective_at` and `spend_modifier_rule` on `V2.Billing.IntentAction.apply`, `V2.Billing.IntentAction.remove`, `V2\Billing\Intent.create().$params.action.apply`, and `V2\Billing\Intent.create().$params.action.remove`
  * Change type of `V2.Billing.IntentAction.apply.type`, `V2.Billing.IntentAction.remove.type`, `V2\Billing\Intent.create().$params.action.apply.type`, and `V2\Billing\Intent.create().$params.action.remove.type` from `literal('invoice_discount_rule')` to `enum('invoice_discount_rule'|'spend_modifier_rule')`

## 19.4.0-alpha.2 - 2026-02-04
* [#2005](https://github.com/stripe/stripe-php/pull/2005) Update generated code for private-preview
  * Add support for new resource `V2.Core.ConnectionSession`
  * Add support for `create` and `retrieve` methods on resource `V2.Core.ConnectionSession`
  * Add support for `all` method on resources `V2.Payments.SettlementAllocationIntentSplit` and `V2.Payments.SettlementAllocationIntent`
  * Add support for `agentic_commerce_settings` on `AccountSession.create().$params.component`
  * Add support for `terminal_hardware_orders` and `terminal_hardware_shop` on `AccountSession.components` and `AccountSession.create().$params.component`
  * Add support for `network_cost_passthrough_report` on `AccountSession.components`
  * Add support for new values `ae_bank_account`, `ag_bank_account`, `bh_bank_account`, `gm_bank_account`, `hk_bank_account`, `kh_bank_account`, `lc_bank_account`, `mc_bank_account`, `mg_bank_account`, `my_bank_account`, `qa_bank_account`, `rw_bank_account`, `th_bank_account`, `tt_bank_account`, and `vn_bank_account` on enums `V2.Account.configuration.recipient_data.default_outbound_destination.type` and `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
  * Add support for `cadence_data` on `V2.Billing.Intent` and `V2\Billing\Intent.create().$params`
  * Add support for `cancellation_details` on `V2.Billing.IntentAction.deactivate`, `V2.Billing.PricingPlanSubscription`, and `V2\Billing\Intent.create().$params.action.deactivate`
  * Add support for `contact_phone` on `V2.Core.Account`, `V2\Core\Account.create().$params`, `V2\Core\Account.update().$params`, and `V2\Core\AccountToken.create().$params`
  * Add support for `registration_date` on `V2.Core.Account.identity.business_details`, `V2\Core\Account.create().$params.identity.business_detail`, `V2\Core\Account.update().$params.identity.business_detail`, and `V2\Core\AccountToken.create().$params.identity.business_detail`
  * Add support for new value `gb_vat` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
  * Add support for `reference` on `V2.MoneyManagement.Adjustment`
  * Add support for `accrued_fees` on `V2.MoneyManagement.FinancialAccount`
  * Add support for `starting_balance` on `V2.MoneyManagement.FinancialAccount.payments`
  * Add support for new value `accrued_fees` on enum `V2.MoneyManagement.FinancialAccount.type`
  * Add support for `account_holder_address` and `account_holder_name` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
  * Add support for `fingerprint` on `V2.MoneyManagement.PayoutMethod.card`
  * Add support for `card_spend` on `V2.MoneyManagement.ReceivedCredit` and `V2.MoneyManagement.ReceivedDebit`
  * Add support for new value `card_spend` on enum `V2.MoneyManagement.ReceivedCredit.type`
  * Add support for new value `card_spend` on enum `V2.MoneyManagement.ReceivedDebit.type`
  * Add support for new values `advance`, `anticipation_repayment`, `balance_transfer`, `charge_failure`, `charge`, `climate_order_purchase`, `climate_order_refund`, `connect_collection_transfer`, `connect_reserved_funds`, `contribution`, `dispute_reversal`, `financing_paydown_reversal`, `financing_paydown`, `inbound_transfer_reversal`, `issuing_dispute_fraud_liability_debit`, `issuing_dispute_provisional_credit_reversal`, `issuing_dispute_provisional_credit`, `issuing_dispute`, `minimum_balance_hold`, `network_cost`, `obligation`, `outbound_payment_reversal`, `outbound_transfer_reversal`, `partial_capture_reversal`, `payment_network_reserved_funds`, `platform_earning_refund`, `platform_earning`, `platform_fee`, `received_credit_reversal`, `received_debit_reversal`, `refund_failure`, `risk_reserved_funds`, `stripe_balance_payment_debit_reversal`, `stripe_balance_payment_debit`, `stripe_fee_tax`, `transfer_reversal`, and `unreconciled_customer_funds` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
  * Add support for `application_fee_refund`, `application_fee`, `charge`, `dispute`, `payout`, `refund`, `reserve_hold`, `reserve_release`, `topup`, `transfer_reversal`, and `transfer` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
  * Add support for new values `application_fee_refund`, `application_fee`, `charge`, `dispute`, `payout`, `refund`, `reserve_hold`, `reserve_release`, `topup`, `transfer_reversal`, and `transfer` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
  * Change `V2.Payments.SettlementAllocationIntentSplit.flow` to be optional
  * Change `V2\Billing\RateCardRate.create().$params.metered_item` to be required

## 19.4.0-alpha.1 - 2026-01-28
This release changes the pinned API version to `2026-01-28.preview`.

* [#2002](https://github.com/stripe/stripe-php/pull/2002) Update generated code for private-preview
  * Add support for new resources `FrMealVouchersOnboarding`, `Reserve.Hold`, `Reserve.Plan`, and `Reserve.Release`
  * Add support for `all`, `create`, `retrieve`, and `update` methods on resource `FrMealVouchersOnboarding`
  * Add support for `all` and `retrieve` methods on resources `Reserve.Hold` and `Reserve.Release`
  * Add support for `retrieve` method on resource `Reserve.Plan`
  * Add support for `pause` method on resource `Subscription`
  * Add support for `service_period_details` on `Discount`
  * Add support for `agentic_commerce_settings` on `AccountSession.components`
  * Add support for new value `risk_reserved` on enum `BalanceTransaction.balance_type`
  * Add support for `service_period` on `Coupon.create().$params` and `Coupon`
  * Add support for new value `service_period` on enum `Coupon.duration`
  * Change type of `InvoiceItem.pricing.price_details.price` and `InvoiceLineItem.pricing.price_details.price` from `string` to `expandable($Price)`
  * Add support for `settings` on `Invoice.create_preview().$params.discount`, `Invoice.create_preview().$params.schedule_detail.amendment.discount_action.add`, `Invoice.create_preview().$params.schedule_detail.amendment.discount_action.set`, `Invoice.create_preview().$params.schedule_detail.amendment.item_action.add.discount`, `Invoice.create_preview().$params.schedule_detail.amendment.item_action.set.discount`, `Invoice.create_preview().$params.schedule_detail.phase.discount`, `Invoice.create_preview().$params.schedule_detail.phase.item.discount`, `Invoice.create_preview().$params.subscription_detail.item.discount`, `Quote.create().$params.line.action.add_discount`, `Quote.create().$params.line.action.add_item.discount`, `Quote.create().$params.line.action.set_discount`, `Quote.create().$params.line.action.set_item.discount`, `Quote.update().$params.line.action.add_discount`, `Quote.update().$params.line.action.add_item.discount`, `Quote.update().$params.line.action.set_discount`, `Quote.update().$params.line.action.set_item.discount`, `Subscription.create().$params.discount`, `Subscription.create().$params.item.discount`, `Subscription.update().$params.discount`, `Subscription.update().$params.item.discount`, `SubscriptionItem.create().$params.discount`, `SubscriptionItem.update().$params.discount`, `SubscriptionSchedule.amend().$params.amendment.discount_action.add`, `SubscriptionSchedule.amend().$params.amendment.discount_action.set`, `SubscriptionSchedule.amend().$params.amendment.item_action.add.discount`, `SubscriptionSchedule.amend().$params.amendment.item_action.set.discount`, `SubscriptionSchedule.create().$params.phase.discount`, `SubscriptionSchedule.create().$params.phase.item.discount`, `SubscriptionSchedule.update().$params.phase.discount`, and `SubscriptionSchedule.update().$params.phase.item.discount`
  * Add support for `subtotal` on `InvoiceLineItem`
  * Add support for `billing_cadence` on `Subscription.all().$params`

## 19.3.0-alpha.1 - 2026-01-21
* [#1998](https://github.com/stripe/stripe-php/pull/1998) Update generated code for private-preview
  * Remove support for `pause` method on resource `Subscription`
  * Change type of `Quote.subscription_data.phase_effective_at` and `Quote.subscription_data_overrides[].phase_effective_at` from `enum('billing_period_start'|'phase_start')` to `nullable(enum('billing_period_start'|'phase_start'))`

## 19.2.0-alpha.3 - 2026-01-14
* [#1996](https://github.com/stripe/stripe-php/pull/1996) Update generated code for private-preview
  * Add support for `risk_details` on `DelegatedCheckout.RequestedSession`
  * Remove support for `description`, `images`, and `name` on `DelegatedCheckout.RequestedSession.line_item_details[]`
  * Add support for `name` on `ProductCatalog.TrialOffer` and `ProductCatalog\TrialOffer.create().$params`
  * Add support for `login_failed` and `registration_failed` on `Radar.AccountEvaluation.events[]` and `Radar\AccountEvaluation.update().$params`
  * Change type of `Radar\AccountEvaluation.update().$params.type` from `literal('registration_succeeded')` to `enum('login_failed'|'login_succeeded'|'registration_failed'|'registration_succeeded')`

## 19.2.0-alpha.2 - 2026-01-07
* [#1979](https://github.com/stripe/stripe-php/pull/1979) Update generated code for private-preview
  * Add support for new resource `Tax.Location`
  * Add support for `all`, `create`, and `retrieve` methods on resource `Tax.Location`
  * Add support for `pause` method on resource `Subscription`
  * Add support for `performance_location` on `Checkout\Session.create().$params.line_item.price_datum.product_datum.tax_detail`, `Checkout\Session.update().$params.line_item.price_datum.product_datum.tax_detail`, `Invoice.add_lines().$params.line.price_datum.product_datum.tax_detail`, `Invoice.update_lines().$params.line.price_datum.product_datum.tax_detail`, `InvoiceLineItem.update().$params.price_datum.product_datum.tax_detail`, `PaymentLink.create().$params.line_item.price_datum.product_datum.tax_detail`, `Product.create().$params.tax_detail`, `Product.update().$params.tax_detail`, `Tax.CalculationLineItem`, and `Tax\Calculation.create().$params.line_item`
  * Add support for new value `performance` on enums `Tax.Calculation.shipping_cost.tax_breakdown[].sourcing`, `Tax.CalculationLineItem.tax_breakdown[].sourcing`, and `Tax.Transaction.shipping_cost.tax_breakdown[].sourcing`
  * Add support for new values `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on enums `Tax.Calculation.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`, `Tax.Calculation.tax_breakdown[].tax_rate_details.tax_type`, `Tax.CalculationLineItem.tax_breakdown[].tax_rate_details.tax_type`, and `Tax.Transaction.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`
  * Change type of `DelegatedCheckout\RequestedSession.update().$params.metadata` from `map(string: string)` to `emptyable(map(string: string))`
  * Change type of `DelegatedCheckout\RequestedSession.update().$params.payment_method_data` from `payment_method_data` to `emptyable(payment_method_data)`
  * Change type of `DelegatedCheckout\RequestedSession.update().$params.shared_metadata` from `map(string: string)` to `emptyable(map(string: string))`
  * Add support for `subscription` on `Invoice.parent.schedule_details` and `QuotePreviewInvoice.parent.schedule_details`
  * Change type of `PaymentIntent.confirm().$params.payment_detail.benefit.fr_meal_voucher`, `PaymentIntent.create().$params.payment_detail.benefit.fr_meal_voucher`, `PaymentIntent.update().$params.payment_detail.benefit.fr_meal_voucher`, `SetupIntent.confirm().$params.setup_detail.benefit.fr_meal_voucher`, `SetupIntent.create().$params.setup_detail.benefit.fr_meal_voucher`, and `SetupIntent.update().$params.setup_detail.benefit.fr_meal_voucher` from `payment_details_benefit_fr_meal_voucher` to `emptyable(payment_details_benefit_fr_meal_voucher)`
  * Add support for `tax_details` on `Plan.create().$params.product` and `Price.create().$params.product_datum`
  * Add support for `external_reference` on `Plan` and `Price`
  * Add support for new value `phase_start` on enums `Quote.subscription_data.phase_effective_at` and `Quote.subscription_data_overrides[].phase_effective_at`
  * Remove support for value `line_start` from enums `Quote.subscription_data.phase_effective_at` and `Quote.subscription_data_overrides[].phase_effective_at`
  * Add support for `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on `Tax.Registration.country_options.us`
  * Add support for new values `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on enum `Tax.Registration.country_options.us.type`
  * Add support for `requirements` on `TaxCode`
* [#1989](https://github.com/stripe/stripe-php/pull/1989) Update generated code for private-preview
  * Add support for `tracking_details` on `V2.MoneyManagement.OutboundPayment`
  * Add support for `paper_check` on `V2.MoneyManagement.OutboundPayment.delivery_options` and `V2\MoneyManagement\OutboundPayment.create().$params.delivery_option`
  * Add support for event notification `V2CoreAccountIncludingFutureRequirementsUpdatedEvent` with related object `V2.Core.Account`

## 19.2.0-alpha.1 - 2025-12-14
This release changes the pinned API version to `2025-12-15.preview`.

* [#1978](https://github.com/stripe/stripe-php/pull/1978) Update generated code for private-preview
  * Add support for new resources `SharedPayment.GrantedToken`, `V2.Iam.ApiKey`, `V2.Payments.SettlementAllocationIntentSplit`, `V2.Payments.SettlementAllocationIntent`, and `V2.Tax.ManualRule`
  * Add support for `retrieve` method on resource `SharedPayment.GrantedToken`
  * Add support for `create` and `update` test helper methods on resource `SharedPayment.GrantedToken`
  * Add support for `all`, `create`, `deactivate`, `retrieve`, and `update` methods on resource `V2.Tax.ManualRule`
  * Add support for `cancel`, `create`, `retrieve`, `submit`, and `update` methods on resource `V2.Payments.SettlementAllocationIntent`
  * Add support for `cancel`, `create`, and `retrieve` methods on resource `V2.Payments.SettlementAllocationIntentSplit`
  * Add support for `all`, `create`, `expire`, `retrieve`, `rotate`, and `update` methods on resource `V2.Iam.ApiKey`
  * Add support for `check_scanning` on `AccountSession.create().$params.component`
  * Add support for `tax_details` on `Checkout\Session.create().$params.line_item.price_datum.product_datum`, `Checkout\Session.update().$params.line_item.price_datum.product_datum`, `Invoice.add_lines().$params.line.price_datum.product_datum`, `Invoice.update_lines().$params.line.price_datum.product_datum`, `InvoiceLineItem.update().$params.price_datum.product_datum`, `PaymentLink.create().$params.line_item.price_datum.product_datum`, `Product.create().$params`, and `Product.update().$params`
  * Add support for `payment_method_data` on `DelegatedCheckout\RequestedSession.confirm().$params`
  * Add support for `product_details` on `DelegatedCheckout.RequestedSession.line_item_details[]`
  * Add support for `wallets` on `Issuing\Card.all().$params`
  * Add support for `primary_account_identifier` on `Issuing.Card.wallets.apple_pay` and `Issuing.Card.wallets.google_pay`
  * Add support for `shared_payment_granted_token` on `PaymentIntent.confirm().$params`, `PaymentIntent.create().$params`, and `PaymentIntent`
  * Change `ProductCatalog.TrialOffer.duration.relative` to be optional
  * Add support for new values `al_bank_account`, `am_bank_account`, `bn_bank_account`, `bw_bank_account`, `dz_bank_account`, `gy_bank_account`, `jm_bank_account`, `jo_bank_account`, `kw_bank_account`, `lk_bank_account`, `ma_bank_account`, `om_bank_account`, and `tz_bank_account` on enum `V2.Account.configuration.recipient_data.default_outbound_destination.type`
  * Add support for `instant` on `V2.Account.configuration.recipient_data.features.bank_accounts`, `V2.Core.Account.configuration.recipient.capabilities.bank_accounts`, `V2\Account.create().$params.configuration.recipient_datum.feature.bank_account`, `V2\Account.update().$params.configuration.recipient_datum.feature.bank_account`, `V2\Core\Account.create().$params.configuration.recipient.capability.bank_account`, and `V2\Core\Account.update().$params.configuration.recipient.capability.bank_account`
  * Add support for new value `bank_accounts.instant` on enum `V2.Account.requirements[].impact.required_for_features`
  * Add support for `collect_at` on `V2.Billing.IntentAction.deactivate`, `V2.Billing.IntentAction.modify`, `V2.Billing.IntentAction.subscribe`, `V2\Billing\Intent.create().$params.action.deactivate`, `V2\Billing\Intent.create().$params.action.modify`, and `V2\Billing\Intent.create().$params.action.subscribe`
  * Remove support for `billing_details` on `V2.Billing.IntentAction.deactivate`, `V2.Billing.IntentAction.modify`, `V2.Billing.IntentAction.subscribe`, `V2\Billing\Intent.create().$params.action.deactivate`, `V2\Billing\Intent.create().$params.action.modify`, and `V2\Billing\Intent.create().$params.action.subscribe`
  * Add support for `overrides` on `V2.Billing.IntentAction.deactivate.pricing_plan_subscription_details`, `V2.Billing.IntentAction.modify.pricing_plan_subscription_details`, `V2.Billing.IntentAction.subscribe.pricing_plan_subscription_details`, `V2\Billing\Intent.create().$params.action.deactivate.pricing_plan_subscription_detail`, `V2\Billing\Intent.create().$params.action.modify.pricing_plan_subscription_detail`, and `V2\Billing\Intent.create().$params.action.subscribe.pricing_plan_subscription_detail`
  * Remove support for `requested` on `V2.Core.Account.configuration.card_creator.capabilities.commercial.celtic.charge_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.celtic.spend_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.cross_river_bank.charge_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.cross_river_bank.spend_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.lead.prepaid_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.stripe.charge_card`, `V2.Core.Account.configuration.card_creator.capabilities.commercial.stripe.prepaid_card`, `V2.Core.Account.configuration.recipient.capabilities.crypto_wallets`, `V2.Core.Account.configuration.storer.capabilities.financial_addresses.crypto_wallets`, `V2.Core.Account.configuration.storer.capabilities.holds_currencies.usdc`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments.crypto_wallets`, and `V2.Core.Account.configuration.storer.capabilities.outbound_transfers.crypto_wallets`
  * Add support for new value `bank_accounts.instant` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for `alternative_reference` on `V2.Core.Vault.GbBankAccount`, `V2.Core.Vault.UsBankAccount`, and `V2.MoneyManagement.PayoutMethod`
  * Add support for `managed_by` and `payments` on `V2.MoneyManagement.FinancialAccount`
  * Add support for new value `payments` on enum `V2.MoneyManagement.FinancialAccount.type`
  * Add support for `speed` on `V2.MoneyManagement.OutboundPayment.delivery_options`, `V2.MoneyManagement.OutboundPaymentQuote.delivery_options`, `V2\MoneyManagement\OutboundPayment.create().$params.delivery_option`, and `V2\MoneyManagement\OutboundPaymentQuote.create().$params.delivery_option`
  * Add support for new value `real_time_payout_fee` on enum `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[].type`
  * Add support for `types` on `V2\MoneyManagement\FinancialAccount.all().$params`
  * Add support for new value `bank_accounts.instant` on enum `EventsV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent.updated_capability`
  * Add support for `top_impacted_accounts` on `EventsV2CoreHealthApiErrorFiringEvent.impact`, `EventsV2CoreHealthApiErrorResolvedEvent.impact`, `EventsV2CoreHealthApiLatencyFiringEvent.impact`, `EventsV2CoreHealthApiLatencyResolvedEvent.impact`, `EventsV2CoreHealthPaymentMethodErrorFiringEvent.impact`, and `EventsV2CoreHealthPaymentMethodErrorResolvedEvent.impact`
  * Add support for event notifications `V2CoreHealthSepaDebitDelayedFiringEvent`, `V2CoreHealthSepaDebitDelayedResolvedEvent`, and `V2PaymentsSettlementAllocationIntentNotFoundEvent`
  * Add support for event notifications `V2PaymentsSettlementAllocationIntentCanceledEvent`, `V2PaymentsSettlementAllocationIntentCreatedEvent`, `V2PaymentsSettlementAllocationIntentErroredEvent`, `V2PaymentsSettlementAllocationIntentFundsNotReceivedEvent`, `V2PaymentsSettlementAllocationIntentMatchedEvent`, `V2PaymentsSettlementAllocationIntentSettledEvent`, and `V2PaymentsSettlementAllocationIntentSubmittedEvent` with related object `V2.Payments.SettlementAllocationIntent`
  * Add support for event notifications `V2PaymentsSettlementAllocationIntentSplitCanceledEvent`, `V2PaymentsSettlementAllocationIntentSplitCreatedEvent`, and `V2PaymentsSettlementAllocationIntentSplitSettledEvent` with related object `V2.Payments.SettlementAllocationIntentSplit`

## 19.1.0-alpha.4 - 2025-12-04
* [#1977](https://github.com/stripe/stripe-php/pull/1977) Update generated code for private-preview
  * Add support for event notifications `V2IamApiKeyCreatedEvent`, `V2IamApiKeyDefaultSecretRevealedEvent`, `V2IamApiKeyExpiredEvent`, `V2IamApiKeyPermissionsUpdatedEvent`, `V2IamApiKeyRotatedEvent`, and `V2IamApiKeyUpdatedEvent`
* [#1974](https://github.com/stripe/stripe-php/pull/1974) Update generated code for private-preview
  * Add support for `check_scanning` on `AccountSession.components`
  * Add support for `client` on `V2.Core.Event.reason.request`
  * Add support for `stripe_balance_payment` on `V2.MoneyManagement.ReceivedCredit` and `V2.MoneyManagement.ReceivedDebit`
  * Add support for new value `stripe_balance_payment` on enum `V2.MoneyManagement.ReceivedCredit.type`
  * Add support for `balance_transfer` on `V2.MoneyManagement.ReceivedDebit`
  * Add support for new values `balance_transfer` and `stripe_balance_payment` on enum `V2.MoneyManagement.ReceivedDebit.type`
  * Add support for `include` on `V2\Core\Event.all().$params` and `V2\Core\Event.retrieve().$params`

## 19.1.0-alpha.3 - 2025-11-24
* [#1971](https://github.com/stripe/stripe-php/pull/1971) Update generated code for private-preview
  * Add support for new resource `ProductCatalog.TrialOffer`
  * Add support for `create` method on resource `ProductCatalog.TrialOffer`
  * Remove support for `amount_subtotal_after_discount` on `DelegatedCheckout.RequestedSession.line_item_details[]` and `DelegatedCheckout.RequestedSession.total_details`
  * Remove support for `amount_total`, `unit_amount_after_discount`, and `unit_discount` on `DelegatedCheckout.RequestedSession.line_item_details[]`
  * Add support for `amount_cart_discount` and `amount_items_discount` on `DelegatedCheckout.RequestedSession.total_details`
  * Remove support for `amount_discount` on `DelegatedCheckout.RequestedSession.total_details`
  * Add support for `payments_orchestration` on `PaymentIntent.create().$params` and `PaymentIntent`

## 19.1.0-alpha.2 - 2025-11-20
This release changes the pinned API version to `2025-11-17.preview`.

* [#1967](https://github.com/stripe/stripe-php/pull/1967) Update CHANGELOG.md for private preview
* [#1968](https://github.com/stripe/stripe-php/pull/1968) Update generated code for private-preview
  * Add support for new resources `V2.Core.AccountPersonToken`, `V2.Core.AccountToken`, and `V2.MoneyManagement.CurrencyConversion`
  * Add support for `all`, `create`, and `retrieve` methods on resource `V2.MoneyManagement.CurrencyConversion`
  * Add support for `create` and `retrieve` methods on resources `V2.Core.AccountPersonToken` and `V2.Core.AccountToken`
  * Add support for `effective_at` on `Invoice.create_preview().$params.schedule_detail.amendment`, `Invoice.create_preview().$params.schedule_detail.phase`, `Quote.create().$params.line`, `Quote.update().$params.line`, `QuoteLine`, `QuotePreviewSubscriptionSchedule.phases[]`, `SubscriptionSchedule.amend().$params.amendment`, `SubscriptionSchedule.create().$params.phase`, `SubscriptionSchedule.phases[]`, and `SubscriptionSchedule.update().$params.phase`
  * Add support for `trial_offer` on `Invoice.create_preview().$params.schedule_detail.amendment.item_action.add`, `Invoice.create_preview().$params.schedule_detail.amendment.item_action.set`, `Invoice.create_preview().$params.schedule_detail.phase.item`, `Quote.create().$params.line.action.add_item`, `Quote.create().$params.line.action.set_item`, `Quote.update().$params.line.action.add_item`, `Quote.update().$params.line.action.set_item`, `QuoteLine.actions[].add_item`, `QuoteLine.actions[].set_items[]`, `QuotePreviewSubscriptionSchedule.phases[].items[]`, `SubscriptionSchedule.amend().$params.amendment.item_action.add`, `SubscriptionSchedule.amend().$params.amendment.item_action.set`, `SubscriptionSchedule.create().$params.phase.item`, `SubscriptionSchedule.phases[].items[]`, and `SubscriptionSchedule.update().$params.phase.item`
  * Change type of `DelegatedCheckout.RequestedSession.amount_subtotal` from `longInteger` to `nullable(longInteger)`
  * Change type of `DelegatedCheckout.RequestedSession.amount_total` from `longInteger` to `nullable(longInteger)`
  * Add support for `amount_discount`, `amount_subtotal`, `amount_total`, `unit_amount_after_discount`, and `unit_discount` on `DelegatedCheckout.RequestedSession.line_item_details[]`
  * Add support for `amount_subtotal_after_discount` on `DelegatedCheckout.RequestedSession.line_item_details[]` and `DelegatedCheckout.RequestedSession.total_details`
  * Change type of `Invoice.create_preview().$params.schedule_detail.billing_schedules` from `array(billing_schedules_update_params)` to `emptyable(array(billing_schedules_update_params))`
  * Add support for `current_trial` on `Invoice.create_preview().$params.subscription_detail.item`, `Subscription.create().$params.item`, `Subscription.update().$params.item`, `SubscriptionItem.create().$params`, `SubscriptionItem.update().$params`, and `SubscriptionItem`
  * Change type of `Quote.create().$params.subscription_data_override.billing_schedules` and `Quote.create().$params.subscription_datum.billing_schedules` from `emptyable(array(billing_schedules_create_specs))` to `array(billing_schedules_create_specs)`
  * Change type of `Quote.subscription_data.billing_schedules` and `Quote.subscription_data_overrides[].billing_schedules` from `nullable(array(SubscriptionsResourceBillingSchedules))` to `array(QuotesResourceSubscriptionDataBillingSchedules)`
  * Change type of `Quote.subscription_data.phase_effective_at` and `Quote.subscription_data_overrides[].phase_effective_at` from `nullable(enum('billing_period_start'|'phase_start'))` to `enum('billing_period_start'|'line_start')`
  * Change type of `QuotePreviewSubscriptionSchedule.default_settings.phase_effective_at` and `SubscriptionSchedule.default_settings.phase_effective_at` from `nullable(enum('billing_period_start'|'phase_start'))` to `enum('billing_period_start'|'phase_start')`
  * Change type of `QuotePreviewSubscriptionSchedule.billing_schedules` and `SubscriptionSchedule.billing_schedules` from `nullable(array(SubscriptionsResourceBillingSchedules))` to `array(SubscriptionsResourceBillingSchedules)`
  * Remove support for `amendment_start`, `line_starts_at`, and `relative` on `Subscription.billing_schedules[].bill_from`
  * Change type of `Subscription.billing_schedules[].bill_from.computed_timestamp` from `nullable(DateTime)` to `DateTime`
  * Change type of `Subscription.billing_schedules[].bill_from.type` from `enum` to `literal('timestamp')`
  * Remove support for `amendment_end` and `line_ends_at` on `Subscription.billing_schedules[].bill_until`
  * Remove support for values `amendment_end`, `line_ends_at`, `schedule_end`, and `upcoming_invoice` from enum `Subscription.billing_schedules[].bill_until.type`
  * Change type of `V2.Billing.ServiceAction.credit_grant.amount.monetary`, `V2.Billing.ServiceAction.credit_grant_per_tenant.amount.monetary`, `V2\Billing\ServiceAction.create().$params.credit_grant.amount.monetary`, and `V2\Billing\ServiceAction.create().$params.credit_grant_per_tenant.amount.monetary` from `amount` to `an object`
  * Add support for `future_requirements` on `V2.Core.Account`
  * Add support for `konbini_payments` and `script_statement_descriptor` on `V2.Core.Account.configuration.merchant`, `V2\Core\Account.create().$params.configuration.merchant`, and `V2\Core\Account.update().$params.configuration.merchant`
  * Add support for `eur` on `V2.Core.Account.configuration.storer.capabilities.holds_currencies`, `V2\Core\Account.create().$params.configuration.storer.capability.holds_currency`, and `V2\Core\Account.update().$params.configuration.storer.capability.holds_currency`
  * Add support for `requirements_collector` on `V2.Core.Account.defaults.responsibilities`
  * Add support for new value `ar_cuit` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
  * Add support for new value `ar_dni` on enums `V2.Core.Account.identity.individual.id_numbers[].type` and `V2.Core.AccountPerson.id_numbers[].type`
  * Remove support for `collector` on `V2.Core.Account.requirements`
  * Add support for new value `holds_currencies.eur` on enum `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for new values `payment_method` and `person` on enum `V2.Core.Account.requirements.entries[].reference.type`
  * Remove support for value `resource` from enum `V2.Core.Account.requirements.entries[].reference.type`
  * Remove support for value `future_requirements` from enum `V2.Core.Account.requirements.entries[].requested_reasons[].code`
  * Remove support for `v1_event_id` on `V2.Core.Event`
  * Remove support for `amount_details` and `capture_method` on `V2.Payments.OffSessionPayment` and `V2\Payments\OffSessionPayment.create().$params`
  * Change type of `V2.Payments.OffSessionPayment.amount_capturable` from `amount` to `an object`
  * Change type of `V2.Payments.OffSessionPayment.amount_requested` from `amount` to `an object`
  * Change type of `V2\Payments\OffSessionPayment.create().$params.amount` from `amount` to `an object`
  * Change `V2\Payments\OffSessionPayment.create().$params.retry_detail.retry_strategy` to be optional
  * Remove support for `destination` on `V2\Payments\OffSessionPayment.capture().$params.transfer_datum`
  * Change `V2\Payments\OffSessionPayment.capture().$params.amount_to_capture` to be optional
  * Add support for `created` on `V2\Core\Event.all().$params`
  * Remove support for `gt`, `gte`, `lt`, and `lte` on `V2\Core\Event.all().$params`
  * Add support for `account_token` on `V2\Core\Account.create().$params` and `V2\Core\Account.update().$params`
  * Add support for `person_token` on `V2\Core\AccountPerson.create().$params` and `V2\Core\AccountPerson.update().$params`
  * Add support for `impacted_requests_percentage` on `EventsV2CoreHealthApiErrorFiringEvent.impact`, `EventsV2CoreHealthApiErrorResolvedEvent.impact`, `EventsV2CoreHealthApiLatencyFiringEvent.impact`, `EventsV2CoreHealthApiLatencyResolvedEvent.impact`, `EventsV2CoreHealthPaymentMethodErrorFiringEvent.impact`, and `EventsV2CoreHealthPaymentMethodErrorResolvedEvent.impact`
  * Add support for `context` and `related_object` on `EventsV2CoreHealthEventGenerationFailureResolvedEvent.impact`
  * Remove support for `account`, `livemode`, `missing_delivery_attempts`, and `related_object_id` on `EventsV2CoreHealthEventGenerationFailureResolvedEvent.impact`
  * Change type of `EventsV2CoreHealthFraudRateIncreasedEvent.impact.realized_fraud_amount` from `amount` to `an object`
  * Change type of `EventsV2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent.impact.approved_amount`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsResolvedEvent.impact.approved_amount`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutFiringEvent.impact.approved_amount`, and `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent.impact.approved_amount` from `amount` to `an object`
  * Change type of `EventsV2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent.impact.declined_amount`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsResolvedEvent.impact.declined_amount`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutFiringEvent.impact.declined_amount`, and `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent.impact.declined_amount` from `amount` to `an object`
  * Add support for thin events `V2PaymentsOffSessionPaymentAttemptFailedEvent` and `V2PaymentsOffSessionPaymentAttemptStartedEvent` with related object `V2.Payments.OffSessionPayment`
  * Remove support for thin event `V1AccountUpdatedEvent` with related object `Account`
  * Remove support for thin events `V1ApplicationFeeCreatedEvent` and `V1ApplicationFeeRefundedEvent` with related object `ApplicationFee`
  * Remove support for thin events `V1BillingPortalConfigurationCreatedEvent` and `V1BillingPortalConfigurationUpdatedEvent` with related object `BillingPortal.Configuration`
  * Remove support for thin event `V1CapabilityUpdatedEvent` with related object `Capability`
  * Remove support for thin events `V1ChargeCapturedEvent`, `V1ChargeExpiredEvent`, `V1ChargeFailedEvent`, `V1ChargePendingEvent`, `V1ChargeRefundedEvent`, `V1ChargeSucceededEvent`, and `V1ChargeUpdatedEvent` with related object `Charge`
  * Remove support for thin events `V1ChargeDisputeClosedEvent`, `V1ChargeDisputeCreatedEvent`, `V1ChargeDisputeFundsReinstatedEvent`, `V1ChargeDisputeFundsWithdrawnEvent`, and `V1ChargeDisputeUpdatedEvent` with related object `Dispute`
  * Remove support for thin events `V1ChargeRefundUpdatedEvent`, `V1RefundCreatedEvent`, `V1RefundFailedEvent`, and `V1RefundUpdatedEvent` with related object `Refund`
  * Remove support for thin events `V1CheckoutSessionAsyncPaymentFailedEvent`, `V1CheckoutSessionAsyncPaymentSucceededEvent`, `V1CheckoutSessionCompletedEvent`, and `V1CheckoutSessionExpiredEvent` with related object `Checkout.Session`
  * Remove support for thin events `V1ClimateOrderCanceledEvent`, `V1ClimateOrderCreatedEvent`, `V1ClimateOrderDelayedEvent`, `V1ClimateOrderDeliveredEvent`, and `V1ClimateOrderProductSubstitutedEvent` with related object `Climate.Order`
  * Remove support for thin events `V1ClimateProductCreatedEvent` and `V1ClimateProductPricingUpdatedEvent` with related object `Climate.Product`
  * Remove support for thin events `V1CouponCreatedEvent`, `V1CouponDeletedEvent`, and `V1CouponUpdatedEvent` with related object `Coupon`
  * Remove support for thin events `V1CreditNoteCreatedEvent`, `V1CreditNoteUpdatedEvent`, and `V1CreditNoteVoidedEvent` with related object `CreditNote`
  * Remove support for thin events `V1CustomerCreatedEvent`, `V1CustomerDeletedEvent`, and `V1CustomerUpdatedEvent` with related object `Customer`
  * Remove support for thin events `V1CustomerSubscriptionCreatedEvent`, `V1CustomerSubscriptionDeletedEvent`, `V1CustomerSubscriptionPausedEvent`, `V1CustomerSubscriptionPendingUpdateAppliedEvent`, `V1CustomerSubscriptionPendingUpdateExpiredEvent`, `V1CustomerSubscriptionResumedEvent`, `V1CustomerSubscriptionTrialWillEndEvent`, and `V1CustomerSubscriptionUpdatedEvent` with related object `Subscription`
  * Remove support for thin events `V1CustomerTaxIdCreatedEvent`, `V1CustomerTaxIdDeletedEvent`, and `V1CustomerTaxIdUpdatedEvent` with related object `TaxId`
  * Remove support for thin event `V1FileCreatedEvent` with related object `File`
  * Remove support for thin events `V1FinancialConnectionsAccountCreatedEvent`, `V1FinancialConnectionsAccountDeactivatedEvent`, `V1FinancialConnectionsAccountDisconnectedEvent`, `V1FinancialConnectionsAccountReactivatedEvent`, `V1FinancialConnectionsAccountRefreshedBalanceEvent`, `V1FinancialConnectionsAccountRefreshedOwnershipEvent`, and `V1FinancialConnectionsAccountRefreshedTransactionsEvent` with related object `FinancialConnections.Account`
  * Remove support for thin events `V1IdentityVerificationSessionCanceledEvent`, `V1IdentityVerificationSessionCreatedEvent`, `V1IdentityVerificationSessionProcessingEvent`, `V1IdentityVerificationSessionRedactedEvent`, `V1IdentityVerificationSessionRequiresInputEvent`, and `V1IdentityVerificationSessionVerifiedEvent` with related object `Identity.VerificationSession`
  * Remove support for thin events `V1InvoiceCreatedEvent`, `V1InvoiceDeletedEvent`, `V1InvoiceFinalizationFailedEvent`, `V1InvoiceFinalizedEvent`, `V1InvoiceMarkedUncollectibleEvent`, `V1InvoiceOverdueEvent`, `V1InvoiceOverpaidEvent`, `V1InvoicePaidEvent`, `V1InvoicePaymentActionRequiredEvent`, `V1InvoicePaymentFailedEvent`, `V1InvoicePaymentSucceededEvent`, `V1InvoiceSentEvent`, `V1InvoiceUpcomingEvent`, `V1InvoiceUpdatedEvent`, `V1InvoiceVoidedEvent`, and `V1InvoiceWillBeDueEvent` with related object `Invoice`
  * Remove support for thin event `V1InvoicePaymentPaidEvent` with related object `InvoicePayment`
  * Remove support for thin events `V1InvoiceitemCreatedEvent` and `V1InvoiceitemDeletedEvent` with related object `InvoiceItem`
  * Remove support for thin events `V1IssuingAuthorizationCreatedEvent`, `V1IssuingAuthorizationRequestEvent`, and `V1IssuingAuthorizationUpdatedEvent` with related object `Issuing.Authorization`
  * Remove support for thin events `V1IssuingCardCreatedEvent` and `V1IssuingCardUpdatedEvent` with related object `Issuing.Card`
  * Remove support for thin events `V1IssuingCardholderCreatedEvent` and `V1IssuingCardholderUpdatedEvent` with related object `Issuing.Cardholder`
  * Remove support for thin events `V1IssuingDisputeClosedEvent`, `V1IssuingDisputeCreatedEvent`, `V1IssuingDisputeFundsReinstatedEvent`, `V1IssuingDisputeFundsRescindedEvent`, `V1IssuingDisputeSubmittedEvent`, and `V1IssuingDisputeUpdatedEvent` with related object `Issuing.Dispute`
  * Remove support for thin events `V1IssuingPersonalizationDesignActivatedEvent`, `V1IssuingPersonalizationDesignDeactivatedEvent`, `V1IssuingPersonalizationDesignRejectedEvent`, and `V1IssuingPersonalizationDesignUpdatedEvent` with related object `Issuing.PersonalizationDesign`
  * Remove support for thin events `V1IssuingTokenCreatedEvent` and `V1IssuingTokenUpdatedEvent` with related object `Issuing.Token`
  * Remove support for thin events `V1IssuingTransactionCreatedEvent`, `V1IssuingTransactionPurchaseDetailsReceiptUpdatedEvent`, and `V1IssuingTransactionUpdatedEvent` with related object `Issuing.Transaction`
  * Remove support for thin event `V1MandateUpdatedEvent` with related object `Mandate`
  * Remove support for thin events `V1PaymentIntentAmountCapturableUpdatedEvent`, `V1PaymentIntentCanceledEvent`, `V1PaymentIntentCreatedEvent`, `V1PaymentIntentPartiallyFundedEvent`, `V1PaymentIntentPaymentFailedEvent`, `V1PaymentIntentProcessingEvent`, `V1PaymentIntentRequiresActionEvent`, and `V1PaymentIntentSucceededEvent` with related object `PaymentIntent`
  * Remove support for thin events `V1PaymentLinkCreatedEvent` and `V1PaymentLinkUpdatedEvent` with related object `PaymentLink`
  * Remove support for thin events `V1PaymentMethodAttachedEvent`, `V1PaymentMethodAutomaticallyUpdatedEvent`, `V1PaymentMethodDetachedEvent`, and `V1PaymentMethodUpdatedEvent` with related object `PaymentMethod`
  * Remove support for thin events `V1PayoutCanceledEvent`, `V1PayoutCreatedEvent`, `V1PayoutFailedEvent`, `V1PayoutPaidEvent`, `V1PayoutReconciliationCompletedEvent`, and `V1PayoutUpdatedEvent` with related object `Payout`
  * Remove support for thin events `V1PersonCreatedEvent`, `V1PersonDeletedEvent`, and `V1PersonUpdatedEvent` with related object `Person`
  * Remove support for thin events `V1PlanCreatedEvent`, `V1PlanDeletedEvent`, and `V1PlanUpdatedEvent` with related object `Plan`
  * Remove support for thin events `V1PriceCreatedEvent`, `V1PriceDeletedEvent`, and `V1PriceUpdatedEvent` with related object `Price`
  * Remove support for thin events `V1ProductCreatedEvent`, `V1ProductDeletedEvent`, and `V1ProductUpdatedEvent` with related object `Product`
  * Remove support for thin events `V1PromotionCodeCreatedEvent` and `V1PromotionCodeUpdatedEvent` with related object `PromotionCode`
  * Remove support for thin events `V1QuoteAcceptedEvent`, `V1QuoteCanceledEvent`, `V1QuoteCreatedEvent`, and `V1QuoteFinalizedEvent` with related object `Quote`
  * Remove support for thin events `V1RadarEarlyFraudWarningCreatedEvent` and `V1RadarEarlyFraudWarningUpdatedEvent` with related object `Radar.EarlyFraudWarning`
  * Remove support for thin events `V1ReviewClosedEvent` and `V1ReviewOpenedEvent` with related object `Review`
  * Remove support for thin events `V1SetupIntentCanceledEvent`, `V1SetupIntentCreatedEvent`, `V1SetupIntentRequiresActionEvent`, `V1SetupIntentSetupFailedEvent`, and `V1SetupIntentSucceededEvent` with related object `SetupIntent`
  * Remove support for thin event `V1SigmaScheduledQueryRunCreatedEvent` with related object `Sigma.ScheduledQueryRun`
  * Remove support for thin events `V1SourceCanceledEvent`, `V1SourceChargeableEvent`, `V1SourceFailedEvent`, and `V1SourceRefundAttributesRequiredEvent` with related object `Source`
  * Remove support for thin events `V1SubscriptionScheduleAbortedEvent`, `V1SubscriptionScheduleCanceledEvent`, `V1SubscriptionScheduleCompletedEvent`, `V1SubscriptionScheduleCreatedEvent`, `V1SubscriptionScheduleExpiringEvent`, `V1SubscriptionScheduleReleasedEvent`, and `V1SubscriptionScheduleUpdatedEvent` with related object `SubscriptionSchedule`
  * Remove support for thin events `V1TaxRateCreatedEvent` and `V1TaxRateUpdatedEvent` with related object `TaxRate`
  * Remove support for thin events `V1TerminalReaderActionFailedEvent`, `V1TerminalReaderActionSucceededEvent`, and `V1TerminalReaderActionUpdatedEvent` with related object `Terminal.Reader`
  * Remove support for thin events `V1TestHelpersTestClockAdvancingEvent`, `V1TestHelpersTestClockCreatedEvent`, `V1TestHelpersTestClockDeletedEvent`, `V1TestHelpersTestClockInternalFailureEvent`, and `V1TestHelpersTestClockReadyEvent` with related object `TestHelpers.TestClock`
  * Remove support for thin events `V1TopupCanceledEvent`, `V1TopupCreatedEvent`, `V1TopupFailedEvent`, `V1TopupReversedEvent`, and `V1TopupSucceededEvent` with related object `Topup`
  * Remove support for thin events `V1TransferCreatedEvent`, `V1TransferReversedEvent`, and `V1TransferUpdatedEvent` with related object `Transfer`

## 19.1.0-alpha.1 - 2025-11-18
This release changes the pinned API version to `2025-11-17.preview`.

* [#1962](https://github.com/stripe/stripe-php/pull/1962) Update generated code for private-preview
  * Add support for new resources `BalanceTransfer` and `Radar.AccountEvaluation`
  * Add support for `create` method on resource `BalanceTransfer`
  * Add support for `create`, `retrieve`, and `update` methods on resource `Radar.AccountEvaluation`
  * Change `Tax.Association.tax_transaction_attempts` to be required
  * Add support for `specified_commercial_transactions_act_url` on `Account.business_profile`, `Account.create().$params.business_profile`, and `Account.update().$params.business_profile`
  * Add support for `paypay_payments` on `Account.create().$params.setting`, `Account.settings`, and `Account.update().$params.setting`
  * Change type of `Billing\Analytics\MeterUsage.retrieve().$params.meter.dimension_filters` from `string` to `array(string)`
  * Change type of `Billing\Analytics\MeterUsage.retrieve().$params.meter.tenant_filters` from `string` to `array(string)`
  * Add support for `payment_method_configuration` on `BillingPortal.Configuration.features.payment_method_update`
  * Add support for `car_rental_data`, `flight_data`, and `lodging_data` on `Charge.capture().$params.payment_detail`, `Charge.update().$params.payment_detail`, `PaymentIntent.capture().$params.payment_detail`, `PaymentIntent.confirm().$params.payment_detail`, `PaymentIntent.create().$params.payment_detail`, and `PaymentIntent.update().$params.payment_detail`
  * Add support for `transaction_id` on `Charge.payment_method_details.ideal`, `PaymentAttemptRecord.payment_method_details.ideal`, and `PaymentRecord.payment_method_details.ideal`
  * Add support for new value `finom` on enums `Charge.payment_method_details.ideal.bank`, `ConfirmationToken.payment_method_preview.ideal.bank`, `PaymentAttemptRecord.payment_method_details.ideal.bank`, `PaymentMethod.ideal.bank`, `PaymentRecord.payment_method_details.ideal.bank`, and `SetupAttempt.payment_method_details.ideal.bank`
  * Add support for new value `FNOMNL22` on enums `Charge.payment_method_details.ideal.bic`, `ConfirmationToken.payment_method_preview.ideal.bic`, `PaymentAttemptRecord.payment_method_details.ideal.bic`, `PaymentMethod.ideal.bic`, `PaymentRecord.payment_method_details.ideal.bic`, and `SetupAttempt.payment_method_details.ideal.bic`
  * Add support for new value `tokenized_account_number_deactivated` on enums `ConfirmationToken.payment_method_preview.us_bank_account.status_details.blocked.reason` and `PaymentMethod.us_bank_account.status_details.blocked.reason`
  * Add support for `created` on `CustomerBalanceTransaction.all().$params` and `InvoicePayment.all().$params`
  * Add support for new values `capital.financing_offer.accepted_other_offer`, `financial_connections.account.account_numbers_updated`, and `financial_connections.account.upcoming_account_number_expiry` on enum `Event.type`
  * Add support for `account_numbers` on `FinancialConnections.Account`
  * Change type of `FinancialConnections.Session.client_secret` from `string` to `nullable(string)`
  * Add support for `fraud_risk` on `Issuing\Authorization.create().$params.risk_assessment`
  * Add support for `latest_fraud_warning` on `Issuing.Card`
  * Add support for `supplementary_purchase_data` on `Order.create().$params.payment.setting.payment_method_option.klarna`, `Order.update().$params.payment.setting.payment_method_option.klarna`, `PaymentIntent.confirm().$params.payment_method_option.klarna`, `PaymentIntent.create().$params.payment_method_option.klarna`, and `PaymentIntent.update().$params.payment_method_option.klarna`
  * Add support for `capture_method` on `PaymentIntent.confirm().$params.payment_method_option.card_present`, `PaymentIntent.create().$params.payment_method_option.card_present`, `PaymentIntent.payment_method_options.card_present`, and `PaymentIntent.update().$params.payment_method_option.card_present`
  * Add support for `allow_redisplay` and `customer_account` on `PaymentMethod.all().$params`
  * Add support for `mb_way` and `twint` on `Refund.destination_details`
  * Change type of `SubscriptionSchedule.update().$params.billing_schedules` from `array(billing_schedules_update_params)` to `emptyable(array(billing_schedules_update_params))`
  * Add support for snapshot events `FINANCIAL_CONNECTIONS_ACCOUNT_ACCOUNT_NUMBERS_UPDATED` and `FINANCIAL_CONNECTIONS_ACCOUNT_UPCOMING_ACCOUNT_NUMBER_EXPIRY` with resource `FinancialConnections.Account`
* [#1963](https://github.com/stripe/stripe-php/pull/1963) Update generated code for private-preview
  * Add support for `billing_schedules_actions` on `Invoice.create_preview().$params.schedule_detail.amendment` and `SubscriptionSchedule.amend().$params.amendment`

## 18.3.0-alpha.2 - 2025-11-13
This release changes the pinned API version to `2025-10-29.preview`.

* [#1954](https://github.com/stripe/stripe-php/pull/1954) Update generated code for private-preview
  * Remove support for resource `V2.Tax.AutomaticRule`
  * Remove support for `create`, `deactivate`, `find`, `retrieve`, and `update` methods on resource `V2.Tax.AutomaticRule`
  * Add support for `self_reported_income` and `self_reported_monthly_housing_payment` on `Account.create().$params.individual`, `Account.update().$params.individual`, `Person.create().$params`, `Person.update().$params`, `Person`, `Token.create().$params.account.individual`, and `Token.create().$params.person`
  * Add support for `billing_schedules` and `phase_effective_at` on `Quote.create().$params.subscription_data_override`, `Quote.create().$params.subscription_datum`, `Quote.subscription_data_overrides[]`, `Quote.subscription_data`, `Quote.update().$params.subscription_data_override`, and `Quote.update().$params.subscription_datum`
  * Add support for `bill_from` on `Subscription.billing_schedules[]`
  * Add support for `amendment_end` and `line_ends_at` on `Subscription.billing_schedules[].bill_until`
  * Add support for new values `amendment_end`, `line_ends_at`, `schedule_end`, and `upcoming_invoice` on enum `Subscription.billing_schedules[].bill_until.type`
* [#1960](https://github.com/stripe/stripe-php/pull/1960) Update generated code for private-preview
  * Add support for new resource `Issuing.Program`
  * Add support for `all`, `create`, `retrieve`, and `update` methods on resource `Issuing.Program`
  * Add support for `schedule` on `Discount`
  * Add support for `applicable_fees` on `DelegatedCheckout.RequestedSession.total_details`
  * Add support for `schedule_details` on `Invoice.parent`, `InvoiceItem.parent`, `InvoiceLineItem.parent`, and `QuotePreviewInvoice.parent`
  * Add support for new value `schedule_details` on enum `InvoiceItem.parent.type`
  * Add support for `billing_schedules` on `Invoice.create_preview().$params.schedule_detail`, `QuotePreviewSubscriptionSchedule`, `SubscriptionSchedule.create().$params`, `SubscriptionSchedule.update().$params`, and `SubscriptionSchedule`
  * Add support for new value `schedule_details` on enums `Invoice.parent.type` and `QuotePreviewInvoice.parent.type`
  * Add support for new value `schedule_details` on enum `InvoiceLineItem.parent.type`
  * Add support for `latest_invoice` on `QuotePreviewSubscriptionSchedule` and `SubscriptionSchedule`
  * Add support for `phase_effective_at` on `QuotePreviewSubscriptionSchedule.default_settings`, `SubscriptionSchedule.create().$params.default_setting`, `SubscriptionSchedule.default_settings`, and `SubscriptionSchedule.update().$params.default_setting`

## 18.3.0-alpha.1 - 2025-11-06
* [#1951](https://github.com/stripe/stripe-php/pull/1951) Update generated code for private-preview
  * Add support for new resources `TransitBalance`, `V2.Reporting.ReportRun`, `V2.Reporting.Report`
  * Add support for `create` and `retrieve` methods on resource `V2.Reporting.ReportRun`
  * Add support for `retrieve` method on resource `V2.Reporting.Report`
  * Add support for `create` and `refill` test helper methods on resource `Capital.FinancingOffer`
  * Add support for `allocated_funds` on `Charge`, `PaymentIntent.confirm().$params`, `PaymentIntent.create().$params`, and `PaymentIntent.update().$params`
  * Add support for thin events `V2ReportingReportRunCreatedEvent`, `V2ReportingReportRunFailedEvent`, `V2ReportingReportRunSucceededEvent`, and `V2ReportingReportRunUpdatedEvent` with related object `V2.Reporting.ReportRun`

## 18.2.0-alpha.2 - 2025-10-30
* [#1949](https://github.com/stripe/stripe-php/pull/1949) Update generated code for private-preview
  * Change `DelegatedCheckout\RequestedSession.update().$params.line_item_detail.quantity` to be required
  * Add support for `payment_method_preview` on `DelegatedCheckout.RequestedSession`
  * Add support for `order_id` on `DelegatedCheckout.RequestedSession.order_details`
  * Add support for `lead` on `V2.Core.Account.configuration.card_creator.capabilities.commercial`, `V2.Core.Account.identity.attestations.terms_of_service.card_creator.commercial`, `V2\Core\Account.create().$params.configuration.card_creator.capability.commercial`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.card_creator.commercial`, `V2\Core\Account.update().$params.configuration.card_creator.capability.commercial`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service.card_creator.commercial`
  * Add support for `global_account_holder` on `V2.Core.Account.identity.attestations.terms_of_service.card_creator.commercial`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.card_creator.commercial`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service.card_creator.commercial`
  * Add support for new value `commercial.lead.prepaid_card` on enum `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for new value `commercial.lead.prepaid_card` on enum `EventsV2CoreAccountIncludingConfigurationCardCreatorCapabilityStatusUpdatedEvent.updated_capability`

## 18.2.0-alpha.1 - 2025-10-29
* [#1944](https://github.com/stripe/stripe-php/pull/1944) Update generated code for private-preview
  * Add support for `report_refund` method on resource `PaymentRecord`
  * Add support for new value `verification_data_not_found` on enums `Account.future_requirements.errors[].code`, `Account.requirements.errors[].code`, `BankAccount.future_requirements.errors[].code`, `BankAccount.requirements.errors[].code`, `Capability.future_requirements.errors[].code`, `Capability.requirements.errors[].code`, `Person.future_requirements.errors[].code`, and `Person.requirements.errors[].code`
  * Add support for `tenants` on `Billing.Analytics.MeterUsageRow`
  * Add support for `representative_declaration` on `Account.company`, `Account.create().$params.company`, `Account.update().$params.company`, and `Token.create().$params.account.company`
  * Add support for `transfer` on `ApplicationFee.fee_source`
  * Add support for new value `transfer` on enum `ApplicationFee.fee_source.type`
  * Add support for `transit_balances_total` on `Balance`
  * Add support for new value `transit` on enum `BalanceTransaction.balance_type`
  * Add support for `tenant_group_by_keys` on `Billing\Analytics\MeterUsage.retrieve().$params.meter`
  * Change `Billing\CreditGrant.create().$params.category` to be optional
  * Add support for `payment_method_configuration` on `BillingPortal\Configuration.create().$params.feature.payment_method_update` and `BillingPortal\Configuration.update().$params.feature.payment_method_update`
  * Add support for new value `solana` on enums `Charge.payment_method_details.crypto.network`, `PaymentAttemptRecord.payment_method_details.crypto.network`, and `PaymentRecord.payment_method_details.crypto.network`
  * Add support for `payment_portal_url` on `Charge.payment_method_details.rechnung`, `PaymentAttemptRecord.payment_method_details.rechnung`, and `PaymentRecord.payment_method_details.rechnung`
  * Add support for `twint` on `Checkout.Session.payment_method_options` and `Checkout\Session.create().$params.payment_method_option`
  * Add support for new value `custom` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
  * Change `CreditNote.refunds[].payment_record_refund` to be required
  * Change `CreditNote.refunds[].type` to be required
  * Add support for `customer_sheet`, `mobile_payment_element`, and `tax_id_element` on `CustomerSession.components` and `CustomerSession.create().$params.component`
  * Add support for `provider` on `Customer.tax`
  * Remove support for `risk_details` on `DelegatedCheckout\RequestedSession.create().$params`
  * Add support for `risk_details` on `DelegatedCheckout\RequestedSession.confirm().$params`
  * Add support for new value `platform_terms_of_service` on enum `File.purpose`
  * Add support for `starting_after` on `PaymentAttemptRecord.all().$params`
  * Add support for `reference` on `PaymentIntent.capture().$params.amount_detail.line_item.payment_method_option.klarna`, `PaymentIntent.confirm().$params.amount_detail.line_item.payment_method_option.klarna`, `PaymentIntent.create().$params.amount_detail.line_item.payment_method_option.klarna`, `PaymentIntent.increment_authorization().$params.amount_detail.line_item.payment_method_option.klarna`, `PaymentIntent.update().$params.amount_detail.line_item.payment_method_option.klarna`, and `PaymentIntentAmountDetailsLineItem.payment_method_options.klarna`
  * Add support for `allocated_funds` on `PaymentIntent`
  * Change `PaymentIntent.payment_details.customer_reference` to be required
  * Change `PaymentIntent.payment_details.order_reference` to be required
  * Add support for `subscription_reference` on `PaymentIntentAmountDetailsLineItem.payment_method_options.klarna`
  * Add support for `name_collection` on `PaymentLink.create().$params`, `PaymentLink.update().$params`, and `PaymentLink`
  * Add support for `crypto` on `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, and `Refund.destination_details`
  * Add support for `mb_way` on `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, and `PaymentMethodConfiguration`
  * Add support for `custom` on `PaymentMethod.create().$params` and `PaymentMethod`
  * Add support for `excluded_payment_method_types` on `SetupIntent.create().$params`, `SetupIntent.update().$params`, and `SetupIntent`
  * Change `SetupIntent.flow_directions` to be optional
  * Add support for `tw` on `Tax.Registration.country_options` and `Tax\Registration.create().$params.country_option`
  * Add support for `gip` on `Terminal.Configuration.tipping`, `Terminal\Configuration.create().$params.tipping`, and `Terminal\Configuration.update().$params.tipping`
  * Add support for `last_seen_at` on `Terminal.Reader`
  * Add support for `application_fee_amount` on `Transfer.create().$params` and `Transfer`
  * Add support for `application_fee` on `Transfer`
  * Add support for `high_risk_activities_description`, `high_risk_activities`, `money_services_description`, `operates_in_prohibited_countries`, `participates_in_regulated_activity`, `purpose_of_funds_description`, `purpose_of_funds`, `regulated_activity`, `source_of_funds_description`, and `source_of_funds` on `V2.Core.Account.configuration.storer`, `V2\Core\Account.create().$params.configuration.storer`, and `V2\Core\Account.update().$params.configuration.storer`
  * Add support for `crypto_wallets` on `V2.Core.Account.configuration.storer.capabilities.financial_addresses`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments`, `V2.Core.Account.configuration.storer.capabilities.outbound_transfers`, `V2\Core\Account.create().$params.configuration.storer.capability.financial_address`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_payment`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_transfer`, `V2\Core\Account.update().$params.configuration.storer.capability.financial_address`, `V2\Core\Account.update().$params.configuration.storer.capability.outbound_payment`, and `V2\Core\Account.update().$params.configuration.storer.capability.outbound_transfer`
  * Add support for `usdc` on `V2.Core.Account.configuration.storer.capabilities.holds_currencies`, `V2\Core\Account.create().$params.configuration.storer.capability.holds_currency`, and `V2\Core\Account.update().$params.configuration.storer.capability.holds_currency`
  * Add support for `crypto_storer` on `V2.Core.Account.identity.attestations.terms_of_service` and `V2\Core\Account.create().$params.identity.attestation.terms_of_service`
  * Add support for `compliance_screening_description` on `V2.Core.Account.identity.business_details`, `V2\Core\Account.create().$params.identity.business_detail`, and `V2\Core\Account.update().$params.identity.business_detail`
  * Add support for `external_amount` on `V2.MoneyManagement.ReceivedCredit` and `V2.MoneyManagement.ReceivedDebit`
  * Add support for error code `payment_intent_rate_limit_exceeded` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `QuotePreviewInvoice.last_finalization_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`

## 18.1.0-alpha.4 - 2025-10-23
* [#1941](https://github.com/stripe/stripe-php/pull/1941) Update generated code for private-preview
  * Add support for new resource `V2.Billing.PricingPlanSubscriptionComponents`
  * Add support for `retrieve` method on resource `V2.Billing.PricingPlanSubscriptionComponents`
  * Add support for `dimension_payload_keys` on `Billing.Meter` and `Billing\Meter.create().$params`
  * Add support for `dimension_filters` and `dimension_group_by_keys` on `Billing\MeterEventSummary.all().$params`
  * Add support for `dimensions` on `Billing.MeterEventSummary`
  * Add support for `fulfillment_details` and `payment_method_data` on `DelegatedCheckout\RequestedSession.create().$params` and `DelegatedCheckout\RequestedSession.update().$params`
  * Add support for `line_item_details`, `metadata`, `payment_method`, and `shared_metadata` on `DelegatedCheckout.RequestedSession`, `DelegatedCheckout\RequestedSession.create().$params`, and `DelegatedCheckout\RequestedSession.update().$params`
  * Add support for `currency`, `customer`, and `risk_details` on `DelegatedCheckout\RequestedSession.create().$params`
  * Add support for `seller_details` and `setup_future_usage` on `DelegatedCheckout.RequestedSession` and `DelegatedCheckout\RequestedSession.create().$params`
  * Add support for `amount_subtotal`, `amount_total`, `created_at`, `expires_at`, `order_details`, `shared_payment_issued_token`, `status`, `total_details`, and `updated_at` on `DelegatedCheckout.RequestedSession`
  * Add support for `address`, `email`, `fulfillment_options`, `name`, `phone`, and `selected_fulfillment_option` on `DelegatedCheckout.RequestedSession.fulfillment_details`
  * Add support for new values `billie`, `crypto`, `kr_card`, `kriya`, `mb_way`, `mondu`, `ng_bank_transfer`, `ng_bank`, `ng_card`, `ng_market`, `ng_ussd`, `ng_wallet`, `payco`, `paypay`, `rechnung`, `samsung_pay`, `satispay`, `scalapay`, `sequra`, `sunbit`, `us_bank_account`, and `vipps` on enums `EventsV2CoreHealthAuthorizationRateDropFiringEvent.impact.payment_method_type`, `EventsV2CoreHealthAuthorizationRateDropResolvedEvent.impact.payment_method_type`, `EventsV2CoreHealthPaymentMethodErrorFiringEvent.impact.payment_method_type`, and `EventsV2CoreHealthPaymentMethodErrorResolvedEvent.impact.payment_method_type`

## 18.1.0-alpha.3 - 2025-10-17
* [#1939](https://github.com/stripe/stripe-php/pull/1939) Update generated code for private-preview
  * Add support for new resources `DelegatedCheckout.RequestedSession` and `Identity.BlocklistEntry`
  * Add support for `confirm`, `create`, `expire`, `retrieve`, and `update` methods on resource `DelegatedCheckout.RequestedSession`
  * Add support for `all`, `create`, `disable`, and `retrieve` methods on resource `Identity.BlocklistEntry`
  * Add support for `blocked_by_entry` on `Identity.VerificationReport.document`, `Identity.VerificationReport.selfie`, and `Identity\VerificationReport.all().$params`

## 18.1.0-alpha.2 - 2025-10-09
* [#1933](https://github.com/stripe/stripe-php/pull/1933) Update private preview changelog
* [#1938](https://github.com/stripe/stripe-php/pull/1938) Update generated code for private-preview
  * Add support for new resource `PaymentMethodBalance`
  * Add support for `check_balance` method on resource `PaymentMethod`
  * Add support for `benefits` on `Card`, `Charge.payment_method_details.card`, `ConfirmationToken.payment_method_preview.card`, and `PaymentMethod.card`
  * Add support for `benefit` on `PaymentIntent.confirm().$params.payment_detail`, `PaymentIntent.create().$params.payment_detail`, `PaymentIntent.payment_details`, and `PaymentIntent.update().$params.payment_detail`
  * Add support for `setup_details` on `SetupIntent.confirm().$params`, `SetupIntent.create().$params`, `SetupIntent.update().$params`, and `SetupIntent`
  * Add support for new value `card_creator` on enum `V2.Core.Account.applied_configurations`
  * Add support for `card_creator` on `V2.Core.Account.configuration`, `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.configuration`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.configuration`, and `V2\Core\Account.update().$params.identity.attestation.terms_of_service`
  * Add support for new values `commercial.celtic.charge_card`, `commercial.celtic.spend_card`, `commercial.cross_river_bank.charge_card`, `commercial.cross_river_bank.spend_card`, `commercial.stripe.charge_card`, and `commercial.stripe.prepaid_card` on enum `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for new value `card_creator` on enum `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].configuration`
  * Add support for thin events `V2CoreAccountIncludingConfigurationCardCreatorCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationCardCreatorUpdatedEvent` with related object `V2.Core.Account`
  * Remove support for thin events `V1CustomerDiscountCreatedEvent`, `V1CustomerDiscountDeletedEvent`, and `V1CustomerDiscountUpdatedEvent` with related object `Discount`

## 18.1.0-alpha.1 - 2025-10-01
This release changes the pinned API version to `2025-09-30.preview`.

It is built on top of SDK version 18.0.0 and 18.1.0-beta.1 which contain breaking changes. Please review the changelog for these versions if upgrading from older SDK versions.

* Add support for new value `paypay` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Add support for new value `paypay` on enums `PaymentIntent.excluded_payment_method_types` and `PaymentLink.payment_method_types`
* Remove support for `link` and `pay_by_bank` on `PaymentMethod.update().$params`
* [#1906](https://github.com/stripe/stripe-php/pull/1906) Update generated code for private-preview
  * Add support for `paypay_payments` on `Account.capabilities`, `Account.create().$params.capability`, and `Account.update().$params.capability`
  * Add support for `billing_cadence` on `Invoice.all().$params`
  * Add support for `credit_grants` on `Billing\Alert.create().$params.credit_balance_threshold.filter`
  * Add support for `payment_record_refund` and `type` on `CreditNote.create().$params.refund`, `CreditNote.preview().$params.refund`, `CreditNote.preview_lines().$params.refund`, and `CreditNote.refunds[]`
  * Remove support for values `saturday` and `sunday` from enums `Account.settings.payouts.schedule.weekly_payout_days`
  * Add support for `location` and `reader` on `Charge.payment_method_details.paynow`
  * Add support for `paypay` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, `PaymentMethod`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Remove support for `iterations` on `Invoice.create_preview().$params.schedule_detail.phase`, `SubscriptionSchedule.create().$params.phase`, and `SubscriptionSchedule.update().$params.phase`
  * Add support for new resource `V2.MoneyManagement.RecipientVerification`
  * Add support for `acknowledge`, `create`, `recipient_verifications`, and `retrieve` methods on resource `V2.MoneyManagement.RecipientVerification`
  * Add support for `update` method on resources `V2.Billing.PricingPlanSubscription` and `V2.Billing.ServiceAction`
  * Add support for `crypto_wallets` on `V2.Account.configuration.recipient_data.features`, `V2.Core.Account.configuration.recipient.capabilities`, `V2\Account.create().$params.configuration.recipient_datum.feature`, `V2\Account.update().$params.configuration.recipient_datum.feature`, `V2\Core\Account.create().$params.configuration.recipient.capability`, and `V2\Core\Account.update().$params.configuration.recipient.capability`
  * Add support for new value `crypto` on enum `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for new value `crypto_wallet` on enum `V2.Account.configuration.recipient_data.default_outbound_destination.type`
  * Add support for new value `crypto_wallets` on enum `V2.Account.configuration.supportable_features.recipient_data`
  * Add support for new value `crypto_wallets` on enum `V2.Account.requirements[].impact.required_for_features`
  * Add support for `lookup_key` on `V2.Billing.Cadence`, `V2\Billing\Cadence.create().$params`, and `V2\Billing\Cadence.update().$params`
  * Add support for `settings_data` on `V2.Billing.Cadence`
  * Change type of `V2.Billing.Cadence.payer.billing_profile` from `nullable(string)` to `string`
  * Add support for `v1_event_id` on `V2.Event`
  * Add support for `recipient_verification` on `V2.MoneyManagement.OutboundPayment`, `V2.MoneyManagement.OutboundTransfer`, `V2\MoneyManagement\OutboundPayment.create().$params`, and `V2\MoneyManagement\OutboundTransfer.create().$params`
  * Add support for `crypto_wallet` on `V2.MoneyManagement.PayoutMethod` and `V2\MoneyManagement\OutboundSetupIntent.create().$params.payout_method_datum`
  * Add support for `custom_pricing_unit_details` on `V2.Billing.RateCardRate.custom_pricing_unit_amount`, `V2.Billing.ServiceAction.credit_grant.amount.custom_pricing_unit`, and `V2.Billing.ServiceAction.credit_grant_per_tenant.amount.custom_pricing_unit`
  * Add support for `origin_type` on `V2.MoneyManagement.ReceivedDebit.bank_transfer`
  * Add support for `sepa_bank_account` on `V2\MoneyManagement\FinancialAddress.create().$params`
  * Remove support for `price` on `V2\Billing\RateCardRate.create().$params`
  * Add support for `lookup_keys` on `V2\Billing\Cadence.all().$params`
  * Change type of `V2\Billing\Cadence.all().$params.include`, `V2\Billing\Cadence.cancel().$params.include`, `V2\Billing\Cadence.create().$params.include`, `V2\Billing\Cadence.retrieve().$params.include`, and `V2\Billing\Cadence.update().$params.include` from `literal('invoice_discount_rules')` to `enum('invoice_discount_rules'|'settings_data')`
  * Remove support for `customer` and `type` on `V2\Billing\Cadence.create().$params.payer`
  * Change `V2\Billing\Cadence.create().$params.payer.billing_profile` to be required
  * Add support for new value `crypto_wallets` on enum `EventsAccountConfigurationRecipientDataFeatureStatusUpdatedEvent.feature_name`
  * Add support for new value `crypto_wallets_v2` on enum `EventsV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent.updated_capability`
  * Remove support for `alert_id` on `EventsV2CoreHealthApiErrorResolvedEvent`, `EventsV2CoreHealthApiLatencyResolvedEvent`, `EventsV2CoreHealthAuthorizationRateDropResolvedEvent`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent`, `EventsV2CoreHealthPaymentMethodErrorResolvedEvent`, `EventsV2CoreHealthTrafficVolumeDropResolvedEvent`, and `EventsV2CoreHealthWebhookLatencyResolvedEvent`
  * Add support for thin event `V1AccountUpdatedEvent` with related object `V2.Account`
  * Add support for thin events `V1ApplicationFeeCreatedEvent`, `V1ApplicationFeeRefundedEvent`, `V1BillingPortalConfigurationCreatedEvent`, `V1BillingPortalConfigurationUpdatedEvent`, `V1CapabilityUpdatedEvent`, `V1ChargeCapturedEvent`, `V1ChargeDisputeClosedEvent`, `V1ChargeDisputeCreatedEvent`, `V1ChargeDisputeFundsReinstatedEvent`, `V1ChargeDisputeFundsWithdrawnEvent`, `V1ChargeDisputeUpdatedEvent`, `V1ChargeExpiredEvent`, `V1ChargeFailedEvent`, `V1ChargePendingEvent`, `V1ChargeRefundUpdatedEvent`, `V1ChargeRefundedEvent`, `V1ChargeSucceededEvent`, `V1ChargeUpdatedEvent`, `V1CheckoutSessionAsyncPaymentFailedEvent`, `V1CheckoutSessionAsyncPaymentSucceededEvent`, `V1CheckoutSessionCompletedEvent`, `V1CheckoutSessionExpiredEvent`, `V1ClimateOrderCanceledEvent`, `V1ClimateOrderCreatedEvent`, `V1ClimateOrderDelayedEvent`, `V1ClimateOrderDeliveredEvent`, `V1ClimateOrderProductSubstitutedEvent`, `V1ClimateProductCreatedEvent`, `V1ClimateProductPricingUpdatedEvent`, `V1CouponCreatedEvent`, `V1CouponDeletedEvent`, `V1CouponUpdatedEvent`, `V1CreditNoteCreatedEvent`, `V1CreditNoteUpdatedEvent`, `V1CreditNoteVoidedEvent`, `V1CustomerCreatedEvent`, `V1CustomerDeletedEvent`, `V1CustomerDiscountCreatedEvent`, `V1CustomerDiscountDeletedEvent`, `V1CustomerDiscountUpdatedEvent`, `V1CustomerSubscriptionCreatedEvent`, `V1CustomerSubscriptionDeletedEvent`, `V1CustomerSubscriptionPausedEvent`, `V1CustomerSubscriptionPendingUpdateAppliedEvent`, `V1CustomerSubscriptionPendingUpdateExpiredEvent`, `V1CustomerSubscriptionResumedEvent`, `V1CustomerSubscriptionTrialWillEndEvent`, `V1CustomerSubscriptionUpdatedEvent`, `V1CustomerTaxIdCreatedEvent`, `V1CustomerTaxIdDeletedEvent`, `V1CustomerTaxIdUpdatedEvent`, `V1CustomerUpdatedEvent`, `V1FileCreatedEvent`, `V1FinancialConnectionsAccountCreatedEvent`, `V1FinancialConnectionsAccountDeactivatedEvent`, `V1FinancialConnectionsAccountDisconnectedEvent`, `V1FinancialConnectionsAccountReactivatedEvent`, `V1FinancialConnectionsAccountRefreshedBalanceEvent`, `V1FinancialConnectionsAccountRefreshedOwnershipEvent`, `V1FinancialConnectionsAccountRefreshedTransactionsEvent`, `V1IdentityVerificationSessionCanceledEvent`, `V1IdentityVerificationSessionCreatedEvent`, `V1IdentityVerificationSessionProcessingEvent`, `V1IdentityVerificationSessionRedactedEvent`, `V1IdentityVerificationSessionRequiresInputEvent`, `V1IdentityVerificationSessionVerifiedEvent`, `V1InvoiceCreatedEvent`, `V1InvoiceDeletedEvent`, `V1InvoiceFinalizationFailedEvent`, `V1InvoiceFinalizedEvent`, `V1InvoiceMarkedUncollectibleEvent`, `V1InvoiceOverdueEvent`, `V1InvoiceOverpaidEvent`, `V1InvoicePaidEvent`, `V1InvoicePaymentActionRequiredEvent`, `V1InvoicePaymentFailedEvent`, `V1InvoicePaymentPaidEvent`, `V1InvoicePaymentSucceededEvent`, `V1InvoiceSentEvent`, `V1InvoiceUpcomingEvent`, `V1InvoiceUpdatedEvent`, `V1InvoiceVoidedEvent`, `V1InvoiceWillBeDueEvent`, `V1InvoiceitemCreatedEvent`, `V1InvoiceitemDeletedEvent`, `V1IssuingAuthorizationCreatedEvent`, `V1IssuingAuthorizationRequestEvent`, `V1IssuingAuthorizationUpdatedEvent`, `V1IssuingCardCreatedEvent`, `V1IssuingCardUpdatedEvent`, `V1IssuingCardholderCreatedEvent`, `V1IssuingCardholderUpdatedEvent`, `V1IssuingDisputeClosedEvent`, `V1IssuingDisputeCreatedEvent`, `V1IssuingDisputeFundsReinstatedEvent`, `V1IssuingDisputeFundsRescindedEvent`, `V1IssuingDisputeSubmittedEvent`, `V1IssuingDisputeUpdatedEvent`, `V1IssuingPersonalizationDesignActivatedEvent`, `V1IssuingPersonalizationDesignDeactivatedEvent`, `V1IssuingPersonalizationDesignRejectedEvent`, `V1IssuingPersonalizationDesignUpdatedEvent`, `V1IssuingTokenCreatedEvent`, `V1IssuingTokenUpdatedEvent`, `V1IssuingTransactionCreatedEvent`, `V1IssuingTransactionPurchaseDetailsReceiptUpdatedEvent`, `V1IssuingTransactionUpdatedEvent`, `V1MandateUpdatedEvent`, `V1PaymentIntentAmountCapturableUpdatedEvent`, `V1PaymentIntentCanceledEvent`, `V1PaymentIntentCreatedEvent`, `V1PaymentIntentPartiallyFundedEvent`, `V1PaymentIntentPaymentFailedEvent`, `V1PaymentIntentProcessingEvent`, `V1PaymentIntentRequiresActionEvent`, `V1PaymentIntentSucceededEvent`, `V1PaymentLinkCreatedEvent`, `V1PaymentLinkUpdatedEvent`, `V1PaymentMethodAttachedEvent`, `V1PaymentMethodAutomaticallyUpdatedEvent`, `V1PaymentMethodDetachedEvent`, `V1PaymentMethodUpdatedEvent`, `V1PayoutCanceledEvent`, `V1PayoutCreatedEvent`, `V1PayoutFailedEvent`, `V1PayoutPaidEvent`, `V1PayoutReconciliationCompletedEvent`, `V1PayoutUpdatedEvent`, `V1PersonCreatedEvent`, `V1PersonDeletedEvent`, `V1PersonUpdatedEvent`, `V1PlanCreatedEvent`, `V1PlanDeletedEvent`, `V1PlanUpdatedEvent`, `V1PriceCreatedEvent`, `V1PriceDeletedEvent`, `V1PriceUpdatedEvent`, `V1ProductCreatedEvent`, `V1ProductDeletedEvent`, `V1ProductUpdatedEvent`, `V1PromotionCodeCreatedEvent`, `V1PromotionCodeUpdatedEvent`, `V1QuoteAcceptedEvent`, `V1QuoteCanceledEvent`, `V1QuoteCreatedEvent`, `V1QuoteFinalizedEvent`, `V1RadarEarlyFraudWarningCreatedEvent`, `V1RadarEarlyFraudWarningUpdatedEvent`, `V1RefundCreatedEvent`, `V1RefundFailedEvent`, `V1RefundUpdatedEvent`, `V1ReviewClosedEvent`, `V1ReviewOpenedEvent`, `V1SetupIntentCanceledEvent`, `V1SetupIntentCreatedEvent`, `V1SetupIntentRequiresActionEvent`, `V1SetupIntentSetupFailedEvent`, `V1SetupIntentSucceededEvent`, `V1SigmaScheduledQueryRunCreatedEvent`, `V1SourceCanceledEvent`, `V1SourceChargeableEvent`, `V1SourceFailedEvent`, `V1SourceRefundAttributesRequiredEvent`, `V1SubscriptionScheduleAbortedEvent`, `V1SubscriptionScheduleCanceledEvent`, `V1SubscriptionScheduleCompletedEvent`, `V1SubscriptionScheduleCreatedEvent`, `V1SubscriptionScheduleExpiringEvent`, `V1SubscriptionScheduleReleasedEvent`, `V1SubscriptionScheduleUpdatedEvent`, `V1TaxRateCreatedEvent`, `V1TaxRateUpdatedEvent`, `V1TerminalReaderActionFailedEvent`, `V1TerminalReaderActionSucceededEvent`, `V1TerminalReaderActionUpdatedEvent`, `V1TestHelpersTestClockAdvancingEvent`, `V1TestHelpersTestClockCreatedEvent`, `V1TestHelpersTestClockDeletedEvent`, `V1TestHelpersTestClockInternalFailureEvent`, `V1TestHelpersTestClockReadyEvent`, `V1TopupCanceledEvent`, `V1TopupCreatedEvent`, `V1TopupFailedEvent`, `V1TopupReversedEvent`, `V1TopupSucceededEvent`, `V1TransferCreatedEvent`, `V1TransferReversedEvent`, `V1TransferUpdatedEvent`, `V2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent`, and `V2CoreHealthIssuingAuthorizationRequestErrorsResolvedEvent`
  * Add support for thin event `V2CoreClaimableSandboxCreatedEvent` with related object `V2.Core.ClaimableSandbox`
  * Add support for thin events `V2MoneyManagementRecipientVerificationCreatedEvent` and `V2MoneyManagementRecipientVerificationUpdatedEvent` with related object `V2.MoneyManagement.RecipientVerification`
  * Remove support for resources `V2.Reporting.ReportRun`, `V2.Reporting.Report`
  * Remove support for thin events `V2ReportingReportRunCreatedEvent`, `V2ReportingReportRunFailedEvent`, `V2ReportingReportRunSucceededEvent`, and `V2ReportingReportRunUpdatedEvent` with related object `V2.Reporting.ReportRun`

## 17.7.0-alpha.2 - 2025-09-17
* [#1904](https://github.com/stripe/stripe-php/pull/1904) generate private-preview SDK w/ mid Sept changes
  * Add support for `retrieve` method on resource `V2.Core.ClaimableSandbox`
  * Add support for `month_of_year` on `V2.Billing.Cadence.billing_cycle.month` and `V2\Billing\Cadence.create().$params.billing_cycle.month`
  * Add support for `claimed_at`, `expires_at`, `sandbox_details`, and `status` on `V2.Core.ClaimableSandbox`
  * Remove support for `api_keys` on `V2.Core.ClaimableSandbox`
  * Change type of `V2.Core.ClaimableSandbox.claim_url` from `string` to `nullable(string)`
  * Add support for new value `current_billing_period_end` on enum `V2.Billing.IntentAction.deactivate.effective_at.type`
  * Add support for `will_activate_at` and `will_cancel_at` on `V2.Billing.PricingPlanSubscription.servicing_status_transitions` and `V2.Billing.RateCardSubscription.servicing_status_transitions`
  * Add support for `category` and `priority` on `V2.Billing.ServiceAction.credit_grant_per_tenant`, `V2.Billing.ServiceAction.credit_grant`, `V2\Billing\ServiceAction.create().$params.credit_grant_per_tenant`, and `V2\Billing\ServiceAction.create().$params.credit_grant`
  * Change `V2\Billing\LicenseFee.update().$params.display_name` to be optional
  * Add support for `invoices` on `EventsV2BillingCadenceBilledEvent`
  * Add support for thin events `V2CoreClaimableSandboxClaimedEvent`, `V2CoreClaimableSandboxExpiredEvent`, `V2CoreClaimableSandboxExpiringEvent`, and `V2CoreClaimableSandboxSandboxDetailsOwnerAccountUpdatedEvent` with related object `V2.Core.ClaimableSandbox`
  * Remove support for thin event `V2BillingCadenceErroredEvent` with related object `V2.Billing.Cadence`

## 17.7.0-alpha.1 - 2025-08-27
* [#1897](https://github.com/stripe/stripe-php/pull/1897) Use the right API version 2025-08-27.preview
* [#1892](https://github.com/stripe/stripe-php/pull/1892) Update generated code for private-preview
  * Add support for `attach_cadence` method on resource `Subscription`
  * Add support for `currency` and `external_customer_id` on `Billing.AlertTriggered`
  * Add support for `custom_pricing_unit` on `Billing.AlertTriggered`, `Billing.CreditBalanceSummary.balances[].available_balance`, `Billing.CreditBalanceSummary.balances[].ledger_balance`, `Billing.CreditBalanceTransaction.credit.amount`, `Billing.CreditBalanceTransaction.debit.amount`, `Billing.CreditGrant.amount`, and `Billing\CreditGrant.create().$params.amount`
  * Add support for `customer` on `Billing\Alert.all().$params`
  * Change type of `Billing.Alert.alert_type`, `Billing\Alert.all().$params.alert_type`, and `Billing\Alert.create().$params.alert_type` from `literal('usage_threshold')` to `enum('credit_balance_threshold'|'usage_threshold')`
  * Add support for `credit_balance_threshold` on `Billing.Alert` and `Billing\Alert.create().$params`
  * Add support for `billable_items` on `Billing.CreditGrant.applicability_config.scope`, `Billing\CreditBalanceSummary.retrieve().$params.filter.applicability_scope`, and `Billing\CreditGrant.create().$params.applicability_config.scope`
  * Change type of `Billing.CreditBalanceSummary.balances[].available_balance.type`, `Billing.CreditBalanceSummary.balances[].ledger_balance.type`, `Billing.CreditBalanceTransaction.credit.amount.type`, `Billing.CreditBalanceTransaction.debit.amount.type`, `Billing.CreditGrant.amount.type`, and `Billing\CreditGrant.create().$params.amount.type` from `literal('monetary')` to `enum('custom_pricing_unit'|'monetary')`
  * Add support for `license_fee_subscription_details` and `rate_card_subscription_details` on `InvoiceItem.parent` and `InvoiceLineItem.parent`
  * Change type of `InvoiceItem.parent.type` from `literal('subscription_details')` to `enum('license_fee_subscription_details'|'rate_card_subscription_details'|'subscription_details')`
  * Add support for `license_fee_details` and `rate_card_rate_details` on `InvoiceItem.pricing` and `InvoiceLineItem.pricing`
  * Change type of `InvoiceItem.pricing.type` and `InvoiceLineItem.pricing.type` from `literal('price_details')` to `enum('license_fee_details'|'price_details'|'rate_card_rate_details')`
  * Add support for `billing_cadence` on `Invoice.create_preview().$params`, `Subscription.create().$params`, and `Subscription`
  * Add support for `billing_cadence_details` on `Invoice.parent` and `QuotePreviewInvoice.parent`
  * Add support for new value `billing_cadence_details` on enums `Invoice.parent.type` and `QuotePreviewInvoice.parent.type`
  * Add support for new values `license_fee_subscription_details` and `rate_card_subscription_details` on enum `InvoiceLineItem.parent.type`
  * Add support for new resources `V2.Billing.BillSettingVersion`, `V2.Billing.BillSetting`, `V2.Billing.Cadence`, `V2.Billing.CollectionSettingVersion`, `V2.Billing.CollectionSetting`, `V2.Billing.CustomPricingUnit`, `V2.Billing.IntentAction`, `V2.Billing.Intent`, `V2.Billing.LicenseFeeSubscription`, `V2.Billing.LicenseFeeVersion`, `V2.Billing.LicenseFee`, `V2.Billing.LicensedItem`, `V2.Billing.MeteredItem`, `V2.Billing.PricingPlanComponent`, `V2.Billing.PricingPlanSubscription`, `V2.Billing.PricingPlanVersion`, `V2.Billing.PricingPlan`, `V2.Billing.Profile`, `V2.Billing.RateCardRate`, `V2.Billing.RateCardSubscription`, `V2.Billing.RateCardVersion`, `V2.Billing.RateCard`, `V2.Billing.ServiceAction`, `V2.Core.ClaimableSandbox`, `V2.Reporting.ReportRun`, `V2.Reporting.Report`, and `V2.Tax.AutomaticRule`
  * Add support for `create`, `deactivate`, `find`, `retrieve`, and `update` methods on resource `V2.Tax.AutomaticRule`
  * Add support for `create` and `retrieve` methods on resources `V2.Billing.ServiceAction` and `V2.Reporting.ReportRun`
  * Add support for `retrieve` method on resources `V2.Billing.LicenseFeeSubscription` and `V2.Reporting.Report`
  * Add support for `create` method on resource `V2.Core.ClaimableSandbox`
  * Add support for `all`, `cancel`, `create`, `retrieve`, and `update` methods on resources `V2.Billing.Cadence` and `V2.Billing.RateCardSubscription`
  * Add support for `all`, `create`, `retrieve`, and `update` methods on resources `V2.Billing.BillSetting`, `V2.Billing.CollectionSetting`, `V2.Billing.CustomPricingUnit`, `V2.Billing.LicenseFee`, `V2.Billing.LicensedItem`, `V2.Billing.MeteredItem`, `V2.Billing.PricingPlan`, `V2.Billing.Profile`, and `V2.Billing.RateCard`
  * Add support for `all` and `retrieve` methods on resources `V2.Billing.BillSettingVersion`, `V2.Billing.CollectionSettingVersion`, `V2.Billing.IntentAction`, `V2.Billing.LicenseFeeVersion`, `V2.Billing.PricingPlanSubscription`, `V2.Billing.PricingPlanVersion`, and `V2.Billing.RateCardVersion`
  * Add support for `all`, `create`, `delete`, and `retrieve` methods on resource `V2.Billing.RateCardRate`
  * Add support for `all`, `create`, `delete`, `retrieve`, and `update` methods on resource `V2.Billing.PricingPlanComponent`
  * Add support for `all`, `cancel`, `commit`, `create`, `release_reservation`, `reserve`, and `retrieve` methods on resource `V2.Billing.Intent`
  * Add support for `changes` on `V2.Event`
  * Add support for thin events `V2BillingCadenceBilledEvent`, `V2BillingCadenceCanceledEvent`, `V2BillingCadenceCreatedEvent`, and `V2BillingCadenceErroredEvent` with related object `V2.Billing.Cadence`
  * Add support for thin events `V2BillingLicenseFeeCreatedEvent` and `V2BillingLicenseFeeUpdatedEvent` with related object `V2.Billing.LicenseFee`
  * Add support for thin event `V2BillingLicenseFeeVersionCreatedEvent` with related object `V2.Billing.LicenseFeeVersion`
  * Add support for thin events `V2BillingLicensedItemCreatedEvent` and `V2BillingLicensedItemUpdatedEvent` with related object `V2.Billing.LicensedItem`
  * Add support for thin events `V2BillingMeteredItemCreatedEvent` and `V2BillingMeteredItemUpdatedEvent` with related object `V2.Billing.MeteredItem`
  * Add support for thin events `V2BillingPricingPlanCreatedEvent` and `V2BillingPricingPlanUpdatedEvent` with related object `V2.Billing.PricingPlan`
  * Add support for thin events `V2BillingPricingPlanComponentCreatedEvent` and `V2BillingPricingPlanComponentUpdatedEvent` with related object `V2.Billing.PricingPlanComponent`
  * Add support for thin events `V2BillingPricingPlanSubscriptionCollectionAwaitingCustomerActionEvent`, `V2BillingPricingPlanSubscriptionCollectionCurrentEvent`, `V2BillingPricingPlanSubscriptionCollectionPastDueEvent`, `V2BillingPricingPlanSubscriptionCollectionPausedEvent`, `V2BillingPricingPlanSubscriptionCollectionUnpaidEvent`, `V2BillingPricingPlanSubscriptionServicingActivatedEvent`, `V2BillingPricingPlanSubscriptionServicingCanceledEvent`, and `V2BillingPricingPlanSubscriptionServicingPausedEvent` with related object `V2.Billing.PricingPlanSubscription`
  * Add support for thin event `V2BillingPricingPlanVersionCreatedEvent` with related object `V2.Billing.PricingPlanVersion`
  * Add support for thin events `V2BillingRateCardCreatedEvent` and `V2BillingRateCardUpdatedEvent` with related object `V2.Billing.RateCard`
  * Add support for thin event `V2BillingRateCardRateCreatedEvent` with related object `V2.Billing.RateCardRate`
  * Add support for thin events `V2BillingRateCardSubscriptionActivatedEvent`, `V2BillingRateCardSubscriptionCanceledEvent`, `V2BillingRateCardSubscriptionCollectionAwaitingCustomerActionEvent`, `V2BillingRateCardSubscriptionCollectionCurrentEvent`, `V2BillingRateCardSubscriptionCollectionPastDueEvent`, `V2BillingRateCardSubscriptionCollectionPausedEvent`, `V2BillingRateCardSubscriptionCollectionUnpaidEvent`, `V2BillingRateCardSubscriptionServicingActivatedEvent`, `V2BillingRateCardSubscriptionServicingCanceledEvent`, and `V2BillingRateCardSubscriptionServicingPausedEvent` with related object `V2.Billing.RateCardSubscription`
  * Add support for thin event `V2BillingRateCardVersionCreatedEvent` with related object `V2.Billing.RateCardVersion`
  * Add support for thin events `V2CoreHealthApiErrorFiringEvent`, `V2CoreHealthApiErrorResolvedEvent`, `V2CoreHealthApiLatencyFiringEvent`, `V2CoreHealthApiLatencyResolvedEvent`, `V2CoreHealthAuthorizationRateDropFiringEvent`, `V2CoreHealthAuthorizationRateDropResolvedEvent`, `V2CoreHealthEventGenerationFailureResolvedEvent`, `V2CoreHealthFraudRateIncreasedEvent`, `V2CoreHealthIssuingAuthorizationRequestTimeoutFiringEvent`, `V2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent`, `V2CoreHealthPaymentMethodErrorFiringEvent`, `V2CoreHealthPaymentMethodErrorResolvedEvent`, `V2CoreHealthTrafficVolumeDropFiringEvent`, `V2CoreHealthTrafficVolumeDropResolvedEvent`, `V2CoreHealthWebhookLatencyFiringEvent`, and `V2CoreHealthWebhookLatencyResolvedEvent`
  * Add support for thin events `V2ReportingReportRunCreatedEvent`, `V2ReportingReportRunFailedEvent`, `V2ReportingReportRunSucceededEvent`, and `V2ReportingReportRunUpdatedEvent` with related object `V2.Reporting.ReportRun`
  * Add support for error type `RateLimitException`
  * Adds `getStripeParam` and `setStripeParam` to ApiErrorException base class.  Currently, this is only used by `RateLimitExceptions` returned from v2 services.
