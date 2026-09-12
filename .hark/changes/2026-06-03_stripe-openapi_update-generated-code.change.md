---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/2074
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.3.0-alpha.2
---

* Add support for new resources `DelegatedCheckout.OrderEvent`, `DelegatedCheckout.Order`, `V2.Billing.ContractLicensePricingQuantityChange`, `V2.Billing.Contract`, and `V2.Signals.AccountSignal`
* Add support for `retrieve` method on resource `DelegatedCheckout.Order`
* Add support for `list_orders` method on resource `DelegatedCheckout.RequestedSession`
* Add support for `all` and `retrieve` methods on resource `V2.Signals.AccountSignal`
* Add support for `activate`, `all`, `cancel`, `create`, `retrieve`, and `update` methods on resource `V2.Billing.Contract`
* Add support for `birth_address` on `Account.create().$params.individual`, `Account.update().$params.individual`, `Person.create().$params`, `Person.update().$params`, `Person`, `Token.create().$params.account.individual`, and `Token.create().$params.person`
* Change type of `Charge.capture().$params.payment_detail.money_service.transaction_type`, `Charge.update().$params.payment_detail.money_service.transaction_type`, `PaymentIntent.capture().$params.payment_detail.money_service.transaction_type`, `PaymentIntent.confirm().$params.payment_detail.money_service.transaction_type`, `PaymentIntent.create().$params.payment_detail.money_service.transaction_type`, and `PaymentIntent.update().$params.payment_detail.money_service.transaction_type` from `literal('account_funding')` to `enum('account_funding'|'debt_repayment')`
* Add support for new value `proserv` on enums `Checkout.Session.automatic_surcharge.provider` and `PaymentLink.automatic_surcharge.provider`
* Add support for `provisioning_decision` and `token_type` on `Issuing.Authorization.token_details` and `Issuing.Token`
* Add support for `token_decision_recommendation` on `Issuing.Authorization.token_details.network_data.visa` and `Issuing.Token.network_data.visa`
* Add support for `language` on `Issuing.Token.network_data.device`
* Add support for `digital_asset_category` on `PaymentIntent.confirm().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.confirm().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card.payment_detail.money_service.account_funding`, `PaymentIntent.create().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`, `PaymentIntent.update().$params.payment_method_option.card.payment_detail.money_service.account_funding`, and `PaymentIntent.update().$params.payment_method_option.card_present.payment_detail.money_service.account_funding`
* Add support for `static_address` on `PaymentIntent.confirm().$params.payment_method_option.crypto.deposit_option`, `PaymentIntent.create().$params.payment_method_option.crypto.deposit_option`, `PaymentIntent.payment_method_options.crypto.deposit_options`, and `PaymentIntent.update().$params.payment_method_option.crypto.deposit_option`
* Add support for `payment_reference` on `PaymentIntent.create().$params.payments_orchestration`
* ⚠️ Remove support for `payment_details` on `PaymentIntent.create().$params.payments_orchestration`
* ⚠️ Change type of `PaymentIntent.payment_details.money_services.transaction_type` from `literal('account_funding')` to `enum('account_funding'|'debt_repayment')`
* Add support for `ending_before`, `limit`, and `starting_after` on `PaymentLocation.all().$params`
* ⚠️ Change `Radar\IssuingAuthorizationEvaluation.create().$params.card_detail.last4` to be required
* Add support for `schema` on `V2.Data.Reporting.QueryRun.result.file` and `V2.Reporting.ReportRun.result.file`
* Add support for new value `payout_method_amount_limit_exceeded` on enum `V2.MoneyManagement.OutboundPayment.status_details.failed.reason`
* Add support for `include` on `V2\Data\Reporting\QueryRun.retrieve().$params` and `V2\Reporting\ReportRun.retrieve().$params`
* Add support for `requirements_collector` on `V2\Core\Account.create().$params.default.responsibility` and `V2\Core\Account.update().$params.default.responsibility`
* Add support for event notification `V2SignalsAccountSignalMerchantDelinquencyReadyEvent` with related object `V2.Signals.AccountSignal`
