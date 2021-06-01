<?php

namespace Omnipay\CoinbaseCommerce\Message;

use CoinbaseCommerce\Resources\Charge;
use Omnipay\Common\Message\AbstractResponse;

/**
 * Response
 */
class ChargeResponse extends AbstractResponse {

	/**@var Charge */
	public $charge = null;

	/**
	 * Is the response successful?
	 *
	 * @return boolean
	 */
	public function isSuccessful() {
		return $this->charge != null;
	}

	/**
	 * Does the response require a redirect?
	 *
	 * @return boolean
	 */
	public function isRedirect() {
		return $this->isSuccessful();
	}

	/**
	 * @return mixed|string
	 */
	public function getRedirectUrl() {
		if ($this->charge != null) {
			return 'https://commerce.coinbase.com/charges/' . $this->charge->code;
		}
		return '';
	}

	/**
	 * Get the response data.
	 *
	 * @return mixed
	 */
	public function getData() {
		$response = $this->charge->getAttributes();
	}
}
