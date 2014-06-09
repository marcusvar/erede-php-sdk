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
use Rede\Erede\Transaction\Card;

/**
 * eRede Payment Gateway SDK for PHP Applications
 *
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 *
 * This is a CardTxn component of library. This is a component with
 * transaction data assigned to the card used in transaction.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede\Transaction
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

class CardTxn extends AbstractComponent implements InterfaceComponent
{
	
	/**
	 * A configured instance of Card component
	 * 
	 * @var Card
	 * @export Card
	 */
	protected $card = null;
	
	/**
	 * Authorization code provided by bank
	 * 
	 * @var integer
	 */
	protected $authcode = null;
	
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
	 * @return \Rede\Erede\Transaction\CardTxn
	 */
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->authcode = (isset($data['authcode'])) ? $data['authcode'] : null;
		$instance->method = (isset($data['method'])) ? $data['method'] : null;
		
		if (isset($data['card'])) {
			if ($data['card'] instanceof Card) {
				$instance->card = $data['card'];
			} elseif (is_array($data['card'])) {
				$instance->card = Card::factory($data['card']);
			}
		}
		
		return $instance;
	}
}