# paystack-php-sample
A sample PHP Composer app that uses the [YabaCon\Paystack](https://packagist.org/packages/yabacon/paystack-php) composer package to perform a standard integration.

## To run the sample
download the files and extract 

1. cd to the folder:
```bash
cd /path/to/sample
```
2. run composer install ... details on getting composer here > https://getcomposer.org/
```bash
composer install
```
3. change the `PAYSTACK_SECRET_KEY` in [functions.php](functions.php) to your paystack sceret key gotten from > https://dashboard.paystack.co/#/settings/developer

4. on same page, ([https://dashboard.paystack.co/#/settings/developer](https://dashboard.paystack.co/#/settings/developer)) set the callback url to the url to donate-conclude.php

5. open index.php in the browser and complete the transaction

## Files

* [donate-init.php](donate-init.php) includes code that show how to initialize a transaction
* [donate-conclude.php](donate-conclude.php) includes code that show how to verify a transaction

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email yabacon.valley@gmail.com instead of using the issue tracker.


