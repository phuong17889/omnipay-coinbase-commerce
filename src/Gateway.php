<?php

namespace Omnipay\CoinbaseCommerce;

use Omnipay\CoinbaseCommerce\Message\CheckPurchaseRequest;
use Omnipay\CoinbaseCommerce\Message\CompletePurchaseRequest;
use Omnipay\CoinbaseCommerce\Message\PayByNameRequest;
use Omnipay\CoinbaseCommerce\Message\PurchaseRequest;
use Omnipay\CoinbaseCommerce\Message\TransferRequest;
use Omnipay\CoinbaseCommerce\Message\WithdrawalRequest;
use Omnipay\Common\AbstractGateway;

/**
 * Class Gateway
 * @package Omnipay\CoinbaseCommerce
 */
class Gateway extends AbstractGateway {

	/**
	 * @return string
	 */
	public function getName() {
		return 'Coinbase Commerce';
	}

	/**
	 * @return array
	 */
	public function getDefaultParameters() {
		return array(
			'private_key' => '',
			'public_key'  => '',
			'ipn_secret'  => '',
			'merchant_id' => '',
		);
	}

	/**
	 * @return mixed
	 */
	public function getMerchantId() {
		return $this->getParameter('merchant_id');
	}

	/**
	 * @param $value
	 *
	 * @return $this
	 */
	public function setMerchantId($value) {
		return $this->setParameter('merchant_id', $value);
	}

	/**
	 * @return mixed
	 */
	public function getIpnSecret() {
		return $this->getParameter('ipn_secret');
	}

	/**
	 * @param $value
	 *
	 * @return \Omnipay\Common\Message\AbstractRequest
	 */
	public function setIpnSecret($value) {
		return $this->setParameter('ipn_secret', $value);
	}

	/**
	 * @return mixed
	 */
	public function getPrivateKey() {
		return $this->getParameter('private_key');
	}

	/**
	 * @param $value
	 *
	 * @return Gateway
	 */
	public function setPrivateKey($value) {
		return $this->setParameter('private_key', $value);
	}

	/**
	 * @return mixed
	 */
	public function getPublicKey() {
		return $this->getParameter('public_key');
	}

	/**
	 * @param $value
	 *
	 * @return Gateway
	 */
	public function setPublicKey($value) {
		return $this->setParameter('public_key', $value);
	}

	/**
	 * @return TransactionRequest
	 */
	public function purchase(array $parameters = array()) {
		return $this->createRequest(PurchaseRequest::class, $parameters);
	}

	/**
	 * @param array $parameters
	 *
	 * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
	 */
	public function completePurchase(array $parameters = array()) {
		return $this->createRequest(CompletePurchaseRequest::class, $parameters);
	}

	/**
	 * @param array $parameters
	 *
	 * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
	 */
	public function checkPurchase(array $parameters = array()) {
		return $this->createRequest(CheckPurchaseRequest::class, $parameters);
	}

	/**
	 * @return PayByNameRequest
	 */
	public function PayByName(array $parameters = array()) {
		return $this->createRequest(PayByNameRequest::class, $parameters);
	}

	/**
	 * @return TransferRequest
	 */
	public function transfer(array $parameters = array()) {
		return $this->createRequest(TransferRequest::class, $parameters);
	}

	/**
	 * @return WithdrawalRequest
	 */
	public function withdrawal(array $parameters = array()) {
		return $this->createRequest(WithdrawalRequest::class, $parameters);
	}
}
