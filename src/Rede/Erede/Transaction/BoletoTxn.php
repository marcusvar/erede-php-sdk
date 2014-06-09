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

namespace Rede\Erede\Transaction;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;

/**
 * eRede Payment Gateway SDK for PHP Applications
 *
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 *
 * This is a Transaction component of library. This is a component with
 * data to generate a billet charging.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede\Transaction
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 * @export Transaction
 *
 */

class BoletoTxn extends AbstractComponent implements InterfaceComponent
{
	
	/**
	 * The title of client
	 * 
	 * @var string
	 * @persistent false
	 */
	protected $title = null;
	
	/**
	 * The first name of client
	 * 
	 * @var string
	 * @persistent false
	 */
	protected $first_name = null;
	
	/**
	 * The last name of client
	 * 
	 * @var string
	 * @persistent false
	 */
	protected $last_name = null;
	
	/**
	 * The billing street address, line one.
	 * 
	 * @var string
	 * @persistent false
	 * @export billing_street1
	 */
	protected $street1 = null;
	
	/**
	 * The billing street address, line two.
	 * 
	 * @var string
	 * @persistent false
	 * @export billing_street2
	 */
	protected $street2 = null;
	
	/**
	 * The city
	 * 
	 * @var string
	 * @persistent false
	 * @export billing_city
	 */
	protected $city = null;
	
	/**
	 * The state
	 * 
	 * @var string
	 * @persistent false
	 * @export billing_state_province
	 */
	protected $state = null;
	
	/**
	 * The zipcode of address
	 * 
	 * @var string
	 * @persistent false
	 * @export billing_postcode
	 */
	protected $postcode = null;
	
	/**
	 * The country
	 * 
	 * @var string
	 * @persistent false
	 * @export billing_country
	 */
	protected $country = null;
	
	/**
	 * The phone of client
	 * 
	 * @var string
	 * @persistent false
	 * @export customer_telephone
	 */
	protected $phone = null;
	
	/**
	 * The email of client
	 * 
	 * @var string 
	 * @persistent false
	 * @export customer_email
	 */
	protected $email = null;
	
	/**
	 * The customer ip address
	 * 
	 * @var string
	 * @persistent false
	 * @export customer_ip
	 */
	protected $ip = null;
	
	/**
	 * The language code, IETF (see documentation for more details)
	 * 
	 * @var string
	 * @persistent false
	 */
	protected $language = null;
	
	/**
	 * The expiration date of billet, using the following format (yyyy-mm-dd)
	 * 
	 * @var string
	 */
	protected $expiry_date = null;
	
	/**
	 * Some instructions to insert in billet
	 * 
	 * @var string
	 * @persistent false
	 */
	protected $instructions = null;
	
	/**
	 * Interest to charge per day in delay
	 * 
	 * @var float
	 * @persistent false
	 */
	protected $interest_per_day = null;
	
	/**
	 * Tax to charge after expiry date
	 * 
	 * @var float
	 * @persistent false
	 */
	protected $overdue_fine = null;
	
	/**
	 * The id of bank to generate billet, see documentation for details about this field
	 * 
	 * @var integer
	 * @persistent false
	 */
	protected $processor_id = null;
	
	/**
	 * The type of transaction
	 * 
	 * @var string
	 */
	protected $method = null;
	
	/**
	 * The Constructor
	 */
	public function __construct(){}
	
	/**
	 * Parse component as XML
	 * 
	 * @see \Rede\Erede\InterfaceComponent::asXML()
	 */
	public function asXML()
	{
		return $this->parseXML();
	}
	
	/**
	 * Factory component using a configurable array
	 * 
	 * @param array $data
	 * @return \Rede\Erede\Transaction\BoletoTxn
	 */
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->title = (isset($data['title'])) ? $data['title'] : null;
		$instance->first_name = (isset($data['first_name'])) ? $data['first_name'] : null;
		$instance->last_name = (isset($data['last_name'])) ? $data['last_name'] : null;
		$instance->street1 = (isset($data['street1'])) ? $data['street1'] : null;
		$instance->street2 = (isset($data['street2'])) ? $data['street2'] : null;
		$instance->city = (isset($data['city'])) ? $data['city'] : null;
		$instance->state = (isset($data['state'])) ? $data['state'] : null;
		$instance->postcode = (isset($data['postcode'])) ? $data['postcode'] : null;
		$instance->country = (isset($data['country'])) ? $data['country'] : null;
		$instance->phone = (isset($data['phone'])) ? $data['phone'] : null;
		$instance->email = (isset($data['email'])) ? $data['email'] : null;
		$instance->ip = (isset($data['ip'])) ? $data['ip'] : null;
		$instance->language = (isset($data['language'])) ? $data['language'] : null;
		$instance->expiry_date = (isset($data['expiry_date'])) ? $data['expiry_date'] : null;
		$instance->instructions = (isset($data['instructions'])) ? $data['instructions'] : null;
		$instance->interest_per_day = (isset($data['interest_per_day'])) ? $data['interest_per_day'] : null;
		$instance->overdue_fine = (isset($data['overdue_fine'])) ? $data['overdue_fine'] : null;
		$instance->processor_id = (isset($data['processor_id'])) ? $data['processor_id'] : null;
		$instance->method = (isset($data['method'])) ? $data['method'] : null;
		
		return $instance;
	}
}