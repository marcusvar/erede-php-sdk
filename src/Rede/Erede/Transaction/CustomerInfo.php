<?php

namespace Rede\Erede\Transaction;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;

class CustomerInfo extends AbstractComponent implements InterfaceComponent
{
	
	protected $customer_ip_address = null;
	
	public function __construct(){}
	
	public function asXML(){}
	
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->customer_ip_address = (isset($data['customer_ip_address'])) ? $data['customer_ip_address'] : null;
		
		return $instance;
	}
}