<!--
THIS IS A GENERATED FILE. Any changes you make to it directly will be blown away.
Instead, edit a corresponding `.change.md` file and run `hark build`.
-->

# Changelog

> This changelog only covers the **public preview** releases. Each release builds on the most recent GA release; see those notes in [the GA changelog](https://github.com/stripe/stripe-php/blob/master/CHANGELOG.md).

## 21.4.0-beta.1 - 2026-08-26
This release changes the pinned API version to `2026-08-26.preview`.

* [#2121](https://github.com/stripe/stripe-php/pull/2121) Add non-verified methods to managed handlers
* ⚠️ [#2129](https://github.com/stripe/stripe-php/pull/2129) Update generated code for beta
  * Add support for new resources `V2.Core.ApprovalRequest`, `V2.Signals.AccountActivity`, `V2.Signals.AccountEvaluation`, and `V2.Signals.AccountSignal`
  * Add support for `all` and `retrieve` methods on resource `V2.Signals.AccountSignal`
  * Add support for `create` and `retrieve` methods on resource `V2.Signals.AccountEvaluation`
  * Add support for `create`, `delete`, and `retrieve` methods on resource `V2.Signals.AccountActivity`
  * Add support for `all`, `cancel`, `retrieve`, and `update` methods on resource `V2.Core.ApprovalRequest`
  * Add support for `disable` method on resource `V2.MoneyManagement.PayoutMethod`
  * Add support for `disable_stripe_user_authentication` on `AccountSession.create().$params.component.payment_method_setting.feature`
  * ⚠️ Remove support for `payment_method_types` on `PaymentIntent.confirm().$params`, `PaymentIntent.create().$params`, `PaymentIntent.update().$params`, `SetupIntent.create().$params`, and `SetupIntent.update().$params`
  * ⚠️ Change type of `ProductCatalog.TrialOffer.end_behavior.transition.price` and `ProductCatalog.TrialOffer.price` from `$Price` to `deletable($Price)`
  * Add support for `billie` on `QuotePreviewInvoice.payment_settings.payment_method_options`
  * Add support for new value `billie` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
  * Add support for `payout_methods` on `V2.Core.Account.defaults` and `V2\Core\Account.update().$params.default`
  * Add support for `restricted` on `V2.Core.Vault.GbBankAccount` and `V2.Core.Vault.UsBankAccount`
  * Add support for `enabled_delivery_schemes` on `V2.MoneyManagement.PayoutMethod.bank_account`
  * ⚠️ Remove support for `enabled_delivery_options` on `V2.MoneyManagement.PayoutMethod.bank_account`
  * Add support for new value `disabled` on enum `V2.MoneyManagement.PayoutMethod.usage_status.payments`
  * Add support for new value `disabled` on enum `V2.MoneyManagement.PayoutMethod.usage_status.transfers`
  * Add support for event notifications `V2CoreApprovalRequestApprovedEvent`, `V2CoreApprovalRequestCanceledEvent`, `V2CoreApprovalRequestCreatedEvent`, `V2CoreApprovalRequestExpiredEvent`, `V2CoreApprovalRequestFailedEvent`, `V2CoreApprovalRequestRejectedEvent`, and `V2CoreApprovalRequestSucceededEvent` with related object `V2.Core.ApprovalRequest`
  * Add support for event notification `V2SignalsAccountEvaluationCompleteEvent` with related object `V2.Signals.AccountEvaluation`
  * Add support for error codes `authentication_failure`, `capability_not_active`, `expired_payment_method`, `incorrect_postal_code`, `invalid_canceled_subscription_fields`, and `payment_method_restricted` on `QuotePreviewInvoice.last_finalization_error`

## 21.2.0-beta.1 - 2026-07-29
This release changes the pinned API version to `2026-07-29.preview`.

* ⚠️ [#2090](https://github.com/stripe/stripe-php/pull/2090) Update generated code for beta
  * Add support for `all` and `retrieve` methods on resource `ProductCatalog.TrialOffer`
  * Add support for `tax_items` on `Charge.capture().$params.payment_detail.car_rental_datum.total.tax`, `Charge.capture().$params.payment_detail.flight_datum.total.tax`, `Charge.capture().$params.payment_detail.lodging_datum.total.tax`, `Charge.update().$params.payment_detail.car_rental_datum.total.tax`, `Charge.update().$params.payment_detail.flight_datum.total.tax`, `Charge.update().$params.payment_detail.lodging_datum.total.tax`, `PaymentIntent.capture().$params.payment_detail.car_rental_datum.total.tax`, `PaymentIntent.capture().$params.payment_detail.flight_datum.total.tax`, `PaymentIntent.capture().$params.payment_detail.lodging_datum.total.tax`, `PaymentIntent.confirm().$params.payment_detail.car_rental_datum.total.tax`, `PaymentIntent.confirm().$params.payment_detail.flight_datum.total.tax`, `PaymentIntent.confirm().$params.payment_detail.lodging_datum.total.tax`, `PaymentIntent.create().$params.payment_detail.car_rental_datum.total.tax`, `PaymentIntent.create().$params.payment_detail.flight_datum.total.tax`, `PaymentIntent.create().$params.payment_detail.lodging_datum.total.tax`, `PaymentIntent.payment_details.car_rental_data[].total.tax`, `PaymentIntent.payment_details.flight_data[].total.tax`, `PaymentIntent.payment_details.lodging_data[].total.tax`, `PaymentIntent.update().$params.payment_detail.car_rental_datum.total.tax`, `PaymentIntent.update().$params.payment_detail.flight_datum.total.tax`, and `PaymentIntent.update().$params.payment_detail.lodging_datum.total.tax`
  * ⚠️ Remove support for `taxes` on `Charge.capture().$params.payment_detail.car_rental_datum.total.tax`, `Charge.capture().$params.payment_detail.flight_datum.total.tax`, `Charge.capture().$params.payment_detail.lodging_datum.total.tax`, `Charge.update().$params.payment_detail.car_rental_datum.total.tax`, `Charge.update().$params.payment_detail.flight_datum.total.tax`, `Charge.update().$params.payment_detail.lodging_datum.total.tax`, `PaymentIntent.capture().$params.payment_detail.car_rental_datum.total.tax`, `PaymentIntent.capture().$params.payment_detail.flight_datum.total.tax`, `PaymentIntent.capture().$params.payment_detail.lodging_datum.total.tax`, `PaymentIntent.confirm().$params.payment_detail.car_rental_datum.total.tax`, `PaymentIntent.confirm().$params.payment_detail.flight_datum.total.tax`, `PaymentIntent.confirm().$params.payment_detail.lodging_datum.total.tax`, `PaymentIntent.create().$params.payment_detail.car_rental_datum.total.tax`, `PaymentIntent.create().$params.payment_detail.flight_datum.total.tax`, `PaymentIntent.create().$params.payment_detail.lodging_datum.total.tax`, `PaymentIntent.payment_details.car_rental_data[].total.tax`, `PaymentIntent.payment_details.flight_data[].total.tax`, `PaymentIntent.payment_details.lodging_data[].total.tax`, `PaymentIntent.update().$params.payment_detail.car_rental_datum.total.tax`, `PaymentIntent.update().$params.payment_detail.flight_datum.total.tax`, and `PaymentIntent.update().$params.payment_detail.lodging_datum.total.tax`
  * Add support for `tax_id` on `Checkout.Session.collected_information`
  * ⚠️ Remove support for `tax_ids` on `Checkout.Session.collected_information`
  * Add support for `mode` on `FinancialConnections.Session.manual_entry`
  * Add support for `name` on `Issuing\Cardholder.update().$params`
  * Add support for new value `ic_nif` on enums `Order.tax_details.tax_ids[].type` and `QuotePreviewInvoice.customer_tax_ids[].type`
  * Add support for new values `alipay` and `mb_way` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
  * Add support for `custom_fields`, `description`, and `footer` on `QuotePreviewSubscriptionSchedule.default_settings.invoice_settings` and `QuotePreviewSubscriptionSchedule.phases[].invoice_settings`
  * Add support for `trial` on `QuotePreviewSubscriptionSchedule.phases[]`
  * ⚠️ Remove support for `acss_debit`, `afterpay_clearpay`, `alipay`, `alma`, `amazon_pay`, `au_becs_debit`, `bacs_debit`, `bancontact`, `billie`, `bizum`, `blik`, `boleto`, `card_present`, `cashapp`, `crypto`, `customer_balance`, `eps`, `fpx`, `giropay`, `gopay`, `grabpay`, `id_bank_transfer`, `ideal`, `interac_present`, `kakao_pay`, `konbini`, `kr_card`, `mb_way`, `mobilepay`, `multibanco`, `naver_pay`, `nz_bank_account`, `oxxo`, `p24`, `pay_by_bank`, `payco`, `paynow`, `paypal`, `paypay`, `payto`, `pix`, `promptpay`, `qris`, `rechnung`, `revolut_pay`, `samsung_pay`, `satispay`, `scalapay`, `sepa_debit`, `shopeepay`, `sofort`, `stripe_balance`, `sunbit`, `swish`, `twint`, `upi`, `us_bank_account`, `wechat_pay`, and `zip` on `SharedPayment.GrantedToken.payment_method_details`
  * ⚠️ Remove support for values `acss_debit`, `afterpay_clearpay`, `alipay`, `alma`, `amazon_pay`, `au_becs_debit`, `bacs_debit`, `bancontact`, `billie`, `bizum`, `blik`, `boleto`, `card_present`, `cashapp`, `crypto`, `custom`, `customer_balance`, `eps`, `fpx`, `giropay`, `gopay`, `grabpay`, `id_bank_transfer`, `ideal`, `interac_present`, `kakao_pay`, `konbini`, `kr_card`, `mb_way`, `mobilepay`, `multibanco`, `naver_pay`, `nz_bank_account`, `oxxo`, `p24`, `pay_by_bank`, `payco`, `paynow`, `paypal`, `paypay`, `payto`, `pix`, `promptpay`, `qris`, `rechnung`, `revolut_pay`, `samsung_pay`, `satispay`, `scalapay`, `sepa_debit`, `shopeepay`, `sofort`, `stripe_balance`, `sunbit`, `swish`, `twint`, `upi`, `us_bank_account`, `wechat_pay`, and `zip` from enum `SharedPayment.GrantedToken.payment_method_details.type`
  * Add support for `use_stripe_sdk` on `SharedPayment.IssuedToken` and `SharedPayment\IssuedToken.create().$params`
  * Add support for `redirect_to_url` on `SharedPayment.IssuedToken.next_action`
  * ⚠️ Change type of `SharedPayment.IssuedToken.next_action.type` from `literal('use_stripe_sdk')` to `enum('redirect_to_url'|'use_stripe_sdk')`
  * Add support for `livemode` on `Tax.Location`
  * Add support for `source` on `V2.Iam.ActivityLog.details.user_roles`
  * Add support for `payout` on `V2.MoneyManagement.ReceivedCredit.balance_transfer`
  * ⚠️ Remove support for `payout_v1` on `V2.MoneyManagement.ReceivedCredit.balance_transfer`
  * Add support for new value `payout` on enum `V2.MoneyManagement.ReceivedCredit.balance_transfer.type`
  * ⚠️ Change `V2.MoneyManagement.ReceivedDebit.bank_transfer.us_bank_account` to be optional

## 20.4.0-beta.1 - 2026-06-24
This release changes the pinned API version to `2026-06-24.preview`.

* ⚠️ [#2075](https://github.com/stripe/stripe-php/pull/2075) Update generated code for beta
  * Add support for `redaction` on `Card`, `Charge`, `Checkout.Session`, `Customer`, `Issuing.Authorization`, `Issuing.Card`, `Issuing.Cardholder`, `Issuing.Dispute`, `Issuing.Transaction`, `PaymentIntent`, `PaymentMethod`, `SetupIntent`, `Source`, and `Token`
  * Add support for `disclaimer_variant` on `Capital.FinancingOffer` and `Capital.FinancingSummary.details`
  * Add support for `active` on `FinancialConnections.Account.status_details` and `FinancialConnections.Authorization.status_details`
  * Add support for new value `institution_requirement` on enum `FinancialConnections.Account.status_details.inactive.cause`
  * Change type of `FinancialConnections\Session.create().$params.limit.accounts` from `longInteger` to `emptyable(longInteger)`
  * Add support for `pause` on `Invoice.create_preview().$params.subscription_detail`
  * Add support for new value `satispay` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
  * Add support for `release_details` on `Reserve.Hold`
  * Add support for `buyer_id` on `SharedPayment.GrantedToken.payment_method_details.bizum` and `SharedPayment.GrantedToken.payment_method_details.blik`
  * Add support for `fingerprint` on `SharedPayment.GrantedToken.payment_method_details.pix`
  * Add support for new value `money_manager` on enums `EventsV2CoreAccountLinkReturnedEvent.configurations`, `V2.Core.AccountLink.use_case.account_onboarding.configurations`, and `V2.Core.AccountLink.use_case.account_update.configurations`
  * ⚠️ Add support for new value `money_manager` on enum `V2.Core.Account.applied_configurations`
  * ⚠️ Remove support for value `storer` from enum `V2.Core.Account.applied_configurations`
  * Add support for `money_manager` on `V2.Core.Account.configuration`, `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.configuration`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.configuration`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
  * ⚠️ Remove support for `storer` on `V2.Core.Account.configuration`, `V2.Core.Account.identity.attestations.terms_of_service`, `V2\Core\Account.create().$params.configuration`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service`, `V2\Core\Account.update().$params.configuration`, and `V2\Core\AccountToken.create().$params.identity.attestation.terms_of_service`
  * Add support for new values `business_storage.inbound.eur`, `business_storage.inbound.gbp`, `business_storage.inbound.usd`, `business_storage.outbound.eur`, `business_storage.outbound.gbp`, `business_storage.outbound.usd`, `received_credits.bank_accounts`, and `received_debits.bank_accounts` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].capability` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for new value `money_manager` on enums `V2.Core.Account.future_requirements.entries[].impact.restricts_capabilities[].configuration` and `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].configuration`
  * ⚠️ Remove support for `maximum_rps` on `V2.Core.BatchJob` and `V2\Core\BatchJob.create().$params`
  * Add support for `bic` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
  * ⚠️ Remove support for `swift_code` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
  * Add support for `processing` on `V2.MoneyManagement.OutboundPayment.status_details` and `V2.MoneyManagement.OutboundTransfer.status_details`
  * Add support for new values `fx_rate_drift_exceeded_after_review`, `payout_method_amount_limit_exceeded`, and `review_rejected` on enum `V2.MoneyManagement.OutboundPayment.status_details.failed.reason`
  * Add support for new values `fx_rate_drift_exceeded_after_review` and `review_rejected` on enum `V2.MoneyManagement.OutboundTransfer.status_details.failed.reason`
  * Add support for `account_holder_name` on `V2.MoneyManagement.ReceivedCredit.bank_transfer.us_bank_account`
  * Add support for new value `capability_inactive` on enum `V2.MoneyManagement.ReceivedDebit.status_details.failed.reason`
  * Add support for `statuses` on `V2\MoneyManagement\FinancialAccount.all().$params`
  * ⚠️ Remove support for `status` on `V2\MoneyManagement\FinancialAccount.all().$params`
  * Change `V2\Core\BatchJob.create().$params.metadata` to be optional
  * Add support for event notifications `V2CoreAccountIncludingConfigurationMoneyManagerCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationMoneyManagerUpdatedEvent` with related object `V2.Core.Account`
  * Add support for event notification `V2MoneyManagementOutboundPaymentUnderReviewEvent` with related object `V2.MoneyManagement.OutboundPayment`
  * Add support for event notification `V2MoneyManagementOutboundTransferUnderReviewEvent` with related object `V2.MoneyManagement.OutboundTransfer`
  * ⚠️ Remove support for event notifications `V2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationStorerUpdatedEvent` with related object `V2.Core.Account`
  * Add support for error codes `anomalous_money_movement_request`, `failed_tax_calculation`, `financial_account_balance_does_not_support_currency`, `financial_account_capability_not_enabled`, and `financial_account_capability_restricted` on `QuotePreviewInvoice.last_finalization_error`

## 20.3.0-beta.1 - 2026-05-27
This release changes the pinned API version to `2026-05-27.preview`.

* ⚠️ [#2064](https://github.com/stripe/stripe-php/pull/2064) Update generated code for beta
  * Add support for `pause` method on resource `Subscription`
  * Add support for `retrieve` method on resource `V2.Iam.ActivityLog`
  * Add support for new value `mastercard` on enum `Issuing.Settlement.network`
  * Change type of `ProductCatalog.TrialOffer.end_behavior.transition.price` from `string` to `expandable($Price)`
  * Add support for `amount_paid_off_stripe` on `QuotePreviewInvoice`
  * Add support for new value `twint` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
  * Add support for `discountable` on `QuotePreviewSubscriptionSchedule.phases[].add_invoice_items[]`
  * Add support for `bizum` and `scalapay` on `SharedPayment.GrantedToken.payment_method_details`
  * Add support for new values `bizum` and `scalapay` on enum `SharedPayment.GrantedToken.payment_method_details.type`
  * Change `SharedPayment.GrantedToken.agent_details` to be required
  * Change type of `SubscriptionItem.billed_until` from `nullable(DateTime)` to `DateTime`
  * Add support for `payment_behavior` on `Subscription.resume().$params`
  * Add support for `status_details` on `Subscription`
  * Change `Subscription.billing_schedules` to be required
  * Add support for new values `ao_bank_account`, `az_bank_account`, `bd_bank_account`, `bo_bank_account`, `br_bank_account`, `cl_bank_account`, `ga_bank_account`, `gh_bank_account`, `gi_bank_account`, `hn_bank_account`, `kr_bank_account`, `kz_bank_account`, `la_bank_account`, `ne_bank_account`, `ng_bank_account`, `ni_bank_account`, `py_bank_account`, `sa_bank_account`, `sm_bank_account`, and `uy_bank_account` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
  * ⚠️ Change type of `V2.MoneyManagement.ReceivedCredit.bank_transfer.gb_bank_account.network` from `literal('fps')` to `enum('chaps'|'fps')`
  * Add support for error codes `payment_method_microdeposit_processing_error` and `siret_invalid` on `QuotePreviewInvoice.last_finalization_error`

## 20.2.0-beta.2 - 2026-04-24
* ⚠️ [#2060](https://github.com/stripe/stripe-php/pull/2060) Update generated code for beta
  * Add support for new resources `V2.Commerce.ProductCatalogImport`, `V2.Data.Reporting.QueryRun`, `V2.Extend.WorkflowRun`, `V2.Extend.Workflow`, `V2.Iam.ActivityLog`, `V2.Network.BusinessProfile`, and `V2.OrchestratedCommerce.Agreement`
  * Add support for `all`, `confirm`, `create`, `retrieve`, and `terminate` methods on resource `V2.OrchestratedCommerce.Agreement`
  * Add support for `me` and `retrieve` methods on resource `V2.Network.BusinessProfile`
  * Add support for `all` method on resource `V2.Iam.ActivityLog`
  * Add support for `all` and `retrieve` methods on resource `V2.Extend.WorkflowRun`
  * Add support for `all`, `invoke`, and `retrieve` methods on resource `V2.Extend.Workflow`
  * Add support for `create` and `retrieve` methods on resources `V2.Commerce.ProductCatalogImport` and `V2.Data.Reporting.QueryRun`
  * ⚠️ Change type of `V2.Billing.Cadence.settings_data.collection.payment_method_options.konbini`, `V2.Billing.CollectionSetting.payment_method_options.konbini`, `V2.Billing.CollectionSettingVersion.payment_method_options.konbini`, `V2\Billing\CollectionSetting.create().$params.payment_method_option.konbini`, and `V2\Billing\CollectionSetting.update().$params.payment_method_option.konbini` from `map(string: dynamic)` to `an object`
  * ⚠️ Change type of `V2.Billing.Cadence.settings_data.collection.payment_method_options.sepa_debit`, `V2.Billing.CollectionSetting.payment_method_options.sepa_debit`, `V2.Billing.CollectionSettingVersion.payment_method_options.sepa_debit`, `V2\Billing\CollectionSetting.create().$params.payment_method_option.sepa_debit`, and `V2\Billing\CollectionSetting.update().$params.payment_method_option.sepa_debit` from `map(string: dynamic)` to `an object`
  * Add support for new values `cn_bank_account` and `jp_bank_account` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
  * Add support for new values `futsu` and `toza` on enums `V2.Core.Vault.GbBankAccount.bank_account_type` and `V2.MoneyManagement.PayoutMethod.bank_account.bank_account_type`
  * ⚠️ Change type of `V2.MoneyManagement.InboundTransfer.transfer_history[].bank_debit_processing` from `map(string: dynamic)` to `an object`
  * ⚠️ Change type of `V2.MoneyManagement.InboundTransfer.transfer_history[].bank_debit_queued` from `map(string: dynamic)` to `an object`
  * ⚠️ Change type of `V2.MoneyManagement.InboundTransfer.transfer_history[].bank_debit_succeeded` from `map(string: dynamic)` to `an object`
  * Add support for new value `payout_method_amount_limit_exceeded` on enum `V2.MoneyManagement.OutboundTransfer.status_details.failed.reason`
  * ⚠️ Add support for new values `inbound_transfer_reversal`, `outbound_payment_reversal`, `outbound_transfer_reversal`, `received_credit_reversal`, `received_debit_reversal`, and `stripe_fee_tax` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
  * ⚠️ Remove support for value `return` from enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
  * Change type of `V2\Core\BatchJob.create().$params.endpoint.http_method` from `literal('post')` to `enum('delete'|'post')`
  * Add support for new value `meter_event_value_too_many_digits` on enums `EventsV1BillingMeterErrorReportTriggeredEvent.reason.error_types[].code` and `EventsV1BillingMeterNoMeterFoundEvent.reason.error_types[].code`
  * Add support for `treasury_transaction` on `EventsV2MoneyManagementTransactionCreatedEvent`
  * Add support for event notifications `V2CommerceProductCatalogImportsFailedEvent`, `V2CommerceProductCatalogImportsProcessingEvent`, `V2CommerceProductCatalogImportsSucceededEvent`, and `V2CommerceProductCatalogImportsSucceededWithErrorsEvent` with related object `V2.Commerce.ProductCatalogImport`
  * Add support for event notifications `V2DataReportingQueryRunCreatedEvent`, `V2DataReportingQueryRunFailedEvent`, `V2DataReportingQueryRunSucceededEvent`, and `V2DataReportingQueryRunUpdatedEvent` with related object `V2.Data.Reporting.QueryRun`
  * Add support for event notifications `V2ExtendWorkflowRunFailedEvent`, `V2ExtendWorkflowRunStartedEvent`, and `V2ExtendWorkflowRunSucceededEvent` with related object `V2.Extend.WorkflowRun`
  * Add support for event notifications `V2OrchestratedCommerceAgreementConfirmedEvent`, `V2OrchestratedCommerceAgreementCreatedEvent`, `V2OrchestratedCommerceAgreementPartiallyConfirmedEvent`, and `V2OrchestratedCommerceAgreementTerminatedEvent` with related object `V2.OrchestratedCommerce.Agreement`
  * Add support for error type `CannotProceedException`

## 20.2.0-beta.1 - 2026-04-23
This release changes the pinned API version to `2026-04-22.preview`.

* ⚠️ [#2050](https://github.com/stripe/stripe-php/pull/2050) Update generated code for beta
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

## 20.1.0-beta.1 - 2026-03-25
This release changes the pinned API version to `2026-03-25.preview`.

It is built on top of SDK version 20.0.0 which contains breaking changes. Please review the [changelog for 20.0.0](https://github.com/stripe/stripe-php/blob/master/CHANGELOG.md#2000---2026-03-25) if upgrading from older SDK versions.

* ⚠️ [#2020](https://github.com/stripe/stripe-php/pull/2020) Update generated code for beta
  * Add support for new resources `ProductCatalog.TrialOffer`, `Tax.Location`, and `V2.Core.BatchJob`
  * Add support for `create` method on resource `ProductCatalog.TrialOffer`
  * Add support for `all`, `create`, and `retrieve` methods on resource `Tax.Location`
  * Add support for `cancel`, `create`, and `retrieve` methods on resource `V2.Core.BatchJob`
  * Add support for `performance_location` on `Tax.CalculationLineItem` and `Tax\Calculation.create().$params.line_item`
  * Add support for new value `performance` on enums `Tax.Calculation.shipping_cost.tax_breakdown[].sourcing`, `Tax.CalculationLineItem.tax_breakdown[].sourcing`, and `Tax.Transaction.shipping_cost.tax_breakdown[].sourcing`
  * Add support for new values `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on enums `Tax.Calculation.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`, `Tax.Calculation.tax_breakdown[].tax_rate_details.tax_type`, `Tax.CalculationLineItem.tax_breakdown[].tax_rate_details.tax_type`, and `Tax.Transaction.shipping_cost.tax_breakdown[].tax_rate_details.tax_type`
  * Add support for `trial_offer` on `Invoice.create_preview().$params.schedule_detail.amendment.item_action.add`, `Invoice.create_preview().$params.schedule_detail.amendment.item_action.set`, `Invoice.create_preview().$params.schedule_detail.phase.item`, `Quote.create().$params.line.action.add_item`, `Quote.create().$params.line.action.set_item`, `Quote.update().$params.line.action.add_item`, `Quote.update().$params.line.action.set_item`, `QuoteLine.actions[].add_item`, `QuoteLine.actions[].set_items[]`, `QuotePreviewSubscriptionSchedule.phases[].items[]`, `SubscriptionSchedule.amend().$params.amendment.item_action.add`, `SubscriptionSchedule.amend().$params.amendment.item_action.set`, `SubscriptionSchedule.create().$params.phase.item`, `SubscriptionSchedule.phases[].items[]`, and `SubscriptionSchedule.update().$params.phase.item`
  * Add support for `risk_reserved` on `Balance`
  * ⚠️ Remove support for `source_type` on `Charge.payment_method_details.stripe_balance`, `ConfirmationToken.create().$params.payment_method_datum.stripe_balance`, `ConfirmationToken.payment_method_preview.stripe_balance`, `PaymentAttemptRecord.payment_method_details.stripe_balance`, `PaymentIntent.confirm().$params.payment_method_datum.stripe_balance`, `PaymentIntent.create().$params.payment_method_datum.stripe_balance`, `PaymentIntent.update().$params.payment_method_datum.stripe_balance`, `PaymentMethod.create().$params.stripe_balance`, `PaymentMethod.stripe_balance`, `PaymentRecord.payment_method_details.stripe_balance`, `SetupIntent.confirm().$params.payment_method_datum.stripe_balance`, `SetupIntent.create().$params.payment_method_datum.stripe_balance`, and `SetupIntent.update().$params.payment_method_datum.stripe_balance`
  * Add support for `tax_details` on `Checkout\Session.create().$params.line_item.price_datum.product_datum`, `Checkout\Session.update().$params.line_item.price_datum.product_datum`, `Invoice.add_lines().$params.line.price_datum.product_datum`, `Invoice.update_lines().$params.line.price_datum.product_datum`, `InvoiceLineItem.update().$params.price_datum.product_datum`, `PaymentLink.create().$params.line_item.price_datum.product_datum`, `Plan.create().$params.product`, `Price.create().$params.product_datum`, `Product.create().$params`, and `Product.update().$params`
  * Add support for `pending_invoice_item_interval` on `Checkout\Session.update().$params.subscription_datum`
  * Add support for `hosted` and `ui_mode` on `FinancialConnections.Session` and `FinancialConnections\Session.create().$params`
  * Add support for `url` on `FinancialConnections.Session`
  * Add support for `expires_after_seconds` on `Invoice.create().$params.payment_setting.payment_method_option.pix`, `Invoice.payment_settings.payment_method_options.pix`, `Invoice.update().$params.payment_setting.payment_method_option.pix`, `QuotePreviewInvoice.payment_settings.payment_method_options.pix`, `Subscription.create().$params.payment_setting.payment_method_option.pix`, `Subscription.payment_settings.payment_method_options.pix`, and `Subscription.update().$params.payment_setting.payment_method_option.pix`
  * Add support for `current_trial` on `Invoice.create_preview().$params.subscription_detail.item`, `Subscription.create().$params.item`, `Subscription.update().$params.item`, `SubscriptionItem.create().$params`, `SubscriptionItem.update().$params`, and `SubscriptionItem`
  * Add support for `surcharge` on `PaymentIntent.amount_details`, `PaymentIntent.capture().$params.amount_detail`, `PaymentIntent.confirm().$params.amount_detail`, `PaymentIntent.create().$params.amount_detail`, `PaymentIntent.increment_authorization().$params.amount_detail`, and `PaymentIntent.update().$params.amount_detail`
  * Add support for `amount_details` and `payment_details` on `PaymentIntent.decrement_authorization().$params`
  * Add support for `mandate_options` on `PaymentIntent.payment_method_options.stripe_balance`
  * Add support for `managed_payments` on `PaymentLink.create().$params` and `PaymentLink`
  * Add support for `stripe_balance` on `SetupIntent.confirm().$params.payment_method_option`, `SetupIntent.create().$params.payment_method_option`, `SetupIntent.payment_method_options`, and `SetupIntent.update().$params.payment_method_option`
  * Add support for `billing_cycle_anchor` on `Subscription.create().$params.trial_setting.end_behavior`, `Subscription.trial_settings.end_behavior`, and `Subscription.update().$params.trial_setting.end_behavior`
  * Add support for `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on `Tax.Registration.country_options.us`
  * Add support for new values `admissions_tax`, `attendance_tax`, `entertainment_tax`, `gross_receipts_tax`, `hospitality_tax`, `luxury_tax`, `resort_tax`, and `tourism_tax` on enum `Tax.Registration.country_options.us.type`
  * Add support for `requirements` on `TaxCode`
  * ⚠️ Change type of `V2.Billing.Cadence.settings_data.collection.payment_method_options.card.mandate_options.amount`, `V2.Billing.CollectionSetting.payment_method_options.card.mandate_options.amount`, `V2.Billing.CollectionSettingVersion.payment_method_options.card.mandate_options.amount`, `V2\Billing\CollectionSetting.create().$params.payment_method_option.card.mandate_option.amount`, and `V2\Billing\CollectionSetting.update().$params.payment_method_option.card.mandate_option.amount` from `longInteger` to `int64_string`
  * Add support for new values `ar_bank_account`, `co_bank_account`, and `eg_bank_account` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
  * Add support for `timezone` on `V2.Core.Account.defaults`, `V2\Core\Account.create().$params.default`, and `V2\Core\Account.update().$params.default`
  * Add support for `azure_event_grid` on `V2.Core.EventDestination` and `V2\Core\EventDestination.create().$params`
  * Add support for new value `no_azure_partner_topic_exists` on enum `V2.Core.EventDestination.status_details.disabled.reason`
  * Add support for new value `azure_event_grid` on enum `V2.Core.EventDestination.type`
  * Add support for `supported_currencies` on `V2.Core.Vault.GbBankAccount`, `V2.Core.Vault.UsBankAccount`, and `V2.MoneyManagement.PayoutMethod.card`
  * ⚠️ Change `V2.Core.Vault.GbBankAccount.sort_code` and `V2\Core\Vault\GbBankAccount.create().$params.sort_code` to be optional
  * Add support for `restricted` on `V2.MoneyManagement.PayoutMethod`
  * Add support for `currencies` on `V2.MoneyManagement.PayoutMethodsBankAccountSpec.countries.value.fields[]`
  * Add support for `counterparty` and `description` on `V2.MoneyManagement.Transaction`
  * ⚠️ Add support for `currency` on `V2\Core\Vault\GbBankAccount.create().$params`, `V2\Core\Vault\UsBankAccount.create().$params`, `V2\MoneyManagement\OutboundSetupIntent.create().$params.payout_method_datum.bank_account`, `V2\MoneyManagement\OutboundSetupIntent.create().$params.payout_method_datum.card`, `V2\MoneyManagement\OutboundSetupIntent.update().$params.payout_method_datum.bank_account`, and `V2\MoneyManagement\OutboundSetupIntent.update().$params.payout_method_datum.card`
  * Add support for `iban` on `V2\Core\Vault\GbBankAccount.create().$params`
  * Change `V2\Core\Vault\GbBankAccount.create().$params.account_number` to be optional
  * Add support for new value `currency` on enum `InvalidPaymentMethodException.invalid_param`
  * Add support for event notifications `V2CoreBatchJobBatchFailedEvent`, `V2CoreBatchJobCanceledEvent`, `V2CoreBatchJobCompletedEvent`, `V2CoreBatchJobCreatedEvent`, `V2CoreBatchJobReadyForUploadEvent`, `V2CoreBatchJobTimeoutEvent`, `V2CoreBatchJobUpdatedEvent`, `V2CoreBatchJobUploadTimeoutEvent`, `V2CoreBatchJobValidatingEvent`, and `V2CoreBatchJobValidationFailedEvent` with related object `V2.Core.BatchJob`
  * Add support for error code `service_period_coupon_with_metered_tiered_item_unsupported` on `QuotePreviewInvoice.last_finalization_error`
* [#2045](https://github.com/stripe/stripe-php/pull/2045) Update generated code for beta
  * Release specs are identical.
* [#2047](https://github.com/stripe/stripe-php/pull/2047) Update generated code for beta

## 19.5.0-beta.1 - 2026-02-25
This release changes the pinned API version to `2026-02-25.preview`.

* [#2006](https://github.com/stripe/stripe-php/pull/2006) Update generated code for beta
  * Add support for `smart_disputes` on `Account.create().$params.setting`, `Account.settings`, `Account.update().$params.setting`, `V2.Core.Account.configuration.merchant`, `V2\Core\Account.create().$params.configuration.merchant`, and `V2\Core\Account.update().$params.configuration.merchant`
  * Add support for `email_customers_on_successful_payment` on `Account.create().$params.setting.payment`, `Account.settings.payments`, and `Account.update().$params.setting.payment`
  * Add support for `managed_payments` on `Checkout.Session`, `Checkout\Session.create().$params`, `PaymentIntent`, `SetupIntent`, and `Subscription`
  * Add support for new value `lk_vat` on enums `Checkout.Session.collected_information.tax_ids[].type`, `Order.tax_details.tax_ids[].type`, and `QuotePreviewInvoice.customer_tax_ids[].type`
  * Add support for new value `pay_by_bank` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
  * Add support for new values `bt_bank_account`, `cr_bank_account`, `do_bank_account`, `gt_bank_account`, `md_bank_account`, `mk_bank_account`, `mo_bank_account`, `mz_bank_account`, `pe_bank_account`, `pk_bank_account`, `tw_bank_account`, and `uz_bank_account` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
  * Add support for `purpose` on `V2.MoneyManagement.OutboundPayment` and `V2\MoneyManagement\OutboundPayment.create().$params`
  * Add support for `branch_number` and `swift_code` on `V2.MoneyManagement.PayoutMethod.bank_account`
  * Change `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow` to be optional
  * Add support for error codes `storer_capability_missing` and `storer_capability_not_active` on `QuotePreviewInvoice.last_finalization_error`

## 19.4.0-beta.1 - 2026-01-28
This release changes the pinned API version to `2026-01-28.preview`.

* [#1981](https://github.com/stripe/stripe-php/pull/1981) Add EventNotificationHandler example
* [#1988](https://github.com/stripe/stripe-php/pull/1988) Update generated code for beta
  * Add support for new resource `FinancialConnections.Authorization`
  * Add support for `retrieve` method on resource `FinancialConnections.Authorization`
  * Add support for `detach_payment` method on resource `Invoice`
  * Remove support for `cancel`, `list_line_items`, and `reopen` methods on resource `Order`
  * Remove support for `attach_cadence` method on resource `Subscription`
  * Add support for `additional_files` and `site` on `Account.create().$params.setting.paypay_payment`, `Account.settings.paypay_payments`, and `Account.update().$params.setting.paypay_payment`
  * Remove support for `capital` on `Account.settings`
  * Change type of `Charge.payment_method_details.stripe_balance.source_type`, `ConfirmationToken.payment_method_preview.stripe_balance.source_type`, `PaymentAttemptRecord.payment_method_details.stripe_balance.source_type`, `PaymentMethod.stripe_balance.source_type`, and `PaymentRecord.payment_method_details.stripe_balance.source_type` from `enum('bank_account'|'card'|'fpx')` to `nullable(enum('bank_account'|'card'|'fpx'))`
  * Add support for new value `pl_nip` on enums `Checkout.Session.collected_information.tax_ids[].type`, `Order.tax_details.tax_ids[].type`, and `QuotePreviewInvoice.customer_tax_ids[].type`
  * Add support for new value `capital.financing_summary.line_of_credit_update` on enum `Event.type`
  * Add support for `authorization` and `status_details` on `FinancialConnections.Account`
  * Add support for `relink_options` on `FinancialConnections.Session` and `FinancialConnections\Session.create().$params`
  * Change `FinancialConnections\Session.create().$params.account_holder` to be optional
  * Add support for `relink_result` on `FinancialConnections.Session`
  * Remove support for `billing_cadence` on `Invoice.create_preview().$params`, `Subscription.create().$params`, `Subscription.update().$params`, and `Subscription`
  * Remove support for `billing_cadence_details` on `Invoice.parent` and `QuotePreviewInvoice.parent`
  * Remove support for value `billing_cadence_details` from enums `Invoice.parent.type` and `QuotePreviewInvoice.parent.type`
  * Add support for `car_rental_data`, `flight_data`, and `lodging_data` on `PaymentIntent.payment_details`
  * Change `QuotePreviewInvoice.payment_settings.payment_method_options.payto` to be required
  * Add support for new values `ae_bank_account`, `ag_bank_account`, `bh_bank_account`, `gm_bank_account`, `hk_bank_account`, `kh_bank_account`, `lc_bank_account`, `mc_bank_account`, `mg_bank_account`, `my_bank_account`, `qa_bank_account`, `rw_bank_account`, `th_bank_account`, `tt_bank_account`, and `vn_bank_account` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
  * Add support for `alternative_reference` on `V2.Core.Vault.GbBankAccount`, `V2.Core.Vault.UsBankAccount`, and `V2.MoneyManagement.PayoutMethod`
  * Add support for `account_holder_address` and `account_holder_name` on `V2.MoneyManagement.FinancialAddress.credentials.us_bank_account`
  * Add support for `fingerprint` on `V2.MoneyManagement.PayoutMethod.card`
  * Add support for snapshot event `INVOICE_PAYMENT_DETACHED` with resource `InvoicePayment`
  * Add support for error code `request_blocked` on `QuotePreviewInvoice.last_finalization_error`

## 19.2.0-beta.1 - 2025-12-16
This release changes the pinned API version to `2025-12-15.preview`.

* [#1955](https://github.com/stripe/stripe-php/pull/1955) Add EventNotificationHandler
  * This is a new, simplified way to handle event notifications (AKA thin event webhooks). Learn more in the docs: https://docs.stripe.com/webhooks/event-notification-handlers?lang=php
* [#1969](https://github.com/stripe/stripe-php/pull/1969) Update generated code for beta
  * Add support for new resources `Reserve.Hold`, `Reserve.Plan`, and `Reserve.Release`
  * Add support for `all` and `retrieve` methods on resources `Reserve.Hold` and `Reserve.Release`
  * Add support for `retrieve` method on resource `Reserve.Plan`
  * Change `Billing.CreditBalanceSummary.customer_account`, `Billing.CreditGrant.customer_account`, `BillingPortal.Session.customer_account`, `CashBalance.customer_account`, `Checkout.Session.customer_account`, `ConfirmationToken.payment_method_preview.customer_account`, `CreditNote.customer_account`, `CustomerBalanceTransaction.customer_account`, `CustomerCashBalanceTransaction.customer_account`, `CustomerSession.customer_account`, `Discount.customer_account`, `Invoice.customer_account`, `InvoiceItem.customer_account`, `PaymentIntent.customer_account`, `PaymentMethod.customer_account`, `PromotionCode.customer_account`, `Quote.customer_account`, `QuotePreviewInvoice.customer_account`, `QuotePreviewSubscriptionSchedule.customer_account`, `SetupAttempt.customer_account`, `Subscription.customer_account`, `SubscriptionSchedule.customer_account`, `TaxId.customer_account`, and `TaxId.owner.customer_account` to be required
  * Change type of `V2.FinancialAddressGeneratedMicrodeposits.amounts` from `amount` to `an object`
  * Change type of `Checkout\Session.create().$params.payment_method_option.payto.mandate_option.amount`, `PaymentIntent.confirm().$params.payment_method_option.payto.mandate_option.amount`, `PaymentIntent.create().$params.payment_method_option.payto.mandate_option.amount`, `PaymentIntent.update().$params.payment_method_option.payto.mandate_option.amount`, `SetupIntent.confirm().$params.payment_method_option.payto.mandate_option.amount`, `SetupIntent.create().$params.payment_method_option.payto.mandate_option.amount`, and `SetupIntent.update().$params.payment_method_option.payto.mandate_option.amount` from `longInteger` to `emptyable(longInteger)`
  * Change type of `Checkout\Session.create().$params.payment_method_option.payto.mandate_option.amount_type`, `PaymentIntent.confirm().$params.payment_method_option.payto.mandate_option.amount_type`, `PaymentIntent.create().$params.payment_method_option.payto.mandate_option.amount_type`, `PaymentIntent.update().$params.payment_method_option.payto.mandate_option.amount_type`, `SetupIntent.confirm().$params.payment_method_option.payto.mandate_option.amount_type`, `SetupIntent.create().$params.payment_method_option.payto.mandate_option.amount_type`, and `SetupIntent.update().$params.payment_method_option.payto.mandate_option.amount_type` from `enum('fixed'|'maximum')` to `emptyable(enum('fixed'|'maximum'))`
  * Change type of `Checkout\Session.create().$params.payment_method_option.payto.mandate_option.end_date`, `PaymentIntent.confirm().$params.payment_method_option.payto.mandate_option.end_date`, `PaymentIntent.create().$params.payment_method_option.payto.mandate_option.end_date`, `PaymentIntent.update().$params.payment_method_option.payto.mandate_option.end_date`, `SetupIntent.confirm().$params.payment_method_option.payto.mandate_option.end_date`, `SetupIntent.create().$params.payment_method_option.payto.mandate_option.end_date`, and `SetupIntent.update().$params.payment_method_option.payto.mandate_option.end_date` from `string` to `emptyable(string)`
  * Change type of `Checkout\Session.create().$params.payment_method_option.payto.mandate_option.payment_schedule`, `PaymentIntent.confirm().$params.payment_method_option.payto.mandate_option.payment_schedule`, `PaymentIntent.create().$params.payment_method_option.payto.mandate_option.payment_schedule`, `PaymentIntent.update().$params.payment_method_option.payto.mandate_option.payment_schedule`, `SetupIntent.confirm().$params.payment_method_option.payto.mandate_option.payment_schedule`, `SetupIntent.create().$params.payment_method_option.payto.mandate_option.payment_schedule`, and `SetupIntent.update().$params.payment_method_option.payto.mandate_option.payment_schedule` from `enum` to `emptyable(enum)`
  * Change type of `Checkout\Session.create().$params.payment_method_option.payto.mandate_option.payments_per_period`, `PaymentIntent.confirm().$params.payment_method_option.payto.mandate_option.payments_per_period`, `PaymentIntent.create().$params.payment_method_option.payto.mandate_option.payments_per_period`, `PaymentIntent.update().$params.payment_method_option.payto.mandate_option.payments_per_period`, `SetupIntent.confirm().$params.payment_method_option.payto.mandate_option.payments_per_period`, `SetupIntent.create().$params.payment_method_option.payto.mandate_option.payments_per_period`, and `SetupIntent.update().$params.payment_method_option.payto.mandate_option.payments_per_period` from `longInteger` to `emptyable(longInteger)`
  * Change type of `Checkout\Session.create().$params.payment_method_option.payto.mandate_option.purpose`, `PaymentIntent.confirm().$params.payment_method_option.payto.mandate_option.purpose`, `PaymentIntent.create().$params.payment_method_option.payto.mandate_option.purpose`, `PaymentIntent.update().$params.payment_method_option.payto.mandate_option.purpose`, `SetupIntent.confirm().$params.payment_method_option.payto.mandate_option.purpose`, `SetupIntent.create().$params.payment_method_option.payto.mandate_option.purpose`, and `SetupIntent.update().$params.payment_method_option.payto.mandate_option.purpose` from `enum` to `emptyable(enum)`
  * Change type of `Checkout\Session.create().$params.payment_method_option.payto.mandate_option.start_date`, `SetupIntent.confirm().$params.payment_method_option.payto.mandate_option.start_date`, `SetupIntent.create().$params.payment_method_option.payto.mandate_option.start_date`, and `SetupIntent.update().$params.payment_method_option.payto.mandate_option.start_date` from `string` to `emptyable(string)`
  * Change `Identity.VerificationSession.related_customer_account` to be required
  * Add support for `async_workflows` on `PaymentIntent`
  * Add support for `payto` on `QuotePreviewInvoice.payment_settings.payment_method_options`
  * Add support for new value `payto` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
  * Remove support for `requested` on `V2.Core.Account.configuration.customer.capabilities.automatic_indirect_tax`, `V2.Core.Account.configuration.merchant.capabilities.ach_debit_payments`, `V2.Core.Account.configuration.merchant.capabilities.acss_debit_payments`, `V2.Core.Account.configuration.merchant.capabilities.affirm_payments`, `V2.Core.Account.configuration.merchant.capabilities.afterpay_clearpay_payments`, `V2.Core.Account.configuration.merchant.capabilities.alma_payments`, `V2.Core.Account.configuration.merchant.capabilities.amazon_pay_payments`, `V2.Core.Account.configuration.merchant.capabilities.au_becs_debit_payments`, `V2.Core.Account.configuration.merchant.capabilities.bacs_debit_payments`, `V2.Core.Account.configuration.merchant.capabilities.bancontact_payments`, `V2.Core.Account.configuration.merchant.capabilities.blik_payments`, `V2.Core.Account.configuration.merchant.capabilities.boleto_payments`, `V2.Core.Account.configuration.merchant.capabilities.card_payments`, `V2.Core.Account.configuration.merchant.capabilities.cartes_bancaires_payments`, `V2.Core.Account.configuration.merchant.capabilities.cashapp_payments`, `V2.Core.Account.configuration.merchant.capabilities.eps_payments`, `V2.Core.Account.configuration.merchant.capabilities.fpx_payments`, `V2.Core.Account.configuration.merchant.capabilities.gb_bank_transfer_payments`, `V2.Core.Account.configuration.merchant.capabilities.grabpay_payments`, `V2.Core.Account.configuration.merchant.capabilities.ideal_payments`, `V2.Core.Account.configuration.merchant.capabilities.jcb_payments`, `V2.Core.Account.configuration.merchant.capabilities.jp_bank_transfer_payments`, `V2.Core.Account.configuration.merchant.capabilities.kakao_pay_payments`, `V2.Core.Account.configuration.merchant.capabilities.klarna_payments`, `V2.Core.Account.configuration.merchant.capabilities.konbini_payments`, `V2.Core.Account.configuration.merchant.capabilities.kr_card_payments`, `V2.Core.Account.configuration.merchant.capabilities.link_payments`, `V2.Core.Account.configuration.merchant.capabilities.mobilepay_payments`, `V2.Core.Account.configuration.merchant.capabilities.multibanco_payments`, `V2.Core.Account.configuration.merchant.capabilities.mx_bank_transfer_payments`, `V2.Core.Account.configuration.merchant.capabilities.naver_pay_payments`, `V2.Core.Account.configuration.merchant.capabilities.oxxo_payments`, `V2.Core.Account.configuration.merchant.capabilities.p24_payments`, `V2.Core.Account.configuration.merchant.capabilities.pay_by_bank_payments`, `V2.Core.Account.configuration.merchant.capabilities.payco_payments`, `V2.Core.Account.configuration.merchant.capabilities.paynow_payments`, `V2.Core.Account.configuration.merchant.capabilities.promptpay_payments`, `V2.Core.Account.configuration.merchant.capabilities.revolut_pay_payments`, `V2.Core.Account.configuration.merchant.capabilities.samsung_pay_payments`, `V2.Core.Account.configuration.merchant.capabilities.sepa_bank_transfer_payments`, `V2.Core.Account.configuration.merchant.capabilities.sepa_debit_payments`, `V2.Core.Account.configuration.merchant.capabilities.stripe_balance.payouts`, `V2.Core.Account.configuration.merchant.capabilities.swish_payments`, `V2.Core.Account.configuration.merchant.capabilities.twint_payments`, `V2.Core.Account.configuration.merchant.capabilities.us_bank_transfer_payments`, `V2.Core.Account.configuration.merchant.capabilities.zip_payments`, `V2.Core.Account.configuration.recipient.capabilities.bank_accounts.local`, `V2.Core.Account.configuration.recipient.capabilities.bank_accounts.wire`, `V2.Core.Account.configuration.recipient.capabilities.cards`, `V2.Core.Account.configuration.recipient.capabilities.stripe_balance.payouts`, `V2.Core.Account.configuration.recipient.capabilities.stripe_balance.stripe_transfers`, `V2.Core.Account.configuration.storer.capabilities.financial_addresses.bank_accounts`, `V2.Core.Account.configuration.storer.capabilities.holds_currencies.eur`, `V2.Core.Account.configuration.storer.capabilities.holds_currencies.gbp`, `V2.Core.Account.configuration.storer.capabilities.holds_currencies.usd`, `V2.Core.Account.configuration.storer.capabilities.inbound_transfers.bank_accounts`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments.bank_accounts`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments.cards`, `V2.Core.Account.configuration.storer.capabilities.outbound_payments.financial_accounts`, `V2.Core.Account.configuration.storer.capabilities.outbound_transfers.bank_accounts`, and `V2.Core.Account.configuration.storer.capabilities.outbound_transfers.financial_accounts`
  * Add support for new values `al_bank_account`, `am_bank_account`, `bn_bank_account`, `bw_bank_account`, `dz_bank_account`, `gy_bank_account`, `jm_bank_account`, `jo_bank_account`, `kw_bank_account`, `lk_bank_account`, `ma_bank_account`, `om_bank_account`, and `tz_bank_account` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
  * Change type of `V2.Core.Account.identity.business_details.annual_revenue.amount`, `V2.Core.Account.identity.business_details.monthly_estimated_revenue.amount`, `V2.MoneyManagement.Adjustment.amount`, `V2.MoneyManagement.InboundTransfer.amount`, `V2.MoneyManagement.OutboundPayment.amount`, `V2.MoneyManagement.OutboundPaymentQuote.amount`, `V2.MoneyManagement.OutboundPaymentQuote.estimated_fees[].amount`, `V2.MoneyManagement.OutboundTransfer.amount`, `V2.MoneyManagement.ReceivedCredit.amount`, `V2.MoneyManagement.ReceivedDebit.amount`, `V2.MoneyManagement.Transaction.amount`, `V2\Core\Account.create().$params.identity.business_detail.annual_revenue.amount`, `V2\Core\Account.create().$params.identity.business_detail.monthly_estimated_revenue.amount`, `V2\Core\Account.update().$params.identity.business_detail.annual_revenue.amount`, `V2\Core\Account.update().$params.identity.business_detail.monthly_estimated_revenue.amount`, `V2\Core\AccountToken.create().$params.identity.business_detail.annual_revenue.amount`, `V2\Core\AccountToken.create().$params.identity.business_detail.monthly_estimated_revenue.amount`, `V2\FinancialAddressCreditSimulation.credit().$params.amount`, `V2\MoneyManagement\InboundTransfer.create().$params.amount`, `V2\MoneyManagement\OutboundPayment.create().$params.amount`, `V2\MoneyManagement\OutboundPaymentQuote.create().$params.amount`, and `V2\MoneyManagement\OutboundTransfer.create().$params.amount` from `amount` to `an object`
  * Add support for new values `at_stn`, `at_vat`, `be_vat`, `bg_vat`, `ca_gst_hst`, `cy_he`, `cy_vat`, `cz_vat`, `de_stn`, `dk_vat`, `ee_vat`, `es_vat`, `fi_vat`, `fr_rna`, `gr_afm`, `gr_vat`, `hr_mbs`, `hr_oib`, `hr_vat`, `hu_tin`, `hu_vat`, `ie_trn`, `ie_vat`, `lt_vat`, `lu_nif`, `lu_vat`, `lv_vat`, `mt_tin`, `mt_vat`, `my_itn`, `nl_rsin`, `nl_vat`, `nz_ird`, `pl_nip`, `pl_vat`, `ro_orc`, `ro_vat`, `se_vat`, `si_tin`, `si_vat`, `sk_dic`, and `sk_vat` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
  * Remove support for value `hk_mbs` from enum `V2.Core.Account.identity.business_details.id_numbers[].type`
  * Add support for new values `ar_cuil`, `at_stn`, `be_nrn`, `bg_ucn`, `bn_nric`, `ca_sin`, `ch_oasi`, `cl_rut`, `cn_pp`, `co_nuip`, `cr_ci`, `cy_tic`, `cz_rc`, `dk_cpr`, `do_cie`, `ec_ci`, `ee_ik`, `es_nif`, `fi_hetu`, `fr_nir`, `gb_nino`, `gr_afm`, `hr_oib`, `hu_ad`, `id_nik`, `ie_ppsn`, `is_kt`, `it_cf`, `jp_inc`, `ke_pin`, `li_peid`, `lt_ak`, `lu_nif`, `lv_pk`, `ng_nin`, `no_nin`, `nz_ird`, `pl_pesel`, `pt_nif`, `ro_cnp`, `se_pin`, `sk_dic`, `tr_tin`, `uy_dni`, and `za_id` on enums `V2.Core.Account.identity.individual.id_numbers[].type` and `V2.Core.AccountPerson.id_numbers[].type`
  * Change `V2.Core.Account.defaults.responsibilities` to be required
  * Change `V2.Core.Account.defaults.responsibilities.fees_collector` to be optional
  * Change `V2.Core.Account.defaults.responsibilities.losses_collector` to be optional
  * Add support for `financial_connections_account` on `V2.Core.Vault.UsBankAccount` and `V2.MoneyManagement.PayoutMethod.bank_account`
  * Change type of `V2.MoneyManagement.FinancialAccount.balance.available`, `V2.MoneyManagement.Transaction.balance_impact.available`, and `V2.MoneyManagement.TransactionEntry.balance_impact.available` from `amount` to `an object`
  * Change type of `V2.MoneyManagement.FinancialAccount.balance.inbound_pending`, `V2.MoneyManagement.Transaction.balance_impact.inbound_pending`, and `V2.MoneyManagement.TransactionEntry.balance_impact.inbound_pending` from `amount` to `an object`
  * Change type of `V2.MoneyManagement.FinancialAccount.balance.outbound_pending`, `V2.MoneyManagement.Transaction.balance_impact.outbound_pending`, and `V2.MoneyManagement.TransactionEntry.balance_impact.outbound_pending` from `amount` to `an object`
  * Change type of `V2.MoneyManagement.InboundTransfer.from.debited`, `V2.MoneyManagement.OutboundPayment.from.debited`, `V2.MoneyManagement.OutboundPaymentQuote.from.debited`, and `V2.MoneyManagement.OutboundTransfer.from.debited` from `amount` to `an object`
  * Change type of `V2.MoneyManagement.InboundTransfer.to.credited`, `V2.MoneyManagement.OutboundPayment.to.credited`, `V2.MoneyManagement.OutboundPaymentQuote.to.credited`, and `V2.MoneyManagement.OutboundTransfer.to.credited` from `amount` to `an object`
  * Add support for `transfer` on `V2.MoneyManagement.ReceivedCredit.balance_transfer`
  * Add support for new value `transfer` on enum `V2.MoneyManagement.ReceivedCredit.balance_transfer.type`
  * Change `V2\Core\AccountToken.create().$params.identity` to be optional
  * Add support for event notification `V2MoneyManagementPayoutMethodCreatedEvent` with related object `V2.MoneyManagement.PayoutMethod`
  * Add support for error type `ControlledByAlternateResourceException`
  * Remove support for error type `RateLimitException`
  * Add support for error code `account_token_required_for_v2_account` on `QuotePreviewInvoice.last_finalization_error`

## 19.1.0-beta.1 - 2025-11-18
This release changes the pinned API version to `2025-11-17.preview`.

* [#1952](https://github.com/stripe/stripe-php/pull/1952) Update generated code for beta
  * Add support for new resources `V2.Core.AccountPersonToken` and `V2.Core.AccountToken`
  * Remove support for resource `V2.Payments.OffSessionPayment`
  * Add support for `create` and `retrieve` methods on resources `V2.Core.AccountPersonToken` and `V2.Core.AccountToken`
  * Remove support for `all`, `cancel`, `capture`, `create`, and `retrieve` methods on resource `V2.Payments.OffSessionPayment`
  * Change `Tax.Association.tax_transaction_attempts` to be required
  * Add support for `specified_commercial_transactions_act_url` on `Account.business_profile`, `Account.create().$params.business_profile`, and `Account.update().$params.business_profile`
  * Add support for `paypay_payments` on `Account.create().$params.setting`, `Account.settings`, and `Account.update().$params.setting`
  * Change type of `Billing\Analytics\MeterUsage.retrieve().$params.meter.dimension_filters` from `string` to `array(string)`
  * Change type of `Billing\Analytics\MeterUsage.retrieve().$params.meter.tenant_filters` from `string` to `array(string)`
  * Add support for `car_rental_data`, `flight_data`, and `lodging_data` on `Charge.capture().$params.payment_detail`, `Charge.update().$params.payment_detail`, `PaymentIntent.capture().$params.payment_detail`, `PaymentIntent.confirm().$params.payment_detail`, `PaymentIntent.create().$params.payment_detail`, and `PaymentIntent.update().$params.payment_detail`
  * Add support for `supplementary_purchase_data` on `Order.create().$params.payment.setting.payment_method_option.klarna`, `Order.update().$params.payment.setting.payment_method_option.klarna`, `PaymentIntent.confirm().$params.payment_method_option.klarna`, `PaymentIntent.create().$params.payment_method_option.klarna`, and `PaymentIntent.update().$params.payment_method_option.klarna`
  * Add support for `allow_redisplay` and `customer_account` on `PaymentMethod.all().$params`
  * Add support for `future_requirements` on `V2.Core.Account`
  * Add support for `konbini_payments` and `script_statement_descriptor` on `V2.Core.Account.configuration.merchant`, `V2\Core\Account.create().$params.configuration.merchant`, and `V2\Core\Account.update().$params.configuration.merchant`
  * Add support for `eur` on `V2.Core.Account.configuration.storer.capabilities.holds_currencies`, `V2\Core\Account.create().$params.configuration.storer.capability.holds_currency`, and `V2\Core\Account.update().$params.configuration.storer.capability.holds_currency`
  * Add support for `requirements_collector` on `V2.Core.Account.defaults.responsibilities`
  * Add support for new value `ar_cuit` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
  * Add support for new value `ar_dni` on enums `V2.Core.Account.identity.individual.id_numbers[].type` and `V2.Core.AccountPerson.id_numbers[].type`
  * Remove support for `collector` on `V2.Core.Account.requirements`
  * Add support for new value `holds_currencies.eur` on enum `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for new values `payment_method` and `person` on enum `V2.Core.Account.requirements.entries[].reference.type`
  * Remove support for value `resource` from enum `V2.Core.Account.requirements.entries[].reference.type`
  * Remove support for value `future_requirements` from enum `V2.Core.Account.requirements.entries[].requested_reasons[].code`
  * Add support for `changes` on `V2.Core.Event`
  * Remove support for value `sepa_bank_account` from enum `V2.MoneyManagement.FinancialAddress.credentials.type`
  * Add support for `account_token` on `V2\Core\Account.create().$params` and `V2\Core\Account.update().$params`
  * Add support for `person_token` on `V2\Core\AccountPerson.create().$params` and `V2\Core\AccountPerson.update().$params`
  * Add support for thin event `V2CoreHealthEventGenerationFailureResolvedEvent`
  * Remove support for thin events `V2PaymentsOffSessionPaymentAuthorizationAttemptFailedEvent`, `V2PaymentsOffSessionPaymentAuthorizationAttemptStartedEvent`, `V2PaymentsOffSessionPaymentCanceledEvent`, `V2PaymentsOffSessionPaymentCreatedEvent`, `V2PaymentsOffSessionPaymentFailedEvent`, `V2PaymentsOffSessionPaymentRequiresCaptureEvent`, and `V2PaymentsOffSessionPaymentSucceededEvent` with related object `V2.Payments.OffSessionPayment`

## 18.2.0-beta.1 - 2025-10-29
This release changes the pinned API version to `2025-10-29.preview`.

* [#1930](https://github.com/stripe/stripe-php/pull/1930) Update generated code for beta
  * Add support for `last_seen_at` on `Terminal.Reader`
* [#1937](https://github.com/stripe/stripe-php/pull/1937) Update generated code for beta
  * Add support for `update` method on resource `V2.MoneyManagement.FinancialAccount`
  * Add support for `all`, `confirm_microdeposits`, and `send_microdeposits` methods on resource `V2.Core.Vault.UsBankAccount`
  * Add support for `all` method on resource `V2.Core.Vault.GbBankAccount`
  * Add support for new value `verification_data_not_found` on enums `Account.future_requirements.errors[].code`, `Account.requirements.errors[].code`, `BankAccount.future_requirements.errors[].code`, `BankAccount.requirements.errors[].code`, `Capability.future_requirements.errors[].code`, `Capability.requirements.errors[].code`, `Person.future_requirements.errors[].code`, and `Person.requirements.errors[].code`
  * Add support for `payment_portal_url` on `Charge.payment_method_details.rechnung`, `PaymentAttemptRecord.payment_method_details.rechnung`, and `PaymentRecord.payment_method_details.rechnung`
  * Add support for `tax_id_element` on `CustomerSession.components` and `CustomerSession.create().$params.component`
  * Add support for `starting_after` on `PaymentAttemptRecord.all().$params`
  * Add support for new value `solana` on enums `PaymentAttemptRecord.payment_method_details.crypto.network` and `PaymentRecord.payment_method_details.crypto.network`
  * Add support for `reference` on `PaymentIntent.capture().$params.amount_detail.line_item.payment_method_option.klarna`, `PaymentIntent.confirm().$params.amount_detail.line_item.payment_method_option.klarna`, `PaymentIntent.create().$params.amount_detail.line_item.payment_method_option.klarna`, `PaymentIntent.increment_authorization().$params.amount_detail.line_item.payment_method_option.klarna`, `PaymentIntent.update().$params.amount_detail.line_item.payment_method_option.klarna`, and `PaymentIntentAmountDetailsLineItem.payment_method_options.klarna`
  * Change `PaymentIntent.payment_details.customer_reference` to be required
  * Change `PaymentIntent.payment_details.order_reference` to be required
  * Add support for `subscription_reference` on `PaymentIntentAmountDetailsLineItem.payment_method_options.klarna`
  * Add support for `closed` on `V2.Core.Account` and `V2\Core\Account.all().$params`
  * Add support for new value `payment_method` on enum `V2.Core.Account.configuration.customer.automatic_indirect_tax.location_source`
  * Add support for `usd` on `V2.Core.Account.configuration.storer.capabilities.holds_currencies`, `V2\Core\Account.create().$params.configuration.storer.capability.holds_currency`, and `V2\Core\Account.update().$params.configuration.storer.capability.holds_currency`
  * Add support for new values `application_custom` and `application_express` on enum `V2.Core.Account.defaults.responsibilities.fees_collector`
  * Add support for `representative_declaration` on `V2.Core.Account.identity.attestations`, `V2\Core\Account.create().$params.identity.attestation`, and `V2\Core\Account.update().$params.identity.attestation`
  * Add support for new value `holds_currencies.usd` on enum `V2.Core.Account.requirements.entries[].impact.restricts_capabilities[].capability`
  * Add support for `verification` on `V2.Core.Vault.UsBankAccount`
  * Add support for `v1_id` on `EventsV2MoneyManagementTransactionCreatedEvent`
  * Remove support for thin event `V2BillingBillSettingUpdatedEvent` with related object `V2.Billing.BillSetting`
  * Add support for error code `payment_intent_rate_limit_exceeded` on `QuotePreviewInvoice.last_finalization_error`
* [#1945](https://github.com/stripe/stripe-php/pull/1945) Update generated code for beta
  * Add support for `crypto_storer` on `V2\Core\Account.update().$params.identity.attestation.terms_of_service`

## 18.1.0-beta.1 - 2025-09-30
This release changes the pinned API version to `2025-09-30.preview`.

It is built on top of SDK version 18.0.0 which contains breaking changes. Please review the [changelog for 18.0.0](https://github.com/stripe/stripe-php/blob/master/CHANGELOG.md#1800---2025-09-30) if upgrading from older SDK versions.

* [#1896](https://github.com/stripe/stripe-php/pull/1896) Update generated code for beta
  * Add support for new resources `Billing.Analytics.MeterUsageRow` and `Billing.Analytics.MeterUsage`
  * Remove support for resources `Billing.MeterUsageRow` and `Billing.MeterUsage`
  * Add support for `retrieve` method on resource `Billing.Analytics.MeterUsage`
  * Remove support for `retrieve` method on resource `Billing.MeterUsage`
  * Add support for `report_payment_attempt_informational` method on resource `PaymentRecord`
  * Add support for `minimum_balance_by_currency` on `BalanceSettings.payments.payouts` and `BalanceSettings.update().$params.payment.payout`
  * Change type of `BalanceSettings.update().$params.payment.settlement_timing.delay_days_override` from `longInteger` to `emptyable(longInteger)`
  * Change `BalanceSettings.update().$params.payments` to be optional
  * Remove support for values `saturday` and `sunday` from enum `BalanceSettings.payments.payouts.schedule.weekly_payout_days`
  * Add support for `delay_days_override` on `BalanceSettings.payments.settlement_timing`
  * Add support for `automatic_tax` and `invoice_creation` on `Checkout\Session.update().$params`
  * Add support for `unit_label` on `Checkout\Session.update().$params.line_item.price_datum.product_datum`
  * Add support for `invoice_settings` on `Checkout\Session.update().$params.subscription_datum`
  * Change `Checkout.Session.collected_information.business_name` to be required
  * Add support for `intended_submission_method` on `Dispute.update().$params` and `Dispute`
  * Change type of `Dispute.smart_disputes.recommended_evidence` from `string` to `array(string)`
  * Add support for `pix` on `Invoice.create().$params.payment_setting.payment_method_option`, `Invoice.payment_settings.payment_method_options`, `Invoice.update().$params.payment_setting.payment_method_option`, `QuotePreviewInvoice.payment_settings.payment_method_options`, `Subscription.create().$params.payment_setting.payment_method_option`, `Subscription.payment_settings.payment_method_options`, and `Subscription.update().$params.payment_setting.payment_method_option`
  * Add support for `billing_schedules` on `Invoice.create_preview().$params.subscription_detail`, `Subscription.create().$params`, `Subscription.update().$params`, and `Subscription`
  * Add support for new value `pix` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
  * Add support for `paypay` on `PaymentAttemptRecord.payment_method_details` and `PaymentRecord.payment_method_details`
  * Add support for `wallet` on `PaymentAttemptRecord.payment_method_details.card` and `PaymentRecord.payment_method_details.card`
  * Change type of `PaymentAttemptRecord.processor_details.custom.payment_reference` and `PaymentRecord.processor_details.custom.payment_reference` from `string` to `nullable(string)`
  * Add support for `flexible` on `QuotePreviewSubscriptionSchedule.billing_mode`
  * Add support for `billed_until` on `SubscriptionItem`
  * Add support for error codes `financial_connections_account_pending_account_numbers` and `financial_connections_account_unavailable_account_numbers` on `QuotePreviewInvoice.last_finalization_error`
* [#1907](https://github.com/stripe/stripe-php/pull/1907) Update generated code for beta
  * Add support for new resources `V2.Billing.BillSettingVersion`, `V2.Billing.BillSetting`, `V2.Billing.Cadence`, `V2.Billing.CollectionSettingVersion`, `V2.Billing.CollectionSetting`, and `V2.Billing.Profile`
  * Add support for `all`, `create`, `retrieve`, and `update` methods on resources `V2.Billing.BillSetting`, `V2.Billing.CollectionSetting`, and `V2.Billing.Profile`
  * Add support for `all` and `retrieve` methods on resources `V2.Billing.BillSettingVersion` and `V2.Billing.CollectionSettingVersion`
  * Add support for `all`, `cancel`, `create`, `retrieve`, and `update` methods on resource `V2.Billing.Cadence`
  * Add support for thin event `V2BillingBillSettingUpdatedEvent` with related object `V2.Billing.BillSetting`
  * Remove support for `currency` on `V2\MoneyManagement\FinancialAddress.create().$params`
  * Add support for `amount_details` and `payments_orchestration` on `V2.Payments.OffSessionPayment` and `V2\Payments\OffSessionPayment.create().$params`
  * Add support for `mandate_data` and `payment_method_options` on `V2\Payments\OffSessionPayment.create().$params`
  * Add support for `retry_policy` on `V2.Payments.OffSessionPayment.retry_details` and `V2\Payments\OffSessionPayment.create().$params.retry_detail`
  * Add support for `profile` on `V2.Core.Account.defaults`, `V2\Core\Account.create().$params.default`, and `V2\Core\Account.update().$params.default`
  * Add support for `sepa_bank_account` on `V2.MoneyManagement.FinancialAddress.credentials` and `V2.MoneyManagement.ReceivedCredit.bank_transfer`
  * Add support for new value `sepa_bank_account` on enum `V2.MoneyManagement.FinancialAddress.credentials.type`
  * Add support for new value `crypto_wallet` on enum `V2.Core.Account.configuration.recipient.default_outbound_destination.type`
  * Add support for `settlement_currency` on `V2.MoneyManagement.FinancialAddress`
  * Add support for new value `authorization_expired` on enum `V2.Payments.OffSessionPayment.failure_reason`
  * Change type of `V2.MoneyManagement.OutboundPaymentQuote.fx_quote.lock_expires_at` from `DateTime` to `nullable(DateTime)`
  * Add support for `i_p` on `V2.Core.Account.identity.attestations.directorship_declaration`, `V2.Core.Account.identity.attestations.ownership_declaration`, `V2.Core.Account.identity.attestations.terms_of_service.account`, `V2.Core.Account.identity.attestations.terms_of_service.storer`, `V2.Core.Account.identity.individual.additional_terms_of_service.account`, `V2.Core.Person.additional_terms_of_service.account`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.account`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.storer`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service.account`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service.storer`, `V2\Core\Person.create().$params.additional_terms_of_service.account`, and `V2\Core\Person.update().$params.additional_terms_of_service.account`
  * Remove support for `ip` on `V2.Core.Account.identity.attestations.directorship_declaration`, `V2.Core.Account.identity.attestations.ownership_declaration`, `V2.Core.Account.identity.attestations.terms_of_service.account`, `V2.Core.Account.identity.attestations.terms_of_service.storer`, `V2.Core.Account.identity.individual.additional_terms_of_service.account`, `V2.Core.Person.additional_terms_of_service.account`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.account`, `V2\Core\Account.create().$params.identity.attestation.terms_of_service.storer`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service.account`, `V2\Core\Account.update().$params.identity.attestation.terms_of_service.storer`, `V2\Core\Person.create().$params.additional_terms_of_service.account`, and `V2\Core\Person.update().$params.additional_terms_of_service.account`
  * Remove support for `doing_business_as`, `product_description`, and `url` on `V2.Core.Account.identity.business_details`, `V2\Core\Account.create().$params.identity.business_detail`, and `V2\Core\Account.update().$params.identity.business_detail`
  * Add support for new values `heuristic` and `scheduled` on enum `V2.Payments.OffSessionPayment.retry_details.retry_strategy`
  * Change type of `V2.MoneyManagement.OutboundPaymentQuote.fx_quote.lock_duration` from `literal('five_minutes')` to `enum('five_minutes'|'none')`
  * Add support for new value `none` on enum `V2.MoneyManagement.OutboundPaymentQuote.fx_quote.lock_status`
  * Add support for new value `crypto_wallet` on enum `V2.MoneyManagement.PayoutMethod.type`
  * Add support for `origin_type` on `V2.MoneyManagement.ReceivedCredit.bank_transfer`
  * Remove support for `payment_method_type` on `V2.MoneyManagement.ReceivedCredit.bank_transfer`
  * Add support for `type` on `V2\MoneyManagement\FinancialAddress.create().$params`
  * Add support for new values `financial_addressses.crypto_wallets`, `holds_currencies.usdc`, `outbound_payments.crypto_wallets`, and `outbound_transfers.crypto_wallets` on enum `EventsV2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent.updated_capability`
* [#1914](https://github.com/stripe/stripe-php/pull/1914) Update generated code for beta
  * Add support for `attach_cadence` method on resource `Subscription`
  * Add support for `billing_cadence` on `Invoice.create_preview().$params`, `Subscription.create().$params`, `Subscription.update().$params`, and `Subscription`
  * Add support for `billing_cadence_details` on `Invoice.parent` and `QuotePreviewInvoice.parent`
  * Add support for new value `billing_cadence_details` on enums `Invoice.parent.type` and `QuotePreviewInvoice.parent.type`

## 17.7.0-beta.1 - 2025-08-27
This release changes the pinned API version to `2025-08-27.preview`.

* [#1888](https://github.com/stripe/stripe-php/pull/1888) Update generated code for beta
  * Add support for `all` and `retrieve` methods on resource `InvoicePayment`
  * Add support for `all` method on resource `Mandate`
  * Add support for `applied` on `V2.Core.Account.configuration.customer`, `V2.Core.Account.configuration.merchant`, `V2.Core.Account.configuration.recipient`, `V2.Core.Account.configuration.storer`, `V2\Core\Account.update().$params.configuration.customer`, `V2\Core\Account.update().$params.configuration.merchant`, `V2\Core\Account.update().$params.configuration.recipient`, and `V2\Core\Account.update().$params.configuration.storer`
  * Add support for new values `ao_nif`, `az_tin`, `bd_etin`, `cr_cpj`, `cr_nite`, `do_rcn`, `gt_nit`, `kz_bin`, `mz_nuit`, `pe_ruc`, `pk_ntn`, `sa_crn`, and `sa_tin` on enum `V2.Core.Account.identity.business_details.id_numbers[].type`
  * Add support for new values `ao_nif`, `az_tin`, `bd_brc`, `bd_etin`, `bd_nid`, `cr_cpf`, `cr_dimex`, `cr_nite`, `do_rcn`, `gt_nit`, `kz_iin`, `mz_nuit`, `pe_dni`, `pk_cnic`, `pk_snic`, and `sa_tin` on enums `V2.Core.Account.identity.individual.id_numbers[].type` and `V2.Core.Person.id_numbers[].type`
  * Change type of `Billing.AlertTriggered.value` from `longInteger` to `decimal_string`
  * Add support for `display_name` on `V2.MoneyManagement.FinancialAccount` and `V2\MoneyManagement\FinancialAccount.create().$params`
  * Add support for new value `currency_conversion` on enums `V2.MoneyManagement.Transaction.category` and `V2.MoneyManagement.TransactionEntry.transaction_details.category`
  * Add support for `currency_conversion` on `V2.MoneyManagement.Transaction.flow` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow`
  * Add support for new value `currency_conversion` on enums `V2.MoneyManagement.Transaction.flow.type` and `V2.MoneyManagement.TransactionEntry.transaction_details.flow.type`
  * Add support for `payments` on `BalanceSettings.update().$params` and `BalanceSettings`
  * Remove support for `debit_negative_balances`, `payouts`, and `settlement_timing` on `BalanceSettings.update().$params` and `BalanceSettings`
  * Add support for `mandate` on `Charge.payment_method_details.pix`, `PaymentAttemptRecord.payment_method_details.pix`, and `PaymentRecord.payment_method_details.pix`
  * Add support for `coupon_data` on `Checkout\Session.create().$params.discount`
  * Add support for `mandate_options` on `Checkout.Session.payment_method_options.pix`, `Checkout\Session.create().$params.payment_method_option.pix`, `PaymentIntent.confirm().$params.payment_method_option.pix`, `PaymentIntent.create().$params.payment_method_option.pix`, `PaymentIntent.payment_method_options.pix`, and `PaymentIntent.update().$params.payment_method_option.pix`
  * Change type of `Checkout.Session.payment_method_options.pix.setup_future_usage`, `Checkout\Session.create().$params.payment_method_option.pix.setup_future_usage`, `PaymentIntent.confirm().$params.payment_method_option.pix.setup_future_usage`, `PaymentIntent.create().$params.payment_method_option.pix.setup_future_usage`, `PaymentIntent.payment_method_options.pix.setup_future_usage`, and `PaymentIntent.update().$params.payment_method_option.pix.setup_future_usage` from `literal('none')` to `enum('none'|'off_session')`
  * Add support for `amount` on `Mandate.multi_use`, `PaymentAttemptRecord`, and `PaymentRecord`
  * Add support for `currency` on `Mandate.multi_use`
  * Add support for `pix` on `Mandate.payment_method_details`, `SetupAttempt.payment_method_details`, `SetupIntent.confirm().$params.payment_method_option`, `SetupIntent.create().$params.payment_method_option`, `SetupIntent.payment_method_options`, and `SetupIntent.update().$params.payment_method_option`
  * Add support for `limit` on `PaymentAttemptRecord.all().$params`
  * Add support for `amount_authorized`, `amount_refunded`, and `application` on `PaymentAttemptRecord` and `PaymentRecord`
  * Add support for `processor_details` on `PaymentAttemptRecord`, `PaymentRecord.report_payment().$params`, and `PaymentRecord`
  * Remove support for `payment_reference` on `PaymentAttemptRecord`, `PaymentRecord.report_payment().$params`, and `PaymentRecord`
  * Add support for `installments` on `PaymentAttemptRecord.payment_method_details.alma` and `PaymentRecord.payment_method_details.alma`
  * Add support for `transaction_id` on `PaymentAttemptRecord.payment_method_details.alma`, `PaymentAttemptRecord.payment_method_details.amazon_pay`, `PaymentAttemptRecord.payment_method_details.billie`, `PaymentAttemptRecord.payment_method_details.kakao_pay`, `PaymentAttemptRecord.payment_method_details.kr_card`, `PaymentAttemptRecord.payment_method_details.naver_pay`, `PaymentAttemptRecord.payment_method_details.payco`, `PaymentAttemptRecord.payment_method_details.revolut_pay`, `PaymentAttemptRecord.payment_method_details.samsung_pay`, `PaymentAttemptRecord.payment_method_details.satispay`, `PaymentRecord.payment_method_details.alma`, `PaymentRecord.payment_method_details.amazon_pay`, `PaymentRecord.payment_method_details.billie`, `PaymentRecord.payment_method_details.kakao_pay`, `PaymentRecord.payment_method_details.kr_card`, `PaymentRecord.payment_method_details.naver_pay`, `PaymentRecord.payment_method_details.payco`, `PaymentRecord.payment_method_details.revolut_pay`, `PaymentRecord.payment_method_details.samsung_pay`, and `PaymentRecord.payment_method_details.satispay`
  * Add support for `location` and `reader` on `PaymentAttemptRecord.payment_method_details.paynow` and `PaymentRecord.payment_method_details.paynow`
  * Add support for `latest_active_mandate` on `PaymentMethod`
  * Change `Payout.payout_method` to be required
  * Add support for `metadata` and `period` on `QuotePreviewSubscriptionSchedule.phases[].add_invoice_items[]`
  * Add support for `pix_display_qr_code` on `SetupIntent.next_action`
  * Add support for `reader_security` on `Terminal.Configuration`, `Terminal\Configuration.create().$params`, and `Terminal\Configuration.update().$params`
  * Add support for error codes `customer_session_expired` and `india_recurring_payment_mandate_canceled` on `QuotePreviewInvoice.last_finalization_error`

## 17.6.0-beta.2 - 2025-08-08
* [#1891](https://github.com/stripe/stripe-php/pull/1891) Bring back invoice payments APIs that were missing in the public preview SDKs
  * Add support for new resource `InvoicePayment`
  * Add support for `all` and `retrieve` methods on resource `InvoicePayment`

## 17.6.0-beta.1 - 2025-07-30
This release changes the pinned API version to `2025-07-30.preview`.

* [#1885](https://github.com/stripe/stripe-php/pull/1885) Update generated code for beta
  * Add support for new resources `Billing.MeterUsageRow`, `Billing.MeterUsage`, and `Terminal.OnboardingLink`
  * Add support for `retrieve` method on resource `Billing.MeterUsage`
  * Add support for `create` method on resource `Terminal.OnboardingLink`
  * Add support for `smart_disputes` on `Dispute`
  * Add support for new value `upi` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
  * Add support for thin event `V2CoreAccountLinkReturnedEvent`
  * Add support for thin event `V2MoneyManagementPayoutMethodUpdatedEvent` with related object `V2.MoneyManagement.PayoutMethod`
  * Remove support for thin event `V2CoreAccountLinkCompletedEvent`
  * Remove support for thin event `V2OffSessionPaymentRequiresCaptureEvent` with related object `V2.Payments.OffSessionPayment`

## 17.5.0-beta.2 - 2025-07-09
* [#1886](https://github.com/stripe/stripe-php/pull/1886) Pull in V2 FinancialAccount changes for June release
  * Add support for `close` and `create` methods on resource `V2.MoneyManagement.FinancialAccount`
  * Add support for new value `storer` on enum `V2.Core.Account.applied_configurations`
  * Add support for `status_details` on `V2.MoneyManagement.FinancialAccount`
  * Add support for thin events `V2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent` and `V2CoreAccountIncludingConfigurationStorerUpdatedEvent` with related object `V2.Core.Account`
  * Add support for error types `AlreadyExistsException` and `NonZeroBalanceException`

## 17.5.0-beta.1 - 2025-07-01
This release changes the pinned API version to `2025-06-30.preview`.

* [#1876](https://github.com/stripe/stripe-php/pull/1876) Update generated code for beta
  * Change type of `Quote.subscription_data.billing_mode` from `enum('classic'|'flexible')` to `QuotesResourceSubscriptionDataBillingMode`
  * Add support for new value `crypto` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`
  * Change type of `QuotePreviewSubscriptionSchedule.billing_mode`, `Subscription.billing_mode`, and `SubscriptionSchedule.billing_mode` from `enum('classic'|'flexible')` to `SubscriptionsResourceBillingMode`
  * Remove support for `billing_mode_details` on `Subscription`
  * Add support for new value `xx` on enums `V2.Core.Account.identity.country`, `V2.Core.Person.additional_addresses[].country`, `V2.Core.Person.address.country`, and `V2.MoneyManagement.FinancialAccount.country`
  * Add support for new value `xx` on enum `V2.Core.Person.nationalities`
  * Add support for `metadata` on `V2.MoneyManagement.FinancialAccount`
  * Remove support for `description` on `V2.MoneyManagement.FinancialAccount`
  * Add support for new value `pending` on enum `V2.MoneyManagement.FinancialAccount.status`
  * Remove support for `attempts` on `V2.Payments.OffSessionPayment`
  * Change type of `V2.Payments.OffSessionPayment.transfer_data.amount` from `integer` to `nullable(integer)`
  * Change type of `V2.MoneyManagement.ReceivedCredit.balance_transfer.type` from `literal('payout_v1')` to `enum('outbound_payment'|'outbound_transfer'|'payout_v1')`
  * Change type of `V2.MoneyManagement.ReceivedCredit.balance_transfer.payout_v1` from `string` to `nullable(string)`

## 17.4.0-beta.2 - 2025-06-26
* [#1883](https://github.com/stripe/stripe-php/pull/1883) Pull in OffSessionPayment changes for the May release

## 17.4.0-beta.1 - 2025-05-29
This release changes the pinned API version to `2025-05-28.preview`.

* [#1864](https://github.com/stripe/stripe-php/pull/1864) Update generated code for beta
  ### Breaking changes
  * Remove support for deprecated previews
    * Remove support for resources `Billing.MeterErrorReport`, `GiftCards.Card`, `GiftCards.Transaction`, and `Privacy.RedactionJobRootObjects`
    * Remove support for `all`, `create`, `retrieve`, `update`, and `validate` methods on resource `GiftCards.Card`
    * Remove support for `all`, `cancel`, `confirm`, `create`, `retrieve`, and `update` methods on resource `GiftCards.Transaction`
    * Remove support for `provisioning` on `Product`
    * Remove support for snapshot event `BILLING_METER_ERROR_REPORT_TRIGGERED` with resource `Billing.MeterErrorReport`
    * Remove support for error codes `gift_card_balance_insufficient`, `gift_card_code_exists`, and `gift_card_inactive` on `QuotePreviewInvoice.last_finalization_error`
  * Remove support for `amount_remaining` and `credits` on `Order`
  * Change type of `PaymentAttemptRecord.metadata` and `PaymentRecord.metadata` from `nullable(map(string: string))` to `map(string: string)`
  * Remove support for `async_workflows` on `PaymentIntent`
  * Change type of `Privacy.RedactionJob.objects` from `$Privacy.RedactionJobRootObjects` to `RedactionResourceRootObjects`
  * Change type of `Privacy.RedactionJob.status` from `string` to `enum`
  * Change type of `Privacy.RedactionJob.validation_behavior` from `string` to `enum('error'|'fix')`
  * Change type of `Privacy.RedactionJobValidationError.code` from `string` to `enum`
  * Change type of `Privacy.RedactionJobValidationError.erroring_object` from `map(string: string)` to `RedactionResourceErroringObject`
  * Remove support for values `credits_attributed_to_debits` and `legacy_prorations` from enums `Quote.subscription_data.billing_mode`, `QuotePreviewSubscriptionSchedule.billing_mode`, `Subscription.billing_mode`, and `SubscriptionSchedule.billing_mode`
  * Remove support for `status_details` and `status` on `Tax.Association`

  ### Other changes
  * Add support for `migrate` method on resource `Subscription`
  * Add support for `institution` on `FinancialConnections.Account`
  * Add support for `countries` on `FinancialConnections.Institution`
  * Add support for `hooks` on `PaymentIntent`
  * Add support for `livemode` on `Privacy.RedactionJob`
  * Add support for new values `classic` and `flexible` on enums `Quote.subscription_data.billing_mode`, `QuotePreviewSubscriptionSchedule.billing_mode`, `Subscription.billing_mode`, and `SubscriptionSchedule.billing_mode`
  * Add support for `billing_mode_details` on `Subscription`
  * Add support for `tax_transaction_attempts` on `Tax.Association`
  * Add support for error code `forwarding_api_upstream_error` on `QuotePreviewInvoice.last_finalization_error`

## 17.3.0-beta.1 - 2025-04-30
This release changes the pinned API version to `2025-04-30.preview`.

* [#1859](https://github.com/stripe/stripe-php/pull/1859) Update generated code for beta
  This release changes the pinned API version to `2025-04-30.preview`.

  * Add support for new value `balance_settings.updated` on enum `Event.type`
  * Add support for new values `aw_tin`, `az_tin`, `bd_bin`, `bf_ifu`, `bj_ifu`, `cm_niu`, `cv_nif`, `et_tin`, `kg_tin`, and `la_tin` on enum `QuotePreviewInvoice.customer_tax_ids[].type`
  * Add support for `billing_mode` on `QuotePreviewSubscriptionSchedule`, `SubscriptionSchedule`, and `Subscription`

## 17.2.0-beta.4 - 2025-04-17
* [#1855](https://github.com/stripe/stripe-php/pull/1855) Update generated code for beta
  * Add support for new resources `FxQuote` and `PaymentIntentAmountDetailsLineItem`
  * Add support for `all`, `create`, and `retrieve` methods on resource `FxQuote`
  * Remove support for `attach_payment_intent` method on resource `Invoice`
  * Add support for `script` and `type` on `Coupon`
  * Add support for new value `fx_quote.expired` on enum `Event.type`
  * Add support for new value `affirm` on enums `Invoice.payment_settings.payment_method_types`, `QuotePreviewInvoice.payment_settings.payment_method_types`, and `Subscription.payment_settings.payment_method_types`
  * Add support for `fx_quote` on `PaymentIntent` and `Transfer`
  * Add support for `pix` on `PaymentMethodConfiguration`
  * Add support for `us_cfpb_data` on `Person`
  * Add support for `pending_reason` on `Refund`
  * Add support for snapshot event `FX_QUOTE_EXPIRED` with resource `FxQuote`

## 17.2.0-beta.3 - 2025-04-10
* [#1851](https://github.com/stripe/stripe-php/pull/1851) Handle external_account field
  - Changes `external_account` field in `externalAccounts.create` from a `string` to a union type.
* [#1849](https://github.com/stripe/stripe-php/pull/1849) Update generated code for beta
  ### Breaking changes
  * Change type of `V2.MoneyManagement.ReceivedDebit.status_transitions` from `an object` to `nullable(an object)`
  * Remove support for values `bank_accounts.local_uk`, `bank_accounts.wire_uk`, `cards_uk`, and `crypto_wallets_v2` from enum `EventsV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent.updated_capability`

  ### Additions
  * Add support for new resources `Privacy.RedactionJobRootObjects`, `Privacy.RedactionJobValidationError`, and `Privacy.RedactionJob`
  * Add support for `all`, `cancel`, `create`, `retrieve`, `run`, `update`, and `validate` methods on resource `RedactionJob`
  * Add support for `all` and `retrieve` methods on resource `RedactionJobValidationError`
  * Add support for new value `tax_id_prohibited` on enums `Invoice.last_finalization_error.code`, `PaymentIntent.last_payment_error.code`, `QuotePreviewInvoice.last_finalization_error.code`, `SetupAttempt.setup_error.code`, `SetupIntent.last_setup_error.code`, and `StripeError.code`
  * Add support for new value `fixed_term_loan` on enum `Capital.FinancingOffer.type`
  * Add support for `wallet_options` on `Checkout.Session`
  * Add support for new values `privacy.redaction_job.canceled`, `privacy.redaction_job.created`, `privacy.redaction_job.ready`, `privacy.redaction_job.succeeded`, and `privacy.redaction_job.validation_error` on enum `Event.type`
  * Add support for `klarna` on `PaymentMethodDomain`
  * Change type of `Tax.CalculationLineItem.reference` from `nullable(string)` to `string`

## 17.2.0-beta.2 - 2025-04-04
* [#1847](https://github.com/stripe/stripe-php/pull/1847) Remove stdClass from object shapes
  * Remove intersection with `stdClass` in resource properties and fixed `instanceof` checks.

## 17.2.0-beta.1 - 2025-04-02
This release changes the pinned API version to `2025-03-31.preview`.

* [#1830](https://github.com/stripe/stripe-php/pull/1830) Update logic for Stripe::addBetaVersion
  * Stripe::addBetaVersion will use the highest version number used for a beta feature instead of throwing an `Exception` on a conflict as it had done previously.
* [#1814](https://github.com/stripe/stripe-php/pull/1814) , [#1840](https://github.com/stripe/stripe-php/pull/1840) Update generated code for beta
  This release changes the pinned API version to `2025-03-31.preview`

  ### Breaking Changes
  * Remove support for values `repeating` and `variable` from enum `Coupon.duration`
  * Remove support for `amount_overpaid` on `InvoicePayment`
  * Remove support for values `out_of_band_payment` and `payment_record` from enum `InvoicePayment.payment.type`
  * Remove support for `interchange_fees`, `net_total`, `network_fees`, and `transaction_volume` on `Issuing.Settlement`
  * Remove support for `application_fee_amount`, `discount`, `paid_out_of_band`, `paid`, `payment_intent`, `quote`, `subscription_details`, `subscription_proration_date`, `tax`, `total_tax_amounts`, and `transfer_data` on `QuotePreviewInvoice`
  * Change type of `PaymentAttemptRecord.payment_method_details.type` and `PaymentRecord.payment_method_details.type` from `literal('custom')` to `string`
  * Change type of `PaymentAttemptRecord.payment_record` from `string` to `nullable(string)`
  * Change type of `PaymentRecord.latest_payment_attempt_record` from `string` to `nullable(string)`

  ### Additions
  * Add support for new value `repeating` on enum `Coupon.duration`
  * Add support for new resources `BalanceSettings`
  * Add support for `retrieve` and `update` methods on resource `BalanceSettings`
  * Add support for `all`, `create`, `delete`, `retrieve`, and `update` methods on a new `ExternalAccountService` class to access cards and bank accounts made available in the new path `v1/external_accounts`. Access this via `StripeClient.externalAccounts`
  * Add support for new values `stripe_balance_payment_debit_reversal` and `stripe_balance_payment_debit` on enum `BalanceTransaction.type`
  * Add support for `customer_account` on `Billing.CreditBalanceSummary`, `Billing.CreditGrant`, `BillingPortal.Session`, `CashBalance`, `Checkout.Session`, `CreditNote`, `CustomerBalanceTransaction`, `CustomerCashBalanceTransaction`, `CustomerSession`, `Customer`, `Discount`, `InvoiceItem`, `Invoice`, `PaymentIntent`, `PaymentMethod`, `PromotionCode`, `QuotePreviewInvoice`, `QuotePreviewSubscriptionSchedule`, `Quote`, `SetupAttempt`, `SetupIntent`, `SubscriptionSchedule`, `Subscription`, and `TaxId`
  * Add support for `tax_calculation_reference` on `CreditNoteLineItem`, `InvoiceLineItem`, and `LineItem`
  * Add support for `context` on `Event`
  * Add support for `related_customer_account` on `Identity.VerificationSession`
  * Add support for `network_data` on `Issuing.DisputeSettlementDetail`
  * Add support for `interchange_fees_amount`, `net_total_amount`, `network_fees_amount`, `other_fees_amount`, `other_fees_count`, and `transaction_amount` on `Issuing.Settlement`
  * Add support for `reported_by` on `PaymentAttemptRecord`
  * Add support for `stripe_balance` on `PaymentMethod`
  * Add support for `payout_method` on `Payout`
  * Add support for `confirmation_secret`, `parent`, and `total_taxes` on `QuotePreviewInvoice`
  * Add support for new values `forwarding_api_retryable_upstream_error`, `setup_intent_mobile_wallet_unsupported`, `v2_account_disconnection_unsupported`, and `v2_account_missing_configuration` on enum `QuotePreviewInvoice.last_finalization_error.code`
  * Add support for new values `klarna`, `nz_bank_account`, and `stripe_balance` on enum `QuotePreviewInvoice.payment_settings.payment_method_types`

  #### New APIs for Money CardManagement
  * Add support for new resources `V2.FinancialAddressCreditSimulation`, `V2.FinancialAddressGeneratedMicrodeposits`, `V2.MoneyManagement.Adjustment`, `V2.MoneyManagement.FinancialAccount`, `V2.MoneyManagement.FinancialAddress`, `V2.MoneyManagement.InboundTransfer`, `V2.MoneyManagement.OutboundPaymentQuote`, `V2.MoneyManagement.OutboundPayment`, `V2.MoneyManagement.OutboundSetupIntent`, `V2.MoneyManagement.OutboundTransfer`, `V2.MoneyManagement.PayoutMethod`, `V2.MoneyManagement.PayoutMethodsBankAccountSpec`, `V2.MoneyManagement.ReceivedCredit`, `V2.MoneyManagement.ReceivedDebit`, `V2.MoneyManagement.TransactionEntry`, and `V2.MoneyManagement.Transaction`
  * Add support for `create` method on resource `V2.MoneyManagement.OutboundPaymentQuote`
  * Add support for `all` and `retrieve` methods on resources `V2.MoneyManagement.Adjustment`, `V2.MoneyManagement.FinancialAccount`, `V2.MoneyManagement.ReceivedCredit`, `V2.MoneyManagement.ReceivedDebit`, `V2.MoneyManagement.TransactionEntry`, and `V2.MoneyManagement.Transaction`
  * Add support for `all`, `create`, and `retrieve` methods on resources `V2.MoneyManagement.FinancialAddress` and `V2.MoneyManagement.InboundTransfer`
  * Add support for `all`, `cancel`, `create`, and `retrieve` methods on resources `V2.MoneyManagement.OutboundPayment` and `V2.MoneyManagement.OutboundTransfer`
  * Add support for `all`, `archive`, `retrieve`, and `unarchive` methods on resource `V2.MoneyManagement.PayoutMethod`
  * Add support for `all`, `cancel`, `create`, `retrieve`, and `update` methods on resource `V2.MoneyManagement.OutboundSetupIntent`
  * Add support for `retrieve` method on resource `V2.MoneyManagement.PayoutMethodsBankAccountSpec`
  * Add support for new values `account_number`, `fedwire_routing_number`, and `routing_number` on enum `invalid_payment_method.invalid_param`
  * Add support for new thin event `V2MoneyManagementFinancialAccountCreatedEvent` with related object `V2.MoneyManagement.FinancialAccount`
  * Add support for new thin events `V2MoneyManagementFinancialAddressActivatedEvent` and `V2MoneyManagementFinancialAddressFailedEvent` with related object `V2.MoneyManagement.FinancialAddress`
  * Add support for new thin events `V2MoneyManagementInboundTransferAvailableEvent`, `V2MoneyManagementInboundTransferBankDebitFailedEvent`, `V2MoneyManagementInboundTransferBankDebitProcessingEvent`, `V2MoneyManagementInboundTransferBankDebitQueuedEvent`, `V2MoneyManagementInboundTransferBankDebitReturnedEvent`, and `V2MoneyManagementInboundTransferBankDebitSucceededEvent` with related object `V2.MoneyManagement.InboundTransfer`
  * Add support for new thin events `V2MoneyManagementOutboundPaymentCanceledEvent`, `V2MoneyManagementOutboundPaymentCreatedEvent`, `V2MoneyManagementOutboundPaymentFailedEvent`, `V2MoneyManagementOutboundPaymentPostedEvent`, and `V2MoneyManagementOutboundPaymentReturnedEvent` with related object `V2.MoneyManagement.OutboundPayment`
  * Add support for new thin events `V2MoneyManagementOutboundTransferCanceledEvent`, `V2MoneyManagementOutboundTransferCreatedEvent`, `V2MoneyManagementOutboundTransferFailedEvent`, `V2MoneyManagementOutboundTransferPostedEvent`, and `V2MoneyManagementOutboundTransferReturnedEvent` with related object `V2.MoneyManagement.OutboundTransfer`
  * Add support for new thin events `V2MoneyManagementReceivedCreditAvailableEvent`, `V2MoneyManagementReceivedCreditFailedEvent`, `V2MoneyManagementReceivedCreditReturnedEvent`, and `V2MoneyManagementReceivedCreditSucceededEvent` with related object `V2.MoneyManagement.ReceivedCredit`
  * Add support for new thin events `V2MoneyManagementReceivedDebitCanceledEvent`, `V2MoneyManagementReceivedDebitFailedEvent`, `V2MoneyManagementReceivedDebitPendingEvent`, `V2MoneyManagementReceivedDebitSucceededEvent`, and `V2MoneyManagementReceivedDebitUpdatedEvent` with related object `V2.MoneyManagement.ReceivedDebit`
  * Add support for new error types `AlreadyCanceledException`, `BlockedByStripeException`, `ControlledByDashboardException`, `FeatureNotEnabledException`, `FinancialAccountNotOpenException`, `InsufficientFundsException`, `InvalidPayoutMethodException`, `NotCancelableException`, and `RecipientNotNotifiableException`


  #### New APIs for Accounts v2 in private preview
  See [SaaS platform payments with subscription billing using Accounts v2](https://docs.stripe.com/connect/accounts-v2/saas-platform-payments-billing)

  * Add support for new resources `V2.Core.AccountLink`, `V2.Core.Account`, `V2.Core.Person`, `V2.Core.Vault.GbBankAccount`, `V2.Core.Vault.UsBankAccount`
  * Add support for `all`, `close`, `create`, `retrieve`, and `update` methods on resource `V2.Core.Account`
  * Add support for `create` method on resource `V2.Core.AccountLink`
  * Add support for `acknowledge_confirmation_of_payee`, `archive`, `create`, `initiate_confirmation_of_payee`, and `retrieve` methods on resource `V2.Core.Vault.GbBankAccount`
  * Add support for `archive`, `create`, `retrieve`, and `update` methods on resource `V2.Core.Vault.UsBankAccount`
  * Add support for new thin events `V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEvent`, `V2CoreAccountIncludingConfigurationCustomerUpdatedEvent`, `V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent`, `V2CoreAccountIncludingConfigurationMerchantUpdatedEvent`, `V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent`, `V2CoreAccountIncludingConfigurationRecipientUpdatedEvent`, `V2CoreAccountIncludingIdentityUpdatedEvent`, and `V2CoreAccountIncludingRequirementsUpdatedEvent`
  * Add support for new thin event `V2CoreAccountLinkCompletedEvent` with related object `V2.Core.AccountLink`
  * Add support for new thin events `V2CoreAccountPersonCreatedEvent`, `V2CoreAccountPersonDeletedEvent`, and `V2CoreAccountPersonUpdatedEvent` with related object `V2.Core.Person`

  ### Changes
  * Change type of `InvoicePayment.is_default` from `nullable(boolean)` to `boolean`
  * Change type of `PaymentAttemptRecord.payment_method_details.custom` and `PaymentRecord.payment_method_details.custom` from `nullable(PaymentsPrimitivesPaymentRecordsResourcePaymentMethodCustomDetails)` to `PaymentsPrimitivesPaymentRecordsResourcePaymentMethodCustomDetails`

## 16.7.0-beta.1 - 2025-03-18
This release changes the pinned API version to `2025-02-24.acacia`.

* [#1766](https://github.com/stripe/stripe-php/pull/1766) Merge updates from stripe-php master to beta
  * The `Preview` class has been removed. Please use [rawRequest](https://github.com/stripe/stripe-php?tab=readme-ov-file#custom-requests) instead which accepts
       * the http method as parameter instead of the dedicated methods in the `Preview` class
       * an `apiMode` of `v1` instead of `standard` and `v2` instead of `preview`.
* [#1794](https://github.com/stripe/stripe-php/pull/1794) Improved php type hints
  ### Adds Create/Update/Retrieve/Delete/All/Search parameters

  You will now be able to get type hints of the keys that can passed without switching out of your IDE. Eg.
  ```php
  * @param null|array{customer:string, components: array} $params
  ```

  <img width="417" alt="PHPStorm IDE with array type hints" src="https://github.com/user-attachments/assets/e914dcda-354f-4df2-b82e-217ad931e71d">

  ### Updated StripeObject class properties
  We changed the type of class properties from `StripeObject` to something more specific.

  For example: Invoice settings was defined as a StripeObject in Customer resource.

  https://github.com/stripe/stripe-php/blob/bae10cd799404f0f4862ec03810c5ff8ca634b30/lib/Customer.php#L25

  Now you will be able to reference `custom_fields` and `rendering_options` on `customer->invoice_settings` without PHPStan complaining.
  ```php
  * @property object{custom_fields: null|object{name: string, value: string}&\Stripe\StripeObject&\stdClass[], default_payment_method: null|string|\Stripe\PaymentMethod, footer: null|string, rendering_options: null|object{amount_tax_display: null|string, template: null|string}&\Stripe\StripeObject&\stdClass}&\Stripe\StripeObject&\stdClass $invoice_settings
   */
  ```
* [#1820](https://github.com/stripe/stripe-php/pull/1820) Beta SDK updates between Open API versions 1473 and 1505
  Codegen for openapi 1505.

  * Add support for `succeed_input_collection` and `timeout_input_collection` test helper methods on resource `Terminal.Reader`
* [#1825](https://github.com/stripe/stripe-php/pull/1825) Results of running formatter
* [#1712](https://github.com/stripe/stripe-php/pull/1712) Update generated code for beta
* [#1719](https://github.com/stripe/stripe-php/pull/1719) Update generated code for beta
  * Add support for new resource `FinancialConnections.Institution`
  * Add support for `all` and `retrieve` methods on resource `Institution`
  * Add support for new value `balance` on enum `FinancialConnections.Account.subscriptions[]`
* [#1720](https://github.com/stripe/stripe-php/pull/1720) Update generated code for beta
* [#1723](https://github.com/stripe/stripe-php/pull/1723) Update generated code for beta
  * Add support for new resources `Billing.AlertTriggered`, `Billing.Alert`, and `Tax.Association`
  * Add support for `activate`, `all`, `archive`, `create`, `deactivate`, and `retrieve` methods on resource `Alert`
  * Add support for `find` method on resource `Association`
  * Add support for new values `issuing.account_closed_for_not_providing_business_model_clarification`, `issuing.account_closed_for_not_providing_url_clarification`, and `issuing.account_closed_for_not_providing_use_case_clarification` on enum `AccountNotice.reason`
  * Add support for `async_workflows` on `PaymentIntent`
  * Add support for `payto` on `PaymentMethodConfiguration`
  * Add support for `display_name` on `Treasury.FinancialAccount`
* [#1728](https://github.com/stripe/stripe-php/pull/1728) Update generated code for beta
  * Add support for `attach_payment` method on resource `Invoice`
  * Add support for `last_price_migration_error` on `SubscriptionSchedule` and `Subscription`
* [#1730](https://github.com/stripe/stripe-php/pull/1730) Update generated code for beta
  * Add support for new value `custom` on enum `Checkout.Session.ui_mode`
  * Add support for new value `payto` on enum `PaymentLink.payment_method_types[]`
* [#1735](https://github.com/stripe/stripe-php/pull/1735) Update generated code for beta
  * Add support for `collected_information` and `permissions` on `Checkout.Session`
* [#1738](https://github.com/stripe/stripe-php/pull/1738) Update generated code for beta
  * Add support for new resources `Billing.MeterErrorReport` and `Terminal.ReaderCollectedData`
  * Add support for `retrieve` method on resource `ReaderCollectedData`
  * Add support for new value `terminal_reader_collected_data_invalid` on enum `StripeError.code`
  * Add support for new value `billing.meter_error_report.triggered` on enum `Event.type`
  * Add support for `regulatory_reporting_file` on `Issuing.CreditUnderwritingRecord`
  * Add support for new value `mb_way` on enum `PaymentLink.payment_method_types[]`
  * Add support for `mb_way` on `PaymentMethod`
  * Add support for new value `mb_way` on enum `PaymentMethod.type`
* [#1743](https://github.com/stripe/stripe-php/pull/1743) Update generated code for beta
  * Add support for new resources `Issuing.DisputeSettlementDetail` and `Issuing.Settlement`
  * Add support for `all` and `retrieve` methods on resource `DisputeSettlementDetail`
  * Remove support for `all` method on resource `QuotePhase`
  * Add support for new values `issuing_dispute_settlement_detail.created`, `issuing_dispute_settlement_detail.updated`, `issuing_settlement.created`, and `issuing_settlement.updated` on enum `Event.type`
  * Add support for `settlement` on `Issuing.Transaction`
* [#1748](https://github.com/stripe/stripe-php/pull/1748) Update generated code for beta
  * Remove support for resource `QuotePhase`
  * Remove support for `list_line_items` and `retrieve` methods on resource `QuotePhase`
  * Add support for new value `rechnung` on enum `PaymentLink.payment_method_types[]`
* [#1749](https://github.com/stripe/stripe-php/pull/1749) Update generated code for beta
  * Add support for `submit_card` test helper method on resource `Issuing.Card`
  * Add support for `groups` on `Account`
  * Add support for new value `payout_statement_descriptor_profanity` on enum `StripeError.code`
  * Add support for new value `refund.failed` on enum `Event.type`
  * Add support for `metadata` on `Forwarding.Request`
  * Add support for new value `expired` on enum `Issuing.Authorization.status`
  * Add support for `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on `PaymentMethod`
  * Add support for new values `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on enum `PaymentMethod.type`
  * Add support for new values `by_tin`, `ma_vat`, `md_vat`, `tz_vat`, `uz_tin`, and `uz_vat` on enum `TaxId.type`
  * Add support for `flat_amount` and `rate_type` on `TaxRate`
  * Add support for new value `retail_delivery_fee` on enum `TaxRate.tax_type`
* [#1774](https://github.com/stripe/stripe-php/pull/1774) Update generated code for beta
  * Remove support for value `expired` from enum `Issuing.Authorization.status`
  * Add support for new values `alma`, `gopay`, `qris`, and `shopeepay` on enum `PaymentLink.payment_method_types[]`
  * Add support for `alma` on `PaymentMethodConfiguration` and `PaymentMethod`
  * Add support for `gopay`, `qris`, and `shopeepay` on `PaymentMethod`
  * Add support for new values `alma`, `gopay`, `qris`, and `shopeepay` on enum `PaymentMethod.type`
  * Add support for `amazon_pay` on `PaymentMethodDomain`
  * Add support for `au_serr`, `ca_mrdp`, `eu_dac7`, `gb_mrdp`, and `nz_mrdp` on `Tax.Form`
  * Add support for new values `au_serr`, `ca_mrdp`, `eu_dac7`, `gb_mrdp`, and `nz_mrdp` on enum `Tax.Form.type`
* [#1780](https://github.com/stripe/stripe-php/pull/1780) Update generated code for beta
  * Add support for `trigger_action` method on resource `PaymentIntent`
  * Remove support for value `payout_statement_descriptor_profanity` from enum `StripeError.code`
  * Add support for `id_bank_transfer` on `PaymentMethodConfiguration` and `PaymentMethod`
  * Add support for `gopay`, `qris`, and `shopeepay` on `PaymentMethodConfiguration`
* [#1783](https://github.com/stripe/stripe-php/pull/1783) Update generated code for beta
  * Add support for new resources `Issuing.FraudLiabilityDebit`, `PaymentAttemptRecord`, and `PaymentRecord`
  * Add support for `all` and `retrieve` methods on resources `FraudLiabilityDebit` and `PaymentAttemptRecord`
  * Add support for `report_payment_attempt_canceled`, `report_payment_attempt_failed`, `report_payment_attempt_guaranteed`, `report_payment_attempt`, `report_payment`, and `retrieve` methods on resource `PaymentRecord`
  * Add support for `adaptive_pricing` on `Checkout.Session`
  * Add support for new values `invoice.payment_attempt_required` and `issuing_fraud_liability_debit.created` on enum `Event.type`
  * Add support for `amount_overpaid` on `Invoice`
  * Add support for new value `li_vat` on enum `TaxId.type`
  * Add support for new value `service_tax` on enum `TaxRate.tax_type`
  * Change type of `Treasury.InboundTransfer.origin_payment_method` from `string` to `nullable(string)`
* [#1784](https://github.com/stripe/stripe-php/pull/1784) Update generated code for beta
* [#1788](https://github.com/stripe/stripe-php/pull/1788) Update generated code for beta
  * Add support for `network_advice_code` and `network_decline_code` on `StripeError`
  * Add support for new value `invoice.overpaid` on enum `Event.type`
  * Add support for `adjustable_quantity`, `display`, and `metadata` on `LineItem`
  * Change type of `LineItem.description` from `string` to `nullable(string)`
* [#1790](https://github.com/stripe/stripe-php/pull/1790) Update generated code for beta
  * Add support for new values `payout_minimum_balance_hold` and `payout_minimum_balance_release` on enum `BalanceTransaction.type`
* [#1792](https://github.com/stripe/stripe-php/pull/1792) Update generated code for beta
  * Add support for `allow_redisplay` on `Card` and `Source`
  * Remove support for `amount_refunded` on `PaymentRecord`
* [#1796](https://github.com/stripe/stripe-php/pull/1796) Update generated code for beta
  * Add support for `close` method on resource `Treasury.FinancialAccount`
  * Add support for `advice_code` on `StripeError`
  * Add support for `brand_product` on `Card`
  * Add support for `is_default` and `nickname` on `Treasury.FinancialAccount`
* [#1803](https://github.com/stripe/stripe-php/pull/1803) Update generated code for beta
  * V2 Events now are subclass of `\Stripe\V2\Event`.
* [#1808](https://github.com/stripe/stripe-php/pull/1808) Update generated code for beta

## 16.6.0-beta.1 - 2025-02-07
* [#1808](https://github.com/stripe/stripe-php/pull/1808) Update generated code for beta

## 16.5.0-beta.3 - 2025-01-23
This release changes the pinned API version to `2025-01-27.acacia`.

* [#1803](https://github.com/stripe/stripe-php/pull/1803) Update generated code for beta
  * V2 Events now are subclass of `\Stripe\V2\Event`.

## 16.5.0-beta.2 - 2025-01-09
* [#1796](https://github.com/stripe/stripe-php/pull/1796) Update generated code for beta
  * Add support for `close` method on resource `Treasury.FinancialAccount`
  * Add support for `advice_code` on `StripeError`
  * Add support for `brand_product` on `Card`
  * Add support for `is_default` and `nickname` on `Treasury.FinancialAccount`

## 16.5.0-beta.1 - 2024-12-20
* [#1794](https://github.com/stripe/stripe-php/pull/1794) Improved php type hints
  ### Adds Create/Update/Retrieve/Delete/All/Search parameters

  You will now be able to get type hints of the keys that can passed without switching out of your IDE. Eg.
  ```php
  * @param null|array{customer:string, components: array} $params
  ```

  <img width="417" alt="PHPStorm IDE with array type hints" src="https://github.com/user-attachments/assets/e914dcda-354f-4df2-b82e-217ad931e71d">

  ### Updated StripeObject class properties
  We changed the type of class properties from `StripeObject` to something more specific.

  For example: Invoice settings was defined as a StripeObject in Customer resource.

  https://github.com/stripe/stripe-php/blob/bae10cd799404f0f4862ec03810c5ff8ca634b30/lib/Customer.php#L25

  Now you will be able to reference `custom_fields` and `rendering_options` on `customer->invoice_settings` without PHPStan complaining.
  ```php
  * @property object{custom_fields: null|object{name: string, value: string}&\Stripe\StripeObject&\stdClass[], default_payment_method: null|string|\Stripe\PaymentMethod, footer: null|string, rendering_options: null|object{amount_tax_display: null|string, template: null|string}&\Stripe\StripeObject&\stdClass}&\Stripe\StripeObject&\stdClass $invoice_settings
   */
  ```

## 16.4.0-beta.3 - 2024-12-12
This release changes the pinned API version to `2024-12-18.acacia`.

* [#1792](https://github.com/stripe/stripe-php/pull/1792) Update generated code for beta
  * Add support for `allow_redisplay` on `Card` and `Source`
  * Remove support for `amount_refunded` on `PaymentRecord`

## 16.4.0-beta.2 - 2024-12-05
* [#1790](https://github.com/stripe/stripe-php/pull/1790) Update generated code for beta
  * Add support for new values `payout_minimum_balance_hold` and `payout_minimum_balance_release` on enum `BalanceTransaction.type`

## 16.4.0-beta.1 - 2024-11-21
* [#1788](https://github.com/stripe/stripe-php/pull/1788) Update generated code for beta
  * Add support for `network_advice_code` and `network_decline_code` on `StripeError`
  * Add support for new value `invoice.overpaid` on enum `Event.type`
  * Add support for `adjustable_quantity`, `display`, and `metadata` on `LineItem`
  * Change type of `LineItem.description` from `string` to `nullable(string)`

## 16.3.0-beta.3 - 2024-11-14
This release changes the pinned API version to `2024-11-20.acacia`.

* [#1784](https://github.com/stripe/stripe-php/pull/1784) Update generated code for beta

## 16.3.0-beta.2 - 2024-11-07
* [#1783](https://github.com/stripe/stripe-php/pull/1783) Update generated code for beta
  * Add support for new resources `Issuing.FraudLiabilityDebit`, `PaymentAttemptRecord`, and `PaymentRecord`
  * Add support for `all` and `retrieve` methods on resources `FraudLiabilityDebit` and `PaymentAttemptRecord`
  * Add support for `report_payment_attempt_canceled`, `report_payment_attempt_failed`, `report_payment_attempt_guaranteed`, `report_payment_attempt`, `report_payment`, and `retrieve` methods on resource `PaymentRecord`
  * Add support for `adaptive_pricing` on `Checkout.Session`
  * Add support for new values `invoice.payment_attempt_required` and `issuing_fraud_liability_debit.created` on enum `Event.type`
  * Add support for `amount_overpaid` on `Invoice`
  * Add support for new value `li_vat` on enum `TaxId.type`
  * Add support for new value `service_tax` on enum `TaxRate.tax_type`
  * Change type of `Treasury.InboundTransfer.origin_payment_method` from `string` to `nullable(string)`

## 16.3.0-beta.1 - 2024-10-29
This release changes the pinned API version to `2024-10-28.acacia`.

* [#1780](https://github.com/stripe/stripe-php/pull/1780) Update generated code for beta
  * Add support for `trigger_action` method on resource `PaymentIntent`
  * Remove support for value `payout_statement_descriptor_profanity` from enum `StripeError.code`
  * Add support for `id_bank_transfer` on `PaymentMethodConfiguration` and `PaymentMethod`
  * Add support for `gopay`, `qris`, and `shopeepay` on `PaymentMethodConfiguration`

## 16.2.0-beta.3 - 2024-10-18
* [#1774](https://github.com/stripe/stripe-php/pull/1774) Update generated code for beta
  * Remove support for value `expired` from enum `Issuing.Authorization.status`
  * Add support for new values `alma`, `gopay`, `qris`, and `shopeepay` on enum `PaymentLink.payment_method_types[]`
  * Add support for `alma` on `PaymentMethodConfiguration` and `PaymentMethod`
  * Add support for `gopay`, `qris`, and `shopeepay` on `PaymentMethod`
  * Add support for new values `alma`, `gopay`, `qris`, and `shopeepay` on enum `PaymentMethod.type`
  * Add support for `amazon_pay` on `PaymentMethodDomain`
  * Add support for `au_serr`, `ca_mrdp`, `eu_dac7`, `gb_mrdp`, and `nz_mrdp` on `Tax.Form`
  * Add support for new values `au_serr`, `ca_mrdp`, `eu_dac7`, `gb_mrdp`, and `nz_mrdp` on enum `Tax.Form.type`

## 16.2.0-beta.2 - 2024-10-08
This release changes the pinned API version to `2024-09-30.acacia`.

* [#1749](https://github.com/stripe/stripe-php/pull/1749) Update generated code for beta
  * Add support for `submit_card` test helper method on resource `Issuing.Card`
  * Add support for `groups` on `Account`
  * Add support for new value `payout_statement_descriptor_profanity` on enum `StripeError.code`
  * Add support for new value `refund.failed` on enum `Event.type`
  * Add support for `metadata` on `Forwarding.Request`
  * Add support for new value `expired` on enum `Issuing.Authorization.status`
  * Add support for `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on `PaymentMethod`
  * Add support for new values `kakao_pay`, `kr_card`, `naver_pay`, `payco`, and `samsung_pay` on enum `PaymentMethod.type`
  * Add support for new values `by_tin`, `ma_vat`, `md_vat`, `tz_vat`, `uz_tin`, and `uz_vat` on enum `TaxId.type`
  * Add support for `flat_amount` and `rate_type` on `TaxRate`
  * Add support for new value `retail_delivery_fee` on enum `TaxRate.tax_type`

## 16.2.0-beta.1 - 2024-10-03
* [#1766](https://github.com/stripe/stripe-php/pull/1766) The `Preview` class has been removed. Please use [rawRequest](https://github.com/stripe/stripe-php?tab=readme-ov-file#custom-requests) instead which accepts
  * the http method as parameter instead of the dedicated methods in the `Preview` class
  * an `apiMode` of `v1` instead of `standard` and `v2` instead of `preview`.

## 15.11.0-beta.1 - 2024-09-18
* [#1748](https://github.com/stripe/stripe-php/pull/1748) Update generated code for beta
  * Remove support for resource `QuotePhase`
  * Remove support for `list_line_items` and `retrieve` methods on resource `QuotePhase`
  * Add support for new value `rechnung` on enum `PaymentLink.payment_method_types[]`

## 15.10.0-beta.1 - 2024-09-13
* [#1743](https://github.com/stripe/stripe-php/pull/1743) Update generated code for beta
  * Add support for new resources `Issuing.DisputeSettlementDetail` and `Issuing.Settlement`
  * Add support for `all` and `retrieve` methods on resource `DisputeSettlementDetail`
  * Remove support for `all` method on resource `QuotePhase`
  * Add support for new values `issuing_dispute_settlement_detail.created`, `issuing_dispute_settlement_detail.updated`, `issuing_settlement.created`, and `issuing_settlement.updated` on enum `Event.type`
  * Add support for `settlement` on `Issuing.Transaction`

## 15.9.0-beta.1 - 2024-09-05
* [#1738](https://github.com/stripe/stripe-php/pull/1738) Update generated code for beta
  * Add support for new resources `Billing.MeterErrorReport` and `Terminal.ReaderCollectedData`
  * Add support for `retrieve` method on resource `ReaderCollectedData`
  * Add support for new value `terminal_reader_collected_data_invalid` on enum `StripeError.code`
  * Add support for new value `billing.meter_error_report.triggered` on enum `Event.type`
  * Add support for `regulatory_reporting_file` on `Issuing.CreditUnderwritingRecord`
  * Add support for new value `mb_way` on enum `PaymentLink.payment_method_types[]`
  * Add support for `mb_way` on `PaymentMethod`
  * Add support for new value `mb_way` on enum `PaymentMethod.type`

## 15.8.0-beta.1 - 2024-08-15
* [#1735](https://github.com/stripe/stripe-php/pull/1735) Update generated code for beta
  * Add support for `collected_information` and `permissions` on `Checkout.Session`

## 15.7.0-beta.1 - 2024-08-12
* [#1730](https://github.com/stripe/stripe-php/pull/1730) Update generated code for beta
  * Add support for new value `custom` on enum `Checkout.Session.ui_mode`
  * Add support for new value `payto` on enum `PaymentLink.payment_method_types[]`

## 15.6.0-beta.1 - 2024-08-01
* [#1728](https://github.com/stripe/stripe-php/pull/1728) Update generated code for beta
  * Add support for `attach_payment` method on resource `Invoice`
  * Add support for `last_price_migration_error` on `SubscriptionSchedule` and `Subscription`

## 15.5.0-beta.1 - 2024-07-25
* [#1723](https://github.com/stripe/stripe-php/pull/1723) Update generated code for beta
  * Add support for new resources `Billing.AlertTriggered`, `Billing.Alert`, and `Tax.Association`
  * Add support for `activate`, `all`, `archive`, `create`, `deactivate`, and `retrieve` methods on resource `Alert`
  * Add support for `find` method on resource `Association`
  * Add support for new values `issuing.account_closed_for_not_providing_business_model_clarification`, `issuing.account_closed_for_not_providing_url_clarification`, and `issuing.account_closed_for_not_providing_use_case_clarification` on enum `AccountNotice.reason`
  * Add support for `async_workflows` on `PaymentIntent`
  * Add support for `payto` on `PaymentMethodConfiguration`
  * Add support for `display_name` on `Treasury.FinancialAccount`

## 15.3.0-beta.1 - 2024-07-11
* [#1720](https://github.com/stripe/stripe-php/pull/1720) Update generated code for beta

## 15.2.0-beta.1 - 2024-07-05
This release changes the pinned API version to `2024-06-20`.

* [#1712](https://github.com/stripe/stripe-php/pull/1712) Update generated code for beta
* [#1719](https://github.com/stripe/stripe-php/pull/1719) Update generated code for beta
  * Add support for new resource `FinancialConnections.Institution`
  * Add support for `all` and `retrieve` methods on resource `Institution`
  * Add support for new value `balance` on enum `FinancialConnections.Account.subscriptions[]`

## 14.11.0-beta.1 - 2024-06-13
* [#1705](https://github.com/stripe/stripe-php/pull/1705) Syncing changes from 14.10.0 release

## 14.10.0-beta.1 - 2024-05-30
* [#1699](https://github.com/stripe/stripe-php/pull/1699) Update generated code for beta
  * Keeping up with the changes from version 14.9.0

## 14.9.0-beta.1 - 2024-05-23
* [#1696](https://github.com/stripe/stripe-php/pull/1696) Update generated code for beta

## 14.8.0-beta.1 - 2024-05-16
* [#1693](https://github.com/stripe/stripe-php/pull/1693) Update generated code for beta

## 14.7.0-beta.1 - 2024-05-09
* [#1691](https://github.com/stripe/stripe-php/pull/1691) Update generated code for beta
  * No new beta features. Merging changes from the main branch.

## 14.6.0-beta.1 - 2024-05-02
* [#1689](https://github.com/stripe/stripe-php/pull/1689) Update generated code for beta
  * Add support for `rechnung` on `PaymentMethod`
  * Add support for new value `rechnung` on enum `PaymentMethod.type`

## 14.5.0-beta.1 - 2024-04-25
* [#1683](https://github.com/stripe/stripe-php/pull/1683) Update generated code for beta
  * Add support for `cancel_subscription_schedule` on `QuoteLine`

## 14.4.0-beta.1 - 2024-04-18
* [#1679](https://github.com/stripe/stripe-php/pull/1679) Update generated code for beta

## 14.2.0-beta.1 - 2024-04-11
This release changes the pinned API version to `2024-04-10`.

## 13.18.0-beta.1 - 2024-04-04
* [#1665](https://github.com/stripe/stripe-php/pull/1665) Update generated code for beta
* [#1671](https://github.com/stripe/stripe-php/pull/1671) Update generated code for beta
  * Add support for `update` method on resource `Entitlements.Feature`
  * Add support for `risk_controls` on `Account`
  * Change type of `Subscription.discounts` and `SubscriptionItem.discounts` from `nullable(array(expandable($Discount)))` to `array(expandable($Discount))`

## 13.16.0-beta.1 - 2024-03-21
* [#1661](https://github.com/stripe/stripe-php/pull/1661) Update generated code for beta
  * Add support for new resources `Entitlements.ActiveEntitlementSummary` and `Entitlements.ActiveEntitlement`
  * Add support for `all` method on resource `ActiveEntitlement`
  * Add support for `use_stripe_sdk` on `ConfirmationToken`
  * Remove support for `payment_method` on `ConfirmationToken`
  * Change type of `ConfirmationToken.mandate_data` from `ConfirmationTokensResourceMandateData` to `nullable(ConfirmationTokensResourceMandateData)`
  * Add support for `active` and `metadata` on `Entitlements.Feature`
  * Add support for new value `entitlements.active_entitlement_summary.updated` on enum `Event.type`
  * Remove support for value `customer.entitlement_summary.updated` from enum `Event.type`

## 13.15.0-beta.1 - 2024-03-14
* [#1659](https://github.com/stripe/stripe-php/pull/1659) Update generated code for beta
  * Add support for new resources `Billing.MeterEventAdjustment`, `Billing.MeterEvent`, and `Billing.Meter`
  * Add support for `all`, `create`, `deactivate`, `reactivate`, `retrieve`, and `update` methods on resource `Meter`
  * Add support for `create` method on resources `MeterEventAdjustment` and `MeterEvent`
  * Add support for `create` test helper method on resource `ConfirmationToken`
  * Add support for `add_lines`, `remove_lines`, and `update_lines` methods on resource `Invoice`
  * Add support for `multibanco` on `PaymentMethodConfiguration` and `PaymentMethod`
  * Add support for new value `multibanco` on enum `PaymentMethod.type`
  * Add support for `meter` on `Plan`

## 13.14.0-beta.1 - 2024-02-29
* [#1656](https://github.com/stripe/stripe-php/pull/1656) Add helper to set beta version
* [#1655](https://github.com/stripe/stripe-php/pull/1655) Update generated code for beta
  * Remove support for resource `Entitlements.Event`
  * Change type of `ConfirmationToken.mandate_data` from `nullable(ConfirmationTokensResourceMandateData)` to `ConfirmationTokensResourceMandateData`
  * Remove support for `quantity` and `type` on `Entitlements.Feature`
  * Add support for `livemode` on `Issuing.PersonalizationDesign`

## 13.13.0-beta.1 - 2024-02-23
* [#1652](https://github.com/stripe/stripe-php/pull/1652) Update generated code for beta

## 13.12.0-beta.1 - 2024-02-16
* [#1643](https://github.com/stripe/stripe-php/pull/1643) Update generated code for beta
  * Add support for `decrement_authorization` method on resource `PaymentIntent`
  * Add support for `payment_method_options` on `ConfirmationToken`
  * Add support for `payto` and `twint` on `PaymentMethod`
  * Add support for new values `payto` and `twint` on enum `PaymentMethod.type`

## 13.11.0-beta.1 - 2024-02-01
* [#1637](https://github.com/stripe/stripe-php/pull/1637) Update generated code for beta
  * Add support for new resources `Entitlements.Event` and `Entitlements.Feature`
  * Add support for `create` method on resource `Event`
  * Add support for `all` and `create` methods on resource `Feature`
  * Add support for new value `customer.entitlement_summary.updated` on enum `Event.type`

## 13.10.0-beta.3 - 2024-01-25
* [#1634](https://github.com/stripe/stripe-php/pull/1634) Update generated code for beta
  * Add support for `create_preview` method on resource `Invoice`
  * Add support for `charged_off_at` on `Capital.FinancingOffer`
  * Add support for `enhanced_eligibility_types` on `Dispute`

## 13.10.0-beta.2 - 2024-01-19
* [#1632](https://github.com/stripe/stripe-php/pull/1632) Beta: report usage of `rawRequest`

## 13.10.0-beta.1 - 2024-01-12
* [#1626](https://github.com/stripe/stripe-php/pull/1626) Update generated code for beta
* [#1628](https://github.com/stripe/stripe-php/pull/1628) Update generated code for beta

## 13.9.0-beta.1 - 2024-01-04
* [#1626](https://github.com/stripe/stripe-php/pull/1626) Update generated code for beta
  * Updated stable APIs to the latest version

## 13.8.0-beta.1 - 2023-12-22
* [#1618](https://github.com/stripe/stripe-php/pull/1618) Update generated code for beta
* [#1622](https://github.com/stripe/stripe-php/pull/1622) Update generated code for beta
  * Add support for new value `shipping_address_invalid` on enum `StripeError.code`
  * Change type of `Invoice.issuer` from `nullable(ConnectAccountReference)` to `ConnectAccountReference`
  * Add support for `ship_from_details` on `Tax.Calculation` and `Tax.Transaction`

## 13.7.0-beta.1 - 2023-12-08
* [#1617](https://github.com/stripe/stripe-php/pull/1617) Update generated code for beta
  * Add support for `retrieve` method on resource `FinancialConnections.Transaction`

## 13.6.0-beta.1 - 2023-11-30
* [#1610](https://github.com/stripe/stripe-php/pull/1610) Update generated code for beta

## 13.5.0-beta.1 - 2023-11-21
* [#1600](https://github.com/stripe/stripe-php/pull/1600) Update generated code for beta
  * Add support for new value `quote.reestimate_failed` on enum `Event.type`
  * Add support for `metadata` on `QuotePhase`
* [#1606](https://github.com/stripe/stripe-php/pull/1606) Update generated code for beta
  * Add support for `components` and `created` on `CustomerSession`

## 13.4.0-beta.1 - 2023-11-10
* [#1600](https://github.com/stripe/stripe-php/pull/1600) Update generated code for beta
  * Add support for new value `quote.reestimate_failed` on enum `Event.type`
  * Add support for `metadata` on `QuotePhase`

## 13.3.0-beta.1 - 2023-11-02
* [#1598](https://github.com/stripe/stripe-php/pull/1598) Update generated code for beta
  * Add support for `attach_payment_intent` method on resource `Invoice`
  * Add support for `post_payment_amount`, `pre_payment_amount`, and `refunds` on `CreditNote`
  * Add support for new value `invoice.payment.overpaid` on enum `Event.type`
  * Add support for `amounts_due` and `payments` on `Invoice`
  * Add support for `created` on `Issuing.PersonalizationDesign`

## 13.2.0-beta.1 - 2023-10-26
* [#1596](https://github.com/stripe/stripe-php/pull/1596) Update generated code for beta
  * Add support for new resource `Margin`
  * Add support for `all`, `create`, `retrieve`, and `update` methods on resource `Margin`
  * Add support for `default_margins` and `total_margin_amounts` on `Invoice`
  * Add support for `margins` on `InvoiceItem`

## 13.1.0-beta.1 - 2023-10-17
This release changes the pinned API version to `2023-10-16`.

* [#1594](https://github.com/stripe/stripe-php/pull/1594) Update generated code for beta
  - Update pinned API version to `2023-10-16`

## 12.9.0-beta.1 - 2023-10-16
* [#1591](https://github.com/stripe/stripe-php/pull/1591) Update generated code for beta

## 12.8.0-beta.1 - 2023-10-11
* [#1588](https://github.com/stripe/stripe-php/pull/1588) Update generated code for beta
  * Add support for new resources `AccountNotice` and `Issuing.CreditUnderwritingRecord`
  * Add support for `all`, `retrieve`, and `update` methods on resource `AccountNotice`
  * Add support for `all`, `correct`, `create_from_application`, `create_from_proactive_review`, `report_decision`, and `retrieve` methods on resource `CreditUnderwritingRecord`
  * Add support for new values `account_notice.created` and `account_notice.updated` on enum `Event.type`

## 12.7.0-beta.1 - 2023-10-05
* [#1587](https://github.com/stripe/stripe-php/pull/1587) Update generated code for beta
  * Add support for `mark_draft` and `mark_stale` methods on resource `Quote`
  * Remove support for `draft_quote` and `mark_stale_quote` methods on resource `Quote`
  * Add support for `allow_backdated_lines` on `Quote`
  * Rename `previewInvoiceLines` to `allPreviewInvoiceLines` on resource `Quote`

## 12.6.0-beta.1 - 2023-09-28
* [#1585](https://github.com/stripe/stripe-php/pull/1585) Update generated code for beta
  * Rename resources `Issuing.CardDesign` and `Issuing.CardBundle` to `Issuing.PersonalizationDesign` and `Issuing.PhysicalBundle`
  * Add support for `reason` on `Event`

## 12.5.0-beta.1 - 2023-09-21
* [#1578](https://github.com/stripe/stripe-php/pull/1578) Update generated code for beta
  * Remove support for `customer` on `ConfirmationToken`
  * Add support for `issuer` on `Invoice`

## 12.4.0-beta.1 - 2023-09-14
* [#1575](https://github.com/stripe/stripe-php/pull/1575) Update generated code for beta
  * Add support for new resource `ConfirmationToken`
  * Add support for `retrieve` method on resource `ConfirmationToken`
  * Add support for `create` method on resource `Issuing.CardDesign`
  * Add support for `reject_testmode` test helper method on resource `Issuing.CardDesign`
  * Add support for new value `issuing_card_design.rejected` on enum `Event.type`
  * Add support for `features` on `Issuing.CardBundle`
  * Add support for `card_logo`, `carrier_text`, `preferences`, and `rejection_reasons` on `Issuing.CardDesign`
  * Remove support for `preference` on `Issuing.CardDesign`

## 12.3.0-beta.1 - 2023-09-07
* [#1574](https://github.com/stripe/stripe-php/pull/1574) Update generated code for beta
  * Release specs are identical.
* [#1572](https://github.com/stripe/stripe-php/pull/1572) Update generated code for beta
  * Remove support for `submit_card` test helper method on resource `Issuing.Card`
  * Add support for new value `platform_default` on enum `Issuing.CardDesign.preference`

## 12.2.0-beta.1 - 2023-08-31
* [#1559](https://github.com/stripe/stripe-php/pull/1559) Update generated code for beta
  * Rename `Quote.previewInvoices` to `Quote.allPreviewInvoices` and `Quote.previewSubscriptionSchedules` to `Quote.allSubscriptionSchedules`

## 12.0.0-beta.1 - 2023-08-24
This release changes the pinned API version to `2023-08-16`.

* [#1549](https://github.com/stripe/stripe-php/pull/1549) Update generated code for beta
  * Add support for new resources `QuotePreviewInvoice` and `QuotePreviewSchedule`
  * Remove support for `applies_to` on `Invoice` and `SubscriptionSchedule`

## 10.22.0-beta.1 - 2023-08-10
* [#1545](https://github.com/stripe/stripe-php/pull/1545) Update generated code for beta
  * Add support for `paypal` on `PaymentMethodConfiguration`

## 10.21.0-beta.1 - 2023-08-03
* [#1541](https://github.com/stripe/stripe-php/pull/1541) Update generated code for beta
  * Add support for `submit_card` test helper method on resource `Issuing.Card`

## 10.20.0-beta.2 - 2023-07-28
* [#1532](https://github.com/stripe/stripe-php/pull/1532) Update generated code for beta
* [#1535](https://github.com/stripe/stripe-php/pull/1535) Update generated code for beta
  * Add support for new resource `Tax.Form`
  * Add support for `all`, `pdf`, and `retrieve` methods on resource `Form`
  * Add support for `payment_method_configuration_details` on `Checkout.Session` and `SetupIntent`
* [#1537](https://github.com/stripe/stripe-php/pull/1537) Update generated code for beta
  * Release specs are identical.

## 10.20.0-beta.1 - 2023-07-27
  * Updated stable APIs to the latest version

## 10.18.0-beta.1 - 2023-07-13
* [#1519](https://github.com/stripe/stripe-php/pull/1519) Update generated code for beta
  * Rename `Tax.SettingsService` -> `Tax.SettingService`
* [#1527](https://github.com/stripe/stripe-php/pull/1527) Update generated code for beta
  Release specs are identical.
* [#1524](https://github.com/stripe/stripe-php/pull/1524) Update generated code for beta
  * Add support for new resource `PaymentMethodConfiguration`
  * Add support for `all`, `create`, `retrieve`, and `update` methods on resource `PaymentMethodConfiguration`
  * Add support for `payment_method_configuration_details` on `PaymentIntent`
  * Rename `Tax.SettingService` -> `Tax.SettingsService` (parity with main release)

## 10.16.0-beta.1 - 2023-06-22
* [#1510](https://github.com/stripe/stripe-php/pull/1510) Update generated code for beta
* [#1513](https://github.com/stripe/stripe-php/pull/1513) Update generated code for beta
  * Add support for `payment_details` on `PaymentIntent`
* [#1515](https://github.com/stripe/stripe-php/pull/1515) Update generated code for beta
  * Add support for new resource `CustomerSession`
  * Add support for `create` method on resource `CustomerSession`

## 10.15.0-beta.2 - 2023-06-01
* [#1507](https://github.com/stripe/stripe-php/pull/1507) Update generated code for beta
  * Add support for `subscription_details` on `Invoice`
  * Add support for `set_pause_collection` on `QuoteLine`
  * Remove support for `locations` on `Tax.Settings`

## 10.15.0-beta.1 - 2023-05-25
* [#1504](https://github.com/stripe/stripe-php/pull/1504) Add default values for preview and raw_request parameters
* [#1505](https://github.com/stripe/stripe-php/pull/1505) Handle developer message in preview error responses
* [#1500](https://github.com/stripe/stripe-php/pull/1500) Update generated code for beta

## 10.14.0-beta.2 - 2023-05-19
* [#1486](https://github.com/stripe/stripe-php/pull/1486) Add $stripe->rawRequest
* [#1498](https://github.com/stripe/stripe-php/pull/1498) Update generated code for beta
  * Add support for `subscribe` and `unsubscribe` methods on resource `FinancialConnections.Account`
  * Add support for `status_details` and `status` on `Tax.Settings`

## 10.14.0-beta.1 - 2023-05-11
* [#1497](https://github.com/stripe/stripe-php/pull/1497) Fix phpstan errors
* [#1484](https://github.com/stripe/stripe-php/pull/1484) Update generated code for beta
* [#1489](https://github.com/stripe/stripe-php/pull/1489) Update generated code for beta
  * Add support for `head_office` on `Tax.Settings`

## 10.13.0-beta.4 - 2023-04-20
* [#1481](https://github.com/stripe/stripe-php/pull/1481) Update generated code for beta
  * Add support for `country_options` on `Tax.Registration`
  * Remove support for `state` and `type` on `Tax.Registration`

## 10.13.0-beta.3 - 2023-04-13
* [#1477](https://github.com/stripe/stripe-php/pull/1477) Update generated code for beta
  * Add support for `collect_payment_method` and `confirm_payment_intent` methods on resource `Terminal.Reader`

## 10.13.0-beta.2 - 2023-04-06
* [#1472](https://github.com/stripe/stripe-php/pull/1472) Update generated code for beta
  * Updated stable APIs to the latest version

## 10.13.0-beta.1 - 2023-03-30
* [#1469](https://github.com/stripe/stripe-php/pull/1469) Update generated code
  * Add support for new value `ioss` on enum `Tax.Registration.type`

## 10.12.0-beta.1 - 2023-03-23
* [#1459](https://github.com/stripe/stripe-php/pull/1459) Update generated code for beta (new)
  * Add support for new resources `Tax.CalculationLineItem` and `Tax.TransactionLineItem`
  * Add support for `collect_inputs` method on resource `Terminal.Reader`
  * Add support for `financing_offer` on `Capital.FinancingSummary`
  * Add support for new value `link` on enum `PaymentLink.payment_method_types[]`
  * Add support for `automatic_payment_methods` on `SetupIntent`

## 10.11.0-beta.1 - 2023-03-16
* [#1456](https://github.com/stripe/stripe-php/pull/1456) API Updates
  * Add support for `create_from_calculation` method on resource `Tax.Transaction`
  * Change type of `Invoice.applies_to` from `nullable(QuotesResourceQuoteLinesAppliesTo)` to `QuotesResourceQuoteLinesAppliesTo`
  * Add support for `shipping_cost` on `Tax.Calculation` and `Tax.Transaction`
  * Add support for `tax_breakdown` on `Tax.Calculation`
  * Remove support for `tax_summary` on `Tax.Calculation`

## 10.10.0-beta.1 - 2023-03-09
* [#1451](https://github.com/stripe/stripe-php/pull/1451) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Remove support for `list_transactions` method on resource `Tax.Transaction`
  * Change type of `SubscriptionSchedule.applies_to` from `nullable(QuotesResourceQuoteLinesAppliesTo)` to `QuotesResourceQuoteLinesAppliesTo`
  * Add support for `tax_summary` on `Tax.Calculation`
  * Remove support for `tax_breakdown` on `Tax.Calculation`

## 10.9.0-beta.1 - 2023-03-02
* [#1448](https://github.com/stripe/stripe-php/pull/1448) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Add support for new resources `Issuing.CardBundle` and `Issuing.CardDesign`
  * Add support for `all` and `retrieve` methods on resource `CardBundle`
  * Add support for `all`, `retrieve`, and `update` methods on resource `CardDesign`
  * Add support for `card_design` on `Issuing.Card`

## 10.8.0-beta.1 - 2023-02-23
* [#1445](https://github.com/stripe/stripe-php/pull/1445) API Updates for beta branch
  * Updated stable APIs to the latest version

## 10.7.0-beta.1 - 2023-02-16
* [#1442](https://github.com/stripe/stripe-php/pull/1442) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Add support for `currency_conversion` on `Checkout.Session`
  * Add support for `limits` on `FinancialConnections.Session`
  * Remove support for `reference` on `Tax.Calculation`

## 10.6.0-beta.1 - 2023-02-02
* [#1440](https://github.com/stripe/stripe-php/pull/1440) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Add support for `all` method on resource `Transaction`
  * Add support for `inferred_balances_refresh`, `subscriptions`, and `transaction_refresh` on `FinancialConnections.Account`
  * Add support for `manual_entry`, `prefetch`, `status_details`, and `status` on `FinancialConnections.Session`
  * Add support for new resource `FinancialConnections.Transaction`

## 10.5.0-beta.2 - 2023-01-26
* [#1429](https://github.com/stripe/stripe-php/pull/1429) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Add support for `list_transactions` method on resource `Tax.Transaction`

## 10.5.0-beta.1 - 2023-01-19
* [#1427](https://github.com/stripe/stripe-php/pull/1427) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Add support for `Tax.Settings` resource.

## 10.4.0-beta.3 - 2023-01-12
* [#1423](https://github.com/stripe/stripe-php/pull/1423) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Add support for `Tax.Registration` resource.
  * Change `draft_quote` method implementation from hitting `/v1/quotes/{quotes}/draft` to `/v1/quotes/{quotes}/mark_draft`

## 10.4.0-beta.2 - 2023-01-05
* [#1420](https://github.com/stripe/stripe-php/pull/1420) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Add support for `mark_stale_quote` method on resource `Quote`

## 10.4.0-beta.1 - 2022-12-22
* [#1414](https://github.com/stripe/stripe-php/pull/1414) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Move `$stripe->taxCalculations` to `$stripe->tax->calculations` and `$stripe->taxTransactions` to `$stripe->tax->transactions`

## 10.3.0-beta.1 - 2022-12-15
* [#1412](https://github.com/stripe/stripe-php/pull/1412) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Add support for new resources `QuoteLine`, `TaxCalculation`, and `TaxTransaction`
  * Add support for `create` and `list_line_items` methods on resource `TaxCalculation`
  * Add support for `create_reversal`, `create`, and `retrieve` methods on resource `TaxTransaction`

## 10.2.0-beta.1 - 2022-12-08
This release changes the pinned API version to `2022-11-15`.

* [#1398](https://github.com/stripe/stripe-php/pull/1398) API Updates for beta branch
  * Updated stable APIs to the latest version
* [#1408](https://github.com/stripe/stripe-php/pull/1408) API Updates for beta branch
  * Updated stable APIs to the latest version
* [#1406](https://github.com/stripe/stripe-php/pull/1406) API Updates for beta branch
  * Updated stable APIs to the latest version

## 9.9.0-beta.2 - 2022-11-02
* [#1390](https://github.com/stripe/stripe-php/pull/1390) API Updates for beta branch
  * Updated beta APIs to the latest stable version

## 9.9.0-beta.1 - 2022-10-21
* [#1384](https://github.com/stripe/stripe-php/pull/1384) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Add support for `network_data` on `Issuing.Transaction`
  * Add support for `paypal` on `Source`
  * Add support for new value `paypal` on enum `Source.type`

## 9.7.0-beta.2 - 2022-10-07
* [#1373](https://github.com/stripe/stripe-php/pull/1373) API Updates for beta branch
  * Updated stable APIs to the latest version

## 9.7.0-beta.1 - 2022-09-26
* [#1368](https://github.com/stripe/stripe-php/pull/1368) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Add `FinancingOffer`, `FinancingSummary` and `FinancingTransaction` resources.

## 9.4.0-beta.1 - 2022-08-26
* [#1358](https://github.com/stripe/stripe-php/pull/1358) API Updates for beta branch
  * Updated stable APIs to the latest version
  * Add support for the beta [Gift Card API](https://stripe.com/docs/gift-cards).

## 9.3.0-beta.1 - 2022-08-23
* [#1354](https://github.com/stripe/stripe-php/pull/1354) API Updates for beta branch
  - Updated stable APIs to the latest version
  - `Stripe-Version` beta headers are not pinned by-default and need to be manually specified, please refer to [beta SDKs README section](https://github.com/stripe/stripe-php/blob/master/README.md#beta-sdks)

## 9.2.0-beta.1 - 2022-08-11
* [#1349](https://github.com/stripe/stripe-php/pull/1349) API Updates for beta branch
  - Updated stable APIs to the latest version
  - Add `refundPayment` method to Terminal resource

## 9.1.0-beta.1 - 2022-08-03
* [#1345](https://github.com/stripe/stripe-php/pull/1345) API Updates for beta branch
  - Updated stable APIs to the latest version
  - Added the `Order` resource support

## 8.12.0-beta.1 - 2022-07-22
* [#1317](https://github.com/stripe/stripe-php/pull/1317) API Updates for beta branch
  - Updated stable APIs to the latest version
* [#1320](https://github.com/stripe/stripe-php/pull/1320) API Updates for beta branch
  - Include `server_side_confirmation_beta=v1` beta
  - Add `secretKeyConfirmation` to `PaymentIntent`
* [#1325](https://github.com/stripe/stripe-php/pull/1325) API Updates for beta branch
  - Updated stable APIs to the latest version
  - Add `QuotePhaseConfiguration` service.
  - Add `Price.migrate_to` property
  - Add `SubscriptionSchedule.amend` method.
  - Add `Discount.subscription_item` property.
  - Add `Quote.subscription_data.billing_behavior`, `billing_cycle_anchor`, `end_behavior`, `from_schedule`, `from_subscription`, `prebilling`, `proration_behavior` properties.
  - Add `phases` parameter to `Quote.create`
  - Add `Subscription.discounts`, `prebilling` properties.
* [#1328](https://github.com/stripe/stripe-php/pull/1328) API Updates for beta branch
  - Updated stable APIs to the latest version
  - Add `QuotePhase` resource
* [#1331](https://github.com/stripe/stripe-php/pull/1331) API Updates for beta branch
  - Updated stable APIs to the latest version

## 8.125.0-beta.4 - 2022-04-13

## 7.125.0-beta.1 - 2022-04-13

## 7.124.0-beta.1 - 2022-04-13

## 7.123.0-beta.1 - 2022-04-13
