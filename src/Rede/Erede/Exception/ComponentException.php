<?php

namespace Rede\Erede\Exception;

use Rede\Erede\Exception\Exception;

class ComponentException extends Exception
{
	
	const INVALID_PROPERTY = 100;
	
	protected $_messages = array(
		self::INVALID_PROPERTY => 'The property {property} not exists in {class}.',
	);
}