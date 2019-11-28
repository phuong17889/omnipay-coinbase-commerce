<?php

namespace Omnipay\CoinbaseCommerce\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * Class AbstractRequest
 * @package Omnipay\CoinbaseCommerce\Message
 */
abstract class AbstractRequest extends BaseAbstractRequest {

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->getParameter('name');
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setName($value) {
		return $this->setParameter('name', $value);
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return parent::getDescription();
	}

	/**
	 * @param string $value
	 *
	 * @return BaseAbstractRequest
	 */
	public function setDescription($value) {
		return parent::setDescription($value);
	}

	/**
	 * @return mixed
	 */
	public function getPricingType() {
		return $this->getParameter('pricing_type');
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setPricingType($value) {
		return $this->setParameter('pricing_type', $value);
	}

	/**
	 * @return mixed
	 */
	public function getLocalPriceAmount() {
		return $this->getParameter('local_price_amount');
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setLocalPriceAmount($value) {
		return $this->setParameter('local_price_amount', $value);
	}

	/**
	 * @return mixed
	 */
	public function getLocalPriceCurrency() {
		return $this->getParameter('local_price_currency');
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setLocalPriceCurrency($value) {
		return $this->setParameter('local_price_currency', $value);
	}

	/**
	 * @return mixed
	 */
	public function getRequestInfo() {
		return $this->getParameter('request_info');
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setRequestInfo($value) {
		return $this->setParameter('request_info', $value);
	}

	/**
	 * @return string
	 */
	public function getCancelUrl() {
		return parent::getCancelUrl();
	}

	/**
	 * @param string $value
	 *
	 * @return BaseAbstractRequest
	 */
	public function setCancelUrl($value) {
		return parent::setCancelUrl($value);
	}

	/**
	 * @return mixed
	 */
	public function getCheckoutId() {
		return $this->getParameter('checkout_id');
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setCheckoutId($value) {
		return $this->setParameter('checkout_id', $value);
	}

	/**
	 * @return mixed
	 */
	public function getMetadata() {
		return $this->getParameter('metadata');
	}

	/**
	 * @param $value
	 *
	 * @return AbstractRequest
	 */
	public function setMetadata($value) {
		return $this->setParameter('metadata', $value);
	}
}
