---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/2072
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.2.0
---

* Add support for new resource `V2.Commerce.ProductCatalogImport`
* Add support for `create` and `retrieve` methods on resource `V2.Commerce.ProductCatalogImport`
* Add support for `bizum_payments` and `scalapay_payments` on `Account.capabilities`, `Account.create().$params.capability`, and `Account.update().$params.capability`
* Add support for `automatic_transfer_rules_by_currency` on `BalanceSettings.payments.payouts` and `BalanceSettings.update().$params.payment.payout`
* Add support for `start_of_day` on `BalanceSettings.payments.settlement_timing` and `BalanceSettings.update().$params.payment.settlement_timing`
* Add support for `description` on `Charge.create().$params.transfer_datum`, `PaymentIntent.create().$params.transfer_datum`, `PaymentIntent.transfer_data`, and `PaymentIntent.update().$params.transfer_datum`
* Add support for `bizum` on `Charge.payment_method_details`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.confirm().$params.payment_method_option`, `SetupIntent.create().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_option`, `SetupIntent.payment_method_options`, `SetupIntent.update().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_option`
* Add support for `scalapay` on `Charge.payment_method_details`, `Checkout.Session.payment_method_options`, `Checkout\Session.create().$params.payment_method_option`, `ConfirmationToken.create().$params.payment_method_datum`, `ConfirmationToken.payment_method_preview`, `PaymentAttemptRecord.payment_method_details`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_option`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_option`, `PaymentIntent.payment_method_options`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_option`, `PaymentMethod.create().$params`, `PaymentMethodConfiguration.create().$params`, `PaymentMethodConfiguration.update().$params`, `PaymentMethodConfiguration`, `PaymentMethod`, `PaymentRecord.payment_method_details`, `Refund.destination_details`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Add support for `mandate` on `Charge.payment_method_details.twint`, `PaymentAttemptRecord.payment_method_details.twint`, and `PaymentRecord.payment_method_details.twint`
* Change type of `Checkout\Session.create().$params.payment_method_option.twint.setup_future_usage`, `PaymentIntent.confirm().$params.payment_method_option.twint.setup_future_usage`, `PaymentIntent.create().$params.payment_method_option.twint.setup_future_usage`, and `PaymentIntent.update().$params.payment_method_option.twint.setup_future_usage` from `literal('none')` to `enum('none'|'off_session')`
* ⚠️ Change type of `Checkout.Session.payment_method_options.twint.setup_future_usage` and `PaymentIntent.payment_method_options.twint.setup_future_usage` from `literal('none')` to `enum('none'|'off_session')`
* Add support for new values `bizum` and `scalapay` on enums `ConfirmationToken.payment_method_preview.type` and `PaymentMethod.type`
* Add support for `credited_items` on `InvoiceItem.proration_details`
* Add support for `discountable` on `Invoice.create_preview().$params.schedule_detail.phase.add_invoice_item`, `Subscription.create().$params.add_invoice_item`, `Subscription.update().$params.add_invoice_item`, `SubscriptionSchedule.create().$params.phase.add_invoice_item`, `SubscriptionSchedule.phases[].add_invoice_items[]`, and `SubscriptionSchedule.update().$params.phase.add_invoice_item`
* Add support for `billing_schedules` on `Invoice.create_preview().$params.subscription_detail`, `Subscription.create().$params`, `Subscription.update().$params`, and `Subscription`
* Add support for `amount_paid_off_stripe` on `Invoice`
* Add support for new value `twint` on enums `Invoice.payment_settings.payment_method_types` and `Subscription.payment_settings.payment_method_types`
* Add support for `twint` on `Mandate.payment_method_details` and `SetupAttempt.payment_method_details`
* Add support for `metadata` on `PaymentIntent.create().$params.transfer_datum`, `PaymentIntent.transfer_data`, `PaymentIntent.update().$params.transfer_datum`, and `Subscription.pending_update`
* Add support for `payment_data` on `PaymentIntent.create().$params.transfer_datum`, `PaymentIntent.transfer_data`, and `PaymentIntent.update().$params.transfer_datum`
* Add support for new values `bizum` and `scalapay` on enums `PaymentIntent.excluded_payment_method_types` and `SetupIntent.excluded_payment_method_types`
* Add support for `blik_authorize` on `PaymentIntent.next_action` and `SetupIntent.next_action`
* Add support for `payment_method_options` on `PaymentLink.create().$params`, `PaymentLink.update().$params`, and `PaymentLink`
* Add support for new value `bizum` on enum `PaymentLink.payment_method_types`
* Add support for `active` on `PaymentMethodConfiguration.all().$params`
* Add support for `billed_until` on `SubscriptionItem`
* Add support for `discount` and `discounts` on `Subscription.pending_update`
* Add support for `verifone_m425`, `verifone_p630`, `verifone_ux700`, and `verifone_v660p` on `Terminal.Configuration`, `Terminal\Configuration.create().$params`, and `Terminal\Configuration.update().$params`
* Add support for `api_error` and `print_content` on `Terminal.Reader.action`
* Add support for new value `print_content` on enum `Terminal.Reader.action.type`
* Add support for new values `simulated_verifone_m425`, `simulated_verifone_p630`, `simulated_verifone_ux700`, `simulated_verifone_v660p`, `verifone_m425`, `verifone_p630`, `verifone_ux700`, and `verifone_v660p` on enum `Terminal.Reader.device_type`
* Add support for `customer` on `TestHelpers\TestClock.create().$params`
* Add support for `signer` on `V2.Core.Account.identity.business_details.documents.proof_of_registration`, `V2.Core.Account.identity.business_details.documents.proof_of_ultimate_beneficial_ownership`, `V2\Core\Account.create().$params.identity.business_detail.document.proof_of_registration`, `V2\Core\Account.create().$params.identity.business_detail.document.proof_of_ultimate_beneficial_ownership`, `V2\Core\Account.update().$params.identity.business_detail.document.proof_of_registration`, `V2\Core\Account.update().$params.identity.business_detail.document.proof_of_ultimate_beneficial_ownership`, `V2\Core\AccountToken.create().$params.identity.business_detail.document.proof_of_registration`, and `V2\Core\AccountToken.create().$params.identity.business_detail.document.proof_of_ultimate_beneficial_ownership`
* Add support for `azure_event_grid` on `V2.Core.EventDestination` and `V2\Core\EventDestination.create().$params`
* Add support for new value `no_azure_partner_topic_exists` on enum `V2.Core.EventDestination.status_details.disabled.reason`
* Add support for new value `azure_event_grid` on enum `V2.Core.EventDestination.type`
* Add support for new value `meter_event_value_too_many_digits` on enums `EventsV1BillingMeterErrorReportTriggeredEvent.reason.error_types[].code` and `EventsV1BillingMeterNoMeterFoundEvent.reason.error_types[].code`
* Add support for event notifications `V2CommerceProductCatalogImportsFailedEvent`, `V2CommerceProductCatalogImportsProcessingEvent`, `V2CommerceProductCatalogImportsSucceededEvent`, and `V2CommerceProductCatalogImportsSucceededWithErrorsEvent` with related object `V2.Commerce.ProductCatalogImport`
* Add support for error codes `payment_method_microdeposit_processing_error` and `siret_invalid` on `Invoice.last_finalization_error`, `PaymentIntent.last_payment_error`, `SetupAttempt.setup_error`, `SetupIntent.last_setup_error`, and `StripeError`
