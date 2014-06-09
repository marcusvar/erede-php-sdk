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

use Slice\Xml\Unserializer;
use Slice\Xml\Exception\UnserializeException;

/**
 * eRede Payment Gateway SDK for PHP Applications
 *
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 *
 * This is a Response class for response in API requests.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

class Response
{
	
	/**
	 * The status of transaction
	 * 
	 * @var integer
	 */
	public $status = null;
	
	/**
	 * The expanded transaction status
	 * 
	 * @var string
	 */
	public $reason = null;
	
	/**
	 * The transaction reference in Rede environment
	 * 
	 * @var string
	 */
	public $gateway_reference = null;
	
	/**
	 * The DateTime of transaction
	 * 
	 * @var string
	 */
	public $time = null;
	
	/**
	 * The actual state of client account (LIVE or TEST)
	 * 
	 * @var string
	 */
	public $mode = null;
	
	/**
	 * The status code obtained of authorization host by Rede Service
	 * 
	 * @var string
	 */
	public $extended_response_message = null;
	
	/**
	 * The description of status code of authorization host
	 * 
	 * @var string
	 */
	public $extended_status = null;
	
	/**
	 * The information of transaction
	 * 
	 * @var string
	 */
	public $information = null;
	
	/**
	 * Unique reference number for each transaction
	 * 
	 * @var integer
	 */
	public $merchant_reference = null;
	
	/**
	 * Refencer number in client side; NSU;
	 * 
	 * @var string
	 */
	public $auth_host_reference = null;
	
	/**
	 * The Constructor
	 * 
	 * @param string $response
	 * @return \Rede\Erede\Response
	 */
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