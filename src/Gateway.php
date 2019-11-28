<?php

namespace Omnipay\CoinbaseCommerce;

use CoinbaseCommerce\ApiClient;
use Omnipay\CoinbaseCommerce\Message\CompletePurchaseRequest;
use Omnipay\CoinbaseCommerce\Message\ChargeRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\RequestInterface;

/**
 * Class Gateway
 * @package Omnipay\CoinbaseCommerce
 * @method RequestInterface authorize(array $options = array())
 * @method RequestInterface completeAuthorize(array $options = array())
 * @method RequestInterface capture(array $options = array())
 * @method RequestInterface refund(array $options = array())
 * @method RequestInterface void(array $options = array())
 * @method RequestInterface createCard(array $options = array())
 * @method RequestInterface updateCard(array $options = array())
 * @method RequestInterface deleteCard(array $options = array())
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
		$init           = parent::initialize($parameters);
		$init->coinbase = ApiClient::init($init->getParameter('api_key'));
		$init->coinbase->setTimeout($init->getParameter('timeout'));
		return $init;
	}

	/**
	 * @param array $parameters
	 *
	 * @return ChargeRequest|AbstractRequest
	 */
	public function purchase($parameters = array()) {
		return $this->createRequest(ChargeRequest::class, $parameters);
	}

	/**
	 * @param array $parameters
	 *
	 * @return AbstractRequest|RequestInterface
	 */
	public function completePurchase($parameters = array()) {
		return $this->createRequest(CompletePurchaseRequest::class, $parameters);
	}
}
