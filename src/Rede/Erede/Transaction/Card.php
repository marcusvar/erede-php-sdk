<?php

namespace Rede\Erede\Transaction;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;

class Card extends AbstractComponent implements InterfaceComponent
{
	
	protected $number = null;
	
	protected $expirydate = null;
	
	protected $card_account_type = null;
	
	public function __construct(){}
	
	public function asXML(){}
	
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->number = (isset($data['number'])) ? $data['number'] : null;
		$instance->expirydate = (isset($data['expirydate'])) ? $data['expirydate'] : null;
		$instance->card_account_type = (isset($data['card_account_type'])) ? $data['card_account_type'] : null;
		
		return $instance;
	}
}