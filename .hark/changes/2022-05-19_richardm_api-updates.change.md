---
title: API Updates
pr_link: https://github.com/stripe/stripe-php/pull/1286
is_stripe_api_change: true
released_in_version: 8.2.0
---

* Add support for new resources `Treasury.CreditReversal`, `Treasury.DebitReversal`, `Treasury.FinancialAccountFeatures`, `Treasury.FinancialAccount`, `Treasury.FlowDetails`, `Treasury.InboundTransfer`, `Treasury.OutboundPayment`, `Treasury.OutboundTransfer`, `Treasury.ReceivedCredit`, `Treasury.ReceivedDebit`, `Treasury.TransactionEntry`, and `Treasury.Transaction`
* Add support for `retrieve_payment_method` method on resource `Customer`
* Add support for `all` and `list_owners` methods on resource `FinancialConnections.Account`
* Add support for `treasury` on `Issuing.Authorization`, `Issuing.Dispute`, and `Issuing.Transaction`
* Add support for `financial_account` on `Issuing.Card`
* Add support for `client_secret` on `Order`
* Add support for `attach_to_self` and `flow_directions` on `SetupIntent`
