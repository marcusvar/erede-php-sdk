<?php

/**
 * eRede Payment Gateway SDK for PHP Applications
 * Copyright (C) 2010~2014 devSDMF Software Development Inc.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 */

namespace Rede\Erede;

use Rede\Erede\Authentication\Authentication;
use Rede\Erede\Transaction\Transaction;
use Rede\Erede\Exception\APIException;
use Rede\Erede\Response;
use Slice\Http\Client as HttpClient;

/**
 * eRede Payment Gateway SDK for PHP Applications
 * 
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 * 
 * This is a API class, responsible for parse and treat components,
 * perform requests, treat response status and handle many functions
 * in library components. This library uses a Http component from 
 * Slice framework project, developed by the same author.
 * 
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

class API
{
	
	/**
	 * API Constants
	 */
	const ENVIRONMENT_SANDBOX 	 = 'sandbox';
	const ENVIRONMENT_PRODUCTION = 'production';
	const URI_SANDBOX 			 = 'https://scommerce.userede.com.br/Beta/wsTransaction';
	const URI_PRODUCTION 		 = 'https://ecommerce.userede.com.br/Transaction/wsTransaction';
	
	/**
	 * The instance of Http Client
	 * @var HttpClient
	 */
	private $http_client = null;
	
	/**
	 * The Authentication encapsuled component.
	 * @var Authentication
	 */
	private $authentication = null;
	
	/**
	 * The Transaction component instance
	 * @var Transaction
	 */
	private $transaction = null;
	
	/**
	 * Control var for reset state of API class after requests
	 * @var boolean
	 */
	private $reset = true;
	
	/**
	 * The Constructor
	 * 
	 * Instantiate using {@link factory()}; The API is a singleton object.
	 * 
	 * @param string $environment The environment to use in API instance (see API Constants for the correct usage)
	 * @return \Rede\Erede\API
	 */
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
		
		return $this;
	}
	
	/**
	 * Enforce singleton; disallow cloning.
	 */
	private function __clone(){}
	
	/**
	 * Set the Authentication component in API instance
	 * 
	 * @param Authentication $auth
	 * @return \Rede\Erede\API
	 */
	public function setAuthentication(Authentication $auth)
	{
		$this->authentication = $auth;
		
		return $this;
	}
	
	/**
	 * Set the Transaction component in API instance
	 * 
	 * @param Transaction $transaction
	 * @return \Rede\Erede\API
	 */
	public function setTransaction(Transaction $transaction)
	{
		$this->transaction = $transaction;
		
		return $this;
	}
	
	/**
	 * Function to send the request to Rede webservice
	 * 
	 * @return \Rede\Erede\Response
	 */
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
	
	/**
	 * Validate API instance before send request
	 * 
	 * @throws APIException
	 * @return boolean
	 */
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
	
	/**
	 * Factory method to generate a instance of API class
	 * 
	 * @param string $environment The environment to use in API instance (see API Constants for the correct usage)
	 * @throws APIException
	 * @return \Rede\Erede\API
	 */
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