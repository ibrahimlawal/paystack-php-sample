# paystack-php-sample
A sample PHP Composer app that uses the [YabaCon\Paystack](https://packagist.org/packages/yabacon/paystack-php) composer package to perform a standard integration.

## To run the sample
1. cd to the folder:
```bash
cd /path/to/donate
```
2. run composer install ... details on getting composer here > https://getcomposer.org/
```bash
composer install
```
3. change the `PAYSTACK_SECRET_KEY` in [functions.php](functions.php) to your paystack secret key gotten from > https://dashboard.paystack.co/#/settings/developer

4. call charge-token.php?token=PSTK_xxx&email=xxxxx from the browser

## Files

* [charge-token.php](charge-token.php) includes code that show how to charge a token
* [charge-authorization.php](charge-authorization.php) includes code that show how to charge an authorization code
* [results](results) will have a json log of tansactions named by their trxref

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email yabacon.valley@gmail.com instead of using the issue tracker.


