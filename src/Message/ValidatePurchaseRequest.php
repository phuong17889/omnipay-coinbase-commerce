<?php

namespace Omnipay\CoinbaseCommerce\Message;

use Exception;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class CompletePurchaseRequest
 * @package Omnipay\CoinbaseCommerce\Message
 */
class ValidatePurchaseRequest extends AbstractRequest {

	/**
	 * @return mixed
	 */
	public function getCharge() {
		return $this->getParameter('charge');
	}

	/**
	 * @param $value
	 *
	 * @return self
	 */
	public function setCharge($value) {
		return $this->setParameter('charge', $value);
	}

	/**
	 * @return array|mixed
	 * @throws InvalidRequestException
	 */
	public function getData() {
		$this->validate('charge');
		return $this->getCharge();
	}

	/**
	 * @param mixed $data
	 *
	 * @return ValidatePurchaseResponse|ResponseInterface
	 * @throws Exception
	 */
	public function sendData($data) {
		return new ValidatePurchaseResponse($this, $data);
	}
}
