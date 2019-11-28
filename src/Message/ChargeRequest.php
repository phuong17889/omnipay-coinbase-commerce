<?php

namespace Omnipay\CoinbaseCommerce\Message;

use CoinbaseCommerce\Resources\Charge;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class PurchaseRequest
 * @package Omnipay\CoinbaseCommerce\Message
 */
class ChargeRequest extends AbstractRequest {

	/**
	 * @return array|mixed
	 * @throws InvalidRequestException
	 */
	public function getData() {
		$this->validate('checkout_id');
		return [
			'cancel_url'  => $this->getCancelUrl(),
			'checkout_id' => $this->getCheckoutId(),
			'metadata'    => $this->getMetadata(),
		];
	}

	/**
	 * @param mixed $data
	 *
	 * @return ChargeResponse|ResponseInterface
	 * @throws InvalidRequestException
	 */
	public function sendData($data) {
		$purchaseResponse         = new ChargeResponse($this, []);
		$purchaseResponse->charge = Charge::create($this->getData());
		return $purchaseResponse;
	}
}
