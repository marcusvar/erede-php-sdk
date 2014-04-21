<?php

namespace Rede\Erede;

use Rede\Erede\Exception\ComponentException;
use Slice\Xml\Serializer;
use Slice\Reflection\ReflectionAnnotation;
use ReflectionObject;

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
		
		$serializer = new Serializer('array',array(Serializer::SERIALIZE_OPTION_EOL=>PHP_EOL));
		
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