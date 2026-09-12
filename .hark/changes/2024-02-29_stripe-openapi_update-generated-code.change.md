---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1654
is_stripe_api_change: true
released_in_version: 13.13.0
---

* Change type of `Identity.VerificationSession.type` from `nullable(enum('document'|'id_number'))` to `enum('document'|'id_number')`
* Add resources `Application`, `ConnectCollectionTransfer`, `PlatformTaxFee`, `ReserveTransaction`, `SourceMandateNotification`, and `TaxDeductedAtSource`. These classes have no methods on them, and are used to provide more complete types for PHPDocs.
