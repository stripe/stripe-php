---
title: Please read the [API Changelog](https://docs.stripe.com/changelog/2024-06-20) and carefully review the API changes before upgrading.
pr_link: https://github.com/stripe/stripe-php/pull/1714
released_in_version: 15.0.0
---

### ⚠️ Breaking changes

  * Remove the unused resource `PlatformTaxFee`
  * Remove the protected method `_searchResource` on resources Charge, Customer, Invoice, PaymentIntent, Price, Product, and Subscription as it is no longer used.

### Additions

* Add support for `finalize_amount` test helper method on resource `Issuing.Authorization`
* Add support for `fleet` and `fuel` on `Issuing.Authorization`
* Add support for new value `ch_uid` on enum `TaxId.type`
