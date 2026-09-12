---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/2092
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.4.0-alpha.3
---

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
