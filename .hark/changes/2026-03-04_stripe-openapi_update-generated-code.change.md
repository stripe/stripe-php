---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2021
is_breaking: true
is_stripe_api_change: true
released_in_version: 19.5.0-alpha.2
---

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
