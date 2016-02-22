# donate
A sample PHP Composer app that uses the [Mabiola\Paystack-PHP-Lib](https://packagist.org/packages/mabiola/paystack-php-lib) composer package to perform a standard integration.
This sample allows users send a payment request to their customers.

## To run the sample
1. cd to the folder:
```bash
cd /path/to/request-payment
```
2. run composer install ... details on getting composer here > https://getcomposer.org/
```bash
composer install
```
3. rename .env.sample to .env
```bash
mv .env.sample .env
```

4. change the `PAYSTACK_SECRET_KEY` in [.env](.key) to your paystack secret keys gotten from > https://dashboard.paystack.co/#/settings/developer

4. on same page, ([https://dashboard.paystack.co/#/settings/developer](https://dashboard.paystack.co/#/settings/developer)) set the callback url to the url to `pay-conclude/` e.g. if your site is at `http://localhost/paystack-php-sample/request-payment/` the callback url should be `http://localhost/paystack-php-sample/request-payment/pay-conclude/`

5. open the url to this folder in your browser. 

## Contributing

Please see [CONTRIBUTING](../CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email yabacon.valley@gmail.com instead of using the issue tracker.


