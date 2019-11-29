<?php

namespace Omnipay\CoinbaseCommerce\Message;

use CoinbaseCommerce\Resources\Charge;
use Omnipay\Common\Exception\InvalidResponseException;

/**
 * Class CompletePurchaseRequest
 * @package Omnipay\CoinbaseCommerce\Message
 */
class CompletePurchaseRequest extends AbstractRequest {

	public function getCode() {
		return $this->getParameter('code');
	}

	public function setCode($value) {
		return $this->setParameter('code', $value);
	}

	/**
	 * @return array|mixed
	 * @throws InvalidResponseException
	 */
	public function getData() {
		$this->validate('code');
		return [
			'code' => $this->getCode(),
		];
	}

	/**
	 * @param mixed $data
	 *
	 * @return CompletePurchaseResponse|\Omnipay\Common\Message\ResponseInterface
	 */
	public function sendData($data) {
		$charge = Charge::retrieve($this->getCode());
		return new CompletePurchaseResponse($this, $charge->getAttributes());
	}
}
