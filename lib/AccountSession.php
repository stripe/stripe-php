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
 * Related guide: <a href="https://stripe.com/docs/connect/get-started-connect-embedded-components">Connect embedded components</a>
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $account The ID of the account the AccountSession was created for
 * @property string $client_secret <p>The client secret of this AccountSession. Used on the client to set up secure access to the given <code>account</code>.</p><p>The client secret can be used to provide access to <code>account</code> from your frontend. It should not be stored, logged, or exposed to anyone other than the connected account. Make sure that you have TLS enabled on any page that includes the client secret.</p><p>Refer to our docs to <a href="https://stripe.com/docs/connect/get-started-connect-embedded-components">setup Connect embedded components</a> and learn about how <code>client_secret</code> should be handled.</p>
 * @property (object{account_management: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, external_account_collection: bool}&\stdClass&StripeObject)}&\stdClass&StripeObject), account_onboarding: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, external_account_collection: bool}&\stdClass&StripeObject)}&\stdClass&StripeObject), balances: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, edit_payout_schedule: bool, external_account_collection: bool, instant_payouts: bool, standard_payouts: bool}&\stdClass&StripeObject)}&\stdClass&StripeObject), documents: (object{enabled: bool, features: (object{}&\stdClass&StripeObject)}&\stdClass&StripeObject), financial_account: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, external_account_collection: bool, send_money: bool, transfer_balance: bool}&\stdClass&StripeObject)}&\stdClass&StripeObject), financial_account_transactions: (object{enabled: bool, features: (object{card_spend_dispute_management: bool}&\stdClass&StripeObject)}&\stdClass&StripeObject), issuing_card: (object{enabled: bool, features: (object{card_management: bool, card_spend_dispute_management: bool, cardholder_management: bool, spend_control_management: bool}&\stdClass&StripeObject)}&\stdClass&StripeObject), issuing_cards_list: (object{enabled: bool, features: (object{card_management: bool, card_spend_dispute_management: bool, cardholder_management: bool, disable_stripe_user_authentication: bool, spend_control_management: bool}&\stdClass&StripeObject)}&\stdClass&StripeObject), notification_banner: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, external_account_collection: bool}&\stdClass&StripeObject)}&\stdClass&StripeObject), payment_details: (object{enabled: bool, features: (object{capture_payments: bool, destination_on_behalf_of_charge_management: bool, dispute_management: bool, refund_management: bool}&\stdClass&StripeObject)}&\stdClass&StripeObject), payments: (object{enabled: bool, features: (object{capture_payments: bool, destination_on_behalf_of_charge_management: bool, dispute_management: bool, refund_management: bool}&\stdClass&StripeObject)}&\stdClass&StripeObject), payouts: (object{enabled: bool, features: (object{disable_stripe_user_authentication: bool, edit_payout_schedule: bool, external_account_collection: bool, instant_payouts: bool, standard_payouts: bool}&\stdClass&StripeObject)}&\stdClass&StripeObject), payouts_list: (object{enabled: bool, features: (object{}&\stdClass&StripeObject)}&\stdClass&StripeObject), tax_registrations: (object{enabled: bool, features: (object{}&\stdClass&StripeObject)}&\stdClass&StripeObject), tax_settings: (object{enabled: bool, features: (object{}&\stdClass&StripeObject)}&\stdClass&StripeObject)}&\stdClass&StripeObject) $components
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
     * @param null|array{account: string, components: array{account_management?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, account_onboarding?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, balances?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, edit_payout_schedule?: bool, external_account_collection?: bool, instant_payouts?: bool, standard_payouts?: bool}}, documents?: array{enabled: bool, features?: array{}}, financial_account?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool, send_money?: bool, transfer_balance?: bool}}, financial_account_transactions?: array{enabled: bool, features?: array{card_spend_dispute_management?: bool}}, issuing_card?: array{enabled: bool, features?: array{card_management?: bool, card_spend_dispute_management?: bool, cardholder_management?: bool, spend_control_management?: bool}}, issuing_cards_list?: array{enabled: bool, features?: array{card_management?: bool, card_spend_dispute_management?: bool, cardholder_management?: bool, disable_stripe_user_authentication?: bool, spend_control_management?: bool}}, notification_banner?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, external_account_collection?: bool}}, payment_details?: array{enabled: bool, features?: array{capture_payments?: bool, destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, payments?: array{enabled: bool, features?: array{capture_payments?: bool, destination_on_behalf_of_charge_management?: bool, dispute_management?: bool, refund_management?: bool}}, payouts?: array{enabled: bool, features?: array{disable_stripe_user_authentication?: bool, edit_payout_schedule?: bool, external_account_collection?: bool, instant_payouts?: bool, standard_payouts?: bool}}, payouts_list?: array{enabled: bool, features?: array{}}, tax_registrations?: array{enabled: bool, features?: array{}}, tax_settings?: array{enabled: bool, features?: array{}}}, expand?: string[]} $params
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
