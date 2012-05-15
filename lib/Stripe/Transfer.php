<?php

namespace Stripe;

class Transfer extends \Stripe\ApiResource
{
	public static function constructFrom($values, $apiKey=null)
	{
		$class = get_class();
		return self::scopedConstructFrom($class, $values, $apiKey);
	}

	public static function retrieve($id, $apiKey=null)
	{
		$class = get_class();
		return self::_scopedRetrieve($class, $id, $apiKey);
	}

	public static function all($params=null, $apiKey=null)
	{
		$class = get_class();
		return self::_scopedAll($class, $params, $apiKey);
	}

	public function transactions($params=null)
	{
		$requestor = new \Stripe\ApiRequestor($this->_apiKey);
		$url = $this->instanceUrl() . '/transactions';
		list($response, $apiKey) = $requestor->request('get', $url, $params);
		return \Stripe\Util::convertToStripeObject($response, $apiKey);
	}
}
