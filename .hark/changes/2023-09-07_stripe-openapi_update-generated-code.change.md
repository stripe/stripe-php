---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1571
is_stripe_api_change: true
released_in_version: 12.2.0
---

* Add support for new resource `PaymentMethodDomain`
* Add support for `all`, `create`, `retrieve`, `update`, and `validate` methods on resource `PaymentMethodDomain`
* Add support for new values `treasury.credit_reversal.created`, `treasury.credit_reversal.posted`, `treasury.debit_reversal.completed`, `treasury.debit_reversal.created`, `treasury.debit_reversal.initial_credit_granted`, `treasury.financial_account.closed`, `treasury.financial_account.created`, `treasury.financial_account.features_status_updated`, `treasury.inbound_transfer.canceled`, `treasury.inbound_transfer.created`, `treasury.inbound_transfer.failed`, `treasury.inbound_transfer.succeeded`, `treasury.outbound_payment.canceled`, `treasury.outbound_payment.created`, `treasury.outbound_payment.expected_arrival_date_updated`, `treasury.outbound_payment.failed`, `treasury.outbound_payment.posted`, `treasury.outbound_payment.returned`, `treasury.outbound_transfer.canceled`, `treasury.outbound_transfer.created`, `treasury.outbound_transfer.expected_arrival_date_updated`, `treasury.outbound_transfer.failed`, `treasury.outbound_transfer.posted`, `treasury.outbound_transfer.returned`, `treasury.received_credit.created`, `treasury.received_credit.failed`, `treasury.received_credit.succeeded`, and `treasury.received_debit.created` on enum `Event.type`
* Remove support for value `invoiceitem.updated` from enum `Event.type`
* Add support for `features` on `Product`
