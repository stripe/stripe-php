---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/2020
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.1.0-beta.1
---

* Add support for new resources `ProductCatalog.TrialOffer`, `Tax.Location`, and `V2.Core.BatchJob`
* Add support for `create` method on resource `ProductCatalog.TrialOffer`
* Add support for `all`, `create`, and `retrieve` methods on resource `Tax.Location`
* Add support for `cancel`, `create`, and `retrieve` methods on resource `V2.Core.BatchJob`
* Add support for `performance_location` on `Tax.CalculationLineItem` and `Tax\Calculation.create().$params.line_item`
* Add support for new value `performance` on enums `Tax.Calculation.shipping_cost.tax_breakdown[].sourcing`, `Tax.CalculationLineItem.tax_breakdown[].sourcing`, and `Tax.Transaction.shipping_cost.tax_breakdown[].sourcing`
* Add support for new values `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on enums `Tax.Calculation.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`, `Tax.Calculation.tax_breakdown[].tax_rate_details.tax_type`, `Tax.CalculationLineItem.tax_breakdown[].tax_rate_details.tax_type`, and `Tax.Transaction.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`
* Add support for `trial_offer` on `Invoice.create_preview().$params.schedule_detail.amendment.item_action.add`, `Invoice.create_preview().$params.schedule_detail.amendment.item_action.set`, `Invoice.create_preview().$params.schedule_detail.phase.item`, `Quote.create().$params.line.action.add_item`, `Quote.create().$params.line.action.set_item`, `Quote.update().$params.line.action.add_item`, `Quote.update().$params.line.action.set_item`, `QuoteLine.actions[].add_item`, `QuoteLine.actions[].set_items[]`, `QuotePreviewSubscriptionSchedule.phases[].items[]`, `SubscriptionSchedule.amend().$params.amendment.item_action.add`, `SubscriptionSchedule.amend().$params.amendment.item_action.set`, `SubscriptionSchedule.create().$params.phase.item`, `SubscriptionSchedule.phases[].items[]`, and `SubscriptionSchedule.update().$params.phase.item`
* Add support for `risk_reserved` on `Balance`
* ⚠️ Remove support for `source_type` on `Charge.payment_method_details.stripe_balance`, `ConfirmationToken.create().$params.payment_method_datum.stripe_balance`, `ConfirmationToken.payment_method_preview.stripe_balance`, `PaymentAttemptRecord.payment_method_details.stripe_balance`, `PaymentIntent.confirm().$params.payment_method_datum.stripe_balance`, `PaymentIntent.create().$params.payment_method_datum.stripe_balance`, `PaymentIntent.update().$params.payment_method_datum.stripe_balance`, `PaymentMethod.create().$params.stripe_balance`, `PaymentMethod.stripe_balance`, `PaymentRecord.payment_method_details.stripe_balance`, `SetupIntent.confirm().$params.payment_method_datum.stripe_balance`, `SetupIntent.create().$params.payment_method_datum.stripe_balance`, and `SetupIntent.update().$params.payment_method_datum.stripe_balance`
* Add support for `tax_details` on `Checkout\Session.create().$params.line_item.price_datum.product_datum`, `Checkout\Session.update().$params.line_item.price_datum.product_datum`, `Invoice.add_lines().$params.line.price_datum.product_datum`, `Invoice.update_lines().$params.line.price_datum.product_datum`, `InvoiceLineItem.update().$params.price_datum.product_datum`, `PaymentLink.create().$params.line_item.price_datum.product_datum`, `Plan.create().$params.product`, `Price.create().$params.product_datum`, `Product.create().$params`, and `Product.update().$params`
* Add support for `pending_invoice_item_interval` on `Checkout\Session.update().$params.subscription_datum`
* Add support for `hosted` and `ui_mode` on `FinancialConnections.Session` and `FinancialConnections\Session.create().$params`
* Add support for `url` on `FinancialConnections.Session`
* Add support for `expires_after_seconds` on `Invoice.create().$params.payment_setting.payment_method_option.pix`, `Invoice.payment_settings.payment_method_options.pix`, `Invoice.update().$params.payment_setting.payment_method_option.pix`, `QuotePreviewInvoice.payment_settings.payment_method_options.pix`, `Subscription.create().$params.payment_setting.payment_method_option.pix`, `Subscription.payment_settings.payment_method_options.pix`, and `Subscription.update().$params.payment_setting.payment_method_option.pix`
* Add support for `current_trial` on `Invoice.create_preview().$params.subscription_detail.item`, `Subscription.create().$params.item`, `Subscription.update().$params.item`, `SubscriptionItem.create().$params`, `SubscriptionItem.update().$params`, and `SubscriptionItem`
* Add support for `surcharge` on `PaymentIntent.amount_details`, `PaymentIntent.capture().$params.amount_detail`, `PaymentIntent.confirm().$params.amount_detail`, `PaymentIntent.create().$params.amount_detail`, `PaymentIntent.increment_authorization().$params.amount_detail`, and `PaymentIntent.update().$params.amount_detail`
* Add support for `amount_details` and `payment_details` on `PaymentIntent.decrement_authorization().$params`
* Add support for `mandate_options` on `PaymentIntent.payment_method_options.stripe_balance`
* Add support for `managed_payments` on `PaymentLink.create().$params` and `PaymentLink`
* Add support for `stripe_balance` on `SetupIntent.confirm().$params.payment_method_option`, `SetupIntent.create().$params.payment_method_option`, `SetupIntent.payment_method_options`, and `SetupIntent.update().$params.payment_method_option`
* Add support for `billing_cycle_anchor` on `Subscription.create().$params.trial_setting.end_behavior`, `Subscription.trial_settings.end_behavior`, and `Subscription.update().$params.trial_setting.end_behavior`
* Add support for `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on `Tax.Registration.country_options.us`
* Add support for new values `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on enum `Tax.Registration.country_options.us.type`
* Add support for `requirements` on `TaxCode`
* ⚠️ Change type of `V2.Billing.Cadence.settings_data.collection.payment_method_options.card.mandate_options.amount`, `V2.Billing.CollectionSetting.payment_method_options.card.mandate_options.amount`, `V2.Billing.CollectionSettingVersion.payment_method_options.card.mandate_options.amount`, `V2\Billing\CollectionSetting.create().$params.payment_method_option.card.mandate_option.amount`, and `V2\Billing\CollectionSetting.update().$params.payment_method_option.card.mandate_option.amount` from `longInteger` to `int64_string`
* Add support for new values `ar_bank_account`, `co_bank_account`, and `eg_bank_account` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
* Add support for `timezone` on `V2.Core.Account.defaults`, `V2\Core\Account.create().$params.default`, and `V2\Core\Account.update().$params.default`
* Add support for `azure_event_grid` on `V2.Core.EventDestination` and `V2\Core\EventDestination.create().$params`
* Add support for new value `no_azure_partner_topic_exists` on enum `V2.Core.EventDestination.status_details.disabled.reason`
* Add support for new value `azure_event_grid` on enum `V2.Core.EventDestination.type`
* Add support for `supported_currencies` on `V2.Core.Vault.GbBankAccount`, `V2.Core.Vault.UsBankAccount`, and `V2.MoneyManagement.PayoutMethod.card`
* ⚠️ Change `V2.Core.Vault.GbBankAccount.sort_code` and `V2\Core\Vault\GbBankAccount.create().$params.sort_code` to be optional
* Add support for `restricted` on `V2.MoneyManagement.PayoutMethod`
* Add support for `currencies` on `V2.MoneyManagement.PayoutMethodsBankAccountSpec.countries.value.fields[]`
* Add support for `counterparty` and `description` on `V2.MoneyManagement.Transaction`
* ⚠️ Add support for `currency` on `V2\Core\Vault\GbBankAccount.create().$params`, `V2\Core\Vault\UsBankAccount.create().$params`, `V2\MoneyManagement\OutboundSetupIntent.create().$params.payout_method_datum.bank_account`, `V2\MoneyManagement\OutboundSetupIntent.create().$params.payout_method_datum.card`, `V2\MoneyManagement\OutboundSetupIntent.update().$params.payout_method_datum.bank_account`, and `V2\MoneyManagement\OutboundSetupIntent.update().$params.payout_method_datum.card`
* Add support for `iban` on `V2\Core\Vault\GbBankAccount.create().$params`
* Change `V2\Core\Vault\GbBankAccount.create().$params.account_number` to be optional
* Add support for new value `currency` on enum `InvalidPaymentMethodException.invalid_param`
* Add support for event notifications `V2CoreBatchJobBatchFailedEvent`, `V2CoreBatchJobCanceledEvent`, `V2CoreBatchJobCompletedEvent`, `V2CoreBatchJobCreatedEvent`, `V2CoreBatchJobReadyForUploadEvent`, `V2CoreBatchJobTimeoutEvent`, `V2CoreBatchJobUpdatedEvent`, `V2CoreBatchJobUploadTimeoutEvent`, `V2CoreBatchJobValidatingEvent`, and `V2CoreBatchJobValidationFailedEvent` with related object `V2.Core.BatchJob`
* Add support for error code `service_period_coupon_with_metered_tiered_item_unsupported` on `QuotePreviewInvoice.last_finalization_error`
