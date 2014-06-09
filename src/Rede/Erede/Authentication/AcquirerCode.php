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

namespace Rede\Erede\Authentication;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;

/**
 * eRede Payment Gateway SDK for PHP Applications
 *
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 *
 * The Acquirer Code component of library, used in Authentication component
 * to perform a authentication in API requests.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede\Authentication
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

class AcquirerCode extends AbstractComponent implements InterfaceComponent
{
	
	/**
	 * The reference number of establishment in Rede service
	 * 
	 * @var integer
	 */
	protected $rdcd_pv = null;
	
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
	 * Factory the component using a configurable array
	 * 
	 * @param array $data
	 * @return \Rede\Erede\Authentication\AcquirerCode
	 */
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->rdcd_pv = (isset($data['rdcd_pv'])) ? $data['rdcd_pv'] : null;
		
		return $instance;
	}
}