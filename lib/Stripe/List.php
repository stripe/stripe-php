<?php

class Stripe_List extends Stripe_Object
{
  public function all($params=null)
  {
    list($url, $params) = $this->extractPathAndUpdateParams($params);

    $requestor = new Stripe_ApiRequestor($this->_apiKey);
    list($response, $apiKey) = $requestor->request('get', $url, $params);
    return Stripe_Util::convertToStripeObject($response, $apiKey);
  }

  public function create($params=null)
  {
    list($url, $params) = $this->extractPathAndUpdateParams($params);

    $requestor = new Stripe_ApiRequestor($this->_apiKey);
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    return Stripe_Util::convertToStripeObject($response, $apiKey);
  }

  public function retrieve($id, $params=null)
  {
    list($url, $params) = $this->extractPathAndUpdateParams($params);

    $requestor = new Stripe_ApiRequestor($this->_apiKey);
    $id = Stripe_ApiRequestor::utf8($id);
    $extn = urlencode($id);
    list($response, $apiKey) = $requestor->request(
        'get', "$url/$extn", $params
    );
    return Stripe_Util::convertToStripeObject($response, $apiKey);
  }

  private function extractPathAndUpdateParams($params)
  {
    $url = parse_url($this->url);
    if (!isset($url['path'])) {
      throw new Stripe_APIError("Could not parse list url into parts: $url");
    }

    if (isset($url['query'])) {
      // If the URL contains a query param, parse it out into $params so they
      // don't interact weirdly with each other.
      $query = array();
      parse_str($url['query'], $query);
      // PHP 5.2 doesn't support the ?: operator :(
      $params = array_merge($params ? $params : array(), $query);
    }

    return array($url['path'], $params);
  }
}
