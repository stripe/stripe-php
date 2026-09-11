---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1743
is_stripe_api_change: true
released_in_version: 15.10.0-beta.1
---

* Add support for new resources `Issuing.DisputeSettlementDetail` and `Issuing.Settlement`
* Add support for `all` and `retrieve` methods on resource `DisputeSettlementDetail`
* Remove support for `all` method on resource `QuotePhase`
* Add support for new values `issuing_dispute_settlement_detail.created`, `issuing_dispute_settlement_detail.updated`, `issuing_settlement.created`, and `issuing_settlement.updated` on enum `Event.type`
* Add support for `settlement` on `Issuing.Transaction`
