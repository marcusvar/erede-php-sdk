<?php

namespace Rede\Erede\Transaction;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;
use Rede\Erede\Transaction\CustomerInfo;

class AdditionalInfo extends AbstractComponent implements InterfaceComponent
{
	
	protected $addendumdata = null;
	
	protected $risk_bypass = null;
	
	protected $customer_info = null;
	
	public function __construct(){}
	
	public function asXML(){}
	
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