<?php

namespace Rede\Erede\Transaction;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;

class HistoricTxn extends AbstractComponent implements InterfaceComponent
{
	
	protected $reference = null;
	
	protected $authcode = null;
	
	protected $method = null;
	
	public function __construct(){}
	
	public function asXML()
	{
		return $this->parseXML();
	}
	
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->reference = (isset($data['reference'])) ? $data['reference'] : null;
		$instance->authcode = (isset($data['authcode'])) ? $data['authcode'] : null;
		$instance->method = (isset($data['method'])) ? $data['method'] : null;
		
		return $instance;
	}
}