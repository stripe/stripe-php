---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2177
semver_level: major
is_stripe_api_change: true
---

* ⚠️ Remove support for `capture` method on resource `V2.Payments.OffSessionPayment`
* ⚠️ Remove support for `acknowledge_confirmation_of_payee` and `initiate_confirmation_of_payee` methods on resource `V2.Core.Vault.GbBankAccount`
* Add support for `wechat_pay_mobile_web_payments` on `Account.create().$params.setting`, `Account.settings`, and `Account.update().$params.setting`
* ⚠️ Remove support for `wechat_pay_payments` on `Account.create().$params.setting`, `Account.settings`, and `Account.update().$params.setting`
* Add support for `settlement_reserved` on `Balance`
* Add support for new value `settlement_reserved` on enum `BalanceTransaction.balance_type`
* Add support for `carecredit`, `getflex`, and `sezzle` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Add support for `mandate_options` on `Checkout\Session.create().$params.payment_method_option.card`
* Add support for new value `auto` on enum `Checkout.Session.payment_method_collection`
* Change `Checkout.Session.items[].subscription.backdate_start_date` to be required
* Add support for new values `carecredit`, `getflex`, and `sezzle` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Add support for new values `three_d_secure.authentication.canceled`, `three_d_secure.authentication.challenge_started`, `three_d_secure.authentication.errored`, `three_d_secure.authentication.failed`, `three_d_secure.authentication.requires_challenge`, `three_d_secure.authentication.requires_submission`, and `three_d_secure.authentication.succeeded` on enum `Event.type`
* Add support for new values `carecredit`, `getflex`, and `sezzle` on enums `PaymentIntent.allowed_payment_method_types` and `SetupIntent.allowed_payment_method_types`
* Add support for new values `carecredit`, `getflex`, and `sezzle` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
* Add support for `contact_email` on `V2.Core.AccountEvaluation.account_data`, `V2.Signals.AccountActivity.account_details.data`, `V2.Signals.AccountEvaluation.account_details.data`, `V2\Core\AccountEvaluation.create().$params.account_datum`, `V2\Signals\AccountActivity.create().$params.account_detail.datum`, and `V2\Signals\AccountEvaluation.create().$params.account_detail.datum`
* Add support for `bre_b`, `nip`, and `pix` on `V2.MoneyManagement.FinancialAddress.bank_account` and `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account`
* Add support for new values `bre_b`, `nip`, and `pix` on enum `V2.MoneyManagement.ReceivedCredit.bank_transfer.originating_bank_account.type`
* ⚠️ Remove support for `amount_capturable` on `V2.Payments.OffSessionPayment`
* ⚠️ Remove support for `capture` on `V2.Payments.OffSessionPayment` and `V2\Payments\OffSessionPayment.create().$params`
* Add support for snapshot events `THREE_D_SECURE_AUTHENTICATION_CANCELED`, `THREE_D_SECURE_AUTHENTICATION_CHALLENGE_STARTED`, `THREE_D_SECURE_AUTHENTICATION_ERRORED`, `THREE_D_SECURE_AUTHENTICATION_FAILED`, `THREE_D_SECURE_AUTHENTICATION_REQUIRES_CHALLENGE`, `THREE_D_SECURE_AUTHENTICATION_REQUIRES_SUBMISSION`, and `THREE_D_SECURE_AUTHENTICATION_SUCCEEDED` with resource `ThreeDSecure.Authentication`
* ⚠️ Remove support for event notification `V2PaymentsOffSessionPaymentRequiresCaptureEvent` with related object `V2.Payments.OffSessionPayment`
