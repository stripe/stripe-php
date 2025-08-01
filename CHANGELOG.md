# Changelog

## 17.5.0 - 2025-07-30
This release changes the pinned API version to `2025-07-30.basil`.

* [#1887](https://github.com/stripe/stripe-php/pull/1887) Update generated code
  * Add support for `origin_context` on `Checkout.Session`
* [#1881](https://github.com/stripe/stripe-php/pull/1881) Ensure compatibility with POST on older versions of libcurl
  * Fixes an issue with older versions of php/libcurl where certain SDK calls that have empty POST bodies will result in a 400 Bad Request returned from the server.

## 17.4.0 - 2025-07-01
This release changes the pinned API version to `2025-06-30.basil`.

* [#1880](https://github.com/stripe/stripe-php/pull/1880) Update generated code
  * Add support for `migrate` method on resource `Subscription`
  * Add support for `collect_payment_method` and `confirm_payment_intent` methods on resource `Terminal.Reader`
  * Add support for new value `crypto` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
  * Change type of `Dispute.enhanced_eligibility_types` from `literal('visa_compelling_evidence_3')` to `enum('visa_compelling_evidence_3'|'visa_compliance')`
  * Add support for new value `terminal.reader.action_updated` on enum `Event.type`
  * Add support for `related_person` on `Identity.VerificationSession`
  * Add support for new value `crypto` on enums `Invoice.payment_settings.payment_method_types` and `Subscription.payment_settings.payment_method_types`
  * Add support for `crypto` on `PaymentMethod`
  * Add support for new value `buut` on enum `PaymentMethod.ideal.bank`
  * Add support for new value `BUUTNL2A` on enum `PaymentMethod.ideal.bic`
  * Add support for `billing_mode` on `SubscriptionSchedule` and `Subscription`
  * Add support for new values `collect_payment_method` and `confirm_payment_intent` on enum `Terminal.Reader.action.type`
  * Add support for snapshot event `TERMINAL_READER_ACTION_UPDATED` with resource `Terminal.Reader`
* [#1878](https://github.com/stripe/stripe-php/pull/1878) Update generated code
  * Add constant `CURRENT_MAJOR` in `ApiVersion`

## 17.3.0 - 2025-05-29
 This release changes the pinned API version to `2025-05-28.basil`.

* [#1871](https://github.com/stripe/stripe-php/pull/1871) Update generated code
  * Add support for `attach_payment` method on resource `Invoice`
  * Add support for `collect_inputs` method on resource `Terminal.Reader`
  * Add support for `succeed_input_collection` and `timeout_input_collection` test helper methods on resource `Terminal.Reader`
  * Add support for `refund_and_dispute_prefunding` on `Balance`
  * Add support for `balance_type` on `BalanceTransaction`
  * Add support for `post_payment_amount` and `pre_payment_amount` on `CreditNote`
  * Add support for new value `mixed` on enum `CreditNote.type`
  * Add support for new value `invoice_payment.paid` on enum `Event.type`
  * Add support for `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on `PaymentMethodConfiguration`
  * Add support for `billing_thresholds` on `SubscriptionItem` and `Subscription`
  * Add support for `metadata` on `Tax.CalculationLineItem`
  * Add support for new value `collect_inputs` on enum `Terminal.Reader.action.type`
  * Add support for new value `simulated_stripe_s700` on enum `Terminal.Reader.device_type`
  * Add support for snapshot event `INVOICE_PAYMENT_PAID` with resource `InvoicePayment`
  * Add support for error code `forwarding_api_upstream_error` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`

## 17.2.1 - 2025-05-19
* [#1869](https://github.com/stripe/stripe-php/pull/1869) Fixed type of map parameters(eg. metadata, currency_options) from `StripeObject` to `array<KType, VType>` in all methods.
* [#1866](https://github.com/stripe/stripe-php/pull/1866) Adds CONTRIBUTING.md

## 17.2.0 - 2025-04-30

  This release changes the pinned API version to `2025-04-30.basil`.

* [#1839](https://github.com/stripe/stripe-php/pull/1839) Update generated code
  * Add support for new value `tax_id_prohibited` on enums `Invoice.last_finalization_error.code`, `PaymentIntent.last_payment_error.code`, `SetupAttempt.setup_error.code`, `SetupIntent.last_setup_error.code`, and `StripeError.code`
  * Add support for `wallet_options` on `Checkout.Session`
  * Add support for `context` on `Event`
  * Add support for new values `aw_tin`, `az_tin`, `bd_bin`, `bf_ifu`, `bj_ifu`, `cm_niu`, `cv_nif`, `et_tin`, `kg_tin`, and `la_tin` on enums `Invoice.customer_tax_ids[].type` and `TaxId.type`
  * Add support for new value `affirm` on enums `Invoice.payment_settings.payment_method_types` and `Subscription.payment_settings.payment_method_types`
  * Add support for `pix` on `PaymentMethodConfiguration`
  * Add support for `klarna` on `PaymentMethodDomain`
  * Add support for `us_cfpb_data` on `Person`
  * Add support for `pending_reason` on `Refund`
  * Change type of `Tax.CalculationLineItem.reference` from `nullable(string)` to `string`
* [#1857](https://github.com/stripe/stripe-php/pull/1857) Include new PHP 8.3 and 8.4 in CI
* [#1856](https://github.com/stripe/stripe-php/pull/1856) Faster parallel runner for PHP formatter

## 17.1.1 - 2025-04-04
* [#1847](https://github.com/stripe/stripe-php/pull/1847) Remove stdClass from object shapes
  * Remove intersection with `stdClass` in resource properties and fixed `instanceof` checks.

## 17.1.0 - 2025-04-02
* [#1843](https://github.com/stripe/stripe-php/pull/1843) Add null type in resource fields to non required objects
  * Fixes nullable resource properties that were incorrectly set as required in PHPDocs

## 17.0.0 - 2025-04-01
* [#1837](https://github.com/stripe/stripe-php/pull/1837) Better type hints in your editor!!
  * Added type hints for method parameters
      * <img width="417" alt="PHPStorm IDE with array type hints" src="https://github.com/user-attachments/assets/e914dcda-354f-4df2-b82e-217ad931e71d">
  * Improved type hints for resource properties that are not primitive types. Take for example, the invoice settings in Customer resource. Previously, you could not reference inner fields like `custom_fields` on `customer->invoice_settings` without PHPStan complaining. This is now fixed.

* [#1818](https://github.com/stripe/stripe-php/pull/1818) Support for APIs in the new API version 2025-03-31.basil

  This release changes the pinned API version to `2025-03-31.basil`.

  ### ⚠️ Breaking changes due to changes in the Stripe API

  Please review details for the breaking changes and alternatives in the [Stripe API changelog](https://docs.stripe.com/changelog/basil#2025-03-31.basil) before upgrading.

  * Remove support for resources `UsageRecordSummary` and `UsageRecord`
  * Remove support for `create` method on resource `UsageRecord`
  * Remove support for `all` method on resource `UsageRecordSummary`
  * Remove support for `upcomingLines` and `upcoming` methods on resource `Invoice`
  * Remove support for `invoice` on `Charge` and `PaymentIntent`
  * Remove support for `shipping_details` on `Checkout.Session`
  * Remove support for `refund` on `CreditNote`
  * Remove support for `tax_amounts` on `CreditNoteLineItem`, `CreditNote`, and `InvoiceLineItem`
  * Remove support for `amount_excluding_tax` and `unit_amount_excluding_tax` on `CreditNoteLineItem` and `InvoiceLineItem`
  * Remove support for `application_fee_amount`, `charge`, `paid_out_of_band`, `paid`, `payment_intent`, `quote`, `subscription`, `subscription_details`, `subscription_proration_date`, `tax`, `total_tax_amounts`, and `transfer_data` on `Invoice`
  * Remove support for `discount` on `Invoice` and `Subscription`
  * Remove support for `invoice_item`, `proration_details`, `proration`, `tax_rates`, and `type` on `InvoiceLineItem`
  * Remove support for `plan`, `price`, and `subscription_item` on `InvoiceItem` and `InvoiceLineItem`
  * Remove support for `subscription`, `unit_amount_decimal`, and `unit_amount` on `InvoiceItem`
  * Remove support for `aggregate_usage` on `Plan`
  * Remove support for `billing_thresholds` on `SubscriptionItem` and `Subscription`
  * Remove support for `current_period_end` and `current_period_start` on `Subscription`

  ### ⚠️ Other Breaking changes in the SDK
  * [#1826](https://github.com/stripe/stripe-php/pull/1826) configure max_nextwork_retries at the client level
    * Allow setting `maxNetworkRetries` at the `StripeClient` level via a new argument to the `RequestOptions` constructor
        * ⚠️ (potentially breaking) a client's configuration for `maxNetworkRetries` is set during client initialization. Subsequent calls to `Stripe::setMaxNetworkRetries()` after client creation **won't** affect that client.
    * Allow setting `maxNetworkRetries` per-request via the `max_network_retries` config argument. This works for both the service and resource based patterns. In both cases, an explicitly passed value takes precedence over the global (or client) value.
  * [#1835](https://github.com/stripe/stripe-php/pull/1835) Removed the protected method _searchResource as it is no longer used
    * ⚠️ Removed `_searchResource` method and `Search` trait. Use the public `search` method on `Charge`, `Customer`, `Invoice`, `PaymentIntent`, `Price`, `Product`, and `Subscription` resource.
  * [#1832](https://github.com/stripe/stripe-php/pull/1832) Added requestCollection and requestSearchResult to StripeClientInterface
    * ⚠️ Added `requestSearchResult`, `requestCollection` to `StripeClientInterface`. Developers building custom StripeClient will now have to implement these new methods.
        * Refer to our implementation in [BaseStripeClient](https://github.com/stripe/stripe-php/blob/f65c497d0bc175aaa04538602fd49645f44f9384/lib/BaseStripeClient.php#L259-L315) for guidance.


  ### Additions

  * Add support for new resource `InvoicePayment`
  * Add support for `all` and `retrieve` methods on resource `InvoicePayment`
  * Add support for new values `forwarding_api_retryable_upstream_error` and `setup_intent_mobile_wallet_unsupported` on enums `Invoice.last_finalization_error.code`, `PaymentIntent.last_payment_error.code`, `SetupAttempt.setup_error.code`, `SetupIntent.last_setup_error.code`, and `StripeError.code`
  * Add support for new values `stripe_balance_payment_debit_reversal` and `stripe_balance_payment_debit` on enum `BalanceTransaction.type`
  * Add support for new value `last` on enum `Billing.Meter.default_aggregation.formula`
  * Add support for `presentment_details` on `Charge`, `Checkout.Session`, `PaymentIntent`, and `Refund`
  * Add support for `optional_items` on `Checkout.Session` and `PaymentLink`
  * Add support for `permissions` on `Checkout.Session`
  * Add support for new value `custom` on enum `Checkout.Session.ui_mode`
  * Add support for new values `billie`, `nz_bank_account`, and `satispay` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
  * Add support for `refunds` on `CreditNote`
  * Add support for `total_taxes` on `CreditNote` and `Invoice`
  * Add support for `taxes` on `CreditNoteLineItem` and `InvoiceLineItem`
  * Add support for `checkout_session` on `CustomerBalanceTransaction`
  * Add support for new values `checkout_session_subscription_payment_canceled` and `checkout_session_subscription_payment` on enum `CustomerBalanceTransaction.type`
  * Add support for new value `invoice.overpaid` on enum `Event.type`
  * Add support for `amount_overpaid`, `confirmation_secret`, and `payments` on `Invoice`
  * Add support for `parent` on `InvoiceItem`, `InvoiceLineItem`, and `Invoice`
  * Add support for new values `klarna` and `nz_bank_account` on enums `Invoice.payment_settings.payment_method_types` and `Subscription.payment_settings.payment_method_types`
  * Add support for `pricing` on `InvoiceItem` and `InvoiceLineItem`
  * Add support for new value `network_fallback` on enum `Issuing.Authorization.request_history[].reason`
  * Add support for new value `expired` on enum `Issuing.Authorization.status`
  * Add support for new value `expired` on enum `PaymentIntent.cancellation_reason`
  * Add support for new values `billie` and `satispay` on enum `PaymentLink.payment_method_types`
  * Add support for `billie`, `nz_bank_account`, and `satispay` on `PaymentMethodConfiguration` and `PaymentMethod`
  * Add support for new value `canceled` on enum `Review.closed_reason`
  * Add support for `current_period_end` and `current_period_start` on `SubscriptionItem`
  * Add support for `wifi` on `Terminal.Configuration`

## 16.6.0 - 2025-02-24
* [#1809](https://github.com/stripe/stripe-php/pull/1809) Update generated code
  * Add support for `priority` on `Billing.CreditGrant`
  * Add support for `collected_information` on `Checkout.Session`
* [#1816](https://github.com/stripe/stripe-php/pull/1816) add codeowners file

## 16.5.1 - 2025-02-07
* [#1811](https://github.com/stripe/stripe-php/pull/1811) Include a useful error message when a null byte is found in the URL path
* [#1810](https://github.com/stripe/stripe-php/pull/1810) Make `httpClient()` a public, static method

## 16.5.0 - 2025-01-27
* [#1804](https://github.com/stripe/stripe-php/pull/1804) Update generated code
  * Add support for `close` method on resource `Treasury.FinancialAccount`
  * Add support for `discounts` on `Checkout.Session`
  * Add support for new value `pay_by_bank` on enum `PaymentLink.payment_method_types[]`
  * Add support for `pay_by_bank` on `PaymentMethodConfiguration` and `PaymentMethod`
  * Add support for new value `pay_by_bank` on enum `PaymentMethod.type`
  * Add support for `is_default` and `nickname` on `Treasury.FinancialAccount`
* [#1805](https://github.com/stripe/stripe-php/pull/1805) Restore testCoreEventsGet generated test
* [#1807](https://github.com/stripe/stripe-php/pull/1807) minor justfile fixes
* [#1806](https://github.com/stripe/stripe-php/pull/1806) Added CONTRIBUTING.md file
* [#1802](https://github.com/stripe/stripe-php/pull/1802) ensure dependencies are installed for format and test recipes
* [#1801](https://github.com/stripe/stripe-php/pull/1801) Add justfile, remove coveralls, and fix AUTOLOAD in CI
* [#1797](https://github.com/stripe/stripe-php/pull/1797) Added pull request template

## 16.4.0 - 2024-12-18
* [#1793](https://github.com/stripe/stripe-php/pull/1793) This release changes the pinned API version to `2024-12-18.acacia`.
  * Add support for new values `payout_minimum_balance_hold` and `payout_minimum_balance_release` on enum `BalanceTransaction.type`
  * Add support for `allow_redisplay` on `Card` and `Source`
  * Add support for `regulated_status` on `Card`
  * Add support for new value `request_signature` on enum `Forwarding.Request.replacements[]`
  * Change type of `LineItem.description` from `string` to `nullable(string)`
  * Add support for new values `al_tin`, `am_tin`, `ao_tin`, `ba_tin`, `bb_tin`, `bs_tin`, `cd_nif`, `gn_nif`, `kh_tin`, `me_pib`, `mk_vat`, `mr_nif`, `np_pan`, `sn_ninea`, `sr_fin`, `tj_tin`, `ug_tin`, `zm_tin`, and `zw_tin` on enum `TaxId.type`

## 16.3.0 - 2024-11-20
* [#1786](https://github.com/stripe/stripe-php/pull/1786) This release changes the pinned API version to `2024-11-20.acacia`.
  * Add support for `respond` test helper method on resource `Issuing.Authorization`
  * Add support for `adaptive_pricing` on `Checkout.Session`
  * Add support for new value `subscribe` on enums `Checkout.Session.submit_type` and `PaymentLink.submit_type`
  * Add support for new value `financial_account_statement` on enum `File.purpose`
  * Add support for `fraud_challenges` and `verified_by_fraud_challenge` on `Issuing.Authorization`
  * Add support for `trace_id` on `Payout`
  * Add support for new value `li_vat` on enum `TaxId.type`
  * Add support for new value `service_tax` on enum `TaxRate.tax_type`
  * Change type of `Treasury.InboundTransfer.origin_payment_method` from `string` to `nullable(string)`

## 16.2.0 - 2024-10-29
* [#1772](https://github.com/stripe/stripe-php/pull/1772) This release changes the pinned API version to `2024-10-28.acacia`.
  * Add support for new resource `V2.EventDestinations`
  * Add support for `create`, `retrieve`, `update`, `list`, `delete`, `disable`, `enable` and `ping` methods on resource `V2.EventDestinations`
  * Add support for `submit_card` test helper method on resource `Issuing.Card`
  * Add support for `groups` on `Account`
  * Add support for `enhanced_eligibility_types` on `Dispute`
  * Add support for new values `issuing_transaction.purchase_details_receipt_updated` and `refund.failed` on enum `Event.type`
  * Add support for `metadata` on `Forwarding.Request`
  * Add support for new value `alma` on enum `PaymentLink.payment_method_types[]`
  * Add support for `alma` on `PaymentMethodConfiguration` and `PaymentMethod`
  * Add support for `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on `PaymentMethod`
  * Add support for new values `alma`, `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on enum `PaymentMethod.type`
  * Add support for `amazon_pay` on `PaymentMethodDomain`
  * Add support for new values `by_tin`, `ma_vat`, `md_vat`, `tz_vat`, `uz_tin`, and `uz_vat` on enum `TaxId.type`
  * Add support for `flat_amount` and `rate_type` on `TaxRate`
  * Add support for new value `retail_delivery_fee` on enum `TaxRate.tax_type`

## 16.1.1 - 2024-10-18
* [#1775](https://github.com/stripe/stripe-php/pull/1775) Deserialize into correct v2 EventData types
  * Fixes a bug where v2 EventData was not being deserialized into the appropriate type for `V1BillingMeterErrorReportTriggeredEvent` and `V1BillingMeterNoMeterFoundEvent`
* [#1776](https://github.com/stripe/stripe-php/pull/1776) update object tags for meter-related classes

  - fixes a bug where the `object` property of the `MeterEvent`, `MeterEventAdjustment`, and `MeterEventSession` didn't match the server.
* [#1773](https://github.com/stripe/stripe-php/pull/1773) Clean up examples
* [#1771](https://github.com/stripe/stripe-php/pull/1771) Renamed example file names

## 16.1.0 - 2024-10-03
* [#1765](https://github.com/stripe/stripe-php/pull/1765) Update generated code
  * Remove the support for resource `Margin` that was accidentally made public in the last release

## 16.0.0 - 2024-10-01
* [#1756](https://github.com/stripe/stripe-php/pull/1756) Support for APIs in the new API version 2024-09-30.acacia

  This release changes the pinned API version to `2024-09-30.acacia`. Please read the [API Changelog](https://docs.stripe.com/changelog/acacia#2024-09-30.acacia) and carefully review the API changes before upgrading.

  ### ⚠️ Breaking changes

  * Rename `usage_threshold_config` to `usage_threshold` on `Billing.Alert`
  * Remove support for `filter` on `Billing.Alert`. Use the filters on the `usage_threshold` instead


  ### Additions

  * Add support for new value `international_transaction` on enum `Treasury.ReceivedCredit.failure_code`
  * Add support for new Usage Billing APIs `Billing.MeterEvent`, `Billing.MeterEventAdjustments`, `Billing.MeterEventSession`, `Billing.MeterEventStream` and the new Events API `Core.Events` under the [v2 namespace ](https://docs.corp.stripe.com/api-v2-overview)
  * Add new method `parseThinEvent()` on the `StripeClient` class to parse [thin events](https://docs.corp.stripe.com/event-destinations#events-overview).
  * Add a new method [rawRequest()](https://github.com/stripe/stripe-node/tree/master?tab=readme-ov-file#custom-requests) on the `StripeClient` class that takes a HTTP method type, url and relevant parameters to make requests to the Stripe API that are not yet supported in the SDK.


## 15.10.0 - 2024-09-18
* [#1747](https://github.com/stripe/stripe-php/pull/1747) Update generated code
  * Add support for new value `international_transaction` on enum `Treasury.ReceivedDebit.failure_code`
* [#1745](https://github.com/stripe/stripe-php/pull/1745) Update generated code
  * Add support for new value `terminal_reader_invalid_location_for_activation` on enum `StripeError.code`
  * Add support for `automatically_finalizes_at` on `Invoice`

## 15.9.0 - 2024-09-12
* [#1737](https://github.com/stripe/stripe-php/pull/1737) Update generated code
  * Add support for new resource `InvoiceRenderingTemplate`
  * Add support for `all`, `archive`, `retrieve`, and `unarchive` methods on resource `InvoiceRenderingTemplate`

## 15.8.0 - 2024-08-29
* [#1742](https://github.com/stripe/stripe-php/pull/1742) Generate SDK for OpenAPI spec version 1230
  * Add support for new value `issuing_regulatory_reporting` on enum `File.purpose`
  * Add support for new value `hr_oib` on enum `TaxId.type`
  * Add support for `status_details` on `TestHelpers.TestClock`

## 15.7.0 - 2024-08-15
* [#1736](https://github.com/stripe/stripe-php/pull/1736) Update generated code


## 15.6.0 - 2024-08-08
* [#1729](https://github.com/stripe/stripe-php/pull/1729) Update generated code
  * Add support for `activate`, `all`, `archive`, `create`, `deactivate`, and `retrieve` methods on resource `Billing.Alert`
  * Add support for `retrieve` method on resource `Tax.Calculation`
  * Add support for new value `invalid_mandate_reference_prefix_format` on enum `StripeError.code`
  * Add support for `related_customer` on `Identity.VerificationSession`
  * Add support for new value `financial_addresses.aba.forwarding` on enums `Treasury.FinancialAccount.active_features[]`, `Treasury.FinancialAccount.pending_features[]`, and `Treasury.FinancialAccount.restricted_features[]`

## 15.5.0 - 2024-08-01
* [#1727](https://github.com/stripe/stripe-php/pull/1727) Update generated code
  * Add support for new resources `Billing.AlertTriggered` and `Billing.Alert`
  * Add support for new value `charge_exceeds_transaction_limit` on enum `StripeError.code`
  * Add support for new value `billing.alert.triggered` on enum `Event.type`

## 15.4.0 - 2024-07-25
* [#1726](https://github.com/stripe/stripe-php/pull/1726) Update generated code
  * Add support for `update` method on resource `Checkout.Session`
  * Add support for new values `invoice.overdue` and `invoice.will_be_due` on enum `Event.type`
  * Add support for `twint` on `PaymentMethodConfiguration`

## 15.3.0 - 2024-07-18
* [#1724](https://github.com/stripe/stripe-php/pull/1724) Update generated code
  * Add support for new value `issuing_dispute.funds_rescinded` on enum `Event.type`
  * Add support for new value `stripe_s700` on enum `Terminal.Reader.device_type`
* [#1722](https://github.com/stripe/stripe-php/pull/1722) Update changelog

## 15.2.0 - 2024-07-11
* [#1721](https://github.com/stripe/stripe-php/pull/1721) Update generated code
    * ⚠️ Remove support for values `billing_policy_remote_function_response_invalid`, `billing_policy_remote_function_timeout`, `billing_policy_remote_function_unexpected_status_code`, and `billing_policy_remote_function_unreachable` from enum `StripeError.code`.
    * ⚠️ Remove support for value `payment_intent_fx_quote_invalid` from enum `StripeError.code`. The was mistakenly released last week.
    * Add support for `payment_method_options` on `ConfirmationToken`

## 15.1.0 - 2024-07-05
* [#1718](https://github.com/stripe/stripe-php/pull/1718) Update generated code
  * Add support for `add_lines`, `remove_lines`, and `update_lines` methods on resource `Invoice`
  * Add support for new value `payment_intent_fx_quote_invalid` on enum `StripeError.code`
  * Add support for new values `multibanco`, `twint`, and `zip` on enum `PaymentLink.payment_method_types[]`
  * Add support for `posted_at` on `Tax.Transaction`
  * Add support for `reboot_window` on `Terminal.Configuration`

## 15.0.0 - 2024-06-24
* [#1714](https://github.com/stripe/stripe-php/pull/1714)

  This release changes the pinned API version to 2024-06-20. Please read the [API Changelog](https://docs.stripe.com/changelog/2024-06-20) and carefully review the API changes before upgrading.

  ### ⚠️ Breaking changes

    * Remove the unused resource `PlatformTaxFee`
    * Remove the protected method `_searchResource` on resources Charge, Customer, Invoice, PaymentIntent, Price, Product, and Subscription as it is no longer used.

  ### Additions

  * Add support for `finalize_amount` test helper method on resource `Issuing.Authorization`
  * Add support for `fleet` and `fuel` on `Issuing.Authorization`
  * Add support for new value `ch_uid` on enum `TaxId.type`

## 14.10.0 - 2024-06-13
* [#1706](https://github.com/stripe/stripe-php/pull/1706) Update generated code
  * Add support for `multibanco` on `PaymentMethodConfiguration` and `PaymentMethod`
  * Add support for `twint` on `PaymentMethod`
  * Add support for new values `multibanco` and `twint` on enum `PaymentMethod.type`
  * Add support for `invoice_settings` on `Subscription`
  * Add support for new value `de_stn` on enum `TaxId.type`

## 14.9.0 - 2024-05-30
* [#1702](https://github.com/stripe/stripe-php/pull/1702) Update generated code
  * Add support for new values `issuing_personalization_design.activated`, `issuing_personalization_design.deactivated`, `issuing_personalization_design.rejected`, and `issuing_personalization_design.updated` on enum `Event.type`
* [#1701](https://github.com/stripe/stripe-php/pull/1701) Added PHPDocs for `create`, `update`, `delete`, `all`, `retrieve` methods after moving them out of traits.
* [#1700](https://github.com/stripe/stripe-php/pull/1700) Add optional appInfo to StripeClient config
  * `StripeClient` can now accept `$appInfo` as a `$config` option, so AppInfo can be set per-client. If not passed in, will fall back on the global AppInfo set by `Stripe::setAppInfo()`.
    * The config expects `$appInfo` to be of type `array{name: string, version?: string, url?: string, partner_id?: string}`

## 14.8.0 - 2024-05-23
* [#1698](https://github.com/stripe/stripe-php/pull/1698) Update generated code
  * Add support for new value `terminal_reader_invalid_location_for_payment` on enum `StripeError.code`
* [#1697](https://github.com/stripe/stripe-php/pull/1697) Rename section for object type generation

## 14.7.0 - 2024-05-16
* [#1694](https://github.com/stripe/stripe-php/pull/1694) Update generated code
  * Add support for `fee_source` on `ApplicationFee`
  * Add support for `loss_reason` on `Issuing.Dispute`
  * Add support for `application_fee_amount` and `application_fee` on `Payout`
  * Add support for `stripe_s700` on `Terminal.Configuration`

## 14.6.0 - 2024-05-09
* [#1692](https://github.com/stripe/stripe-php/pull/1692) Update generated code
  * Add support for `update` test helper method on resources `Treasury.OutboundPayment` and `Treasury.OutboundTransfer`
  * Add support for new values `treasury.outbound_payment.tracking_details_updated` and `treasury.outbound_transfer.tracking_details_updated` on enum `Event.type`
  * Add support for `allow_redisplay` on `PaymentMethod`
  * Add support for `tracking_details` on `Treasury.OutboundPayment` and `Treasury.OutboundTransfer`

## 14.5.0 - 2024-05-02
* [#1688](https://github.com/stripe/stripe-php/pull/1688) Update generated code
  * Add support for new value `shipping_address_invalid` on enum `StripeError.code`
  * Add support for `ship_from_details` on `Tax.Calculation` and `Tax.Transaction`

## 14.4.0 - 2024-04-25
* [#1684](https://github.com/stripe/stripe-php/pull/1684) Update generated code
  * Change type of `Entitlements.ActiveEntitlement.feature` from `string` to `expandable($Entitlements.Feature)`
  * Add support for `mobilepay` on `PaymentMethodConfiguration`

## 14.3.0 - 2024-04-18
* [#1681](https://github.com/stripe/stripe-php/pull/1681) Update generated code
  * Add support for `create_preview` method on resource `Invoice`
  * Add support for `saved_payment_method_options` on `Checkout.Session`
* [#1682](https://github.com/stripe/stripe-php/pull/1682) Added @throws to autoPagingIterator. Fixes [#1678](https://github.com/stripe/stripe-php/issues/1678)

## 14.2.0 - 2024-04-16
* [#1680](https://github.com/stripe/stripe-php/pull/1680) Update generated code
  * Add support for new resource `Entitlements.ActiveEntitlementSummary`
  * Add support for new value `entitlements.active_entitlement_summary.updated` on enum `Event.type`
  * Remove support for `config` on `Forwarding.Request`. This field is no longer used by the Forwarding Request API.
  * Add support for `swish` on `PaymentMethodConfiguration`

## 14.1.0 - 2024-04-11
* [#1677](https://github.com/stripe/stripe-php/pull/1677) Update generated code
  * Add support for new values `billing_policy_remote_function_response_invalid`, `billing_policy_remote_function_timeout`, `billing_policy_remote_function_unexpected_status_code`, and `billing_policy_remote_function_unreachable` on enum `StripeError.code`
  * Change type of `Billing.MeterEventAdjustment.cancel` from `BillingMeterResourceBillingMeterEventAdjustmentCancel` to `nullable(BillingMeterResourceBillingMeterEventAdjustmentCancel)`
  * Add support for `amazon_pay` on `PaymentMethodConfiguration` and `PaymentMethod`
  * Add support for new value `amazon_pay` on enum `PaymentMethod.type`
  * Add support for new values `bh_vat`, `kz_bin`, `ng_tin`, and `om_vat` on enum `TaxId.type`

## 14.0.0 - 2024-04-10
* [#1673](https://github.com/stripe/stripe-php/pull/1673)

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

## 13.18.0 - 2024-04-09
* [#1675](https://github.com/stripe/stripe-php/pull/1675) Update generated code
  * Add support for new resources `Entitlements.ActiveEntitlement` and `Entitlements.Feature`
  * Add support for `all` and `retrieve` methods on resource `ActiveEntitlement`
  * Add support for `all`, `create`, `retrieve`, and `update` methods on resource `Feature`
  * Add support for new value `none` on enum `Account.type`
  * Add support for `cancel`, `event_name`, and `type` on `Billing.MeterEventAdjustment`

## 13.17.0 - 2024-04-04
* [#1670](https://github.com/stripe/stripe-php/pull/1670) Update generated code
  * Add support for `subscription_item` on `Discount`
  * Add support for `email` and `phone` on `Identity.VerificationReport`
  * Add support for `verification_flow` on `Identity.VerificationReport` and `Identity.VerificationSession`
  * Add support for new value `verification_flow` on enums `Identity.VerificationReport.type` and `Identity.VerificationSession.type`
  * Add support for `provided_details` on `Identity.VerificationSession`
  * Change type of `Invoice.discounts` from `nullable(array(expandable(deletable($Discount))))` to `array(expandable(deletable($Discount)))`
  * Add support for `zip` on `PaymentMethodConfiguration`
  * Add support for `discounts` on `SubscriptionItem` and `Subscription`
  * Add support for new value `mobile_phone_reader` on enum `Terminal.Reader.device_type`

## 13.16.0 - 2024-03-28
* [#1666](https://github.com/stripe/stripe-php/pull/1666) Update generated code
  * Add support for new resources `Billing.MeterEventAdjustment`, `Billing.MeterEvent`, and `Billing.Meter`
  * Add support for `all`, `create`, `deactivate`, `reactivate`, `retrieve`, and `update` methods on resource `Meter`
  * Add support for `create` method on resources `MeterEventAdjustment` and `MeterEvent`
  * Add support for `meter` on `Plan`

## 13.15.0 - 2024-03-21
* [#1664](https://github.com/stripe/stripe-php/pull/1664) Update generated code
  * Add support for new resources `ConfirmationToken` and `Forwarding.Request`
  * Add support for `retrieve` method on resource `ConfirmationToken`
  * Add support for `all`, `create`, and `retrieve` methods on resource `Request`
  * Add support for new values `forwarding_api_inactive`, `forwarding_api_invalid_parameter`, `forwarding_api_upstream_connection_error`, and `forwarding_api_upstream_connection_timeout` on enum `StripeError.code`
  * Add support for `mobilepay` on `PaymentMethod`
  * Add support for new value `mobilepay` on enum `PaymentMethod.type`
  * Add support for `name` on `Terminal.Configuration`

## 13.14.0 - 2024-03-14
* [#1660](https://github.com/stripe/stripe-php/pull/1660) Update generated code
  * Add support for new resources `Issuing.PersonalizationDesign` and `Issuing.PhysicalBundle`
  * Add support for `all`, `create`, `retrieve`, and `update` methods on resource `PersonalizationDesign`
  * Add support for `all` and `retrieve` methods on resource `PhysicalBundle`
  * Add support for `personalization_design` on `Issuing.Card`

## 13.13.0 - 2024-02-29
* [#1654](https://github.com/stripe/stripe-php/pull/1654) Update generated code
  * Change type of `Identity.VerificationSession.type` from `nullable(enum('document'|'id_number'))` to `enum('document'|'id_number')`
  * Add resources `Application`, `ConnectCollectionTransfer`, `PlatformTaxFee`, `ReserveTransaction`, `SourceMandateNotification`, and `TaxDeductedAtSource`. These classes have no methods on them, and are used to provide more complete types for PHPDocs.
* [#1657](https://github.com/stripe/stripe-php/pull/1657) Update readme to use addBetaVersion

## 13.12.0 - 2024-02-22
* [#1651](https://github.com/stripe/stripe-php/pull/1651) Update generated code
  * Add support for `client_reference_id` on `Identity.VerificationReport` and `Identity.VerificationSession`
  * Remove support for value `service_tax` from enum `TaxRate.tax_type`
* [#1650](https://github.com/stripe/stripe-php/pull/1650) Add TaxIds API
  * Add support for `all`, `create`, `delete`, and `retrieve` methods on resource `TaxId`
  * The `instanceUrl` function on `TaxId` now returns the top-level `/v1/tax_ids/{id}` path instead of the `/v1/customers/{customer}/tax_ids/{id}` path.

## 13.11.0 - 2024-02-15
* [#1639](https://github.com/stripe/stripe-php/pull/1639) Update generated code
  * Add support for `networks` on `Card`
  * Add support for new value `financial_connections.account.refreshed_ownership` on enum `Event.type`
* [#1648](https://github.com/stripe/stripe-php/pull/1648) Remove broken methods on CustomerCashBalanceTransaction
  * Bugfix: remove support for `CustomerCashBalanceTransaction::all` and `CustomerCashBalanceTransaction::retrieve`. These methods were included in the library unintentionally and never functioned.
* [#1647](https://github.com/stripe/stripe-php/pull/1647) Fix \Stripe\Tax\Settings::update
* [#1646](https://github.com/stripe/stripe-php/pull/1646) Add more specific PHPDoc and Psalm type for RequestOptions arrays on services

## 13.10.0 - 2024-02-01
* [#1636](https://github.com/stripe/stripe-php/pull/1636) Update generated code
  * Add support for new value `swish` on enum `PaymentLink.payment_method_types[]`
  * Add support for `swish` on `PaymentMethod`
  * Add support for new value `swish` on enum `PaymentMethod.type`
  * Add support for `jurisdiction_level` on `TaxRate`
  * Change type of `Terminal.Reader.status` from `string` to `enum('offline'|'online')`
* [#1633](https://github.com/stripe/stripe-php/pull/1633) Update generated code
  * Add support for `issuer` on `Invoice`
  * Add support for `customer_balance` on `PaymentMethodConfiguration`
* [#1630](https://github.com/stripe/stripe-php/pull/1630) Add paginated requests helper function and use in Search and All

## 13.9.0 - 2024-01-12
* [#1629](https://github.com/stripe/stripe-php/pull/1629) Update generated code
  * Add support for new resource `CustomerSession`
  * Add support for `create` method on resource `CustomerSession`
  * Remove support for values `obligation_inbound`, `obligation_payout_failure`, `obligation_payout`, and `obligation_reversal_outbound` from enum `BalanceTransaction.type`
  * Add support for `billing_cycle_anchor_config` on `Subscription`

## 13.8.0 - 2024-01-04
* [#1627](https://github.com/stripe/stripe-php/pull/1627) Update generated code
  * Add support for `retrieve` method on resource `Tax.Registration`

## 13.7.0 - 2023-12-22
* [#1621](https://github.com/stripe/stripe-php/pull/1621) Update generated code
  * Add support for new resource `FinancialConnections.Transaction`
  * Add support for `all` and `retrieve` methods on resource `Transaction`
  * Add support for `subscribe` and `unsubscribe` methods on resource `FinancialConnections.Account`
  * Add support for new value `financial_connections.account.refreshed_transactions` on enum `Event.type`
  * Add support for `subscriptions` and `transaction_refresh` on `FinancialConnections.Account`
  * Add support for new value `transactions` on enum `FinancialConnections.Session.prefetch[]`
  * Add support for `revolut_pay` on `PaymentMethodConfiguration`
  * Remove support for `id_bank_transfer`, `multibanco`, `netbanking`, `pay_by_bank`, and `upi` on `PaymentMethodConfiguration`
  * Change type of `Quote.invoice_settings` from `nullable(InvoiceSettingQuoteSetting)` to `InvoiceSettingQuoteSetting`
  * Add support for `destination_details` on `Refund`

## 13.6.0 - 2023-12-07
* [#1613](https://github.com/stripe/stripe-php/pull/1613) Update generated code
  * Add support for new values `customer_tax_location_invalid` and `financial_connections_no_successful_transaction_refresh` on enum `StripeError.code`
  * Add support for new values `payment_network_reserve_hold` and `payment_network_reserve_release` on enum `BalanceTransaction.type`
  * Remove support for value `various` from enum `Climate.Supplier.removal_pathway`
  * Add support for `inactive_message` and `restrictions` on `PaymentLink`
* [#1612](https://github.com/stripe/stripe-php/pull/1612) Report usage of .save and StripeClient
  * Reports uses of the deprecated `.save` and of `StripeClient` in `X-Stripe-Client-Telemetry`. (You can disable telemetry via `\Stripe\Stripe::setEnableTelemetry(false);`, see the [README](https://github.com/stripe/stripe-php/blob/master/README.md#telemetry).)

## 13.5.0 - 2023-11-30
* [#1611](https://github.com/stripe/stripe-php/pull/1611) Update generated code
  * Add support for new resources `Climate.Order`, `Climate.Product`, and `Climate.Supplier`
  * Add support for `all`, `cancel`, `create`, `retrieve`, and `update` methods on resource `Order`
  * Add support for `all` and `retrieve` methods on resources `Product` and `Supplier`
  * Add support for new value `financial_connections_account_inactive` on enum `StripeError.code`
  * Add support for new values `climate_order_purchase` and `climate_order_refund` on enum `BalanceTransaction.type`
  * Add support for new values `climate.order.canceled`, `climate.order.created`, `climate.order.delayed`, `climate.order.delivered`, `climate.order.product_substituted`, `climate.product.created`, and `climate.product.pricing_updated` on enum `Event.type`

## 13.4.0 - 2023-11-21
* [#1608](https://github.com/stripe/stripe-php/pull/1608) Update generated code
  Add support for `transferred_to_balance` to `CustomerCashBalanceTransaction`
* [#1605](https://github.com/stripe/stripe-php/pull/1605) Update generated code
  * Add support for `network_data` on `Issuing.Transaction`

## 13.3.0 - 2023-11-09
* [#1603](https://github.com/stripe/stripe-php/pull/1603) Update generated code
  * Add support for new value `terminal_reader_hardware_fault` on enum `StripeError.code`

## 13.2.1 - 2023-11-06
* [#1602](https://github.com/stripe/stripe-php/pull/1602) Fix error when "id" is not a string.

## 13.2.0 - 2023-11-02
* [#1599](https://github.com/stripe/stripe-php/pull/1599) Update generated code
  * Add support for new resource `Tax.Registration`
  * Add support for `all`, `create`, and `update` methods on resource `Registration`
  * Add support for new value `token_card_network_invalid` on enum `StripeError.code`
  * Add support for new value `payment_unreconciled` on enum `BalanceTransaction.type`
  * Add support for `revolut_pay` on `PaymentMethod`
  * Add support for new value `revolut_pay` on enum `PaymentMethod.type`

## 13.1.0 - 2023-10-26
* [#1595](https://github.com/stripe/stripe-php/pull/1595) Update generated code
  * Add support for new value `balance_invalid_parameter` on enum `StripeError.code`

## 13.0.0 - 2023-10-16
* This release changes the pinned API version to `2023-10-16`. Please read the [API Changelog](https://docs.stripe.com/changelog/2023-10-16) and carefully review the API changes before upgrading `stripe-php` package.
* [#1593](https://github.com/stripe/stripe-php/pull/1593) Update generated code
  - Added `additional_tos_acceptances` field on `Person`

## 12.8.0 - 2023-10-16
* [#1590](https://github.com/stripe/stripe-php/pull/1590) Update generated code
  * Add support for new values `issuing_token.created` and `issuing_token.updated` on enum `Event.type`

## 12.7.0 - 2023-10-11
* [#1589](https://github.com/stripe/stripe-php/pull/1589) Update generated code
  * Add support for `client_secret`, `redirect_on_completion`, `return_url`, and `ui_mode` on `Checkout.Session`
  * Add support for `offline` on `Terminal.Configuration`

## 12.6.0 - 2023-10-05
* [#1586](https://github.com/stripe/stripe-php/pull/1586) Update generated code
  * Add support for new resource `Issuing.Token`
  * Add support for `all`, `retrieve`, and `update` methods on resource `Token`
  * Add support for `token` on `Issuing.Authorization` and `Issuing.Transaction`
* [#1569](https://github.com/stripe/stripe-php/pull/1569) Fix: Do not bother removing `friendsofphp/php-cs-fixer`

## 12.5.0 - 2023-09-28
* [#1582](https://github.com/stripe/stripe-php/pull/1582) Generate Discount, SourceTransaction and use sections in more places
* [#1584](https://github.com/stripe/stripe-php/pull/1584) Update generated code
  * Add support for `rendering` on `Invoice`

## 12.4.0 - 2023-09-21
* [#1579](https://github.com/stripe/stripe-php/pull/1579) Update generated code
  * Add back constant for `invoiceitem.updated` webhook event.  This was mistakenly removed in v12.2.0.
* [#1566](https://github.com/stripe/stripe-php/pull/1566) Fix: Remove `squizlabs/php_codesniffer`
* [#1568](https://github.com/stripe/stripe-php/pull/1568) Enhancement: Reference `phpunit.xsd` as installed with `composer`
* [#1565](https://github.com/stripe/stripe-php/pull/1565) Enhancement: Use PHP 8.2 as leading PHP version

## 12.3.0 - 2023-09-14
* [#1577](https://github.com/stripe/stripe-php/pull/1577) Update generated code
  * Add support for new resource `PaymentMethodConfiguration`
  * Add support for `all`, `create`, `retrieve`, and `update` methods on resource `PaymentMethodConfiguration`
  * Add support for `payment_method_configuration_details` on `Checkout.Session`, `PaymentIntent`, and `SetupIntent`
* [#1573](https://github.com/stripe/stripe-php/pull/1573) Update generated code
  * Add support for `capture`, `create`, `expire`, `increment`, and `reverse` test helper methods on resource `Issuing.Authorization`
  * Add support for `create_force_capture`, `create_unlinked_refund`, and `refund` test helper methods on resource `Issuing.Transaction`
  * Add support for new value `stripe_tax_inactive` on enum `StripeError.code`

## 12.2.0 - 2023-09-07
* [#1571](https://github.com/stripe/stripe-php/pull/1571) Update generated code
  * Add support for new resource `PaymentMethodDomain`
  * Add support for `all`, `create`, `retrieve`, `update`, and `validate` methods on resource `PaymentMethodDomain`
  * Add support for new values `treasury.credit_reversal.created`, `treasury.credit_reversal.posted`, `treasury.debit_reversal.completed`, `treasury.debit_reversal.created`, `treasury.debit_reversal.initial_credit_granted`, `treasury.financial_account.closed`, `treasury.financial_account.created`, `treasury.financial_account.features_status_updated`, `treasury.inbound_transfer.canceled`, `treasury.inbound_transfer.created`, `treasury.inbound_transfer.failed`, `treasury.inbound_transfer.succeeded`, `treasury.outbound_payment.canceled`, `treasury.outbound_payment.created`, `treasury.outbound_payment.expected_arrival_date_updated`, `treasury.outbound_payment.failed`, `treasury.outbound_payment.posted`, `treasury.outbound_payment.returned`, `treasury.outbound_transfer.canceled`, `treasury.outbound_transfer.created`, `treasury.outbound_transfer.expected_arrival_date_updated`, `treasury.outbound_transfer.failed`, `treasury.outbound_transfer.posted`, `treasury.outbound_transfer.returned`, `treasury.received_credit.created`, `treasury.received_credit.failed`, `treasury.received_credit.succeeded`, and `treasury.received_debit.created` on enum `Event.type`
  * Remove support for value `invoiceitem.updated` from enum `Event.type`
  * Add support for `features` on `Product`

## 12.1.0 - 2023-08-31
* [#1560](https://github.com/stripe/stripe-php/pull/1560) Update generated code
  * Add support for new resource `AccountSession`
  * Add support for `create` method on resource `AccountSession`
  * Add support for new values `obligation_inbound`, `obligation_outbound`, `obligation_payout_failure`, `obligation_payout`, `obligation_reversal_inbound`, and `obligation_reversal_outbound` on enum `BalanceTransaction.type`
  * Change type of `Event.type` from `string` to `enum`
  * Add support for `application` on `PaymentLink`
* [#1562](https://github.com/stripe/stripe-php/pull/1562) Nicer ApiErrorException::__toString()
* [#1558](https://github.com/stripe/stripe-php/pull/1558) Update generated code
  * Add support for `payment_method_details` on `Dispute`
  * Add support for `prefetch` on `FinancialConnections.Session`

## 12.0.0 - 2023-08-18
**⚠️ ACTION REQUIRED: the breaking change in this release likely affects you ⚠️**

### Version pinning

In this release, Stripe API Version `2023-08-16` (the latest at time of release) will be sent by default on all requests. This is a significant change with wide ramifications. The API version affects the properties you see on responses, the parameters you are allowed to send on requests, and so on. The previous default was to use your [Stripe account's default API version](https://stripe.com/docs/development/dashboard/request-logs#view-your-default-api-version).

To successfully upgrade to stripe-php v12, you must either

1. **(Recommended) Upgrade your integration to be compatible with API Version `2023-08-16`.**

   Please read the API Changelog carefully for each API Version from `2023-08-16` back to your [Stripe account's default API version](https://stripe.com/docs/development/dashboard/request-logs#view-your-default-api-version). Determine if you are using any of the APIs that have changed in a breaking way, and adjust your integration accordingly. Carefully test your changes with Stripe [Test Mode](https://stripe.com/docs/keys#test-live-modes) before deploying them to production.

   You can read the [v12 migration guide](https://github.com/stripe/stripe-php/wiki/Migration-guide-for-v12) for more detailed instructions.
2. **(Alternative option) Specify a version other than `2023-08-16` when initializing `stripe-php`.**

     If you were previously initializing stripe-php without an explicit API Version, you can postpone modifying your integration by specifying a version equal to your [Stripe account's default API version](https://stripe.com/docs/development/dashboard/request-logs#view-your-default-api-version). For example:

     ```diff
       // if using StripeClient
     - $stripe = new \Stripe\StripeClient('sk_test_xyz');
     + $stripe = new \Stripe\StripeClient([
     +   'api_key' => 'sk_test_xyz',
         'stripe_version' => '2020-08-27',
     + ]);

       // if using the global client
       Stripe.apiKey = "sk_test_xyz";
     + Stripe::setApiVersion('2020-08-27');
     ```

     If you were already initializing stripe-php with an explicit API Version, upgrading to v12 will not affect your integration.

     Read the [v12 migration guide](https://github.com/stripe/stripe-php/wiki/Migration-guide-for-v12) for more details.

    Going forward, each major release of this library will be *pinned* by default to the latest Stripe API Version at the time of release.

    That is, instead of upgrading stripe-php and separately upgrading your Stripe API Version through the Stripe Dashboard, whenever you upgrade major versions of stripe-php, you should also upgrade your integration to be compatible with the latest Stripe API version.

### Other changes
" ⚠️" symbol highlights breaking changes.
* [#1553](https://github.com/stripe/stripe-php/pull/1553)⚠️ Remove deprecated enum value `Invoice.STATUS_DELETE`

* [#1550](https://github.com/stripe/stripe-php/pull/1550) PHPDoc changes
  * Remove support for `alternate_statement_descriptors`, `destination`, and `dispute` on `Charge`
  * Remove support for value `charge_refunded` from enum `Dispute.status`
  * Remove support for `rendering` on `Invoice`
  * Remove support for `attributes`, `caption`, and `deactivate_on` on `Product`

## 11.0.0 - 2023-08-16
Please do not use stripe-php v11. It did not correctly apply the [pinning behavior](https://github.com/stripe/stripe-php/blob/master/CHANGELOG.md#version-pinning) and was removed from packagist

## 10.21.0 - 2023-08-10
* [#1546](https://github.com/stripe/stripe-php/pull/1546) Update generated code
  * Add support for new value `payment_reversal` on enum `BalanceTransaction.type`
  * Add support for new value `adjusted_for_overdraft` on enum `CustomerBalanceTransaction.type`

## 10.20.0 - 2023-08-03
* [#1539](https://github.com/stripe/stripe-php/pull/1539) Update generated code
  * Add support for `subscription_details` on `Invoice`
  * Add support for new values `sepa_debit_fingerprint` and `us_bank_account_fingerprint` on enum `Radar.ValueList.item_type`

## 10.19.0 - 2023-07-27
* [#1534](https://github.com/stripe/stripe-php/pull/1534) Update generated code
  * Improve PHPDoc type for `ApplicationFee.refunds`
  * Add support for `deleted` on `Apps.Secret`
* [#1526](https://github.com/stripe/stripe-php/pull/1526) Add constants for payment intent cancellation reasons
* [#1533](https://github.com/stripe/stripe-php/pull/1533) Update generated code
  * Add support for new value `service_tax` on enum `TaxRate.tax_type`
* [#1487](https://github.com/stripe/stripe-php/pull/1487) PHPDoc: use union of literals for $method parameter throughout

## 10.18.0 - 2023-07-20
* [#1533](https://github.com/stripe/stripe-php/pull/1533) Update generated code
  * Add support for new value `service_tax` on enum `TaxRate.tax_type`
* [#1526](https://github.com/stripe/stripe-php/pull/1526) Add constants for payment intent cancellation reasons
* [#1487](https://github.com/stripe/stripe-php/pull/1487) PHPDoc: use union of literals for $method parameter throughout

## 10.17.0 - 2023-07-13
* [#1525](https://github.com/stripe/stripe-php/pull/1525) Update generated code
  * Add support for new resource `Tax.Settings`
  * Add support for `retrieve` and `update` methods on resource `Settings`
  * Add support for new value `invalid_tax_location` on enum `StripeError.code`
  * Add support for `product` on `Tax.TransactionLineItem`
  * Add constant for `tax.settings.updated` webhook event
* [#1520](https://github.com/stripe/stripe-php/pull/1520) Update generated code
  * Release specs are identical.

## 10.16.0 - 2023-06-29
* [#1517](https://github.com/stripe/stripe-php/pull/1517) Update generated code
  * Add support for new value `application_fees_not_allowed` on enum `StripeError.code`
  * Add support for `effective_at` on `CreditNote` and `Invoice`
  * Add support for `on_behalf_of` on `Mandate`
* [#1514](https://github.com/stripe/stripe-php/pull/1514) Update generated code
  * Release specs are identical.
* [#1512](https://github.com/stripe/stripe-php/pull/1512) Update generated code
  * Change type of `Checkout.Session.success_url` from `string` to `nullable(string)`

## 10.15.0 - 2023-06-08
* [#1506](https://github.com/stripe/stripe-php/pull/1506) Update generated code
  * Add support for `preferred_locales` on `Issuing.Cardholder`

## 10.14.0 - 2023-05-25
* [#1503](https://github.com/stripe/stripe-php/pull/1503) Update generated code
  * Add support for `zip` on `PaymentMethod`
  * Add support for new value `zip` on enum `PaymentMethod.type`
* [#1502](https://github.com/stripe/stripe-php/pull/1502) Generate error codes
* [#1501](https://github.com/stripe/stripe-php/pull/1501) Update generated code

* [#1499](https://github.com/stripe/stripe-php/pull/1499) Update generated code
  * Add support for new values `amusement_tax` and `communications_tax` on enum `TaxRate.tax_type`

## 10.13.0 - 2023-05-11
* [#1490](https://github.com/stripe/stripe-php/pull/1490) Update generated code
  * Add support for `paypal` on `PaymentMethod`
  * Add support for `effective_percentage` on `TaxRate`
* [#1488](https://github.com/stripe/stripe-php/pull/1488) Increment PHPStan to strictness level 2
* [#1483](https://github.com/stripe/stripe-php/pull/1483) Update generated code

* [#1480](https://github.com/stripe/stripe-php/pull/1480) Update generated code
  * Change type of `Identity.VerificationSession.options` from `VerificationSessionOptions` to `nullable(VerificationSessionOptions)`
  * Change type of `Identity.VerificationSession.type` from `enum('document'|'id_number')` to `nullable(enum('document'|'id_number'))`
* [#1478](https://github.com/stripe/stripe-php/pull/1478) Update generated code
  * Release specs are identical.
* [#1475](https://github.com/stripe/stripe-php/pull/1475) Update generated code


## 10.12.1 - 2023-04-04
* [#1473](https://github.com/stripe/stripe-php/pull/1473) Update generated code
  * Add back `deleted` from `Invoice.status`.

## 10.12.0 - 2023-03-30
* [#1470](https://github.com/stripe/stripe-php/pull/1470) Update generated code
  * Remove support for `create` method on resource `Tax.Transaction`
    * This is not a breaking change, as this method was deprecated before the Tax Transactions API was released in favor of the `createFromCalculation` method.
  * Remove support for value `deleted` from enum `Invoice.status`
    * This is not a breaking change, as the value was never returned or accepted as input.
* [#1468](https://github.com/stripe/stripe-php/pull/1468) Trigger workflow for tags
* [#1467](https://github.com/stripe/stripe-php/pull/1467) Update generated code (new)
  * Release specs are identical.

## 10.11.0 - 2023-03-23
* [#1458](https://github.com/stripe/stripe-php/pull/1458) Update generated code
  * Add support for new resources `Tax.CalculationLineItem`, `Tax.Calculation`, `Tax.TransactionLineItem`, and `Tax.Transaction`
  * Add support for `create` and `list_line_items` methods on resource `Calculation`
  * Add support for `create_from_calculation`, `create_reversal`, `create`, `list_line_items`, and `retrieve` methods on resource `Transaction`
  * Add support for `currency_conversion` on `Checkout.Session`
  * Add support for new value `automatic_async` on enum `PaymentIntent.capture_method`
  * Add support for new value `link` on enum `PaymentLink.payment_method_types[]`
  * Add support for `automatic_payment_methods` on `SetupIntent`

## 10.10.0 - 2023-03-16
* [#1457](https://github.com/stripe/stripe-php/pull/1457) API Updates
  * Add support for `future_requirements` and `requirements` on `BankAccount`
  * Add support for new value `automatic_async` on enum `PaymentIntent.capture_method`
  * Add support for new value `cashapp` on enum `PaymentLink.payment_method_types[]`
  * Add support for `cashapp` on `PaymentMethod`
  * Add support for new value `cashapp` on enum `PaymentMethod.type`
* [#1454](https://github.com/stripe/stripe-php/pull/1454) Update generated code (new)
  * Add support for new value `cashapp` on enum `PaymentLink.payment_method_types[]`
  * Add support for `cashapp` on `PaymentMethod`
  * Add support for new value `cashapp` on enum `PaymentMethod.type`

## 10.9.1 - 2023-03-14
* [#1453](https://github.com/stripe/stripe-php/pull/1453) Restore StripeClient.getService

## 10.9.0 - 2023-03-09
* [#1450](https://github.com/stripe/stripe-php/pull/1450) API Updates
  * Add support for `cancellation_details` on `Subscription`
  * Fix return types on custom methods (extends https://github.com/stripe/stripe-php/pull/1446)

* [#1446](https://github.com/stripe/stripe-php/pull/1446) stripe->customers->retrievePaymentMethod returns the wrong class (type hint)

## 10.8.0 - 2023-03-02
* [#1447](https://github.com/stripe/stripe-php/pull/1447) API Updates
  * Add support for `reconciliation_status` on `Payout`
  * Add support for new value `lease_tax` on enum `TaxRate.tax_type`

## 10.7.0 - 2023-02-23
* [#1444](https://github.com/stripe/stripe-php/pull/1444) API Updates
  * Add support for new value `igst` on enum `TaxRate.tax_type`

## 10.6.1 - 2023-02-21
* [#1443](https://github.com/stripe/stripe-php/pull/1443) Remove init.php from the list of ignored files

## 10.6.0 - 2023-02-16
* [#1441](https://github.com/stripe/stripe-php/pull/1441) API Updates
  * Add support for `refund_payment` method on resource `Terminal.Reader`
  * Add support for `custom_fields` on `Checkout.Session` and `PaymentLink`
* [#1236](https://github.com/stripe/stripe-php/pull/1236) subscription_proration_date not always presented in Invoice
* [#1431](https://github.com/stripe/stripe-php/pull/1431) Fix: Do not use unbounded version constraint for `actions/checkout`
* [#1436](https://github.com/stripe/stripe-php/pull/1436) Enhancement: Enable and configure `visibility_required` fixer
* [#1432](https://github.com/stripe/stripe-php/pull/1432) Enhancement: Update `actions/cache`
* [#1434](https://github.com/stripe/stripe-php/pull/1434) Fix: Remove parentheses
* [#1433](https://github.com/stripe/stripe-php/pull/1433) Enhancement: Run tests on PHP 8.2
* [#1438](https://github.com/stripe/stripe-php/pull/1438) Update .gitattributes

## 10.5.0 - 2023-02-02
* [#1439](https://github.com/stripe/stripe-php/pull/1439) API Updates
  * Add support for `resume` method on resource `Subscription`
  * Add support for `amount_shipping` and `shipping_cost` on `CreditNote` and `Invoice`
  * Add support for `shipping_details` on `Invoice`
  * Add support for `invoice_creation` on `PaymentLink`
  * Add support for `trial_settings` on `Subscription`
  * Add support for new value `paused` on enum `Subscription.status`

## 10.4.0 - 2023-01-19
* [#1381](https://github.com/stripe/stripe-php/pull/1381) Add getService methods to StripeClient and AbstractServiceFactory to allow mocking
* [#1424](https://github.com/stripe/stripe-php/pull/1424) API Updates

  * Added `REFUND_CREATED`, `REFUND_UPDATED` event definitions.
* [#1426](https://github.com/stripe/stripe-php/pull/1426) Ignore PHP version for formatting
* [#1425](https://github.com/stripe/stripe-php/pull/1425) Fix Stripe::setAccountId parameter type
* [#1418](https://github.com/stripe/stripe-php/pull/1418) Switch to mb_convert_encoding to fix utf8_encode deprecation warning

## 10.3.0 - 2022-12-22
* [#1413](https://github.com/stripe/stripe-php/pull/1413) API Updates
  Change `CheckoutSession.cancel_url` to be nullable.

## 10.2.0 - 2022-12-15
* [#1411](https://github.com/stripe/stripe-php/pull/1411) API Updates
  * Add support for new value `invoice_overpaid` on enum `CustomerBalanceTransaction.type`
* [#1407](https://github.com/stripe/stripe-php/pull/1407) API Updates


## 10.1.0 - 2022-12-06
* [#1405](https://github.com/stripe/stripe-php/pull/1405) API Updates
  * Add support for `flow` on `BillingPortal.Session`
* [#1404](https://github.com/stripe/stripe-php/pull/1404) API Updates
  * Remove support for resources `Order` and `Sku`
  * Remove support for `all`, `cancel`, `create`, `list_line_items`, `reopen`, `retrieve`, `submit`, and `update` methods on resource `Order`
  * Remove support for `all`, `create`, `delete`, `retrieve`, and `update` methods on resource `Sku`
  * Add support for `custom_text` on `Checkout.Session` and `PaymentLink`
  * Add support for `invoice_creation` and `invoice` on `Checkout.Session`
  * Remove support for `product` on `LineItem`
  * Add support for `latest_charge` on `PaymentIntent`
  * Remove support for `charges` on `PaymentIntent`

## 10.0.0 - 2022-11-16
* [#1392](https://github.com/stripe/stripe-php/pull/1392) Next major release changes

Breaking changes that arose during code generation of the library that we postponed for the next major version. For changes to the Stripe products, read more at https://docs.stripe.com/changelog/2022-11-15.

"⚠️" symbol highlights breaking changes.

### Deprecated
* [#1382](https://github.com/stripe/stripe-php/pull/1382) Mark `resource.save` as deprecated. Prefer the static update method that doesn't require retrieval of the resource to update it.
```PHP
// before
$resource = Price::retrieve(self::TEST_RESOURCE_ID);
$resource->metadata['key'] = 'value';
$resource->save();

// after
$resource = Price::update('price_123', [
    'metadata' => ['key' => 'value'],
]);
```

### ⚠️ Removed
- [#1377](https://github.com/stripe/stripe-php/pull/1377) Removed deprecated `Sku` resource and service
- [#1375](https://github.com/stripe/stripe-php/pull/1375) Removed deprecated `Orders` resource and service
- [#1375](https://github.com/stripe/stripe-php/pull/1375) Removed deprecated `Product` field from the `LineItem`
- [#1388](https://github.com/stripe/stripe-php/pull/1388) Removed deprecated `AlipayAccount` resource
- [#1396](https://github.com/stripe/stripe-php/pull/1396) Removed `charges` field on `PaymentIntent` and replace it with `latest_charge`.


## 9.9.0 - 2022-11-08
* [#1394](https://github.com/stripe/stripe-php/pull/1394) API Updates
  * Add support for new values `eg_tin`, `ph_tin`, and `tr_tin` on enum `TaxId.type`
* [#1389](https://github.com/stripe/stripe-php/pull/1389) API Updates
  * Add support for `on_behalf_of` on `Subscription`
* [#1379](https://github.com/stripe/stripe-php/pull/1379) Do not run Coveralls in PR-s

## 9.8.0 - 2022-10-20
* [#1383](https://github.com/stripe/stripe-php/pull/1383) API Updates
  * Add support for new values `jp_trn` and `ke_pin` on enum `TaxId.type`
* [#1293](https://github.com/stripe/stripe-php/pull/1293) Install deps in the install step of CI
* [#1291](https://github.com/stripe/stripe-php/pull/1291) Fix: Configure finder for `friendsofphp/php-cs-fixer`

## 9.7.0 - 2022-10-13
* [#1376](https://github.com/stripe/stripe-php/pull/1376) API Updates
  * Add support for `network_data` on `Issuing.Authorization`
* [#1374](https://github.com/stripe/stripe-php/pull/1374) Add request_log_url on ErrorObject
* [#1370](https://github.com/stripe/stripe-php/pull/1370) API Updates
  * Add support for `created` on `Checkout.Session`

## 9.6.0 - 2022-09-15
* [#1365](https://github.com/stripe/stripe-php/pull/1365) API Updates
  * Add support for `from_invoice` and `latest_revision` on `Invoice`
  * Add support for new value `pix` on enum `PaymentLink.payment_method_types[]`
  * Add support for `pix` on `PaymentMethod`
  * Add support for new value `pix` on enum `PaymentMethod.type`
  * Add support for `created` on `Treasury.CreditReversal` and `Treasury.DebitReversal`

## 9.5.0 - 2022-09-06
* [#1364](https://github.com/stripe/stripe-php/pull/1364) API Updates
  * Add support for new value `terminal_reader_splashscreen` on enum `File.purpose`
* [#1363](https://github.com/stripe/stripe-php/pull/1363) chore: Update PHP tests to handle search methods.

## 9.4.0 - 2022-08-26
* [#1362](https://github.com/stripe/stripe-php/pull/1362) API Updates
  * Add support for `login_page` on `BillingPortal.Configuration`
* [#1360](https://github.com/stripe/stripe-php/pull/1360) Add test coverage using Coveralls
* [#1361](https://github.com/stripe/stripe-php/pull/1361) fix: Fix type hints for error objects.
  * Update `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error` and `SetupIntent.setup_error` type to be `StripeObject`.
    * Addresses https://github.com/stripe/stripe-php/issues/1353. The library today does not actually return a `ErrorObject` for these fields, so the type annotation was incorrect.
* [#1356](https://github.com/stripe/stripe-php/pull/1356) Add beta readme.md section

## 9.3.0 - 2022-08-23
* [#1355](https://github.com/stripe/stripe-php/pull/1355) API Updates
  * Change type of `Treasury.OutboundTransfer.destination_payment_method` from `string` to `string | null`
  * Change the return type of `CustomerService.fundCashBalance` test helper from `CustomerBalanceTransaction` to `CustomerCashBalanceTransaction`.
    * This would generally be considered a breaking change, but we've worked with all existing users to migrate and are comfortable releasing this as a minor as it is solely a test helper method. This was essentially broken prior to this change.

## 9.2.0 - 2022-08-19
* [#1352](https://github.com/stripe/stripe-php/pull/1352) API Updates
  * Add support for new resource `CustomerCashBalanceTransaction`
  * Add support for `currency` on `PaymentLink`
  * Add constant for `customer_cash_balance_transaction.created` webhook event.
* [#1351](https://github.com/stripe/stripe-php/pull/1351) Add a support section to the readme
* [#1304](https://github.com/stripe/stripe-php/pull/1304) Allow passing PSR-3 loggers to setLogger as they are compatible

## 9.1.0 - 2022-08-11
* [#1348](https://github.com/stripe/stripe-php/pull/1348) API Updates
  * Add support for `payment_method_collection` on `Checkout.Session` and `PaymentLink`

* [#1346](https://github.com/stripe/stripe-php/pull/1346) API Updates
  * Add support for `expires_at` on `Apps.Secret`

## 9.0.0 - 2022-08-02

Breaking changes that arose during code generation of the library that we postponed for the next major version. For changes to the SDK, read more detailed description at https://github.com/stripe/stripe-php/wiki/Migration-guide-for-v9. For changes to the Stripe products, read more at https://docs.stripe.com/changelog/2022-08-01.

"⚠️" symbol highlights breaking changes.

* [#1344](https://github.com/stripe/stripe-php/pull/1344) API Updates
* [#1337](https://github.com/stripe/stripe-php/pull/1337) API Updates
* [#1273](https://github.com/stripe/stripe-php/pull/1273) Add some PHPDoc return types and fixes
* [#1341](https://github.com/stripe/stripe-php/pull/1341) Next major release changes

### Added
* Add `alternate_statement_descriptors`, `authorization_code`, and `level3` properties to `Charge` resource.
* Add `previewLines` method to `CreditNote` resource.
* Add `transfer_data` property to `Subscription` resource.
* Add `SOURCE_TYPE_FPX` constant to `Transfer` resource.
* Add new error code constants to `ErrorObject`.
* Add support for `shipping_cost` and `shipping_details` on `Checkout.Session`

### ⚠️ Changed
* Updated certificate bundle ([#1314](https://github.com/stripe/stripe-php/pull/1314))
* Add `params` parameter to `close` method in `Dispute` resource.

### ⚠️ Removed
* Remove deprecated `AlipayAccount`, `BitcoinReceiver`, `BitcoinTransaction`, `Recipient`, `RecipientTransfer`, and `ThreeDSecure` resources.
* Remove `CAPABILITY_CARD_PAYMENTS`, `CAPABILITY_LEGACY_PAYMENTS`, `CAPABILITY_PLATFORM_PAYMENTS`, `CAPABILITY_TRANSFERS`, `CAPABILITY_STATUS_ACTIVE`, `CAPABILITY_STATUS_INACTIVE`, and `CAPABILITY_STATUS_PENDING` constants from `Account` resource. Please use up-to-date values from https://stripe.com/docs/connect/account-capabilities.
* Remove `AssociatedObjects` array property from `EphemeralKey` resource. The field was undocumented and unsupported.
* Remove `details` method from `Card` resource. The endpoint was deprecated and no longer exists.
* Remove `recipient` property from `Card` resource. The property was deprecated.
* Remove ability to list `Card` resources for a particular `Recipient`.
* Remove `sources` property from `Card` resource. The property was deprecated.
* Remove `FAILURE_REASON` constant from `Refund` resource. The value was deprecated.
* Remove `Recipient` resource. The resource was deprecated.
* Remove `OrderItem` resource. The resource was deprecated.
* Remove `all` method from `LineItem`.
* Remove `cancel` method from `Transfer` and `TransferService`. This method is deprecated.
* Remove `allTransactions` method from `SourceService` service. Please use `allSourceTransactions` method instead.
* Remove `persons` method from `Account` resource. Please use `allPersons` method instead.
* Remove `sourceTransactions` method from `Source` resource. Please use `allSourceTransactions` method instead.
* Remove `usageRecordSummaries` method from `SubscriptionItem` resource. Please use `allUsageRecordSummaries` method instead.
* Remove `SOURCE_TYPE_ALIPAY_ACCOUNT` and `SOURCE_TYPE_FINANCING` constants from `Transfer` resource. The values were deprecated and are no longer in use.
* Remove deprecated error code constants from `ErrorObject`: `CODE_ACCOUNT_ALREADY_EXISTS`, `CODE_ORDER_CREATION_FAILED`, `CODE_ORDER_REQUIRED_SETTINGS`, `CODE_ORDER_STATUS_INVALID`, `CODE_ORDER_UPSTREAM_TIMEOUT`, and `CODE_UPSTREAM_ORDER_CREATION_FAILED`.
* Remove deprecated event constants from `Webhook`: `ISSUER_FRAUD_RECORD_CREATED`, ` ORDER_PAYMENT_FAILED`, `ORDER_PAYMENT_SUCCEEDED`, `ORDER_UPDATED`, `ORDER_RETURN_CREATED`, `PAYMENT_METHOD_CARD_AUTOMATICALLY_UPDATED`, `PING`, `PROMOTION_CODE_DELETED`, and `TREASURY_RECEIVED_CREDIT_REVERSED`. The events are deprecated and no longer sent by Stripe.

## 8.12.0 - 2022-07-25
* [#1332](https://github.com/stripe/stripe-php/pull/1332) API Updates
  * Add support for `default_currency` and `invoice_credit_balance` on `Customer`


## 8.11.0 - 2022-07-18
* [#1324](https://github.com/stripe/stripe-php/pull/1324) API Updates
  * Add support for new value `blik` on enum `PaymentLink.payment_method_types[]`
  * Add support for `blik` on `PaymentMethod`
  * Add support for new value `blik` on enum `PaymentMethod.type`
  * Add `Invoice.upcomingLines` method.
  * Add `SourceService.allSourceTransactions` method.
* [#1322](https://github.com/stripe/stripe-php/pull/1322) API Updates
  * Change type of `source_type` on `Transfer` from nullable string to string (comment-only change)

## 8.10.0 - 2022-07-07
* [#1319](https://github.com/stripe/stripe-php/pull/1319) API Updates
  * Add support for `currency_options` on `Coupon` and `Price`
  * Add support for `currency` on `Subscription`
* [#1318](https://github.com/stripe/stripe-php/pull/1318) API Updates
  * Add support for new values financial_connections.account.created, financial_connections.account.deactivated, financial_connections.account.disconnected, financial_connections.account.reactivated, and financial_connections.account.refreshed_balance on `Event`.

## 8.9.0 - 2022-06-29
* [#1316](https://github.com/stripe/stripe-php/pull/1316) API Updates
  * Add support for `deliver_card`, `fail_card`, `return_card`, and `ship_card` test helper methods on resource `Issuing.Card`
  * Add support for `subtotal_excluding_tax` on `CreditNote` and `Invoice`
  * Add support for `amount_excluding_tax` and `unit_amount_excluding_tax` on `CreditNoteLineItem` and `InvoiceLineItem`
  * Add support for `total_excluding_tax` on `Invoice`
  * Change type of `PaymentLink.payment_method_types[]` from `literal('card')` to `enum`
  * Add support for `promptpay` on `PaymentMethod`
  * Add support for new value `promptpay` on enum `PaymentMethod.type`
  * Add support for `hosted_regulatory_receipt_url` and `reversal_details` on `Treasury.ReceivedCredit` and `Treasury.ReceivedDebit`

## 8.8.0 - 2022-06-23
* [#1302](https://github.com/stripe/stripe-php/pull/1302) API Updates
  * Add support for `custom_unit_amount` on `Price`
* [#1301](https://github.com/stripe/stripe-php/pull/1301) API Updates

  Documentation updates.

## 8.7.0 - 2022-06-17
* [#1306](https://github.com/stripe/stripe-php/pull/1306) API Updates
  * Add support for `fund_cash_balance` test helper method on resource `Customer`
  * Add support for `total_excluding_tax` on `CreditNote`
  * Add support for `rendering_options` on `Invoice`
* [#1307](https://github.com/stripe/stripe-php/pull/1307) Support updating pre-release versions
* [#1305](https://github.com/stripe/stripe-php/pull/1305) Trigger workflows on beta branches
* [#1302](https://github.com/stripe/stripe-php/pull/1302) API Updates
  * Add support for `custom_unit_amount` on `Price`
* [#1301](https://github.com/stripe/stripe-php/pull/1301) API Updates

  Documentation updates.

## 8.6.0 - 2022-06-08
* [#1300](https://github.com/stripe/stripe-php/pull/1300) API Updates
  * Add support for `attach_to_self` and `flow_directions` on `SetupAttempt`

## 8.5.0 - 2022-06-01
* [#1298](https://github.com/stripe/stripe-php/pull/1298) API Updates
  * Add support for `radar_options` on `Charge` and `PaymentMethod`
  * Add support for new value `simulated_wisepos_e` on enum `Terminal.Reader.device_type`

## 8.4.0 - 2022-05-26
* [#1296](https://github.com/stripe/stripe-php/pull/1296) API Updates
  * Add support for `persons` method on resource `Account`
  * Add support for `balance_transactions` method on resource `Customer`
  * Add support for `id_number_secondary_provided` on `Person`
* [#1295](https://github.com/stripe/stripe-php/pull/1295) API Updates


## 8.3.0 - 2022-05-23
* [#1294](https://github.com/stripe/stripe-php/pull/1294) API Updates
  * Add support for new resource `Apps.Secret`
  * Add support for `affirm` and `link` on `PaymentMethod`
  * Add support for new values `affirm` and `link` on enum `PaymentMethod.type`
* [#1289](https://github.com/stripe/stripe-php/pull/1289) fix: Update RequestOptions#redactedApiKey to stop exploding null.

## 8.2.0 - 2022-05-19
* [#1286](https://github.com/stripe/stripe-php/pull/1286) API Updates
  * Add support for new resources `Treasury.CreditReversal`, `Treasury.DebitReversal`, `Treasury.FinancialAccountFeatures`, `Treasury.FinancialAccount`, `Treasury.FlowDetails`, `Treasury.InboundTransfer`, `Treasury.OutboundPayment`, `Treasury.OutboundTransfer`, `Treasury.ReceivedCredit`, `Treasury.ReceivedDebit`, `Treasury.TransactionEntry`, and `Treasury.Transaction`
  * Add support for `retrieve_payment_method` method on resource `Customer`
  * Add support for `all` and `list_owners` methods on resource `FinancialConnections.Account`
  * Add support for `treasury` on `Issuing.Authorization`, `Issuing.Dispute`, and `Issuing.Transaction`
  * Add support for `financial_account` on `Issuing.Card`
  * Add support for `client_secret` on `Order`
  * Add support for `attach_to_self` and `flow_directions` on `SetupIntent`

## 8.1.0 - 2022-05-11
* [#1284](https://github.com/stripe/stripe-php/pull/1284) API Updates
  * Add support for `consent_collection`, `customer_creation`, `payment_intent_data`, `shipping_options`, `submit_type`, and `tax_id_collection` on `PaymentLink`
  * Add support for `description` on `Subscription`

## 8.0.0 - 2022-05-09
* [#1283](https://github.com/stripe/stripe-php/pull/1283) Major version release of v8.0.0. The [migration guide](https://github.com/stripe/stripe-php/wiki/Migration-Guide-for-v8) contains more information.
  (⚠️ = breaking changes):
  * ⚠️ Replace the legacy `Order` API with the new `Order` API.
    * Resource modified: `Order`.
    * New methods: `cancel`, `list_line_items`, `reopen`, and `submit`
    * Removed methods: `pay` and `return_order`
    * Removed resources: `OrderItem` and `OrderReturn`
    * Removed references from other resources: `Charge.order`
  * ⚠️ Rename `\FinancialConnections\Account.refresh` method to `\FinancialConnections\Account.refresh_account`
  * Add support for `amount_discount`, `amount_tax`, and `product` on `LineItem`

## 7.128.0 - 2022-05-05
* [#1282](https://github.com/stripe/stripe-php/pull/1282) API Updates
  * Add support for `default_price` on `Product`
  * Add support for `instructions_email` on `Refund`


## 7.127.0 - 2022-05-05
* [#1281](https://github.com/stripe/stripe-php/pull/1281) API Updates
  * Add support for new resources `FinancialConnections.AccountOwner`, `FinancialConnections.AccountOwnership`, `FinancialConnections.Account`, and `FinancialConnections.Session`
* [#1278](https://github.com/stripe/stripe-php/pull/1278) Pin setup-php action version.
* [#1277](https://github.com/stripe/stripe-php/pull/1277) API Updates
  * Add support for `registered_address` on `Person`

## 7.126.0 - 2022-05-03
* [#1276](https://github.com/stripe/stripe-php/pull/1276) API Updates
  * Add support for new resource `CashBalance`
  * Change type of `BillingPortal.Configuration.application` from `$Application` to `deletable($Application)`
  * Add support for `cash_balance` on `Customer`
  * Add support for `application` on `Invoice`, `Quote`, `SubscriptionSchedule`, and `Subscription`
  * Add support for new value `eu_oss_vat` on enum `TaxId.type`
* [#1274](https://github.com/stripe/stripe-php/pull/1274) Fix PHPDoc on Discount for nullable properties
* [#1272](https://github.com/stripe/stripe-php/pull/1272) Allow users to pass a custom IPRESOLVE cURL option.

## 7.125.0 - 2022-04-21
* [#1270](https://github.com/stripe/stripe-php/pull/1270) API Updates
  * Add support for `expire` test helper method on resource `Refund`

## 7.124.0 - 2022-04-18
* [#1265](https://github.com/stripe/stripe-php/pull/1265) API Updates
  * Add support for new resources `FundingInstructions` and `Terminal.Configuration`
  * Add support for `create_funding_instructions` method on resource `Customer`
  * Add support for `amount_details` on `PaymentIntent`
  * Add support for `customer_balance` on `PaymentMethod`
  * Add support for new value `customer_balance` on enum `PaymentMethod.type`
  * Add support for `configuration_overrides` on `Terminal.Location`


## 7.123.0 - 2022-04-13
* [#1263](https://github.com/stripe/stripe-php/pull/1263) API Updates
  * Add support for `increment_authorization` method on resource `PaymentIntent`
* [#1262](https://github.com/stripe/stripe-php/pull/1262) Add support for updating the version of the repo
* [#1230](https://github.com/stripe/stripe-php/pull/1230) Add PHPDoc return types
* [#1242](https://github.com/stripe/stripe-php/pull/1242) Fix some PHPDoc in tests

## 7.122.0 - 2022-04-08
* [#1261](https://github.com/stripe/stripe-php/pull/1261) API Updates
  * Add support for `apply_customer_balance` method on resource `PaymentIntent`
* [#1259](https://github.com/stripe/stripe-php/pull/1259) API Updates

  * Add `payment_intent.partially_funded`, `terminal.reader.action_failed`, and `terminal.reader.action_succeeded` events.

## 7.121.0 - 2022-03-30
* [#1258](https://github.com/stripe/stripe-php/pull/1258) API Updates
  * Add support for `cancel_action`, `process_payment_intent`, `process_setup_intent`, and `set_reader_display` methods on resource `Terminal.Reader`
  * Add support for `action` on `Terminal.Reader`

## 7.120.0 - 2022-03-29
* [#1257](https://github.com/stripe/stripe-php/pull/1257) API Updates
  * Add support for Search API
    * Add support for `search` method on resources `Charge`, `Customer`, `Invoice`, `PaymentIntent`, `Price`, `Product`, and `Subscription`

## 7.119.0 - 2022-03-25
* [#1256](https://github.com/stripe/stripe-php/pull/1256) API Updates
  * Add support for PayNow and US Bank Accounts Debits payments
      * Add support for `paynow` and `us_bank_account` on `PaymentMethod`
      * Add support for new values `paynow` and `us_bank_account` on enum `PaymentMethod.type`
  * Add support for `failure_balance_transaction` on `Charge`

## 7.118.0 - 2022-03-23
* [#1255](https://github.com/stripe/stripe-php/pull/1255) API Updates
  * Add support for `cancel` method on resource `Refund`
  * Add support for new values `bg_uic`, `hu_tin`, and `si_tin` on enum `TaxId.type`
  * Add  `test_helpers.test_clock.advancing`, `test_helpers.test_clock.created`, `test_helpers.test_clock.deleted`, `test_helpers.test_clock.internal_failure`, and `test_helpers.test_clock.ready` events.


## 7.117.0 - 2022-03-18
* [#1254](https://github.com/stripe/stripe-php/pull/1254) API Updates
  * Add support for `status` on `Card`
* [#1251](https://github.com/stripe/stripe-php/pull/1251) Add support for SearchResult objects.
* [#1249](https://github.com/stripe/stripe-php/pull/1249) Add missing constant for payment_behavior

## 7.116.0 - 2022-03-02
* [#1248](https://github.com/stripe/stripe-php/pull/1248) API Updates
  * Add support for `proration_details` on `InvoiceLineItem`


## 7.115.0 - 2022-03-01
* [#1245](https://github.com/stripe/stripe-php/pull/1245) [#1247](https://github.com/stripe/stripe-php/pull/1247) API Updates
  * Add support for new resource `TestHelpers.TestClock`
  * Add support for `test_clock` on `Customer`, `Invoice`, `InvoiceItem`, `Quote`, `Subscription`, and `SubscriptionSchedule`
  * Add support for `next_action` on `Refund`
  * Add support for `konbini` on `PaymentMethod`
* [#1244](https://github.com/stripe/stripe-php/pull/1244) API Updates
  * Add support for new values `bbpos_wisepad3` and `stripe_m2` on enum `Terminal.Reader.device_type`

## 7.114.0 - 2022-02-15
* [#1243](https://github.com/stripe/stripe-php/pull/1243) Add test
* [#1240](https://github.com/stripe/stripe-php/pull/1240) API Updates
  * Add support for `verify_microdeposits` method on resources `PaymentIntent` and `SetupIntent`
* [#1241](https://github.com/stripe/stripe-php/pull/1241) Add generic parameter to \Stripe\Collection usages

## 7.113.0 - 2022-02-03
* [#1239](https://github.com/stripe/stripe-php/pull/1239) API Updates
  * Add `REASON_EXPIRED_UNCAPTURED_CHARGE` enum value on `Refund`.

## 7.112.0 - 2022-01-25
* [#1235](https://github.com/stripe/stripe-php/pull/1235) API Updates
  * Add support for `phone_number_collection` on `PaymentLink`
  * Add support for new value `is_vat` on enum `TaxId.type`


## 7.111.0 - 2022-01-20
* [#1233](https://github.com/stripe/stripe-php/pull/1233) API Updates
  * Add support for new resource `PaymentLink`
  * Add support for `payment_link` on `Checkout.Session`

## 7.110.0 - 2022-01-13
* [#1232](https://github.com/stripe/stripe-php/pull/1232) API Updates
  * Add support for `paid_out_of_band` on `Invoice`

## 7.109.0 - 2022-01-12
* [#1231](https://github.com/stripe/stripe-php/pull/1231) API Updates
  * Add support for `customer_creation` on `Checkout.Session`
* [#1227](https://github.com/stripe/stripe-php/pull/1227) Update docs URLs

## 7.108.0 - 2021-12-22
* [#1226](https://github.com/stripe/stripe-php/pull/1226) Upgrade php-cs-fixer to 3.4.0.
* [#1222](https://github.com/stripe/stripe-php/pull/1222) API Updates
  * Add support for `processing` on `PaymentIntent`
* [#1220](https://github.com/stripe/stripe-php/pull/1220) API Updates

## 7.107.0 - 2021-12-09
* [#1219](https://github.com/stripe/stripe-php/pull/1219) API Updates
  * Add support for `metadata` on `BillingPortal.Configuration`
  * Add support for `wallets` on `Issuing.Card`

## 7.106.0 - 2021-12-09
* [#1218](https://github.com/stripe/stripe-php/pull/1218) API Updates
  * Add support for new values `ge_vat` and `ua_vat` on enum `TaxId.type`
* [#1216](https://github.com/stripe/stripe-php/pull/1216) Fix namespaced classes in @return PHPDoc.
* [#1214](https://github.com/stripe/stripe-php/pull/1214) Announce PHP8 support in CHANGELOG.md

## 7.105.0 - 2021-12-06
* [#1213](https://github.com/stripe/stripe-php/pull/1213) PHP 8.1 missing ReturnTypeWillChange annotations.
* As of this version, PHP 8.1 is officially supported.

## 7.104.0 - 2021-12-01
* [#1211](https://github.com/stripe/stripe-php/pull/1211) PHPStan compatibility with PHP8.x
* [#1209](https://github.com/stripe/stripe-php/pull/1209) PHPUnit compatibility with PHP 8.x

## 7.103.0 - 2021-11-19
* [#1206](https://github.com/stripe/stripe-php/pull/1206) API Updates
  * Add support for new value `jct` on enum `TaxRate.tax_type`

## 7.102.0 - 2021-11-17
* [#1205](https://github.com/stripe/stripe-php/pull/1205) API Updates
  * Add support for `automatic_payment_methods` on `PaymentIntent`

## 7.101.0 - 2021-11-16
* [#1203](https://github.com/stripe/stripe-php/pull/1203) API Updates
  * Add support for new resource `ShippingRate`
  * Add support for `shipping_options` and `shipping_rate` on `Checkout.Session`
  * Add support for `expire` method on resource `Checkout.Session`
  * Add support for `status` on `Checkout.Session`

## 7.100.0 - 2021-10-11
* [#1190](https://github.com/stripe/stripe-php/pull/1190) API Updates
  * Add support for `klarna` on `PaymentMethod`.

## 7.99.0 - 2021-10-11
* [#1188](https://github.com/stripe/stripe-php/pull/1188) API Updates
  * Add support for `list_payment_methods` method on resource `Customer`

## 7.98.0 - 2021-10-07
* [#1187](https://github.com/stripe/stripe-php/pull/1187) API Updates
  * Add support for `phone_number_collection` on `Checkout.Session`
  * Add support for new value `customer_id` on enum `Radar.ValueList.item_type`
  * Add support for new value `bbpos_wisepos_e` on enum `Terminal.Reader.device_type`

## 7.97.0 - 2021-09-16
* [#1181](https://github.com/stripe/stripe-php/pull/1181) API Updates
  * Add support for `full_name_aliases` on `Person`

## 7.96.0 - 2021-09-15
* [#1178](https://github.com/stripe/stripe-php/pull/1178) API Updates
  * Add support for livemode on Reporting.ReportType
  * Add support for new value `rst` on enum `TaxRate.tax_type`

## 7.95.0 - 2021-09-01
* [#1177](https://github.com/stripe/stripe-php/pull/1177) API Updates
  * Add support for `future_requirements` on `Account`, `Capability`, and `Person`
  * Add support for `after_expiration`, `consent`, `consent_collection`, `expires_at`, and `recovered_from` on `Checkout.Session`

## 7.94.0 - 2021-08-19
* [#1173](https://github.com/stripe/stripe-php/pull/1173) API Updates
  * Add support for new value `fil` on enum `Checkout.Session.locale`
  * Add support for new value `au_arn` on enum `TaxId.type`

## 7.93.0 - 2021-08-11
* [#1172](https://github.com/stripe/stripe-php/pull/1172) API Updates
  * Add support for `locale` on `BillingPortal.Session`

* [#1171](https://github.com/stripe/stripe-php/pull/1171) Fix typo in docblock `CurlClient::executeStreamingRequestWithRetries`

## 7.92.0 - 2021-07-28
* [#1167](https://github.com/stripe/stripe-php/pull/1167) API Updates
  * Add support for `account_type` on `BankAccount`
  * Add support for new value `redacted` on enum `Review.closed_reason`

## 7.91.0 - 2021-07-22
* [#1164](https://github.com/stripe/stripe-php/pull/1164) API Updates
  * Add support for new values `hr`, `ko`, and `vi` on enum `Checkout.Session.locale`
  * Add support for `payment_settings` on `Subscription`

## 7.90.0 - 2021-07-20
* [#1163](https://github.com/stripe/stripe-php/pull/1163) API Updates
  * Add support for `wallet` on `Issuing.Transaction`
* [#1160](https://github.com/stripe/stripe-php/pull/1160) Remove unused API error types from docs.

## 7.89.0 - 2021-07-14
* [#1158](https://github.com/stripe/stripe-php/pull/1158) API Updates
  * Add support for `list_computed_upfront_line_items` method on resource `Quote`
* [#1157](https://github.com/stripe/stripe-php/pull/1157) Improve readme for old PHP versions

## 7.88.0 - 2021-07-09
* [#1152](https://github.com/stripe/stripe-php/pull/1152) API Updates
  * Add support for new resource `Quote`
  * Add support for `quote` on `Invoice`
  * Add support for new value `quote_accept` on enum `Invoice.billing_reason`
* [#1155](https://github.com/stripe/stripe-php/pull/1155) Add streaming methods to Service infra
  * Add support for `setStreamingHttpClient` and `streamingHttpClient` to `ApiRequestor`
  * Add support for `getStreamingClient` and `requestStream` to `AbstractService`
  * Add support for `requestStream` to `BaseStripeClient`
  * `\Stripe\RequestOptions::parse` now clones its input if it is already a `RequestOptions` object, to prevent accidental mutation.
* [#1151](https://github.com/stripe/stripe-php/pull/1151) Add `mode` constants into Checkout\Session

## 7.87.0 - 2021-06-30
* [#1149](https://github.com/stripe/stripe-php/pull/1149) API Updates
  * Add support for `wechat_pay` on `PaymentMethod`
* [#1143](https://github.com/stripe/stripe-php/pull/1143) Streaming requests
* [#1138](https://github.com/stripe/stripe-php/pull/1138) Deprecate travis

## 7.86.0 - 2021-06-25
* [#1145](https://github.com/stripe/stripe-php/pull/1145) API Updates
  * Add support for `boleto` on `PaymentMethod`.
  * Add support for `il_vat` as a member of the `TaxID.Type` enum.

## 7.85.0 - 2021-06-18
* [#1142](https://github.com/stripe/stripe-php/pull/1142) API Updates
  * Add support for new TaxId types: `ca_pst_mb`, `ca_pst_bc`, `ca_gst_hst`, and `ca_pst_sk`.

## 7.84.0 - 2021-06-16
* [#1141](https://github.com/stripe/stripe-php/pull/1141) Update PHPDocs
  * Add support for `url` on `Checkout\Session`


## 7.83.0 - 2021-06-07
* [#1140](https://github.com/stripe/stripe-php/pull/1140) API Updates
  * Added support for `tax_id_collection` on `Checkout\Session` and `Checkout\Session#create`
  * Update `Location` to be expandable on `Terminal\Reader`

## 7.82.0 - 2021-06-04
* [#1136](https://github.com/stripe/stripe-php/pull/1136) Update PHPDocs
  * Add support for `controller` on `Account`.

## 7.81.0 - 2021-06-04
* [#1135](https://github.com/stripe/stripe-php/pull/1135) API Updates
  * Add support for new resource `TaxCode`
  * Add support for `automatic_tax` `Invoice` and`Checkout.Session`.
  * Add support for `tax_behavior` on `Price`
  * Add support for `tax_code` on `Product`
  * Add support for `tax` on `Customer`
  * Add support for `tax_type` enum on `TaxRate`

## 7.80.0 - 2021-05-26
* [#1130](https://github.com/stripe/stripe-php/pull/1130) Update PHPDocs

## 7.79.0 - 2021-05-19
* [#1126](https://github.com/stripe/stripe-php/pull/1126) API Updates
  * Added support for new resource `Identity.VerificationReport`
  * Added support for new resource `Identity.VerificationSession`
  * `File#list.purpose` and `File.purpose` added new enum members: `identity_document_downloadable` and `selfie`.

## 7.78.0 - 2021-05-05
* [#1120](https://github.com/stripe/stripe-php/pull/1120) Update PHPDocs
  * Add support for `Radar.EarlyFraudWarning.payment_intent`

## 7.77.0 - 2021-04-12
* [#1110](https://github.com/stripe/stripe-php/pull/1110) Update PHPDocs
  * Add support for `acss_debit` on `PaymentMethod`
  * Add support for `payment_method_options` on `Checkout\Session`
* [#1107](https://github.com/stripe/stripe-php/pull/1107) Remove duplicate object phpdoc

## 7.76.0 - 2021-03-22
* [#1100](https://github.com/stripe/stripe-php/pull/1100) Update PHPDocs
  * Added support for `amount_shipping` on `Checkout.Session.total_details`
* [#1088](https://github.com/stripe/stripe-php/pull/1088) Make possibility to extend CurlClient

## 7.75.0 - 2021-02-22
* [#1094](https://github.com/stripe/stripe-php/pull/1094) Add support for Billing Portal Configuration API

## 7.74.0 - 2021-02-17
* [#1093](https://github.com/stripe/stripe-php/pull/1093) Update PHPDocs
  * Add support for on_behalf_of to Invoice

## 7.73.0 - 2021-02-16
* [#1091](https://github.com/stripe/stripe-php/pull/1091) Update PHPDocs
  * Add support for `afterpay_clearpay` on `PaymentMethod`.

## 7.72.0 - 2021-02-08
* [#1089](https://github.com/stripe/stripe-php/pull/1089) Update PHPDocs
  * Add support for `afterpay_clearpay_payments` on `Account.capabilities`
  * Add support for `payment_settings` on `Invoice`

## 7.71.0 - 2021-02-05
* [#1087](https://github.com/stripe/stripe-php/pull/1087) Update PHPDocs
* [#1086](https://github.com/stripe/stripe-php/pull/1086) Update CA cert bundle URL

## 7.70.0 - 2021-02-03
* [#1085](https://github.com/stripe/stripe-php/pull/1085) Update PHPDocs
  * Add support for `nationality` on `Person`
  * Add member `gb_vat` of `TaxID` enum


## 7.69.0 - 2021-01-21
* [#1079](https://github.com/stripe/stripe-php/pull/1079) Update PHPDocs

## 7.68.0 - 2021-01-14
* [#1063](https://github.com/stripe/stripe-php/pull/1063) Multiple API changes
* [#1061](https://github.com/stripe/stripe-php/pull/1061) Bump phpDocumentor to 3.0.0

## 7.67.0 - 2020-12-09
* [#1060](https://github.com/stripe/stripe-php/pull/1060) Improve PHPDocs for `Discount`
* [#1059](https://github.com/stripe/stripe-php/pull/1059) Upgrade PHPStan to 0.12.59
* [#1057](https://github.com/stripe/stripe-php/pull/1057) Bump PHP-CS-Fixer and update code

## 7.66.1 - 2020-12-01
* [#1054](https://github.com/stripe/stripe-php/pull/1054) Improve error message for invalid keys in StripeClient

## 7.66.0 - 2020-11-24
* [#1053](https://github.com/stripe/stripe-php/pull/1053) Update PHPDocs

## 7.65.0 - 2020-11-19
* [#1050](https://github.com/stripe/stripe-php/pull/1050) Added constants for `proration_behavior` on `Subscription`

## 7.64.0 - 2020-11-18
* [#1049](https://github.com/stripe/stripe-php/pull/1049) Update PHPDocs

## 7.63.0 - 2020-11-17
* [#1048](https://github.com/stripe/stripe-php/pull/1048) Update PHPDocs
* [#1046](https://github.com/stripe/stripe-php/pull/1046) Force IPv4 resolving

## 7.62.0 - 2020-11-09
* [#1041](https://github.com/stripe/stripe-php/pull/1041) Add missing constants on `Event`
* [#1038](https://github.com/stripe/stripe-php/pull/1038) Update PHPDocs

## 7.61.0 - 2020-10-20
* [#1030](https://github.com/stripe/stripe-php/pull/1030) Add support for `jp_rn` and `ru_kpp` as a `type` on `TaxId`

## 7.60.0 - 2020-10-15
* [#1027](https://github.com/stripe/stripe-php/pull/1027) Warn if opts are in params

## 7.58.0 - 2020-10-14
* [#1026](https://github.com/stripe/stripe-php/pull/1026) Add support for the Payout Reverse API

## 7.57.0 - 2020-09-29
* [#1020](https://github.com/stripe/stripe-php/pull/1020) Add support for the `SetupAttempt` resource and List API

## 7.56.0 - 2020-09-25
* [#1019](https://github.com/stripe/stripe-php/pull/1019) Update PHPDocs

## 7.55.0 - 2020-09-24
* [#1018](https://github.com/stripe/stripe-php/pull/1018) Multiple API changes
  * Updated PHPDocs
  * Added `TYPE_CONTRIBUTION` as a constant on `BalanceTransaction`

## 7.54.0 - 2020-09-23
* [#1017](https://github.com/stripe/stripe-php/pull/1017) Updated PHPDoc

## 7.53.1 - 2020-09-22
* [#1015](https://github.com/stripe/stripe-php/pull/1015) Bugfix: don't error on systems with php_uname in disablefunctions with whitespace

## 7.53.0 - 2020-09-21
* [#1016](https://github.com/stripe/stripe-php/pull/1016) Updated PHPDocs

## 7.52.0 - 2020-09-08
* [#1010](https://github.com/stripe/stripe-php/pull/1010) Update PHPDocs

## 7.51.0 - 2020-09-02
* [#1007](https://github.com/stripe/stripe-php/pull/1007) Multiple API changes
  * Add support for the Issuing Dispute Submit API
  * Add constants for `payment_status` on Checkout `Session`
* [#1003](https://github.com/stripe/stripe-php/pull/1003) Add trim to getSignatures to allow for leading whitespace.

## 7.50.0 - 2020-08-28
* [#1005](https://github.com/stripe/stripe-php/pull/1005) Updated PHPDocs

## 7.49.0 - 2020-08-19
* [#998](https://github.com/stripe/stripe-php/pull/998) PHPDocs updated

## 7.48.0 - 2020-08-17
* [#997](https://github.com/stripe/stripe-php/pull/997) PHPDocs updated
* [#996](https://github.com/stripe/stripe-php/pull/996) Fixing telemetry

## 7.47.0 - 2020-08-13
* [#994](https://github.com/stripe/stripe-php/pull/994) Nullable balance_transactions on issuing disputes
* [#991](https://github.com/stripe/stripe-php/pull/991) Fix invalid return types in OAuthService

## 7.46.1 - 2020-08-07
* [#990](https://github.com/stripe/stripe-php/pull/990) PHPdoc changes

## 7.46.0 - 2020-08-05
* [#989](https://github.com/stripe/stripe-php/pull/989) Add support for the `PromotionCode` resource and APIs

## 7.45.0 - 2020-07-28
* [#981](https://github.com/stripe/stripe-php/pull/981) PHPdoc updates

## 7.44.0 - 2020-07-20
* [#948](https://github.com/stripe/stripe-php/pull/948) Add `first()` and `last()` functions to `Collection`

## 7.43.0 - 2020-07-17
* [#975](https://github.com/stripe/stripe-php/pull/975) Add support for `political_exposure` on `Person`

## 7.42.0 - 2020-07-15
* [#974](https://github.com/stripe/stripe-php/pull/974) Add new constants for `purpose` on `File`

## 7.41.1 - 2020-07-15
* [#973](https://github.com/stripe/stripe-php/pull/973) Multiple PHPDoc fixes

## 7.41.0 - 2020-07-14
* [#971](https://github.com/stripe/stripe-php/pull/971) Adds enum values for `billing_address_collection` on Checkout `Session`

## 7.40.0 - 2020-07-06
* [#964](https://github.com/stripe/stripe-php/pull/964) Add OAuthService

## 7.39.0 - 2020-06-25
* [#960](https://github.com/stripe/stripe-php/pull/960) Add constants for `payment_behavior` on `Subscription`

## 7.38.0 - 2020-06-24
* [#959](https://github.com/stripe/stripe-php/pull/959) Add multiple constants missing for `Event`

## 7.37.2 - 2020-06-23
* [#957](https://github.com/stripe/stripe-php/pull/957) Updated PHPDocs

## 7.37.1 - 2020-06-11
* [#952](https://github.com/stripe/stripe-php/pull/952) Improve PHPDoc

## 7.37.0 - 2020-06-09
* [#950](https://github.com/stripe/stripe-php/pull/950) Add support for `id_npwp` and `my_frp` as `type` on `TaxId`

## 7.36.2 - 2020-06-03
* [#946](https://github.com/stripe/stripe-php/pull/946) Update PHPDoc

## 7.36.1 - 2020-05-28
* [#938](https://github.com/stripe/stripe-php/pull/938) Remove extra array_keys() call.
* [#942](https://github.com/stripe/stripe-php/pull/942) fix autopagination for service methods

## 7.36.0 - 2020-05-21
* [#937](https://github.com/stripe/stripe-php/pull/937) Add support for `ae_trn`, `cl_tin` and `sa_vat` as `type` on `TaxId`

## 7.35.0 - 2020-05-20
* [#936](https://github.com/stripe/stripe-php/pull/936) Add `anticipation_repayment` as a `type` on `BalanceTransaction`

## 7.34.0 - 2020-05-18
* [#934](https://github.com/stripe/stripe-php/pull/934) Add support for `issuing_dispute` as a `type` on `BalanceTransaction`

## 7.33.1 - 2020-05-15
* [#933](https://github.com/stripe/stripe-php/pull/933) Services bugfix: convert nested null params to empty strings

## 7.33.0 - 2020-05-14
* [#771](https://github.com/stripe/stripe-php/pull/771) Introduce client/services API. The [migration guide](https://github.com/stripe/stripe-php/wiki/Migration-to-StripeClient-and-services-in-7.33.0) contains before & after examples of the backwards-compatible changes.

## 7.32.1 - 2020-05-13
* [#932](https://github.com/stripe/stripe-php/pull/932) Fix multiple PHPDoc

## 7.32.0 - 2020-05-11
* [#931](https://github.com/stripe/stripe-php/pull/931) Add support for the `LineItem` resource and APIs

## 7.31.0 - 2020-05-01
* [#927](https://github.com/stripe/stripe-php/pull/927) Add support for new tax IDs

## 7.30.0 - 2020-04-29
* [#924](https://github.com/stripe/stripe-php/pull/924) Add support for the `Price` resource and APIs

## 7.29.0 - 2020-04-22
* [#920](https://github.com/stripe/stripe-php/pull/920) Add support for the `Session` resource and APIs on the `BillingPortal` namespace

## 7.28.1 - 2020-04-10
* [#915](https://github.com/stripe/stripe-php/pull/915) Improve PHPdocs for many classes

## 7.28.0 - 2020-04-03
* [#912](https://github.com/stripe/stripe-php/pull/912) Preserve backwards compatibility for typoed `TYPE_ADJUSTEMENT` enum.
* [#911](https://github.com/stripe/stripe-php/pull/911) Codegenerated PHPDoc for nested resources
* [#902](https://github.com/stripe/stripe-php/pull/902) Update docstrings for nested resources

## 7.27.3 - 2020-03-18
* [#899](https://github.com/stripe/stripe-php/pull/899) Convert keys to strings in `StripeObject::toArray()`

## 7.27.2 - 2020-03-13
* [#894](https://github.com/stripe/stripe-php/pull/894) Multiple PHPDocs changes

## 7.27.1 - 2020-03-03
* [#890](https://github.com/stripe/stripe-php/pull/890) Update PHPdoc

## 7.27.0 - 2020-02-28
* [#889](https://github.com/stripe/stripe-php/pull/889) Add new constants for `type` on `TaxId`

## 7.26.0 - 2020-02-26
* [#886](https://github.com/stripe/stripe-php/pull/886) Add support for listing Checkout `Session`
* [#883](https://github.com/stripe/stripe-php/pull/883) Add PHPDoc class descriptions

## 7.25.0 - 2020-02-14
* [#879](https://github.com/stripe/stripe-php/pull/879) Make `\Stripe\Collection` implement `\Countable`
* [#875](https://github.com/stripe/stripe-php/pull/875) Last set of PHP-CS-Fixer updates
* [#874](https://github.com/stripe/stripe-php/pull/874) Enable php_unit_internal_class rule
* [#873](https://github.com/stripe/stripe-php/pull/873) Add support for phpDocumentor in Makefile
* [#872](https://github.com/stripe/stripe-php/pull/872) Another batch of PHP-CS-Fixer rule updates
* [#871](https://github.com/stripe/stripe-php/pull/871) Fix a few PHPDoc comments
* [#870](https://github.com/stripe/stripe-php/pull/870) More PHP-CS-Fixer tweaks

## 7.24.0 - 2020-02-10
* [#862](https://github.com/stripe/stripe-php/pull/862) Better PHPDoc
* [#865](https://github.com/stripe/stripe-php/pull/865) Get closer to `@PhpCsFixer` standard ruleset

## 7.23.0 - 2020-02-05
* [#860](https://github.com/stripe/stripe-php/pull/860) Add PHPDoc types for expandable fields
* [#858](https://github.com/stripe/stripe-php/pull/858) Use `native_function_invocation` PHPStan rule
* [#857](https://github.com/stripe/stripe-php/pull/857) Update PHPDoc on nested resources
* [#855](https://github.com/stripe/stripe-php/pull/855) PHPDoc: `StripeObject` -> `ErrorObject` where appropriate
* [#837](https://github.com/stripe/stripe-php/pull/837) Autogen diff
* [#854](https://github.com/stripe/stripe-php/pull/854) Upgrade PHPStan and fix settings
* [#850](https://github.com/stripe/stripe-php/pull/850) Yet more PHPDoc updates

## 7.22.0 - 2020-01-31
* [#849](https://github.com/stripe/stripe-php/pull/849) Add new constants for `type` on `TaxId`
* [#843](https://github.com/stripe/stripe-php/pull/843) Even more PHPDoc fixes
* [#841](https://github.com/stripe/stripe-php/pull/841) More PHPDoc fixes

## 7.21.1 - 2020-01-29
* [#840](https://github.com/stripe/stripe-php/pull/840) Update phpdocs across multiple resources.

## 7.21.0 - 2020-01-28
* [#839](https://github.com/stripe/stripe-php/pull/839) Add support for `TYPE_ES_CIF` on `TaxId`

## 7.20.0 - 2020-01-23
* [#836](https://github.com/stripe/stripe-php/pull/836) Add new type values for `TaxId`

## 7.19.1 - 2020-01-14
* [#831](https://github.com/stripe/stripe-php/pull/831) Fix incorrect `UnexpectedValueException` instantiation

## 7.19.0 - 2020-01-14
* [#830](https://github.com/stripe/stripe-php/pull/830) Add support for `CreditNoteLineItem`

## 7.18.0 - 2020-01-13
* [#829](https://github.com/stripe/stripe-php/pull/829) Don't call php_uname function if disabled by php.ini

## 7.17.0 - 2020-01-08
* [#821](https://github.com/stripe/stripe-php/pull/821) Improve PHPDoc types for `ApiErrorException.get/setJsonBody()` methods

## 7.16.0 - 2020-01-06
* [#826](https://github.com/stripe/stripe-php/pull/826) Rename remaining `$options` to `$opts`
* [#825](https://github.com/stripe/stripe-php/pull/825) Update PHPDoc

## 7.15.0 - 2020-01-06
* [#824](https://github.com/stripe/stripe-php/pull/824) Add constant `TYPE_SG_UEN` to `TaxId`

## 7.14.2 - 2019-12-04
* [#816](https://github.com/stripe/stripe-php/pull/816) Disable autoloader when checking for `Throwable`

## 7.14.1 - 2019-11-26
* [#812](https://github.com/stripe/stripe-php/pull/812) Fix invalid PHPdoc on `Subscription`

## 7.14.0 - 2019-11-26
* [#811](https://github.com/stripe/stripe-php/pull/811) Add support for `CreditNote` preview.

## 7.13.0 - 2019-11-19
* [#808](https://github.com/stripe/stripe-php/pull/808) Add support for listing lines on an Invoice directly via `Invoice::allLines()`

## 7.12.0 - 2019-11-08

-   [#805](https://github.com/stripe/stripe-php/pull/805) Add Source::allSourceTransactions and SubscriptionItem::allUsageRecordSummaries
-   [#798](https://github.com/stripe/stripe-php/pull/798) The argument of `array_key_exists` cannot be `null`
-   [#803](https://github.com/stripe/stripe-php/pull/803) Removed unwanted got

## 7.11.0 - 2019-11-06

-   [#797](https://github.com/stripe/stripe-php/pull/797) Add support for reverse pagination

## 7.10.0 - 2019-11-05

-   [#795](https://github.com/stripe/stripe-php/pull/795) Add support for `Mandate`

## 7.9.0 - 2019-11-05

-   [#794](https://github.com/stripe/stripe-php/pull/794) Add PHPDoc to `ApiResponse`
-   [#792](https://github.com/stripe/stripe-php/pull/792) Use single quotes for `OBJECT_NAME` constants

## 7.8.0 - 2019-11-05

-   [#790](https://github.com/stripe/stripe-php/pull/790) Mark nullable fields in PHPDoc
-   [#788](https://github.com/stripe/stripe-php/pull/788) Early codegen fixes
-   [#787](https://github.com/stripe/stripe-php/pull/787) Use PHPStan in Travis CI

## 7.7.1 - 2019-10-25

-   [#781](https://github.com/stripe/stripe-php/pull/781) Fix telemetry header
-   [#780](https://github.com/stripe/stripe-php/pull/780) Contributor Convenant

## 7.7.0 - 2019-10-23

-   [#776](https://github.com/stripe/stripe-php/pull/776) Add `CAPABILITY_TRANSFERS` to `Account`
-   [#778](https://github.com/stripe/stripe-php/pull/778) Add support for `TYPE_MX_RFC` type on `TaxId`

## 7.6.0 - 2019-10-22

-   [#770](https://github.com/stripe/stripe-php/pull/770) Add missing constants for Customer's `TaxId`

## 7.5.0 - 2019-10-18

-   [#768](https://github.com/stripe/stripe-php/pull/768) Redact API key in `RequestOptions` debug info

## 7.4.0 - 2019-10-15

-   [#764](https://github.com/stripe/stripe-php/pull/764) Add support for HTTP request monitoring callback

## 7.3.1 - 2019-10-07

-   [#755](https://github.com/stripe/stripe-php/pull/755) Respect Stripe-Should-Retry and Retry-After headers

## 7.3.0 - 2019-10-02

-   [#752](https://github.com/stripe/stripe-php/pull/752) Add `payment_intent.canceled` and `setup_intent.canceled` events
-   [#749](https://github.com/stripe/stripe-php/pull/749) Call `toArray()` on objects only

## 7.2.2 - 2019-09-24

-   [#746](https://github.com/stripe/stripe-php/pull/746) Add missing decline codes

## 7.2.1 - 2019-09-23

-   [#744](https://github.com/stripe/stripe-php/pull/744) Added new PHPDoc

## 7.2.0 - 2019-09-17

-   [#738](https://github.com/stripe/stripe-php/pull/738) Added missing constants for `SetupIntent` events

## 7.1.1 - 2019-09-16

-   [#737](https://github.com/stripe/stripe-php/pull/737) Added new PHPDoc

## 7.1.0 - 2019-09-13

-   [#736](https://github.com/stripe/stripe-php/pull/736) Make `CaseInsensitiveArray` countable and traversable

## 7.0.2 - 2019-09-06

-   [#729](https://github.com/stripe/stripe-php/pull/729) Fix usage of `SignatureVerificationException` in PHPDoc blocks

## 7.0.1 - 2019-09-05

-   [#728](https://github.com/stripe/stripe-php/pull/728) Clean up Collection

## 7.0.0 - 2019-09-03

Major version release. The [migration guide](https://github.com/stripe/stripe-php/wiki/Migration-guide-for-v7) contains a detailed list of backwards-incompatible changes with upgrade instructions.

Pull requests included in this release (cf. [#552](https://github.com/stripe/stripe-php/pull/552)) (⚠️ = breaking changes):

-   ⚠️ Drop support for PHP 5.4 ([#551](https://github.com/stripe/stripe-php/pull/551))
-   ⚠️ Drop support for PHP 5.5 ([#554](https://github.com/stripe/stripe-php/pull/554))
-   Bump dependencies ([#553](https://github.com/stripe/stripe-php/pull/553))
-   Remove `CURLFile` check ([#555](https://github.com/stripe/stripe-php/pull/555))
-   Update constant definitions for PHP >= 5.6 ([#556](https://github.com/stripe/stripe-php/pull/556))
-   ⚠️ Remove `FileUpload` alias ([#557](https://github.com/stripe/stripe-php/pull/557))
-   Remove `curl_reset` check ([#570](https://github.com/stripe/stripe-php/pull/570))
-   Use `\Stripe\<class>::class` constant instead of strings ([#643](https://github.com/stripe/stripe-php/pull/643))
-   Use `array_column` to flatten params ([#686](https://github.com/stripe/stripe-php/pull/686))
-   ⚠️ Remove deprecated methods ([#692](https://github.com/stripe/stripe-php/pull/692))
-   ⚠️ Remove `IssuerFraudRecord` ([#696](https://github.com/stripe/stripe-php/pull/696))
-   Update constructors of Stripe exception classes ([#559](https://github.com/stripe/stripe-php/pull/559))
-   Fix remaining TODOs ([#700](https://github.com/stripe/stripe-php/pull/700))
-   Use yield for autopagination ([#703](https://github.com/stripe/stripe-php/pull/703))
-   ⚠️ Rename fake magic methods and rewrite array conversion ([#704](https://github.com/stripe/stripe-php/pull/704))
-   Add `ErrorObject` to Stripe exceptions ([#705](https://github.com/stripe/stripe-php/pull/705))
-   Start using PHP CS Fixer ([#706](https://github.com/stripe/stripe-php/pull/706))
-   Update error messages for nested resource operations ([#708](https://github.com/stripe/stripe-php/pull/708))
-   Upgrade retry logic ([#707](https://github.com/stripe/stripe-php/pull/707))
-   ⚠️ `Collection` improvements / fixes ([#715](https://github.com/stripe/stripe-php/pull/715))
-   ⚠️ Modernize exceptions ([#709](https://github.com/stripe/stripe-php/pull/709))
-   Add constants for error codes ([#716](https://github.com/stripe/stripe-php/pull/716))
-   Update certificate bundle ([#717](https://github.com/stripe/stripe-php/pull/717))
-   Retry requests on a 429 that's a lock timeout ([#718](https://github.com/stripe/stripe-php/pull/718))
-   Fix `toArray()` calls ([#719](https://github.com/stripe/stripe-php/pull/719))
-   Couple of fixes for PHP 7.4 ([#725](https://github.com/stripe/stripe-php/pull/725))

## 6.43.1 - 2019-08-29

-   [#722](https://github.com/stripe/stripe-php/pull/722) Make `LoggerInterface::error` compatible with its PSR-3 counterpart
-   [#714](https://github.com/stripe/stripe-php/pull/714) Add `pending_setup_intent` property in `Subscription`
-   [#713](https://github.com/stripe/stripe-php/pull/713) Add typehint to `ApiResponse`
-   [#712](https://github.com/stripe/stripe-php/pull/712) Fix comment
-   [#701](https://github.com/stripe/stripe-php/pull/701) Start testing PHP 7.3

## 6.43.0 - 2019-08-09

-   [#694](https://github.com/stripe/stripe-php/pull/694) Add `SubscriptionItem::createUsageRecord` method

## 6.42.0 - 2019-08-09

-   [#688](https://github.com/stripe/stripe-php/pull/688) Remove `SubscriptionScheduleRevision`
    -   Note that this is technically a breaking change, however we've chosen to release it as a minor version in light of the fact that this resource and its API methods were virtually unused.

## 6.41.0 - 2019-07-31

-   [#683](https://github.com/stripe/stripe-php/pull/683) Move the List Balance History API to `/v1/balance_transactions`

## 6.40.0 - 2019-06-27

-   [#675](https://github.com/stripe/stripe-php/pull/675) Add support for `SetupIntent` resource and APIs

## 6.39.2 - 2019-06-26

-   [#676](https://github.com/stripe/stripe-php/pull/676) Fix exception message in `CustomerBalanceTransaction::update()`

## 6.39.1 - 2019-06-25

-   [#674](https://github.com/stripe/stripe-php/pull/674) Add new constants for `collection_method` on `Invoice`

## 6.39.0 - 2019-06-24

-   [#673](https://github.com/stripe/stripe-php/pull/673) Enable request latency telemetry by default

## 6.38.0 - 2019-06-17

-   [#649](https://github.com/stripe/stripe-php/pull/649) Add support for `CustomerBalanceTransaction` resource and APIs

## 6.37.2 - 2019-06-17

-   [#671](https://github.com/stripe/stripe-php/pull/671) Add new PHPDoc
-   [#672](https://github.com/stripe/stripe-php/pull/672) Add constants for `submit_type` on Checkout `Session`

## 6.37.1 - 2019-06-14

-   [#670](https://github.com/stripe/stripe-php/pull/670) Add new PHPDoc

## 6.37.0 - 2019-05-23

-   [#663](https://github.com/stripe/stripe-php/pull/663) Add support for `radar.early_fraud_warning` resource

## 6.36.0 - 2019-05-22

-   [#661](https://github.com/stripe/stripe-php/pull/661) Add constants for new TaxId types
-   [#662](https://github.com/stripe/stripe-php/pull/662) Add constants for BalanceTransaction types

## 6.35.2 - 2019-05-20

-   [#655](https://github.com/stripe/stripe-php/pull/655) Add constants for payment intent statuses
-   [#659](https://github.com/stripe/stripe-php/pull/659) Fix PHPDoc for various nested Account actions
-   [#660](https://github.com/stripe/stripe-php/pull/660) Fix various PHPDoc

## 6.35.1 - 2019-05-20

-   [#658](https://github.com/stripe/stripe-php/pull/658) Use absolute value when checking timestamp tolerance

## 6.35.0 - 2019-05-14

-   [#651](https://github.com/stripe/stripe-php/pull/651) Add support for the Capability resource and APIs

## 6.34.6 - 2019-05-13

-   [#654](https://github.com/stripe/stripe-php/pull/654) Fix typo in definition of `Event::PAYMENT_METHOD_ATTACHED` constant

## 6.34.5 - 2019-05-06

-   [#647](https://github.com/stripe/stripe-php/pull/647) Set the return type to static for more operations

## 6.34.4 - 2019-05-06

-   [#650](https://github.com/stripe/stripe-php/pull/650) Add missing constants for Event types

## 6.34.3 - 2019-05-01

-   [#644](https://github.com/stripe/stripe-php/pull/644) Update return type to `static` to improve static analysis
-   [#645](https://github.com/stripe/stripe-php/pull/645) Fix constant for `payment_intent.payment_failed`

## 6.34.2 - 2019-04-26

-   [#642](https://github.com/stripe/stripe-php/pull/642) Fix an issue where existing idempotency keys would be overwritten when using automatic retries

## 6.34.1 - 2019-04-25

-   [#640](https://github.com/stripe/stripe-php/pull/640) Add missing phpdocs

## 6.34.0 - 2019-04-24

-   [#626](https://github.com/stripe/stripe-php/pull/626) Add support for the `TaxRate` resource and APIs
-   [#639](https://github.com/stripe/stripe-php/pull/639) Fix multiple phpdoc issues

## 6.33.0 - 2019-04-22

-   [#630](https://github.com/stripe/stripe-php/pull/630) Add support for the `TaxId` resource and APIs

## 6.32.1 - 2019-04-19

-   [#636](https://github.com/stripe/stripe-php/pull/636) Correct type of `$personId` in PHPDoc

## 6.32.0 - 2019-04-18

-   [#621](https://github.com/stripe/stripe-php/pull/621) Add support for `CreditNote`

## 6.31.5 - 2019-04-12

-   [#628](https://github.com/stripe/stripe-php/pull/628) Add constants for `person.*` event types
-   [#628](https://github.com/stripe/stripe-php/pull/628) Add missing constants for `Account` and `Person`

## 6.31.4 - 2019-04-05

-   [#624](https://github.com/stripe/stripe-php/pull/624) Fix encoding of nested parameters in multipart requests

## 6.31.3 - 2019-04-02

-   [#623](https://github.com/stripe/stripe-php/pull/623) Only use HTTP/2 with curl >= 7.60.0

## 6.31.2 - 2019-03-25

-   [#619](https://github.com/stripe/stripe-php/pull/619) Fix PHPDoc return types for list methods for nested resources

## 6.31.1 - 2019-03-22

-   [#612](https://github.com/stripe/stripe-php/pull/612) Add a lot of constants
-   [#614](https://github.com/stripe/stripe-php/pull/614) Add missing subscription status constants

## 6.31.0 - 2019-03-18

-   [#600](https://github.com/stripe/stripe-php/pull/600) Add support for the `PaymentMethod` resource and APIs
-   [#606](https://github.com/stripe/stripe-php/pull/606) Add support for retrieving a Checkout `Session`
-   [#611](https://github.com/stripe/stripe-php/pull/611) Add support for deleting a Terminal `Location` and `Reader`

## 6.30.5 - 2019-03-11

-   [#607](https://github.com/stripe/stripe-php/pull/607) Correctly handle case where a metadata key is called `metadata`

## 6.30.4 - 2019-02-27

-   [#602](https://github.com/stripe/stripe-php/pull/602) Add `subscription_schedule` to `Subscription` for PHPDoc.

## 6.30.3 - 2019-02-26

-   [#603](https://github.com/stripe/stripe-php/pull/603) Improve PHPDoc on the `Source` object to cover all types of Sources currently supported.

## 6.30.2 - 2019-02-25

-   [#601](https://github.com/stripe/stripe-php/pull/601) Fix PHPDoc across multiple resources and add support for new events.

## 6.30.1 - 2019-02-16

-   [#599](https://github.com/stripe/stripe-php/pull/599) Fix PHPDoc for `SubscriptionSchedule` and `SubscriptionScheduleRevision`

## 6.30.0 - 2019-02-12

-   [#590](https://github.com/stripe/stripe-php/pull/590) Add support for `SubscriptionSchedule` and `SubscriptionScheduleRevision`

## 6.29.3 - 2019-01-31

-   [#592](https://github.com/stripe/stripe-php/pull/592) Some more PHPDoc fixes

## 6.29.2 - 2019-01-31

-   [#591](https://github.com/stripe/stripe-php/pull/591) Fix PHPDoc for nested resources

## 6.29.1 - 2019-01-25

-   [#566](https://github.com/stripe/stripe-php/pull/566) Fix dangling message contents
-   [#586](https://github.com/stripe/stripe-php/pull/586) Don't overwrite `CURLOPT_HTTP_VERSION` option

## 6.29.0 - 2019-01-23

-   [#579](https://github.com/stripe/stripe-php/pull/579) Rename `CheckoutSession` to `Session` and move it under the `Checkout` namespace. This is a breaking change, but we've reached out to affected merchants and all new merchants would use the new approach.

## 6.28.1 - 2019-01-21

-   [#580](https://github.com/stripe/stripe-php/pull/580) Properly serialize `individual` on `Account` objects

## 6.28.0 - 2019-01-03

-   [#576](https://github.com/stripe/stripe-php/pull/576) Add support for iterating directly over `Collection` instances

## 6.27.0 - 2018-12-21

-   [#571](https://github.com/stripe/stripe-php/pull/571) Add support for the `CheckoutSession` resource

## 6.26.0 - 2018-12-11

-   [#568](https://github.com/stripe/stripe-php/pull/568) Enable persistent connections

## 6.25.0 - 2018-12-10

-   [#567](https://github.com/stripe/stripe-php/pull/567) Add support for account links

## 6.24.0 - 2018-11-28

-   [#562](https://github.com/stripe/stripe-php/pull/562) Add support for the Review resource
-   [#564](https://github.com/stripe/stripe-php/pull/564) Add event name constants for subscription schedule aborted/expiring

## 6.23.0 - 2018-11-27

-   [#542](https://github.com/stripe/stripe-php/pull/542) Add support for `ValueList` and `ValueListItem` for Radar

## 6.22.1 - 2018-11-20

-   [#561](https://github.com/stripe/stripe-php/pull/561) Add cast and some docs to telemetry introduced in 6.22.0/549

## 6.22.0 - 2018-11-15

-   [#549](https://github.com/stripe/stripe-php/pull/549) Add support for client telemetry

## 6.21.1 - 2018-11-12

-   [#548](https://github.com/stripe/stripe-php/pull/548) Don't mutate `Exception` class properties from `OAuthBase` error

## 6.21.0 - 2018-11-08

-   [#537](https://github.com/stripe/stripe-php/pull/537) Add new API endpoints for the `Invoice` resource.

## 6.20.1 - 2018-11-07

-   [#546](https://github.com/stripe/stripe-php/pull/546) Drop files from the Composer package that aren't needed in the release

## 6.20.0 - 2018-10-30

-   [#536](https://github.com/stripe/stripe-php/pull/536) Add support for the `Person` resource
-   [#541](https://github.com/stripe/stripe-php/pull/541) Add support for the `WebhookEndpoint` resource

## 6.19.5 - 2018-10-17

-   [#539](https://github.com/stripe/stripe-php/pull/539) Fix methods on `\Stripe\PaymentIntent` to properly pass arguments to the API.

## 6.19.4 - 2018-10-11

-   [#534](https://github.com/stripe/stripe-php/pull/534) Fix PSR-4 autoloading for `\Stripe\FileUpload` class alias

## 6.19.3 - 2018-10-09

-   [#530](https://github.com/stripe/stripe-php/pull/530) Add constants for `flow` (`FLOW_*`), `status` (`STATUS_*`) and `usage` (`USAGE_*`) on `\Stripe\Source`

## 6.19.2 - 2018-10-08

-   [#531](https://github.com/stripe/stripe-php/pull/531) Store HTTP response headers in case-insensitive array

## 6.19.1 - 2018-09-25

-   [#526](https://github.com/stripe/stripe-php/pull/526) Ignore null values in request parameters

## 6.19.0 - 2018-09-24

-   [#523](https://github.com/stripe/stripe-php/pull/523) Add support for Stripe Terminal

## 6.18.0 - 2018-09-24

-   [#520](https://github.com/stripe/stripe-php/pull/520) Rename `\Stripe\FileUpload` to `\Stripe\File`

## 6.17.2 - 2018-09-18

-   [#522](https://github.com/stripe/stripe-php/pull/522) Fix warning when adding a new additional owner to an existing array

## 6.17.1 - 2018-09-14

-   [#517](https://github.com/stripe/stripe-php/pull/517) Integer-index encode all sequential arrays

## 6.17.0 - 2018-09-05

-   [#514](https://github.com/stripe/stripe-php/pull/514) Add support for reporting resources

## 6.16.0 - 2018-08-23

-   [#509](https://github.com/stripe/stripe-php/pull/509) Add support for usage record summaries

## 6.15.0 - 2018-08-03

-   [#504](https://github.com/stripe/stripe-php/pull/504) Add cancel support for topups

## 6.14.0 - 2018-08-02

-   [#505](https://github.com/stripe/stripe-php/pull/505) Add support for file links

## 6.13.0 - 2018-07-31

-   [#502](https://github.com/stripe/stripe-php/pull/502) Add `isDeleted()` method to `\Stripe\StripeObject`

## 6.12.0 - 2018-07-28

-   [#501](https://github.com/stripe/stripe-php/pull/501) Add support for scheduled query runs (`\Stripe\Sigma\ScheduledQueryRun`) for Sigma

## 6.11.0 - 2018-07-26

-   [#500](https://github.com/stripe/stripe-php/pull/500) Add support for Stripe Issuing

## 6.10.4 - 2018-07-19

-   [#498](https://github.com/stripe/stripe-php/pull/498) Internal improvements to the `\Stripe\ApiResource.classUrl()` method

## 6.10.3 - 2018-07-16

-   [#497](https://github.com/stripe/stripe-php/pull/497) Use HTTP/2 only for HTTPS requests

## 6.10.2 - 2018-07-11

-   [#494](https://github.com/stripe/stripe-php/pull/494) Enable HTTP/2 support

## 6.10.1 - 2018-07-10

-   [#493](https://github.com/stripe/stripe-php/pull/493) Add PHPDoc for `auto_advance` on `\Stripe\Invoice`

## 6.10.0 - 2018-06-28

-   [#488](https://github.com/stripe/stripe-php/pull/488) Add support for `$appPartnerId` to `Stripe::setAppInfo()`

## 6.9.0 - 2018-06-28

-   [#487](https://github.com/stripe/stripe-php/pull/487) Add support for payment intents

## 6.8.2 - 2018-06-24

-   [#486](https://github.com/stripe/stripe-php/pull/486) Make `Account.deauthorize()` return the `StripeObject` from the API

## 6.8.1 - 2018-06-13

-   [#472](https://github.com/stripe/stripe-php/pull/472) Added phpDoc for `ApiRequestor` and others, especially regarding thrown errors

## 6.8.0 - 2018-06-13

-   [#481](https://github.com/stripe/stripe-php/pull/481) Add new `\Stripe\Discount` and `\Stripe\OrderItem` classes, add more PHPDoc describing object attributes

## 6.7.4 - 2018-05-29

-   [#480](https://github.com/stripe/stripe-php/pull/480) PHPDoc changes for API version 2018-05-21 and the addition of the new `CHARGE_EXPIRED` event type

## 6.7.3 - 2018-05-28

-   [#479](https://github.com/stripe/stripe-php/pull/479) Fix unnecessary traits on `\Stripe\InvoiceLineItem`

## 6.7.2 - 2018-05-28

-   [#471](https://github.com/stripe/stripe-php/pull/471) Add `OBJECT_NAME` constant to all API resource classes, add `\Stripe\InvoiceLineItem` class

## 6.7.1 - 2018-05-13

-   [#468](https://github.com/stripe/stripe-php/pull/468) Update fields in PHP docs for accuracy

## 6.7.0 - 2018-05-09

-   [#466](https://github.com/stripe/stripe-php/pull/466) Add support for issuer fraud records

## 6.6.0 - 2018-04-11

-   [#460](https://github.com/stripe/stripe-php/pull/460) Add support for flexible billing primitives

## 6.5.0 - 2018-04-05

-   [#461](https://github.com/stripe/stripe-php/pull/461) Don't zero keys on non-`metadata` subobjects

## 6.4.2 - 2018-03-17

-   [#458](https://github.com/stripe/stripe-php/pull/458) Add PHPDoc for `account` on `\Stripe\Event`

## 6.4.1 - 2018-03-02

-   [#455](https://github.com/stripe/stripe-php/pull/455) Fix namespaces in PHPDoc
-   [#456](https://github.com/stripe/stripe-php/pull/456) Fix namespaces for some exceptions

## 6.4.0 - 2018-02-28

-   [#453](https://github.com/stripe/stripe-php/pull/453) Add constants for `reason` (`REASON_*`) and `status` (`STATUS_*`) on `\Stripe\Dispute`

## 6.3.2 - 2018-02-27

-   [#452](https://github.com/stripe/stripe-php/pull/452) Add PHPDoc for `amount_paid` and `amount_remaining` on `\Stripe\Invoice`

## 6.3.1 - 2018-02-26

-   [#443](https://github.com/stripe/stripe-php/pull/443) Add event types as constants to `\Stripe\Event` class

## 6.3.0 - 2018-02-23

-   [#450](https://github.com/stripe/stripe-php/pull/450) Add support for `code` attribute on all Stripe exceptions

## 6.2.0 - 2018-02-21

-   [#440](https://github.com/stripe/stripe-php/pull/440) Add support for topups
-   [#442](https://github.com/stripe/stripe-php/pull/442) Fix PHPDoc for `\Stripe\Error\SignatureVerification`

## 6.1.0 - 2018-02-12

-   [#435](https://github.com/stripe/stripe-php/pull/435) Fix header persistence on `Collection` objects
-   [#436](https://github.com/stripe/stripe-php/pull/436) Introduce new `Idempotency` error class

## 6.0.0 - 2018-02-07

Major version release. List of backwards incompatible changes to watch out for:

-   The minimum PHP version is now 5.4.0. If you're using PHP 5.3 or older, consider upgrading to a more recent version.

*   `\Stripe\AttachedObject` no longer exists. Attributes that used to be instances of `\Stripe\AttachedObject` (such as `metadata`) are now instances of `\Stripe\StripeObject`.

-   Attributes that used to be PHP arrays (such as `legal_entity->additional_owners` on `\Stripe\Account` instances) are now instances of `\Stripe\StripeObject`, except when they are empty. `\Stripe\StripeObject` has array semantics so this should not be an issue unless you are actively checking types.

*   `\Stripe\Collection` now derives from `\Stripe\StripeObject` rather than from `\Stripe\ApiResource`.

Pull requests included in this release:

-   [#410](https://github.com/stripe/stripe-php/pull/410) Drop support for PHP 5.3
-   [#411](https://github.com/stripe/stripe-php/pull/411) Use traits for common API operations
-   [#414](https://github.com/stripe/stripe-php/pull/414) Use short array syntax
-   [#404](https://github.com/stripe/stripe-php/pull/404) Fix serialization logic
-   [#417](https://github.com/stripe/stripe-php/pull/417) Remove `ExternalAccount` class
-   [#418](https://github.com/stripe/stripe-php/pull/418) Increase test coverage
-   [#421](https://github.com/stripe/stripe-php/pull/421) Update CA bundle and add script for future updates
-   [#422](https://github.com/stripe/stripe-php/pull/422) Use vendored CA bundle for all requests
-   [#428](https://github.com/stripe/stripe-php/pull/428) Support for automatic request retries

## 5.9.2 - 2018-02-07

-   [#431](https://github.com/stripe/stripe-php/pull/431) Update PHPDoc @property tags for latest API version

## 5.9.1 - 2018-02-06

-   [#427](https://github.com/stripe/stripe-php/pull/427) Add and update PHPDoc @property tags on all API resources

## 5.9.0 - 2018-01-17

-   [#421](https://github.com/stripe/stripe-php/pull/421) Updated bundled CA certificates
-   [#423](https://github.com/stripe/stripe-php/pull/423) Escape unsanitized input in OAuth example

## 5.8.0 - 2017-12-20

-   [#403](https://github.com/stripe/stripe-php/pull/403) Add `__debugInfo()` magic method to `StripeObject`

## 5.7.0 - 2017-11-28

-   [#390](https://github.com/stripe/stripe-php/pull/390) Remove some unsupported API methods
-   [#391](https://github.com/stripe/stripe-php/pull/391) Alphabetize the list of API resources in `Util::convertToStripeObject()` and add missing resources
-   [#393](https://github.com/stripe/stripe-php/pull/393) Fix expiry date update for card sources

## 5.6.0 - 2017-10-31

-   [#386](https://github.com/stripe/stripe-php/pull/386) Support for exchange rates APIs

## 5.5.1 - 2017-10-30

-   [#387](https://github.com/stripe/stripe-php/pull/387) Allow `personal_address_kana` and `personal_address_kanji` to be updated on an account

## 5.5.0 - 2017-10-27

-   [#385](https://github.com/stripe/stripe-php/pull/385) Support for listing source transactions

## 5.4.0 - 2017-10-24

-   [#383](https://github.com/stripe/stripe-php/pull/383) Add static methods to manipulate resources from parent
    -   `Account` gains methods for external accounts and login links (e.g. `createExternalAccount`, `createLoginLink`)
    -   `ApplicationFee` gains methods for refunds
    -   `Customer` gains methods for sources
    -   `Transfer` gains methods for reversals

## 5.3.0 - 2017-10-11

-   [#378](https://github.com/stripe/stripe-php/pull/378) Rename source `delete` to `detach` (and deprecate the former)

## 5.2.3 - 2017-09-27

-   Add PHPDoc for `Card`

## 5.2.2 - 2017-09-20

-   Fix deserialization mapping of `FileUpload` objects

## 5.2.1 - 2017-09-14

-   Serialized `shipping` nested attribute

## 5.2.0 - 2017-08-29

-   Add support for `InvalidClient` OAuth error

## 5.1.3 - 2017-08-14

-   Allow `address_kana` and `address_kanji` to be updated for custom accounts

## 5.1.2 - 2017-08-01

-   Fix documented return type of `autoPagingIterator()` (was missing namespace)

## 5.1.1 - 2017-07-03

-   Fix order returns to use the right URL `/v1/order_returns`

## 5.1.0 - 2017-06-30

-   Add support for OAuth

## 5.0.0 - 2017-06-27

-   `pay` on invoice now takes params as well as opts

## 4.13.0 - 2017-06-19

-   Add support for ephemeral keys

## 4.12.0 - 2017-06-05

-   Clients can implement `getUserAgentInfo()` to add additional user agent information

## 4.11.0 - 2017-06-05

-   Implement `Countable` for `AttachedObject` (`metadata` and `additional_owners`)

## 4.10.0 - 2017-05-25

-   Add support for login links

## 4.9.1 - 2017-05-10

-   Fix docs to include arrays on `$id` parameter for retrieve methods

## 4.9.0 - 2017-04-28

-   Support for checking webhook signatures

## 4.8.1 - 2017-04-24

-   Allow nested field `payout_schedule` to be updated

## 4.8.0 - 2017-04-20

-   Add `\Stripe\Stripe::setLogger()` to support an external PSR-3 compatible logger

## 4.7.0 - 2017-04-10

-   Add support for payouts and recipient transfers

## 4.6.0 - 2017-04-06

-   Please see 4.7.0 instead (no-op release)

## 4.5.1 - 2017-03-22

-   Remove hard dependency on cURL

## 4.5.0 - 2017-03-20

-   Support for detaching sources from customers

## 4.4.2 - 2017-02-27

-   Correct handling of `owner` parameter when updating sources

## 4.4.1 - 2017-02-24

-   Correct the error check on a bad JSON decoding

## 4.4.0 - 2017-01-18

-   Add support for updating sources

## 4.3.0 - 2016-11-30

-   Add support for verifying sources

## 4.2.0 - 2016-11-21

-   Add retrieve method for 3-D Secure resources

## 4.1.1 - 2016-10-21

-   Add docblock with model properties for `Plan`

## 4.1.0 - 2016-10-18

-   Support for 403 status codes (permission denied)

## 4.0.1 - 2016-10-17

-   Fix transfer reversal materialization
-   Fixes for some property definitions in docblocks

## 4.0.0 - 2016-09-28

-   Support for subscription items
-   Drop attempt to force TLS 1.2: please note that this could be breaking if you're using old OS distributions or packages and upgraded recently (so please make sure to test your integration!)

## 3.23.0 - 2016-09-15

-   Add support for Apple Pay domains

## 3.22.0 - 2016-09-13

-   Add `Stripe::setAppInfo` to allow plugins to register user agent information

## 3.21.0 - 2016-08-25

-   Add `Source` model for generic payment sources

## 3.20.0 - 2016-08-08

-   Add `getDeclineCode` to card errors

## 3.19.0 - 2016-07-29

-   Opt requests directly into TLS 1.2 where OpenSSL >= 1.0.1 (see #277 for context)

## 3.18.0 - 2016-07-28

-   Add new `STATUS_` constants for subscriptions

## 3.17.1 - 2016-07-28

-   Fix auto-paging iterator so that it plays nicely with `iterator_to_array`

## 3.17.0 - 2016-07-14

-   Add field annotations to model classes for better editor hinting

## 3.16.0 - 2016-07-12

-   Add `ThreeDSecure` model for 3-D secure payments

## 3.15.0 - 2016-06-29

-   Add static `update` method to all resources that can be changed.

## 3.14.3 - 2016-06-20

-   Make sure that cURL never sends `Expects: 100-continue`, even on large request bodies

## 3.14.2 - 2016-06-03

-   Add `inventory` under `SKU` to list of keys that have nested data and can be updated

## 3.14.1 - 2016-05-27

-   Fix some inconsistencies in PHPDoc

## 3.14.0 - 2016-05-25

-   Add support for returning Relay orders

## 3.13.0 - 2016-05-04

-   Add `list`, `create`, `update`, `retrieve`, and `delete` methods to the Subscription class

## 3.12.1 - 2016-04-07

-   Additional check on value arrays for some extra safety

## 3.12.0 - 2016-03-31

-   Fix bug `refreshFrom` on `StripeObject` would not take an `$opts` array
-   Fix bug where `$opts` not passed to parent `save` method in `Account`
-   Fix bug where non-existent variable was referenced in `reverse` in `Transfer`
-   Update CA cert bundle for compatibility with OpenSSL versions below 1.0.1

## 3.11.0 - 2016-03-22

-   Allow `CurlClient` to be initialized with default `CURLOPT_*` options

## 3.10.1 - 2016-03-22

-   Fix bug where request params and options were ignored in `ApplicationFee`'s `refund.`

## 3.10.0 - 2016-03-15

-   Add `reject` on `Account` to support the new API feature

## 3.9.2 - 2016-03-04

-   Fix error when an object's metadata is set more than once

## 3.9.1 - 2016-02-24

-   Fix encoding behavior of nested arrays for requests (see #227)

## 3.9.0 - 2016-02-09

-   Add automatic pagination mechanism with `autoPagingIterator()`
-   Allow global account ID to be set with `Stripe::setAccountId()`

## 3.8.0 - 2016-02-08

-   Add `CountrySpec` model for looking up country payment information

## 3.7.1 - 2016-02-01

-   Update bundled CA certs

## 3.7.0 - 2016-01-27

-   Support deleting Relay products and SKUs

## 3.6.0 - 2016-01-05

-   Allow configuration of HTTP client timeouts

## 3.5.0 - 2015-12-01

-   Add a verification routine for external accounts

## 3.4.0 - 2015-09-14

-   Products, SKUs, and Orders -- https://stripe.com/relay

## 3.3.0 - 2015-09-11

-   Add support for 429 Rate Limit response

## 3.2.0 - 2015-08-17

-   Add refund listing and retrieval without an associated charge

## 3.1.0 - 2015-08-03

-   Add dispute listing and retrieval
-   Add support for manage account deletion

## 3.0.0 - 2015-07-28

-   Rename `\Stripe\Object` to `\Stripe\StripeObject` (PHP 7 compatibility)
-   Rename `getCode` and `getParam` in exceptions to `getStripeCode` and `getStripeParam`
-   Add support for calling `json_encode` on Stripe objects in PHP 5.4+
-   Start supporting/testing PHP 7

## 2.3.0 - 2015-07-06

-   Add request ID to all Stripe exceptions

## 2.2.0 - 2015-06-01

-   Add support for Alipay accounts as sources
-   Add support for bank accounts as sources (private beta)
-   Add support for bank accounts and cards as external_accounts on Account objects

## 2.1.4 - 2015-05-13

-   Fix CA certificate file path (thanks @lphilps & @matthewarkin)

## 2.1.3 - 2015-05-12

-   Fix to account updating to permit `tos_acceptance` and `personal_address` to be set properly
-   Fix to Transfer reversal creation (thanks @neatness!)
-   Network requests are now done through a swappable class for easier mocking

## 2.1.2 - 2015-04-10

-   Remove SSL cert revokation checking (all pre-Heartbleed certs have expired)
-   Bug fixes to account updating

## 2.1.1 - 2015-02-27

-   Support transfer reversals

## 2.1.0 - 2015-02-19

-   Support new API version (2015-02-18)
-   Added Bitcoin Receiever update and delete actions
-   Edited tests to prefer "source" over "card" as per new API version

## 2.0.1 - 2015-02-16

-   Fix to fetching endpoints that use a non-default baseUrl (`FileUpload`)

## 2.0.0 - 2015-02-14

-   Bumped minimum version to 5.3.3
-   Switched to Stripe namespace instead of Stripe\_ class name prefiexes (thanks @chadicus!)
-   Switched tests to PHPUnit (thanks @chadicus!)
-   Switched style guide to PSR2 (thanks @chadicus!)
-   Added \$opts hash to the end of most methods: this permits passing 'idempotency_key', 'stripe_account', or 'stripe_version'. The last 2 will persist across multiple object loads.
-   Added support for retrieving Account by ID

## 1.18.0 - 2015-01-21

-   Support making bitcoin charges through BitcoinReceiver source object

## 1.17.5 - 2014-12-23

-   Adding support for creating file uploads.

## 1.17.4 - 2014-12-15

-   Saving objects fetched with a custom key now works (thanks @JustinHook & @jpasilan)
-   Added methods for reporting charges as safe or fraudulent and for specifying the reason for refunds

## 1.17.3 - 2014-11-06

-   Better handling of HHVM support for SSL certificate blacklist checking.

## 1.17.2 - 2014-09-23

-   Coupons now are backed by a `Stripe_Coupon` instead of `Stripe_Object`, and support updating metadata
-   Running operations (`create`, `retrieve`, `all`) on upcoming invoice items now works

## 1.17.1 - 2014-07-31

-   Requests now send Content-Type header

## 1.17.0 - 2014-07-29

-   Application Fee refunds now a list instead of array
-   HHVM now works
-   Small bug fixes (thanks @bencromwell & @fastest963)
-   `__toString` now returns the name of the object in addition to its JSON representation

## 1.16.0 - 2014-06-17

-   Add metadata for refunds and disputes

## 1.15.0 - 2014-05-28

-   Support canceling transfers

## 1.14.1 - 2014-05-21

-   Support cards for recipients.

## 1.13.1 - 2014-05-15

-   Fix bug in account resource where `id` wasn't in the result

## 1.13.0 - 2014-04-10

-   Add support for certificate blacklisting
-   Update ca bundle
-   Drop support for HHVM (Temporarily)

## 1.12.0 - 2014-04-01

-   Add Stripe_RateLimitError for catching rate limit errors.
-   Update to Zend coding style (thanks, @jpiasetz)

## 1.11.0 - 2014-01-29

-   Add support for multiple subscriptions per customer

## 1.10.1 - 2013-12-02

-   Add new ApplicationFee

## 1.9.1 - 2013-11-08

-   Fix a bug where a null nestable object causes warnings to fire.

## 1.9.0 - 2013-10-16

-   Add support for metadata API.

## 1.8.4 - 2013-09-18

-   Add support for closing disputes.

## 1.8.3 - 2013-08-13

-   Add new Balance and BalanceTransaction

## 1.8.2 - 2013-08-12

-   Add support for unsetting attributes by updating to NULL. Setting properties to a blank string is now an error.

## 1.8.1 - 2013-07-12

-   Add support for multiple cards API (Stripe API version 2013-07-12: https://docs.stripe.com/changelog/2013-07-05)

## 1.8.0 - 2013-04-11

-   Allow Transfers to be creatable
-   Add new Recipient resource

## 1.7.15 - 2013-02-21

-   Add 'id' to the list of permanent object attributes

## 1.7.14 - 2013-02-20

-   Don't re-encode strings that are already encoded in UTF-8. If you were previously using plan or coupon objects with UTF-8 IDs, they may have been treated as ISO-8859-1 (Latin-1) and encoded to UTF-8 a 2nd time. You may now need to pass the IDs to utf8_encode before passing them to Stripe_Plan::retrieve or Stripe_Coupon::retrieve.
-   Ensure that all input is encoded in UTF-8 before submitting it to Stripe's servers. (github issue #27)

## 1.7.13 - 2013-02-01

-   Add support for passing options when retrieving Stripe objects e.g., Stripe_Charge::retrieve(array("id"=>"foo", "expand" => array("customer"))); Stripe_Charge::retrieve("foo") will continue to work

## 1.7.12 - 2013-01-15

-   Add support for setting a Stripe API version override

## 1.7.11 - 2012-12-30

-   Version bump to cleanup constants and such (fix issue #26)

## 1.7.10 - 2012-11-08

-   Add support for updating charge disputes.
-   Fix bug preventing retrieval of null attributes

## 1.7.9 - 2012-11-08

-   Fix usage under autoloaders such as the one generated by composer (fix issue #22)

## 1.7.8 - 2012-10-30

-   Add support for creating invoices.
-   Add support for new invoice lines return format
-   Add support for new list objects

## 1.7.7 - 2012-09-14

-   Get all of the various version numbers in the repo in sync (no other changes)

## 1.7.6 - 2012-08-31

-   Add update and pay methods to Invoice resource

## 1.7.5 - 2012-08-23

-   Change internal function names so that Stripe_SingletonApiRequest is E_STRICT-clean (github issue #16)

## 1.7.4 - 2012-08-21

-   Bugfix so that Stripe objects (e.g. Customer, Charge objects) used in API calls are transparently converted to their object IDs

## 1.7.3 - 2012-08-15

-   Add new Account resource

## 1.7.2 - 2012-06-26

-   Make clearer that you should be including lib/Stripe.php, not test/Stripe.php (github issue #14)

## 1.7.1 - 2012-05-24

-   Add missing argument to Stripe_InvalidRequestError constructor in Stripe_ApiResource::instanceUrl. Fixes a warning when Stripe_ApiResource::instanceUrl is called on a resource with no ID (fix issue #12)

## 1.7.0 - 2012-05-17

-   Support Composer and Packagist (github issue #9)
-   Add new deleteDiscount method to Stripe_Customer
-   Add new Transfer resource
-   Switch from using HTTP Basic auth to Bearer auth. (Note: Stripe will support Basic auth for the indefinite future, but recommends Bearer auth when possible going forward)
-   Numerous test suite improvements
