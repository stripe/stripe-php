<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * An AccountSession allows a Connect platform to grant access to a connected account in Connect embedded components.
 *
 * We recommend that you create an AccountSession each time you need to display an embedded component
 * to your user. Do not save AccountSessions to your database as they expire relatively
 * quickly, and cannot be used more than once.
 *
 * Related guide: <a href="https://docs.stripe.com/connect/get-started-connect-embedded-components">Connect embedded components</a>
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $account The ID of the account the AccountSession was created for
 * @property string $client_secret <p>The client secret of this AccountSession. Used on the client to set up secure access to the given <code>account</code>.</p><p>The client secret can be used to provide access to <code>account</code> from your frontend. It should not be stored, logged, or exposed to anyone other than the connected account. Make sure that you have TLS enabled on any page that includes the client secret.</p><p>Refer to our docs to <a href="https://docs.stripe.com/connect/get-started-connect-embedded-components">setup Connect embedded components</a> and learn about how <code>client_secret</code> should be handled.</p>
 * @property (object{account_management: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, external_account_collection: bool}&StripeObject)}&StripeObject), account_onboarding: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, external_account_collection: bool}&StripeObject)}&StripeObject), balances: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, edit_payout_schedule: bool, external_account_collection: bool, instant_payouts: bool, standard_payouts: bool}&StripeObject)}&StripeObject), disputes_list: (object{enabled: bool, features: (object{capture_payments: bool, destination_on_behalf_of_charge_management: bool, dispute_management: bool, refund_management: bool}&StripeObject)}&StripeObject), documents: (object{enabled: bool, features: (object{}&StripeObject)}&StripeObject), financial_account: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, external_account_collection: bool, send_money: bool, transfer_balance: bool}&StripeObject)}&StripeObject), financial_account_transactions: (object{enabled: bool, features: (object{card_spend_dispute_management: bool}&StripeObject)}&StripeObject), instant_payouts_promotion: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, external_account_collection: bool, instant_payouts: bool}&StripeObject)}&StripeObject), issuing_card: (object{enabled: bool, features: (object{card_management: bool, card_spend_dispute_management: bool, cardholder_management: bool, spend_control_management: bool}&StripeObject)}&StripeObject), issuing_cards_list: (object{enabled: bool, features: (object{card_management: bool, card_spend_dispute_management: bool, cardholder_management: bool, disable_stripe_user_authentication: bool, spend_control_management: bool}&StripeObject)}&StripeObject), notification_banner: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, external_account_collection: bool}&StripeObject)}&StripeObject), payment_details: (object{enabled: bool, features: (object{capture_payments: bool, destination_on_behalf_of_charge_management: bool, dispute_management: bool, refund_management: bool}&StripeObject)}&StripeObject), payment_disputes: (object{enabled: bool, features: (object{destination_on_behalf_of_charge_management: bool, dispute_management: bool, refund_management: bool}&StripeObject)}&StripeObject), payments: (object{enabled: bool, features: (object{capture_payments: bool, destination_on_behalf_of_charge_management: bool, dispute_management: bool, refund_management: bool}&StripeObject)}&StripeObject), payout_details: (object{enabled: bool, features: (object{}&StripeObject)}&StripeObject), payouts: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, edit_payout_schedule: bool, external_account_collection: bool, instant_payouts: bool, standard_payouts: bool}&StripeObject)}&StripeObject), payouts_list: (object{enabled: bool, features: (object{}&StripeObject)}&StripeObject), tax_registrations: (object{enabled: bool, features: (object{}&StripeObject)}&StripeObject), tax_settings: (object{enabled: bool, features: (object{}&StripeObject)}&StripeObject)}&StripeObject) $components
 * @property int $expires_at The timestamp at which this AccountSession will expire.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class AccountSession extends ApiResource
{
    const OBJECT_NAME = 'account_session';

    /**
     * Creates a AccountSession object that includes a single-use token that the
     * platform can use on their front-end to grant client-side API access.
     *
     * @param null|array{account: string, components: array{account_management?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, account_onboarding?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, balances?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, edit_payout_schedule?: bool, external_account_collection?: bool, instant_payouts?: bool, standard_payouts?: bool}}, disputes_list?: array{enabled: bool, features?: array{capture_payments?: bool, destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, documents?: array{enabled: bool, features?: array{}}, financial_account?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool, send_money?: bool, transfer_balance?: bool}}, financial_account_transactions?: array{enabled: bool, features?: array{card_spend_dispute_management?: bool}}, instant_payouts_promotion?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool, instant_payouts?: bool}}, issuing_card?: array{enabled: bool, features?: array{card_management?: bool, card_spend_dispute_management?: bool, cardholder_management?: bool, spend_control_management?: bool}}, issuing_cards_list?: array{enabled: bool, features?: array{card_management?: bool, card_spend_dispute_management?: bool, cardholder_management?: bool, disable_stripe_user_authentication?: bool, spend_control_management?: bool}}, notification_banner?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, payment_details?: array{enabled: bool, features?: array{capture_payments?: bool, destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, payment_disputes?: array{enabled: bool, features?: array{destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, payments?: array{enabled: bool, features?: array{capture_payments?: bool, destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, payout_details?: array{enabled: bool, features?: array{}}, payouts?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, edit_payout_schedule?: bool, external_account_collection?: bool, instant_payouts?: bool, standard_payouts?: bool}}, payouts_list?: array{enabled: bool, features?: array{}}, tax_registrations?: array{enabled: bool, features?: array{}}, tax_settings?: array{enabled: bool, features?: array{}}}, expand?: string[]} $params
     * @param null|array|string $options
     *
     * @return AccountSession the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
