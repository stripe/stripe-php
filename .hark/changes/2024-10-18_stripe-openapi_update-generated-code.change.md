---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1774
is_stripe_api_change: true
released_in_version: 16.7.0-beta.1
---

* Remove support for value `expired` from enum `Issuing.Authorization.status`
* Add support for new values `alma`, `gopay`, `qris`, and `shopeepay` on enum `PaymentLink.payment_method_types[]`
* Add support for `alma` on `PaymentMethodConfiguration` and `PaymentMethod`
* Add support for `gopay`, `qris`, and `shopeepay` on `PaymentMethod`
* Add support for new values `alma`, `gopay`, `qris`, and `shopeepay` on enum `PaymentMethod.type`
* Add support for `amazon_pay` on `PaymentMethodDomain`
* Add support for `au_serr`, `ca_mrdp`, `eu_dac7`, `gb_mrdp`, and `nz_mrdp` on `Tax.Form`
* Add support for new values `au_serr`, `ca_mrdp`, `eu_dac7`, `gb_mrdp`, and `nz_mrdp` on enum `Tax.Form.type`
