<?php

namespace Omnipay\CoinbaseCommerce\Message;

use CoinbaseCommerce\Resources\Charge;
use CoinbaseCommerce\Resources\Checkout;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\ResponseInterface;

class PurchaseRequest extends CheckoutRequest {

	/**
	 * Send the request with specified data
	 *
	 * @param mixed $data The data to send
	 *
	 * @return ResponseInterface
	 * @throws InvalidRequestException
	 */
	public function sendData($data) {
		$checkout                 = Checkout::create($this->getData());
		$chargeData               = [
			'cancel_url'  => null,
			'checkout_id' => $checkout->id,
			'metadata'    => [],
		];
		$purchaseResponse         = new PurchaseResponse($this, []);
		$purchaseResponse->charge = Charge::create($chargeData);
		return $purchaseResponse;
	}
}
