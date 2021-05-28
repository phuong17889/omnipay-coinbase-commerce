# Omnipay: Coinbase Commerce

**Coinbase Commerce driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/omnipay/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements Coinbase Commerce support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "navatech/omnipay-coinbase-commerce": "@dev"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update

## Basic Usage

The following gateways are provided by this package:

* Payssion

For general usage instructions, please see the main [Omnipay](https://github.com/omnipay/omnipay)
repository.

## Example

### Create a transaction

```php
$gateway = Omnipay::create(Gateway::NAME);

$gateway->initialize(array(
    'api_key' => '',
    'timeout' => 30,
));

$checkoutResponse = $gateway->checkout([
    'name'                 => 'Payment',
    'description'          => 'Payment description',
    'pricing_type'         => 'fixed_price',
    'local_price_amount'   => 10,
    'local_price_currency' => 'USD',
])->send();

if ($checkoutResponse->isSuccessful()) {
    $checkoutData = $checkoutResponse->getData(); 
    $chargeResponse = $gateway->charge([
        'checkout_id' => $checkoutData['id'],
        'cancel_url'  => null,
        'metadata'    => [],
    ])->send();
    if ($chargeResponse->isSuccessful() && $chargeResponse->isRedirect()) {
        return $chargeResponse->getRedirectUrl();
    }
}
```

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/navatech/omnipay-coinbase-commerce/issues),
or better yet, fork the library and submit a pull request.
