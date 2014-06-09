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

namespace Rede\Erede;

/**
 * eRede Payment Gateway SDK for PHP Applications
 *
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 *
 * The InterfaceComponent is a interface that provide a list of methods
 * that must be implemented in component instances for the correct 
 * functionting of library.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

interface InterfaceComponent
{
	
	/**
	 * Parse component as XML
	 */
	public function asXML();
	
	/**
	 * The factory is a method to create a instance of component 
	 * using a configurable array with data.
	 * 
	 * @param array $data
	 */
	public static function factory(array $data);
}