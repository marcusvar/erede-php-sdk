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
use Rede\Erede\Transaction\CardTxn;
use Rede\Erede\Transaction\TxnDetails;
use Rede\Erede\Transaction\HistoricTxn;

/**
 * eRede Payment Gateway SDK for PHP Applications
 *
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 *
 * This is a Transaction component of library. This is a main component of
 * API requests.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede\Transaction
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 * @export Transaction
 *
 */

class Transaction extends AbstractComponent implements InterfaceComponent
{
	
	/**
	 * A configured instance of CardTxn component
	 * 
	 * @var CardTxn
	 * @export CardTxn
	 * @persistent false
	 */
	protected $card_txn = null;
	
	/**
	 * A configured instance of TxnDetails component
	 * 
	 * @var TxnDetails
	 * @export TxnDetails
	 * @persistent false
	 */
	protected $txn_details = null;
	
	/**
	 * A configured instance of HistoricTxn component
	 * 
	 * @var HistoricTxn
	 * @export HistoricTxn
	 * @persistent false
	 */
	protected $historic_txn = null;
	
	/**
	 * A configured instance of BoletoTxn component
	 * 
	 * @var BoletoTxn
	 * @export BoletoTxn
	 * @persistent false
	 */
	protected $boleto_txn = null;
	
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
	 * @return \Rede\Erede\Transaction\Transaction
	 */
	public static function factory(array $data)
	{
		$instance = new self();
		
		if (isset($data['card_txn'])) {
			if ($data['card_txn'] instanceof CardTxn) {
				$instance->card_txn = $data['card_txn'];
			} elseif (is_array($data['card_txn'])) {
				$instance->card_txn = CardTxn::factory($data['card_txn']);
			}
		}
		
		if (isset($data['txn_details'])) {
			if ($data['txn_details'] instanceof TxnDetails) {
				$instance->txn_details = $data['txn_details'];
			} elseif (is_array($data['txn_details'])) {
				$instance->txn_details = TxnDetails::factory($data['txn_details']);
			}
		}
		
		if (isset($data['historic_txn'])) {
			if ($data['historic_txn'] instanceof HistoricTxn) {
				$instance->historic_txn = $data['historic_txn'];
			} elseif (is_array($data['historic_txn'])) {
				$instance->historic_txn = HistoricTxn::factory($data['historic_txn']);
			}
		}
		
		if (isset($data['boleto_txn'])) {
			if ($data['boleto_txn'] instanceof BoletoTxn) {
				$instance->boleto_txn = $data['boleto_txn'];
			} elseif (is_array($data['boleto_txn'])) {
				$instance->boleto_txn = BoletoTxn::factory($data['boleto_txn']);
			}
		}
		
		return $instance;
	}
}