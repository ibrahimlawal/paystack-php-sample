# android-web-service
A sample PHP app that uses the [Paystack Class](https://github.com/yabacon/paystack-class) to receive call from an android app. A sample android app, and the source code for the Paystack Android library, are [here](https://github.com/PaystackHQ/paystack-android). 

## To run the sample
1. cd to the folder:
```bash
cd /path/to/android-web-service
```

1.5 if you downloaded this repo, you need to cd into `android-web-service/paystack-class` and download and unzip the [Paystack Class Master](https://github.com/yabacon/paystack-class/archive/master.zip) into it.

2. Change the `PAYSTACK_SECRET_KEY` in [functions.php](functions.php) to your paystack secret key gotten from > https://dashboard.paystack.co/#/settings/developer

3. call `//url.domain.tld/to/charge-token.php?token=PSTK_xxx&email=xxxxx` from the android app with a token generated using the [Paystack Android Library](https://github.com/PaystackHQ/paystack-android).

## Files

* [verify-transaction.php](verify-transaction.php) includes code that show how to verify a transaction
* [charge-authorization.php](charge-authorization.php) includes code that show how to charge an authorization code
* [results](results) will have a json log of transactions

## Contributing

Please see [CONTRIBUTING](../CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email yabacon.valley@gmail.com instead of using the issue tracker.


