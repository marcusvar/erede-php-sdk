<?php

namespace Rede\Erede\Transaction;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;
use Rede\Erede\Transaction\AdditionalInfo;

class TxnDetails extends AbstractComponent implements InterfaceComponent
{
	
	/**
	 * @persistent false
	 */
	protected $merchantreference = null;
	
	protected $amount = null;
	
	/**
	 * @export Instalments
	 * @persistent false
	 */
	protected $instalments = null;
	
	/**
	 * @persistent false
	 */
	protected $capturemethod = null;
	
	/**
	 * @persistent false
	 */
	protected $dba = null;
	
	/**
	 * @persistent false
	 */
	protected $multipv = null;
	
	/**
	 * @attribute amount
	 * @persistent false
	 */
	protected $currency = null;
	
	/**
	 * @export AdditionalInfo
	 * @persistent false
	 */
	protected $additional_info = null;
	
	public function __construct(){}
	
	public function asXML()
	{
		return $this->parseXML();
	}
	
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