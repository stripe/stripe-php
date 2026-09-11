---
title: PHPDoc changes
pr_link: https://github.com/stripe/stripe-php/pull/1550
is_stripe_api_change: true
section: Other changes
released_in_version: 12.0.0
---

* Remove support for `alternate_statement_descriptors`, `destination`, and `dispute` on `Charge`
* Remove support for value `charge_refunded` from enum `Dispute.status`
* Remove support for `rendering` on `Invoice`
* Remove support for `attributes`, `caption`, and `deactivate_on` on `Product`
