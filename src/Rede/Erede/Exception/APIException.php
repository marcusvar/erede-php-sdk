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

use Rede\Erede\Exception\Exception;

/**
 * eRede Payment Gateway SDK for PHP Applications
 *
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 *
 * A Exception class for handle and manage errors occoured in runtime
 * of API class.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede\Exception
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

class APIException extends Exception
{
	
	/**
	 * Constants with error code of an specific message
	 * @var integer
	 */
	const INVALID_ENVIRONMENT = 100;
	const AUTHENTICATION_NOT_SPECIFIED = 101;
	const TRANSACTION_NOT_FOUND = 102;
	
	/**
	 * Array with predefined messages
	 * @var array
	 */
	protected $_messages = array(
		self::INVALID_ENVIRONMENT => 'The environment {env} is not a valid and configurable environment to API.',
		self::AUTHENTICATION_NOT_SPECIFIED => 'An Authentication must be specified before send a request.',
		self::TRANSACTION_NOT_FOUND => 'An Transaction object must be specified to send in request.',
	);
}