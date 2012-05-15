<?php

namespace Stripe;

class Invoice extends \Stripe\ApiResource
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

	public static function upcoming($params=null, $apiKey=null)
	{
		$requestor = new \Stripe\ApiRequestor($apiKey);
		$url = self::classUrl(get_class()) . '/upcoming';
		list($response, $apiKey) = $requestor->request('get', $url, $params);
		return \Stripe\Util::convertToStripeObject($response, $apiKey);
	}
}
