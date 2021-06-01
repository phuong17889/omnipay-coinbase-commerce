<?php

namespace Omnipay\CoinbaseCommerce\Message;

use CoinbaseCommerce\Resources\Charge;
use Exception;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class CompletePurchaseRequest
 * @package Omnipay\CoinbaseCommerce\Message
 */
class CompletePurchaseRequest extends AbstractRequest {

	/**
	 * @return mixed
	 */
	public function getCode() {
		return $this->getParameter('code');
	}

	/**
	 * @param $value
	 *
	 * @return CompletePurchaseRequest
	 */
	public function setCode($value) {
		return $this->setParameter('code', $value);
	}

	/**
	 * @return array|mixed
	 * @throws InvalidRequestException
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
	 * @return CompletePurchaseResponse|ResponseInterface
	 * @throws Exception
	 */
	public function sendData($data) {
		$charge = Charge::retrieve($this->getCode());
		return new CompletePurchaseResponse($this, $charge->getAttributes());
	}
}
