---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2055
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.1.0-alpha.4
---

* Add support for new resources `V2.Core.WorkflowRun` and `V2.Core.Workflow`
* Add support for `report_authorized` method on resource `PaymentAttemptRecord`
* Add support for `all` and `retrieve` methods on resource `V2.Core.WorkflowRun`
* Add support for `all`, `invoke`, and `retrieve` methods on resource `V2.Core.Workflow`
* Add support for `next_action` and `status` on `SharedPayment.IssuedToken`
* ⚠️ Remove support for `network_id` on `SharedPayment.IssuedToken.seller_details`
* Add support for `bills` on `AccountSession.components`
* Add support for `settlement_currencies` on `BalanceSettings.payments` and `BalanceSettings.update().$params.payment`
* Add support for `default_settlement_currency` on `BalanceSettings.payments`
* Add support for `account_funding` on `Charge.payment_method_details.card`
* Add support for `automatic_surcharge` on `Checkout.Session`, `Checkout\Session.create().$params`, `PaymentLink.create().$params`, and `PaymentLink`
* Add support for `bizum` on `Checkout.Session.payment_method_options` and `Checkout\Session.create().$params.payment_method_option`
* Add support for `surcharge_cost` on `Checkout.Session`
* Add support for `amount_surcharge` on `Checkout.Session.total_details`
* Add support for `shared_payment_granted_token` on `ConfirmationToken.create().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_datum`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Add support for `details` on `Identity.VerificationReport.email`
* Add support for new value `email` on enums `Identity.VerificationReport.type` and `Identity.VerificationSession.type`
* Add support for `confirm` on `Identity\VerificationSession.create().$params` and `Identity\VerificationSession.update().$params`
* Add support for `subscription` on `InvoiceItem.parent.schedule_details`
* ⚠️ Remove support for `shared_payment_granted_token` on `PaymentIntent.confirm().$params` and `PaymentIntent.create().$params`
* Add support for `money_services` on `PaymentIntent.payment_details`
* ⚠️ Remove support for `external_reference` on `Plan`
* Change `SharedPayment.GrantedToken.payment_method_details.billing_details` to be required
