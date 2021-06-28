<?php

namespace Omnipay\CoinbaseCommerce;

use CoinbaseCommerce\ApiClient;
use Omnipay\CoinbaseCommerce\Message\ChargeRequest;
use Omnipay\CoinbaseCommerce\Message\CheckoutRequest;
use Omnipay\CoinbaseCommerce\Message\CompletePurchaseRequest;
use Omnipay\CoinbaseCommerce\Message\PurchaseRequest;
use Omnipay\CoinbaseCommerce\Message\ValidatePurchaseRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;

/**
 * Class Gateway
 * @package Omnipay\CoinbaseCommerce
 * @method RequestInterface authorize(array $options = [])
 * @method RequestInterface completeAuthorize(array $options = [])
 * @method RequestInterface capture(array $options = [])
 * @method RequestInterface refund(array $options = [])
 * @method RequestInterface void(array $options = [])
 * @method RequestInterface createCard(array $options = [])
 * @method RequestInterface updateCard(array $options = [])
 * @method RequestInterface deleteCard(array $options = [])
 * @method NotificationInterface acceptNotification(array $options = [])
 * @method RequestInterface fetchTransaction(array $options = [])
 */
class Gateway extends AbstractGateway {

	const NAME = 'CoinbaseCommerce';

	/**@var ApiClient */
	protected $coinbase;

	/**
	 * @return string
	 */
	public function getName() {
		return self::NAME;
	}

	/**
	 * @return array
	 */
	public function getDefaultParameters() {
		return array(
			'api_key' => '',
			'timeout' => 30,
		);
	}

	/**
	 * @return mixed
	 */
	public function getApiKey() {
		return $this->getParameter('api_key');
	}

	/**
	 * @param $value
	 *
	 * @return Gateway
	 */
	public function setApiKey($value) {
		return $this->setParameter('api_key', $value);
	}

	/**
	 * @return mixed
	 */
	public function getTimeout() {
		return $this->getParameter('timeout');
	}

	/**
	 * @param $value
	 *
	 * @return Gateway
	 */
	public function setTimeout($value) {
		return $this->setParameter('timeout', $value);
	}

	/**
	 * {@inheritDoc}
	 */
	public function initialize(array $parameters = array()) {
		$init = parent::initialize($parameters);
		if (isset($parameters['api_key'])) {
			$init->coinbase = ApiClient::init($parameters['api_key']);
			$init->coinbase->setTimeout($init->getParameter('timeout'));
		}
		return $init;
	}

	/**
	 * @param array $options
	 *
	 * @return AbstractRequest
	 */
	public function purchase($options = []) {
		return $this->createRequest(PurchaseRequest::class, $options);
	}

	/**
	 * @param array $options
	 *
	 * @return AbstractRequest
	 */
	public function checkout($options = []) {
		return $this->createRequest(CheckoutRequest::class, $options);
	}

	/**
	 * @param array $options
	 *
	 * @return AbstractRequest
	 */
	public function charge($options = []) {
		return $this->createRequest(ChargeRequest::class, $options);
	}

	/**
	 * @param array $options
	 *
	 * @return AbstractRequest|RequestInterface
	 */
	public function completePurchase($options = []) {
		return $this->createRequest(CompletePurchaseRequest::class, $options);
	}

	/**
	 * @param array $options
	 *
	 * @return AbstractRequest|RequestInterface
	 */
	public function validatePurchase($options = []) {
		return $this->createRequest(ValidatePurchaseRequest::class, $options);
	}
}
