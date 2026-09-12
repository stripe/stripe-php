---
title: Update generated code.
pr_url: https://github.com/stripe/stripe-php/pull/1890
is_stripe_api_change: true
released_in_version: 17.6.0
---

* Add support for `balance_report`, `payout_details`, and `payout_reconciliation_report` on `AccountSession.components` and `AccountSession.create().$params.component`
* Add support for `name` on `BillingPortal.Configuration`, `BillingPortal\Configuration.create().$params`, and `BillingPortal\Configuration.update().$params`
* Add support for `installments` on `Charge.payment_method_details.alma`
* Add support for `transaction_id` on `Charge.payment_method_details.alma`, `Charge.payment_method_details.amazon_pay`, `Charge.payment_method_details.billie`, `Charge.payment_method_details.kakao_pay`, `Charge.payment_method_details.kr_card`, `Charge.payment_method_details.naver_pay`, `Charge.payment_method_details.payco`, `Charge.payment_method_details.revolut_pay`, `Charge.payment_method_details.samsung_pay`, and `Charge.payment_method_details.satispay`
* Add support for `location` and `reader` on `Charge.payment_method_details.paynow`
* Add support for `amount_includes_iof` on `Checkout.Session.payment_method_options.pix`, `Checkout\Session.create().$params.payment_method_option.pix`, `PaymentIntent.confirm().$params.payment_method_option.pix`, `PaymentIntent.create().$params.payment_method_option.pix`, `PaymentIntent.payment_method_options.pix`, and `PaymentIntent.update().$params.payment_method_option.pix`
* Add support for new values `block` and `resolution` on enum `Dispute.payment_method_details.card.case_type`
* Add support for new value `terminal_android_apk` on enum `File.purpose`
* Add support for `metadata` and `period` on `Invoice.create_preview().$params.schedule_detail.phase.add_invoice_item`, `Subscription.create().$params.add_invoice_item`, `Subscription.update().$params.add_invoice_item`, `SubscriptionSchedule.create().$params.phase.add_invoice_item`, `SubscriptionSchedule.phases[].add_invoice_items[]`, and `SubscriptionSchedule.update().$params.phase.add_invoice_item`
* Add support for `exp_month` and `exp_year` on `Issuing\Card.create().$params`
* Add support for `excluded_payment_method_types` on `PaymentIntent.create().$params` and `PaymentIntent`
* Add support for `payout_method` on `Payout.create().$params` and `Payout`
* Add support for `mxn` on `Terminal.Configuration.tipping`, `Terminal\Configuration.create().$params.tipping`, and `Terminal\Configuration.update().$params.tipping`
* Add support for `card` on `Terminal\Reader.present_payment_method().$params`
* Add support for error codes `customer_session_expired` and `india_recurring_payment_mandate_canceled` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`
