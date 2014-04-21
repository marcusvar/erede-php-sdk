<?php

namespace Rede\Erede\Transaction;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;
use Rede\Erede\Transaction\Card;

class CardTxn extends AbstractComponent implements InterfaceComponent
{
	
	/**
	 * @export Card
	 */
	protected $card = null;
	
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