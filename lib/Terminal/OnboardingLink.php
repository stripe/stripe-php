<?php

// File generated from our OpenAPI spec

namespace Stripe\Terminal;

/**
 * Returns redirect links used for onboarding onto Tap to Pay on iPhone.
 *
 * @property string $object
 * @property (object{apple_terms_and_conditions: null|(object{allow_relinking: null|bool, merchant_display_name: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $link_options Link type options associated with the current onboarding link object.
 * @property string $link_type The type of link being generated.
 * @property null|string $on_behalf_of Stripe account ID to generate the link for.
 * @property string $redirect_url The link passed back to the user for their onboarding.
 */
class OnboardingLink extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'terminal.onboarding_link';

    /**
     * Creates a new <code>OnboardingLink</code> object that contains a redirect_url
     * used for onboarding onto Tap to Pay on iPhone.
     *
     * @param null|array{expand?: string[], link_options: array{apple_terms_and_conditions?: array{allow_relinking?: bool, merchant_display_name: string}}, link_type: string, on_behalf_of?: string} $params
     * @param null|array|string $options
     *
     * @return OnboardingLink the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
