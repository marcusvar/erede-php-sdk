<?php

namespace Rede\Erede;

use Rede\Erede\Authentication\Authentication;
use Rede\Erede\Transaction\Transaction;
use Rede\Erede\Exception\APIException;
use Rede\Erede\Response;
use Slice\Http\Client as HttpClient;

class API
{
	
	const ENVIRONMENT_SANDBOX 	 = 'sandbox';
	const ENVIRONMENT_PRODUCTION = 'production';
	const URI_SANDBOX 			 = 'https://scommerce.userede.com.br/Beta/wsTransaction';
	const URI_PRODUCTION 		 = 'https://ecommerce.userede.com.br/Transaction/wsTransaction';
	
	private $http_client = null;
	
	private $authentication = null;
	
	private $transaction = null;
	
	private $reset = true;
	
	private function __construct($environment)
	{
		# Configuring environment variables
		switch ($environment) {
			case self::ENVIRONMENT_SANDBOX : 
				$uri = self::URI_SANDBOX;
				break;
			case self::ENVIRONMENT_PRODUCTION :
				$uri = self::URI_PRODUCTION;
				break;
		}
		
		$this->http_client = new HttpClient($uri,HttpClient::POST);
	}
	
	private function __clone(){}
	
	public function setAuthentication(Authentication $auth)
	{
		$this->authentication = $auth;
	}
	
	public function setTransaction(Transaction $transaction)
	{
		$this->transaction = $transaction;
	}
	
	public function send()
	{
		if (!$this->validate()) {
			return null;
		}
		
		$auth_content = $this->authentication->asXML();
		$transaction_content = $this->transaction->asXML();
		
		$data = '<Request version="2">' . $auth_content . $transaction_content . '</Request>';
		$this->http_client->setRawData($data);
		
		$result = $this->http_client->request();
		$response = new Response($result->getBody());
		
		return $response;
	}
	
	private function validate()
	{
		if (is_null($this->authentication)) {
			throw new APIException(null,APIException::AUTHENTICATION_NOT_SPECIFIED);
			return false;
		}
		
		if (is_null($this->transaction)) {
			throw new APIException(null,APIException::TRANSACTION_NOT_FOUND);
			return false;
		}
		
		return true;
	}
	
	public static function factory($environment = 'sandbox')
	{
		# Validate environment
		if ($environment != self::ENVIRONMENT_SANDBOX && $environment != self::ENVIRONMENT_PRODUCTION) {
			throw new APIException(array('env'=>$environment),APIException::INVALID_ENVIRONMENT);
			return null;
		}
		
		$instance = new self($environment);
		return $instance;
	}
}