---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2051
is_breaking: true
is_stripe_api_change: true
released_in_version: 20.1.0-alpha.2
---

* Add support for new resources `SharedPayment.IssuedToken` and `V2.Data.Reporting.QueryRun`
* Add support for `create` and `retrieve` methods on resource `V2.Data.Reporting.QueryRun`
* Add support for `pause` and `resume` methods on resource `V2.Payments.OffSessionPayment`
* Add support for `tenant_keys`, `tenant_operator`, and `tenant_values` on `Billing\MeterEventSummary.all().$params`
* Add support for `money_services` on `Charge.capture().$params.payment_detail`, `Charge.update().$params.payment_detail`, `PaymentIntent.capture().$params.payment_detail`, `PaymentIntent.confirm().$params.payment_detail`, `PaymentIntent.create().$params.payment_detail`, and `PaymentIntent.update().$params.payment_detail`
* Add support for `payment_method_options` on `DelegatedCheckout.RequestedSession`, `DelegatedCheckout\RequestedSession.create().$params`, and `DelegatedCheckout\RequestedSession.update().$params`
* ⚠️ Remove support for `payment_method_data` on `DelegatedCheckout\RequestedSession.confirm().$params`, `DelegatedCheckout\RequestedSession.create().$params`, and `DelegatedCheckout\RequestedSession.update().$params`
* Add support for `card_brands` and `payment_method_types` on `DelegatedCheckout.RequestedSession.seller_details`
* Change type of `DelegatedCheckout.RequestedSession.shared_payment_issued_token` from `string` to `expandable($SharedPayment.IssuedToken)`
* Add support for `check_scan` on `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `QuotePreviewInvoice.payment_settings.payment_method_options`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
* Add support for new value `check_scan` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
* Add support for `processor_details` on `PaymentAttemptRecord.report_failed().$params`, `PaymentAttemptRecord.report_guaranteed().$params`, `PaymentRecord.report_payment().$params.failed`, `PaymentRecord.report_payment().$params.guaranteed`, `PaymentRecord.report_payment_attempt().$params.failed`, `PaymentRecord.report_payment_attempt().$params.guaranteed`, `PaymentRecord.report_payment_attempt_failed().$params`, and `PaymentRecord.report_payment_attempt_guaranteed().$params`
* Add support for `payment_details` on `PaymentIntent.confirm().$params.payment_method_option.card_present`, `PaymentIntent.confirm().$params.payment_method_option.card`, `PaymentIntent.create().$params.payment_method_option.card_present`, `PaymentIntent.create().$params.payment_method_option.card`, `PaymentIntent.update().$params.payment_method_option.card_present`, and `PaymentIntent.update().$params.payment_method_option.card`
* ⚠️ Remove support for `bill_from` on `QuotePreviewSubscriptionSchedule.billing_schedules[]`, `Subscription.billing_schedules[]`, and `SubscriptionSchedule.billing_schedules[]`
* Add support for `agent_details`, `payment_method_details`, and `risk_details` on `SharedPayment.GrantedToken`
* Add support for `paper_checks` on `V2.Account.configuration.recipient_data.features`, `V2.Core.Account.configuration.recipient.capabilities`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments`, `V2\Account.create().$params.configuration.recipient_datum.feature`, `V2\Account.update().$params.configuration.recipient_datum.feature`, `V2\Core\Account.create().$params.configuration.recipient.capability`, `V2\Core\Account.create().$params.configuration.storer.capability.outbound_payment`, `V2\Core\Account.update().$params.configuration.recipient.capability`, and `V2\Core\Account.update().$params.configuration.storer.capability.outbound_payment`
* Add support for new value `paper_checks` on enum `V2.Account.configuration.supportable_features.recipient_data`
* Add support for new value `paper_checks` on enum `V2.Account.requirements[].impact.required_for_features`
* ⚠️ Change type of `V2.Billing.Cadence.settings_data.collection.payment_method_options.konbini`, `V2.Billing.CollectionSetting.payment_method_options.konbini`, `V2.Billing.CollectionSettingVersion.payment_method_options.konbini`, `V2\Billing\CollectionSetting.create().$params.payment_method_option.konbini`, and `V2\Billing\CollectionSetting.update().$params.payment_method_option.konbini` from `map(string: dynamic)` to `an object`
* ⚠️ Change type of `V2.Billing.Cadence.settings_data.collection.payment_method_options.sepa_debit`, `V2.Billing.CollectionSetting.payment_method_options.sepa_debit`, `V2.Billing.CollectionSettingVersion.payment_method_options.sepa_debit`, `V2\Billing\CollectionSetting.create().$params.payment_method_option.sepa_debit`, and `V2\Billing\CollectionSetting.update().$params.payment_method_option.sepa_debit` from `map(string: dynamic)` to `an object`
* Add support for `id` on `V2.Billing.CadenceSpendModifier.max_billing_period_spend.amount.custom_pricing_unit`, `V2.Billing.IntentAction.apply.spend_modifier_rule.max_billing_period_spend.amount.custom_pricing_unit`, and `V2\Billing\Intent.create().$params.action.apply.spend_modifier_rule.max_billing_period_spend.amount.custom_pricing_unit`
* Add support for new values `outbound_payments.paper_checks` and `paper_checks` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
* Add support for new values `bm_crn`, `bo_tin`, `bt_tpn`, `co_nit`, `ec_ruc`, `eg_tin`, `gh_tin`, `gy_tin`, `hn_rtn`, `jm_trn`, `jo_crn`, `ke_pin`, `ky_crn`, `lk_tin`, `mo_tin`, `mv_tin`, `ng_tin`, `pa_ruc`, `ph_tin`, `py_ruc`, `sl_tin`, `sv_nit`, `uy_ruc`, `vg_cn`, and `za_tin` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
* Add support for new values `bm_pp`, `bo_ci`, `bt_cid`, `eg_tin`, `gh_pin`, `gy_tin`, `hn_rtn`, `jm_trn`, `jo_pin`, `ky_pp`, `lk_nic`, `mo_bir`, `mt_nic`, `mv_tin`, `pa_ruc`, `ph_tin`, `py_ruc`, `si_pin`, `sv_nit`, and `vg_pp` on enums `V2.Core.Account.identity.individual.id_numbers[].type` and `V2.Core.AccountPerson.id_numbers[].type`
* ⚠️ Change type of `V2.Core.Event.reason.request.client.stripe_action` from `map(string: dynamic)` to `an object`
* ⚠️ Change type of `V2.MoneyManagement.InboundTransfer.transfer_history[].bank_debit_processing` from `map(string: dynamic)` to `an object`
* ⚠️ Change type of `V2.MoneyManagement.InboundTransfer.transfer_history[].bank_debit_queued` from `map(string: dynamic)` to `an object`
* ⚠️ Change type of `V2.MoneyManagement.InboundTransfer.transfer_history[].bank_debit_succeeded` from `map(string: dynamic)` to `an object`
* Add support for new values `paper_check_attachment_too_large`, `paper_check_expired`, and `paper_check_undeliverable` on enum `V2.MoneyManagement.OutboundPayment.status_details.failed.reason`
* ⚠️ Remove support for `town` on `V2.MoneyManagement.OutboundPayment.tracking_details.paper_check.mailing_address`
* Change `V2.MoneyManagement.OutboundPayment.delivery_options.paper_check.memo` to be required
* Add support for new value `payout_method_amount_limit_exceeded` on enum `V2.MoneyManagement.OutboundTransfer.status_details.failed.reason`
* Add support for `application_fee_amount_requested` on `V2.Payments.OffSessionPayment`
* ⚠️ Remove support for `compartment_id` on `V2.Payments.OffSessionPayment`
* Add support for new value `exceeded_retry_window` on enum `V2.Payments.OffSessionPayment.failure_reason`
* Add support for `retry_until` on `V2.Payments.OffSessionPayment.retry_details`
* Add support for new value `paused` on enum `V2.Payments.OffSessionPayment.status`
* ⚠️ Change `V2.Reporting.ReportRun.result.file` to be optional
* Add support for `application_fee_amount` on `V2\Payments\OffSessionPayment.capture().$params` and `V2\Payments\OffSessionPayment.create().$params`
* Add support for new value `paper_checks` on enum `EventsV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent.updated_capability`
* Add support for new value `outbound_payments.paper_checks` on enum `EventsV2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent.updated_capability`
* Add support for `alert_id` on `EventsV2CoreHealthApiErrorResolvedEvent`, `EventsV2CoreHealthApiLatencyResolvedEvent`, `EventsV2CoreHealthAuthorizationRateDropResolvedEvent`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent`, `EventsV2CoreHealthIssuingAuthorizationRequestErrorsResolvedEvent`, `EventsV2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent`, `EventsV2CoreHealthPaymentMethodErrorResolvedEvent`, `EventsV2CoreHealthSepaDebitDelayedFiringEvent`, `EventsV2CoreHealthSepaDebitDelayedResolvedEvent`, `EventsV2CoreHealthTrafficVolumeDropResolvedEvent`, and `EventsV2CoreHealthWebhookLatencyResolvedEvent`
* Add support for `api_key` on `EventsV2IamApiKeyCreatedEvent`, `EventsV2IamApiKeyDefaultSecretRevealedEvent`, `EventsV2IamApiKeyExpiredEvent`, `EventsV2IamApiKeyPermissionsUpdatedEvent`, `EventsV2IamApiKeyRotatedEvent`, and `EventsV2IamApiKeyUpdatedEvent`
* Add support for `stripe_access_grant` on `EventsV2IamStripeAccessGrantApprovedEvent`, `EventsV2IamStripeAccessGrantCanceledEvent`, `EventsV2IamStripeAccessGrantDeniedEvent`, `EventsV2IamStripeAccessGrantRemovedEvent`, `EventsV2IamStripeAccessGrantRequestedEvent`, and `EventsV2IamStripeAccessGrantUpdatedEvent`
* Add support for event notifications `V2DataReportingQueryRunCreatedEvent`, `V2DataReportingQueryRunFailedEvent`, `V2DataReportingQueryRunSucceededEvent`, and `V2DataReportingQueryRunUpdatedEvent` with related object `V2.Data.Reporting.QueryRun`
* Add support for event notifications `V2PaymentsOffSessionPaymentPausedEvent` and `V2PaymentsOffSessionPaymentResumedEvent` with related object `V2.Payments.OffSessionPayment`
