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
 * This is a Card component of library. This is a component with
 * information about credit/debit card used in transaction.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede\Transaction
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

class Card extends AbstractComponent implements InterfaceComponent
{
	
	/**
	 * The number of card
	 * 
	 * @var string
	 * @export pan
	 */
	protected $number = null;
	
	/**
	 * The expiration date of card
	 * 
	 * @var string
	 */
	protected $expirydate = null;
	
	/**
	 * The type of card used in transaction (credit/debit)
	 * 
	 * @persistent false
	 */
	protected $card_account_type = null;
	
	/**
	 * A configured instance of Cv2Avs component
	 * 
	 * @var Cv2Avs
	 * @export Cv2Avs
	 */
	protected $cv2avs = null;
	
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
	 * @return \Rede\Erede\Transaction\Card
	 */
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->number = (isset($data['number'])) ? $data['number'] : null;
		$instance->expirydate = (isset($data['expirydate'])) ? $data['expirydate'] : null;
		$instance->card_account_type = (isset($data['card_account_type'])) ? $data['card_account_type'] : null;
		
		if (isset($data['cv2avs'])) {
			if ($data['cv2avs'] instanceof Cv2Avs) {
				$instance->cv2avs = $data['cv2avs'];
			} elseif(is_array($data['cv2avs'])) {
				$instance->cv2avs = Cv2Avs::factory($data['cv2avs']);
			}
		}
		
		return $instance;
	}
}