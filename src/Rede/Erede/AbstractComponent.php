<?php

namespace Rede\Erede;

use Rede\Erede\Exception\ComponentException;

abstract class AbstractComponent
{
	
	public function __set($name, $value)
	{
		if (property_exists($this, $name)) {
			$this->$name = $value;
		} else {
			throw new ComponentException(array('property'=>$name,'class'=>get_class($this)),ComponentException::INVALID_PROPERTY);
		}
	}
	
	public function __get($name)
	{
		if (property_exists($this, $name)) {
			return $this->$name;
		} else {
			throw new ComponentException(array('property'=>$name,'class'=>get_class($this)),ComponentException::INVALID_PROPERTY);
		}
	}
	
	protected function parseXML()
	{
		
	}
}