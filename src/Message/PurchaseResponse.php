<?php

namespace Omnipay\CoinbaseCommerce\Message;
class PurchaseResponse extends ChargeResponse {

	/**
	 * Get the response data.
	 *
	 * @return mixed
	 */
	public function getData() {
		$response             = $this->charge->getAttributes();
		$response['checkout'] = $this->data;
		return $response;
	}
}
