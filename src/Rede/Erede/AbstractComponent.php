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

use Rede\Erede\Exception\ComponentException;
use Slice\Xml\Serializer;
use Slice\Reflection\ReflectionAnnotation;
use ReflectionObject;

/**
 * eRede Payment Gateway SDK for PHP Applications
 *
 * This is a SDK (Software Development Kit) of eRede Payment Gateway
 * for integrate PHP applications providing payment services.
 *
 * This is a Abstract class for provide some methods and patterns 
 * to library components.
 *
 * @package Rede
 * @subpackage Erede
 * @namespace \Rede\Erede
 * @author Lucas Mendes de Freitas (devsdmf)
 * @copyright 2010~2014 (c) devSDMF Software Development Inc.
 *
 */

abstract class AbstractComponent
{
	
	/**
	 * Magic method for set value in protected properties in component classes
	 * 
	 * @param string $name  The name of property
	 * @param mixed  $value The value of property
	 * @throws ComponentException
	 */
	public function __set($name, $value)
	{
		if (property_exists($this, $name)) {
			$this->$name = $value;
		} else {
			throw new ComponentException(array('property'=>$name,'class'=>get_class($this)),ComponentException::INVALID_PROPERTY);
		}
	}
	
	/**
	 * Magic method for get the value of an property of component class.
	 * 
	 * @param string $name
	 * @throws ComponentException
	 */
	public function __get($name)
	{
		if (property_exists($this, $name)) {
			return $this->$name;
		} else {
			throw new ComponentException(array('property'=>$name,'class'=>get_class($this)),ComponentException::INVALID_PROPERTY);
		}
	}
	
	/**
	 * Method for parse the component in XML format
	 * 
	 * @return string
	 */
	protected function parseXML()
	{
		$instance = new ReflectionObject($this);
		
		$data = array();
		$attributes = array();
		
		foreach ($instance->getProperties() as $property) {
			$var = $property->name;
			
			$annotation = new ReflectionAnnotation($property);
			$annotations = $annotation->getAnnotations();
			
			if (isset($annotations['persistent']) && $annotations['persistent'] == 'false' && empty($this->$var)) {
				continue;
			} else {
				if (isset($annotations['export'])) {
					$export = $annotations['export'];
				} else {
					$export = $property->name;
				}
				
				if (isset($annotations['attribute'])) {
					$attributes[$annotations['attribute']] = array('tag'=>$export,'value'=>$this->$var);
					continue;
				}
				
				if ($this->$var instanceof InterfaceComponent) {
					$data[$export] = $this->$var->asXML();
				} else {
					$data[$export] = $this->$var;
				}
			}
		}
		
		$annotation = new ReflectionAnnotation($instance);
		$annotations = $annotation->getAnnotations();
		
		$serializer = new Serializer('array');
		
		if (isset($annotations['export'])) {
			$serializer->setOption(Serializer::SERIALIZE_OPTION_ROOT_NODE,trim($annotations['export']));
		}
		
		$serializer->serialize($data);
		
		$result = $serializer->getSerializedData();
		
		# Quick fix while this options isn't available in XML Serializer class (Attributes)
		foreach ($attributes as $search => $value) {
			$replace = '<' . $search . ' ' . $value['tag'] . '="' . $value['value'] . '">';
			$result = str_replace('<'.$search.'>', $replace, $result);
		}
		
		return $result;
	}
}