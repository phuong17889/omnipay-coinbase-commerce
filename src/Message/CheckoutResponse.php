<?php

namespace Omnipay\CoinbaseCommerce\Message;

use CoinbaseCommerce\Resources\Checkout;
use Omnipay\Common\Message\AbstractResponse;

class CheckoutResponse extends AbstractResponse
{

    /**@var Checkout */
    public $checkout = null;

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return $this->checkout != null;
    }

    /**
     * Does the response require a redirect?
     *
     * @return boolean
     */
    public function isRedirect()
    {
        return $this->isSuccessful();
    }

    /**
     * @return mixed|string
     */
    public function getRedirectUrl()
    {
        if ($this->checkout != null) {
            return 'https://commerce.coinbase.com/checkout/' . $this->checkout->id;
        }
        return '';
    }

    /**
     * Get the response data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->checkout->getAttributes();
    }
}
