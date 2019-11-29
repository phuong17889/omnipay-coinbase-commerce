<?php

namespace Omnipay\CoinbaseCommerce\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Class CompletePurchaseResponse
 * @package Omnipay\CoinbaseCommerce\Message
 */
class CompletePurchaseResponse extends AbstractResponse implements RedirectResponseInterface {

	/**
	 * @return array|mixed
	 */
	public function getData() {
		$data                     = parent::getData();
		$response                 = [];
		$response['checkout_id']  = $data['checkout']['id'];
		$response['charge_id']    = $data['id'];
		$response['code']         = $data['code'];
		$response['created_at']   = $data['created_at'];
		$response['confirmed_at'] = $data['confirmed_at'];
		$timelines                = array_reverse($data['timeline']);
		$response['status']       = $timelines[0]['status'];
		if ($response['status'] == 'UNRESOLVED') {
			$response['context'] = $timelines[0]['context'];
		}
		$response['updated_at']      = $timelines[0]['time'];
		$response['context']         = '';
		$response['network']         = '';
		$response['tx']              = '';
		$response['local_amount']    = '';
		$response['local_currency']  = '';
		$response['crypto_amount']   = '';
		$response['crypto_currency'] = '';
		$response['block_height']    = '';
		$response['block_hash']      = '';
		if (isset($data['payments']) && ($payment = current($data['payments'])) != null) {
			$response['network'] = $payment['network'];
			$response['tx']      = $payment['transaction_id'];
			if (isset($payment['value'])) {
				$response['local_amount']    = $payment['value']['local']['amount'];
				$response['local_currency']  = $payment['value']['local']['currency'];
				$response['crypto_amount']   = $payment['value']['crypto']['amount'];
				$response['crypto_currency'] = $payment['value']['crypto']['currency'];
			}
			if (isset($payment['block'])) {
				$response['block_height'] = $payment['block']['height'];
				$response['block_hash']   = $payment['block']['hash'];
			}
		}
		return $response;
	}

	/**
	 * @return bool
	 */
	public function isSuccessful() {
		return $this->data['status'] == 'COMPLETED' || $this->data['status'] == 'RESOLVED';
	}

	/**
	 * @return bool
	 */
	public function isCancelled() {
		return $this->data['status'] == 'EXPIRED' || $this->data['status'] == 'CANCELED';
	}

	/**
	 * @return bool
	 */
	public function isRedirect() {
		return false;
	}

	/**
	 * @return null|string
	 */
	public function getRedirectUrl() {
		return null;
	}

	/**
	 * @return null|string
	 */
	public function getRedirectMethod() {
		return null;
	}

	/**
	 * @return array|null
	 */
	public function getRedirectData() {
		return null;
	}
}
