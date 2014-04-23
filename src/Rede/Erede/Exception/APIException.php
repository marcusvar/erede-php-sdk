<?php

namespace Rede\Erede\Exception;

use Rede\Erede\Exception\Exception;

class APIException extends Exception
{
	
	const INVALID_ENVIRONMENT = 100;
	const AUTHENTICATION_NOT_SPECIFIED = 101;
	const TRANSACTION_NOT_FOUND = 102;
	
	protected $_messages = array(
		self::INVALID_ENVIRONMENT => 'The environment {env} is not a valid and configurable environment to API.',
		self::AUTHENTICATION_NOT_SPECIFIED => 'An Authentication must be specified before send a request.',
		self::TRANSACTION_NOT_FOUND => 'An Transaction object must be specified to send in request.',
	);
}