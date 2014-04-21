<?php

namespace Rede\Erede\Transaction;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;
use Rede\Erede\Transaction\CardTxn;
use Rede\Erede\Transaction\TxnDetails;
use Rede\Erede\Transaction\HistoricTxn;

/**
 * 
 * @author devsdmf
 * @export Transaction
 */
class Transaction extends AbstractComponent implements InterfaceComponent
{
	
	/**
	 * @export CardTxn
	 * @persistent false
	 */
	protected $card_txn = null;
	
	/**
	 * @export TxnDetails
	 * @persistent false
	 */
	protected $txn_details = null;
	
	/**
	 * @export HistoricTxn
	 * @persistent false
	 */
	protected $historic_txn = null;
	
	public function asXML()
	{
		return $this->parseXML();
	}
	
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
		
		return $instance;
	}
}