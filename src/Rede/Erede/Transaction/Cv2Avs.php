<?php

namespace Rede\Erede\Transaction;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;

class Cv2Avs extends AbstractComponent implements InterfaceComponent
{
	/**
	 * @export street_address1
	 * @persistent false
	 */
	protected $number = null;
	
	/**
	 * @export street_address2
	 * @persistent false
	 */
	protected $street = null;
	
	/**
	 * @export street_address3
	 * @persistent false
	 */
	protected $neighborhood = null;
	
	/**
	 * @export street_address4
	 * @persistent false
	 */
	protected $complement = null;
	
	/**
	 * @persistent false
	 */
	protected $city = null;
	
	/**
	 * @export state_province
	 * @persistent false
	 */
	protected $state = null;
	
	/**
	 * @persistent false
	 */
	protected $country = null;
	
	/**
	 * @persistent false
	 */
	protected $postcode = null;
	
	/**
	 * @export cpf
	 * @persistent false
	 */
	protected $document = null;
	
	/**
	 * @persistent false
	 */
	protected $cv2 = null;
	
	/**
	 * @persistent false
	 */
	protected $policy = null;
	
	public function __construct(){}
	
	public function asXML()
	{
		return $this->parseXML();
	}
	
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->number = (isset($data['number'])) ? $data['number'] : null;
		$instance->street = (isset($data['street'])) ? $data['street'] : null;
		$instance->neighborhood = (isset($data['neighborhood'])) ? $data['neighborhood'] : null;
		$instance->complement = (isset($data['complement'])) ? $data['complement'] : null;
		$instance->city = (isset($data['city'])) ? $data['city'] : null;
		$instance->state = (isset($data['state'])) ? $data['state'] : null;
		$instance->country = (isset($data['country'])) ? $data['country'] : null;
		$instance->postcode = (isset($data['postcode'])) ? $data['postcode'] : null;
		$instance->document = (isset($data['document'])) ? $data['document'] : null;
		$instance->cv2 = (isset($data['cv2'])) ? $data['cv2'] : null;
		$instance->policy = (isset($data['policy'])) ? $data['policy'] : null;
		
		return $instance;
	}
}