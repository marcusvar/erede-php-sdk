<?php

namespace Rede\Erede\Authentication;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;

class AcquirerCode extends AbstractComponent implements InterfaceComponent
{
	
	protected $rdcd_pv = null;
	
	public function asXML(){}
	
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->rdcd_pv = (isset($data['rdcd_pv'])) ? $data['rdcd_pv'] : null;
		
		return $instance;
	}
}