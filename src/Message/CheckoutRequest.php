<?php

namespace Omnipay\CoinbaseCommerce\Message;

use CoinbaseCommerce\Resources\Checkout;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\ResponseInterface;

class CheckoutRequest extends AbstractRequest
{

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate('name', 'description', 'pricing_type', 'local_price_amount', 'local_price_currency');
        return [
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'pricing_type' => $this->getPricingType(),
            'local_price' => [
                'amount' => $this->getLocalPriceAmount(),
                'currency' => $this->getLocalPriceCurrency(),
            ],
            'requested_info' => $this->getRequestedInfo() != '' ? $this->getRequestedInfo() : [],
        ];
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data The data to send
     *
     * @return ResponseInterface
     * @throws InvalidRequestException
     */
    public function sendData($data)
    {
        $checkoutResponse = new CheckoutResponse($this, []);
        $checkoutResponse->checkout = Checkout::create($this->getData());
        return $checkoutResponse;
    }
}
