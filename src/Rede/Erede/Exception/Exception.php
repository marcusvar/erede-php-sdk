<?php

/**
 * eRede Payment Gateway SDK for PHP Applications
 * Copyright (C) 2010~2014 devSDMF Software Development Inc.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 */

namespace Rede\Erede\Exception;

/**
 * eRede Payment Gateway SDK for PHP Applications
 *
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 *
 * An a extension of standard Exception class of PHP with some implementations
 * to handle predefined messages and codes.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede\Exception
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

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