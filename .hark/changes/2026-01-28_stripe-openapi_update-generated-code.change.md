---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/2001
is_stripe_api_change: true
released_in_version: 19.3.0
---

* Add support for new resource `Radar.PaymentEvaluation`
* Add support for `create` method on resource `Radar.PaymentEvaluation`
* Add support for `adjustable_quantity` on `LineItem`
* Add support for new value `risk_reserved` on enum `BalanceTransaction.balance_type`
* Add support for new values `reserve_hold` and `reserve_release` on enum `BalanceTransaction.type`
* Add support for new values `2.3.0` and `2.3.1` on enums `Charge.payment_method_details.card.three_d_secure.version` and `SetupAttempt.payment_method_details.card.three_d_secure.version`
* Add support for new value `adyen` on enums `Charge.payment_method_details.ideal.bank`, `ConfirmationToken.payment_method_preview.ideal.bank`, `PaymentAttemptRecord.payment_method_details.ideal.bank`, `PaymentMethod.ideal.bank`, `PaymentRecord.payment_method_details.ideal.bank`, and `SetupAttempt.payment_method_details.ideal.bank`
* Add support for new value `ADYBNL2A` on enums `Charge.payment_method_details.ideal.bic`, `ConfirmationToken.payment_method_preview.ideal.bic`, `PaymentAttemptRecord.payment_method_details.ideal.bic`, `PaymentMethod.ideal.bic`, `PaymentRecord.payment_method_details.ideal.bic`, and `SetupAttempt.payment_method_details.ideal.bic`
* Add support for new value `pl_nip` on enums `Checkout.Session.customer_details.tax_ids[].type`, `Invoice.customer_tax_ids[].type`, `Tax.Calculation.customer_details.tax_ids[].type`, `Tax.Transaction.customer_details.tax_ids[].type`, and `TaxId.type`
* Change `Invoice.payment_settings.payment_method_options.payto` and `Subscription.payment_settings.payment_method_options.payto` to be required
* Add support for `enforce_arithmetic_validation` on `PaymentIntent.capture().$params.amount_detail`, `PaymentIntent.confirm().$params.amount_detail`, `PaymentIntent.create().$params.amount_detail`, `PaymentIntent.increment_authorization().$params.amount_detail`, and `PaymentIntent.update().$params.amount_detail`
* Add support for `error` on `PaymentIntent.amount_details`
* Remove support for `bgn` on `Terminal.Configuration.tipping`, `Terminal\Configuration.create().$params.tipping`, and `Terminal\Configuration.update().$params.tipping`
* Add support for `topup` on `Treasury.ReceivedDebit.linked_flows`
* Add support for `contact_phone` on `V2.Core.Account`, `V2\Core\Account.create().$params`, `V2\Core\Account.update().$params`, and `V2\Core\AccountToken.create().$params`
* Add support for `registration_date` on `V2.Core.Account.identity.business_details`, `V2\Core\Account.create().$params.identity.business_detail`, `V2\Core\Account.update().$params.identity.business_detail`, and `V2\Core\AccountToken.create().$params.identity.business_detail`
* Add support for new value `gb_vat` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
* Add support for error code `request_blocked` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`
