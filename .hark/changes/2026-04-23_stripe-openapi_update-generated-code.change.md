---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/2050
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.2.0-beta.1
---

* Add support for new resources `SharedPayment.GrantedToken` and `SharedPayment.IssuedToken`
* Add support for `retrieve` method on resource `SharedPayment.GrantedToken`
* Add support for `create` and `revoke` test helper methods on resource `SharedPayment.GrantedToken`
* Add support for `create`, `retrieve`, and `revoke` methods on resource `SharedPayment.IssuedToken`
* Add support for `blik` on `Checkout\Session.create().$params.payment_method_option`, `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `QuotePreviewInvoice.payment_settings.payment_method_options`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
* Add support for new values `fo_vat`, `gi_tin`, `it_cf`, and `py_ruc` on enums `Checkout.Session.collected_information.tax_ids[].type`, `Order.tax_details.tax_ids[].type`, and `QuotePreviewInvoice.customer_tax_ids[].type`
* Change `Checkout.Session.managed_payments`, `PaymentIntent.managed_payments`, `PaymentLink.managed_payments`, and `Subscription.managed_payments` to be required
* Add support for `shared_payment_granted_token` on `ConfirmationToken.create().$params.payment_method_datum`, `PaymentIntent.confirm().$params.payment_method_datum`, `PaymentIntent.create().$params.payment_method_datum`, `PaymentIntent.update().$params.payment_method_datum`, `PaymentMethod`, `SetupIntent.confirm().$params.payment_method_datum`, `SetupIntent.create().$params.payment_method_datum`, and `SetupIntent.update().$params.payment_method_datum`
* Change `Invoice.payment_settings.payment_method_options.pix`, `QuotePreviewInvoice.payment_settings.payment_method_options.pix`, and `Subscription.payment_settings.payment_method_options.pix` to be required
* Change `Invoice.payment_settings.payment_method_options.upi`, `QuotePreviewInvoice.payment_settings.payment_method_options.upi`, and `Subscription.payment_settings.payment_method_options.upi` to be required
* Add support for `validation_errors` on `Privacy.RedactionJob`
* Add support for `tax_details` on `Product`
* Add support for new value `blik` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
* Change type of `QuotePreviewInvoice.total_taxes[].tax_rate_details.tax_rate` from `string` to `expandable($TaxRate)`
* ⚠️ Change type of `Radar.PaymentEvaluation.client_device_metadata_details.radar_session` from `string` to `nullable(string)`
* Change `SetupIntent.next_action.pix_display_qr_code.data` to be required
* Change `SetupIntent.next_action.pix_display_qr_code.expires_at` to be required
* Change `SetupIntent.next_action.pix_display_qr_code.hosted_instructions_url` to be required
* Change `SetupIntent.next_action.pix_display_qr_code.image_url_png` to be required
* Change `SetupIntent.next_action.pix_display_qr_code.image_url_svg` to be required
* Add support for `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on `Tax\Registration.create().$params.country_option.me`
* Add support for `purpose` on `Treasury.OutboundPayment` and `Treasury\OutboundPayment.create().$params`
* Add support for error codes `action_blocked` and `approval_required` on `QuotePreviewInvoice.last_finalization_error`
