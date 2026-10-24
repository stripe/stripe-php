---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2179
semver_level: major
is_stripe_api_change: true
---

* Add support for `billing_group` on `Billing.Alert.spend_threshold.filters`, `Billing.AlertNotification`, `Billing.AlertTriggered.group_by`, `Billing\Alert.create().$params.spend_threshold.filter`, and `Billing\AlertNotification.all().$params`
* Add support for new values `get_fund` and `nhil` on enums `Tax.Calculation.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`, `Tax.Calculation.tax_breakdown[].tax_rate_details.tax_type`, `Tax.CalculationLineItem.tax_breakdown[].tax_rate_details.tax_type`, and `Tax.Transaction.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`
* Add support for `physical_address` on `Account.company`
* Add support for `toss_pay` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Add support for `mandate` on `Charge.payment_method_details.paypay`, `PaymentAttemptRecord.payment_method_details.paypay`, and `PaymentRecord.payment_method_details.paypay`
* Add support for `automatic_pass_through_fee` on `Checkout.Session` and `Checkout\Session.create().$params`
* Add support for `paypay` on `Checkout.Session.payment_method_options` and `Checkout\Session.create().$params.payment_method_option`
* Change `Checkout\Session.create().$params.marketing_attribution.ad_conversion` to be optional
* Add support for new values `bw_vat`, `ci_vat`, and `gh_tin` on enums `Checkout.Session.collected_information.tax_id.type`, `Checkout.Session.customer_details.tax_ids[].type`, `Invoice.customer_tax_ids[].type`, `Order.tax_details.tax_ids[].type`, `QuotePreviewInvoice.customer_tax_ids[].type`, `Tax.Calculation.customer_details.tax_ids[].type`, and `Tax.Transaction.customer_details.tax_ids[].type`
* Add support for `adjustable_quantity` on `Checkout.Session.items[].subscription.items[]`
* ⚠️ Change `Checkout.Session.marketing_attributions[].ad_conversion` to be optional
* Add support for new value `toss_pay` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Add support for `marketing_attributions` on `Customer.create().$params` and `Customer`
* Add support for `delivered_at` and `shipped_at` on `Issuing.Card.shipping`
* Add support for `merchant_of_record` on `PaymentIntent.confirm().$params.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_detail.money_service.account_funding`, `PaymentIntent.payment_details.money_services.account_funding`, and `PaymentIntent.update().$params.payment_detail.money_service.account_funding`
* Add support for new value `toss_pay` on enums `PaymentIntent.allowed_payment_method_types` and `SetupIntent.allowed_payment_method_types`
* Add support for new value `toss_pay` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
* Add support for `payment_method_data` and `payment_method_options` on `Refund.create().$params`
* Add support for `debit_behavior` on `Subscription.create().$params.payment_setting.payment_method_option.sepa_debit`, `Subscription.payment_settings.payment_method_options.sepa_debit`, and `Subscription.update().$params.payment_setting.payment_method_option.sepa_debit`
* Add support for `triggering_signal` on `V2.Signals.AccountActivity` and `V2\Signals\AccountActivity.create().$params`
* Add support for `mfa_challenges` on `V2.Signals.AccountActivity.login_decision` and `V2\Signals\AccountActivity.create().$params.login_decision`
