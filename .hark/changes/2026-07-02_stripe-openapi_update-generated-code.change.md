---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/2089
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.4.0-alpha.2
---

* Add support for new resources `Crypto.CustomerConsumerWallet`, `Crypto.CustomerPaymentToken`, `Crypto.Customer`, `Crypto.OnrampSession`, and `Crypto.OnrampTransactionLimits`
* Add support for `all` and `retrieve` methods on resource `Crypto.Customer`
* Add support for `all`, `checkout`, `create`, `quote`, and `retrieve` methods on resource `Crypto.OnrampSession`
* Add support for `retrieve` method on resource `Crypto.OnrampTransactionLimits`
* Add support for `electronic_commerce_indicator` on `Charge.payment_method_details.card`
* Add support for `amount_received` and `amount_requested` on `Charge.payment_method_details.crypto`, `PaymentAttemptRecord.payment_method_details.crypto`, and `PaymentRecord.payment_method_details.crypto`
* Add support for `fingerprint` on `Charge.payment_method_details.gift_card`, `PaymentAttemptRecord.payment_method_details.gift_card`, and `PaymentRecord.payment_method_details.gift_card`
* Add support for `address_collection_precision` on `Checkout\Session.create().$params.automatic_tax`
* Add support for `subscription` on `Checkout.Session.items[]`
* ⚠️  Remove support for `deactivation` on `GiftCardOperation`
* ⚠️  Remove support for value `deactivation` from enum `GiftCardOperation.type`
* Add support for `merchant_amount_exchange_rate` on `Issuing.Authorization` and `Issuing.Transaction`
* Add support for `device_id` on `Issuing.Authorization.token_details.network_data.device` and `Issuing.Token.network_data.device`
* Add support for `program` on `Issuing.Card`
* Add support for `payment_method_details` on `PaymentAttemptRecord.report_failed().$params` and `PaymentRecord.report_payment_attempt_failed().$params`
* Add support for `reason` on `PaymentAttemptRecord.report_refund().$params` and `PaymentRecord.report_refund().$params`
* Add support for `amount_reconciliation` on `PaymentIntent.confirm().$params.payment_method_option.crypto`, `PaymentIntent.create().$params.payment_method_option.crypto`, `PaymentIntent.payment_method_options.crypto`, and `PaymentIntent.update().$params.payment_method_option.crypto`
* Add support for `connect_permissions` and `permissions` on `V2.Iam.ApiKey`, `V2\Iam\ApiKey.create().$params`, and `V2\Iam\ApiKey.update().$params`
* Add support for `credit` on `V2.MoneyManagement.FinancialAccount`
* Add support for new value `credit` on enum `V2.MoneyManagement.FinancialAccount.type`
* Add support for new value `currency_required` on enum `V2.MoneyManagement.PayoutIntent.next_action.handle_failure.failure_reason`
* Add support for new values `issuing_authorization`, `issuing_transaction`, and `platform_funded_credit_transaction` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
* Add support for `account`, `issuing_authorization`, `issuing_dispute`, and `issuing_transaction` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
* Add support for new values `issuing_authorization`, `issuing_dispute`, and `issuing_transaction` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
* Change type of `V2\MoneyManagement\FinancialAccount.create().$params.type` from `literal('storage')` to `enum('credit'|'storage')`
* Add support for `expires_at` on `V2\Iam\ApiKey.create().$params`
