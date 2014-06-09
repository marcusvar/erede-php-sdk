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
use Rede\Erede\Transaction\AdditionalInfo;

/**
 * eRede Payment Gateway SDK for PHP Applications
 *
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 *
 * This is a TxnDetails component of library. This is a component with
 * details about transaction.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede\Transaction
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

class TxnDetails extends AbstractComponent implements InterfaceComponent
{
	
	/**
	 * Reference code of order in client application
	 * 
	 * @var mixed<string,integer>
	 * @persistent false
	 */
	protected $merchantreference = null;
	
	/**
	 * The total value of transaction
	 * 
	 * @var float
	 */
	protected $amount = null;
	
	/**
	 * The number of installments in transaction
	 * 
	 * @var integer
	 * @export Instalments
	 * @persistent false
	 */
	protected $instalments = null;
	
	/**
	 * The method of capture (ecomm/cont_auth)
	 * 
	 * @var string
	 * @persistent false
	 */
	protected $capturemethod = null;
	
	/**
	 * Description identifier of commercial establishment
	 * 
	 * @var string
	 * @persistent false
	 */
	protected $dba = null;
	
	/**
	 * MultiPV code of establishment
	 * 
	 * @var string
	 * @persistent false
	 */
	protected $multipv = null;
	
	/**
	 * The currency code
	 * 
	 * @var string 
	 * @attribute amount
	 * @persistent false
	 */
	protected $currency = null;
	
	/**
	 * A configured instance of AdditionalInfo component
	 * 
	 * @var AdditionalInfo
	 * @export AdditionalInfo
	 * @persistent false
	 */
	protected $additional_info = null;
	
	/**
	 * The Constructor
	 */
	public function __construct(){}
	
	/**
	 * Parse component as XML
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
	 * @return \Rede\Erede\Transaction\TxnDetails
	 */
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->merchantreference = (isset($data['merchantreference'])) ? $data['merchantreference'] : null;
		$instance->amount = (isset($data['amount'])) ? $data['amount'] : null;
		$instance->instalments = (isset($data['instalments']) && is_array($data['instalments'])) ? $data['instalments'] : null;
		$instance->capturemethod = (isset($data['capturemethod'])) ? $data['capturemethod'] : null;
		$instance->dba = (isset($data['dba'])) ? $data['dba'] : null;
		$instance->multipv = (isset($data['multipv'])) ? $data['multipv'] : null;
		$instance->currency = (isset($data['currency'])) ? $data['currency'] : null;
		
		if (isset($data['additional_info'])) {
			if ($data['additional_info'] instanceof AdditionalInfo) {
				$instance->additional_info = $data['additional_info'];
			} elseif (is_array($data['additional_info'])) {
				$instance->additional_info = AdditionalInfo::factory($data['additional_info']);
			}
		}
		
		return $instance;
	}
}