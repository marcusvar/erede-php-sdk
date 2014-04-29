<?php

namespace Rede\Erede\Transaction;

use Rede\Erede\AbstractComponent;
use Rede\Erede\InterfaceComponent;

class BoletoTxn extends AbstractComponent implements InterfaceComponent
{
	/**
	 * @persistent false
	 */
	protected $title = null;
	
	/**
	 * @persistent false
	 */
	protected $first_name = null;
	
	/**
	 * @persistent false
	 */
	protected $last_name = null;
	
	/**
	 * @persistent false
	 * @export billing_street1
	 */
	protected $street1 = null;
	
	/**
	 * @persistent false
	 * @export billing_street2
	 */
	protected $street2 = null;
	
	/**
	 * @persistent false
	 * @export billing_city
	 */
	protected $city = null;
	
	/**
	 * @persistent false
	 * @export billing_state_province
	 */
	protected $state = null;
	
	/**
	 * @persistent false
	 * @export billing_postcode
	 */
	protected $postcode = null;
	
	/**
	 * @persistent false
	 * @export billing_country
	 */
	protected $country = null;
	
	/**
	 * @persistent false
	 * @export customer_telephone
	 */
	protected $phone = null;
	
	/**
	 * @persistent false
	 * @export customer_email
	 */
	protected $email = null;
	
	/**
	 * @persistent false
	 * @export customer_ip
	 */
	protected $ip = null;
	
	/**
	 * @persistent false
	 */
	protected $language = null;
	
	protected $expiry_date = null;
	
	/**
	 * @persistent false
	 */
	protected $instructions = null;
	
	/**
	 * @persistent false
	 */
	protected $interest_per_day = null;
	
	/**
	 * @persistent false
	 */
	protected $overdue_fine = null;
	
	/**
	 * @persistent false
	 */
	protected $processor_id = null;
	
	protected $method = null;
	
	public function __construct(){}
	
	public function asXML()
	{
		return $this->parseXML();
	}
	
	public static function factory(array $data)
	{
		$instance = new self();
		
		$instance->title = (isset($data['title'])) ? $data['title'] : null;
		$instance->first_name = (isset($data['first_name'])) ? $data['first_name'] : null;
		$instance->last_name = (isset($data['last_name'])) ? $data['last_name'] : null;
		$instance->street1 = (isset($data['street1'])) ? $data['street1'] : null;
		$instance->street2 = (isset($data['street2'])) ? $data['street2'] : null;
		$instance->city = (isset($data['city'])) ? $data['city'] : null;
		$instance->state = (isset($data['state'])) ? $data['state'] : null;
		$instance->postcode = (isset($data['postcode'])) ? $data['postcode'] : null;
		$instance->country = (isset($data['country'])) ? $data['country'] : null;
		$instance->phone = (isset($data['phone'])) ? $data['phone'] : null;
		$instance->email = (isset($data['email'])) ? $data['email'] : null;
		$instance->ip = (isset($data['ip'])) ? $data['ip'] : null;
		$instance->language = (isset($data['language'])) ? $data['language'] : null;
		$instance->expiry_date = (isset($data['expiry_date'])) ? $data['expiry_date'] : null;
		$instance->instructions = (isset($data['instructions'])) ? $data['instructions'] : null;
		$instance->interest_per_day = (isset($data['interest_per_day'])) ? $data['interest_per_day'] : null;
		$instance->overdue_fine = (isset($data['overdue_fine'])) ? $data['overdue_fine'] : null;
		$instance->processor_id = (isset($data['processor_id'])) ? $data['processor_id'] : null;
		$instance->method = (isset($data['method'])) ? $data['method'] : null;
		
		return $instance;
	}
}