---
title: ", [#1912](https://github.com/stripe/stripe-php/pull/1912) Update generated code based on incoming API changes in the `2025-09-30.clover` API version."
pr_url: https://github.com/stripe/stripe-php/pull/1900
is_breaking: true
is_stripe_api_change: true
released_in_version: 18.0.0
---

* ⚠️ Remove support for `link` and `pay_by_bank` on `PaymentMethod.update().$params`
* ⚠️ Remove support for `coupon` on `Discount`, `PromotionCode.create().$params`, and `PromotionCode`. Use `Discount.source.coupon`, `PromotionCode.create().$params.promotion.code`, and `PromotionCode.promotion.code` instead.
* ⚠️ Remove support for values `saturday` and `sunday` from enum `Account.settings.payouts.schedule.weekly_payout_days`
* ⚠️ Remove support for `iterations` on `Invoice.create_preview().$params.schedule_detail.phase`, `SubscriptionSchedule.create().$params.phase`, and `SubscriptionSchedule.update().$params.phase`
* Add support for new value `prevented` on enum `Dispute.status`
* Add support for new resource `BalanceSettings`
* Add support for `retrieve` and `update` methods on resource `BalanceSettings`
* Add support for new values `external_request` and `unsupported_business_type` on enums `Account.future_requirements.errors[].code`, `Account.requirements.errors[].code`, `BankAccount.future_requirements.errors[].code`, `BankAccount.requirements.errors[].code`, `Capability.future_requirements.errors[].code`, `Capability.requirements.errors[].code`, `Person.future_requirements.errors[].code`, and `Person.requirements.errors[].code`
* Add support for `source` on `Discount`
* Add support for `mb_way_payments` on `Account.capabilities`, `Account.create().$params.capability`, and `Account.update().$params.capability`
* Add support for `trial_update_behavior` on `BillingPortal.Configuration.features.subscription_update`, `BillingPortal\Configuration.create().$params.feature.subscription_update`, and `BillingPortal\Configuration.update().$params.feature.subscription_update`
* Add support for `mb_way` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethod`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Add support for `branding_settings` and `name_collection` on `Checkout.Session` and `Checkout\Session.create().$params`
* Add support for `excluded_payment_method_types` on `Checkout.Session`, `Checkout\Session.create().$params`, `PaymentIntent.confirm().$params`, and `PaymentIntent.update().$params`
* Add support for `unit_label` on `Checkout\Session.create().$params.line_item.price_datum.product_datum`, `Invoice.add_lines().$params.line.price_datum.product_datum`, `Invoice.update_lines().$params.line.price_datum.product_datum`, `InvoiceLineItem.update().$params.price_datum.product_datum`, and `PaymentLink.create().$params.line_item.price_datum.product_datum`
* Add support for `alma`, `billie`, and `satispay` on `Checkout.Session.payment_method_options` and `Checkout\Session.create().$params.payment_method_option`
* Add support for `demo_pay` on `Checkout\Session.create().$params.payment_method_option`
* Add support for `capture_method` on `Checkout.Session.payment_method_options.affirm`, `Checkout.Session.payment_method_options.afterpay_clearpay`, `Checkout.Session.payment_method_options.amazon_pay`, `Checkout.Session.payment_method_options.card`, `Checkout.Session.payment_method_options.cashapp`, `Checkout.Session.payment_method_options.klarna`, `Checkout.Session.payment_method_options.link`, `Checkout.Session.payment_method_options.mobilepay`, `Checkout.Session.payment_method_options.revolut_pay`, `Checkout\Session.create().$params.payment_method_option.affirm`, `Checkout\Session.create().$params.payment_method_option.afterpay_clearpay`, `Checkout\Session.create().$params.payment_method_option.amazon_pay`, `Checkout\Session.create().$params.payment_method_option.card`, `Checkout\Session.create().$params.payment_method_option.cashapp`, `Checkout\Session.create().$params.payment_method_option.klarna`, `Checkout\Session.create().$params.payment_method_option.link`, `Checkout\Session.create().$params.payment_method_option.mobilepay`, and `Checkout\Session.create().$params.payment_method_option.revolut_pay`
* Add support for `flexible` on `Checkout\Session.create().$params.subscription_datum.billing_mode`, `Invoice.create_preview().$params.schedule_detail.billing_mode`, `Invoice.create_preview().$params.subscription_detail.billing_mode`, `Quote.create().$params.subscription_datum.billing_mode`, `Quote.subscription_data.billing_mode`, `Subscription.billing_mode`, `Subscription.create().$params.billing_mode`, `Subscription.migrate().$params.billing_mode`, `SubscriptionSchedule.billing_mode`, and `SubscriptionSchedule.create().$params.billing_mode`
* Add support for `business_name` and `individual_name` on `Checkout.Session.collected_information`, `Checkout.Session.customer_details`, `Customer.create().$params`, `Customer.update().$params`, and `Customer`
* Add support for new values `mb_way` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Add support for `chargeback_loss_reason_code` on `Dispute.payment_method_details.klarna`
* Add support for `net_amount` and `proration_details` on `InvoiceItem`
* Add support for `fraud_disputability_likelihood` and `risk_assessment` on `Issuing\Authorization.create().$params`
* Add support for `second_line` on `Issuing.Card`
* Add support for new values `mb_way` on enum `PaymentIntent.excluded_payment_method_types`
* Add support for `fr_meal_voucher_conecs` on `PaymentMethodConfiguration.create().$params` and `PaymentMethodConfiguration.update().$params`
* Add support for `promotion` on `PromotionCode.create().$params` and `PromotionCode`
* Add support for new values `acknowledged` and `payment_never_settled` on enum `Review.closed_reason`
* Add support for `provider` on `Tax.Settings.defaults`
* Add support for `bbpos_wisepad3` on `Terminal.Configuration`, `Terminal\Configuration.create().$params`, and `Terminal\Configuration.update().$params`
* Add support for `address_kana`, `address_kanji`, `display_name_kana`, `display_name_kanji`, and `phone` on `Terminal.Location`, `Terminal\Location.create().$params`, and `Terminal\Location.update().$params`
* Change `Terminal\Location.create().$params.address` to be optional
* Change `Terminal\Location.create().$params.display_name` to be optional
* Add support for error codes `financial_connections_account_pending_account_numbers` and `financial_connections_account_unavailable_account_numbers` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`
