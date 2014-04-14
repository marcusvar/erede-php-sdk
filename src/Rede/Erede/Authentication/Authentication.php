<?php

namespace Rede\Erede\Authentication;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;
use Rede\Erede\Authentication\AcquirerCode;

class Authentication extends AbstractComponent implements InterfaceComponent
{
	
	protected $acquirerCode = null;
	
	protected $password = null;
	
	public function __construct(){}
	
	public function asXML(){}
	
	public static function factory(array $data)
	{
		$instance = new self(); 
		
		$instance->password = (isset($data['password'])) ? $data['password'] : null;
		
		if (isset($data['acquirerCode'])) {
			if ($data['acquirerCode'] instanceof AcquirerCode) {
				$instance->acquirerCode = $data['acquirerCode'];
			} elseif (is_array($data['acquirerCode'])) {
				$instance->acquirerCode = AcquirerCode::factory($data['acquirerCode']);
			}
		}
		
		return $instance;
	}
}