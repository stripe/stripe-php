---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1956
is_stripe_api_change: true
released_in_version: 19.0.0
---

* Add support for new resources `Tax.Association` and `Terminal.OnboardingLink`
* Add support for `find` method on resource `Tax.Association`
* Add support for `create` method on resource `Terminal.OnboardingLink`
* Add support for `payment_method_configuration` on `BillingPortal.Configuration.features.payment_method_update`
* Add support for `transaction_id` on `Charge.payment_method_details.ideal`, `PaymentAttemptRecord.payment_method_details.ideal`, and `PaymentRecord.payment_method_details.ideal`
* Add support for new value `finom` on enums `Charge.payment_method_details.ideal.bank`, `ConfirmationToken.payment_method_preview.ideal.bank`, `PaymentAttemptRecord.payment_method_details.ideal.bank`, `PaymentMethod.ideal.bank`, `PaymentRecord.payment_method_details.ideal.bank`, and `SetupAttempt.payment_method_details.ideal.bank`
* Add support for new value `FNOMNL22` on enums `Charge.payment_method_details.ideal.bic`, `ConfirmationToken.payment_method_preview.ideal.bic`, `PaymentAttemptRecord.payment_method_details.ideal.bic`, `PaymentMethod.ideal.bic`, `PaymentRecord.payment_method_details.ideal.bic`, and `SetupAttempt.payment_method_details.ideal.bic`
* Add support for new value `tokenized_account_number_deactivated` on enums `ConfirmationToken.payment_method_preview.us_bank_account.status_details.blocked.reason` and `PaymentMethod.us_bank_account.status_details.blocked.reason`
* Add support for `created` on `CustomerBalanceTransaction.all().$params` and `InvoicePayment.all().$params`
* Add support for new values `financial_connections.account.account_numbers_updated` and `financial_connections.account.upcoming_account_number_expiry` on enum `Event.type`
* Add support for `account_numbers` on `FinancialConnections.Account`
* Change type of `FinancialConnections.Session.client_secret` from `string` to `nullable(string)`
* Add support for `fraud_risk` on `Issuing\Authorization.create().$params.risk_assessment`
* Add support for `latest_fraud_warning` on `Issuing.Card`
* Add support for `hooks` on `PaymentIntent.capture().$params`, `PaymentIntent.confirm().$params`, `PaymentIntent.create().$params`, `PaymentIntent.increment_authorization().$params`, `PaymentIntent.update().$params`, and `PaymentIntent`
* Add support for `mb_way` and `twint` on `Refund.destination_details`
* Add support for snapshot events `FINANCIAL_CONNECTIONS_ACCOUNT_ACCOUNT_NUMBERS_UPDATED` and `FINANCIAL_CONNECTIONS_ACCOUNT_UPCOMING_ACCOUNT_NUMBER_EXPIRY` with resource `FinancialConnections.Account`
