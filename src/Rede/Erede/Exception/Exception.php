<?php

namespace Rede\Erede\Exception;

class Exception extends \Exception
{
	
	/**
	 * Array with default messages
	 * @var array
	 */
	protected $_messages = array();

	/**
	 * Instance of previous Exception triggered
	 * @var Exception
	 */
	private $_previous = null;

	/**
	 * The Constructor of exception
	 * 
	 * @param multitype:null|string|array $message The message to show
	 * @param integer 					  $code	   The internal code of exception
	 * @param Exception $previous
	 */
	public function __construct($message = null, $code = 0, Exception $previous = null)
	{
		$code = (int)$code;

		if (is_null($message) && $code > 0) {
			$message = $this->_messages[$code];
		} elseif (is_array($message) && $code > 0) {
			$vars = $message;
			$message = $this->_messages[$code];
			foreach ($vars as $key => $value) {
				$message = str_replace('{'.$key.'}', $value, $message);
			}
		}

		parent::__construct($message, $code);
		$this->_previous = $previous;
	}
}