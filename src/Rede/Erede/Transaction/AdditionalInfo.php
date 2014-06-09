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
use Rede\Erede\Transaction\CustomerInfo;

/**
 * eRede Payment Gateway SDK for PHP Applications
 *
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 *
 * This is a AdditionalInfo component of library. This is a component with
 * details about transaction.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede\Transaction
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

class AdditionalInfo extends AbstractComponent implements InterfaceComponent
{
	
	/**
	 * No description provided by Rede documentation
	 * 
	 * @var string
	 */
	protected $addendumdata = null;
	
	/**
	 * No description provided by Rede documentation
	 * 
	 * @var string
	 */
	protected $risk_bypass = null;
	
	/**
	 * A configured instance of CustomerInfo component
	 * 
	 * @var CustomerInfo
	 * @export CustomerInfo
	 */
	protected $customer_info = null;
	
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
	 * @return \Rede\Erede\Transaction\AdditionalInfo
	 */
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->addendumdata = (isset($data['addendumdata'])) ? $data['addendumdata'] : null;
		$instance->risk_bypass = (isset($data['risk_bypass'])) ? $data['risk_bypass'] : null;
		
		if (isset($data['customer_info'])) {
			if ($data['customer_info'] instanceof CustomerInfo) {
				$instance->customer_info = $data['customer_info'];
			} elseif (is_array($data['customer_info'])) {
				$instance->customer_info = CustomerInfo::factory($data['customer_info']);
			}
		}
		
		return $instance;
	}
}