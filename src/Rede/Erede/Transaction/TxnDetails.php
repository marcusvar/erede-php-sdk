<?php

namespace Rede\Erede\Transaction;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;
use Rede\Erede\Transaction\AdditionalInfo;

class TxnDetails extends AbstractComponent implements InterfaceComponent
{
	
	protected $merchant_reference = null;
	
	protected $amount = null;
	
	protected $capturemethod = null;
	
	protected $dba = null;
	
	protected $multipv = null;
	
	protected $currency = null;
	
	protected $additional_info = null;
	
	public function __construct(){}
	
	public function asXML(){}
	
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->merchant_reference = (isset($data['merchant_reference'])) ? $data['merchant_reference'] : null;
		$instance->amount = (isset($data['amount'])) ? $data['amount'] : null;
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