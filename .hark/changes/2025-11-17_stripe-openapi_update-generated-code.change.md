---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/1962
is_stripe_api_change: true
released_in_version: 19.1.0-alpha.1
---

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
