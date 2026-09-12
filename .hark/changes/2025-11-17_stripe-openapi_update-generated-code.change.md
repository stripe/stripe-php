---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1952
is_stripe_api_change: true
released_in_version: 19.1.0-beta.1
---

* Add support for new resources `V2.Core.AccountPersonToken` and `V2.Core.AccountToken`
* Remove support for resource `V2.Payments.OffSessionPayment`
* Add support for `create` and `retrieve` methods on resources `V2.Core.AccountPersonToken` and `V2.Core.AccountToken`
* Remove support for `all`, `cancel`, `capture`, `create`, and `retrieve` methods on resource `V2.Payments.OffSessionPayment`
* Change `Tax.Association.tax_transaction_attempts` to be required
* Add support for `specified_commercial_transactions_act_url` on `Account.business_profile`, `Account.create().$params.business_profile`, and `Account.update().$params.business_profile`
* Add support for `paypay_payments` on `Account.create().$params.setting`, `Account.settings`, and `Account.update().$params.setting`
* Change type of `Billing\Analytics\MeterUsage.retrieve().$params.meter.dimension_filters` from `string` to `array(string)`
* Change type of `Billing\Analytics\MeterUsage.retrieve().$params.meter.tenant_filters` from `string` to `array(string)`
* Add support for `car_rental_data`, `flight_data`, and `lodging_data` on `Charge.capture().$params.payment_detail`, `Charge.update().$params.payment_detail`, `PaymentIntent.capture().$params.payment_detail`, `PaymentIntent.confirm().$params.payment_detail`, `PaymentIntent.create().$params.payment_detail`, and `PaymentIntent.update().$params.payment_detail`
* Add support for `supplementary_purchase_data` on `Order.create().$params.payment.setting.payment_method_option.klarna`, `Order.update().$params.payment.setting.payment_method_option.klarna`, `PaymentIntent.confirm().$params.payment_method_option.klarna`, `PaymentIntent.create().$params.payment_method_option.klarna`, and `PaymentIntent.update().$params.payment_method_option.klarna`
* Add support for `allow_redisplay` and `customer_account` on `PaymentMethod.all().$params`
* Add support for `future_requirements` on `V2.Core.Account`
* Add support for `konbini_payments` and `script_statement_descriptor` on `V2.Core.Account.configuration.merchant`, `V2\Core\Account.create().$params.configuration.merchant`, and `V2\Core\Account.update().$params.configuration.merchant`
* Add support for `eur` on `V2.Core.Account.configuration.storer.capabilities.holds_currencies`, `V2\Core\Account.create().$params.configuration.storer.capability.holds_currency`, and `V2\Core\Account.update().$params.configuration.storer.capability.holds_currency`
* Add support for `requirements_collector` on `V2.Core.Account.defaults.responsibilities`
* Add support for new value `ar_cuit` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
* Add support for new value `ar_dni` on enums `V2.Core.Account.identity.individual.id_numbers[].type` and `V2.Core.AccountPerson.id_numbers[].type`
* Remove support for `collector` on `V2.Core.Account.requirements`
* Add support for new value `holds_currencies.eur` on enum `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for new values `payment_method` and `person` on enum `V2.Core.Account.requirements.entries[].reference.type`
* Remove support for value `resource` from enum `V2.Core.Account.requirements.entries[].reference.type`
* Remove support for value `future_requirements` from enum `V2.Core.Account.requirements.entries[].requested_reasons[].code`
* Add support for `changes` on `V2.Core.Event`
* Remove support for value `sepa_bank_account` from enum `V2.MoneyManagement.FinancialAddress.credentials.type`
* Add support for `account_token` on `V2\Core\Account.create().$params` and `V2\Core\Account.update().$params`
* Add support for `person_token` on `V2\Core\AccountPerson.create().$params` and `V2\Core\AccountPerson.update().$params`
* Add support for thin event `V2CoreHealthEventGenerationFailureResolvedEvent`
* Remove support for thin events `V2PaymentsOffSessionPaymentAuthorizationAttemptFailedEvent`, `V2PaymentsOffSessionPaymentAuthorizationAttemptStartedEvent`, `V2PaymentsOffSessionPaymentCanceledEvent`, `V2PaymentsOffSessionPaymentCreatedEvent`, `V2PaymentsOffSessionPaymentFailedEvent`, `V2PaymentsOffSessionPaymentRequiresCaptureEvent`, and `V2PaymentsOffSessionPaymentSucceededEvent` with related object `V2.Payments.OffSessionPayment`
