---
title: Support for APIs in the new API version 2025-03-31.basil
pr_link: https://github.com/stripe/stripe-php/pull/1818
is_breaking: true
is_stripe_api_change: true
released_in_version: 17.0.0
---

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
