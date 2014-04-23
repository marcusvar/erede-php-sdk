<?php

namespace Rede\Erede;

use Slice\Xml\Unserializer;
use Slice\Xml\Exception\UnserializeException;

class Response
{
	
	public $status = null;
	
	public $reason = null;
	
	public $gateway_reference = null;
	
	public $time = null;
	
	public $mode = null;
	
	public $extended_response_message = null;
	
	public $extended_status = null;
	
	public $information = null;
	
	public $merchant_reference = null;
	
	public $auth_host_reference = null;
	
	public function __construct($response)
	{
		# Unserializing data
		$unserializer = new Unserializer('array');
		$unserializer->unserialize($response);
		
		$response = $unserializer->getUnserializedData();
		
		# Parsing response
		foreach ($response as $key => $value) {
			$this->$key = $value;
		}
		
		return $this;
	}
}