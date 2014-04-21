<?php

namespace Rede\Erede\Authentication;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;
use Rede\Erede\Authentication\AcquirerCode;

/**
 * 
 * @author devsdmf
 * @export Authentication
 *
 */
class Authentication extends AbstractComponent implements InterfaceComponent
{
	/**
	 * @export AcquirerCode
	 */
	protected $acquirerCode = null;
	
	protected $password = null;
	
	public function __construct(){}
	
	public function asXML()
	{
		return $this->parseXML();
	}
	
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