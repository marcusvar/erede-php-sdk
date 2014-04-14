<?php

namespace Rede\Erede;

interface InterfaceComponent
{
	
	public function asXML();
	
	public static function factory(array $data);
}