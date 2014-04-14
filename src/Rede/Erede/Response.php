<?php

namespace Rede\Erede;

class Response
{
	
	private $status = null;
	
	private $reason = null;
	
	private $gateway_reference = null;
	
	private $time = null;
	
	private $mode = null;
	
	private $extended_response_message = null;
	
	private $extended_status = null;
	
	private $information = null;
	
	private $merchant_reference = null;
	
	private $auth_host_reference = null;
	
	public function __construct(array $response)
	{
		# Default fields of an response
		$this->status = $response['status'];
		$this->reason = $response['reason'];
		$this->gateway_reference = $response['gateway_reference'];
		$this->time = $response['time'];
		$this->mode = $response['mode'];
		$this->extended_response_message = $response['extended_response_message'];
		$this->extended_status = $response['extended_status'];
		
		# Dynamic fields of an message
		$this->information = (isset($response['information'])) ? $response['information'] : null;
		$this->merchant_reference = (isset($response['merchant_reference'])) ? $response['merchant_reference'] : null;
		$this->auth_host_reference = (isset($response['auth_host_reference'])) ? $response['auth_host_reference'] : null;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function getReason()
	{
		return $this->reason;
	}
	
	public function getGatewayReference()
	{
		return $this->gateway_reference;
	}
	
	public function getTime()
	{
		return $this->time;
	}
	
	public function getMode()
	{
		return $this->mode;
	}
	
	public function getExtendedResponseMessage()
	{
		return $this->extended_response_message;
	}
	
	public function getExtendedStatus()
	{
		return $this->extended_status;
	}
	
	public function getInformation()
	{
		return $this->information;
	}
	
	public function getMerchantReference()
	{
		return $this->merchant_reference;
	}
	
	public function getAuthHostReference()
	{
		return $this->auth_host_reference;
	}
}