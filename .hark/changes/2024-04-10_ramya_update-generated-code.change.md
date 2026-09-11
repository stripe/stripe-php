---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1673
released_in_version: 14.0.0
---

* This release changes the pinned API version to `2024-04-10`. Please read the [API Changelog](https://docs.stripe.com/changelog/2024-04-10) and carefully review the API changes before upgrading.

### ⚠️ Breaking changes

 * Rename `features` to `marketing_features` on `Product`
 * Do not force resolution to IPv4 - Forcing IPv4 was causing hard-to-understand failures for users in IPv6-only environments. If you want to force IPv4 yourself, you can do so by telling the API client to use a CurlClient other than the default
```php
$curl = new \Stripe\HttpClient\CurlClient([
  CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
]);
\Stripe\ApiRequestor::setHttpClient($curl);
```

#### ⚠️ Removal of enum values, properties and events that are no longer part of the publicly documented Stripe API

* Remove the below deprecated values on the enum `BalanceTransaction.Type`
    * `obligation_inbound`
    * `obligation_payout`
    * `obligation_payout_failure`
    * `obligation_reversal_outbound`
 * Remove the deprecated value `various` on the enum `Climate.Supplier.RemovalPathway`
 * Remove deprecated events
   * `invoiceitem.updated`
   * `order.created`
   * `recipient.created`
   * `recipient.deleted`
   * `recipient.updated`
   * `sku.created`
   * `sku.deleted`
   * `sku.updated`
 * Remove the deprecated value `service_tax` on the enum `TaxRate.TaxType`
 * Remove support for `id_bank_transfer`, `multibanco`, `netbanking`, `pay_by_bank`, and `upi` on `PaymentMethodConfiguration`
* Remove the legacy field `rendering_options` in `Invoice`. Use `rendering` instead.
