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
 * This is a Cv2Avs component of library. This is a component with
 * information about the owner of card.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede\Transaction
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

class Cv2Avs extends AbstractComponent implements InterfaceComponent
{
	
	/**
	 * The number of residence
	 * 
	 * @var mixed<string,integer>
	 * @export street_address1
	 * @persistent false
	 */
	protected $number = null;
	
	/**
	 * The street address
	 * 
	 * @var string
	 * @export street_address2
	 * @persistent false
	 */
	protected $street = null;
	
	/**
	 * The neighborhood
	 * 
	 * @var string
	 * @export street_address3
	 * @persistent false
	 */
	protected $neighborhood = null;
	
	/**
	 * The complement of address
	 * 
	 * @var string
	 * @export street_address4
	 * @persistent false
	 */
	protected $complement = null;
	
	/**
	 * The city
	 * 
	 * @var string
	 * @persistent false
	 */
	protected $city = null;
	
	/**
	 * The state or provincy
	 * 
	 * @var string
	 * @export state_province
	 * @persistent false
	 */
	protected $state = null;
	
	/**
	 * The country
	 * 
	 * @var string
	 * @persistent false
	 */
	protected $country = null;
	
	/**
	 * The zipcode
	 * 
	 * @var string
	 * @persistent false
	 */
	protected $postcode = null;
	
	/**
	 * Document number of card owner
	 * 
	 * @var string
	 * @export cpf
	 * @persistent false
	 */
	protected $document = null;
	
	/**
	 * The CVC of card
	 * 
	 * @var integer
	 * @persistent false
	 */
	protected $cv2 = null;
	
	/**
	 * The policy to use in validation
	 * 
	 * @var integer
	 * @persistent false
	 */
	protected $policy = null;
	
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
	 * @return \Rede\Erede\Transaction\Cv2Avs
	 */
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->number = (isset($data['number'])) ? $data['number'] : null;
		$instance->street = (isset($data['street'])) ? $data['street'] : null;
		$instance->neighborhood = (isset($data['neighborhood'])) ? $data['neighborhood'] : null;
		$instance->complement = (isset($data['complement'])) ? $data['complement'] : null;
		$instance->city = (isset($data['city'])) ? $data['city'] : null;
		$instance->state = (isset($data['state'])) ? $data['state'] : null;
		$instance->country = (isset($data['country'])) ? $data['country'] : null;
		$instance->postcode = (isset($data['postcode'])) ? $data['postcode'] : null;
		$instance->document = (isset($data['document'])) ? $data['document'] : null;
		$instance->cv2 = (isset($data['cv2'])) ? $data['cv2'] : null;
		$instance->policy = (isset($data['policy'])) ? $data['policy'] : null;
		
		return $instance;
	}
}