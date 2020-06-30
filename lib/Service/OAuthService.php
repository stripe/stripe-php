<?php

namespace Stripe\Service;

class OAuthService extends \Stripe\Service\AbstractService
{
    /**
     * Sends a request to Stripe's Connect API.
     *
     * @param string $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     *
     * @return \Stripe\StripeObject the object returned by Stripe's Connect API
     */
    protected function requestConnect($method, $path, $params, $opts)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        if (!isset($opts->apiBase)) {
            $opts->apiBase = $this->client->getConnectBase();
        }

        return $this->request($method, $path, $params, $opts);
    }

    /**
     * Generates a URL to Stripe's OAuth form.
     *
     * @param null|array $params
     * @param null|array $opts
     *
     * @return string the URL to Stripe's OAuth form
     */
    public function authorizeUrl($params = null, $opts = null)
    {
        $params = $params ?: [];

        $base = ($opts && \array_key_exists('connect_base', $opts)) ? $opts['connect_base'] : $this->client->getConnectBase();

        $clientId = $this->_getClientId($params);
        $params['client_id'] = $this->_getClientId($params);
        if (!\array_key_exists('response_type', $params)) {
            $params['response_type'] = 'code';
        }
        $query = \Stripe\Util\Util::encodeParameters($params);

        return $base . '/oauth/authorize?' . $query;
    }

    /**
     * Use an authoriztion code to connect an account to your platform and
     * fetch the user's credentials.
     *
     * @param null|array $params
     * @param null|array $opts
     *
     * @throws \Stripe\Exception\OAuth\OAuthErrorException if the request fails
     *
     * @return StripeObject object containing the response from the API
     */
    public function token($params = null, $opts = null)
    {
        return $this->requestConnect('post', $this->buildPath('/oauth/token'), $params, $opts);
    }

    public function deauthorize($params = null, $opts = null)
    {
        $params = $params ?: [];
        $params['client_id'] = $this->_getClientId($params);
        return $this->requestConnect('post', $this->buildPath('/oauth/deauthorize'), $params, null);
    }

    private function _getClientId($params = null)
    {
        $clientId = ($params && \array_key_exists('client_id', $params)) ? $params['client_id'] : null;

        if (null === $clientId) {
            $clientId = $this->client->getClientId();
        }
        if (null === $clientId) {
            $msg = 'No client_id provided. (HINT: set your client_id using '
              . '`new \Stripe\StripeClient([clientId => <CLIENT-ID>
                ])`)".  You can find your client_ids '
              . 'in your Stripe dashboard at '
              . 'https://dashboard.stripe.com/account/applications/settings, '
              . 'after registering your account as a platform. See '
              . 'https://stripe.com/docs/connect/standard-accounts for details, '
              . 'or email support@stripe.com if you have any questions.';

            throw new \Stripe\Exception\AuthenticationException($msg);
        }

        return $clientId;
    }
}
